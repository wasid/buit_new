<?php

namespace App\Http\Controllers;

use App\Student;

use DB;

use Illuminate\Http\Request;

use App\Http\Requests;

class StudentController extends Controller
{
        
    	public function getStudent(){
    	    
    	    $students = Student::all();
    	    
    	   // return $student;
			return View('user.student', compact('students'));
	}
	
        public function showStudent(Request $request){
			
			$search = '%'.$_POST['studentid'].'%';
    		$students = DB::table('student')->where('studentid', 'like', $search)->get();
			return View('user.showstudent', ['students' => $students]);
	}
}
