<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Message;

class MessageController extends Controller
{

    public function index()
    {

        return view('messages.allMessage', [
            "messages" => Message::all()
        ]);
    }

    public function store(Request $request)
    {
        $message = new Message();

        $message::create([
            'nom' => $request->nom,
            'email' => $request->email,
            'comment' => $request->comment,
        ]);
        return  response()->json([
            'message' => "send message"
        ]);
    }

    public function show($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }
    public function destroy($id)
    {
        Message::findOrFail($id)->delete();
        session()->flash('deleted', 'Deleted successfuly');
        return redirect('/api/messages/');
    }
}
