<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Commande;
use App\Models\Produit;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Image;
class ProduitController extends Controller
{
    public function index(){
        $users=User::all();
        $commandes=Commande::all();
        $categories=Categorie::all();
        $products=Produit::all();
        return view('produits.index',compact('users','categories','commandes','products'));
    }
    public function index_commandes(){
        $users=User::all();
        $commandes=Commande::all();
        $categories=Categorie::all();
        $products=Produit::all();
        return view('commandes.index',compact('users','categories','commandes','products'));
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
        if ($request->hasFile('photo')) {
            if (!file_exists(Storage::path('public/uploads/photosProduits/'))) {
                mkdir(Storage::path('public/uploads/photosProduits/'), 666, true);
            }
            $photo = $request->file('photo');
            $filename = time() . '.' . $photo->getClientOriginalExtension();
            Image::make($photo)->resize(450, 300)->save(Storage::path('public/uploads/photosProduits/' . $filename));
            $produit->image = 'uploads/photosProduits/' . $filename;
        }
        $produit->save();
        return redirect()->route('produits');
    }
    public function edit($id)
    {
        $produit=Produit::find($id);
        $users=User::all();
        $commandes=Commande::all();
        $categories=Categorie::all();
        $products=Produit::all();
        return view('produits.edit',compact('produit','users','categories','commandes','products'));
    }
    public function update(Request $request){
        //dd($request->all());
        $validator = Validator::make($request->all(), [
            'reference' => 'required|unique:produits,reference,' . $request->product_id,
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }
        $produit=Produit::find($request->product_id);
        $produit->name=$request->name;
        $produit->categorie_id=$request->categorie;
        $produit->quantity=$request->quantity;
        $produit->price=$request->price;
        $produit->reference=$request->reference;
        if ($request->hasFile('photo')) {
            if (!file_exists(Storage::path('public/uploads/photosProduits/'))) {
                mkdir(Storage::path('public/uploads/photosProduits/'), 666, true);
            }
            $photo = $request->file('photo');
            $filename = time() . '.' . $photo->getClientOriginalExtension();
            Image::make($photo)->resize(450, 300)->save(Storage::path('public/uploads/photosProduits/' . $filename));
            $produit->image = 'uploads/photosProduits/' . $filename;
        }
        $produit->save();
        return redirect()->route('produits');
    }
    public function destroy(Request $request)
    {
        //dd($request->produit_id);
        $produit = Produit::findOrFail($request->produit_id);
        $produit->delete();
        return redirect()->route('produits');
    }
    public function order($id){
        $user_auth=auth::user();
        $produit=Produit::find($id);
        $users=User::all();

        return view('produits.order',compact('produit','users','user_auth'));
    }
    public function store_order(Request $request){
//dd($request->all());
        $produit=Produit::find($request->produit_id);
        $auth=User::find($request->user_id);
      $commande=new Commande();
      if($auth->role=='admin'){
          $commande->user_id=$request->client_id;
      }else{
          $commande->user_id=$auth->id;
      }
        $commande->produit_id=$produit->id;
        $commande->num_tel=$request->num_tel;
        $commande->quantity=$request->quantity;
        $commande->adresse=$request->adresse;
        $commande->total_price=$request->quantity*$produit->price;
        $commande->save();
        return redirect()->route('welcome');
    }
}

