<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\Categories\CategoryController;
use App\Http\Controllers\Web\SubCategories\SubCategoryController;
use App\Http\Controllers\Web\Customers\CustomerIpLocationController;
use App\Http\Controllers\Web\Users\UserController;
use App\Http\Controllers\Web\Profiles\ProfileController;
use App\Http\Controllers\Web\Products\ProductController;
use App\Http\Controllers\Web\WishLists\WishListController;
use App\Http\Controllers\Web\Carts\CartController;
use App\Http\Controllers\Web\Addresses\AddressController;
use App\Http\Controllers\Web\PickupLocations\PickupLocationController;
use App\Http\Controllers\Web\Shippings\ShippingController;
use App\Http\Controllers\Web\PlaceOrders\PlaceOrderController;
use App\Http\Controllers\Web\OrderConfirm\ConfirmController;
use App\Http\Controllers\Web\Banners\BannerController;
use App\Http\Controllers\Web\Brands\BrandController;
use App\Http\Controllers\Web\Reviews\ReviewController;
use App\Http\Controllers\Web\Compares\CompareController;
use App\Http\Controllers\Web\Newsletters\NewsletterController;
use App\Http\Controllers\Web\OrderComplaints\ComplaintController;
use App\Http\Controllers\Web\Coupons\CouponController;
use App\Http\Controllers\Web\Gifts\GiftController;
use App\Http\Controllers\Web\Cms\CmsController;
use App\Http\Controllers\Web\Promotions\PromotionController;
use App\Http\Controllers\Web\OrderInvoice\OrderInvoiceController;

Route::post('save-compare',[CompareController::class,'saveCompare']);
Route::post('get-compares',[CompareController::class,'getCompares']);
Route::post('delete-compare/{id}',[CompareController::class,'deleteCompare']);
Route::post('save-review',[ReviewController::class,'saveReview']);
Route::get('get-brands',[BrandController::class,'getBrands']);
Route::get('get-banner/{type}',[BannerController::class,'getBanner']);
Route::post('save-status-order',[ConfirmController::class,'saveStatusOrder']);
Route::get('get-order-by-user/{user_id}',[ConfirmController::class,'getOrderByUser']);
Route::get('get-order/{session_id}',[ConfirmController::class,'getOrder']);
Route::post('save-place-order',[PlaceOrderController::class,'savePlaceOrder']);
Route::get('get-shippings',[ShippingController::class,'getShippings']);
Route::post('save-pickup-location-in-cart',[PickupLocationController::class,'savePickupLocationInCart']);
Route::get('get-pickup-locations',[PickupLocationController::class,'getPickupLocations']);
Route::get('get-pickup-location/{puckup_id}',[PickupLocationController::class,'getPickupLocation']);
Route::get('delete-pickup-location-by-cart-id',[PickupLocationController::class,'deletePickupLocationByCartId']);
Route::post('login',[UserController::class,'authenticate']);
Route::post('logout',[UserController::class,'logout']);
Route::post('save-cart-address',[AddressController::class,'saveCartAddress']);
Route::post('save-address',[AddressController::class,'saveAddress']);
Route::get('get-addresses/{user_id}',[AddressController::class,'getAddresses']);
Route::get('get-address-by-id/{address_id}',[AddressController::class,'getAddressById']);
Route::get('delete-address-by-id',[AddressController::class,'deleteAddressById']);
Route::post('register',[UserController::class,'register']);
Route::post('save-cart',[CartController::class,'saveCart']);
Route::post('update-cart',[CartController::class,'updateCart']);
Route::post('save-qty-cart-item',[CartController::class,'saveQtyCartItem']);
Route::get('delete-cart-item/{item_id}',[CartController::class,'deleteCartItem']);
Route::get('get-carts/{session_id}',[CartController::class,'getCarts']);
Route::post('change-password',[UserController::class,'changePassword']);
Route::get('get-reset-password-token',[UserController::class,'getResetPasswordToken']);
Route::post('forgot-password-mail',[UserController::class,'forgotPasswordMail']);
Route::post('forgot-password',[UserController::class,'forgotPassword']);
Route::post('update-profile',[ProfileController::class,'updateProfile']);
Route::post('update-profile-image',[ProfileController::class,'updateProfileImage']);
Route::post('save-wish-list',[WishListController::class,'saveWishList']);
Route::get('get-wish-list/{user_id}',[WishListController::class,'getWishList']);
Route::get('get-wish-list-by-user/{user_id}',[WishListController::class,'getWishListByUser']);
//Route::get('open', 'DataController@open');
Route::get('get-categories-home',[CategoryController::class,'getCategoriesHome']);
Route::get('get-categories',[CategoryController::class,'getCategories']);
Route::get('get-customer-location',[CustomerIpLocationController::class,'getCustomerIpLocation']);
Route::get('get-product-deal',[ProductController::class,'getProductDeals']);
Route::get('get-products/{params?}',[ProductController::class,'getProducts'])->where('params', '(.*)');

Route::get('sub-categories',[SubCategoryController::class,'getSubCategories']);
Route::get('sub-category',[SubCategoryController::class,'getSubCategory']);

// Route::get('get-product-filter/{params?}',[ProductController::class,'getProductFilter'])->where('params', '(.*)');
Route::get('get-product-filter',[ProductController::class,'getProductFilter']);
Route::get('get-tag-search',[ProductController::class,'getTags']);
Route::get('get-product-description/{lang?}/{slug}',[ProductController::class,'getProductDescription'])->where('params', '(.*)');
Route::get('get-vat',[ProductController::class,'getVat']);
Route::post('newsletter-subscribe', [NewsletterController::class, 'subscribe']);

Route::post('create-complaint', [ComplaintController::class, 'createComplaint']);

Route::get('get-coupons', [CouponController::class, 'getCoupons']);
Route::get('get-coupon', [CouponController::class, 'getCoupon']);
Route::get('validate-coupon', [CouponController::class, 'validateCoupon']);

Route::get('get-gift-certificates', [GiftController::class, 'getGiftCertificates']);
Route::get('get-gift-certificate', [GiftController::class, 'getGiftCertificate']);

Route::get('get-cms-pages', [CmsController::class, 'getCMSPages']);
Route::get('get-cms-page/{slug}', [CmsController::class, 'getCMSPage']);

Route::get('get-promotions', [PromotionController::class, 'getPromotions']);
Route::get('get-promotion', [PromotionController::class, 'getPromotion']);

Route::get('export-order-invoice', [OrderInvoiceController::class, 'exportOrderInvoice']);

Route::group(['middleware' =>['assign.guard:api','jwt.verify']], function() {
	Route::get('get-user',[UserController::class,'getAuthenticatedUser']);
	
});

