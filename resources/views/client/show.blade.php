@extends('layout')
@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-4">
                        <div class="form-group row">
                            <h3>Nom Société</h3>
                            <div class="col-sm-9">
                                <p>{{ $client->nom_societe }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group row">
                            <h3>Prenom</h3>
                            <div class="col-sm-9">
                                <p>{{ $client->prenom }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="form-group row">
                            <h3>Nom</h3>
                            <div class="col-sm-9">
                                <p>{{ $client->nom }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <div class="form-group row">
                            <h3>Telephone</h3>
                            <div class="col-sm-9">
                                <p>{{ $client->telephone }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group row">
                            <h3>ICE</h3>
                            <div class="col-sm-9">
                                <p>{{ $client->ice }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="form-group row">
                            <h3>Adresse</h3>
                            <div class="col-sm-9">
                                <p>{{ $client->adresse }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <div class="form-group row">
                            <h3>Nombre Devis</h3>
                            <div class="col-sm-9">
                                <p>{{ $client->scoop_Nb_devis() }}</p>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    <a href="/client" class="btn btn-light mt-2">Fermer</a>
    </div>
@endsection
