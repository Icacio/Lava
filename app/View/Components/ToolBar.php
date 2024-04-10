<?php

namespace App\View\Components;

use Closure;
use App\Models\Post;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ToolBar extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.tool-bar');
    }


	public function postId() {
		return substr(request()->path(),5);
	}

	public function propietario() {
		if (request()->is('post/*')) {
			$a = Post::find(ToolBar::postId());
			if ($a->user_id==auth()->user()->id) {
				return true;}
		}
		return false;
	}
}
