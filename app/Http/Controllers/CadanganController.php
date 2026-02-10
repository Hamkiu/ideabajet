<?php

namespace App\Http\Controllers;

use App\Models\SenaraiElemen;
use App\Models\SenaraiLokasi;
use Illuminate\Http\Request;

class CadanganController extends Controller
{
    public function index()
    {
        $elemenList_1 = SenaraiElemen::whereNotNull('elemen_1')->orderBy('elemen_1', 'asc')->get();
        $lokasiList = SenaraiLokasi::whereNotNull('lokasi')->orderBy('lokasi', 'asc')->get();
        return view('pencadang.index', compact('elemenList_1', 'lokasiList'));
    }

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
