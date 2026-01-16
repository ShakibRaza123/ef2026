<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Work as WorkModel;

class Work extends Component
{
    public $activeFilter = 'recommended';

    public function setFilter($filter)
    {
        if (in_array($filter, ['recommended', 'latest'])) {
            $this->activeFilter = $filter;
        }
    }

    // Recommended → editorial order (position based)
    public function getRecommendedProperty()
    {
        return WorkModel::where('status', 1)
            ->orderBy('position')
            ->get();
    }

    // Latest → newest work
   // Latest → newest works (collection)
public function getLatestProperty()
{
    return WorkModel::where('status', 1)
        ->orderByDesc('created_at')
        ->take(2)   // As per need want latest 2 works
        ->get();
}


    public function render()
    {
        return view('livewire.work', [
            'recommended' => $this->recommended,
            'latest'      => $this->latest,
            'activeFilter'=> $this->activeFilter,
        ])->layout('components.layout');
    }
}