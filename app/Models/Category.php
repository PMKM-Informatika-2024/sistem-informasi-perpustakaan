<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Prunable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Category extends Model
{
    use HasUuids, Prunable, Sluggable, SoftDeletes;

    protected $guarded = ['id', 'slug'];

    public $incrementing = false;

    protected $keyType = 'string';

    public function books()
    {
        return $this->hasMany(Book::class);
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name',
            ],
        ];
    }
}
