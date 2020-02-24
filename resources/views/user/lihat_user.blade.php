@extends('layouts.menu')
@section('content')
@if($message = Session::get('success'))
<div class="alert alert-success">
	<p>{{$message}}</p>
</div>
@endif
<div class="row" style="padding: 10px 10px">
	<div class="col-lg-8"></div>
	<div class="col-lg-3" style="padding: 0px 0px 10px; text-align: right;">
		<form action="/cari_user" method="get">
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
            <div class="card-body"><h5 class="card-title">List Pengguna</h5>
                <table class="mb-0 table table-hover">
                    <thead>
						<tr>
							<th>Nama User</th>
							<th>Email</th>
							{{-- <th>Password</th> --}}
							<th>Role</th>
							<th>Edit</th>
							<th>Hapus</th>
						</tr>
                    </thead>
                    <tbody>
						@foreach($users as $user)
						<tr>
							<td>{{$user->name}}</td>
							<td>{{$user->email}}</td>
							{{-- <td>{{$user['password']}}</td> --}}
							<td>{{$user->role}}</td>
							<td><a href="{{action('UserController@edit',$user->id)}}" class="btn btn-warning">Edit</a></td>
							<td>
								<form method="POST" class="delete_form" action="{{action('UserController@delete',$user->id)}}">
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

@endsection