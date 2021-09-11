<x-layouts.base>
    <div class="min-h-screen bg-white flex">

        {{-- Main form --}}
        <div class="flex-1 flex flex-col justify-center py-12 px-4 sm:px-6 lg:flex-none lg:px-20 xl:px-24">
            <div class="mx-auto w-full max-w-sm lg:w-96 space-y-8">
                <div>
                    <x-app.logo />
                    <x-headings.h2>
                        Đăng nhập vào hệ thống
                    </x-headings.h2>
                    <p class="mt-2 text-sm text-gray-600">
                        Hoặc
                        <x-anchors.base href="{{ route('register') }}">
                            đăng ký
                        </x-anchors.base>
                    </p>
                </div>

                <x-forms.base action="{{ route('login') }}" method="POST" class="space-y-6">

                    @error('email')
                    <x-inputs.base name="email" placeholder="example@dinhdjj.com" error>
                        Địa chỉ email
                        <x-slot name="description">
                            {{ $message }}
                        </x-slot>
                    </x-inputs.base>
                    @else
                    <x-inputs.base name="email" placeholder="example@dinhdjj.com">
                        Địa chỉ email
                    </x-inputs.base>
                    @enderror

                    @error('password')
                    <x-inputs.base name="password" type="password" placeholder="*******" error>
                        Mật khẩu
                        <x-slot name="description">
                            {{ $message }}
                        </x-slot>
                    </x-inputs.base>
                    @else
                    <x-inputs.base name="password" type="password" placeholder="*******">
                        Mật khẩu
                    </x-inputs.base>
                    @enderror


                    <div class="flex items-center justify-between">
                        <x-checkboxes.base name="remember">
                            Nhớ mật khẩu?
                        </x-checkboxes.base>

                        <div class="text-sm">
                            <a href="{{ route('password.reset') }}"
                                class="font-medium text-indigo-600 hover:text-indigo-500">
                                Quyên mật khẩu?
                            </a>
                        </div>
                    </div>

                    @if (session('errorLogin'))
                    <x-messages.base.error>{{ session('errorLogin') }}</x-messages.base.error>
                    @endif

                    <x-buttons.base>
                        Đăng nhập
                    </x-buttons.base>
                </x-forms.base>
            </div>
        </div>

        {{-- Background --}}
        <div class="hidden lg:block relative w-0 flex-1">
            <img class="absolute inset-0 h-full w-full object-cover" src="{{ asset('images/app/bg-auth.jpg') }}" alt="">
        </div>
    </div>
</x-layouts.base>
