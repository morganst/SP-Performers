<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DailySurvey extends Model
{
    protected $table = "dailysurveys";

    public $primaryKey = "id";

    public $timestamps = true;

    protected $fillable = ['Q1','Q2','Q3','Q4','Q5','Mood','StudentID','date','ClassID'];

}
