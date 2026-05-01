<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Job extends Model
{
    protected $table = 'job_posts';
    protected $fillable = [
        'user_id',
        'title',
        'type',
        'location',
        'salary',
        'description',
        'requirements',
        'status',
    ];

    public function postedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function scopeOpen($query)
    {
        return $query->where('status', 'open');
    }

    public function scopeClosed($query)
    {
        return $query->where('status', 'closed');
    }
    public function applications()
    {
        return $this->hasMany(Application::class);
    }
}
