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
        'adresse',
        'num_tel',
    ];
    protected $dates = [
        'created_at',
        'updated_at',
    ];
    public function client()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id')->first();
    }
    public function produit()
    {
        return $this->hasOne('App\Models\Produit', 'id', 'produit_id')->first();
    }
}
