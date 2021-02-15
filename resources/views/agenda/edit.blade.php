<div class="form-group">
<label class="control-label col-md-4 mulai" >Mulai : </label>
<div class="col-md-8">
<input readonly type="text" id="mulai" name="mulai" id="mulai" class="form-control" value="{{ $agenda->mulai }}" />
</div>
</div>
<div class="form-group">
<label class="control-label col-md-4 selesai">Selesai : </label>
<div class="col-md-8">
<input readonly type="text" id="selesai" name="selesai" id="selesai" class="form-control" value="{{ $agenda->selesai }}" />
</div>
</div>
<div class="form-group">
<label class="control-label col-md-4">Nama Acara : </label>
<div class="col-md-8">
<input type="text" name="acara" id="acara" class="form-control" value="{{ $agenda->acara }}"/>
</div>
</div>
<div class="form-group">
<label class="control-label col-md-4">Nama Tempat : </label>
<div class="col-md-8">
<input type="text" name="tempat" id="tempat" class="form-control" value="{{ $agenda->tempat }}" />
</div>
</div>
<div class="form-group">
<label class="control-label col-md-4">Disposisi : </label>
<div class="col-md-8">
<input type="text" name="disposisi" id="disposisi" class="form-control" value="{{ $agenda->disposisi }}" />
</div>
</div>
<div class="form-group">
<label class="control-label col-md-4">Satker  : </label>
<div class="col-md-8">
<input type="text" name="satker" id="satker" class="form-control" value="{{ $agenda->satker }}" />
</div>
</div>
<div class="form-group">
<label class="control-label col-md-4">Jenis : </label>
<div class="col-md-8">
<select id='jenis' name="jenis">
<option value="">Pilih</option>
<option value="int" {{ $agenda->jenis == "int" ? 'selected' : '' }}>Internal</option>
<option value="pub" {{ $agenda->jenis == "pub" ? 'selected' : '' }}>Publik</option>
<option value="und" {{ $agenda->jenis == "und" ? 'selected' : '' }}>Undangan</option>
<option value="bat" {{ $agenda->jenis == "bat" ? 'selected' : '' }}>Batal</option>
{{-- @foreach($users as $user)
<option value="{{ $user->id }}" {{ $user->id == $order->user_id ? 'selected' : '' }}>{{ $user->name }}</option>
@endforeach --}}
</select>
</div>
</div>
<script>
$("#mulai").datetimepicker({format: 'yyyy-mm-dd hh:ii'});
$("#selesai").datetimepicker({format: 'yyyy-mm-dd hh:ii'});
</script>
