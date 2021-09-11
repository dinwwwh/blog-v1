<x-layouts.base>
    <div class="min-h-screen bg-white flex">
        <div class="flex-1 flex flex-col justify-center py-12 px-4 sm:px-6 lg:flex-none lg:px-20 xl:px-24">
            <div class="mx-auto w-full max-w-sm lg:w-96">
                <div>
                    <x-app.logo />
                    <x-headings.h2>
                        Đăng ký thành viên mới
                    </x-headings.h2>
                    <p class="mt-2 text-sm text-gray-600">
                        Hoặc
                        <x-anchors.base href="{{ route('login') }}">
                            đăng nhập
                        </x-anchors.base>
                    </p>
                </div>

                <div class="mt-8">
                    <x-forms.base action="{{ route('register') }}" method="POST" class="space-y-6">

                        <x-inputs.base name="name" placeholder="Le Dinh" :value="old('name')"
                            :error="$errors->first('name')">
                            Tên của bạn
                            <x-slot name="description">{{ $errors->first('name') }}</x-slot>
                        </x-inputs.base>


                        <x-inputs.base :value="old('email')" :error="$errors->first('email')" name="email" type="email"
                            placeholder="example@dinhdjj.com">
                            Địa chỉ email
                            <x-slot name="description">{{ $errors->first('email') }}</x-slot>
                        </x-inputs.base>

                        <x-inputs.base :error="$errors->first('password')" name="password" type="password"
                            placeholder="*******">
                            Mật khẩu
                            <x-slot name="description">{{ $errors->first('password') }}</x-slot>
                        </x-inputs.base>

                        <x-inputs.base :error="$errors->first('password_confirmation')" name="password_confirmation"
                            type="password" placeholder="*******">
                            Mật khẩu xác nhận
                            <x-slot name="description">{{ $errors->first('password_confirmation') }}</x-slot>
                        </x-inputs.base>

                        @if (session('successRegister'))
                        <x-messages.base.success>{{ session('successRegister') }}</x-messages.base.success>
                        @endif

                        <x-buttons.base>
                            Đăng ký
                        </x-buttons.base>
                    </x-forms.base>
                </div>
            </div>
        </div>
        <div class="hidden lg:block relative w-0 flex-1">
            <img class="absolute inset-0 h-full w-full object-cover" src="{{ asset('images/app/bg-auth.jpg') }}">
        </div>
    </div>
</x-layouts.base>
