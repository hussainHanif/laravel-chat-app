<?php

namespace App\Events;

use App\Models\Message;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class MessageCreated implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public Message $message;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Message $message)
    {
        $this->message = $message;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array
     */
    public function broadcastOn(): array
    {
        $to_user_id = $this->message->conversation->to_user_id;
        $from_user_id = $this->message->conversation->from_user_id;
        $targetUserId = $to_user_id == auth()->id() ? $from_user_id : $to_user_id;

        return [
            new Channel("message.{$this->message->conversation_id}"),
            new Channel("notify.message.$targetUserId"),
        ];
    }

    public function broadcastAs(): string
    {
        return 'message.created';
    }
}
