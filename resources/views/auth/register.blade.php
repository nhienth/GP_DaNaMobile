<x-guest-layout>
    <div class="overlay-layout">  </div>
    <div class="img-layout" style="background-image: url('{{asset('form/images/background.jpg')}}'); background-size: cover; background-repeat: no-repeat; background-position: center center;height:760px">
    <!-- Validation Errors -->
        <section class="ftco-section">
            <div class="container">
                <x-auth-validation-errors class="mb-4" :errors="$errors" />
                <div class="row justify-content-center">
                    <div class="col-md-6 text-center mb-5">
                    <h2 class="heading-section">Đăng ký</h2>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-6 col-lg-4">
                        <div class="login-wrap p-0">
                            <form class="signin-form" method="POST" action="{{ route('register') }}">
                                @csrf
                                <!-- Họ và tên -->
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Mời nhập họ và tên"
                                    id="name" name="name" :value="old('name')" required autofocus >
                                </div>

                                <!-- Địa chỉ email -->
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="Mời nhập Email"
                                    id="email" name="email" :value="old('email')" required >
                                </div>
                                <!-- Mật khẩu -->
                                <div class="form-group">
                                    <input id="password" type="password" class="form-control" placeholder="Mời nhập mật khẩu" 
                                    name="password" required autocomplete="new-password" >
                                    <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                </div>

                                <!-- Nhập lại mật khẩu -->
                                <div class="form-group">
                                    <input id="password_confirmation" type="password" class="form-control" placeholder="Mời nhập mật khẩu" 
                                    name="password_confirmation" required>
                                    <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                </div>

                                <div class="flex items-center justify-end mt-4">
                                    <div class="form-group">
                                        <div class="flex items-center justify-end mt-4">
                                            <x-primary-button class="form-control btn btn-primary submit px-3">
                                            {{ __('Đăng ký') }}
                                            </x-primary-button>
                                        </div>
                                    </div>
                                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                                        {{ __('Already registered?') }}
                                    </a>
                                </div>
                            </form>
                            <p class="w-100 text-center">&mdash; Hoặc đăng ký bằng &mdash;</p>
                            <div class="social d-flex text-center">
                                <a href="#" class="px-2 py-2 mr-md-1 rounded"><span class="ion-logo-facebook mr-2"></span> Facebook</a>
                                <a href="#" class="px-2 py-2 ml-md-1 rounded"><span class="ion-logo-twitter mr-2"></span> Twitter</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</x-guest-layout>
