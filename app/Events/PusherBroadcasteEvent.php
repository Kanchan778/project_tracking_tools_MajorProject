<?php
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Bus\Dispatchable;
use illuminate\Queue\SerializesModels;

class PusherBroadcastEvent implements ShouldBroadcast
{

    use Dispatchable,InteractsWithSockets,SerializesModels;
    public string $message;
    
    // private $pusher;


    public function __construct(string $message)
    {

        $this ->message = $message;
        // $this->pusher = new Pusher(
        //     'YOUR_APP_KEY',
        //     'YOUR_APP_SECRET',
        //     'YOUR_APP_ID',
        //     [
        //         'cluster' => 'YOUR_APP_CLUSTER', // Replace with your cluster
        //         'useTLS' => true, // Enable HTTPS/TLS
        //     ]
        // );
    }



    public function broadcastOn():array{
        return ['public'
        ];
    }



    public function broadcastAs():string{
        return 'chat';
    }

    // public function triggerEvent($channel, $event, $data)
    // {
    //     $this->pusher->trigger($channel, $event, $data);
    // }
}
