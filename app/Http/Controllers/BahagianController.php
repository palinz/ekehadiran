<?php

namespace App\Http\Controllers;

use App\Department;
use Illuminate\Http\Request;

class BahagianController extends Controller
{
    public function create()
    {
        return view('bahagian.create');
    }

    public function store(Request $request)
    {
        Department::inserting([
            'deptname' => $request->txtNamaBahagian,
            'supdeptid' => $request->txtDepartmentId,
        ]);
    }

    public function edit(Department $dept)
    {
        return view('bahagian.edit', compact('dept'));
    }

    public function update(Request $request, Department $dept)
    {
        $dept->processUpdating([
            'deptname' => $request->txtNamaBahagian,
            'supdeptid' => $request->txtDepartmentId,
        ]);
    }

    public function destroy(Department $dept)
    {
        $dept->delete();
    }
}
