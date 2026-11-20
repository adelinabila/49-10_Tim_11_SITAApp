<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    public const MIN_SKS_SIDANG = 144;

    protected $table = 'mahasiswa';

    protected $fillable = ['nama', 'nim', 'angkatan', 'sks', 'status'];

    protected function statusSidang(): Attribute
    {
        return Attribute::get(fn () => $this->sks >= self::MIN_SKS_SIDANG
            ? 'Dapat mengikuti sidang'
            : 'Tidak bisa mengikuti sidang');
    }
}
