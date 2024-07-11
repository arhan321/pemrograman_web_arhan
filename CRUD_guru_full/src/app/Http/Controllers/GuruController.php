<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $gurus = Guru::query()
            ->when($search, function ($query, $search) {
                return $query->where('first_name', 'LIKE', "%{$search}%")
                             ->orWhere('middle_name', 'LIKE', "%{$search}%")
                             ->orWhere('last_name', 'LIKE', "%{$search}%")
                             ->orWhere('birth_dath', 'LIKE', "%{$search}%");
            })
            ->paginate(10);

        if ($request->ajax()) {
            return view('guru.table', compact('gurus'))->render();
        }

        return view('guru.index', compact('gurus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('guru.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validate form
        $request->validate([
            'first_name'        => 'required|string|max:255',
            'middle_name'       => 'nullable|string|max:255',
            'last_name'         => 'required|string|max:255',
            'birth_dath'        => 'required|date',
            'foto'              => 'required|image|mimes:jpeg,jpg,png,gif|max:2048',
        ]);

        //upload image
        if ($request->hasFile('foto')) {
            $image = $request->file('foto');
            $image->storeAs('public/guru', $image->hashName());

            //create guru
            Guru::create([
                'first_name'         => $request->first_name,
                'middle_name'        => $request->middle_name,
                'last_name'          => $request->last_name,
                'birth_dath'         => $request->birth_dath,
                'foto'               => $image->hashName(), 
            ]);

            //return success response
            return response()->json([
                'success' => true,
                'message' => 'Data berhasil ditambahkan !!'
            ]);
        } else {
            //return error response
            return response()->json([
                'success' => false,
                'message' => 'something wrong'
            ]);
        }
    }
    

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $gurus = Guru::findOrFail($id);
        return view('guru.show', compact('gurus'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $guru = Guru::findOrFail($id);
        return view('guru.edit', compact('guru'));
    }

    public function update(Request $request, $id)
    {
        $guru = Guru::findOrFail($id);

        $request->validate([
            'first_name'        => 'required|string|max:255',
            'middle_name'       => 'nullable|string|max:255',
            'last_name'         => 'required|string|max:255',
            'birth_dath'        => 'required|date',
            'foto'              => 'nullable|image|mimes:jpeg,jpg,png,gif|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            if ($guru->foto) {
                Storage::delete('public/guru/' . $guru->foto);
            }

            $image = $request->file('foto');
            $image->storeAs('public/guru', $image->hashName());
            $guru->foto = $image->hashName();
        }

        $guru->first_name = $request->first_name;
        $guru->middle_name = $request->middle_name;
        $guru->last_name = $request->last_name;
        $guru->birth_dath = $request->birth_dath;
        $guru->save();

        return redirect()->route('guru.index')->with('success', 'Data berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $gurus = Guru::findOrFail($id);
        $gurus->delete();
        return redirect()->route('guru.index')->with('success', 'Data berhasil dihapus');
    }
}
