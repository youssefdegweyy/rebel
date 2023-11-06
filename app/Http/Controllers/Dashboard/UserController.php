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

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        if ($user->delete()) return redirect()->back()->with('message', 'User deleted successfully.');
        else return redirect()->back()->with('error', 'Error deleting user.');
    }
}
