<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use App\Model\Category;

class GlobalComposer
{
	
	public function compose(View $view)
	{
		$view->with('cats',Category::all());
	}
}