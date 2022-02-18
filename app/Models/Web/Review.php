<?php
namespace App\Models\Web;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;  
class Review extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [ 'user_id', 'order_id', 'product_id', 'star', 'title', 'description', 'item_id' ];
    

   public function saveReview($request){
   		$data = $request->all();
   		return $this->updateOrCreate([
            'user_id' => $request['user_id'], 
            'product_id' => $request['product_id']
        ], $data);
   }
   public function getUser(){
   		return $this->hasOne(User::class,'id','user_id');
   }

}
