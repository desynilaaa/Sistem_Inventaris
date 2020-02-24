<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Barang;

// use Illuminate\Support\Facades\DB;
use DB;

class BarangController extends Controller
{
    //
    public function create(Request $req)
    {
    	#print_r($req->input());
        $harga = (int) $req->harga_barang;
        $jumlah_barang = (int) $req->jumlah_barang;
        $total_harga = $harga * $jumlah_barang;

    	$barang_input = new Barang;
    	$barang_input->nama_penginput = $req->name;
    	$barang_input->kategori = $req->kategori;
        $barang_input->nama_barang = $req->barang;
        $barang_input->harga = $req->harga_barang;
        $barang_input->jumlah_barang = $req->jumlah_barang;
        $barang_input->satuan = $req->satuan;
        $barang_input->total_harga = $total_harga;

    	$barang_input->save();

        return redirect('lihat_barang')->with('success','Barang berhasil ditambahkan!');
    }

    public function show()
    {
    	// $barang = Barang::all()->toArray();
    	// return view('barang.lihat_barang', compact('barang'));
        $barang = DB::table('barang');   
        $barang = $barang->get();
        return view('barang.lihat_barang', ['barang'=>$barang]);
    }

    public function delete($id)
    {
        // DB::delete('delete from barang where id = ?',[$id]);
        $barang = Barang::find($id);
        $barang->delete();
        return redirect('lihat_barang')->with('success','Data berhasil dihapus!');
    }

    public function edit($id)
    {
        $barang = Barang::find($id);
        return view('barang.edit_barang',compact('barang','id'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'  => 'required',
            'kategori' => 'required',
            'barang' => 'required',
            'jumlah_barang' => 'required',
            'satuan' => 'required',
            'harga_barang' => 'required'
        ]);

        $harga = (int) $request->harga_barang;
        $jumlah_barang = (int) $request->jumlah_barang;
        $total_harga = $harga * $jumlah_barang;

        $barang = Barang::find($id);
        $barang->nama_penginput = $request->name;
        $barang->kategori = $request->kategori;
        $barang->nama_barang = $request->barang;
        $barang->jumlah_barang = $request->jumlah_barang;
        $barang->satuan = $request->satuan;
        $barang->harga = $request->harga_barang;
        $barang->total_harga = $total_harga;
        $barang->save();

        return redirect('lihat_barang')->with('success','Data berhasil diperbarui!');
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $barang = DB::table('barang')->where('nama_barang', 'like', '%' .$search. '%')
                                    ->orWhere('nama_penginput', 'like', '%' .$search. '%')
                                    ->orWhereYear('created_at','=', $search)
                                    ->orWhere('kategori', 'like', '%' .$search. '%')->paginate(5);
        // $barang = $barang->get();
        return view('barang.lihat_barang', ['barang' => $barang]);

    }
} 
