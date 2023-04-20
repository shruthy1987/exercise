<?php

namespace App\Http\Controllers;
use App\Models\Subject;

use Illuminate\Http\Request;

class FormController extends Controller
{
    //

    public function person_details()
    {

        $data = Subject::pluck('subject_name','id')->toArray();
        return view('welcome',['subjects'=>$data]);
        
        
    }

}
