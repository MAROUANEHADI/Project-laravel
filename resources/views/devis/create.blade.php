@extends('layout')
@section('content')
<div class="col-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Nouveau Devis</h4>
            <form action="{{ url('devis') }}" enctype="multipart/form-data" method="POST">
                @csrf

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Client</label>
                            <div class="col-sm-9">
                                <select name="client_id" id="client_id" class="form-select">
                                    @foreach ($clients as $client)
                                    <option value="{{ $client->id }}">{{ $client->nom }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Nom Société</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="nom_societe" required />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Date</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control" name="date" required />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">ICE</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="ice" required />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Objet</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="objet" required />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="/devis" class="btn btn-light">Fermer</a>
                    <button type="submit" class="btn btn-gradient-primary me-2">Sauvegarder</button>

                </div>

                {{-- Service de la Devis --}}
                <div class="col-md-12 container text-center mt-4">
                    <div class="row">
                        <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="MatierePremiere-tab" data-bs-toggle="tab" data-bs-target="#MatierePremiere" type="button" role="tab" aria-controls="MatierePremiere" aria-selected="true">Services de la Devis</button>
                            </li>
                            <li class="nav-item" role="presentation">
                            </li>
                            <li class="nav-item" role="presentation">
                            </li>
                            <li class="nav-item" role="presentation">
                            </li>
                        </ul>
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="MatierePremiere" role="tabpanel" aria-labelledby="MatierePremiere-tab">
                                        <table>
                                            @php
                                            $index = 0;
                                            @endphp
                                            <tbody id="ligneContainer">
                                                <!-- Existing rows -->
                                                <tr>
                                                    <td>
                                                        <div class="input-group input-group-sm mb-3">
                                                            <span class="input-group-text" id="inputGroup-sizing-sm">Service</span>
                                                            <select name="data[{{ $index }}][service_id]" id="service_id" class="form-select">
                                                                @foreach ($services as $service)
                                                                <option value="{{ $service->id }}">
                                                                    {{ $service->description }}
                                                                </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="input-group input-group-sm mb-3">
                                                            <span class="input-group-text" id="inputGroup-sizing-sm">Quantité</span>
                                                            <input type="text" class="form-control" name="data[{{ $index }}][quantite]" required>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="input-group input-group-sm mb-3">
                                                            <span class="input-group-text" id="inputGroup-sizing-sm">P.U</span>
                                                            <input type="text" class="form-control" name="data[{{ $index }}][prix_ht]" required>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="input-group input-group-sm mb-3">
                                                            <span class="input-group-text" id="inputGroup-sizing-sm">Tva</span>
                                                            <input type="text" class="form-control" name="data[{{ $index }}][tva]" required>
                                                        </div>
                                                    </td>
                                                </tr>

                                            </tbody>
                                        </table>
                                        <button type="button" id="ajouterLigneBtn" class="btn btn-sm btn-primary">Ajouter
                                            ligne</button>
                                    </div>
                                </div>
                            </div>
                        </div>
            </form>
        </div>
    </div>
</div>







<script>
        // Plain JavaScript
        var index = {{ $index }};

        document.getElementById('ajouterLigneBtn').addEventListener('click', function() {
            var container = document.getElementById('ligneContainer');
            var newRow = document.createElement('tr');
            // Increment the index variable
            index++;
            // Add content to the new row
            newRow.innerHTML = `
  <td>
                                                        <div class="input-group input-group-sm mb-3">
                                                            <span class="input-group-text" id="inputGroup-sizing-sm">Service</span>
                                                            <select name="data[${index}][service_id]" id="service_id" class="form-select">
                                                                @foreach ($services as $service)
                                                                    <option value="{{ $service->id }}">{{ $service->description }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="input-group input-group-sm mb-3">
                                                            <span class="input-group-text" id="inputGroup-sizing-sm">Quantité</span>
                                                            <input type="text" class="form-control" name="data[${index}][quantite]" required>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="input-group input-group-sm mb-3">
                                                            <span class="input-group-text" id="inputGroup-sizing-sm">P.U</span>
                                                            <input type="text" class="form-control" name="data[${index}][prix_ht]" required>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="input-group input-group-sm mb-3">
                                                            <span class="input-group-text" id="inputGroup-sizing-sm">Tva</span>
                                                            <input type="text" class="form-control" name="data[${index}][tva]" required>
                                                        </div>
                                                    </td>
  `;

            // Append the new row to the container
            container.appendChild(newRow);
        });

        // jQuery
        $('#ajouterLigneBtn').click(function() {
            var container = $('#ligneContainer');
            var newRow = $('<tr>').html(`
    <td>New Cell 1</td>
    <td>New Cell 2</td>
    <td>New Cell 3</td>
  `);

            // Append the new row to the container
            container.append(newRow);
        });
</script>
