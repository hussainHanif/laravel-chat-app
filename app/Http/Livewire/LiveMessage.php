<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Message;
use App\Models\Conversation;
use App\Events\MessageCreated;
use App\Events\MessageSeenTime;
use App\Events\ConversationCreated;
use App\Helpers\Helpers;
use Livewire\Component;
use Illuminate\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;

class LiveMessage extends Component
{
    use WithFileUploads;

    public $conversation, $newMessage, $messageText, $isSelected = false;
    public $mediaUpload = [];

    protected $listeners = [
        'refreshMessage' => 'getMessage',
        'refreshConversation' => 'getConversationsProperty'
    ];

    public function updatedMediaUpload()
    {
        $this->dispatchBrowserEvent('scroll-bottom');
    }

    /**
     * @return void
     */
    public function sendMessage(): void
    {
        $this->validate([
            'messageText' => 'required'
        ]);

        if (!isset($this->conversation->id)) {
            // check if conversation exists
            $conversation = Conversation::query()
                ->where('from_user_id', Auth::id())
                ->where('to_user_id', $this->newMessage->id)
                ->first();

            if (!$conversation) {
                $conversation = Conversation::create([
                    'from_user_id' => Auth::id(),
                    'to_user_id' => $this->newMessage->id
                ]);
            }
            $conversationId = $conversation->id;
            broadcast(new ConversationCreated($conversation))->toOthers();
        } else {
            $conversationId = $this->conversation->id;
        }

        $messageText = preg_replace(Helpers::LINK_REGEX, Helpers::LINK_REPLACE, $this->messageText);
        $messageText = preg_replace(Helpers::EMAIL_REGEX, Helpers::EMAIL_REPLACE, $messageText);
        $messageText = preg_replace(Helpers::PHONE_REGEX, Helpers::PHONE_REPLACE, $messageText);

        $message = Message::create([
            'conversation_id' => $conversationId,
            'user_id' => Auth::id(),
            'message' => $messageText
        ]);
        $message->conversation->update(['updated_at' => now()]);
        broadcast(new MessageCreated($message))->toOthers();
        $this->messageText = null;
        $this->getMessage($conversationId);
    }

    /**
     * @param $conversationId
     * @return void
     */
    public function getMessage($conversationId): void
    {
        $this->isSelected = true;
        $this->newMessage = null;
        $this->conversation = Conversation::with(['from', 'to', 'messages'])->find($conversationId);
        $this->dispatchBrowserEvent('scroll-bottom');
        $this->emit('connect', $this->conversation);
        $this->updateMessageStatus($conversationId);
    }

    /**
     * @return Collection
     */
    public function getConversationsProperty(): Collection
    {
        return Conversation::query()
            ->where('from_user_id', Auth::id())
            ->orWhere('to_user_id', Auth::id())
            ->with(['from', 'to'])
            ->withCount(['unreadMessage'])
            ->orderBy('updated_at', 'desc')
            ->get();
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
     * @param $id
     * @return void
     */
    public function updateMessageSeenAt($id): void
    {
        Message::query()
            ->where('id', $id)
            ->whereNull('seen_at')
            ->update(['seen_at' => now()]);
    }

    /**
     * @param $id
     * @return void
     */
    public function startNewMessage($id): void
    {
        $this->reset();
        $this->conversation = null;
        $this->isSelected = true;
        $this->newMessage = User::find($id);
    }

    /**
     * @return bool
     */
    public function hasNewMessage(): bool
    {
        $message = Conversation::query()->whereHas('messages', function ($query) {
            return $query->where('is_seen', 0);
        })->count();

        return (bool)$message;
    }

    /**
     * @return Collection
     */
    public function getUsersProperty(): Collection
    {
        $ids = array_merge(
            [Auth::id()],
            $this->conversations->pluck('from_user_id')->toArray(),
            $this->conversations->pluck('to_user_id')->toArray()
        );
        return User::query()->whereNotIn('id', $ids)->get();
    }

    /**
     * @return View
     */
    public function render(): View
    {
        return view('livewire.live-message');
    }
}
