<?php

namespace App\Http\Livewire;


use Livewire\Component;
use Illuminate\View\View;
use App\Models\Conversation;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;
use App\Events\MessageSeenTime;

class UserChatDetail extends Component
{
    public Conversation $conversation;
    public $messages;

    protected $listeners = [
        'userConversationSelected' => 'userConversationSelected',
    ];

    public function userConversationSelected($id)
    {
        $this->conversation = Conversation::with(['from', 'to', 'messages'])->find($id);

        $this->messages = collect($this->conversation->messages)->groupBy(function ($message) {
            return $message->created_at->format('d-M-Y');
        });
        $this->updateMessageStatus($id);
        $this->emit('conversationSelected', $id);
        $this->emit('connect', $this->conversation);
        $this->dispatchBrowserEvent('show-chat-detail');
    }

    /**
     * @param $conversationId
     * @return void
     */
    public function updateMessageStatus($conversationId): void
    {
        Message::query()
            ->where('conversation_id', $conversationId)
            ->where('user_id', '!=', Auth::id())
            ->where('is_seen', false)
            ->update(['is_seen' => true]);
        $this->updateMessageSeenTime($conversationId);
    }

    /**
     * @param $conversationId
     * @return void
     */
    public function updateMessageSeenTime($conversationId): void
    {
        $messages = Message::query()
            ->where('conversation_id', $conversationId)
            ->where('user_id', '!=', Auth::id())
            ->whereNull('seen_at')->get();

        if ($messages->count() > 0) {
            $messages->each(function ($message) {
                $message->update(['seen_at' => now()]);
            });
            $message = $messages->last();
            broadcast(new MessageSeenTime($message))->toOthers();
        }
    }

    /**
     * @return View
     */
    public function render(): View
    {
        return view('livewire.user-chat-detail');
    }
}
