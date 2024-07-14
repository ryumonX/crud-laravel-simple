<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use Illuminate\Http\Request;

class JurusanController extends Controller
{
    public function index()
    {
        $jurusans = Jurusan::all();
        return view('jurusan', compact('jurusans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
        ]);

        Jurusan::create($request->all());

        return redirect()->route('jurusans.index')->with('success', 'Jurusan created successfully.');

    }

    public function update(Request $request, Jurusan $jurusan)
    {
        $request->validate([
            'nama' => 'required',
        ]);

        $jurusan->update($request->all());

        return redirect()->route('jurusans.index')->with('success', 'Jurusan updated successfully');

    }

    public function destroy(Jurusan $jurusan)
    {
        $jurusan->delete();

        return redirect()->route('jurusans.index')->with('success', 'Jurusan deleted successfully');

    }
}
