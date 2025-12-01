<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'image', 'bio'];

    // Artist can have many cards
    public function cards()
    {
        return $this->belongsToMany(Card::class);
    }

}
