<?php

namespace App;

use App\MinitCurai;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;

class MinitCurai extends Model
{
    const DERAF = 'DERAF';
    const HANTAR = 'HANTAR';
    const PULANG = 'PULANG';
    const SAH = 'SAH';

    protected $table = 'minitcurai';

    protected $fillable = [
        'tajuk', 'anjuran', 'tarikh', 'lokasi', 'isu', 'anggota_id',
    ];

    protected $dates = [
        'tarikh',
    ];

    public function minitcurai_flow()
    {
        return $this->hasMany(MinitCuraiFlow::class, "minitcurai_id");
    }

    public static function menyimpan(Collection $fields)
    {
        $mc = self::create($fields->except(['from_anggota_id', 'to_anggota_id'])->toArray());
        $mc->minitCurai_flow()->save(new MinitCuraiFlow($fields->only(['from_anggota_id', 'to_anggota_id'])->toArray()));
    }

    public static function involvement()
    {
    }
}
