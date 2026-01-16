<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Service extends Model
{
    protected $fillable = [
        'service_category_id',
        'title',
        'hero_video',
        'slug',
        'description',
        'position',
        'status',
    ];

    // ================= CASTS =================
    protected $casts = [
        'status'   => 'boolean',
        'position' => 'integer',
    ];

    // ================= RELATIONS =================
    public function category()
    {
        return $this->belongsTo(ServiceCategory::class, 'service_category_id');
    }

    public function works()
    {
        return $this->belongsToMany(Work::class, 'service_work')
            ->withPivot('position')
            ->orderBy('service_work.position');
    }

    // ================= ROUTE MODEL BINDING =================
    public function getRouteKeyName()
    {
        return 'slug';
    }

    // ================= SCOPES =================
    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    // ================= BOOT =================
    protected static function booted()
    {
        static::saving(function ($service) {
            if ($service->isDirty('title')) {
                $service->slug = Str::slug($service->title);
            }
        });
    }

    // ================= ACCESSORS =================
    public function getHeroVideoAttribute($value)
    {
        if (! $value) {
            return null;
        }

        // External URL
        if (Str::startsWith($value, ['http://', 'https://'])) {
            return $value;
        }

        // Stored path
        return asset($value);
    }
}
