<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('user.user.index', compact('users'));
    }

    public function edit($user_id)
    {
        $user = User::find($user_id);
        return view('user.user.edit', compact('user'));
    }

    public function update(Request $request, $user_id)
    {
        $user = User::find($user_id);
        if ($user) {
            $user->role_as = $request->role_as;
            $user->update();
            return redirect('user/users')->with('message', 'Updated Successfully');
        }
        return redirect('user/users')->with('message', 'No User Found');
    }
}
