<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Commande;
use App\Models\Produit;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $produits=Produit::all();
        return view('home',compact('produits'));
    }
    public function dashboard()
    {
        $user = auth()->user();

        $users=User::all();
        $commandes=Commande::all();
        $categories=Categorie::all();
        $products=Produit::all();
        if ( $user->role =="admin"){
            return view('dashboard',compact('users','categories','commandes','products'));
        }else{
            $mcommandes=Commande::where('user_id',$user->id)->get();
            return view('dashboard_client',compact('mcommandes','categories','commandes','products'));
        }
    }
}
