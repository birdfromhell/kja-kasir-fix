<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
        '_token',
    ];

    // Relasi dengan Perusahaan
    public function perusahaan()
    {
        return $this->belongsTo(Perusahaan::class, 'kode_perusahaan'); // Pastikan foreign key benar
    }

    // Relasi dengan Kategori
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id'); // Pastikan kolom foreign key benar
    }

    // Relasi dengan Kelompok
    public function kelompok()
    {
        return $this->belongsTo(Kelompok::class, 'kelompok_id'); // Pastikan kolom foreign key benar
    }

    // ... kode lainnya ...
}
