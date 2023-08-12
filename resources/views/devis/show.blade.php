@extends('layout')
@section('content')
<div class="col-lg-10 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Detail Devis N°{{$devis->id}}</h4>
        <p class="card-description">  <code>List Services</code>
        </p>
        <table class="table table-hover">
          <thead>
            <tr>
              <th>Service</th>
              <th>Quantité</th>
              <th>Prix</th>
              <th>Tva</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($devis->detail_devis as $detail_devis)
            <tr>
              <td>{{$detail_devis->service->description}}</td>
              <td>{{$detail_devis->quantite}}</td>
              <td class="text-danger"> {{$detail_devis->prix_ht}} </td>
              <td><label class="badge badge-danger">{{$detail_devis->tva}}</label></td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection
