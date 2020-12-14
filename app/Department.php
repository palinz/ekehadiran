<?php

namespace App;

use Auth;
use App\Base\BaseModel;
use App\Abstraction\Flowable;

class Department extends BaseModel implements Flowable
{
    public function __construct()
    {
        $this->table = 'departments';
        $this->setDateFormat(config('pcrs.modelDateFormat'));
        $this->primaryKey = 'deptid';
    }

    public static function inserting($fields)
    {
        $department = new Department;

        $department->deptname = $fields['deptname'];
        $department->supdeptid = $fields['supdeptid'];
        $department->save();
    }

    public function processUpdating($fields)
    {
        $this->deptname = $fields['deptname'];
        $this->supdeptid = $fields['supdeptid'];
        $this->save();
    }

    public function anggota()
    {
        return $this->hasMany(Anggota::class, 'defaultdeptid');
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_user');
    }

    public function flow()
    {
        return $this->hasOne(FlowBahagian::class, 'dept_id');
    }

    public function children()
    {
        return $this->hasMany(self::class, 'supdeptid', 'deptid');
    }

    public function parent()
    {
        return $this->hasOne(self::class, 'deptid', 'supdeptid');
    }

    public static function senaraiDepartment()
    {
        return self::when(Auth::user()->username !== env('PCRS_DEFAULT_USER_ADMIN', 'admin'), function ($query) {
            $query->authorize();
        })
            ->orderBy('deptname')->get();
    }

    public static function scopeAuthorize($query)
    {
        $related = [];
        $effectedDept = Auth::user()->roles()->where('key', Auth::user()->perananSemasa()->key)->get()->map(function ($item, $key) {
            return $item->pivot->department_id;
        })->flatten()->unique()->toArray();

        foreach ($effectedDept as $dept) {
            $related = array_merge($related, array_flatten(Utility::pcrsRelatedDepartment(Department::all(), $dept)));
        }

        $query->whereIn('deptid', array_merge($effectedDept, $related));
    }

    public function updateFlow($request)
    {
        $this->flow()->updateOrCreate([], ['flag' => $request->input('flag'), 'ubah_user_id' => Auth::user()->username]);
    }
}
