<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Student;

class Pretest extends Model
{
    protected $fillable = ['student_id', 'Q1', 'Q2','Q3', 'Q4', 'Q5', 'Q6', 
        'Q7', 'Q8', 'Q9', 'Q10', 'Q11', 'Q12', 'Q13', 'Q14', 
        'Q15', 'Q16', 'Q17', 'Q18', 'Q19', 'Q20'];

    protected $table = 'pretest';

    public $primaryKey = 'id';

    public $timestamps = true;

    public function student() {
        return $this->belongsTo('App\Student');
    }
}
