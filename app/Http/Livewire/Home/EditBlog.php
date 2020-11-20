<?php

namespace App\Http\Livewire\Home;

use Livewire\WithFileUploads;
use App\Models\Blogs;
use App\Models\Category;
use Livewire\Component;

class EditBlog extends Component
{
    use WithFileUploads;

    public $ids;
    public $title;
    public $introduction;
    public $body;
    public $file;
    public $categoryName;

    protected $rules = [
        'title' => 'required',
        'introduction' => 'required|max:500',
        'body' => 'required|max:3000',
        'categoryName' => 'required',
    ];

    public function resetInputFields()
    {
        $this->title = '';
        $this->introduction = '';
        $this->body = '';
        $this->file = '';
        $this->categoryName = '';
    }

    public function mount($id) {
        $blog = Blogs::find($id);
        $this->ids = $blog->id;
        $this->title = $blog->title;
        $this->introduction = $blog->introduction;
        $this->body = $blog->body;
        $this->categoryName = $blog->category;
    }

    public function update() {
        $this->validate();

        if ($this->file) {
            $name = md5($this->file . microtime()).'.'.$this->file->extension();
            $this->file->storeAs('images', $name, 'public');
        }

        if ($this->ids) {
            $blog = Blogs::find($this->ids);
            $blog->update([
                'title' => $this->title,
                'introduction' => $this->introduction,
                'body' => $this->body,
                'filename' => $name ?? null,
                'category' => $this->categoryName,
            ]);

            session()->flash('message', 'Blog successfully updated.');

            $this->resetInputFields();

            return redirect()->to('/');
        }

    }

    public function render()
    {
        $categories = Category::all();
        return view('livewire.home.edit-blog', compact('categories'))->layout('layouts.base');
    }
}
