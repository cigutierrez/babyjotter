<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Babies extends Model
{
    // Allow for the following fields to be written to.
    protected $fillable = [
        'name',
        'gender',
        'user_id'
    ];

    // A baby has a parent
    public function babyParent() 
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Getters for baby
     */

    // A baby has feedings
    public function feedings() 
    {
        return $this->hasMany(Feedings::class);
    }

    // A baby has medication
    public function medication() 
    {
        return $this->hasMany(Medications::class);
    }

    // A baby has naps
    public function naps()
    {
        return $this->hasMany(Naps::class);
    }

    /**
     * Setters for baby
     */

    // A baby can feed
    public function addFeeding($feeding)
    {
        $this->feedings()->create($feeding);
    }

    // A baby can take medication
    public function addMedication($medication)
    {
        $this->medications()->create($medication);
    }

    // A baby can nap
    public function addNap($nap)
    {
        $this->naps()->create($nap);
    }
}
