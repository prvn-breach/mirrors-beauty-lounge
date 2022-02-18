<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Brand\BrandController;
use App\Http\Controllers\Admin\Categories\CategoryController;
use App\Http\Controllers\Admin\SubCategories\SubCategoryController;
use App\Http\Controllers\Admin\Users\RoleController;
use App\Http\Controllers\Admin\Users\PermissionController;
use App\Http\Controllers\Admin\Users\UserController;
use App\Http\Controllers\Admin\Products\ProductController;
use App\Http\Controllers\Admin\Orders\OrderController;
use App\Http\Controllers\Admin\Carts\CartController;
use App\Http\Controllers\Admin\WishLists\WishListController;
use App\Http\Controllers\Admin\Coupons\CouponController;
use App\Http\Controllers\Admin\Locations\LocationController;
use App\Http\Controllers\Admin\Vendors\VendorController;
use App\Http\Controllers\Admin\Campaigns\CampaignController;
use App\Http\Controllers\Admin\Newsletters\NewsletterController;
use App\Http\Controllers\Admin\Gifts\GiftController;
use App\Http\Controllers\Admin\Promotions\PromotionController;
use App\Http\Controllers\Admin\Reports\ReportController;
use App\Http\Controllers\Admin\Design\DesignController;
use App\Http\Controllers\Admin\Banners\BannerController;
use App\Http\Controllers\Admin\Import\ImportController;
use App\Http\Controllers\Admin\Export\ExportController;
use App\Http\Controllers\Admin\Countries\CountryController;
use App\Http\Controllers\Admin\PaymentOptions\PaymentOptionController;
use App\Http\Controllers\Admin\StoreDetails\StoreDetailController;
use App\Http\Controllers\Admin\Settings\SettingController;



Route::post('login',[UserController::class,'authenticate']);
Route::post('register',[UserController::class,'register']);
Route::get('export', [ExportController::class, 'export']);
Route::post('seller-register',[UserController::class,'sellerRegister']);
Route::post('forgot-password',[UserController::class,'forgotPassword']);
Route::group(['middleware' => ['assign.guard:admins','jwt.verify']],function ()
{
Route::post('update-profile',[UserController::class,'updateProfile']);
Route::post('update-seller-profile',[UserController::class,'updateSellerProfile']);
Route::get('get-user',[UserController::class,'getAuthenticatedUser']);
Route::get('get-users',[UserController::class,'getUsers']);
Route::get('get-user-detail/{user_id?}',[UserController::class,'getUserDetail']);
Route::get('get-customer-reports',[UserController::class,'getCustomerReports']);
Route::get('get-sellers',[UserController::class,'getSellers']);
Route::post('create-customer', [UserController::class, 'createCustomer' ]);

Route::any('get-products',[ProductController::class,'getProducts']);
Route::get('get-product/{product_id?}',[ProductController::class,'getProduct']);
Route::get('delete-product-image/{image_id?}',[ProductController::class,'deleteProductImage']);
Route::get('delete-specification-product/{specification_id?}',[ProductController::class,'deleteSpecificationProduct']);
Route::post('change-product-status',[ProductController::class,'changeProductStatus']);
Route::post('delete-product-attribute-option',[ProductController::class,'deleteProductAttributeOption']);
Route::post('save-products',[ProductController::class,'saveProducts']);
Route::get('get-best-seller-products',[ProductController::class,'getBestSellerProducts']);
Route::get('get-never-purchased-products',[ProductController::class,'getNeverPurchasedProducts']);
Route::get('get-product-reviews', [ProductController::class, 'getProductReviews']);
Route::get('get-product-review', [ProductController::class, 'getProductReview']);
Route::post('update-product-review', [ProductController::class, 'updateProductReview']);
Route::post('delete-product-review', [ProductController::class, 'deleteProductReview']);
Route::post('delete-product-reviews', [ProductController::class, 'deleteProductReviews']);
Route::post('delete-products', [ProductController::class, 'deleteProducts']);

Route::any('get-orders',[OrderController::class,'getOrders']);
Route::any('get-orders-count',[OrderController::class,'getOrdersCount']);
Route::any('get-complaints',[OrderController::class,'getComplaints']);
Route::any('get-incomplete-orders',[OrderController::class,'getIncompleteOrders']);
Route::get('get-order/{order_id?}',[OrderController::class,'getOrder']);
Route::post('add-order-follow-up',[OrderController::class,'insertOrderFollowUp']);
Route::post('add-order',[OrderController::class,'addOrder']);
Route::post('update-order',[OrderController::class,'updateOrder']);
Route::get('get-country-report',[OrderController::class,'getCountryReport']);
Route::post('create-complaint',[OrderController::class,'createComplaint']);

Route::get('get-stock-transfer', [ProductController::class,'getStockTransferRecords']);
Route::get('get-attribute-by-categories/{category_id}',[ProductController::class,'getAttributeByCategories']);
Route::get('get-stock/{stock_transfer_id}', [ProductController::class,'getStockTransferRecord']);
Route::post('create-stock-transfer', [ProductController::class,'createStockTransfer']);
Route::post('update-stock-transfer', [ProductController::class,'updateStockTransfer']);

Route::post('add-brand',[BrandController::class,'addBrand']);
Route::post('delete-brands',[BrandController::class,'deleteBrands']);
Route::get('get-brands',[BrandController::class,'getBrands']);
Route::get('get-brand/{brand_id?}',[BrandController::class,'getBrand']);
Route::get('get-select-brands/{category_id}',[ProductController::class,'getSelectBrand']);
Route::post('update-change-status-brand',[BrandController::class,'updateChangeStatusBrand']);

Route::get('categories',[CategoryController::class,'getCategories']);
Route::get('get-select-categories',[CategoryController::class,'getSelectCategories']);
Route::get('get-sub-categories',[CategoryController::class,'getSubCategories']);
Route::get('get-paginated-select-categories',[CategoryController::class,'getPaginatedSelectCategories']);
Route::post('save-category',[CategoryController::class,'saveCategory']);
Route::post('update-change-status-category',[CategoryController::class,'updateChangeStatusCategory']);
Route::get('get-category/{category_id}',[CategoryController::class,'getCategory']);
Route::get('delete-attribute-option/{option_id}',[CategoryController::class,'deleteAttributeOption']);

Route::get('sub-categories',[SubCategoryController::class,'getSubCategories']);
Route::get('sub-category',[SubCategoryController::class,'getSubCategory']);
Route::post('create-sub-category',[SubCategoryController::class,'createSubCategory']);
Route::post('update-sub-category',[SubCategoryController::class,'updateSubCategory']);
Route::post('delete-sub-category',[SubCategoryController::class,'deleteSubCategory']);

Route::get('get-carts', [CartController::class,'getCarts']);
Route::get('get-wishlist', [WishListController::class,'getWishlistCountByUser']);

Route::get('get-coupons', [CouponController::class, 'getCoupons']);
Route::get('get-coupon/{coupon_id?}', [CouponController::class, 'getCoupon']);
Route::post('create-coupon', [CouponController::class, 'createCoupon']);
Route::post('delete-coupon', [CouponController::class, 'deleteCoupon']);
Route::post('update-coupon', [CouponController::class, 'updateCoupon']);

Route::get('get-locations', [LocationController::class, 'getLocations']);
Route::get('get-location/{location_id}', [LocationController::class, 'getLocation']);
Route::get('get-deleted-locations', [LocationController::class, 'getDeletedLocations']);
Route::post('create-location', [LocationController::class, 'createLocation']);
Route::post('delete-location', [LocationController::class, 'deleteLocation']);
Route::post('delete-locations', [LocationController::class, 'deleteLocations']);
Route::post('update-location', [LocationController::class, 'updateLocation']);

Route::get('get-vendors', [VendorController::class, 'getVendors']);
Route::get('get-vendor/{vendor_id}', [VendorController::class, 'getVendor']);
Route::post('create-vendor', [VendorController::class, 'createVendor']);
Route::post('update-vendor', [VendorController::class, 'updateVendor']);
Route::post('delete-vendor', [VendorController::class, 'deleteVendor']);

Route::get('get-email-campaigns', [CampaignController::class, 'getEmailCampaigns']);
Route::get('get-email-campaign/{email_campaign_id}', [CampaignController::class, 'getEmailCampaign']);
Route::post('create-email-campaign', [CampaignController::class, 'createEmailCampaign']);
Route::post('update-email-campaign', [CampaignController::class, 'updateEmailCampaign']);
Route::post('delete-email-campaign', [CampaignController::class, 'deleteEmailCampaign']);

Route::get('get-newsletters', [NewsletterController::class, 'getNewsletters']);

Route::get('get-gift-certificates', [GiftController::class, 'getGiftCertificates']);
Route::get('get-gift-certificate/{gift_certificate_id}', [GiftController::class, 'getGiftCertificate']);
Route::post('create-gift-certificate', [GiftController::class, 'createGiftCertificate']);
Route::post('update-gift-certificate', [GiftController::class, 'updateGiftCertificate']);
Route::post('delete-gift-certificate', [GiftController::class, 'deleteGiftCertificate']);

Route::get('get-promotions', [PromotionController::class, 'getPromotions']);
Route::get('get-promotion/{promotion_id}', [PromotionController::class, 'getPromotion']);
Route::post('create-promotion', [PromotionController::class, 'createPromotion']);
Route::post('update-promotion', [PromotionController::class, 'updatePromotion']);
Route::post('delete-promotion', [PromotionController::class, 'deletePromotion']);

Route::post('add-sem-expense', [ReportController::class, 'addSemExpense']);
Route::any('get-sem-expenses-report', [ReportController::class, 'getSemExpenses']);
Route::any('get-product-insert-report', [ReportController::class, 'getProductInsertReport']);
Route::any('get-product-sale-cost', [ReportController::class, 'getProductSaleCost']);
Route::get('get-product-vists', [ReportController::class, 'getProductVisits']);
Route::any('get-category-sales', [ReportController::class, 'getCategorySales']);
Route::get('get-active-customer-locations', [ReportController::class, 'getActiveCustomerLocations']);
Route::any('get-top-customers-sales', [ReportController::class, 'getTopCustomersSales']);
Route::get('get-order-status-report', [ReportController::class, 'getOrderStatusReport']);

Route::post('create-cms-page', [DesignController::class, 'createCMSPage']);
Route::get('get-cms-pages', [DesignController::class, 'getCMSPages']);
Route::get('get-cms-page/{cms_page_id}', [DesignController::class, 'getCMSPage']);
Route::post('update-cms-page', [DesignController::class, 'updateCMSPage']);
Route::post('delete-cms-page', [DesignController::class, 'deleteCMSPage']);

Route::get('get-banners', [BannerController::class, 'getBanners']);
Route::post('create-banner-image', [BannerController::class, 'createBannerImage']);
Route::get('get-banner-images', [BannerController::class, 'getBannerImages']);
Route::get('get-banner-image/{banner_image_id}', [BannerController::class, 'getBannerImage']);
Route::post('update-banner-image', [BannerController::class, 'updateBannerImage']);
Route::post('delete-banner-image', [BannerController::class, 'deleteBannerImage']);

Route::get('get-countries', [CountryController::class, 'getCountriesList']);

Route::get('get-payment-options-by-country', [PaymentOptionController::class, 'getPaymentOptionsByCountry']);
Route::get('get-payment-option-by-country/{payment_option_id}', [PaymentOptionController::class, 'getPaymentOptionByCountry']);
Route::post('create-payment-option-by-country', [PaymentOptionController::class, 'createPaymentOptionByCountry']);
Route::post('update-payment-option-by-country', [PaymentOptionController::class, 'updatePaymentOptionByCountry']);
Route::post('delete-payment-option-by-country', [PaymentOptionController::class, 'deletePaymentOptionByCountry']);

Route::post('create-store-detail', [StoreDetailController::class, 'createStoreDetail']);

Route::get('get-warehouse', [SettingController::class, 'getWarehouse']);
Route::post('create-warehouse', [SettingController::class, 'createWarehouse']);

Route::post('import', [ImportController::class, 'import']);
// Route::get('export', [ExportController::class, 'export']);
	
Route::resource('roles', RoleController::class);
Route::resource('permissions', PermissionController::class);

});

