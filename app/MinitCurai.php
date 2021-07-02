<?php

namespace App;

use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;

class MinitCurai extends Model
{
    const DERAF = 'DERAF';
    const HANTAR = 'HANTAR';
    const PULANG = 'PULANG';
    const SAH = 'DISAHKAN';
    const CETAK = 'CETAK';

    protected $table = 'minitcurai';

    protected $fillable = [
        'tajuk',
        'anjuran',
        'tarikh',
        'lokasi',
        'isu',
        'anggota_id',
        'tindakan',
        'pegawai_terlibat',
        'cadangan'
    ];

    protected $dates = [
        'tarikh',
    ];

    public function minitcurai_flow()
    {
        return $this->hasMany(MinitCuraiFlow::class, "minitcurai_id");
    }

    public function isOwner(User $user)
    {
        return $this->anggota_id == $user->anggota_id;
    }

    public function sender()
    {
        return $this->minitcurai_flow->last()->senderAnggota->xtraAttr;
    }

    public static function menyimpan(Collection $fields)
    {
        $mc = self::create($fields->except(['from_anggota_id', 'to_anggota_id'])->toArray());
        $mc->minitCurai_flow()->save(new MinitCuraiFlow($fields->only(['from_anggota_id', 'to_anggota_id'])->toArray()));
    }

    public function validating()
    {
        $this->flag = self::SAH;
        $this->save();
    }

    public static function majukan($mc, $fields)
    {
        $mc->minitCurai_flow()->save(new MinitCuraiFlow($fields->toArray()));
    }
}
