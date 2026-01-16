<?php

namespace App\Livewire\Admin\Services;

use Livewire\Component;
use App\Models\Service;
use App\Models\ServiceCategory;
use App\Models\Work;

class ServiceEdit extends Component
{
    public $service;

    // Service fields
    public $title;
    public $service_category_id;
    public $description;
    public $hero_video;
    public $status = true;

    // Assigned works
    public $selectedWorks = [];

    /**
     * Mount service data
     */
    public function mount($id)
    {
        $this->service = Service::findOrFail($id);

        // Prefill service fields
        $this->title               = $this->service->title;
        $this->service_category_id = $this->service->service_category_id;
        $this->description         = $this->service->description;
        $this->hero_video          = $this->service->hero_video;
        $this->status              = (bool) $this->service->status;

        // Prefill already assigned works
        $this->selectedWorks = $this->service
            ->works()
            ->pluck('works.id')
            ->toArray();
    }

    /**
     * Update service
     */
    public function update()
    {
        $this->validate([
            'title'               => 'required|string|max:255',
            'service_category_id' => 'required|exists:service_categories,id',
            'description'         => 'nullable|string',
            'hero_video'          => 'nullable|string',
        ]);

        // Update service data
        $this->service->update([
            'title'               => $this->title,
            'service_category_id' => $this->service_category_id,
            'description'         => $this->description,
            'hero_video'          => $this->hero_video,
            'status'              => $this->status ? 1 : 0,
        ]);

        // Sync works (pivot)
        $this->service->works()->sync($this->selectedWorks);

        session()->flash('success', 'Service updated successfully.');

        return redirect()->route('admin.services');
    }

    /**
     * Render view
     */
    public function render()
    {
        return view('livewire.admin.services.service-edit', [
            'categories' => ServiceCategory::orderBy('name')->get(),

            // ✅ POSITION BASED ORDER (DESIGN PERFECT)
            'works' => Work::orderBy('position')
                           ->orderBy('client_name')
                           ->get(),
        ])->layout('layouts.admin');
    }
}
