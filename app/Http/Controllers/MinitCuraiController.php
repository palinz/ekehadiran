<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Base\BaseController;

class MinitCuraiController extends BaseController
{
    public function index()
    {
        return $this->renderView('minitcurai.index');
    }
}
