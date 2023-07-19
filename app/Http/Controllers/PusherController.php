<?php

namespace App\Http\Controllers;

use Illuminate\Broadcasting\Broadcasters\PusherBroadcaster;
use Illuminate\Http\Request;
use Pusher\Pusher;
use App\Models\User;
use Illuminate\Routing\Controller;
use PusherBroadcast;

class PusherController extends Controller
{
    public function index()
    {
        return view('Dashboard.projectCoordinator');
    }

//     public function broadcast(Request $request)
// {
//     $message = $request->input('message');
//     event(new PusherBroadcast($message));

//     return view('broadcast', ['message' => $message]);
// }


    public function receive(Request $request)
    {
        // $message = $request->input('message');

        // Perform any actions with the received message

        return view('receive',['message' => $request-> get (key:'message') ]);
    }
    
    public function displayChat()
    {
        $users = User::all();

        return view('dashboard.projectCoordinator', compact('users'));
    }
    
    public function sendMessage(Request $request)
    {
        $message = $request->input('message');
        $user = User::find($request->input('user_id'));
        
        // Save the message to the database
        
        // Broadcast the event
        event(new PusherBroadcast($message, $user));
        
        // Return a response if needed
    }
    
    

}
