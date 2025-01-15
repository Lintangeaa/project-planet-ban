<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mastermarketplace extends Model
{
    use HasFactory;
    protected $table = 'marketplace';

    public function stokVirtual()
    {
        return $this->hasMany(Mastervirtual::class, 'idMarketplace', 'idMarketplace');
    }
}
