<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // ✅ MISSING IMPORT
use Illuminate\Database\Eloquent\Model;

class ServiceCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'slug',
        'position',
        'status',
    ];

    public function services()
    {
        return $this->hasMany(Service::class)
            ->where('status', 1)
            ->orderBy('position');
    }
}
