<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Student;

class Note extends Model
{
   // protected $fillable = ['firstName', 'lastName','DOB'];
    protected $table = 'notes';

  //  public $primaryKey = 'SID';
    public $primaryKey = 'NId';

    public $timestamps = true;
    public function student()
    {
        return $this->belongsTo('App\Student','SID');
    }
}
