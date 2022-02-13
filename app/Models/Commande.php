<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;
    protected $table = 'commandes';
    protected $fillable = [
        'user_id',
        'produit_id',
        'quantity',
        'total_price',
    ];
    protected $dates = [
        'created_at',
        'updated_at',
    ];
}
