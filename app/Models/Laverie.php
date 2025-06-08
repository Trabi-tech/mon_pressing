<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laverie extends Model
{
    use HasFactory;
    protected $fillable = ['nom', 'adresse', 'user_id','telephone']; // si tu as un user_id lié


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
