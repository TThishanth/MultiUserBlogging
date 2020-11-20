<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use Livewire\Component;

class Categories extends Component
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
    }

    public function destroy($id)
    {
        if ($id) {
            $category = Category::where('id', $id);
            $category->delete();

            session()->flash('message', 'Category successfully deleted.');
        }
    }

    public function render()
    {
        $categories = Category::all();
        return view('livewire.admin.categories', compact('categories'));
    }
}
