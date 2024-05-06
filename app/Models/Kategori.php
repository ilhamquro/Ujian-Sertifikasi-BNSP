<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Buku;

class Kategori extends Model
{
    use HasFactory;


    protected $table = "kategori";

    protected $fillable = [
        'kategori',
    ];
    public $timestamps = false;
    public function buku()
    {
        return $this->hasMany(Buku::class, 'kategori_id', 'id');
    }
}
