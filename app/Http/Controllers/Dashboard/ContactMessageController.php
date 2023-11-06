<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactMessageController extends Controller
{
    public function index()
    {
        $messages = ContactMessage::all();
        return view('dashboard.contact.index', compact('messages'));
    }

    public function destroy($id)
    {
        $message = ContactMessage::findOrFail($id);

        if ($message->delete()) return redirect()->back()->with('message', 'Message deleted successfully.');
        else return redirect()->back()->with('error', 'Error deleting message.');
    }
}
