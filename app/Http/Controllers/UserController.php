<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Commande;
use App\Models\Produit;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
class UserController extends Controller
{
    public function index(){
        $users=User::all();
        $commandes=Commande::all();
        $categories=Categorie::all();
        $products=Produit::all();
        return view('users.index',compact('users','categories','commandes','products'));
    }
    public function create()
    {
        $users=User::all();
        $commandes=Commande::all();
        $categories=Categorie::all();
        $products=Produit::all();
        return view('users.create',compact('users','categories','commandes','products'));
    }
    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }
         $user=new User();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->role=$request->role;
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect()->route('users');

    }
    public function edit($id){
        $user=User::find($id);

        $users=User::all();

        $commandes=Commande::all();
        $categories=Categorie::all();
        $products=Produit::all();
        //dd($products);
        return view('users.edit',compact('user','users','categories','commandes','products'));
    }
    public function update(Request $request){

        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:users,email,' . $request->id,
            'password' => 'nullable|min:6',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }
        $user=User::find($request->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        if ($request->password){
            $user->password = Hash::make($request->password);
        }
        $user->save();
        return redirect()->route('users');
    }
    public function destroy(Request $request)
    {
        //dd($request->user_id);
        $user = User::findOrFail($request->user_id);
        $user->delete();
        return redirect()->route('users');
    }

}
