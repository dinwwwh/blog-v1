<x-layouts.primary>
    <div class="relative bg-gray-50 pt-16 pb-20 px-4 sm:px-6 lg:pt-24 lg:pb-28 lg:px-8">
        <div class="absolute inset-0">
            <div class="bg-white h-1/3 sm:h-2/3"></div>
        </div>
        <div class="relative max-w-7xl mx-auto">
            <div class="text-center">
                <h2 class="text-3xl tracking-tight font-extrabold text-gray-900 sm:text-4xl">
                    Đọc my blog để trở thành supper hacker
                </h2>
                <p class="mt-3 max-w-2xl mx-auto text-xl text-gray-500 sm:mt-4">
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsa libero labore natus atque, ducimus
                    sed.
                </p>
            </div>
            <div class="mt-12 max-w-lg mx-auto grid gap-5 lg:grid-cols-3 lg:max-w-none">

                @foreach ($posts as $post)
                <div class="flex flex-col rounded-lg shadow-lg overflow-hidden">
                    <div class="flex-shrink-0">
                        <img class="h-48 w-full object-cover"
                            src="{{ Storage::urlSmartly($post->representative_image_path) }}" alt="">
                    </div>
                    <div class="flex-1 bg-white p-6 flex flex-col justify-between">
                        <div class="flex-1">
                            <p class="text-sm font-medium text-indigo-600">
                                <a href="#" class="hover:underline">
                                    {{ $post->tags->pluck('name')->join(', ') }}
                                </a>
                            </p>
                            <a href="{{ route('posts.show', compact('post')) }}" class="block mt-2">
                                <p class="text-xl font-semibold text-gray-900">
                                    {{ $post->title }}
                                </p>
                                <p class="mt-3 text-base text-gray-500">
                                    {{ $post->description }}
                                </p>
                            </a>
                        </div>
                        <div class="mt-6 flex items-center">
                            <div class="flex-shrink-0">
                                <a href="#">
                                    <span class="sr-only">{{ $post->creator->name }}</span>
                                    <img class="h-10 w-10 rounded-full"
                                        src="{{ Storage::urlSmartly($post->creator->avatar_path) }}" alt="avatar">
                                </a>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm font-medium text-gray-900">
                                    <a href="#" class="hover:underline">
                                        {{ $post->creator->name }}
                                    </a>
                                </p>
                                <div class="flex space-x-1 text-sm text-gray-500">
                                    <time datetime="2020-03-16">
                                        {{ $post->created_at->shortRelativeToNowDiffForHumans() }}
                                    </time>
                                    <span aria-hidden="true">
                                        &middot;
                                    </span>
                                    <span>
                                        {{ (int)(Str::length($post->content) / 900) + 1 }} phút đọc
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>


            <div class="pt-6">
                {{ $posts->links('paginations.centered-numbers') }}
            </div>
        </div>
    </div>
</x-layouts.primary>
