<?php

namespace App\Models;
use App\Models\Person;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Exception;

class Address extends Model
{
    use HasFactory;

    protected $table = 'address';

    protected $primaryKey = 'id';

    protected $guarded=[];

    public function person()
    {
        return $this->belongsTo(Person::class,'id', 'person_id');
    }

    public static function save_address($personid, $address){

        foreach ($address as $key) {
            $data = [
                'person_id'=>$personid,
                'address'=>$key['address'],
                'address_type'=>$key['address_type']
            ];
            $data1 = Address::create($data);
           
        }

        return true;
      

    }

    public static function delete_address($personid, $address_type)
    
    {

        try{
        $deleted = Address::where('person_id', $personid)
                    ->where('address_type', $address_type)->delete();
        echo "Record Deleted Successfully";
        }
        catch(Exception $e){
            return $e;
        }
        return $deleted;

    }




}
