<?php
namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;  

class SellerStoreDetail extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [ 'admin_id', 'store_name', 'store_address', 'store_from', 'po_box_number', 
        'company_emirates_document', 'company_emirates_document_id', 'company_emirates_expiry_date',
        'company_trade_license_document', 'company_trade_license_document_id', 'company_trade_license_expiry_date' 
    ];
}