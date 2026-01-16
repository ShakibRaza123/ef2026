<?php

namespace App\Livewire\Admin\Services;

use Livewire\Component;
use App\Models\ServiceCategory;
use Illuminate\Support\Str;

class ServiceCategories extends Component
{
    public $name;
    public $description; // ✅ NEW

    protected $rules = [
        'name' => 'required|min:3',
        'description' => 'nullable|string|max:500', // ✅ NEW
    ];

    public function save()
    {
        $this->validate();

        ServiceCategory::create([
            'name'        => $this->name,
            'slug'        => Str::slug($this->name),
            'description' => $this->description, // ✅ SAVE DESCRIPTION
            'position'    => (ServiceCategory::max('position') ?? 0) + 1,
            'status'      => 1,
        ]);

        session()->flash('success', 'Category added successfully.');

        // ✅ Reset fields
        $this->reset(['name', 'description']);

        // Final landing page
        return redirect()->route('admin.services');
    }

    public function delete($id)
    {
        ServiceCategory::findOrFail($id)->delete();

        session()->flash('success', 'Category deleted successfully.');

        return redirect()->route('admin.services');
    }

    public function render()
    {
        return view('livewire.admin.services.categories', [
            'categories' => ServiceCategory::orderBy('position')->get()
        ])->layout('layouts.admin');
    }
}
