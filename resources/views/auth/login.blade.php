@include('components.head')
<div class="container" x-data="{ showPassword: false }">
    <div class="col-12 mx-auto">
        <div class="section mt-2 text-center">
            <img src="{{ asset('img/texted-logo.png') }}" class="mx-auto" width="30%" alt="">
        </div>
        <div class="section mb-5 p-2">
            <form action="/login" method="POST">
                @csrf
                <div class="card">
                    <h2 class="mt-1 text-center text-2xl font-bold">{{ __('Login') }}</h2>
                    <div class="card-body pb-1">
                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label" for="email1">E-mail</label>
                                <input type="email" name="email" class="form-control" id="email1"
                                    placeholder="example@domain.com" required>
                                <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>

                            </div>
                            @error('email')
                                <span class="text-sm !text-red-400">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label" for="password1">Password</label>
                                <input x-bind:type="showPassword ? 'text': 'password'" class="form-control"
                                    id="password1" autocomplete="off" placeholder="*********" name="password" required>
                                <i @click.prevent="showPassword = !showPassword" class="clear-input">
                                    <ion-icon x-bind:name="showPassword ? 'eye-off-outline': 'eye-outline'"></ion-icon>
                                </i>


                            </div>
                            @error('password')
                                <span class="text-sm !text-red-400">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="transparent text-center col-8 mx-auto">
                            <button type="submit" class="btn btn-primary btn-md btn-block">Log in</button>
                        </div>
                        <div class="text-center my-3">
                            <a href="{{ route('password.email') }}" class="text-blue-400">Forgot
                                Password?</a>
                        </div>
                        <div class="text-center">
                            Don't have an account <a href="{{  route('register') }}" class="text-blue-500">Register Now</a>
                        </div>
                    </div>


                </div>
            </form>
        </div>
    </div>

</div>
@include('components.foot')
