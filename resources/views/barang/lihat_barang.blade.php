@extends('layouts.menu')
@section('content')
@if($message = Session::get('success'))
<div class="alert alert-success">
	<p>{{$message}}</p>
</div>
@endif
<div class="row"  style="padding: 10px 10px">
	<div class="col-lg-8"></div>
	<div class="col-lg-3" style="padding: 0px 0px 10px; text-align: right;">
		<form action="/cari_barang" method="get">
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
							{{-- <th>Id</th> --}}
							<th>Nama Penginput</th>
							<th>Kategori</th>
							<th>Nama Barang</th>
							<th>Harga Barang</th>
							<th>Jumlah Barang</th>
							<th>Total Harga</th>
							<th>Waktu Dibuat</th>
							{{-- <th>Updated at</th> --}}
							<th>Edit</th>
							<th>Hapus</th>
						</tr>
                    </thead>
                    <tbody>
					@foreach($barang as $row)
					<tr>
						{{-- <td>{{$row['id']}}</td> --}}
						<td>{{ $row->nama_penginput }}</td>
						<td>{{ $row->kategori }}</td>
						<td>{{ $row->nama_barang }}</td>
						<td>{{ $row->harga }}</td>
						<td>{{ $row->jumlah_barang }}&nbsp{{ $row->satuan }}</td>
						<td>{{ $row->total_harga }}</td>
						<td>{{ $row->created_at }}</td>
						{{-- <td>{{$row['updated_at']}}</td> --}}
						<td><a href="{{action('BarangController@edit',$row->id)}}" class="btn btn-warning">Edit</a></td>
						<td>
							<form method="POST" class="delete_form" action="{{action('BarangController@delete',$row->id)}}">
								{{csrf_field()}}
								<input type="hidden" name="_method" value="DELETE" />
								<button type="submit" class="btn btn-danger">Delete</button>
							</form>
						</td>		
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