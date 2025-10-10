<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuestionController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());

        // 1. Lakukan Validasi Input dengan Pesan Kustom
        $request->validate([
            'nama'       => 'required|max:10',
            'email'      => ['required','email'],
            'pertanyaan' => 'required|max:300|min:8',
        ], [
            // Definisi Pesan Error Kustom
            'nama.required'    => 'Nama Tidak boleh kosong',
            'email.email'      => 'Email tidak valid',
            'nama.max'         => 'Nama tidak boleh lebih dari 10 karakter.',
            'pertanyaan.required' => 'Pertanyaan tidak boleh kosong.',
            'pertanyaan.max'   => 'Pertanyaan terlalu panjang, maksimal 300 karakter.',
            'pertanyaan.min'   => 'Pertanyaan terlalu pendek, minimal 8 karakter.',
        ]);

        // 2. Mengambil data yang telah divalidasi dan menyimpannya dalam array.
        $data = [
            'nama'       => $request->nama,
            'email'      => $request->email,
            'pertanyaan' => $request->pertanyaan,
        ];

        // 3. Mengembalikan view 'home-question-respon' dan menyertakan data ke dalamnya.
        // Asumsi: View 'home-question-respon' ada dan menerima variabel $data.
        //return view('home-question-respon', $data);
        return redirect()->route('home')->with('info', 'Selamat, Kamu Lulus!');

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
