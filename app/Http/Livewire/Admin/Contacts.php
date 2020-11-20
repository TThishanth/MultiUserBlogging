<?php

namespace App\Http\Livewire\Admin;

use App\Models\Contact;
use Livewire\Component;

class Contacts extends Component
{
    public function destroy($contact_id) {
        if ($contact_id) {
            $contact = Contact::where('id', $contact_id);
            $contact->delete();

            session()->flash('message', 'Contact message successfully deleted.');
        }
    }

    public function render()
    {
        $contacts = Contact::all();
        return view('livewire.admin.contacts', compact('contacts'));
    }
}
