<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;

class UserList extends Component
{
    public function render()
    {
        $users = User::where('user_type', request()->type)->paginate(10);
        return view('livewire.user-list', compact('users'));
    }
}