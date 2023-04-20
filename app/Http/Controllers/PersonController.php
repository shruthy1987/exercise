<?php

namespace App\Http\Controllers;

use App\Models\Person;
use App\Models\Subject;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    //
    public function save_person(Request $request)
    {
        $data = $request->all();
        //dd($data);
        $personarr = [
        'name' => $data['name'],
        'email' => $data['email'],
        'phonenumber' => $data['phonenumber'],
        'address' => [
            ['address' => $data['address'], 'address_type' => $data['addresstype']],
            ['address' => $data['addresstemp'], 'address_type' => $data['addresstypetemp']]
        ]
        ];

        $output = Person::create_person($personarr);
        Person::create_subject($output,$data['sub']);
        return redirect('/');
        
    }
}
