<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $services = Service::where("archive", 0)
            ->where(function ($query) use ($search) {
                $query->where('prix_ht', 'LIKE', "%$search%")
                    ->orWhere('description', 'LIKE', "%$search%")
                    ->orWhere('id', 'LIKE', "%$search%");
            })
            ->orderBy('id', 'desc')
            ->paginate(15);

        return view('service.index', ['services' => $services]);
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
        $service=new Service();
        $service->description=$request->description;
        $service->prix_ht=$request->prix_ht;
        $service->tva=$request->tva;
        $service->save();
        Alert::success('Success', 'Données enregistrées avec succès');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        return view('service.show',['service'=>$service]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        return view('service.edit',['service'=>$service]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
    {
        $service->description=$request->description;
        $service->prix_ht=$request->prix_ht;
        $service->tva=$request->tva;
        $service->save();
        Alert::success('Success', 'Données modifié avec succès');

        return redirect()->route("service.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        // if ($service->detail_devis()->exists()) {
        //     Alert::error('Error', 'Ce Service a des devis associés.');
        //     return redirect()->back();
        // }
        $service->archive=1;
        $service->save();
        Alert::success('Success', 'Supprimé avec succès');
        return redirect()->route("service.index");
    }

}
