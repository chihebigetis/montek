<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Commande;
use App\Models\Produit;
use App\Models\User;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    public function index(){
        $users=User::all();
        $commandes=Commande::all();
        $categories=Categorie::all();
        $products=Produit::all();
        return view('categories.index',compact('users','categories','commandes','products'));
    }
    public function create()
    {
        $users=User::all();
        $commandes=Commande::all();
        $categories=Categorie::all();
        $products=Produit::all();
        return view('categories.create',compact('users','categories','commandes','products'));
    }
    public function store(Request $request){
        //dd($request->all());
        $categorie=new Categorie();
        $categorie->name=$request->name;
        $categorie->save();
        return redirect()->route('categories');
    }
}
