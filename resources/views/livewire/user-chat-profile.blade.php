<div class="user-profile-sidebar" :class="{ 'd-block': showUserProfile }">
    <div class="px-3 px-lg-4 pt-3 pt-lg-4">
        <div class="user-chat-nav text-end">
            <button type="button" class="btn nav-btn" id="user-profile-hide" @click="showUserProfile = false">
                <i class="ri-close-line"></i>
            </button>
        </div>
    </div>

    @if ($conversation)
        <div class="text-center p-4 border-bottom">
            <div class="mb-4">
                <img src="{{ $conversation->user_avatar }}" class="rounded-circle avatar-lg img-thumbnail" />
            </div>

            <h5 class="font-size-16 mb-1 text-truncate">
                {{ $conversation->username }}
            </h5>
            <p class="text-muted text-truncate mb-1">
                @if ($conversation->is_online)
                    <i class="ri-record-circle-fill font-size-10 text-success me-1 ms-0"></i> Active
                @else
                    {{ $conversation->last_active_at }}
                @endif
            </p>
        </div>
        <!-- End profile user -->

        <!-- Start user-profile-desc -->
        <div class="p-4 user-profile-desc overflow-auto">
            <div class="text-muted">
                <p class="mb-4">
                    If several languages coalesce, the grammar of the resulting language is more simple
                    and regular than that of the individual.
                </p>
            </div>

            <div class="accordion" id="my-profile">
                <div class="accordion-item card border mb-2">
                    <div class="accordion-header" id="about3">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#about-profile" aria-expanded="true" aria-controls="about-profile">
                            <h5 class="font-size-14 m-0">
                                <i class="ri-user-2-line me-2 ms-0 align-middle d-inline-block"></i>
                                About
                            </h5>
                        </button>
                    </div>
                    <div id="about-profile" class="accordion-collapse collapse show" aria-labelledby="about3"
                        data-bs-parent="#my-profile">
                        <div class="accordion-body">
                            <div>
                                <p class="text-muted mb-1">Name</p>
                                <h5 class="font-size-14">{{ $conversation->getUserData }}</h5>
                            </div>

                            <div class="mt-4">
                                <p class="text-muted mb-1">Email</p>
                                <h5 class="font-size-14">adc@123.com</h5>
                            </div>

                            <div class="mt-4">
                                <p class="text-muted mb-1">Time</p>
                                <h5 class="font-size-14">11:40 AM</h5>
                            </div>

                            <div class="mt-4">
                                <p class="text-muted mb-1">Location</p>
                                <h5 class="font-size-14 mb-0">California, USA</h5>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="accordion-item card border">
                    <div class="accordion-header" id="attach-file3">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#attach-profile" aria-expanded="false" aria-controls="attach-profile">
                            <h5 class="font-size-14 m-0">
                                <i class="ri-attachment-line me-2 ms-0 align-middle d-inline-block"></i>
                                Attached Files
                            </h5>
                        </button>
                    </div>
                    <div id="attach-profile" class="accordion-collapse collapse" aria-labelledby="attach-file3"
                        data-bs-parent="#my-profile">
                        <div class="accordion-body">
                            <div class="card p-2 border mb-2">
                                <div class="d-flex align-items-center">
                                    <div class="avatar-sm me-3 ms-0">
                                        <div class="avatar-title bg-soft-primary text-primary rounded font-size-20">
                                            <i class="ri-file-text-fill"></i>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1">
                                        <div class="text-start">
                                            <h5 class="font-size-14 mb-1">admin_v1.0.zip</h5>
                                            <p class="text-muted font-size-13 mb-0">12.5 MB</p>
                                        </div>
                                    </div>

                                    <div class="ms-4 me-0">
                                        <ul class="list-inline mb-0 font-size-18">
                                            <li class="list-inline-item">
                                                <a href="#" class="text-muted px-1">
                                                    <i class="ri-download-2-line"></i>
                                                </a>
                                            </li>
                                            <li class="list-inline-item dropdown">
                                                <a class="dropdown-toggle text-muted px-1" href="#" role="button"
                                                    data-bs-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    <i class="ri-more-fill"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item" href="#">Action</a>
                                                    <a class="dropdown-item" href="#">Another
                                                        action</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item" href="#">Delete</a>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="card p-2 border mb-2">
                                <div class="d-flex align-items-center">
                                    <div class="avatar-sm me-3 ms-0">
                                        <div class="avatar-title bg-soft-primary text-primary rounded font-size-20">
                                            <i class="ri-image-fill"></i>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1">
                                        <div class="text-start">
                                            <h5 class="font-size-14 mb-1">Image-1.jpg</h5>
                                            <p class="text-muted font-size-13 mb-0">4.2 MB</p>
                                        </div>
                                    </div>

                                    <div class="ms-4 me-0">
                                        <ul class="list-inline mb-0 font-size-18">
                                            <li class="list-inline-item">
                                                <a href="#" class="text-muted px-1">
                                                    <i class="ri-download-2-line"></i>
                                                </a>
                                            </li>
                                            <li class="list-inline-item dropdown">
                                                <a class="dropdown-toggle text-muted px-1" href="#"
                                                    role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    <i class="ri-more-fill"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item" href="#">Action</a>
                                                    <a class="dropdown-item" href="#">Another
                                                        action</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item" href="#">Delete</a>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="card p-2 border mb-2">
                                <div class="d-flex align-items-center">
                                    <div class="avatar-sm me-3 ms-0">
                                        <div class="avatar-title bg-soft-primary text-primary rounded font-size-20">
                                            <i class="ri-image-fill"></i>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1">
                                        <div class="text-start">
                                            <h5 class="font-size-14 mb-1">Image-2.jpg</h5>
                                            <p class="text-muted font-size-13 mb-0">3.1 MB</p>
                                        </div>
                                    </div>

                                    <div class="ms-4 me-0">
                                        <ul class="list-inline mb-0 font-size-18">
                                            <li class="list-inline-item">
                                                <a href="#" class="text-muted px-1">
                                                    <i class="ri-download-2-line"></i>
                                                </a>
                                            </li>
                                            <li class="list-inline-item dropdown">
                                                <a class="dropdown-toggle text-muted px-1" href="#"
                                                    role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    <i class="ri-more-fill"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item" href="#">Action</a>
                                                    <a class="dropdown-item" href="#">Another
                                                        action</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item" href="#">Delete</a>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="card p-2 border mb-2">
                                <div class="d-flex align-items-center">
                                    <div class="avatar-sm me-3 ms-0">
                                        <div class="avatar-title bg-soft-primary text-primary rounded font-size-20">
                                            <i class="ri-file-text-fill"></i>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1">
                                        <div class="text-start">
                                            <h5 class="font-size-14 mb-1">Landing-A.zip</h5>
                                            <p class="text-muted font-size-13 mb-0">6.7 MB</p>
                                        </div>
                                    </div>

                                    <div class="ms-4 me-0">
                                        <ul class="list-inline mb-0 font-size-18">
                                            <li class="list-inline-item">
                                                <a href="#" class="text-muted px-1">
                                                    <i class="ri-download-2-line"></i>
                                                </a>
                                            </li>
                                            <li class="list-inline-item dropdown">
                                                <a class="dropdown-toggle text-muted px-1" href="#"
                                                    role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    <i class="ri-more-fill"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item" href="#">Action</a>
                                                    <a class="dropdown-item" href="#">Another
                                                        action</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item" href="#">Delete</a>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end profile-user-accordion -->
        </div>
        <!-- end user-profile-desc -->
    @endif
</div>
