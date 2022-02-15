@extends('layouts.appfront')

@section('content')
        <div class="container-fluid my-4" style="padding-top: 100px">
            <div class="col-lg-12 col-md-6 mb-md-0 mb-4">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="row">
                            <div class="col-lg-6 col-7">
                                <h6>Ajouter une commande</h6>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <form action="{{route('produits.store_order')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @if($user_auth->role=='admin')
                            <div class="form-group">
                                <label >Client</label>
                                <select  class="form-control" name="client_id">
                                    @foreach($users as $user)
                                        <option value="{{$user->id}}">{{$user->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            @endif
                            <div class="form-group">
                                <label >Qunatité </label>
                                <input type="number" class="form-control" name="quantity"   placeholder="Quantité">
                            </div>

                            <div class="form-group">
                                <label >Adresse</label>
                                <input type="text" class="form-control" name="adresse"  placeholder="Adresse de livraison" required>
                            </div>
                            <div class="form-group">
                                <label >Téléphone</label>
                                <input type="text" class="form-control" name="num_tel"  placeholder="saisir le numéro de téléphone" required>
                            </div>
                            <input type="hidden"  name="produit_id"  value="{{$produit->id}}">
                            <input type="hidden"  name="user_id"  value="{{$user_auth->id}}">

                            <button type="submit" class="btn btn-primary">Ajouter</button>
                            <a href="{{route('welcome')}}" class="btn btn-primary">Retour</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>

@endsection
