<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Surat;
use App\Models\Bagian;
use App\Models\Ekspedisi;

class EkspedisiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $surats = Surat::all();
        $bagians = Bagian::all();

        return view('ekspedisi.create', compact('surats', 'bagians'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
            $data = $request->validate([
            'surat_id' => 'required',
            'bagian_id' => 'required',
            'tanggal_kirim' => 'required|date',
            'bukti_foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'keterangan' => 'nullable'
        ]);

        if ($request->hasFile('bukti_foto')) {
            $data['bukti_foto'] = $request->file('bukti_foto')
                ->store('bukti_foto', 'public');
        }

        $data['status'] = 'Dikirim';

        Ekspedisi::create($data);

        return redirect()->route('ekspedisi.index')
            ->with('success', 'Ekspedisi berhasil ditambahkan');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
