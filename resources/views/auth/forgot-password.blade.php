@include('components.head')
<div class="section mt-2 text-center">
    <h1>Forgot password</h1>
    <h4>Type your e-mail to reset your password</h4>
</div>
<div class="section mb-5 p-2">
    <form method="POST" action="{{ route('password.email') }}">
        @csrf
        <div class="card my-4">
            <div class="card-body pb-1">

                <div class="form-group basic">
                    <div class="input-wrapper">
                        <label class="label" for="email">E-mail</label>
                        <input id="email" class="form-control" type="email" name="email" value="{{ old('email') }}"
                            required autofocus placeholder="Your e-mail" />
                        <i class="clear-input">
                            <ion-icon name="close-circle"></ion-icon>
                        </i>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-button-group transparent">
            <button type="submit" class="btn btn-primary btn-block btn-lg">Reset Password</button>
        </div>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>





    </form>

</div>
@include('components.foot')
