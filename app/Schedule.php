<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user', 'batch', 'course','date','user_id'
    ];


     

    public function users()

    {

        return $this->belongsToMany(User::class)->withPivot('user_id');

    }

        /**

     * The roles that belong to the user.

     */

    public function batches()

    {

        return $this->hasMany(Batch::class);

    }

        /**

     * The roles that belong to the user.

     */

    public function courses()

    {

        return $this->belongsToMany(Course::class);

    }
}
