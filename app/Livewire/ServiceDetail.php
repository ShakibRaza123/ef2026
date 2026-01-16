<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Service;

class ServiceDetail extends Component
{
    public $slug;
    public $service;

    // ✅ ONLY mount() receives route param
    public function mount($slug)
    {
        $this->slug = $slug;

        $this->service = Service::where('slug', $slug)->firstOrFail();
    }

    public function render()
    {
        return view('livewire.services.detail')
            ->layout('components.layout');
    }
}
