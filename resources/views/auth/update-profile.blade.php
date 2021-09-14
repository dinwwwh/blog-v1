<x-layouts.primary>
    <x-auth.layout class="mt-12">

        <x-groups.base>
            <x-forms.base :action="route('profile.update')" method="PATCH">
                <div class="space-y-4">
                    <x-inputs.base :value="old('name') ?? auth()->user()->name" :error="$errors->first('name')"
                        name="name" class="w-full sm:w-4/5 lg:w-2/3">
                        Tên
                        <x-slot name="description">{{ $errors->first('name') }}</x-slot>
                    </x-inputs.base>

                    <x-files.inputs.base :error="$errors->first('avatar')" name="avatar"
                        class="w-full sm:w-4/5 lg:w-2/3">
                        Ảnh đại diện
                        <x-slot name="description">{{ $errors->first('avatar') }}</x-slot>
                    </x-files.inputs.base>
                </div>

                <div class="flex justify-end gap-3 items-center">
                    @if(session('errorUpdateProfile'))
                    <x-messages.base.error>
                        {{ session('errorUpdateProfile') }}
                    </x-messages.base.error>
                    @endif
                    @if(session('successUpdateProfile'))
                    <x-messages.base.success>
                        {{ session('successUpdateProfile') }}
                    </x-messages.base.success>
                    @endif
                    <x-buttons.base>
                        Cập nhật
                    </x-buttons.base>
                </div>
            </x-forms.base>
        </x-groups.base>

    </x-auth.layout>
</x-layouts.primary>
