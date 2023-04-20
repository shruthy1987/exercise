<?php

namespace App\Models;
use App\Models\Address;
use App\Models\Subject;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Exception;

use function PHPUnit\Framework\isNull;

class Person extends Model
{
    use HasFactory;

    protected $table = 'person';

    protected $primaryKey = 'id';

    protected $guarded = [];

    public function address()
    {
        return $this->hasMany(Address::class);
    }

    public function subjects()
    {
        return $this->belongsToMany(Subject::class,'person_subject', 'person_id', 'subject_id');
    }

    public static function create_person($person){

        $data1 = [
            'name'=>$person['name'],
            'email'=>$person['email'],
            'phonenumber'=>$person['phonenumber']
        ];


        try{

            $data = Person::create($data1)->id;
            Address::save_address($data,$person['address']);

        } catch(Exception $e) {

            return $e;
        }
        return $data;

    }
    
    public static function get_person_details(){

        $allperson = Person::all();
        return $allperson;

    }

    public static function update_person($personid, $email)
    {
        
        try{

        $persondata = Person::updateOrCreate(
                    ['id' => $personid],
                    ['email'=>$email]
        );
       
        }catch(Exception $e){
            return $e;
        }
        return $persondata;

    }

    public static function delete_person($personid, $subjectname)
    {
        
        try
        {

        $persondata = Person::find($personid);
        if(is_null($persondata)){
            return 'Please enter valid person id';
        }

        $subjectdata = Subject::where('subject_name',$subjectname)->get('id')->pluck('id');
        if($subjectdata->isEmpty()){
            return 'Incorrect subject';
        }
        $data = $persondata->subjects()->detach($subjectdata);
        

        }catch(Exception $e){
            return $e;
        }
        return $data;

    }

    public static function create_subject($personid, $subjects){

        try{
            $persondata = Person::find($personid)->id;
            $subjectdata = Person::with('subjects')->find($personid);
            $subjectdata->subjects()->attach($subjects);
            return $subjectdata;
        }
        catch(Exception $e){
            return $e;
        }
    }

   
}
