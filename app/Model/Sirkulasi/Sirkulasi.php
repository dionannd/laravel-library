<?php

namespace App\Model\Sirkulasi;

use Illuminate\Database\Eloquent\Model;
use App\Model\Buku\Buku;
use App\Model\Anggota\Anggota;

class Sirkulasi extends Model
{
    protected $guarded = [];

    protected $table = 'sirkulasi';

    public function buku()
    {
    	return $this->belongsTo(Buku::class, 'id_buku', 'id');
    }

    public function anggota()
    {
    	return $this->belongsTo(Anggota::class, 'id_anggota', 'id');
    }
}
