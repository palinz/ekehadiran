<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MinitCuraiFlow extends Model
{
    protected $table = 'minitcurai_flow';

    protected $fillable = ['from_anggota_id', 'to_anggota_id', 'is_forward'];

    public function senderAnggota()
    {
        return $this->belongsTo(Anggota::class, "from_anggota_id", "userid");
    }
}
