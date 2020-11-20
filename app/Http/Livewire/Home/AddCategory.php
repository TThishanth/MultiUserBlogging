<?php

namespace App\Http\Livewire\Home;

use App\Models\Category;
use App\Models\DisplayMessage;
use Livewire\Component;

class AddCategory extends Component
{
    public $name;

    protected $rules = [
        'name' => 'required',
    ];

    public function resetInputFields()
    {
        $this->name = '';
    }

    public function store()
    {
        $this->validate();

        Category::create([
            'name' => $this->name,
        ]);

        session()->flash('message', 'Blog category successfully created.');

        $this->resetInputFields();

        return redirect()->to('/');
    }

    public function render()
    {
        $categories = Category::all();
        $messages = DisplayMessage::all();
        return view('livewire.home.add-category', compact('categories', 'messages'))->layout('layouts.base');
    }
}
