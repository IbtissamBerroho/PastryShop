<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Command;
use App\Notifications\CommandeNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class CommandsController extends Controller
{
    public function index(){
        $commands = Command::all();
        return view('Commands.AllCommands', [
            'commands'=> $commands
        ]);
    }
    public function store(Request $request)
    {
        $commands = new Command();

        $commands::create([
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'city' => $request->city,
            'card_number' => $request->card_number,
            'date_command' => $request->date_command,
            'date_reciept' => $request->date_reciept,
            'products' => $request->products,
            'statut' => 'non valid'
        ]);
        return  response()->json([
            'message' => "commands added successfully"
        ]);
    }
    public function show($id){
        $command = Command::findOrFail($id);
        $command->statut = 'valid';
        $command->save();

        $user = $command->email;
        // Notification::send($user, new \App\Notifications\CommandeNotification($id));
        Notification::route('mail', $user)->notify(new CommandeNotification($user));
        return redirect('/api/commands/')->with('message', 'commands validated successfully');
    }
    public function destroy($id){
        $command = Command::findOrFail($id);
        $command->delete();
        return redirect('/api/commands/')->with('message', 'commands deleted successfully');
    }
}
