<?php

namespace App\View\Composers;

use App\Models\College;
use Illuminate\View\View;

class CollegeComposer
{
    /**
     * Bind data to the view.
     *
     * @param  \Illuminate\View\View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $college = College::find(1);
        $view->with('college', $college);
    }
}
