<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Loan extends Model
{
    use HasUuids;

    protected $guarded = ["id"];

    public $incrementing = false;
    protected $keyType = "string";

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function member()

    {
        return $this->belongsTo(Member::class);
    }
}
