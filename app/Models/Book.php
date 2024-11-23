<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Prunable;

class Book extends Model
{
    use HasFactory, HasUuids, SoftDeletes, Prunable;

    protected $guarded = ["id"];

    public function category()
    {
        return $this->belongsTo(Category::class);
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
