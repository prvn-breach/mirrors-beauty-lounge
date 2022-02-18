<?php
namespace App\Models\Admin;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductStock extends Model
{
    use HasFactory;
    
    protected $table = 'product_stock';
    protected $fillable = [ 'stock_transfer_id', 'product_id', 'quantity', 'amount' ];

    public function product() {
        return $this->belongsTo(ProductCatlog::class)->with('getProductImages');
    }

    public function stockTransfer() {
        return $this->belongsTo(StockTransfer::class);
    }
}