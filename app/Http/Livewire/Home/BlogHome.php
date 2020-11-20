<?php

namespace App\Http\Livewire\Home;

use App\Models\Blogs;
use App\Models\Category;
use App\Models\DisplayMessage;
use Livewire\Component;
use Livewire\WithPagination;

class BlogHome extends Component
{
    public $searchTerm;

    use WithPagination; 
    public function render()
    {
        $searchTerm = '%'.$this->searchTerm.'%';
        $blogs = Blogs::where('title', 'LIKE', $searchTerm)
                        ->orWhere('owner_name', 'LIKE', $searchTerm)
                        ->orWhere('category', 'LIKE', $searchTerm)
                        ->orWhere('body', 'LIKE', $searchTerm)
                        ->orderBy('created_at', 'desc')->paginate(10);
        $categories = Category::all();
        $messages = DisplayMessage::all();
        return view('livewire.home.blog-home', compact('blogs', 'categories', 'messages'))->layout('layouts.base');
    }
}
