<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Prunable;
use Cviebrock\EloquentSluggable\Sluggable;

class Category extends Model
{
    use HasUuids, Sluggable, SoftDeletes, Prunable;

    protected $guarded = ['id'];

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
                'source' => 'name'
            ]
        ];
    }
}
