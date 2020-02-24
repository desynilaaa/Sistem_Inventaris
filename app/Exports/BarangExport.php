<?php

namespace App\Exports;


use DB;
use App\barang;
use Maatwebsite\Excel\Concerns\FromCollection;
// use Maatwebsite\Excel\Concerns\FromQuery;
// use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;


// class BarangExport implements FromQuery, WithHeadings
class BarangExport implements WithHeadings,FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function __construct(int $year)
    {
    	$this->year = $year;
    }
    public function collection()
    {
    	$barang = barang::select('id','nama_penginput','nama_barang','kategori','harga','jumlah_barang','satuan','total_harga','created_at')
		    	->whereYear('created_at','=', $this->year)
		    	->orderBy('created_at','Desc')
		    	->get();
    	return $barang;
    }

    public function headings():array{    
    	return['ID','Nama Penginput','Jenis Barang','Kategori','Harga Persatuan','Jumlah Barang','Satuan','Total Harga','Waktu Dibuat'];
    }

    // use Exportable;

    // public function __construct(int $year)
    // {
    // 	$this->year = $year;
    // }
    // public function query()
    // {
    // 	// $data= barang::where('nama_penginput',$nama)->get();
    // 	// return $data;
    // 	return barang::query()->whereYear('created_at', $this->year);
    // }
}
