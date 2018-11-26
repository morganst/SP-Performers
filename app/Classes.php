<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Student;

class Classes extends Model
{
    protected $table = 'Classes';

    public $primaryKey = 'id';

    public $timestamps = true;

    public function user(){
        return $this->belongsToMany('App\User');
    }

    public function student(){
        return $this->belongsToMany('App\Student');
    }
}
