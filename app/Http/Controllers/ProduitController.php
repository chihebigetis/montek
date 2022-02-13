<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Commande;
use App\Models\Produit;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProduitController extends Controller
{
    public function index(){
        $users=User::all();
        $commandes=Commande::all();
        $categories=Categorie::all();
        $products=Produit::all();
        return view('produits.index',compact('users','categories','commandes','products'));
    }
    public function create()
    {
        $users=User::all();
        $commandes=Commande::all();
        $categories=Categorie::all();
        $products=Produit::all();
        return view('produits.create',compact('users','categories','commandes','products'));
    }
    public function store(Request $request){
        //dd($request->all());
        $validator = Validator::make($request->all(), [
            'reference' => 'required|unique:produits',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }

        $produit=new Produit();
        $produit->name=$request->name;
        $produit->categorie_id=$request->categorie;
        $produit->quantity=$request->quantity;
        $produit->price=$request->price;
        $produit->reference=$request->reference;
        $produit->save();
        return redirect()->route('produits');
    }
}
