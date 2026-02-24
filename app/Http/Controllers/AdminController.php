<?php

namespace App\Http\Controllers;

use App\Models\PilihanPencadang;
use App\Models\MaklumatPencadang;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $pencadang = MaklumatPencadang::count();

        $lelaki = MaklumatPencadang::where('jantina', 'Lelaki')->count();
        $perempuan = MaklumatPencadang::where('jantina', 'Perempuan')->count();
        // dd($pencadang);
        $raw = MaklumatPencadang::selectRaw('pekerjaan, bangsa, COUNT(*) as total')
        ->groupBy('pekerjaan','bangsa')
        ->get();

        // Senarai unik pekerjaan
        $pekerjaanList = $raw->pluck('pekerjaan')->unique()->values();

        // Senarai unik bangsa
        $bangsaList = $raw->pluck('bangsa')->unique()->values();

        $seriesPb = [];

        foreach ($bangsaList as $bangsa) {

            $data = [];

            foreach ($pekerjaanList as $p) {

                $row = $raw->where('pekerjaan', $p)
                        ->where('bangsa', $bangsa)
                        ->first();

                $data[] = $row ? (int)$row->total : 0;
            }

            $seriesPb[] = [
                'name' => $bangsa,
                'data' => $data
            ];
        }

        $cadangan = PilihanPencadang::count();
        $elemen1 = PilihanPencadang::where('no_elemen', 1)
        ->whereNotNull('lokasi')
        ->selectRaw('lokasi, pilihan, COUNT(*) as total')
        ->groupBy('lokasi','pilihan')
        ->get();
    
        $lokasi1 = $elemen1->pluck('lokasi')->unique()->values();
        $pilihan1 = $elemen1->pluck('pilihan')->unique()->values();
        
        $series1 = [];
        
        foreach ($pilihan1 as $pilihan) {
        
            $data = [];
        
            foreach ($lokasi1 as $loc) {
        
                $row = $elemen1->where('lokasi', $loc)
                        ->where('pilihan', $pilihan)
                        ->first();
        
                $data[] = $row ? (int)$row->total : 0;
            }
        
            $series1[] = [
                'name' => $pilihan,
                'data' => $data
            ];
        }

        // elemen 2
        $elemen2 = PilihanPencadang::where('no_elemen', 2)
        ->whereNotNull('lokasi')
        ->selectRaw('lokasi, pilihan, COUNT(*) as total')
        ->groupBy('lokasi','pilihan')
        ->get();

        $lokasi2 = $elemen2->pluck('lokasi')->unique()->values();
        $pilihan2 = $elemen2->pluck('pilihan')->unique()->values();

        $series2 = [];
        
        foreach ($pilihan2 as $pilihan) {
        
            $data = [];
        
            foreach ($lokasi2 as $loc) {    
        
                $row = $elemen2->where('lokasi', $loc)
                        ->where('pilihan', $pilihan)
                        ->first();
        
                $data[] = $row ? (int)$row->total : 0;
            }
        
            $series2[] = [
                'name' => $pilihan,
                'data' => $data
            ];
        }

        // elemen 3
        $elemen3 = PilihanPencadang::where('no_elemen', 3)
        ->whereNotNull('lokasi')
        ->selectRaw('lokasi, pilihan, COUNT(*) as total')
        ->groupBy('lokasi','pilihan')
        ->get();

        $lokasi3 = $elemen3->pluck('lokasi')->unique()->values();
        $pilihan3 = $elemen3->pluck('pilihan')->unique()->values();

        $series3 = [];

        foreach ($pilihan3 as $pilihan) {
            $data = [];
            foreach ($lokasi3 as $loc) {
                $row = $elemen3->where('lokasi', $loc)
                        ->where('pilihan', $pilihan)
                        ->first();
                $data[] = $row ? (int)$row->total : 0;
            }
            $series3[] = [
                'name' => $pilihan,
                'data' => $data
            ];
        }

        // elemen 4
        $elemen4 = PilihanPencadang::where('no_elemen', 4)
        ->whereNotNull('lokasi')
        ->selectRaw('lokasi, pilihan, COUNT(*) as total')
        ->groupBy('lokasi','pilihan')
        ->get();

        $lokasi4 = $elemen4->pluck('lokasi')->unique()->values();
        $pilihan4 = $elemen4->pluck('pilihan')->unique()->values();

        $series4 = [];

        foreach ($pilihan4 as $pilihan) {
            $data = [];
            foreach ($lokasi4 as $loc) {
                $row = $elemen4->where('lokasi', $loc)
                        ->where('pilihan', $pilihan)
                        ->first();
                $data[] = $row ? (int)$row->total : 0;
            }
            $series4[] = [
                'name' => $pilihan,
                'data' => $data
            ];
        }

        // elemen 5
        $elemen5 = PilihanPencadang::where('no_elemen', 5)
        ->selectRaw('pilihan, aset, COUNT(*) as total')
        ->groupBy('pilihan','aset')
        ->get();

        $pilihan5 = $elemen5->pluck('pilihan')->unique()->values();

        $mainSeries = [];
        $drilldownSeries = [];

        foreach ($pilihan5 as $pilihan) {
            $filtered = $elemen5->where('pilihan', $pilihan);

            $total = $filtered->sum('total');

            $mainSeries[] = [
                'name' => $pilihan,
                'y' => (int)$total,
                'drilldown' => $pilihan
            ];

            $drillData = [];

            foreach ($filtered as $row) {
                $drillData[] = [
                    $row->aset,
                    (int)$row->total
                ];
            }

            $drilldownSeries[] = [
                'name' => $pilihan,
                'id' => $pilihan,
                'data' => $drillData
            ];
        }

        // elemen 6
        $elemen6 = PilihanPencadang::where('no_elemen', 6)
        ->whereNotNull('lokasi')
        ->selectRaw('lokasi, pilihan, COUNT(*) as total')
        ->groupBy('lokasi','pilihan')
        ->get();

        $lokasi6 = $elemen6->pluck('lokasi')->unique()->values();
        $pilihan6 = $elemen6->pluck('pilihan')->unique()->values();

        $series6 = [];

        foreach ($pilihan6 as $pilihan) {
            $data = [];
            foreach ($lokasi6 as $loc) {
                $row = $elemen6->where('lokasi', $loc)
                        ->where('pilihan', $pilihan)
                        ->first();
                $data[] = $row ? (int)$row->total : 0;
            }
            $series6[] = [
                'name' => $pilihan,
                'data' => $data
            ];
        }

        // Elemen 7
        $elemen7 = PilihanPencadang::where('no_elemen', 7)
        ->whereNotNull('lokasi')
        ->selectRaw('lokasi, pilihan, COUNT(*) as total')
        ->groupBy('lokasi','pilihan')
        ->get();

        $lokasi7 = $elemen7->pluck('lokasi')->unique()->values();
        $pilihan7 = $elemen7->pluck('pilihan')->unique()->values();

        $series7 = [];

        foreach ($pilihan7 as $pilihan) {
            $data = [];
            foreach ($lokasi7 as $loc) {
                $row = $elemen7->where('lokasi', $loc)
                        ->where('pilihan', $pilihan)
                        ->first();
                $data[] = $row ? (int)$row->total : 0;
            }
            $series7[] = [
                'name' => $pilihan,
                'data' => $data
            ];
        }

        // ELEMEN 8
        $elemen8 = PilihanPencadang::where('no_elemen', 8)
        ->whereNotNull('lokasi')
        ->selectRaw('lokasi, pilihan, COUNT(*) as total')
        ->groupBy('lokasi','pilihan')
        ->get();

        $lokasi8 = $elemen8->pluck('lokasi')->unique()->values();
        $pilihan8 = $elemen8->pluck('pilihan')->unique()->values();

        $series8 = [];

        foreach ($pilihan8 as $pilihan) {
            $data = [];
            foreach ($lokasi8 as $loc) {
                $row = $elemen8->where('lokasi', $loc)
                        ->where('pilihan', $pilihan)
                        ->first();
                $data[] = $row ? (int)$row->total : 0;
            }
            $series8[] = [
                'name' => $pilihan,
                'data' => $data
            ];
        }

        return view('admin.index', compact('lokasi1','series1','lokasi2','series2','lokasi3','series3','lokasi4','series4','mainSeries','drilldownSeries','lokasi6','series6','lokasi7','series7','lokasi8','series8','pencadang','lelaki','perempuan','cadangan','seriesPb','pekerjaanList','bangsaList'));
    }

    public function list()
    {
        $pencadang = MaklumatPencadang::with('elemen')->get();
        // dd($pencadang);
        return view('admin.list', compact('pencadang'));
    }

    public function detail($id)
    {
        $data = MaklumatPencadang::with('elemen')->find($id);
        return view('admin.detail', compact('data'));
    }

    public function delete($id)
    {
        $data = MaklumatPencadang::find($id);
        $data->delete();
        return redirect()->route('admin.list')->with('success', 'Data berjaya dihapus');
    }
}
