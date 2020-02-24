@extends('layouts.menu')
@section('content')
@if(count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as  $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>

@endif
<div class="app-main__inner">          
    <div class="tab-content">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <form action="{{action('UserController@update',$id)}}" method="POST">
                    {{csrf_field()}}
                    {{-- @method('put') --}}
                    <div class="form-row">
                        <div class="col-md-12">
                            <div class="position-relative form-group">
                                <input name="_method" type="hidden" class="form-control" value="PATCH"/>
                                <div class="form-group">
                                    <input type="text" name="name" class="form-control" value="{{$users->name}}"  placeholder="Nama Pengguna" >
                                </div>
                                <div class="form-group">
                                    <input type="text" name="email" class="form-control" value="{{$users->email}}" placeholder="Email" >
                                </div>
{{--                                 <div class="form-group">
                                    <input type="text" name="role" class="form-control" value="{{$users->role}}" placeholder="Role" >
                                </div> --}}
                                <div class="form-group">
                                      <select id="role" name="role" style="width: 100%; height: 38px; border-radius: 4px; border: 1px solid #ced4da; color: #495057">
                                        <option value="pegawai">&nbsp&nbspPegawai</option>
                                        <option value="admin">&nbsp&nbspAdmin</option>
                                      </select>
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" value="Edit">
                                </div>
                            </div>
                        </div>
                          
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
