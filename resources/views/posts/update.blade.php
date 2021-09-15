<x-layouts.primary>
    <x-posts.layouts.own-management class="mt-12">
        <div class="space-y-12">

            <x-forms.base method="PUT" :action="route('posts.update', compact('post'))">
                <x-groups.separated>
                    <div class="space-y-4">
                        <x-inputs.base :value="old('title') ?? $post->title" :error="$errors->first('title')"
                            name="title" class="w-full md:w-4/5 xl:w-2/3">
                            Tiêu đề
                            <x-slot name="description">
                                @error ('title')
                                {{ $message }}
                                @enderror
                            </x-slot>
                        </x-inputs.base>

                        <x-textareas.base :value="old('description') ?? $post->description"
                            :error="$errors->first('description')" name="description" rows="3">
                            Mô tả
                            <x-slot name="description">
                                @error ('description')
                                {{ $message }}
                                @else
                                Có thể sử dụng một chút
                                <a href="https://stackedit.io/app" class="text-indigo-500 font-bold" target="_black">
                                    MarkDown
                                </a>.
                                @enderror
                            </x-slot>
                        </x-textareas.base>

                        <x-textareas.base :value="old('content') ?? $post->content" :error="$errors->first('content')"
                            name="content" rows="18">
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

                        <x-inputs.base :value="old('tag_names') ?? $post->tags->pluck('name')->join(', ')"
                            :error="$errors->first('tag_names')" name="tag_names" class="w-full md:w-4/5 xl:w-2/3"
                            placeholder="IT, công nghệ, lập trình">
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
                                @else
                                Nếu không có ảnh thì hệ thống sẽ giữ ảnh cũ
                                @enderror
                            </x-slot>
                        </x-files.inputs.base>
                    </div>

                    <x-slot name="footer">
                        <div class="flex items-center justify-end gap-3">
                            @if (session('errorUpdate'))
                            <x-messages.base.error>{{ session('errorUpdate') }}</x-messages.base.error>
                            @endif
                            @if (session('successUpdate'))
                            <x-messages.base.success>{{ session('successUpdate') }}</x-messages.base.success>
                            @endif
                            <x-buttons.base theme="green">Cập nhật</x-buttons.base>
                        </div>
                    </x-slot>
                </x-groups.separated>
            </x-forms.base>

        </div>
    </x-posts.layouts.own-management>
</x-layouts.primary>
