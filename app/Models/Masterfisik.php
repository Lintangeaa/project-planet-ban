<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Masterfisik extends Model
{
    use HasFactory;
    protected $table = 'stokfisikban';
    public $timestamps = false;

    public function masterBan(){
        return $this->belongsTo(Masterban::class, 'idBan', 'idBan');
    }
}
