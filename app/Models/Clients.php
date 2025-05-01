<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class Clients extends Model
{
    public static function generateSlugusers()
    {
        $slugusers = Str::random(10);
        while (self::where('slug_client', $slugusers)->exists()) {
            $slugusers = Str::random(20);
        }
        return $slugusers;
    }
    use HasFactory;
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
