<?php

namespace App\Http\Livewire\Admin;

use App\Models\DisplayMessage;
use Livewire\Component;

class DisplayMsg extends Component
{
    public $message;

    protected $rules = [
        'message' => 'required|max:200',
    ];

    public function resetInputFields() {
        $this->message = '';
    }

    public function store() {
        $this->validate();

        DisplayMessage::create([
            'body' => $this->message,
        ]);

        session()->flash('message', 'Display message successfully created.');

        $this->resetInputFields();
    }

    public function destroy($id) {
        if ($id) {
            $message = DisplayMessage::where('id', $id);
            $message->delete();

            session()->flash('message', 'Message successfully deleted.');
        }
    }

    public function render()
    {
        $messages = DisplayMessage::all();
        return view('livewire.admin.display-msg', compact('messages'));
    }
}
