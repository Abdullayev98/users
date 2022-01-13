<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class MyEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $user_id_fjs;
    public $id_task;
    public $id_cat;
    public $title_task;
    public $type;

    public function __construct($id_task,$id_cat,$title_task,$type,$user_id_fjs)
    {
        $this->user_id_fjs = $user_id_fjs;
        $this->id_task = $id_task;
        $this->id_cat = $id_cat;
        $this->title_task = $title_task;
        $this->type = $type;
    }

    public function broadcastOn()
    {
        return ['my-channel'];
    }

    public function broadcastAs()
    {
        return 'my-event';
    }
}
