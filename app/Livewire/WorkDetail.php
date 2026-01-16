<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Work;

class WorkDetail extends Component
{
    public $work;

    public function mount($slug)
    {
        $this->work = Work::where('slug', $slug)->firstOrFail();
    }

    public function render()
    {
        return view('livewire.work-detail')
        ->layout('components.layout');
    }
}
