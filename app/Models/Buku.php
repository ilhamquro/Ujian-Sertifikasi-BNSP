<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kategori;
use Illuminate\Support\Carbon;

class Buku extends Model
{
    use HasFactory;
    protected $table = "buku";
    public function category()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id', 'id');
    }
    public function getCreatedAtAttribute()
    {
    return Carbon::parse($this->attributes['created_at']) ->isoFormat('dddd, D MMMM Y');
    }
}
