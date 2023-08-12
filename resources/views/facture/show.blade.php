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
                                <p>{{ $facture->nom_societe }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group row">
                            <h3>Date</h3>
                            <div class="col-sm-9">
                                <p>{{ $facture->date }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="form-group row">
                            <h3>Obejt</h3>
                            <div class="col-sm-9">
                                <p>{{ $facture->objet }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <div class="form-group row">
                            <h3>Devis</h3>
                            <div class="col-sm-9">
                                <p>{{ $facture->devis->objet }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group row">
                            <h3>ICE</h3>
                            <div class="col-sm-9">
                                <p>{{ $facture->ice }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <a href="/facture" class="btn btn-light mt-2">Fermer</a>
    </div>
@endsection
