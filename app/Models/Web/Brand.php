<?php
namespace App\Models\Web;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Brand extends Model
{
    use HasFactory;

    public function getBrands()
    {
    	return $this->where('status','A')->get();
    }

}
