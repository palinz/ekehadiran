<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MinitCuraiFlow extends Model
{
    protected $table = 'minitcurai_flow';

    protected $fillable = ['from_anggota_id', 'to_anggota_id'];
}
