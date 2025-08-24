<div class="modal fade" id="loginModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="title"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header d-block">
                <div class="d-flex justify-content-between">
                    <h5 class="modal-title" id="title">
                        {{ __('file.Login') }}
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="fa fa-times" aria-hidden="true"></i>
                    </button>
                </div>
            </div>
            <div class="modal-body pb-5 px-5">

                <form id="frmWebLogin" action="{{ url('/auth/login') }}" class="was-validated" method="post">

                    @csrf

                    <input type="hidden" name="redirect" id="redirect" value="{{ URL::current() }}">

                    <div class="form-group">
                        <label for="email">{{ __('file.Email') }}:</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter username"
                            name="email" required>
                        <span class="text-danger invalid email"></span>
                    </div>
                    <div class="form-group">
                        <label for="password">{{ __('file.Password') }}:</label>
                        <input type="password" class="form-control" id="password" placeholder="Enter password"
                            name="password" required>
                        <span class="text-danger invalid password"></span>
                    </div>
                    
                    <button type="button" class="btn btn-info w-100"
                        onclick="webLogin()">{{ __('file.Login') }}
                    </button>

                    {{-- <button type="submit" class="btn btn-info w-100">Login</button> --}}

                </form>

                <p class="mt-3 text-center"> {{ __('file.Do not have an account yet') }}
                    <a href="javascript:;" id="btnRegister">{{ __('file.Apply for new membership') }}</a>
                </p>
                <p class="mt-3 text-center">{{ __('file.Or log in with') }}</p>
                
                <a href="{{ url('/auth/google') }}" class="btn btn-light d-block">
                    <img src="{{ asset('web/img/Google_Icons-09-512.webp') }}" class="img-fluid" width="30"
                        height="30" alt="">
                    Google
                </a>
            </div>
        </div>
    </div>
</div>
