@extends('layouts.menu')
@section('content')
<div class="row"  style="padding: 10px 10px">
	<div class="col-lg-9">
		<div class="input-group">
			<form action="/laporan_tahunan/download" method="get">
				<span class="search__region">
				  <select id="download" name="download" style="width: 150px; height: 38px; border-radius: 4px; border: 1px solid #ced4da; color: #495057">
				  	<option value="" disabled>Pilih Tahun</option>
					<option value="2019">&nbsp&nbsp2019</option>
					<option value="2020">&nbsp&nbsp2020</option>
				  </select>
				</span>
				<button class="btn btn-success" style="">Download</button>
			</form>
		</div>		
	</div>
	<div class="col-lg-3" style="padding: 0px 15px 10px 0px; text-align: right;">
		<form action="/laporan_tahunan/cari" method="get">
			<div class="input-group">
				<input type="search" name="search" class="form-control">
				<span class="input-group-prepend">
					<button  type="submit" class="btn btn-primary">Cari</button>
				</span>
			</div>
		</form>
	</div>
    <div class="col-lg-12">
        <div class="main-card mb-3 card">
            <div class="card-body"><h5 class="card-title">List Barang</h5>
                <table class="mb-0 table table-hover">
                    <thead>
						<tr>
							<th>Id</th>
							<th>Nama Penginput</th>
							<th>Kategori</th>
							<th>Nama Barang</th>
							<th>Harga Barang</th>
							<th>Jumlah Barang</th>
							<th>Total Harga</th>
							<th>Waktu Dibuat</th>
						</tr>
                    </thead>
                    <tbody>
					@foreach($barang as $barang)
					<tr>
						<td>{{$barang->id}}</td>
						<td>{{ $barang->nama_penginput }}</td>
						<td>{{ $barang->kategori }}</td>
						<td>{{ $barang->nama_barang }}</td>
						<td>{{ $barang->harga }}</td>
						<td>{{ $barang->jumlah_barang }}&nbsp{{ $barang->satuan }}</td>
						<td>{{ $barang->total_harga }}</td>
						<td>{{ $barang->created_at }}</td>
					</tr>
					@endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$('.delete_form').on('submit', function(){
			if(confirm("Apakah Anda yakin untuk menghapus"))
			{
				return true;
			}
			else
			{
				return false;
			}

		});
	});
</script>

@endsection