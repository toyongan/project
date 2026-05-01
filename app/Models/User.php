<?php

namespace App\Models;

use App\Models\Job;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password'          => 'hashed',
        ];
    }

    // --- Relationships ---

    public function jobs(): HasMany
    {
        return $this->hasMany(Job::class);
    }

    // --- Role helpers ---

    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    public function isHrManager(): bool
    {
        return $this->role === 'hr_manager';
    }

    public function isApplicant(): bool
    {
        return $this->role === 'applicant';
    }
    public function applications()
    {
        return $this->hasMany(Application::class);
    }
    public function hasRole(string|array $roles): bool
    {
        return in_array($this->role, (array) $roles);
    }
    public function getNameAttribute(): string
    {
        return "{$this->first_name} {$this->last_name}";
    }
}
