<?php

namespace App\View\Components\Frontend;

use App\Models\News;
use Illuminate\View\Component;

class BreakingNews extends Component
{
    public $news;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->news = News::ofType('External')->active()->approved()->breaking()->inTimeFrame()->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.frontend.breaking-news');
    }
}
