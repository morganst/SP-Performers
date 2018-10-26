<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Student;

class Pretest extends Model
{
    protected $fillable = ['Q1', 'Q2','Q3'];
    protected $table = 'Pretest';

    public $primaryKey = 'id';

    public $timestamps = true;

    public function student() {
        return $this->belongsTo('App\Student');
    }
}
