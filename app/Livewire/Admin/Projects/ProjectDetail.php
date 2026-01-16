<?php

namespace App\Livewire\Admin\Projects;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Work;
use App\Models\WorkDetail;

class ProjectDetail extends Component
{
    use WithFileUploads;

    public $projects;
    public $project_id;
    public $project;

    public $category;
    public $service;

    public $inner_hero_type = 'image';
    public $inner_hero_media;
    public $hero_upload;

    public $intro_heading;
    public $intro_description;

    public $serviceInput = '';
    public $services = [];

    public function mount()
    {
        // Dropdown ke liye
        $this->projects = Work::with('service.category')
            ->orderBy('title')
            ->get();
    }


    public function updatedInnerHeroType()
{
    $this->hero_upload = null;
    $this->inner_hero_media = null;
}


    /**
     * 🔥 YE SABSE IMPORTANT PART HAI
     * Project select hote hi form load karega
     */
    public function updatedProjectId($id)
    {
        $this->project = Work::with('service.category', 'detail')
            ->find($id);

        if (!$this->project) {
            return;
        }

        // Context (locked info)
        $this->category = $this->project->service?->category?->name ?? '-';
        $this->service  = $this->project->service?->title ?? '-';

        // Existing detail data (edit mode)
        if ($this->project->detail) {
            $detail = $this->project->detail;

            $this->inner_hero_type   = $detail->inner_hero_type;
            $this->inner_hero_media  = $detail->inner_hero_media;
            $this->intro_heading     = $detail->intro_heading;
            $this->intro_description = $detail->intro_description;
            $this->services          = $detail->services ?? [];
        } else {
            // fresh state
            $this->inner_hero_type = 'image';
            $this->inner_hero_media = null;
            $this->intro_heading = null;
            $this->intro_description = null;
            $this->services = [];
        }
    }

    public function addService()
    {
        $value = trim($this->serviceInput);

        if ($value && !in_array($value, $this->services)) {
            $this->services[] = $value;
        }

        $this->serviceInput = '';
    }

    public function removeService($index)
    {
        unset($this->services[$index]);
        $this->services = array_values($this->services);
    }

public function save()
{
    if (!$this->project) {
        return;
    }

    if ($this->inner_hero_type === 'image' && $this->hero_upload) {
        $this->inner_hero_media =
            $this->hero_upload->store('works/inner', 'public');
    }

    WorkDetail::updateOrCreate(
        ['work_id' => $this->project->id],
        [
            'inner_hero_type'   => $this->inner_hero_type,
            'inner_hero_media'  => $this->inner_hero_media,
            'intro_heading'     => $this->intro_heading,
            'intro_description' => $this->intro_description,
            'services'          => $this->services,
        ]
    );

    // ✅ YAHI FIX HAI
    return redirect()
        ->route('admin.projects.details.view', $this->project->id)
        ->with('success', 'Project details saved successfully');
}

    public function render()
    {
        return view('livewire.admin.projects.project-detail')
            ->layout('layouts.admin');
    }
}