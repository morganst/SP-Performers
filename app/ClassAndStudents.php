<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClassAndStudents extends Model
{
    protected $table = "classandstudents";

    public $primaryKey = "id";

    public $studentID = true;

    public $classID = true;
}
