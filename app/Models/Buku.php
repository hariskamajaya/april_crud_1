<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    protected $table = 'buku';

    protected $fillable = [
        'judul_buku', 'penulis', 'penerbit', 'cover', 'deskripsi', 'id_lemari'
    ];

    public function lemari()
    {
        return $this->belongsTo(Lemari::class, 'id_lemari');
    }

}
