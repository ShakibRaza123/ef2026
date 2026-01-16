<?php

namespace App\Livewire\Admin\Services;

use Livewire\Component;
use App\Models\ServiceCategory;

class ServicesList extends Component
{
    public function render()
    {
        return view('livewire.admin.services.list', [
            'categories' => ServiceCategory::orderBy('position')->get()
        ])->layout('layouts.admin'); // ✅ IMPORTANT
    }
}
