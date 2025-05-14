<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facture extends Model
{
    use HasFactory;

    protected static function booted()
    {
        static::creating(function ($facture) {
            $latest = self::latest()->first();
            $lastId = $latest ? $latest->id : 0;

            $facture->numero = 'FAC-' . now()->format('Ymd') . '-' . str_pad($lastId + 1, 4, '0', STR_PAD_LEFT);
        });
    }

    public function client()
    {
        return $this->belongsTo(Clients::class);
    }

    public function details()
    {
        return $this->hasMany(Details_factures::class);
    }
}
