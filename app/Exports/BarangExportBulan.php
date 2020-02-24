<?php

namespace App\Exports;

use DB;
use App\barang;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class BarangExportBulan implements WithHeadings, FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
	public function __construct(int $year, int $month)
    {
    	$this->year = $year;
    	$this->month = $month;
    }
    public function collection()
    {
    	$barang = barang::select('id','nama_penginput','nama_barang','kategori','harga','jumlah_barang','satuan','total_harga','created_at')
		    	->whereYear('created_at','=', $this->year)
		    	->whereMonth('created_at','=', $this->month)
		    	->get();
    	return $barang;
    }

    public function headings():array{    
    	return['ID','Nama Penginput','Jenis Barang','Kategori','Harga Persatuan','Jumlah Barang','Satuan','Total Harga','Waktu Dibuat'];
    }
}
