<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreRequest;
use App\Http\Requests\User\UpdateRequest;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        // view all the users
        $users = User::all();
        return view('dashboard.users.index')->with('users',$users);
    }


    public function usersTrashed()
    {
        // view only deleted users
        $users = User::onlyTrashed()->get();
        return view('dashboard.users.trashed')->with('users',$users);
    }


    public function create()
    {
        // create new user
        return view('dashboard.users.create');

    }


    public function store(StoreRequest $request)
    {
        // store new user
        $photo = $request->photo;
        $newPhoto = time() . $photo->getClientOrginalName();
        $photo->move('uploads/users', $newPhoto);

        $user = User::create([
            'name'     =>  $request->name,
            'email'    =>  $request->email,
            'password' =>  Hash::make($request->password),
            'photo'    =>  'uploads/users/' . $newPhoto,
            'gender'   =>  $request->gender,
            'active'   =>  $request->active
        ]);

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
        if($user == null){
            return redirect()->back();
        }
        return view('dashboard.users.edit')->with('user',$user);
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
        $user->password = Hash::make($request->password);
        $user->gender = $request->gender;
        $user->active = $request->active;

        return redirect()->back();
    }


    public function destroy($id)
    {
        // soft delete user
        $user = User::find($id);
        if($user == null){
            return redirect()->back()->withErrors("There is no such user");
        }
        $user->delete($id);
        return redirect()->back();
    }


    public function hdelete($id)
    {
        // hard delete user
        $user = User::withTrashed()->where('id',$id)->first();
        $User->forceDelete();
        return redirect()->back();
    }


    public function restore($id)
    {
        // restore deleted user
        $user = User::withTrashed()->where('id',$id)->first();
        $user->restore();
        return redirect()->back();
    }
}
