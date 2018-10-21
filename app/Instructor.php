<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Instructor extends Model
{
    protected $table = 'Instructors';

    public $primaryKey = 'id';

    public $timestamps = true;

    public function user() {
        return $this->belongsTo('App\User');
    }
}
