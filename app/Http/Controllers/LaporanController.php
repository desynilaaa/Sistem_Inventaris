<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Exports\BarangExport;
use App\Exports\BarangExportBulan;
use Maatwebsite\Excel\Facades\Excel;
use DB;

class LaporanController extends Controller
{
    //
    public function show()
    {
        $barang = DB::table('barang');   
        $barang = $barang->get();

        return view('laporan.laporan_tahun', ['barang'=>$barang]);
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $barang = DB::table('barang')->where('nama_barang', 'like', '%' .$search. '%')
                                    ->orWhere('nama_penginput', 'like', '%' .$search. '%')
                                    ->orWhereYear('created_at','=', $search)
                                    ->orWhere('kategori', 'like', '%' .$search. '%')->paginate(5);

        return view('laporan.laporan_tahun', ['barang' => $barang]);

    }

    public function export(Request $request) 
    {
        $download = $request->get('download');
        return Excel::download(new BarangExport($download), 'Laporan_Tahunan.xlsx');
    }

    public function lihat()
    {
        $barang = DB::table('barang');   
        $barang = $barang->get();

        return view('laporan.laporan_bulan', ['barang'=>$barang]);
    }

    public function cari(Request $request)
    {
        $search = $request->get('search');
        $barang = DB::table('barang')->where('nama_barang', 'like', '%' .$search. '%')
                                    ->orWhere('nama_penginput', 'like', '%' .$search. '%')
                                    ->orWhereYear('created_at','=', $search)
                                    ->orWhere('kategori', 'like', '%' .$search. '%')->paginate(5);

        return view('laporan.laporan_bulan', ['barang' => $barang]);

    }

    public function export2(Request $request) 
    {
        $tahun = $request->get('tahun');
        $bulan = $request->get('bulan');
        return Excel::download(new BarangExportBulan($tahun,$bulan), 'Laporan_Bulanan.xlsx');
    }


}
