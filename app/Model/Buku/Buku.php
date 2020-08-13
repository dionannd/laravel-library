<?php

namespace App\Model\Buku;

use Illuminate\Database\Eloquent\Model;
use App\Model\Kategori\Kategori;
use App\Model\Letak\Letak;

class Buku extends Model
{
    protected $guarded = [];
    protected $table = 'buku';

    public function kategori()
    {
    	return $this->belongsTo(Kategori::class, 'id_kategori', 'id');
    }

    public function letak()
    {
    	return $this->belongsTo(Letak::class, 'id_letak', 'id');
    }
}
