<?php

namespace App\Http\Controllers;

use App\Models\SenaraiElemen;
use App\Models\SenaraiLokasi;
use App\Models\Elemen5;
use App\Models\Aset5;
use Illuminate\Http\Request;

class CadanganController extends Controller
{
    public function index()
    {
        $elemenList_1 = SenaraiElemen::whereNotNull('elemen_1')->orderBy('elemen_1', 'desc')->get();
        $elemenList_2 = SenaraiElemen::whereNotNull('elemen_2')->orderBy('elemen_2', 'desc')->get();
        $elemenList_3 = SenaraiElemen::whereNotNull('elemen_3')->orderBy('elemen_3', 'desc')->get();
        $elemenList_4 = SenaraiElemen::whereNotNull('elemen_4')->orderBy('elemen_4', 'desc')->get();
        $elemenList_5 = Elemen5::whereNotNull('elemen_5')->orderBy('elemen_5', 'asc')->get();
        $elemenList_6 = SenaraiElemen::whereNotNull('elemen_6')->orderBy('elemen_6', 'desc')->get();
        $elemenList_7 = SenaraiElemen::whereNotNull('elemen_7')->orderBy('elemen_7', 'desc')->get();
        $elemenList_8 = SenaraiElemen::whereNotNull('elemen_8')->orderBy('elemen_8', 'desc')->get();
        $lokasiList = SenaraiLokasi::whereNotNull('lokasi')->orderBy('lokasi', 'asc')->get();
        return view('pencadang.index', compact('elemenList_1', 'elemenList_2', 'elemenList_3', 'elemenList_4', 'elemenList_5', 'elemenList_6', 'elemenList_7', 'elemenList_8', 'lokasiList'));
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

    public function getAset(Request $request)
    {
        $aset = Aset5::where('id_elemen5', $request->id_elemen5)
        ->orderBy('nama_aset', 'asc')
        ->get(['id','nama_aset']);

        return response()->json($aset);
    }

    public function validateStep2(Request $request)
    {
        // dd($request->all());
        $errors = [];
    $atLeastOne = false;

    for ($i = 1; $i <= 8; $i++) {

        $pilihan = $request->input("pilihan_e{$i}");
        $lokasi  = $request->input("lokasi_e{$i}");
        $butiran = $request->input("butiran_e{$i}");

        $filled = collect([$pilihan, $lokasi, $butiran])
                    ->filter(fn($v) => !empty($v))
                    ->count();

        // semua kosong → ignore
        if ($filled === 0) {
            continue;
        }

        // isi tapi tak lengkap
        if ($filled !== 3) {
            $errors["elemen{$i}"][] =
                "Elemen {$i} tidak lengkap. Sila lengkapkan Pilihan, Lokasi dan Butiran.";
        } else {
            $atLeastOne = true;
        }
    }

    if (!$atLeastOne) {
        $errors["minimum"][] =
            "Sekurang-kurangnya satu elemen mesti dijawab.";
    }

    if (!empty($errors)) {
        return response()->json(['errors' => $errors], 422);
    }

    return response()->json(['success' => true]);
    }


}
