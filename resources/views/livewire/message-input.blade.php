<!-- start chat input section -->
<div class="chat-input-section p-3 p-lg-4 border-top mb-0">
    <form wire:submit.prevent="sendMessage" class="row g-0">
        <div class="col">
            <input wire:model="messageText" type="text" class="form-control form-control-lg bg-light border-light"
                placeholder="Enter Message..." />
        </div>
        <div class="col-auto">
            <div class="chat-input-links ms-md-2 me-md-0">
                <ul class="list-inline mb-0">
                    <li class="list-inline-item" data-bs-toggle="tooltip" data-bs-placement="top" title="Emoji">
                        <button type="button"
                            class="btn btn-link text-decoration-none font-size-16 btn-lg waves-effect">
                            <i class="ri-emotion-happy-line"></i>
                        </button>
                    </li>
                    <li class="list-inline-item" data-bs-toggle="tooltip" data-bs-placement="top" title="Attached File">
                        <button type="button"
                            class="btn btn-link text-decoration-none font-size-16 btn-lg waves-effect">
                            <i class="ri-attachment-line"></i>
                        </button>
                    </li>
                    <li class="list-inline-item">
                        <button type="submit"
                            class="btn btn-primary font-size-16 btn-lg chat-send waves-effect waves-light">
                            <i class="ri-send-plane-2-fill"></i>
                        </button>
                    </li>
                </ul>
            </div>
        </div>
    </form>
</div>
<!-- end chat input section -->
