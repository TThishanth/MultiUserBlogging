<?php

namespace App\Http\Livewire\Home;

use App\Models\Contact as ModelsContact;
use Livewire\Component;

class Contact extends Component
{
    public $title;
    public $email;
    public $subject;
    public $message;

    protected $rules = [
        'title' => 'required',
        'email' => 'required|email',
        'subject' => 'required',
        'message' => 'required|max:300',
    ];

    public function resetInputFields()
    {
        $this->title = '';
        $this->email = '';
        $this->subject = '';
        $this->message = '';
    }

    public function store($user_id, $user_name) {
        $this->validate();

        ModelsContact::create([
            'user_id' => $user_id,
            'user_name' => $user_name,
            'title' => $this->title,
            'email' => $this->email,
            'subject' => $this->subject,
            'message' => $this->message
        ]);

        session()->flash('message', 'Contact form successfully submitted.');

        $this->resetInputFields();

        return redirect()->to('/');
    }

    public function render()
    {
        return view('livewire.home.contact')->layout('layouts.base');
    }
}
