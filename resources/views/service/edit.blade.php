@extends('layout')
@section('content')



<div class="col-12">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Modifie Service</h4>
        <form action="{{ url('service/' . $service->id) }}" enctype="multipart/form-data" method="POST">
            @csrf
            @method('PUT')
          <div class="row">
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Description</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control"  name="description" value="{{ $service->description }}" required/>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Prix ht</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="prix_ht" value="{{ $service->prix_ht }}" required/>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Tva</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="tva" value="{{ $service->tva }}" required/>
                </div>
              </div>
            </div>
          </div>

          <a href="/service" class="btn btn-light">Fermer</a>
          <button type="submit" class="btn btn-gradient-primary me-2">Sauvegarder</button>
        </form>
      </div>
    </div>
  </div>
@endsection
