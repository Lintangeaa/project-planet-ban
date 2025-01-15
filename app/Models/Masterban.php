<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Masterban extends Model
{
    use HasFactory;
    protected $table = 'masterban';
    public $timestamps = false;

    protected $fillable = [
        'namaBanSistem',
        'namaBanUmum',
        'ukuranBan',
        'ringBan',
        'urlBan'
    ];
}
