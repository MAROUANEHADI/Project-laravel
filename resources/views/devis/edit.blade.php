@extends('layout')
@section('content')



<div class="col-12">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Modifie Devis</h4>
        <form action="{{ url('devis/' . $devis->id) }}" enctype="multipart/form-data" method="POST">
            @csrf
            @method('PUT')
          <div class="row">
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Nom Société</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control"  name="nom_societe" value="{{ $devis->nom_societe }}" required/>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Date</label>
                <div class="col-sm-9">
                  <input type="date" class="form-control" name="date" value="{{ $devis->date }}" required/>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Objet</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="objet" value="{{ $devis->objet }}" required/>
                </div>
              </div>
            </div>
            <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">ICE</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="ice" value="{{ $devis->ice }}" required/>
                  </div>
                </div>
              </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Client</label>
                <div class="col-sm-9">
                    <select name="client_id" id="client_id" class="form-select">
                        @foreach ($clients as $client)
                            <option value="{{ $client->id }}"
                                @php if($client->id==$devis->client_id){echo('selected="selected"');} @endphp>
                                {{ $client->nom }}</option>
                        @endforeach
                    </select>
                </div>
              </div>
            </div>
          </div>
          <a href="/devis" class="btn btn-light">Fermer</a>
          <button type="submit" class="btn btn-gradient-primary me-2">Sauvegarder</button>
        </form>
      </div>
    </div>
  </div>
@endsection
