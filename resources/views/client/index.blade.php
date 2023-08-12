@extends('layout')
@section('content')
<form action="{{ url('client') }}" method="GET">
    <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Search..." name="search"
            value="{{ old('search') }}">
        <button class="btn btn-outline-secondary" type="submit">Search</button>
    </div>
</form>
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-8">
                        <h4 class="card-title">Clients</h4>
                    </div>

                    <div class="col-4 d-flex justify-content-end ">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addClient">
                            Nouveau Client
                        </button>
                        <!-- Modal Ajoute Client -->
                        <div class="modal fade" id="addClient" tabindex="-1" aria-labelledby="addClientLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form action="{{ url('client') }}" enctype="multipart/form-data" method="POST">
                                        @csrf
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="addClientLabel">Nouveau Client</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="input-group input-group-sm mb-3">
                                                <span class="input-group-text" id="inputGroup-sizing-sm">Nom Société</span>
                                                <input type="text" name="nom_societe" class="form-control" required>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="input-group input-group-sm mb-3">
                                                        <span class="input-group-text" id="inputGroup-sizing-sm">Nom</span>
                                                        <input type="text" name="nom" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="input-group input-group-sm mb-3">
                                                        <span class="input-group-text"
                                                            id="inputGroup-sizing-sm">Prenom</span>
                                                        <input type="text" name="prenom" class="form-control" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="input-group input-group-sm mb-3">
                                                <span class="input-group-text" id="inputGroup-sizing-sm">Telephone</span>
                                                <input type="text" name="telephone" class="form-control" required>
                                            </div>
                                            <div class="input-group input-group-sm mb-3">
                                                <span class="input-group-text" id="inputGroup-sizing-sm">ICE</span>
                                                <input type="text" name="ice" class="form-control" required>
                                            </div>
                                            <div class="input-group input-group-sm mb-3">
                                                <span class="input-group-text" id="inputGroup-sizing-sm">Adresse</span>
                                                <input type="text" name="adresse" class="form-control" required>
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Fermer</button>
                                            <button type="submit" class="btn btn-primary">Sauvegarder</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </p>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th></th>
                            <th> Id </th>
                            <th> Nom Société </th>
                            <th> Nom Prenom </th>
                            <th> Telephone </th>
                            <th> ICE </th>
                            {{-- <th> Adresse </th> --}}
                            <th> Nombre Devis </th>
                            <th> Action </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($clients as $client)
                            <tr>
                                <td><img src="../../assets/images/faces-clipart/pic-1.png" alt="image" /></td>
                                <td>{{ $client->id }}</td>
                                <td>{{ $client->nom_societe }}</td>
                                <td>{{ $client->nom }}<br>{{ $client->prenom }}</td>
                                <td>{{ $client->telephone }}</td>
                                <td>{{ $client->ice }}</td>
                                {{-- <td>{{ $client->adresse }}</td> --}}
                                <td> {{ $client->scoop_Nb_devis() }} </td>
                                <td>
                                    <div class="dropdown">
                                        <a class="btn" href="#" role="button" data-bs-toggle="dropdown"
                                            aria-expanded="false">
                                            <i class="bi bi-three-dots-vertical"></i>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item"
                                                    href="{{ url('client/' . $client->id . '/edit') }}"><i
                                                        class="bi bi-pencil-square"></i> Modifier</a></li>
                                            <li><a class="dropdown-item" href="{{ url('client/' . $client->id) }}"><i
                                                        class="bi bi-info-circle"></i> Détails</a></li>

                                            <form action="{{ url('client/' . $client->id) }}" method="POST"
                                                onsubmit="return submitForm(this);">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="dropdown-item"><i
                                                        class="bi bi-trash-fill"></i>Supprimer</button>
                                            </form>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9">il n'ya pas de client</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @if ($clients->hasPages())
        <div class="pagination-summary">
            <p>Showing {{ $clients->firstItem() }} to {{ $clients->lastItem() }} of {{ $clients->total() }} records</p>
        </div>
        <nav>
            <ul class="pagination">
                {{-- Previous Page Link --}}
                @if ($clients->onFirstPage())
                    <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                        <span class="page-link" aria-hidden="true">&lsaquo;</span>
                    </li>
                @else
                    <li class="page-item">
                        <a class="page-link" href="{{ $clients->previousPageUrl() }}" rel="prev"
                            aria-label="@lang('pagination.previous')">&lsaquo;</a>
                    </li>
                @endif

                {{-- Pagination Elements --}}
                @foreach ($clients as $client)
                    <li class="page-item {{ $clients->currentPage() === $loop->iteration ? 'active' : '' }}">
                        <a class="page-link"
                            href="{{ url()->current() }}?page={{ $loop->iteration }}">{{ $loop->iteration }}</a>
                    </li>
                @endforeach

                {{-- Next Page Link --}}
                @if ($clients->hasMorePages())
                    <li class="page-item">
                        <a class="page-link" href="{{ $clients->nextPageUrl() }}" rel="next"
                            aria-label="@lang('pagination.next')">&rsaquo;</a>
                    </li>
                @else
                    <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                        <span class="page-link" aria-hidden="true">&rsaquo;</span>
                    </li>
                @endif
            </ul>
        </nav>
    @endif

@endsection

<script>
    function submitForm(form) {
        swal({
                title: 'Es-tu sûr?',
                text: "Vous ne pourrez pas revenir en arrière !",
                icon: 'warning',
                buttons: true,
                dangerMode: true
            })
            .then((isOkay) => {
                if (isOkay) {
                    form.submit();
                }
            })
        return false;
    }
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
    integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
