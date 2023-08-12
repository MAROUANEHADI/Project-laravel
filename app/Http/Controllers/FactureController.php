<?php

namespace App\Http\Controllers;

use App\Models\Devis;
use App\Models\Facture;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class FactureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $devis = Devis::where("archive", 0)->get();
        $search = $request->input('search');

        $factures = Facture::where("archive", 0)
            ->where(function ($query) use ($search) {
                $query->where('nom_societe', 'LIKE', "%$search%")
                    ->orWhere('date', 'LIKE', "%$search%")
                    ->orWhere('objet', 'LIKE', "%$search%")
                    ->orWhere('ice', 'LIKE', "%$search%")
                    ->orWhere('id', 'LIKE', "%$search%");
            })
            ->orderBy('id', 'desc')
            ->paginate(15);

        return view('facture.index', ['factures' => $factures,'devis' => $devis]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $facture=new Facture();
        $facture->date=$request->date;
        $facture->nom_societe=$request->nom_societe;
        $facture->objet=$request->objet;
        $facture->ice=$request->ice;
        $facture->devis_id=$request->devis_id;
        $facture->save();
        Alert::success('Success', 'Données enregistrées avec succès');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Facture $facture)
    {
        return view('facture.show',['facture'=>$facture]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Facture $facture)
    {
        $devis=Devis::where("archive",0)->get();
        return view('facture.edit',['facture'=>$facture,'devis'=>$devis]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Facture $facture)
    {
        $facture->date=$request->date;
        $facture->nom_societe=$request->nom_societe;
        $facture->objet=$request->objet;
        $facture->ice=$request->ice;
        $facture->devis_id=$request->devis_id;
        $facture->save();
        Alert::success('Success', 'Données modifié avec succès');
        return redirect()->route("facture.index");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Facture $facture)
    {
        $facture->archive=1;
        $facture->save();
        Alert::success('Success', 'Supprimé avec succès');

        return redirect()->route("facture.index");
    }
}
