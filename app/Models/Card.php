<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasFactory;

    protected $fillable =[
        'card_name',
        'mana_cost',
        'type',
        'rarity',
        'rules_text',
        'image',
        'created_at',
        'updated_at'
    ];
}
