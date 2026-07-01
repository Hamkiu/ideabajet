<?php

namespace App\Http\Controllers;

use App\Models\SenaraiElemen;
use App\Models\SenaraiElemen2027;
use App\Models\SenaraiLokasi;
use App\Models\SenaraiZon2027;
use App\Models\Elemen5;
use App\Models\Aset5;
use App\Models\MaklumatPencadang;
use App\Models\PilihanPencadang;
use App\Models\PilihanPencadang2027;
use App\Mail\IdeaBajetSubmitted;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class CadanganController extends Controller
{
    public function index()
    {
        // $elemenList_1 = SenaraiElemen::whereNotNull('elemen_1')->orderBy('elemen_1', 'desc')->get();
        // $elemenList_2 = SenaraiElemen::whereNotNull('elemen_2')->orderBy('elemen_2', 'desc')->get();
        // $elemenList_3 = SenaraiElemen::whereNotNull('elemen_3')->orderBy('elemen_3', 'desc')->get();
        // $elemenList_4 = SenaraiElemen::whereNotNull('elemen_4')->orderBy('elemen_4', 'desc')->get();
        // $elemenList_5 = Elemen5::whereNotNull('elemen_5')->orderBy('elemen_5', 'asc')->get();
        // $elemenList_6 = SenaraiElemen::whereNotNull('elemen_6')->orderBy('elemen_6', 'desc')->get();
        // $elemenList_7 = SenaraiElemen::whereNotNull('elemen_7')->orderBy('elemen_7', 'desc')->get();
        // $elemenList_8 = SenaraiElemen::whereNotNull('elemen_8')->orderBy('elemen_8', 'desc')->get();
        // $lokasiList = SenaraiLokasi::whereNotNull('lokasi')->orderBy('lokasi', 'asc')->get();
        $elemen2027 = SenaraiElemen2027::whereNotNull('nama')->orderBy('nama', 'asc')->get();
        $zon2027 = SenaraiZon2027::whereNotNull('zon')->orderBy('zon', 'asc')->get();
        $kawasan = SenaraiZon2027::orderBy('zon', 'asc')->get();
        // return view('pencadang.index', compact('elemen2027', 'zon2027', 'kawasan'));
        return view('error');
    }

    public function store_OLD(Request $request)
    {
        // dd($request->all());
        $pencadangId = generateId('PC', 'maklumat_pencadang', 'id');

        // Simpan maklumat pencadang
        $pencadang = MaklumatPencadang::create([
            'id'        => $pencadangId,
            'nama'      => strtoupper($request->nama),
            'email'     => $request->email,
            'jantina'   => $request->jantina,
            'bangsa'    => $request->bangsa,
            'umur'      => $request->umur,
            'pekerjaan' => $request->pekerjaan,
            'zon'       => $request->zon_ahli_majlis,
            'cadangan'  => strtolower($request->cadangan),
        ]);

        /*
        |--------------------------------------------------------------------------
        | Loop Elemen 1 - 8
        |--------------------------------------------------------------------------
        */

        for ($i = 1; $i <= 8; $i++) {

            $pilihanKey = "pilihan_e{$i}";
            $lokasiKey  = "lokasi_e{$i}";
            $butiranKey = "butiran_e{$i}";
            $asetKey    = "aset_e{$i}"; // hanya wujud untuk elemen 5

            if ($request->has($pilihanKey)) {

                foreach ($request->$pilihanKey as $index => $value) {

                    if (!$value) continue; // skip jika kosong

                    $pilihanText = $value;
                    $asetText = $request->$asetKey[$index] ?? null;

                    // 👉 KHAS UNTUK ELEMEN 5
                    if ($i == 5) {

                        $elemen = Elemen5::find($value);
                        $pilihanText = $elemen?->elemen_5;

                        $aset = Aset5::find($asetText);
                        $asetText = $aset?->nama_aset;
                    }

                    PilihanPencadang::create([
                        'id_pencadang' => $pencadangId,
                        'no_elemen'    => $i,
                        'pilihan'      => $pilihanText,
                        'lokasi'       => $request->$lokasiKey[$index] ?? null,
                        'aset'         => $asetText,
                        'butiran'      => strtolower($request->$butiranKey[$index] ?? null),
                    ]);
                }
            }
        }
        $pencadang->load('elemen');
        Mail::to($request->email)->send(new IdeaBajetSubmitted($pencadang));
        // Mail::to($pencadang->email)
        // ->queue(new IdeaBajetSubmitted($pencadang));

        return redirect()
            ->route('pencadang')
            ->with('success', 'Cadangan berjaya disimpan dan email telah dihantar kepada ' . $request->email);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $pencadangId = generateId('PC', 'maklumat_pencadang', 'id');

        // Simpan maklumat pencadang
        $pencadang = MaklumatPencadang::create([
            'id'        => $pencadangId,
            'nama'      => strtoupper($request->nama),
            'email'     => $request->email,
            'jantina'   => $request->jantina,
            'bangsa'    => $request->bangsa,
            'umur'      => $request->umur,
            'pekerjaan' => $request->pekerjaan,
            'zon'       => $request->zon_ahli_majlis,
            'cadangan'  => strtolower($request->cadangan),
        ]);

        foreach ($request->elemen_2027 as $index => $elemenId) {

            if(!$elemenId) continue;
        
            $elemen = SenaraiElemen2027::find($elemenId);
        
            PilihanPencadang2027::create([
                'id_pencadang' => $pencadangId,
                'no_elemen'    => $elemenId,
                'nama_elemen'  => $elemen?->nama,
                'zon'          => $request->zon_2027[$index] ?? null,
                'lokasi_spesifik'       => $request->lokasi_spesifik[$index] ?? null,
                'cadangan'     => strtolower($request->cadangan_2027[$index] ?? null),
            ]);
        }

        Mail::to($request->email)->send(new IdeaBajetSubmitted($pencadang));
        // Mail::to($pencadang->email)
        // ->queue(new IdeaBajetSubmitted($pencadang));

        return redirect()
            ->route('pencadang')
            ->with('success', 'Cadangan berjaya disimpan dan email telah dihantar kepada ' . $request->email);
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

    public function validateStep2_OLD(Request $request)
    {
        dd($request->all());
        $errors = [];
        $atLeastOne = false;
    
        for ($i = 1; $i <= 8; $i++) {
    
            // Ambil sebagai array
            $pilihan = $request->input("pilihan_e{$i}", []);
            $lokasi  = $request->input("lokasi_e{$i}", []);
            $butiran = $request->input("butiran_e{$i}", []);
    
            // Elemen 5 guna aset bukan lokasi
            if ($i == 5) {
                $lokasi = $request->input("aset_e5", []);
            }
    
            $max = max(count($pilihan), count($lokasi), count($butiran));
    
            for ($x = 0; $x < $max; $x++) {
    
                $p = trim($pilihan[$x] ?? '');
                $l = trim($lokasi[$x] ?? '');
                $b = trim($butiran[$x] ?? '');
    
                $filled = collect([$p, $l, $b])
                            ->filter(fn($v) => $v !== '')
                            ->count();
    
                // Semua kosong → ignore (append kosong boleh next)
                if ($filled === 0) {
                    continue;
                }
    
                // Isi tapi tak lengkap → BLOCK
                if ($filled !== 3) {
                    $errors["elemen{$i}"][] =
                        "Elemen {$i} pilihan " . ($x + 1) . " tidak lengkap.";
                } else {
                    $atLeastOne = true;
                }
            }
        }
    
        if (!$atLeastOne) {
            $errors["minimum"][] =
                "Sekurang-kurangnya satu elemen mesti dijawab dengan lengkap.";
        }
    
        if (!empty($errors)) {
            return response()->json(['errors' => $errors], 422);
        }
    
        return response()->json(['success' => true]);
    }
    
    public function validateStep2(Request $request)
    {
        // dd($request->all());
        $elemen   = $request->elemen_2027;
        $zon      = $request->zon_2027;
        $lokasi   = $request->lokasi_spesifik;
        $cadangan = $request->cadangan_2027;

        $adaLengkap = false;
        $errors = [];

        foreach ($elemen as $i => $value) {

            $e = $elemen[$i] ?? null;
            $z = $zon[$i] ?? null;
            $l = $lokasi[$i] ?? null;
            $c = $cadangan[$i] ?? null;

            // jika ada isi mana-mana field
            if ($e || $z || $l || $c) {

                if (!$e || !$z || !$l || !$c) {
                    $errors["row_$i"][] = "Cadangan " . ($i+1) . " tidak lengkap.";
                }

                if ($e && $z && $l && $c) {
                    $adaLengkap = true;
                }
            }
        }

        if (!$adaLengkap) {
            $errors["cadangan"][] = "Sekurang-kurangnya satu cadangan perlu lengkap.";
        }

        if (!empty($errors)) {
            return response()->json([
                'errors' => $errors
            ], 422);
        }

        return response()->json([
            'success' => true
        ]);
    }


}
