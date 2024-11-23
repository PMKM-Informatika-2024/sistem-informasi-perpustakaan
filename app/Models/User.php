<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Prunable;

class User extends Authenticatable
{
    use HasUuids, HasFactory, Notifiable, SoftDeletes, Prunable;

    protected $guarded = ['id'];

    protected $with = ['role'];

    protected $hidden = ['password'];
    protected $keyType = "uuid";
    public $incrementing = false;

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    protected function casts(): array
    {
        return [
            'password' => 'hashed',
            'created_at' => 'datetime',
        ];
    }

    public function scopeExcludeAdmin(Builder $query)
    {
        $query->whereRelation('role', 'name', '!=', 'admin');
    }

    public function scopeRole(Builder $query, string $role)
    {
        $query->whereRelation('role', 'name', $role);
    }

    public function scopeWithPaginate(Builder $query, int $perPage = 6)
    {
        /**
         * @var \Illuminate\Pagination\LengthAwarePaginator $result
         */
        $result = $query->paginate($perPage);

        return $result->onEachSide(1)->withQueryString();
    }
}
