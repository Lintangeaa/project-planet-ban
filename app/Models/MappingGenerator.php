<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MappingGenerator extends Model
{
    protected $table = 'mappingban';
    public $timestamps = false;
    protected $fillable = ['idBan', 'idMotor', 'posisiBan'];

    public function ban()
    {
        return $this->belongsTo(Masterban::class, 'idBan');
    }

    public function motor()
    {
        return $this->belongsTo(Mastermotor::class, 'idMotor');
    }
}
