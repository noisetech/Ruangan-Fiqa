<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ruangan extends Model
{
    use SoftDeletes;

    protected $table = 'ruangan';

    protected $fillable = [
        'nama_ruangan', 'kapasitas_ruangan', 'waktu_ketersedian_ruangan', 'status_ruangan'
    ];

    public function peminjaman(){
        return $this->hasOne(Ruangan::class);
    }
}
