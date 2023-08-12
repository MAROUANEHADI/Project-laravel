@extends('layout')
@section('content')



<div class="col-12">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Modifie Client</h4>
        <form action="{{ url('client/' . $client->id) }}" enctype="multipart/form-data" method="POST">
            @csrf
            @method('PUT')
          <p class="card-description"> Personal info </p>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Nom Société</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control"  name="nom_societe" value="{{ $client->nom_societe }}" required/>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Telephone</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="telephone" value="{{ $client->telephone }}" required/>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Prenom</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="prenom" value="{{ $client->prenom }}" required/>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Nom</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="nom" value="{{ $client->nom }}" required/>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">ICE</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="ice" value="{{ $client->ice }}" required/>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Adresse</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="adresse" value="{{ $client->adresse }}" required/>
                </div>
              </div>
            </div>
          </div>
          <a href="/client" class="btn btn-light">Fermer</a>
          <button type="submit" class="btn btn-gradient-primary me-2">Sauvegarder</button>
        </form>
      </div>
    </div>
  </div>
@endsection
