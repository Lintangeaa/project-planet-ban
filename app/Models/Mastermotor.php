<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mastermotor extends Model
{
    use HasFactory;
    protected $table = 'mastermotor';
    public $timestamps = false;

    protected $fillable = [
        'namaMotor',
        'ringMotorStd',
        'banDepan',
        'banBelakang'
    ];
}
