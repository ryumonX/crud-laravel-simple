<?php

namespace App\Http\Controllers;

use App\Models\Departement;
use Illuminate\Http\Request;

class DepartementController extends Controller
{
    public function index()
    {
        $Departements = Departement::all();
        return view('Layout.Views.Departement', compact('Departements'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
        ]);

        Departement::create($request->all());

        return redirect()->route('Departements.index')->with('success', 'Departement created successfully.');

    }

    public function update(Request $request, Departement $Departement)
    {
        $request->validate([
            'nama' => 'required',
        ]);

        $Departement->update($request->all());

        return redirect()->route('Departements.index')->with('success', 'Departement updated successfully');

    }

    public function destroy(Departement $Departement)
    {
        $Departement->delete();

        return redirect()->route('Departements.index')->with('success', 'Departement deleted successfully');

    }
}
