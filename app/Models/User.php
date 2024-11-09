<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $guarded = ['id'];

    protected $with = ['role'];

    protected $hidden = ['password'];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function scopeWithPaginate(Builder $query, int $perPage = 6)
    {
        /**
         * @var \Illuminate\Pagination\LengthAwarePaginator $result
         */
        $result = $query->paginate($perPage);

        return $result->onEachSide(1)->withQueryString();
    }

    public function scopeExceptAdmin(Builder $query)
    {
        $query->whereRelation('role', 'name', '!=', 'admin');
    }

    public function scopeRoleIs(Builder $query, string $role)
    {
        $query->whereRelation('role', 'name', $role);
    }

    public function scopeNameLike(Builder $query, string $name)
    {
        $query->where('name', 'LIKE', "%{$name}%");
    }

    protected function casts(): array
    {
        return [
            'password' => 'hashed',
            'created_at' => 'datetime',
        ];
    }
}
