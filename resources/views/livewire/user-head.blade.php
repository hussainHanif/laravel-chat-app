<div class="p-3 p-lg-4 border-bottom user-chat-topbar">
    @if ($conversation)
        <div class="row align-items-center">
            <div class="col-sm-4 col-8">
                <div class="d-flex align-items-center">
                    <div class="d-block d-lg-none me-2 ms-0">
                        <a href="javascript: void(0);" class="user-chat-remove text-muted font-size-16 p-2"
                            @click="userChatRemove"><i class="ri-arrow-left-s-line"></i></a>
                    </div>
                    <div class="me-3 ms-0">
                        <img src="{{ $conversation->user_avatar }}" class="rounded-circle avatar-xs" />
                    </div>
                    <div class="flex-grow-1 overflow-hidden">
                        <h5 class="font-size-16 mb-0 text-truncate">
                            <a href="#" class="text-reset user-profile-show">{{ $conversation->username }}</a>
                            @if ($conversation->is_online)
                                <i class="ri-record-circle-fill font-size-10 text-success d-inline-block ms-1"></i>
                            @endif
                        </h5>
                    </div>
                </div>
            </div>
            <div class="col-sm-8 col-4">
                <ul class="list-inline user-chat-nav text-end mb-0">
                    <li class="list-inline-item">
                        <div class="dropdown">
                            <button class="btn nav-btn dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="ri-search-line"></i>
                            </button>
                            <div class="dropdown-menu p-0 dropdown-menu-end dropdown-menu-md">
                                <div class="search-box p-2">
                                    <input type="text" class="form-control bg-light border-0"
                                        placeholder="Search.." />
                                </div>
                            </div>
                        </div>
                    </li>

                    <li class="list-inline-item d-none d-lg-inline-block me-2 ms-0">
                        <button type="button" class="btn nav-btn" data-bs-toggle="modal"
                            data-bs-target="#audiocallModal">
                            <i class="ri-phone-line"></i>
                        </button>
                    </li>

                    <li class="list-inline-item d-none d-lg-inline-block me-2 ms-0">
                        <button type="button" class="btn nav-btn" data-bs-toggle="modal"
                            data-bs-target="#videocallModal">
                            <i class="ri-vidicon-line"></i>
                        </button>
                    </li>

                    <li class="list-inline-item d-none d-lg-inline-block me-2 ms-0">
                        <button type="button" class="btn nav-btn user-profile-show" @click="showUserProfile = true">
                            <i class="ri-user-2-line"></i>
                        </button>
                    </li>

                    <li class="list-inline-item">
                        <div class="dropdown">
                            <button class="btn nav-btn dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="ri-more-fill"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item d-block d-lg-none user-profile-show" href="#"
                                    @click="showUserProfile = true">
                                    View profile
                                    <i class="ri-user-2-line float-end text-muted"></i>
                                </a>
                                <a class="dropdown-item d-block d-lg-none" href="#" data-bs-toggle="modal"
                                    data-bs-target="#audiocallModal">
                                    Audio
                                    <i class="ri-phone-line float-end text-muted"></i>
                                </a>
                                <a class="dropdown-item d-block d-lg-none" href="#" data-bs-toggle="modal"
                                    data-bs-target="#videocallModal">
                                    Video <i class="ri-vidicon-line float-end text-muted"></i>
                                </a>
                                <a class="dropdown-item" href="#">
                                    Archive <i class="ri-archive-line float-end text-muted"></i>
                                </a>
                                <a class="dropdown-item" href="#">
                                    Muted <i class="ri-volume-mute-line float-end text-muted"></i>
                                </a>
                                <a class="dropdown-item" href="#">
                                    Delete <i class="ri-delete-bin-line float-end text-muted"></i>
                                </a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    @endif
</div>
<!-- end chat user head -->
