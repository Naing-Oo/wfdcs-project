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
                    <div class="row">
                        <div class="col-12">
                            <x-form-group label="file.Name" type="text" name="name" required />
                        </div>
                        <div class="col-12">
                            <x-form-group label="file.Email" type="email" name="email" required />
                        </div>
                        <div class="col-12">
                            <x-form-group label="file.Phone" type="tel" name="phone" />
                        </div>
                        <div class="col-12">
                            <x-form-group label="file.Password" type="password" name="password" required />
                        </div>
                        <div class="col-12">
                            <x-form-group label="file.Confirm Password" type="password" name="password_confirmation"
                                required />
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <p class="mr-3">
                    {{ __('file.Already have an account') }}
                    <a href="javascript:;" id="btnLogin">{{ __('file.Log in now') }}</a>
                </p>
                <button type="button" id="btnSubmit" class="btn btn-primary">{{ __('file.Apply') }}</button>
            </div>
        </div>
    </div>
</div>
