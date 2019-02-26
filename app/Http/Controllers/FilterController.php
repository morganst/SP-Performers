<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classes;
class FilterController extends Controller
{
    public function filter(){
        $searchkey = \Request::get('title');
        $classes =  Classes::where('location', 'like', '' .$searchkey. '')->orderBy('created_at', 'des')->paginate(10);
         $search=Classes::all();

       
        $filter = array("");
        $check = "";
       
    

    
    
     foreach($search as $class){
     
                    $size=sizeof($filter);
                    for ($i = 0; $i < $size; $i++){
                        if($class->location==$filter[$i]){
                            $check="yes";
                            break;
                        }
                        else{
                            $check="no";
                        }
                    
    
  
                        
                     
                      }
                      
                    if( $check=="no"){
                        array_push($filter,$class->location);
                        }
                    }
                         
                         
        return view('Classes.index',compact(['filter', 'classes']));
    }
}
