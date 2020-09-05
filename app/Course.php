<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = ['name', 'description', 'level', 'image'];


    public function batches()
    {
        return $this->belongsToMany(Batch::class)->withPivot('time');
    }

}
