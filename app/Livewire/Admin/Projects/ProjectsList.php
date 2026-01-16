<?php

namespace App\Livewire\Admin\Projects;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Work;
use Illuminate\Support\Facades\Storage;

class ProjectsList extends Component
{
    use WithPagination;

    protected $paginationTheme = 'tailwind';

    public $deleteId = null;
    public $search = '';

    /**
     * Reset pagination when search changes
     */
    public function updatedSearch()
    {
        $this->resetPage();
    }

    /**
     * Open delete confirmation modal
     */
    public function confirmDelete($id)
    {
        $this->deleteId = $id;
    }

    /**
     * Delete project
     */
    public function deleteProject()
    {
        $project = Work::findOrFail($this->deleteId);

        // Delete hero image if exists
        if ($project->hero_media_type === 'image' && $project->hero_media) {
            Storage::disk('public')->delete($project->hero_media);
        }

        $project->delete();

        // Reset states
        $this->deleteId = null;
        $this->resetPage();

        session()->flash('success', 'Project deleted successfully');
    }

    /**
     * Render projects list
     */
    public function render()
    {
        $projects = Work::where(function ($q) {
                $q->where('title', 'like', '%' . $this->search . '%')
                  ->orWhere('client_name', 'like', '%' . $this->search . '%');
            })
            ->orderBy('position')
            ->paginate(10);

        return view('livewire.admin.projects.projects-list', [
            'projects' => $projects,
        ])->layout('layouts.admin');
    }
}
