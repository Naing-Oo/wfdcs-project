<div class="modal fade" id="registerModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="title"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header d-block">
                <div class="d-flex justify-content-between">
                    <h5 class="modal-title" id="title">
                        {{ __('file.Apply for new membership') }}
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="fa fa-times" aria-hidden="true"></i>
                    </button>
                </div>
            </div>
            <div class="modal-body px-5">
                <form id="frmProfile" action="{{ url('/auth/register') }}" method="post">

                    @csrf

                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="name">{{ __('file.Name') }}:</label>
                                <input type="text" class="form-control" id="name" placeholder="Enter name"
                                    name="name" required>
                                <span class="text-danger invalid name"></span>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="email">{{ __('file.Email') }}:</label>
                                <input type="email" class="form-control" id="email" placeholder="Enter email"
                                    name="email" required>
                                <span class="text-danger invalid email"></span>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="phone">{{ __('file.Phone') }}:</label>
                                <input type="tel" class="form-control" id="phone" placeholder="Enter phone"
                                    name="phone" required>
                                <span class="text-danger invalid phone"></span>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="password">{{ __('file.Password') }}:</label>
                                <input type="password" class="form-control" id="password" placeholder="Enter password"
                                    name="password" required>
                                <span class="text-danger invalid password"></span>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="password_confirmation">{{ __('file.Confirm Password') }}:</label>
                                <input type="password" class="form-control" id="password_confirmation"
                                    placeholder="confirm password" name="password_confirmation" required>
                                <span class="text-danger invalid password_confirmation"></span>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <p class="mr-3">
                    {{ __('file.Already have an account') }}
                    <a href="javascript:;" id="btnLogin" class="btn btn-link">{{ __('file.Log in now') }}</a>
                </p>
                <button type="button" id="btnSubmit" class="btn btn-primary">{{ __('file.Apply') }}</button>
            </div>
        </div>
    </div>
</div>
