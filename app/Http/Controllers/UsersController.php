<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::get();
        return view('user.index', [
            'users' => $users
        ]);
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        $data = $request->only(['name', 'email']);
        $data['password']=bcrypt('password');
        User::create($data);
        return redirect()->route('users.index');
    }

    public function show($id)
    {
        $user = User::find($id);
        return view('user.show', [
            'user' => $user
        ]);
    }

    public function edit(string $id)
    {
        $user = User::find($id);
        return view('user.edit', [
            'user' => $user
        ]);
    }

     public function update(Request $request, $id)
    {
        $data = $request->except(['_token', '_method']);
        $user = User::find($id);
        $user->update($data);

        return redirect()->route('users.index');
    }

    public function destroy(string $id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('users.index');
    }
}
