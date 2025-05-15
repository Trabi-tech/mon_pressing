<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Details_factures extends Model
{
    use HasFactory;

    protected $fillable = [
        'facture_id',
        'categorie_id',
        'types_vetements_id',
        'quantite',
        'prix_unitaire',
    ];

    public function facture()
    {
        return $this->belongsTo(Facture::class);
    }

    public function typeVetement()
    {
        return $this->belongsTo(types_vetements::class);
    }
}



