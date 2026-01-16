<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkDetail extends Model
{
    protected $fillable = [
        'work_id',
        'inner_hero_type',
        'inner_hero_media',
        'intro_heading',
        'intro_description',
        'services',
    ];

    protected $casts = [
        'services' => 'array',
    ];

    // ✅ THIS IS THE FIX
    public function work()
    {
        return $this->belongsTo(Work::class, 'work_id');
    }
}
