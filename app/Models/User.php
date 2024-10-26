<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $guarded = ["id"];
    protected $with = ['role'];
    protected $hidden = ['password'];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function scopeIsAdmin(): bool
    {
        return $this->role->name === 'admin';
    }

    public function scopeIsWorker(): bool
    {
        return $this->role->name === 'worker';
    }

    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }
}
