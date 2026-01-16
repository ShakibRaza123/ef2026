<?php

namespace App\Livewire\Admin\Projects;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Work;
use App\Models\ServiceCategory;
use Illuminate\Support\Str;

class ProjectEdit extends Component
{
    use WithFileUploads;

    // ================= FEATURE TOGGLE =================
    public bool $enableCategoryService = false; // 👈 future me true kar dena

    // ================= PROJECT =================
    public Work $project;

    // ================= FORM FIELDS =================
    public $title;
    public $client_name;
    public $description;
    public $rotating_text = [];
    public $rotatingTextInput = '';

    public $hero_media_type = 'image';
    public $hero_media;
    public $hero_image;

    public $position = 0;
    public $status = true;

    // ================= SERVICES =================
    public $service_category_id;
    public $service_id;

    public $categories = [];
    public $services = [];

    // ================= MOUNT =================
    public function mount($id)
    {
        $this->project = Work::findOrFail($id);

        // Load categories (future ready)
        $this->categories = ServiceCategory::orderBy('name')->get();

        // Prefill only if feature enabled
        if ($this->enableCategoryService) {
            $this->service_id = $this->project->service_id;
            $this->service_category_id =
                optional($this->project->service)->service_category_id;

            if ($this->service_category_id) {
                $this->services =
                    ServiceCategory::find($this->service_category_id)?->services ?? [];
            }
        }

        // Other fields
        $this->title         = $this->project->title;
        $this->client_name   = $this->project->client_name;
        $this->description  = $this->project->description;
        $this->rotating_text = $this->project->rotating_text ?? [];

        $this->hero_media_type = $this->project->hero_media_type;
        $this->hero_media      = $this->project->hero_media;

        $this->position = $this->project->position;
        $this->status   = $this->project->status;
    }

    // ================= CATEGORY CHANGE =================
    public function updatedServiceCategoryId($categoryId)
    {
        if (! $this->enableCategoryService) {
            return;
        }

        $this->service_id = null;

        $this->services = $categoryId
            ? ServiceCategory::find($categoryId)?->services ?? []
            : [];
    }

    // ================= ROTATING TEXT =================
    public function addRotatingText()
    {
        $value = trim($this->rotatingTextInput);

        if ($value !== '' && !in_array($value, $this->rotating_text)) {
            $this->rotating_text[] = $value;
        }

        $this->rotatingTextInput = '';
    }

    public function removeRotatingText($index)
    {
        unset($this->rotating_text[$index]);
        $this->rotating_text = array_values($this->rotating_text);
    }

    // ================= UPDATE =================
    public function update()
    {
        // ---------- BASE RULES ----------
        $rules = [
            'title'           => 'required|string|max:255',
            'client_name'     => 'required|string|max:255',
            'rotating_text'   => 'required|array|min:1',
            'hero_media_type' => 'required|in:image,video',
        ];

        // ---------- CONDITIONAL SERVICE ----------
        if ($this->enableCategoryService) {
            $rules['service_id'] = 'required';
        }

        // ---------- HERO IMAGE ----------
        if ($this->hero_media_type === 'image' && $this->hero_image) {
            $rules['hero_image'] = 'image|max:2048';
        }

        $this->validate($rules);

        // ================= IMAGE REPLACE =================
        if ($this->hero_media_type === 'image' && $this->hero_image) {

            $filename = time() . '_' . Str::random(6) . '.' .
                $this->hero_image->getClientOriginalExtension();

            $path = public_path('uploads/projects');

            if (!file_exists($path)) {
                mkdir($path, 0755, true);
            }

            file_put_contents(
                $path . '/' . $filename,
                file_get_contents($this->hero_image->getRealPath())
            );

            // delete old image
            if ($this->project->hero_media &&
                file_exists(public_path($this->project->hero_media))) {
                unlink(public_path($this->project->hero_media));
            }

            $this->hero_media = 'uploads/projects/' . $filename;
        }

        // ================= UPDATE DB =================
        $data = [
            'title'           => $this->title,
            'client_name'     => $this->client_name,
            'description'     => $this->description,
            'rotating_text'   => $this->rotating_text,
            'hero_media_type' => $this->hero_media_type,
            'hero_media'      => $this->hero_media,
            'position'        => $this->position ?? 0,
            'status'          => $this->status,
        ];

        if ($this->enableCategoryService) {
            $data['service_id'] = $this->service_id;
        }

        $this->project->update($data);

        session()->flash('success', 'Project updated successfully');

        return redirect()->route('admin.projects');
    }

    // ================= RENDER =================
    public function render()
    {
        return view('livewire.admin.projects.project-edit')
            ->layout('layouts.admin');
    }
}
