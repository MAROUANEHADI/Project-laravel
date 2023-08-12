<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\DetailDevis;
use App\Models\Devis;
use App\Models\Service;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class DevisController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index(Request $request)
    {
        $devisp = Devis::paginate(15);
        $search = $request->input('search');

        $devis = Devis::where("archive", 0)
            ->where(function ($query) use ($search) {
                $query->where('nom_societe', 'LIKE', "%$search%")
                ->orWhere('date', 'LIKE', "%$search%")
                ->orWhere('objet', 'LIKE', "%$search%")
                ->orWhere('ice', 'LIKE', "%$search%")
                ->orWhere('id', 'LIKE', "%$search%");
            })
            ->orderBy('id', 'desc')
            ->paginate(15);

        return view('devis.index', ['devis' => $devis,'devisp' => $devisp]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clients = Client::where("archive",0)->get();
        $services = Service::where("archive",0)->get();
        return view('devis.create', ['clients' => $clients, 'services' => $services]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $devis = new Devis();
        $devis->date = $request->date;
        $devis->nom_societe = $request->nom_societe;
        $devis->objet = $request->objet;
        $devis->ice = $request->ice;
        $devis->client_id = $request->client_id;
        $devis->save();

        $rows = $request->input('data');
        foreach ($rows as $row) {
            $detailDevis = new DetailDevis();
            $detailDevis->devis_id = $devis->id;
            $detailDevis->service_id = $row['service_id'];
            $detailDevis->quantite = $row['quantite'];
            $detailDevis->prix_ht = $row['prix_ht'];
            $detailDevis->tva = $row['tva'];
            $detailDevis->save();
        }
        Alert::success('Success', 'Données enregistrées avec succès');




        return redirect()->route("devis.index");
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $devis = Devis::find($id);
        return view('devis.show', ['devis' => $devis]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $devis = Devis::find($id);
        $clients = Client::where("archive",0)->get();
        return view('devis.edit', ['devis' => $devis, 'clients' => $clients]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $devis = Devis::find($id);
        $devis->date = $request->date;
        $devis->nom_societe = $request->nom_societe;
        $devis->objet = $request->objet;
        $devis->ice = $request->ice;
        $devis->client_id = $request->client_id;
        $devis->save();
        Alert::success('Success', 'Données modifié avec succès');

        return redirect()->route("devis.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $devis = Devis::find($id);
        // if ($devis->detail_devis()->exists() || $devis->factures()->exists()) {
        //     Alert::error('Error', 'Ce devis a des detail devis associés.');
        //     return redirect()->back();
        // }
        $devis->archive=1;
        $devis->save();
        Alert::success('Success', 'Supprimé avec succès');

        return redirect()->route("devis.index");
    }
}
