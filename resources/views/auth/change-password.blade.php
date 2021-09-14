<x-layouts.primary>
    <x-auth.layout class="mt-12">

        <x-groups.base>
            <x-forms.base action="{{ route('password.change') }}" method="PATCH">
                <div class="space-y-4">
                    <x-inputs.base :error="$errors->first('old_password')" name="old_password"
                        class="w-full sm:w-4/5 lg:w-2/3" type="password">
                        Mật khẩu cũ
                        <x-slot name="description">{{ $errors->first('old_password') }}</x-slot>
                    </x-inputs.base>
                    <x-inputs.base :error="$errors->first('password')" name="password" class="w-full sm:w-4/5 lg:w-2/3"
                        type="password">
                        Mật khẩu mới
                        <x-slot name="description">{{ $errors->first('password') }}</x-slot>
                    </x-inputs.base>
                    <x-inputs.base :error="$errors->first('password_confirmation')" name="password_confirmation"
                        class="w-full sm:w-4/5 lg:w-2/3" type="password">
                        Xác nhận mật khẩu mới
                        <x-slot name="description">{{ $errors->first('password_confirmation') }}</x-slot>
                    </x-inputs.base>
                </div>

                <div class="flex justify-end gap-3 items-center">
                    @if(session('errorChangePassword'))
                    <x-messages.base.error>
                        {{ session('errorChangePassword') }}
                    </x-messages.base.error>
                    @endif
                    @if(session('successChangePassword'))
                    <x-messages.base.success>
                        {{ session('successChangePassword') }}
                    </x-messages.base.success>
                    @endif
                    <x-buttons.base>
                        Đổi mật khẩu
                    </x-buttons.base>
                </div>
            </x-forms.base>
        </x-groups.base>

    </x-auth.layout>
</x-layouts.primary>
