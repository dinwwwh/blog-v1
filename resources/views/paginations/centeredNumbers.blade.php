<nav class="border-t border-gray-200 px-4 flex items-center justify-between sm:px-0">
    @if ($paginator->hasPages())

    @if ($paginator->onFirstPage())
    <div class="flex-1">
    </div>
    @else
    <div class="-mt-px w-0 flex-1 flex">
        <a href="{{ $paginator->previousPageUrl() }}"
            class="border-t-2 border-transparent pt-4 pr-1 inline-flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300">
            <!-- Heroicon name: solid/arrow-narrow-left -->
            <svg class="mr-3 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd"
                    d="M7.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l2.293 2.293a1 1 0 010 1.414z"
                    clip-rule="evenodd" />
            </svg>
            Previous
        </a>
    </div>
    @endif


    <div class="hidden md:-mt-px md:flex">
        @foreach ($elements as $element)

        @if (is_string($element))
        <span
            class="border-transparent text-gray-500 border-t-2 pt-4 px-4 inline-flex items-center text-sm font-medium">
            ...
        </span>
        @endif



        @if (is_array($element))
        @foreach ($element as $page => $url)
        @if ($page == $paginator->currentPage())
        <a href="#"
            class="border-indigo-500 text-indigo-600 border-t-2 pt-4 px-4 inline-flex items-center text-sm font-medium"
            aria-current="page">
            {{ $page }}
        </a>
        @else
        <a href="{{ $url }}"
            class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 border-t-2 pt-4 px-4 inline-flex items-center text-sm font-medium">
            {{ $page }}
        </a>
        @endif
        @endforeach
        @endif
        @endforeach
    </div>



    @if ($paginator->hasMorePages())
    <div class="-mt-px w-0 flex-1 flex justify-end">
        <a href="{{ $paginator->nextPageUrl() }}"
            class="border-t-2 border-transparent pt-4 pl-1 inline-flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300">
            Next
            <!-- Heroicon name: solid/arrow-narrow-right -->
            <svg class="ml-3 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd"
                    d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z"
                    clip-rule="evenodd" />
            </svg>
        </a>
    </div>
    @else
    <div class="flex-1"></div>
    @endif
    @endif
</nav>
