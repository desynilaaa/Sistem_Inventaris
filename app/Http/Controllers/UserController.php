<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use\Illuminate\Support\Facades\DB;
 
class UserController extends Controller
{
    //
    public function show()
    {
    	// $users = User::all()->toArray();
    	// return view('user.lihat_user', compact('users'));
        $users = DB::table('users');   
        $users = $users->get();
        return view('user.lihat_user', ['users'=>$users]);
    }

    public function edit($id)
    {
        $users = User::find($id);
        return view('user.edit_user',compact('users','id'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'  => 'required',
            'email' => 'required',
            'role' => 'required'
        ]);

        $users = User::find($id);
        $users->name = $request->name;
        $users->email = $request->email;
        $users->role = $request->role;
        $users->save();
        return redirect('lihat_user')->with('success','Data berhasil diperbarui!');
    }

    public function delete($id)
    {
        // DB::delete('delete from barang where id = ?',[$id]);
        $users = User::find($id);
        $users->delete();
        return redirect('lihat_user')->with('success','Pengguna berhasil dihapus!');
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $users = DB::table('users')->where('email', 'like', '%' .$search. '%')
                                    ->orWhere('name', 'like', '%' .$search. '%')
                                    ->orWhere('role', 'like', '%' .$search. '%')->paginate(5);
        // $barang = $barang->get();
        return view('user.lihat_user', ['users' => $users]);

    }
}
