<?php

namespace App\Http\Controllers;

use Flow;
use Auth;
use Carbon\Carbon;
use App\MinitCurai;
use App\MinitCuraiFlow;
use Illuminate\Http\Request;
use App\Base\BaseController;
use App\XtraAnggota;

class MinitCuraiController extends BaseController
{
    public function index()
    {
        return $this->renderView('minitcurai.index');
    }

    public function create()
    {
        return view("minitcurai.create");
    }

    public function store(Request $request)
    {
        $fields = collect([
            "tajuk" => $request->txtAktiviti,
            "anjuran" => $request->txtAnjuran,
            "tarikh" => Carbon::createFromFormat('Y-m-d',  $request->txtTarikh)->format('Y-m-d'),
            "lokasi" => $request->txtTempat,
            "isu" => $request->txtIsu,
            'tindakan' => $request->txtTindakan,
            'pegawai_terlibat' => $request->txtPegawai,
            "anggota_id" => Auth::user()->anggota_id,
            "from_anggota_id" => Auth::user()->anggota_id,
            "to_anggota_id" => Auth::user()->anggota_id,
        ]);

        MinitCurai::menyimpan($fields);
    }

    public function grid(Request $request)
    {
        /* $search = collect([
            'key' => $request->input('searchKey'),
            'dept' => Utility::pcrsListerDepartment($request->input('subDept'), $request->input('searchDept')),
        ]); */

        $perPage = 10;
        $created = MinitCurai::where("anggota_id", Auth::user()->anggota_id)->orderBy('created_at', 'desc');
        $involve = MinitCurai::select("minitcurai.*")->join("minitcurai_flow", "minitcurai.id", "=",  "minitcurai_flow.minitcurai_id")
            ->where("minitcurai_flow.to_anggota_id", Auth::user()->anggota_id);
        $involve->union($created);

        $union = $involve->orderBy('tarikh', 'desc')->paginate($perPage);

        return view('minitcurai.grid', compact('union'));
    }

    public function edit(MinitCurai $minitCurai)
    {
        $anggota = XtraAnggota::get();
        return view('minitcurai.edit', compact('minitCurai', 'anggota'));
    }

    public function update(MinitCurai $minitCurai, Request $request)
    {
        $fields = collect([
            "tajuk" => $request->txtAktiviti,
            "anjuran" => $request->txtAnjuran,
            "tarikh" => Carbon::createFromFormat('Y-m-d',  $request->txtTarikh)->format('Y-m-d'),
            "lokasi" => $request->txtTempat,
            "isu" => $request->txtIsu,
            "tindakan" => $request->txtTindakan,
            "anggota_id" => Auth::user()->anggota_id,
            "from_anggota_id" => Auth::user()->anggota_id,
            "to_anggota_id" => Auth::user()->anggota_id,
        ]);

        $minitCurai->tajuk = $request->txtAktiviti;
        $minitCurai->anjuran = $request->txtAnjuran;
        $minitCurai->tarikh = Carbon::createFromFormat('Y-m-d',  $request->txtTarikh)->format('Y-m-d');
        $minitCurai->lokasi = $request->txtTempat;
        $minitCurai->isu = $request->txtIsu;
        $minitCurai->pegawai_terlibat = $request->txtPegawai;
        $minitCurai->tindakan = $request->txtTindakan;
        $minitCurai->cadangan = $request->txtCadangan;

        $minitCurai->save();
    }

    public function sah(MinitCurai $minitCurai, Request $request)
    {
        $minitCurai->validating();
    }

    public function send(MinitCurai $minitCurai)
    {
        $minitCurai->flag = MinitCurai::HANTAR;
        $minitCurai->save();

        $minitCurai->minitCurai_flow()->save(new MinitCuraiFlow([
            'from_anggota_id' => Auth::user()->anggota_id,
            'to_anggota_id' => Flow::pelulus(Auth::user()->anggota)->xtraAttr->anggota_id
        ]));
    }

    public function forward(MinitCurai $minitCurai, Request $request)
    {
        foreach($request->comPegawai as $pegawaiId) {
            $fields = collect([
                "from_anggota_id" => Auth::user()->anggota_id,
                "to_anggota_id" => $pegawaiId,
                "is_forward" => 1
            ]);
            MinitCurai::majukan($minitCurai, $fields);
        }
    }
}
