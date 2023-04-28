<?php

namespace App\Http\Livewire\Users;

use App\Models\User;
use Livewire\Component;

class Users extends Component
{
    protected $users;

    public function mount()
    {

    }

    public function render()
    {
        $users = User::all()->where('name', '!=','Admin');
        return view('livewire.users.users', ['users'=>$users]);
    }
}
