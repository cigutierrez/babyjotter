<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feedings extends Model
{
    // We are going to use guarded instead of fillable
    protected $guarded = [];

    // A feeding belongs to a baby
    public function baby()
    {
        return $this->hasOne(Baby::class);
    }


}
