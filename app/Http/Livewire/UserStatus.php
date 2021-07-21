<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;

class UserStatus extends Component
{
    public $user;

    public function mount($user)
    {
        $this->user = $user;
    }
    
    public function render()
    {
        return view('livewire.user-status');
    }

    public function toggleActive()
    {
        $this->user->update([
            'active' => !$this->user->active,
        ]);
    }

    public function toggleVerify()
    {
        $this->user->modele->update([
            'verified' => !$this->user->modele->verified,
        ]);
    }
}