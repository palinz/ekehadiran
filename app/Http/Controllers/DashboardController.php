<?php

namespace App\Http\Controllers;

use App\Base\BaseController;
use Illuminate\Http\Request;

class DashboardController extends BaseController
{
    public function index()
    {
        return $this->renderView('acara.index');
    }
}
