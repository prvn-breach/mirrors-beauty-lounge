<?php
namespace App\Models\Web;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductStock extends Model
{
    use HasFactory;
    
    protected $table = 'product_stock';
    protected $fillable = [ 'stock_transfer_id', 'product_id', 'quantity', 'purchased', 'amount' ];

    public function product() {
        return $this->belongsTo(ProductCatlog::class)->with('getProductImages');
    }

    public function stockTransfer() {
        return $this->belongsTo(StockTransfer::class);
    }

    public function updateStock($request) {
        return $this->where('product_id', $request['product_id'])
            ->limit($request['quantity'])
            ->update([ 'purchased' => 1 ]);
    } 
}