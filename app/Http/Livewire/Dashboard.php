<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Dashboard extends Component
{

    public $count = 0;

    public function increment() {
        $this->count =  $this->count + 1;
    }

    public function render()
    {
        return view('livewire.dashboard');
    }
}
