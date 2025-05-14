<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    use HasFactory;

    protected $fillable = ['nom'];

    // Une catégorie a plusieurs types de vêtements
    public function typesVetements()
    {
        return $this->hasMany(types_vetements::class);
    }
}
