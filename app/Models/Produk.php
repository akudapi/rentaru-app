<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    
    protected $table = 'tb_produk';
    protected $fillable = ['judulProduk', 'gambar', 'harga', 'deskripsi', 'alamatToko', 'logoToko', 'namaToko', 'sosmed'];
    public $timestamps = true;

    public function comments()
    {
        return $this->hasMany(Komentar::class);
    }

    public function favorite()
    {
        return $this->hasMany(Favorite::class);
    }
    
}
