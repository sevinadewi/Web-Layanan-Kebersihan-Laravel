<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description_text',
        'description_poin',
        'price',
        'picture',
    ];

    protected $casts = [
        'description_poin' => 'array',// Mengubah JSON menjadi array saat digunakan
    ];
}
