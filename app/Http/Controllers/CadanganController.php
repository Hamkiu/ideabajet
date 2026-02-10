<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CadanganController extends Controller
{
    public function store(Request $request)
    {
        dd($request->all());
    }

    public function validateStep1(Request $request)
    {
        $request->validate([
            'nama' => 'required|string',
            'email' => 'required|email',
            'jantina' => 'required',
            'bangsa' => 'required',
            'umur' => 'required',
            'pekerjaan' => 'required',
            'zon_ahli_majlis' => 'required_if:pekerjaan,ahli_majlis',
        ], [
            'nama.required' => 'Nama wajib diisi',
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Format email tidak sah',
            'jantina.required' => 'Jantina wajib diisi',
            'bangsa.required' => 'Bangsa wajib diisi',
            'umur.required' => 'Umur wajib diisi',
            'pekerjaan.required' => 'Pekerjaan wajib diisi',
            'zon_ahli_majlis.required_if' => 'Zon Ahli Majlis wajib diisi',
        ]);

        return response()->json(['status' => 'ok']);
    }

}
