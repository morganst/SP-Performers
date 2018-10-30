<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
   // protected $fillable = ['firstName', 'lastName','DOB'];
    protected $table = 'notes';

    public $primaryKey = 'SID';

    public $timestamps = true;
}
