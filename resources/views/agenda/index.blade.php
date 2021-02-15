@extends('layouts.app')
@section('title', 'Data Agenda')

@push('styles')

<link rel="stylesheet" href="{{asset('css/lib/datatable/dataTables.bootstrap.min.css')}}">
<link rel="stylesheet" href="{{ asset('datetime/bootstrap-datetimepicker.min.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css" />

@endpush

@section('bc-title', 'Data Agenda')
@section('bc-first', 'Agenda')
@section('bc-last', 'Agenda')


@section('content')
<div class="animated fadeIn">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">Data Agenda</strong>
                    <div class="float-right">
                        <button type=" button" name="add" id="add_data" class="btn btn-success btn-xs">Tambah Data</button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row input-daterange">
                        <div class="col-md-4">
                            <input type="text" name="from_date" id="from_date" class="form-control" placeholder="From Date" readonly />
                        </div>
                        <div class="col-md-4">
                            <input type="text" name="to_date" id="to_date" class="form-control" placeholder="To Date" readonly />
                        </div>
                        <div class="col-md-4">
                            <button type="button" name="filter" id="filter" class="btn btn-primary">Filter</button>
                            <button type="button" name="refresh" id="refresh" class="btn btn-default">Refresh</button>
                        </div>
                    </div>
                    <br />
                    <div class="table-responsive">
                    <table id="agenda" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal Mulai</th>
                                <th>Jam Mulai</th>
                                <th>Tanggal Selesai</th>
                                <th>Jam Selesai</th>
                                <th>Acara</th>
                                <th>Tempat</th>
                                <th>Disposisi</th>
                                <th>Satker</th>
                                <th>Jenis</th>
                                <th>Action</th>
                            </tr>
                            <tbody>
                            </tbody>
                        </thead>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!-- .animated -->

<div id="formModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
     <div class="modal-content">
      <div class="modal-header">
             <button type="button" class="close" data-dismiss="modal">&times;</button>
             <h4 class="modal-title">Tambah Data Agenda</h4>
           </div>
           <div class="modal-body">
            <span id="form_result"></span>
            <form method="post" id="sample_form" class="form-horizontal" enctype="multipart/form-data">
                @csrf
            <div id="editForm">
           </div>
           <div class="form-group" align="center">
            <input type="hidden" name="action" id="action" />
            <input type="hidden" name="hidden_id" id="hidden_id" />
            <input type="submit" name="action_button" id="action_button" class="btn btn-warning" value="Simpan" />
           </div>
            </form>
        </div>
       </div>
   </div>
</div>

   <div id="confirmModal" class="modal fade" role="dialog">
       <div class="modal-dialog">
           <div class="modal-content">
               <div class="modal-header">
                   <button type="button" class="close" data-dismiss="modal">&times;</button>
                   <h2 class="modal-title">Konfirmasi</h2>
               </div>
               <div class="modal-body">
                   <h4 align="center" style="margin:0;">Anda Yakin Ingin Hapus Data?</h4>
               </div>
               <div class="modal-footer">
                <button type="button" name="ok_button" id="ok_button" class="btn btn-danger">OK</button>
                   <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
               </div>
           </div>
       </div>
   </div>

   <div id="alertSearch" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h2 class="modal-title">Alert</h2>
            </div>
            <div class="modal-body">
                <h4 align="center" style="margin:0;">Isi Data Keduanya!</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')

<script src="{{asset('js/lib/data-table/datatables.min.js')}}"></script>
<script src="{{asset('js/lib/data-table/dataTables.bootstrap.min.js')}}"></script>
<script src="{{asset('js/lib/data-table/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('js/lib/data-table/buttons.bootstrap.min.js')}}"></script>
<script src="{{asset('js/lib/data-table/jszip.min.js')}}"></script>
<script src="{{asset('js/lib/data-table/vfs_fonts.js')}}"></script>
<script src="{{asset('js/lib/data-table/buttons.html5.min.js')}}"></script>
<script src="{{asset('js/lib/data-table/buttons.print.min.js')}}"></script>
<script src="{{asset('js/lib/data-table/buttons.colVis.min.js')}}"></script>
<script src="{{asset('js/init/datatables-init.js')}}"></script>
<script src="{{ asset('datetime/bootstrap-datetimepicker.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js"></script>

<script>
    $(document).ready(function(){

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#agenda').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
             url: "{{ route('admin.agenda.getDatatable') }}",
             type: 'GET',
             data: function (d) {
             d.start_date = $('#from_date').val();
             d.end_date = $('#to_date').val();
             }
            },
            columns: [
                { "data": null,"sortable": false,
                render: function (data, type, row, meta) {
                          return meta.row + meta.settings._iDisplayStart + 1;
                         }
             },
                     { data: 'mulai', name: 'mulai' },
                     { data: 'jammulai', name: 'jammulai' },
                     { data: 'selesai', name: 'selesai' },
                     { data: 'jamselesai', name: 'jamselesai' },
                     { data: 'acara', name: 'acara' },
                     { data: 'tempat', name: 'tempat' },
                     { data: 'disposisi', name: 'disposisi' },
                     { data: 'satker', name: 'satker' },
                     { data: 'jenis_acara', name: 'jenis_acara' },
                     { data: 'action', name: 'action', orderable: false},
                  ],
           order: [[0, 'desc']]
            });

            $('#filter').click(function(){
                var from_date = $('#from_date').val();
                var to_date = $('#to_date').val();
                if(from_date == '' &&  to_date == '')
                {
                    $('#alertSearch').modal('show');
                }
               });

            $('#refresh').click(function(){
            $('#from_date').val('');
            $('#to_date').val('');
            });

        $('#filter').click(function(){
                $('#agenda').DataTable().draw(true);
        });

        $('.input-daterange').datepicker({
            todayBtn:'linked',
            format:'yyyy-mm-dd',
            autoclose:true
           });


        $('#add_data').click(function(){
            $('#sample_form').trigger("reset");
            $('#sample_form')[0].reset();
            $('.modal-title').text("Tambah Data");
            $('#action_button').val("Simpan");
            $('#action').val("Add");
            $('#form_result').html('');
            $.ajax({
                url:"{{ route('admin.agenda.add') }}",
                method:'get',
                dataType:"json",
                success:function(data){
                 $('#editForm').html(data.html);
                 $('#formModal').modal('show');
                }
               })
           });

           $('#sample_form').on('submit', function(event){
            event.preventDefault();
            $('#form_result').html('');
            if($('#action').val() == 'Add')
            {
             $.ajax({
              url:"{{ route('admin.agenda.store') }}",
              method:"POST",
              data: new FormData(this),
              contentType: false,
              cache:false,
              processData: false,
              dataType:"json",
              success:function(data)
              {
               var html = '';
               if(data.errors)
               {
                html = '<div class="alert alert-danger">';
                for(var count = 0; count < data.errors.length; count++)
                {
                 html += '<p>' + data.errors[count] + '</p>';
                }
                html += '</div>';
               }
               if(data.success)
               {
                html = '<div class="alert alert-success">' + data.success + '</div>';
                $('#sample_form')[0].reset();
                $('#agenda').DataTable().ajax.reload();
               }
               $('#form_result').html(html);
              }
             })
            }

            if($('#action').val() == "Edit")
            {
             $.ajax({
              url:"{{ route('admin.agenda.update') }}",
              method:"POST",
              data:new FormData(this),
              contentType: false,
              cache: false,
              processData: false,
              dataType:"json",
              success:function(data)
              {
               var html = '';
               if(data.errors)
               {
                html = '<div class="alert alert-danger">';
                for(var count = 0; count < data.errors.length; count++)
                {
                 html += '<p>' + data.errors[count] + '</p>';
                }
                html += '</div>';
               }
               if(data.success)
               {
                html = '<div class="alert alert-success">' + data.success + '</div>';
                $('#sample_form')[0].reset();
                $('#store_image').html('');
                $('#agenda').DataTable().ajax.reload();
               }
               $('#form_result').html(html);
              }
             })
            }
           });

           $(document).on('click', '.edit', function(){
            var id = $(this).attr('id');
            $('#form_result').html('');
            $.ajax({
             url:"{{ url('/admin/agenda/edit/') }}/"+id,
             dataType:"json",
             success:function(data){
                $('#hidden_id').val(id);
              $('#editForm').html(data.data);
              $('.modal-title').text("Edit Data");
              $('#action_button').val("Edit");
              $('#action').val("Edit");
              $('#formModal').modal('show');
             }
            })
           });

           $(document).on('click', '.delete', function(){
            id = $(this).attr('id');
            $('#confirmModal').modal('show');
            $('#ok_button').text('Delete');
           });

           $('#ok_button').click(function(){
            $.ajax({
             url:"/admin/agenda/delete/"+id,
             beforeSend:function(){
              $('#ok_button').text('Deleting...');
             },
             success:function(data)
             {
                $('#agenda').DataTable().ajax.reload();
               $('#confirmModal').modal('hide');
             }
            })
           });

        });
</script>

@endpush
