<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Student extends Model
{
    protected $fillable = ['firstName', 'lastName','DOB'];
    protected $table = 'Students';

    public $primaryKey = 'id';

    public $timestamps = true;
    public function Notes()
    {
        return $this->hasMany('App\Note','SID','id');
    }
}
