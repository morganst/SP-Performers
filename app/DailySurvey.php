<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DailySurvey extends Model
{
    protected $table = "dailysurveys";

    public $primaryKey = "id";

    public $timestamps = true;

}