<?php

namespace App\Http\Controllers;

use Illuminate\Broadcasting\Broadcasters\PusherBroadcaster;
use Illuminate\Http\Request;
use App\Events\PusherBroadcast;
use Pusher\Pusher;

class PusherController extends Controller
{
    public function index()
    {
        return view('pusher.index');
    }

    public function broadcast(Request $request)
    {
        // $pusher = new Pusher(
        //     env('PUSHER_APP_KEY'),
        //     env('PUSHER_APP_SECRET'),
        //     env('PUSHER_APP_ID'),
        //     [
        //         'cluster' => env('PUSHER_APP_CLUSTER'),
        //         'useTLS' => true
        //     ]
        // );

        // $message = $request->input('message');

        // // Broadcast the message to a channel named 'my-channel'
        // $pusher->trigger('my-channel', 'my-event', ['message' => $message]);

        broadcast((new PusherBroadcast($request->get(key:'message')))->toothers());
        return view('broadcast', ['message' => $request->get('message')]);

        // return response()->json(['message' => 'Message broadcasted successfully']);
    }

    public function receive(Request $request)
    {
        // $message = $request->input('message');

        // Perform any actions with the received message

        return view('receive',['message' => $request-> get (key:'message') ]);
    }

    // public function auth(Request $request)
    // {
    //     // Authenticate and authorize users to access private channels

    //     $pusher = new Pusher(
    //         env('PUSHER_APP_KEY'),
    //         env('PUSHER_APP_SECRET'),
    //         env('PUSHER_APP_ID'),
    //         [
    //             'cluster' => env('PUSHER_APP_CLUSTER'),
    //             'useTLS' => true
    //         ]
    //     );

    //     $socketId = $request->input('socket_id');
    //     $channelName = $request->input('channel_name');
    //     $userId = auth()->id(); // Adjust this as per your authentication setup

    //     $auth = $pusher->socket_auth($channelName, $socketId, $userId);

    //     return response($auth);
    // }
}
