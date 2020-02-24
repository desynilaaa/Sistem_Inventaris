@extends('layouts.menu')
@section('content')
@if($message = Session::get('success'))
<div class="alert alert-success">
	<p>{{$message}}</p>
</div>
@endif
<div class="row">
    <div class="col-lg-12">
        <div class="main-card mb-3 card">
            <div class="card-body"><h5 class="card-title">List Barang</h5>
                <table class="mb-0 table table-hover">
                    <thead>
						<tr>
							<th>Id</th>
							<th>Nama Penginput</th>
							<th>Nama Barang</th>
							<th>Created at</th>
							<th>Updated at</th>
						</tr>
                    </thead>
                    <tbody>
						@foreach($barang as $row)
						<tr>
							<td>{{$row['id']}}</td>
							<td>{{$row['nama_penginput']}}</td>
							<td>{{$row['nama_barang']}}</td>
							<td>{{$row['created_at']}}</td>
							<td>{{$row['updated_at']}}</td>
						</tr>
						@endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection