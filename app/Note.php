<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
   // protected $fillable = ['firstName', 'lastName','DOB'];
    protected $table = 'Notes';

  //  public $primaryKey = 'SID';
    public $primaryKey = 'NId';

    public $timestamps = true;
    public function student()
{
    return $this->belongsTo('App\Student','SID');
}
}
