<?php

namespace App\Livewire\Admin\Services;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Service;

class CategoryView extends Component
{
    use WithPagination;

    protected $paginationTheme = 'tailwind';

    public string $search = '';

    // 🔁 VERY IMPORTANT
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.admin.services.category-view', [
            'services' => Service::with('category')
                ->where(function ($q) {
                    $q->where('title', 'like', '%' . $this->search . '%')
                      ->orWhere('description', 'like', '%' . $this->search . '%')
                      ->orWhereHas('category', function ($cat) {
                          $cat->where('name', 'like', '%' . $this->search . '%');
                      });
                })
                ->orderBy('id', 'desc') // new first
                ->paginate(5),
        ])->layout('layouts.admin');
    }
}
