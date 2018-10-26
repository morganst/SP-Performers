<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Pretest;

class Student extends Model
{
    protected $fillable = ['firstName', 'lastName','DOB'];
    protected $table = 'Students';

    public $primaryKey = 'id';

    public $timestamps = true;

    public function pretest() {
        return $this->hasOne('App\Pretest');
    }

    public function user() {
        return $this->belongsTo('App\User');
    }
}
