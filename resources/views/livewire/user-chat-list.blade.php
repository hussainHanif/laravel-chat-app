<ul class="list-unstyled chat-list chat-user-list">
    @foreach ($this->conversations as $item)
        <li @class(['active' => $conversationId == $item->id])>
            <div class="chat-list-item" wire:click="userConversationClick({{ $item->id }})" role="button">
                <div class="d-flex">
                    <div class="chat-user-img online align-self-center me-3 ms-0">
                        <img src="{{ $item->user_avatar }}" class="rounded-circle avatar-xs" />
                        @if ($item->is_online)
                            <span class="user-status"></span>
                        @endif
                    </div>

                    <div class="flex-grow-1 overflow-hidden">
                        <h5 class="text-truncate font-size-15 mb-1">
                            {{ $item->username }}
                        </h5>
                        <p @class([
                            'chat-user-message text-truncate mb-0',
                            'fw-bold text-dark' => $item->unread_message_count > 0,
                        ])>
                            {!! $item->latest_message !!}
                        </p>
                    </div>
                    <div class="font-size-11">{{ $item->latest_message_time }}</div>
                </div>
            </div>
        </li>
    @endforeach
    <li class="unread">
        <div class="chat-list-item" role="button">
            <div class="d-flex">
                <div class="chat-user-img away align-self-center me-3 ms-0">
                    <img src="{{ asset('chat-ui/images/users/avatar-3.jpg') }}" class="rounded-circle avatar-xs" />
                    <span class="user-status"></span>
                </div>
                <div class="flex-grow-1 overflow-hidden">
                    <h5 class="text-truncate font-size-15 mb-1">Mark Messer</h5>
                    <p class="chat-user-message text-truncate mb-0">
                        <i class="ri-image-fill align-middle me-1 ms-0"></i> Images
                    </p>
                </div>
                <div class="font-size-11">12 min</div>
                <div class="unread-message">
                    <span class="badge badge-soft-danger rounded-pill">02</span>
                </div>
            </div>
        </div>
    </li>
    <li>
        <div class="chat-list-item" role="button">
            <div class="d-flex">
                <div class="chat-user-img away align-self-center me-3 ms-0">
                    <img src="{{ asset('chat-ui/images/users/avatar-6.jpg') }}" class="rounded-circle avatar-xs" />
                    <span class="user-status"></span>
                </div>
                <div class="flex-grow-1 overflow-hidden">
                    <h5 class="text-truncate font-size-15 mb-1">Steve Walker</h5>
                    <p class="chat-user-message text-truncate mb-0">
                        <i class="ri-file-text-fill align-middle me-1 ms-0"></i>
                        Admin-A.zip
                    </p>
                </div>
                <div class="font-size-11">03:20 PM</div>
            </div>
        </div>
    </li>
    <li class="typing">
        <div class="chat-list-item" role="button">
            <div class="d-flex">
                <div class="chat-user-img align-self-center online me-3 ms-0">
                    <div class="avatar-xs">
                        <span class="avatar-title rounded-circle bg-soft-primary text-primary">
                            A
                        </span>
                    </div>
                    <span class="user-status"></span>
                </div>
                <div class="flex-grow-1 overflow-hidden">
                    <h5 class="text-truncate font-size-15 mb-1">Albert Rodarte</h5>
                    <p class="chat-user-message text-truncate mb-0">
                        typing<span class="animate-typing">
                            <span class="dot"></span>
                            <span class="dot"></span>
                            <span class="dot"></span>
                        </span>
                    </p>
                </div>
                <div class="font-size-11">04:56 PM</div>
            </div>
        </div>
    </li>
</ul>
