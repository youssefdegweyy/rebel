<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('role', '!=', 0)->get();
        return view('dashboard.users.index', compact('users'));
    }

    public function edit($id)
    {
        $user = User::where('role', '!=', 0)->whereId($id)->first();
        if (!$user) abort('404', 'User not found.');
        return view('dashboard.users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::where('role', '!=', 0)->whereId($id)->first();
        if (!$user) abort('404', 'User not found.');

        $request->validate([
            'points' => 'required',
        ]);

        $user->update([
            'points' => $request->points,
        ]);
        return redirect('admin/users')->with('message', 'Points edited successfully.');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        if ($user->delete()) return redirect()->back()->with('message', 'User deleted successfully.');
        else return redirect()->back()->with('error', 'Error deleting user.');
    }
}
