<?php

namespace App\Observers;

use App\Models\Category;
use App\Services\PlatformFacade;
use Illuminate\Support\Facades\Auth;

class CategoryObserver
{
    public function creating(Category $category)
    {
        $category->created_by = Auth::user()->id;
        $category->platform_id = PlatformFacade::model()->id;
    }
}
