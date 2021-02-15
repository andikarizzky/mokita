<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Agenda;
use DataTables;
use Carbon;
use Validator;
use Jenssegers\Date\Date;

class AgendaController extends Controller
{
    public function getDatatable() {

        $start_date = (!empty($_GET["start_date"])) ? ($_GET["start_date"]) : ('');
        $end_date = (!empty($_GET["end_date"])) ? ($_GET["end_date"]) : ('');

        if($start_date && $end_date){

         $start_date = date('Y-m-d', strtotime($start_date));
         $end_date = date('Y-m-d', strtotime($end_date));

        //  $cari = Agenda::whereBetween('mulai', array($start_date, $end_date))->get();

        // $cari = Agenda::whereDate('mulai','<=', $start_date)
        // ->whereDate('mulai','>=', $end_date)
        // ->get();

        $cari = Agenda::whereRaw(
            "(mulai >= ? AND mulai <= ?)",
            [$start_date." 00:00:00", $end_date." 23:59:59"]
          )->get();

        return datatables()->of($cari)

        ->addColumn('action', function($data){
            $button = '<button type="button" name="edit" id="'.$data->agenda_id.'" class="edit btn btn-primary btn-sm">Edit</button>';
            $button .= '&nbsp; <br/> &nbsp;';
            $button .= '<button type="button" name="delete" id="'.$data->agenda_id.'" class="delete btn btn-danger btn-sm">Delete</button>';
            return $button;
        })

        ->addColumn('jenis_acara', function ($jenis) {
            if ($jenis->jenis == "int") {
                return "Internal";
            } elseif ($jenis->jenis == "pub") {
                return "Publik";
            } elseif ($jenis->jenis == "und") {
                return "Undangan";
            } elseif ($jenis->jenis == "bat") {
                return "Batal";
            }
        })

        ->addColumn('mulai', function ($mulai) {
            $mulaiH = $mulai->mulai;
            return Date::parse($mulaiH)->format('l, j F Y');
        })

        ->addColumn('selesai', function ($selesai) {
            $selesaiH = $selesai->selesai;
            return Date::parse($selesaiH)->format('l, j F Y');
        })

        ->addColumn('jammulai', function ($jammulai) {
            $selesaiH = $jammulai->selesai;
            return Date::parse($selesaiH)->format('H:i');
        })

        ->addColumn('jamselesai', function ($jamselesai) {
            $selesaiH = $jamselesai->selesai;
            return Date::parse($selesaiH)->format('H:i');
        })

        ->rawColumns(['action', 'jenis_acara', 'mulai', 'selesai', 'jammulai', 'jamselesai'])
        ->toJson();

        } else {
            \Date::setLocale('id');
            $agenda = Agenda::latest()->get();
            return datatables()->of($agenda)
            ->addColumn('action', function($data){
                $button = '<button type="button" name="edit" id="'.$data->agenda_id.'" class="edit btn btn-primary btn-sm">Edit</button>';
                $button .= '&nbsp; <br/> &nbsp;';
                $button .= '<button type="button" name="delete" id="'.$data->agenda_id.'" class="delete btn btn-danger btn-sm">Delete</button>';
                return $button;
            })

            ->addColumn('jenis_acara', function ($jenis) {
                if ($jenis->jenis == "int") {
                    return "Internal";
                } elseif ($jenis->jenis == "pub") {
                    return "Publik";
                } elseif ($jenis->jenis == "und") {
                    return "Undangan";
                } elseif ($jenis->jenis == "bat") {
                    return "Batal";
                }
            })

            ->addColumn('mulai', function ($mulai) {
                $mulaiH = $mulai->mulai;
                return Date::parse($mulaiH)->format('l, j F Y');
            })

            ->addColumn('selesai', function ($selesai) {
                $selesaiH = $selesai->selesai;
                return Date::parse($selesaiH)->format('l, j F Y');
            })

            ->addColumn('jammulai', function ($jammulai) {
                $selesaiH = $jammulai->selesai;
                return Date::parse($selesaiH)->format('H:i');
            })

            ->addColumn('jamselesai', function ($jamselesai) {
                $selesaiH = $jamselesai->selesai;
                return Date::parse($selesaiH)->format('H:i');
            })

            ->rawColumns(['action', 'jenis_acara', 'mulai', 'selesai', 'jammulai', 'jamselesai'])
            ->toJson();

        }

    }
    public function index() {

       return view('agenda.index');
    }

    public function add() {
        $returnHTML = view('agenda.add')->render();

        return response()->json(['success' => true, 'html'=>$returnHTML]);
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'mulai' => 'required',
            'selesai' => 'required',
            'disposisi' => 'required',
            'satker' => 'required',
            'jenis' => 'required',
            'acara' => 'required',
            'tempat' => 'required'
        ], [
            'mulai.required' => 'Tanggal mulai tidak boleh kosong !',
            'selesai.required' => 'Tanggal selesai tidak boleh kosong !',
            'disposisi.required' => 'Disposisi kegiatan tidak boleh kosong !',
            'satker.required' => 'Satker tidak boleh kosong !',
            'jenis.required' => 'Jenis tidak boleh kosong !',
            'acara.required' => 'Acara tidak boleh kosong !',
            'tempat.required' => 'Tempat tidak boleh kosong !',
        ]);

        if($validator->fails())
        {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        $form_data = array(
            'user_id' => 1,
            'acara' => $request->acara,
            'tempat' => $request->tempat,
            'mulai' => $request->mulai,
            'selesai' => $request->selesai,
            'disposisi' => $request->disposisi,
            'satker' => $request->satker,
            'jenis' => $request->jenis,
        );

        Agenda::create($form_data);

        return response()->json(['success' => 'Data Added successfully.']);

    }

    public function edit($id)
    {
        if(request()->ajax())
        {
            $agenda = Agenda::where('agenda_id', $id)->first();
            $returnHTML = view('agenda.edit', ['agenda'=> $agenda])->render();

            return response()->json(['success' => true, 'data'=>$returnHTML]);
        }
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'mulai' => 'required',
            'selesai' => 'required',
            'disposisi' => 'required',
            'satker' => 'required',
            'jenis' => 'required',
            'acara' => 'required',
            'tempat' => 'required'
        ], [
            'mulai.required' => 'Tanggal mulai tidak boleh kosong !',
            'selesai.required' => 'Tanggal selesai tidak boleh kosong !',
            'disposisi.required' => 'Disposisi kegiatan tidak boleh kosong !',
            'satker.required' => 'Satker tidak boleh kosong !',
            'jenis.required' => 'Jenis tidak boleh kosong !',
            'acara.required' => 'Acara tidak boleh kosong !',
            'tempat.required' => 'Tempat tidak boleh kosong !',
        ]);

        if($validator->fails())
        {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        $form_data = array(
            'user_id' => 1,
            'acara' => $request->acara,
            'tempat' => $request->tempat,
            'mulai' => $request->mulai,
            'selesai' => $request->selesai,
            'disposisi' => $request->disposisi,
            'satker' => $request->satker,
            'jenis' => $request->jenis,
        );

        Agenda::where('agenda_id', $request->hidden_id)->update($form_data);

        return response()->json(['success' => 'Data Added successfully.']);
    }

    public function delete($id) {
        $data = Agenda::where('agenda_id', $id);
        $data->delete();
    }

}
