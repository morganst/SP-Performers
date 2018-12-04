<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Student extends Model
{
    protected $fillable = ['firstName', 'lastName','DOB'];
    protected $table = 'students';

    public $primaryKey = 'id';

    public $timestamps = true;
    public function Notes()
    {
        return $this->hasMany('App\Note','SID','id');
    }

    public function classes() {

        return $this->belongsToMany('App\Classes');
    }

    public function attendance()
    {
        return $this->hasMany('App\Attendance');
    }
}
