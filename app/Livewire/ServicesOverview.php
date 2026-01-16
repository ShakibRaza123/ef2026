<?php

namespace App\Livewire;

use Livewire\Component;

class ServicesOverview extends Component
{
    public $activeTab = 'strategy';

    public function setTab($tab)
    {
        $this->activeTab = $tab;
    }

    public function render()
    {
        return view('livewire.services.index')
            ->layout('components.layout');
    }
}

