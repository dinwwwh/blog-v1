<x-layouts.primary>
    <x-posts.layouts.own-management>
        <div class="space-y-12">

            <x-forms.base method="POST" :action="route('posts.create')">
                <x-groups.separated>
                    <div class="space-y-4">
                        <x-inputs.base :value="old('title')" :error="$errors->first('title')" name="title"
                            class="w-full md:w-4/5 xl:w-2/3">
                            Tiêu đề
                            <x-slot name="description">
                                @error ('title')
                                {{ $message }}
                                @enderror
                            </x-slot>
                        </x-inputs.base>

                        <x-textareas.base :value="old('content')" :error="$errors->first('content')" name="content"
                            rows="18">
                            Nội dung
                            <x-slot name="description">
                                @error ('content')
                                {{ $message }}
                                @else
                                Kết hợp với trình soạn thảo
                                <a href="https://stackedit.io/app" class="text-indigo-500 font-bold" target="_black">
                                    MarkDown
                                </a>
                                để đạt được hiểu quả cao hơn.
                                @enderror
                            </x-slot>
                        </x-textareas.base>

                        <x-inputs.base :value="old('tag_names')" :error="$errors->first('tag_names')" name="tag_names"
                            class="w-full md:w-4/5 xl:w-2/3" placeholder="IT, công nghệ, lập trình">
                            Tags
                            <x-slot name="description">
                                Mỗi tag phân cách với nhau bởi dấu phẩy ","
                            </x-slot>
                        </x-inputs.base>

                        <x-files.inputs.base :error="$errors->first('representative_image')" name="representative_image"
                            accept="image/*" class="w-full md:w-4/5 xl:w-2/3" placeholder="IT, công nghệ, lập trình">
                            Ảnh đại diện
                            <x-slot name="description">
                                @error ('representative_image')
                                {{ $message }}
                                @enderror
                            </x-slot>
                        </x-files.inputs.base>
                    </div>

                    <x-slot name="footer">
                        <div class="flex items-center justify-end gap-3">
                            @if (session('errorCreate'))
                            <x-messages.base.error>{{ session('errorCreate') }}</x-messages.base.error>
                            @endif
                            <x-buttons.base theme="green">Đăng Bài</x-buttons.base>
                        </div>
                    </x-slot>
                </x-groups.separated>
            </x-forms.base>

        </div>
    </x-posts.layouts.own-management>
</x-layouts.primary>
