<?php

namespace App\View\Components\Posts;

use ArrayAccess;
use Illuminate\View\Component;

class Table extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        public string $class = '',
        public array $fields = ['title', 'created_at', 'actions'],
        public array|ArrayAccess $posts = [],
        public int $titleLength = 50,
    ) {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.posts.table');
    }
}
