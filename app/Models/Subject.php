<?php

namespace App\Models;
use App\Models\Person;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Exception;


class Subject extends Model
{
    use HasFactory;
    protected $table = 'subject';

    protected $primaryKey = 'id';
    
    protected $guarded=[];

    public function person()
    {
        return $this->belongsToMany(Person::class,'person_subject', 'subject_id', 'person_id');
    }

    public function delete_subject(){

        $data = $this->person()->count();
        if($data > 0){
            return 'Person exists';
        }
        else{

            $data = Subject::where('id',$this->id)->delete();
            return 'Record Discarded';
        }
    }


    


}
