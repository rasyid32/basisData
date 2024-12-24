<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dosen = Dosen::all();
        return view('dashboard', compact('dosen'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dosen = $request->validate([
            'nik' => 'required|numeric',
            'nama' => 'required',
            'foto_profil' => 'nullable|image|mimes:jpeg,png,jpg',
        ]);
        if ($request->hasFile('foto_profil')) {
            $path = $request->file('foto_profil')->store('/', 'public');
            $dosen['foto_profil'] = Storage::url($path);
        }
        Dosen::create($dosen);
        return redirect('/dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $dosen = Dosen::where('id', $id)->firstOrFail();
        return view('edit', compact('dosen'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validateData = $request->validate([
            'nik' => 'required|numeric',
            'nama' => 'required',
            'foto_profil' => 'nullable|image|mimes:jpeg,png,jpg',

        ]);
        $dosen = Dosen::where('id', $id)->firstOrFail();
        if ($request->hasFile('foto_profil')) {
            $path = $request->file('foto_profil')->store('/', 'public');
            $validateData['foto_profil'] = Storage::url($path);
        }
        $dosen->update($validateData);
        return redirect('/dashboard');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dosen = Dosen::find($id);
        if ($dosen) {
            Storage::delete($dosen->foto_profil);
            $dosen->delete();
        }
        return redirect('/mobil');
    }
}
