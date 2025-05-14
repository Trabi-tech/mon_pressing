<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class types_vetements extends Model
{
    use HasFactory;
    protected $fillable = ['nom', 'categorie_id'];

    // Un type de vêtement appartient à une catégorie
    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }

    public function detailsFactures()
    {
        return $this->hasMany(Details_factures::class);
    }
}
