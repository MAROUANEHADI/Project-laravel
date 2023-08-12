@extends('layout')
@section('content')
<form action="{{ url('facture') }}" method="GET">
    <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Search..." name="search" value="{{ old('search') }}">
        <button class="btn btn-outline-secondary" type="submit">Search</button>
    </div>
</form>
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-8">
                        <h4 class="card-title">Facture</h4>
                    </div>

                    <div class="col-4 d-flex justify-content-end ">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addClient">
                            Nouveau Facture
                        </button>
                        <!-- Modal Ajoute Client -->
                        <div class="modal fade" id="addClient" tabindex="-1" aria-labelledby="addClientLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form action="{{ url('facture') }}" enctype="multipart/form-data" method="POST">
                                        @csrf

                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="addClientLabel">Nouveau Facture</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="input-group input-group-sm mb-3">
                                                        <span class="input-group-text" id="inputGroup-sizing-sm">Date
                                                            Facture</span>
                                                        <input type="date" name="date" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="input-group input-group-sm mb-3">
                                                        <span class="input-group-text" id="inputGroup-sizing-sm">Nom
                                                            Société</span>
                                                        <input type="text" name="nom_societe" class="form-control"
                                                            required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="input-group input-group-sm mb-3">
                                                <span class="input-group-text" id="inputGroup-sizing-sm">ICE</span>
                                                <input type="text" name="ice" class="form-control" required>
                                            </div>
                                            <div class="input-group input-group-sm mb-3">
                                                <span class="input-group-text" id="inputGroup-sizing-sm">Objet</span>
                                                <input type="text" name="objet" class="form-control" required>
                                            </div>
                                            <div class="input-group input-group-sm mb-3">
                                                <span class="input-group-text" id="inputGroup-sizing-sm">Devis</span>
                                                <select name="devis_id" id="devis_id" class="form-select" required>
                                                    @foreach ($devis as $devis)
                                                        <option value="{{ $devis->id }}">{{ $devis->objet }}</option>
                                                    @endforeach
                                                </select>
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
                            <th> Id </th>
                            <th> Date </th>
                            <th> Objet </th>
                            <th> Nom Société </th>
                            <th> ICE </th>
                            <th> Devis </th>
                            <th> Action </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($factures as $facture)
                            <tr>
                                <td>{{ $facture->id }}</td>
                                <td>{{ $facture->date }}</td>
                                <td>{{ $facture->objet }}</td>
                                <td>{{ $facture->nom_societe }}</td>
                                <td>{{ $facture->ice }}</td>
                                <td>{{ $facture->devis->objet }}</td>
                                <td>
                                    <div class="dropdown">
                                        <a class="btn" href="#" role="button" data-bs-toggle="dropdown"
                                            aria-expanded="false">
                                            <i class="bi bi-three-dots-vertical"></i>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item"
                                                    href="{{ url('facture/' . $facture->id . '/edit') }}"><i
                                                        class="bi bi-pencil-square"></i> Modifier</a></li>
                                            <li><a class="dropdown-item" href="{{ url('facture/' . $facture->id) }}"><i
                                                        class="bi bi-info-circle"></i> Détails</a></li>

                                            <form action="{{ url('facture/' . $facture->id) }}" method="POST">
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
                                <td colspan="9">il n'ya pas de facture</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @if ($factures->hasPages())
        <div class="pagination-summary">
            <p>Showing {{ $factures->firstItem() }} to {{ $factures->lastItem() }} of {{ $factures->total() }} records</p>
        </div>
        <nav>
            <ul class="pagination">
                {{-- Previous Page Link --}}
                @if ($factures->onFirstPage())
                    <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                        <span class="page-link" aria-hidden="true">&lsaquo;</span>
                    </li>
                @else
                    <li class="page-item">
                        <a class="page-link" href="{{ $factures->previousPageUrl() }}" rel="prev"
                            aria-label="@lang('pagination.previous')">&lsaquo;</a>
                    </li>
                @endif

                {{-- Pagination Elements --}}
                @foreach ($factures as $facture)
                    <li class="page-item {{ $factures->currentPage() === $loop->iteration ? 'active' : '' }}">
                        <a class="page-link"
                            href="{{ url()->current() }}?page={{ $loop->iteration }}">{{ $loop->iteration }}</a>
                    </li>
                @endforeach

                {{-- Next Page Link --}}
                @if ($factures->hasMorePages())
                    <li class="page-item">
                        <a class="page-link" href="{{ $factures->nextPageUrl() }}" rel="next"
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
