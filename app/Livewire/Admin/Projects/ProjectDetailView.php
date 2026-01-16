<?php

namespace App\Livewire\Admin\Projects;

use Livewire\Component;
use App\Models\WorkDetail;

class ProjectDetailView extends Component
{
    public $details;

    public function mount()
    {
        $this->details = WorkDetail::with('work')
            ->latest()
            ->get();
    }

    public function render()
    {
        return view('livewire.admin.projects.project-detail-view')
            ->layout('layouts.admin');
    }
}
