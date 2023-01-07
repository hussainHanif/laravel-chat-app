<x-b-layout>
    <div class="layout-wrapper d-lg-flex" x-data="chatData">
        <!-- Start left sidebar-menu -->
        <div class="side-menu flex-lg-column me-lg-1 ms-lg-0">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="index.html" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="{{ asset('chat-ui/images/logo.svg') }}" height="30" />
                    </span>
                </a>

                <a href="index.html" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="{{ asset('chat-ui/images/logo.svg') }}" height="30" />
                    </span>
                </a>
            </div>
            <!-- end navbar-brand-box -->

            <!-- Start side-menu nav -->
            <div class="flex-lg-column my-auto">
                <ul class="nav nav-pills side-menu-nav justify-content-center" role="tablist">
                    <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="top" title="Profile">
                        <a class="nav-link" id="pills-user-tab" data-bs-toggle="pill" href="#pills-user" role="tab">
                            <i class="ri-user-2-line"></i>
                        </a>
                    </li>
                    <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="top" title="Chats">
                        <a class="nav-link active" id="pills-chat-tab" data-bs-toggle="pill" href="#pills-chat"
                            role="tab">
                            <i class="ri-message-3-line"></i>
                        </a>
                    </li>
                    <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="top" title="Groups">
                        <a class="nav-link" id="pills-groups-tab" data-bs-toggle="pill" href="#pills-groups"
                            role="tab">
                            <i class="ri-group-line"></i>
                        </a>
                    </li>
                    <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="top" title="Contacts">
                        <a class="nav-link" id="pills-contacts-tab" data-bs-toggle="pill" href="#pills-contacts"
                            role="tab">
                            <i class="ri-contacts-line"></i>
                        </a>
                    </li>
                    <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="top" title="Settings">
                        <a class="nav-link" id="pills-setting-tab" data-bs-toggle="pill" href="#pills-setting"
                            role="tab">
                            <i class="ri-settings-2-line"></i>
                        </a>
                    </li>
                    <li class="nav-item dropdown profile-user-dropdown d-inline-block d-lg-none">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <img src="{{ asset('chat-ui/images/users/avatar-1.jpg') }}"
                                class="profile-user rounded-circle" />
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">
                                Profile
                                <i class="ri-profile-line float-end text-muted"></i>
                            </a>
                            <a class="dropdown-item" href="#">
                                Setting
                                <i class="ri-settings-3-line float-end text-muted"></i>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">
                                Log out
                                <i class="ri-logout-circle-r-line float-end text-muted"></i>
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
            <!-- end side-menu nav -->

            <div class="flex-lg-column d-none d-lg-block">
                <ul class="nav side-menu-nav justify-content-center">
                    <li class="nav-item">
                        <a class="nav-link light-dark-mode" href="#" data-bs-toggle="tooltip"
                            data-bs-trigger="hover" data-bs-placement="right" title="Dark / Light Mode">
                            <i class="ri-sun-line theme-mode-icon"></i>
                        </a>
                    </li>

                    <li class="nav-item btn-group dropup profile-user-dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <img src="{{ asset('chat-ui/images/users/avatar-1.jpg') }}"
                                class="profile-user rounded-circle" />
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">
                                Profile <i class="ri-profile-line float-end text-muted"></i>
                            </a>
                            <a class="dropdown-item" href="#">
                                Setting <i class="ri-settings-3-line float-end text-muted"></i>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="auth-login.html">
                                Log out <i class="ri-logout-circle-r-line float-end text-muted"></i>
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
            <!-- Side menu user -->
        </div>
        <!-- end left sidebar-menu -->

        @include('layouts.partials.left-sidebar')

        <!-- Start User chat -->
        <div class="user-chat w-100 overflow-hidden">
            <div class="d-lg-flex">
                <!-- start chat conversation section -->
                <div class="chat-detail w-100 overflow-hidden position-relative d-none">
                    @livewire('user-head')
                    <!-- start chat conversation -->
                    <div class="chat-conversation p-3 p-lg-4" data-simplebar="init">
                        @livewire('user-chat-detail')
                    </div>
                    <!-- end chat conversation end -->
                    @livewire('message-input')
                </div>
                <div class="chat-empty d-none d-lg-flex">
                    <h3>No chat selected</h3>
                </div>
                <!-- end chat conversation section -->

                <!-- start User profile detail sidebar -->
                @livewire('user-chat-profile')
                <!-- end User profile detail sidebar -->
            </div>
        </div>
        <!-- End User chat -->

        <!-- audio call Modal -->
        <div class="modal fade" id="audiocallModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="text-center p-4">
                            <div class="avatar-lg mx-auto mb-4">
                                <img src="{{ asset('chat-ui/images/users/avatar-4.jpg') }}"
                                    class="img-thumbnail rounded-circle" />
                            </div>

                            <h5 class="text-truncate">Doris Brown</h5>
                            <p class="text-muted">Start Audio Call</p>

                            <div class="mt-5">
                                <ul class="list-inline mb-1">
                                    <li class="list-inline-item px-2 me-2 ms-0">
                                        <button type="button" class="btn btn-danger avatar-sm rounded-circle"
                                            data-bs-dismiss="modal">
                                            <span class="avatar-title bg-transparent font-size-20">
                                                <i class="ri-close-fill"></i>
                                            </span>
                                        </button>
                                    </li>
                                    <li class="list-inline-item px-2">
                                        <button type="button" class="btn btn-success avatar-sm rounded-circle">
                                            <span class="avatar-title bg-transparent font-size-20">
                                                <i class="ri-phone-fill"></i>
                                            </span>
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- audio call Modal -->

        <!-- video call Modal -->
        <div class="modal fade" id="videocallModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="text-center p-4">
                            <div class="avatar-lg mx-auto mb-4">
                                <img src="{{ asset('chat-ui/images/users/avatar-4.jpg') }}"
                                    class="img-thumbnail rounded-circle" />
                            </div>

                            <h5 class="text-truncate">Doris Brown</h5>
                            <p class="text-muted mb-0">Start Video Call</p>

                            <div class="mt-5">
                                <ul class="list-inline mb-1">
                                    <li class="list-inline-item px-2 me-2 ms-0">
                                        <button type="button" class="btn btn-danger avatar-sm rounded-circle"
                                            data-bs-dismiss="modal">
                                            <span class="avatar-title bg-transparent font-size-20">
                                                <i class="ri-close-fill"></i>
                                            </span>
                                        </button>
                                    </li>
                                    <li class="list-inline-item px-2">
                                        <button type="button" class="btn btn-success avatar-sm rounded-circle">
                                            <span class="avatar-title bg-transparent font-size-20">
                                                <i class="ri-vidicon-fill"></i>
                                            </span>
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end modal -->
        <!-- add user modal -->
        <div id="add-user" role="dialog" class="modal fade" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-md">
                <div tabindex="-1" class="modal-content">
                    <header class="modal-header">
                        <h5 class="modal-title">Add Member</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </header>
                    <div class="modal-body">
                        <form>
                            <div class="form-group mb-4">
                                <label for="addcontactName-input" class="mb-1">Name</label>
                                <input type="text" id="addcontactName-input" placeholder="Enter name"
                                    class="form-control" />
                            </div>
                            <div class="text-right pt-5 mt-3 d-flex justify-content-end">
                                <button type="button" class="btn btn-link" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary ml-1">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- end modal -->
    </div>
    <x-slot name="footer">
        <script>
            document.addEventListener('alpine:init', () => {
                Alpine.data('chatData', () => ({
                    showUserProfile: false,
                    userChatRemove() {
                        document.querySelector('.user-chat').classList.remove('user-chat-show');
                    }
                }))
            })
            document.addEventListener('show-chat-detail', () => {
                // Show chat detail
                document.querySelector('.chat-detail').classList.remove('d-none');
                document.querySelector('.chat-empty').classList.remove('d-lg-flex');
                document.querySelector('.user-chat').classList.add('user-chat-show');

                // Scroll to bottom
                const selector = '.chat-conversation .simplebar-content-wrapper';
                const element = document.querySelector(selector);
                element.scrollTo(0, element.scrollHeight);
            });

            window.livewire.on('connect', (message) => {
                window.Echo.channel(`message.${message.id}`).on('message.created', (response) => {
                    console.log('connected', response);
                    window.livewire.emit('userConversationSelected', message.id);
                });
                window.Echo.channel(`lastSeenTime.${message.id}`).on('message.seen', (response) => {
                    console.log('lastSeenTime', response);
                    window.livewire.emit('userConversationSelected', message.id);
                });
            });
            window.onload = function() {
                window.Echo.channel('conversation.{{ auth()->id() }}').on('conversation.created', (response) => {
                    console.log('conversation.created', response);
                    window.livewire.emit('refreshConversationList');
                });
                window.Echo.channel('notify.message.{{ auth()->id() }}').on('message.created', (response) => {
                    console.log('nofity.message', response);
                    window.livewire.emit('refreshConversationList');
                });
            }
        </script>
    </x-slot>
</x-b-layout>
