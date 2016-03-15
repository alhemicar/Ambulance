<?php

namespace App\Http\Controllers;
use Gate;
use App\DoctorType;
use App\User;
use App\Role;
//use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class usersController extends Controller
{
    public function index()
    {
        if(!Auth::check() || !Auth::user()->IsAdmin())
        {
            abort(404);
        }

        $users = User::all();

        return view('users.index')->withUsers($users);
    }

    public function create()
    {
        if(!Auth::check() || !Auth::user()->IsAdmin())
        {
            abort(404);
        }

        $roles = Role::lists('name', 'id');
        $doctorTypes = DoctorType::lists('name', 'id');
        return view('users.create', compact('roles'))->with(compact('doctorTypes'));
    }

    public function show($id)
    {
        if(!Auth::check() || !Auth::user()->IsAdmin())
        {
            abort(404);
        }

        $user = user::findOrFail($id);
        $roles = Role::lists('name', 'id');
        $doctorTypes = DoctorType::lists('name', 'id');
        return view('users.show', compact('user'))->with(compact('roles'))->with(compact('doctorTypes'));
    }

    public function store(Request $request)
    {
        if(!Auth::check() || !Auth::user()->IsAdmin())
        {
            abort(404);
        }

        $this->validate($request, [
            'name' => 'required|min:3|max:100',
            'last_name' => 'required|min:3|max:100',
            'email' => 'required|min:3|max:200',
            'username' => 'required|min:3|max:35',
            'user_role_id' => 'required',
            'password' => 'required|min:6|max:60|confirmed',
        ]);

        $input = $request->all();

        $input['password'] = bcrypt($request->input('password'));

        User::create($input);

        return redirect('users');
    }

    public function edit($id)
    {
        $user = user::findOrFail($id);
        $roles = Role::lists('name', 'id');
        $doctorTypes = DoctorType::lists('name', 'id');

        return view('users.edit', compact('user'))->with(compact('roles'))->with(compact('doctorTypes'));
    }

    public function update($id, Request $request)
    {
        $user = user::findOrFail($id);

        if(!Auth::check() || !Auth::user()->IsAdmin()){
            $this->validate($request, [
                'name' => 'required|min:3|max:100',
                'last_name' => 'required|min:3|max:100',
                'email' => 'required|min:3|max:200',
                'username' => 'required|min:3|max:35',
            ]);
        }
        else{
            $this->validate($request, [
                'name' => 'required|min:3|max:100',
                'last_name' => 'required|min:3|max:100',
                'email' => 'required|min:3|max:200',
                'username' => 'required|min:3|max:35',
                'user_role_id' => 'required',
            ]);
        }

        $input = $request->all();

        if(!empty($input->user_role_id) && $input['user_role_id'] !== 2)
        {
            $user->doctor_type_id = null;
        }

        $user->update($input);

        if(!Auth::check() || !Auth::user()->IsAdmin())
        {
            return redirect('home');
        }
        return redirect('users');
    }

    public function destroy($id)
    {
        user::findOrFail($id)->delete();
        return redirect('users');
    }
}
