<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MappingGenerator extends Model
{
    protected $table = 'mapping_generators';
    protected $fillable = ['idBan', 'idMotor'];

    public function ban()
    {
        return $this->belongsTo(Masterban::class, 'idBan');
    }

    public function motor()
    {
        return $this->belongsTo(Mastermotor::class, 'idMotor');
    }
}
