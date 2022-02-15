<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;
    protected $table = 'produits';
    protected $fillable = [
        'name',
        'categorie_id',
        'quantity',
        'price',
        'reference',
        'image',


    ];
    protected $dates = [
        'created_at',
        'updated_at',
    ];
    public function categorie()
    {
        return $this->hasOne('App\Models\Categorie', 'id', 'categorie_id')->first();
    }

}
