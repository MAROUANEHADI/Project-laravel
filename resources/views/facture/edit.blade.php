@extends('layout')
@section('content')



<div class="col-12">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Modifie Facture</h4>
        <form action="{{ url('facture/' . $facture->id) }}" enctype="multipart/form-data" method="POST">
            @csrf
            @method('PUT')
          <div class="row">
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Nom Société</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control"  name="nom_societe" value="{{ $facture->nom_societe }}" required/>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Date</label>
                <div class="col-sm-9">
                  <input type="date" class="form-control" name="date" value="{{ $facture->date }}" required/>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Objet</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="objet" value="{{ $facture->objet }}" required/>
                </div>
              </div>
            </div>
            <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">ICE</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="ice" value="{{ $facture->ice }}" required/>
                  </div>
                </div>
              </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Devis</label>
                <div class="col-sm-9">
                    <select name="devis_id" id="devis_id" class="form-select">
                        @foreach ($devis as $devis)
                            <option value="{{ $devis->id }}"
                                @php if($devis->id==$facture->devis_id){echo('selected="selected"');} @endphp>
                                {{ $devis->objet }}</option>
                        @endforeach
                    </select>
                </div>
              </div>
            </div>
          </div>
          <a href="/facture" class="btn btn-light">Fermer</a>
          <button type="submit" class="btn btn-gradient-primary me-2">Sauvegarder</button>
        </form>
      </div>
    </div>
  </div>
@endsection
