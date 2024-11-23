<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Prunable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Category extends Model
{
    use HasUuids, Prunable, SoftDeletes;

    protected $guarded = ['id'];

    public function books()
    {
        return $this->hasMany(Book::class);
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
