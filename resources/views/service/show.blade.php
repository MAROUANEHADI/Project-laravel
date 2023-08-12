@extends('layout')
@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-4">
                        <div class="form-group row">
                            <h3>Description</h3>
                            <div class="col-sm-9">
                                <p>{{ $service->description }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group row">
                            <h3>Prix ht</h3>
                            <div class="col-sm-9">
                                <p class="text-danger">{{ $service->prix_ht }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="form-group row">
                            <h3>Tva</h3>
                            <div class="col-sm-9">
                                <p>{{ $service->tva }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <a href="/service" class="btn btn-light mt-2">Fermer</a>
    </div>
@endsection
