<?php

namespace App\Http\Controllers;

use App\Models\Jkkp6Main;
use App\Models\Jkkp6Maklumat;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class JKKPMainsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('jkkpmains.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jkkpmains.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validated = $request->validate(
            [
                'id_terlibat'   => 'required',
                'nama_boss'   => 'required',
                'nama_terlibat'   => 'required',
                'tarikh_kejadian'  => 'required',
                'masa_kejadian'    => 'required',
                'lokasi_kejadian'   => 'required',
                'huraian_sebelum'   => 'required',
                'huraian_semasa'    => 'required',
                'huraian_selepas'   => 'required',
            ],
            [
                'id_terlibat.required'   => 'No Pekerja Terlibat wajib diisi',
                'nama_boss.required'   => 'Ketua Jabatan Terlibat wajib diisi',
                'nama_terlibat.required'   => 'Nama Terlibat wajib diisi',
                'tarikh_kejadian.required'  => 'Tarikh Kemalangan wajib diisi',
                'masa_kejadian.required'   => 'Masa Kemalangan wajib diisi',
                'lokasi_kejadian.required'  => 'Lokasi Kemalangan wajib diisi',
                'huraian_sebelum.required'  => 'Sebelum Kejadian wajib diisi',
                'huraian_semasa.required'   => 'Semasa Kejadian wajib diisi',
                'huraian_selepas.required'  => 'Selepas Kejadian wajib diisi',
            ]
        );
        

        $jkkp6Id = generateId('JK', 'jkkp6_mains', 'id');
        $jkkp6Main = Jkkp6Main::create([
            'id' => $jkkp6Id,
            'status' => 'BAHARU',
            'status_nombor' => 1,
            'peringkat' => 'DRAF',
            'created_by' => 1,
        ]);

        $jkkp6Maklumat = new Jkkp6Maklumat();
        $jkkp6Maklumat->id_jkkp6 = $jkkp6Main->id;
        $jkkp6Maklumat->nama_pem = $request->nama_pem;
        $jkkp6Maklumat->jaw_pem = $request->jaw_pem;
        $jkkp6Maklumat->jab_pem = $request->jab_pem;
        $jkkp6Maklumat->tel_pem = $request->tel_pem;
        $jkkp6Maklumat->id_pem = $request->id_pem;

        $jkkp6Maklumat->nama_boss = $request->nama_boss;
        $jkkp6Maklumat->id_terlibat = $request->id_terlibat;
        $jkkp6Maklumat->nama_terlibat = $request->nama_terlibat;
        $jkkp6Maklumat->kp_terlibat = $request->kp_terlibat;
        $jkkp6Maklumat->tarikh_lahir = $request->tarikh_lahir;
        $jkkp6Maklumat->warganegara = $request->warganegara;
        $jkkp6Maklumat->jantina = $request->jantina;
        $jkkp6Maklumat->jawatan = $request->jawatan;
        $jkkp6Maklumat->jabatan = $request->jabatan;
        $jkkp6Maklumat->gaji = $request->gaji;

        $jkkp6Maklumat->tarikh_kejadian = $request->tarikh_kejadian;
        $jkkp6Maklumat->masa_kejadian = $request->masa_kejadian;
        $jkkp6Maklumat->lokasi_kejadian = $request->lokasi_kejadian;
        $jkkp6Maklumat->huraian_sebelum = $request->huraian_sebelum;
        $jkkp6Maklumat->huraian_semasa = $request->huraian_semasa;
        $jkkp6Maklumat->huraian_selepas = $request->huraian_selepas;
        $jkkp6Maklumat->save();

        // return response()->json([
        //     'message' => 'JKKP berjaya disimpan '. $jkkp6Main->id,
        // ]);

        return redirect()->route('jkkpmains')->with('success', 'Laporan berjaya disimpan '. $jkkp6Main->id);

        // proceed save logic
    }


    public function list(Request $request)
    {
        $query = Jkkp6Main::query();
        $jkkp6Main = $query->get();
        return DataTables::of($jkkp6Main)
        ->addIndexColumn()
        ->addColumn('id', function ($row) {
            return $row->id;
        })
        ->addColumn('id_terlibat', function ($row) {
            return $row->maklumat->id_terlibat;
        })
        ->addColumn('nama_terlibat', function ($row) {
            return $row->maklumat->nama_terlibat;
        })
        ->addColumn('jabatan', function ($row) {
            return $row->maklumat->jabatan;
        })
        ->addColumn('status', function ($row) {
            $btn = '';
            if ($row->status == 'BAHARU') {
                $btn = '<span class="btn waves-effect waves-light btn-rounded btn-sm btn-outline-primary">'. $row->status .'</span>';
            } else if ($row->status == 'DALAM PROSES') {
                $btn = '<span class="badge badge-warning">'. $row->status .'</span>';
            } else if ($row->status == 'SELESAI') {
                $btn = '<span class="badge badge-danger">'. $row->status .'</span>';
            }
            return $btn;
        })
        ->addColumn('peringkat', function ($row) {
            $btn = '';
            if ($row->peringkat == 'DRAF') {
                $btn = '<span class="btn waves-effect waves-light btn-rounded btn-sm btn-primary">'. $row->peringkat .'</span>';
            } else if ($row->peringkat == 'DALAM PROSES') {
                $btn = '<span class="badge badge-warning">'. $row->peringkat .'</span>';
            } else if ($row->peringkat == 'SELESAI') {
                $btn = '<span class="badge badge-danger">'. $row->peringkat .'</span>';
            }
            return $btn;
        })
        ->addColumn('tarikh_terima', function ($row) {
            $name = $row->maklumat->nama_pem;
            $date = date('d/m/Y H:i:a', strtotime($row->created_at));
            return $name.'<br/>&emsp;'.$date;
        })
        ->addColumn('tarikh_kemaskini', function ($row) {
            $name = $row->maklumat->nama_pem;
            $date = date('d/m/Y H:i:a', strtotime($row->updated_at));
            return $name.'<br/>&emsp;'.$date;
        })
        ->addColumn('tindakan', function ($row) {
            return '<a href="'.route('jkkpmains.edit', encode($row->id)).'" class="btn btn-primary btn-sm">Edit</a>';
        })
        ->rawColumns(['status', 'peringkat', 'tarikh_terima', 'tarikh_kemaskini', 'tindakan']) //kegunaan sekiranya terdapat html dalam lajur
        ->make(true);
    }

    /**
     * Display the specified resource.
     */
    public function show(JKKPMains $jKKPMains)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // dd(decode($id));
        $jkkp6Main = Jkkp6Main::find(decode($id));
        $jkkp6Maklumat = Jkkp6Maklumat::orderBy('nama_boss', 'asc')->get();
        return view('jkkpmains.edit', compact('jkkp6Main', 'jkkp6Maklumat'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate(
            [
                'id_terlibat'   => 'required',
                'nama_boss'   => 'required',
                'nama_terlibat'   => 'required',
                'tarikh_kejadian'  => 'required',
                'masa_kejadian'    => 'required',
                'lokasi_kejadian'   => 'required',
                'huraian_sebelum'   => 'required',
                'huraian_semasa'    => 'required',
                'huraian_selepas'   => 'required',
            ],
            [
                'id_terlibat.required'   => 'No Pekerja Terlibat wajib diisi',
                'nama_boss.required'   => 'Ketua Jabatan Terlibat wajib diisi',
                'nama_terlibat.required'   => 'Nama Terlibat wajib diisi',
                'tarikh_kejadian.required'  => 'Tarikh Kemalangan wajib diisi',
                'masa_kejadian.required'   => 'Masa Kemalangan wajib diisi',
                'lokasi_kejadian.required'  => 'Lokasi Kemalangan wajib diisi',
                'huraian_sebelum.required'  => 'Sebelum Kejadian wajib diisi',
                'huraian_semasa.required'   => 'Semasa Kejadian wajib diisi',
                'huraian_selepas.required'  => 'Selepas Kejadian wajib diisi',
            ]
        );

        $jkkp6Main = Jkkp6Main::find(decode($id));
        $jkkp6Main->status = 'BAHARU';
        $jkkp6Main->status_nombor = 1;
        $jkkp6Main->peringkat = 'DRAF';
        $jkkp6Main->updated_by = 1;

        $jkkp6Main->maklumat->nama_pem = $request->nama_pem;
        $jkkp6Main->maklumat->jaw_pem = $request->jaw_pem;
        $jkkp6Main->maklumat->jab_pem = $request->jab_pem;
        $jkkp6Main->maklumat->tel_pem = $request->tel_pem;
        $jkkp6Main->maklumat->id_pem = $request->id_pem;
        $jkkp6Main->maklumat->nama_boss = $request->nama_boss;
        $jkkp6Main->maklumat->id_terlibat = $request->id_terlibat;
        $jkkp6Main->maklumat->nama_terlibat = $request->nama_terlibat;
        $jkkp6Main->maklumat->kp_terlibat = $request->kp_terlibat;
        $jkkp6Main->maklumat->tarikh_lahir = $request->tarikh_lahir;
        $jkkp6Main->maklumat->warganegara = $request->warganegara;
        $jkkp6Main->maklumat->jantina = $request->jantina;
        $jkkp6Main->maklumat->jawatan = $request->jawatan;
        $jkkp6Main->maklumat->jabatan = $request->jabatan;
        $jkkp6Main->maklumat->gaji = $request->gaji;
        $jkkp6Main->maklumat->tarikh_kejadian = $request->tarikh_kejadian;
        $jkkp6Main->maklumat->masa_kejadian = $request->masa_kejadian;
        $jkkp6Main->maklumat->lokasi_kejadian = $request->lokasi_kejadian;
        $jkkp6Main->maklumat->huraian_sebelum = $request->huraian_sebelum;
        $jkkp6Main->maklumat->huraian_semasa = $request->huraian_semasa;
        $jkkp6Main->maklumat->huraian_selepas = $request->huraian_selepas;
        $jkkp6Main->maklumat->save();
        $jkkp6Main->save();

        return redirect()->route('jkkpmains')->with('success', 'Laporan berjaya dikemaskini '. $jkkp6Main->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JKKPMains $jKKPMains)
    {
        //
    }
}
