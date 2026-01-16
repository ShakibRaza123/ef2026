<?php

namespace App\Livewire\Admin\Projects;

use App\Models\ServiceCategory;
use App\Models\Work;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProjectCreate extends Component
{
    use WithFileUploads;

    // ================= FEATURE TOGGLE =================
    public bool $enableCategoryService = false; // 👈 future me true kar dena

    // ================= BASIC FIELDS =================
    public $title;
    public $client_name;
    public $description;

    // ================= ROTATING TEXT =================
    public $rotatingTextInput = '';
    public $rotating_text = [];

    // ================= HERO MEDIA =================
    public $hero_media_type = 'image'; // image | video
    public $hero_image;
    public $hero_media;

    // ================= META =================
    public $position = 0;
    public $status = true;

    // ================= SERVICE =================
    public $service_category_id;
    public $service_id;

    public $categories = [];
    public $services = [];

    // ================= LIFECYCLE =================
    public function mount()
    {
        $this->categories = ServiceCategory::orderBy('name')->get();
        $this->services = [];
    }

    public function updatedHeroMediaType()
    {
        $this->hero_image = null;
        $this->hero_media = null;
    }

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

    // ================= SAVE =================
    public function save()
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

        // ---------- HERO MEDIA ----------
        if ($this->hero_media_type === 'image') {
            $rules['hero_image'] = 'required|image|max:2048';
        } else {
            $rules['hero_media'] = 'required|string';
        }

        $this->validate($rules);

        // ================= IMAGE UPLOAD =================
        if ($this->hero_media_type === 'image' && $this->hero_image) {

            $filename = time() . '_' . Str::random(6) . '.' .
                $this->hero_image->getClientOriginalExtension();

            $destination = public_path('uploads/projects');

            if (!file_exists($destination)) {
                mkdir($destination, 0755, true);
            }

            file_put_contents(
                $destination . '/' . $filename,
                file_get_contents($this->hero_image->getRealPath())
            );

            $this->hero_media = 'uploads/projects/' . $filename;
        }

        // ================= CREATE PROJECT =================
        $data = [
            'title'           => $this->title,
            'client_name'     => $this->client_name,
            'description'     => $this->description,
            'rotating_text'   => $this->rotating_text,
            'hero_media_type' => $this->hero_media_type,
            'hero_media'      => $this->hero_media,
            'position'        => $this->position ?? 0,
            'slug'            => Str::slug($this->title),
            'status'          => $this->status,
        ];

        if ($this->enableCategoryService) {
            $data['service_id'] = $this->service_id;
        }

        Work::create($data);

        session()->flash('success', 'Project added successfully');

        return redirect()->route('admin.projects');
    }

    // ================= RENDER =================
    public function render()
    {
        return view('livewire.admin.projects.project-create')
            ->layout('layouts.admin');
    }
}
