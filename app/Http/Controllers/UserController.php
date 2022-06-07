<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use App\Models\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreRequest;
use App\Http\Requests\User\UpdateRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function index()
    {
        // view all the users
        if((Auth::user())->hasRole('admin')){

        $users = User::all();
        $roles_users = DB::table('role_user')->get();
        $roles = Role::all();
        return view('dashboard.users.index')->with('users',$users)->with('roles_users',$roles_users)->with('roles',$roles);
        }
        else {
        return view('dashboard.permission_denied');
        }
    }


    public function usersTrashed()
    {
        // view only deleted users
        if((Auth::user())->hasRole('admin')){

        $users = User::onlyTrashed()->get();
        return view('dashboard.users.trashed')->with('users',$users);
        }
        else {
        return view('dashboard.permission_denied');
        }
    }


    public function create()
    {
        // create new user
        if((Auth::user())->hasRole('admin')){

        $roles = Role::all();
        return view('dashboard.users.create')->with('roles',$roles);
        }
        else {
            return view('dashboard.permission_denied');
        }

    }


    public function store(StoreRequest $request)
    {
        // store new user
        $user = User::create([
            'name'     =>  $request->name,
            'email'    =>  $request->email,
            'password' =>  Hash::make($request->password),
        ]);

        if($request->has('photo')){
            $photo = $request->photo;
            $newPhoto = time() . $photo->getClientOriginalName();
            $photo->move('uploads/users', $newPhoto);

            $user->photo ='uploads/users/' . $newPhoto;
            $user->save();
        }

        $user->attachRole($request->role);

        return redirect()->route('user.index');
    }


    public function show($id)
    {
        // show user
        $user = User::find($id);
        return view('dashboard.users.show')->with('user',$user);
    }


    public function edit($id)
    {
        // edit user
        $user = User::find($id);

        if((Auth::user())->hasRole('admin') OR Auth::user() == $user){

        if($user == null){
            return redirect()->back();
        }
        return view('dashboard.users.edit')->with('user',$user);
        }
        else {
        return view('dashboard.permission_denied');
        }
    }


    public function update(UpdateRequest $request, $id)
    {
        // update user
        $user = User::find($id);
        if($request->has('photo')){
            $photo = $request->photo;
            $newPhoto = time().$photo->getClientOriginalName();
            $photo->move('uploads/users',$newPhoto);
            $user->photo = 'uploads/users/'.$newPhoto;
        }
        $user->name = $request->name;
        $user->email = $request->email;
        if($request->has('password')){
            $user->password = Hash::make($request->password);
        }
        $user->gender = $request->gender;
        $user->active = $request->active;
        $user->save();

        return redirect()->back();
    }


    public function destroy($id)
    {
        // soft delete user
        if((Auth::user())->hasRole('admin')){

        $user = User::find($id);
        if($user == null){
            return redirect()->back()->withErrors("There is no such user");
        }
        $user->delete($id);
        return redirect()->back();
        }
        else {
        return view('dashboard.permission_denied');
        }
    }


    public function hdelete($id)
    {
        // hard delete user
        if((Auth::user())->hasRole('admin')){

        $user = User::withTrashed()->where('id',$id)->first();
        $user->forceDelete();
        return redirect()->back();
        }
        else {
        return view('dashboard.permission_denied');
        }
    }


    public function restore($id)
    {
        // restore deleted user
        if((Auth::user())->hasRole('admin')){

        $user = User::withTrashed()->where('id',$id)->first();
        $user->restore();
        return redirect()->back();
        }
        else {
        return view('dashboard.permission_denied');
        }
    }
}
