<?php

namespace App\Http\Controllers;

use App\Acara;

class AcaraController extends Controller
{
    public function index(Acara $acara)
    {
        //$tkhMula = \Carbon\Carbon::now();
        $tkhMula = \Carbon\Carbon::createFromFormat('Y-m-d', '2020-12-01');
        $tkhTamat = clone $tkhMula;

        return $acara
            ->getByDateRange($tkhMula, $tkhTamat->addDay(30))
            ->with("xtra_userinfo")
            ->get();
    }
}
