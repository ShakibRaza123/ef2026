<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Work;

class Home extends Component
{
    public function render()
    {
        $works = Work::where('status', 1)
            ->orderBy('position')
            ->get();

        return view('livewire.home', compact('works'))
            ->layout('components.layout');
    }
}
