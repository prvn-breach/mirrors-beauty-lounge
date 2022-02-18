<?php
namespace App\Models\Web;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Option extends Model
{
    use HasFactory;
    
    public function updateOption($option_id,$data){
    	return $this->where('id',$option_id)->update($data);	
    } 
    public function saveOption($data){
        return $this->insertGetId($data);  
    }

    public function deleteAttributeOption($option_id){
    	return $this->where('id',$option_id)->delete();
    } 

   

}
