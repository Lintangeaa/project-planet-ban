<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Masterban extends Model
{
    use HasFactory;
    protected $primaryKey = 'idBan';
    protected $table = 'masterban';
    public $timestamps = false;

    protected $fillable = [
        'namaBanSistem',
        'namaBanUmum',
        'ukuranBan',
        'ringBan',
        'urlBan'
    ];

    public function mappingGenerators()
    {
        return $this->hasMany(MappingGenerator::class, 'idBan');
    }

}
