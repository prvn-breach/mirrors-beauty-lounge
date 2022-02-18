<?php
namespace App\Models\Web;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Web\ProductStock;
use App\Models\Web\ProductCatlog;
use App\Helpers\ExcelResponse;
use DB;

class StockTransfer extends Model
{
    use HasFactory;
    
    protected $table = 'stock_transfer';
    protected $fillable = [ 'from_location', 'to_location', 'date', 'total_quantity', 'total_amount', 'status', 'contact_person', 'transfer_stock_immediately' ];

    public function productStock() {
        return $this->hasMany(ProductStock::class)->with('product');
    }
}