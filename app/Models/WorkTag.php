<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkTag extends Model
{
    protected $fillable = ['work_id', 'label'];

    public function work()
    {
        return $this->belongsTo(Work::class);
    }
}
