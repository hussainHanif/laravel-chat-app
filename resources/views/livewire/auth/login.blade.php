<div class="account-pages my-5 pt-sm-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-5">
                <div class="text-center mb-4">
                    <a href="/" class="auth-logo mb-5 d-block">
                        <img src="{{ asset('chat-ui/images/logo.svg') }}" height="30" class="logo" />
                    </a>

                    <h4>Sign in</h4>
                    <p class="text-muted mb-4">Sign in to continue to Chatvia.</p>
                </div>
                <div class="card">
                    <div class="card-body p-4">
                        <div class="p-3">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group">
                                    <label>Email</label>
                                    <div class="input-group mb-3 bg-soft-light input-group-lg rounded-lg">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text border-light text-muted">
                                                <i class="ri-mail-line"></i>
                                            </span>
                                        </div>
                                        <input type="email" class="form-control bg-soft-light border-light"
                                            placeholder="Email" />
                                    </div>
                                </div>

                                <div class="form-group mb-4">
                                    <div class="float-right">
                                        <a tag="a" href="/forgot-password" class="text-muted font-size-13">Forgot
                                            your password?
                                        </a>
                                    </div>
                                    <label>Password</label>
                                    <div class="input-group mb-3 bg-soft-light input-group-lg rounded-lg">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text border-light text-muted">
                                                <i class="ri-lock-2-line"></i>
                                            </span>
                                        </div>
                                        <input type="password" class="form-control bg-soft-light border-light"
                                            placeholder="Password" />
                                    </div>
                                </div>
                                <button class="btn btn-primary btn-block w-100" type="submit">Login</button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="mt-5 text-center">
                    <p>
                        Don't have an account ?
                        <a href="/register" class="font-weight-medium text-primary">
                            Signup now
                        </a>
                    </p>
                    <p>
                        © © 2022 Chatvia. Crafted with
                        <i class="mdi mdi-heart text-danger"></i>
                        by Themesbrand
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
