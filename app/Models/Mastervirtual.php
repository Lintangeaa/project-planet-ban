<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mastervirtual extends Model
{
    use HasFactory;
    protected $table = 'stokvirtual';
    public $timestamps = false;

    protected $fillable = [
        'idStokFisik',
        'idMarketplace',
        'timeStok',
        'jumlahBan'
    ];


    public function stokBan()
    {
        return $this->belongsTo(Masterfisik::class, 'idStokFisik', 'idStokFisik');
    }

    public function marketplace()
    {
        return $this->belongsTo(Mastermarketplace::class, 'idMarketplace', 'idMarketplace');
    }

}
//nampilin dari nama ban id stok fisik dari table masterban