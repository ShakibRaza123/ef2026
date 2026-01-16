<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    protected $fillable = [
        'service_id',
        'title',
        'client_name',
        'rotating_text',
        'hero_media_type',
        'hero_media',
        'position',
        'slug',
        'status',
    ];

    protected $casts = [
        'rotating_text' => 'array',
    ];

    // ✅ ADD THIS
    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    // ✅ Inside page
    public function detail()
{
    return $this->hasOne(\App\Models\WorkDetail::class, 'work_id');
}


    // ✅ ADD THIS
    public function tags()
    {
        return $this->hasMany(WorkTag::class, 'work_id');
    }
}
