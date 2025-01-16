<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mastermotor extends Model
{
    use HasFactory;
    protected $primaryKey = 'idMotor';
    protected $table = 'mastermotor';
    public $timestamps = false;

    protected $fillable = [
        'namaMotor',
        'ringMotorStd',
        'banDepan',
        'banBelakang'
    ];

    public function mappingGenerators()
    {
        return $this->hasMany(MappingGenerator::class, 'idMotor');
    }
}
