@extends('layouts.menu')
@section('content')
<div class="app-main__inner">          
    <div class="tab-content">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <form action="submitData" method="POST">
                    @csrf
                    <div class="form-row">
                        <div class="col-md-12">
                            <div class="position-relative form-group"><label class="">Nama Penginput</label><input name="name" placeholder="Nama Penginput" type="text" class="form-control"></div>
                        </div>
                        <div class="col-md-6">
                            <div class="position-relative form-group"><label class="">Kategori Barang</label>
                              <select id="kategori" name="kategori" style="width: 100%; height: 38px; border-radius: 4px; border: 1px solid #ced4da; color: #495057">
                                <option value="ATK">&nbsp&nbspAlat Perkantoran</option>
                                <option value="elektronik">&nbsp&nbspElektronik</option>
                              </select>
                            </div>                               
                        </div>
                        <div class="col-md-6">
                            <div class="position-relative form-group"><label class="">Nama Barang</label><input type="text" name="barang" placeholder="misalnya: bulpoin, kertas, gunting, dll" class="form-control"></div>
                        </div>
                        <div class="col-md-6">
                            <div class="position-relative form-group"><label class="">Jumlah Barang</label><input type="text" name="jumlah_barang" placeholder="nb: hanya angka, tanpa satuan" class="form-control"></div>
                        </div>
                        <div class="col-md-6">
                            <div class="position-relative form-group"><label class="">Satuan</label>
                              <select id="satuan" name="satuan" style="width: 100%; height: 38px; border-radius: 4px; border: 1px solid #ced4da; color: #495057">
                                <option value="dus">&nbsp&nbspDus</option>
                                <option value="kodi">&nbsp&nbspKodi</option>
                                <option value="lusin">&nbsp&nbspLusin</option>
                                <option value="pack">&nbsp&nbspPack</option>
                                <option value="pcs">&nbsp&nbspPcs</option>
                                <option value="rim">&nbsp&nbspRim</option>
                              </select>
                            </div>                               
                        </div>
                        <div class="col-md-12">
                            <div class="position-relative form-group"><label class="">Harga Barang</label><input type="text" name="harga_barang" placeholder="isi harga persatuan, misalnya: 10000, 20000, 100000" class="form-control"></div>
                        </div>
                    <button class="mt-2 btn btn-primary" type="submit">Simpan Data</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
