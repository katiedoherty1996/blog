<?php

namespace App\View\Components;

use App\Models\Category;

use Illuminate\View\Component;
use Illuminate\Support\Facades\Request;

class CategoryDropDown extends Component
{
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        $categorySlug = Request::get('category');
        if(isset($categorySlug)){
            $category = Category::where('slug', $categorySlug)->firstOrFail();
        } else {
            $category = null;
        }

        return view('components.category-drop-down', [
            'categories' => Category::all(),
            'currentCategory' => $category
        ]);
    }
}
