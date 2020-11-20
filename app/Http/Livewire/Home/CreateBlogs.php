<?php

namespace App\Http\Livewire\Home;

use Livewire\WithFileUploads;
use App\Models\Blogs;
use App\Models\Category;
use Livewire\Component;

class CreateBlogs extends Component
{
    use WithFileUploads;

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

    public function store($owner_id, $owner_name)
    {
        $this->validate();

        if ($this->file) {
            $name = md5($this->file . microtime()).'.'.$this->file->extension();
            $this->file->storeAs('images', $name, 'public');
        }

        Blogs::create([
            'owner_id' => $owner_id,
            'owner_name' => $owner_name,
            'title' => $this->title,
            'introduction' => $this->introduction,
            'body' => $this->body,
            'filename' => $name ?? null,
            'category' => $this->categoryName,
        ]);

        session()->flash('message', 'Blog successfully created.');

        $this->resetInputFields();

        return redirect()->to('/');
    }

    public function render()
    {
        $categories = Category::all();
        return view('livewire.home.create-blogs', compact('categories'))->layout('layouts.base');
    }
}
