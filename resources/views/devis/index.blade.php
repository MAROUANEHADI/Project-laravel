@extends('layout')
@section('content')
<form action="{{ url('devis') }}" method="GET">
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
                        <h4 class="card-title">Devis</h4>
                    </div>

                    <div class="col-4 d-flex justify-content-end ">
                        <a href="{{ url('devis/create') }}" class="btn btn-primary">
                            Nouveau Devis
                        </a>

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
                            <th> Client </th>
                            <th> Action </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($devis as $devis)
                            <tr>
                                <td>{{ $devis->id }}</td>
                                <td>{{ $devis->date }}</td>
                                <td>{{ $devis->objet }}</td>
                                <td>{{ $devis->nom_societe }}</td>
                                <td>{{ $devis->ice }}</td>
                                <td>{{ $devis->client->nom }}<br>{{ $devis->client->prenom }}</td>
                                <td>
                                    <div class="dropdown">
                                        <a class="btn" href="#" role="button" data-bs-toggle="dropdown"
                                            aria-expanded="false">
                                            <i class="bi bi-three-dots-vertical"></i>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item"
                                                    href="{{ url('devis/' . $devis->id . '/edit') }}"><i
                                                        class="bi bi-pencil-square"></i> Modifier</a></li>
                                            <li><a class="dropdown-item" href="{{ url('devis/' . $devis->id) }}"><i
                                                        class="bi bi-info-circle"></i> Détails</a></li>

                                            <form action="{{ url('devis/' . $devis->id) }}" method="POST">
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
                                <td colspan="9">il n'ya pas de devis</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

        @if ($devisp->hasPages())
        <div class="pagination-summary">
            <p>Showing {{ $devisp->firstItem() }} to {{ $devisp->lastItem() }} of {{ $devisp->total() }} records</p>
        </div>
        <nav>
            <ul class="pagination">
                {{-- Previous Page Link --}}
                @if ($devisp->onFirstPage())
                    <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                        <span class="page-link" aria-hidden="true">&lsaquo;</span>
                    </li>
                @else
                    <li class="page-item">
                        <a class="page-link" href="{{ $devisp->previousPageUrl() }}" rel="prev"
                            aria-label="@lang('pagination.previous')">&lsaquo;</a>
                    </li>
                @endif

                {{-- Pagination Elements --}}
                @foreach ($devisp as $devis)
                    <li class="page-item {{ $devisp->currentPage() === $loop->iteration ? 'active' : '' }}">
                        <a class="page-link"
                            href="{{ url()->current() }}?page={{ $loop->iteration }}">{{ $loop->iteration }}</a>
                    </li>
                @endforeach

                {{-- Next Page Link --}}
                @if ($devisp->hasMorePages())
                    <li class="page-item">
                        <a class="page-link" href="{{ $devisp->nextPageUrl() }}" rel="next"
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
