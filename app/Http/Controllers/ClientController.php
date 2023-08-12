<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index(Request $request)
    {
        $search = $request->input('search');

        $clients = Client::where("archive", 0)
            ->where(function ($query) use ($search) {
                $query->where('nom_societe', 'LIKE', "%$search%")
                    ->orWhere('nom', 'LIKE', "%$search%")
                    ->orWhere('prenom', 'LIKE', "%$search%")
                    ->orWhere('telephone', 'LIKE', "%$search%")
                    ->orWhere('adresse', 'LIKE', "%$search%")
                    ->orWhere('id', 'LIKE', "%$search%");
            })
            ->orderBy('id', 'desc')
            ->paginate(15);

        return view('client.index', ['clients' => $clients]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $client = new Client();
        $client->nom = $request->nom;
        $client->nom_societe = $request->nom_societe;
        $client->prenom = $request->prenom;
        $client->telephone = $request->telephone;
        $client->ice = $request->ice;
        $client->adresse = $request->adresse;
        $client->save();
        Alert::success('Success', 'Données enregistrées avec succès');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        return view('client.show', ['client' => $client]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        return view('client.edit', ['client' => $client]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Client $client)
    {
        $client->nom = $request->nom;
        $client->nom_societe = $request->nom_societe;
        $client->prenom = $request->prenom;
        $client->telephone = $request->telephone;
        $client->ice = $request->ice;
        $client->adresse = $request->adresse;
        $client->save();
        Alert::success('Success', 'Données modifié avec succès');
        return redirect()->route("client.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        // if ($client->devis()->exists()) {
        //     Alert::error('Error', 'Ce client a des devis associés. Veuillez supprimer les devis avant de supprimer le client.');
        //     return redirect()->back();
        // }
        $client->archive = 1;
        $client->save();
        Alert::success('Success', 'Supprimé avec succès');
        return redirect()->route("client.index");
    }
}
