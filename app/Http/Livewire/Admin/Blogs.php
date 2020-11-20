<?php

namespace App\Http\Livewire\Admin;

use App\Models\Blogs as ModelsBlogs;
use Livewire\Component;
use Livewire\WithPagination;

class Blogs extends Component
{
    public $searchTerm;

    public function destroy($id) {
        if ($id) {
            $blog = ModelsBlogs::where('id', $id);
            $blog->delete();

            session()->flash('message', 'Blog successfully deleted.');
        }
    }

    use WithPagination;
    public function render()
    {
        $searchTerm = '%'.$this->searchTerm.'%';
        $blogs = ModelsBlogs::where('id', 'LIKE', $searchTerm)
                                ->orWhere('title', 'LIKE', $searchTerm)
                                ->orWhere('introduction', 'LIKE', $searchTerm)
                                ->orWhere('body', 'LIKE', $searchTerm)
                                ->orWhere('category', 'LIKE', $searchTerm)
                                ->paginate(10);
        return view('livewire.admin.blogs', compact('blogs'));
    }
}
