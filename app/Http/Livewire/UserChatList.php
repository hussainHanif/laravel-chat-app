<?php

namespace App\Http\Livewire;


use Livewire\Component;
use Illuminate\View\View;
use App\Models\Conversation;
use Illuminate\Database\Eloquent\Collection;

class UserChatList extends Component
{
    public $conversationId;

    protected $listeners = [
        'refreshConversationList' => '$refresh',
    ];

    /**
     * @return Collection
     */
    public function getConversationsProperty(): Collection
    {
        return Conversation::query()
            ->where('from_user_id', auth()->id())
            ->orWhere('to_user_id', auth()->id())
            ->with(['from', 'to'])
            ->withCount(['unreadMessage'])
            ->orderBy('updated_at', 'desc')
            ->get();
    }

    public function userConversationClick($id)
    {
        $this->conversationId = $id;
        $this->emit('userConversationSelected', $id);
    }
    /**
     * @return View
     */
    public function render(): View
    {
        return view('livewire.user-chat-list');
    }
}
