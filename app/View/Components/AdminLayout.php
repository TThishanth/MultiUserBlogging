<?php

namespace App\View\Components;

use App\Models\Blogs;
use App\Models\Category;
use App\Models\Contact;
use App\Models\DisplayMessage;
use App\Models\User;
use Illuminate\View\Component;

class AdminLayout extends Component
{
    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        $usersCount = User::all()->count();
        $blogsCount = Blogs::all()->count();
        $categoriesCount = Category::all()->count();
        $displayMsgCount = DisplayMessage::all()->count();
        $contactCount = Contact::all()->count();
        return view('layouts.admin', compact('usersCount', 'blogsCount', 'contactCount', 'categoriesCount', 'displayMsgCount'));
    }
}
