<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Naps extends Model
{
    // We are going to use guarded instead of fillable
    protected $guarded = [];

    // A nap belongs to a baby
    public function baby()
    {
        return $this->hasOne(Baby::class);
    }
}
