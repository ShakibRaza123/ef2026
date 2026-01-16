<?php

namespace App\Livewire\Admin\Services;

use Livewire\Component;
use App\Models\Service;
use App\Models\ServiceCategory;
use App\Models\Work;
use Illuminate\Support\Str;

class ServiceCreate extends Component
{
    // ================= FORM FIELDS =================
    public $title;
    public $service_category_id;
    public $description;
    public $hero_video;
    public $status = true;

    // Assign works
    public $selectedWorks = [];

    // ================= VALIDATION =================
    protected function rules()
    {
        return [
            'title'               => 'required|string|max:255',
            'service_category_id' => 'required|exists:service_categories,id',
            'description'         => 'nullable|string',
            'hero_video'          => 'nullable|url',
            'status'              => 'boolean',
            'selectedWorks'       => 'array',
            'selectedWorks.*'     => 'exists:works,id',
        ];
    }

    // ================= SAVE =================
    public function save()
    {
        $this->validate();

        $service = Service::create([
            'title'               => $this->title,
            'slug'                => Str::slug($this->title),
            'service_category_id' => $this->service_category_id,
            'description'         => $this->description,
            'hero_video'          => $this->hero_video,
            'status'              => $this->status ? 1 : 0,
        ]);

        // ✅ Attach works (many-to-many)
        if (!empty($this->selectedWorks)) {
            $service->works()->sync($this->selectedWorks);
        }

        // ✅ Category slug for redirect
        $category = ServiceCategory::findOrFail($this->service_category_id);

        return redirect()
            ->route('admin.services.category.view', ['category' => $category->slug])
            ->with('success', 'Service created successfully');
    }

    // ================= RENDER =================
    public function render()
    {
        return view('livewire.admin.services.create', [
            'categories' => ServiceCategory::where('status', 1)->orderBy('name')->get(),
            'works'      => Work::orderBy('title')->get(),
        ])->layout('layouts.admin');
    }
}
