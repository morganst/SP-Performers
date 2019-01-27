<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Pretest;
use App\Posttest;

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

    public function pretest() {
        return $this->hasOne('App\Pretest');
    }

    public function posttest() {
        return $this->hasOne('App\Posttest');
    }

    public function user() {
        return $this->belongsTo('App\User');
    }
}

