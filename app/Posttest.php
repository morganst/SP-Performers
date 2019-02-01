<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Student;

class Posttest extends Model
{
    protected $fillable = ['student_id', 'Q1', 'Q2','Q3', 'Q4', 'Q5', 'Q6', 
    'Q7', 'Q8', 'Q9', 'Q10', 'Q11', 'Q12', 'Q13', 'Q14', 
    'Q15', 'Q16', 'Q17', 'Q18', 'Q19', 'Q20', 'Q21', 'Q22', 'Q23', 'Q24', 'Q25', 'Q26', 'Q27'];

    protected $table = 'posttest';

    public $primaryKey = 'id';

    public $timestamps = true;

    public function student() {
        return $this->belongsTo('App\Student');
    }
}
