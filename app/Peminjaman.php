<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Peminjaman extends Model
{
    use SoftDeletes;

    protected $table = 'peminjaman';

    protected $fillable = [
        'users_id', 'ruangan_id', 'kegiatan', 'tanggal_peminjaman', 'status_peminjaman'
    ];

    public function ruangan(){
        return $this->belongsTo(Ruangan::class, 'ruangan_id', 'id');
    }

    public function users(){
        return $this->belongsTo(User::class, 'users_id', 'id');
    }
}
