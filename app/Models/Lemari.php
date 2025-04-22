<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lemari extends Model
{
    //kenalkan tabel lemari dengan model

    protected $table = 'lemari';

    protected $fillable = [
        'nama_lemari', 'deskripsi'
    ];
}
