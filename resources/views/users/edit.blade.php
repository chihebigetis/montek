@extends('layouts.app2')

@section('content')

    <div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">Utilisateurs</p>
                                <h5 class="font-weight-bolder mb-0">
                                    <span class="text-success text-sm font-weight-bolder">{{$users->count()}}</span>
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">Catégories</p>
                                <h5 class="font-weight-bolder mb-0">
                                    <span class="text-success text-sm font-weight-bolder">{{$categories->count()}}</span>
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">Produits</p>
                                <h5 class="font-weight-bolder mb-0">
                                    <span class="text-danger text-sm font-weight-bolder">{{$products->count()}}</span>
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">Commandes</p>
                                <h5 class="font-weight-bolder mb-0">
                                    <span class="text-success text-sm font-weight-bolder">{{$commandes->count()}}</span>
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row my-4">
        <div class="col-lg-12 col-md-6 mb-md-0 mb-4">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="row">
                        <div class="col-lg-6 col-7">
                            <h6>Modifier l'utilisateur {{$user->name}}</h6>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <form action="{{route('users.update')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label >Nom </label>
                                <input type="text" class="form-control"  value="{{$user->name}}" name="name" required>
                            </div>
                            <div class="form-group">
                                <label >Email </label>
                                <input type="email" class="form-control" name="email"   value="{{$user->email}}">
                            </div>
                            <div class="form-group">
                                <label >Role</label>
                                <select  class="form-control" name="role">
                                    <option value="admin" @if($user->role=="admin") selected @endif>Admin</option>
                                    <option value="client" @if($user->role=="client") selected @endif>Client</option>

                                </select>
                            </div>
                            <div class="form-group">
                                <label >Password</label>
                                <input type="password" class="form-control" name="password"  placeholder="Password">
                            </div>
                            <input type="hidden" value="{{$user->id}}" name="id">

                            <button type="submit" class="btn btn-primary">Modifier</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
