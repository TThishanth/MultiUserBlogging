<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Users extends Component
{
    public $searchTerm;

    public function MakeAdmin($id)
    {
        if ($id) {
            $user = User::where('id', $id);
            $user->update([
                'utype' => 'ADM'
            ]);
        }
    }

    public function MakeUser($id)
    {
        if ($id) {
            $user = User::where('id', $id);
            $user->update([
                'utype' => 'USR'
            ]);
        }
    }

    public function destroy($id) {
        if ($id) {
            $user = User::where('id', $id);
            $user->delete();

            session()->flash('message', 'User successfully deleted.');
        }
    }

    use WithPagination;
    public function render()
    {
        $searchTerm = '%'.$this->searchTerm.'%';
        $users = User::where('name', 'LIKE', $searchTerm)
                        ->orWhere('id', 'LIKE', $searchTerm)
                        ->orWhere('email', 'Like', $searchTerm)
                        ->paginate(10);
        return view('livewire.admin.users', compact('users'));
    }
}
