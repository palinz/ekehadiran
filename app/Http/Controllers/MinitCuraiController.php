<?php

namespace App\Http\Controllers;

use Auth;
use Carbon\Carbon;
use App\MinitCurai;
use Illuminate\Http\Request;
use App\Base\BaseController;

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
        $created = MinitCurai::where("anggota_id", Auth::user()->anggota_id)->orderBy('created_at', 'desc')
            ->paginate($perPage);

        return view('minitcurai.grid', compact('created'));
    }

    public function edit(MinitCurai $minitCurai)
    {
        return view('minitcurai.edit', compact('minitCurai'));
    }

    public function update(MinitCurai $minitCurai, Request $request)
    {
        $minitCurai->tajuk = $request->txtAktiviti;
        $minitCurai->anjuran = $request->txtAnjuran;
        $minitCurai->tarikh = Carbon::createFromFormat('Y-m-d',  $request->txtTarikh)->format('Y-m-d');
        $minitCurai->lokasi = $request->txtTempat;
        $minitCurai->isu = $request->txtIsu;

        $minitCurai->save();
    }

    public function send(MinitCurai $minitCurai)
    {
    }
}
