import Vue from 'vue'
import VueRouter from 'vue-router'
import Dashboard from '@admin/components/Dashboard'
import BrandList from '@admin/components/brands/BrandList'
import AddBrand from '@admin/components/brands/AddBrand'
import CategoryList from '@admin/components/categories/CategoryList'
import SubCategories from '@admin/components/sub-categories/SubCategories'
import AddCategory from '@admin/components/categories/AddCategory'
import AddSubCategory from '@admin/components/sub-categories/AddSubCategory'
import EditSubCategory from '@admin/components/sub-categories/EditSubCategory'
import AttributesList from '@admin/components/attributes/AttributesList'
import AddAttributes from '@admin/components/attributes/AddAttr'
import AddProduct from '@admin/components/products/AddProduct'
import Products from '@admin/components/products/Products'
import ProductReviews from '@admin/components/products/ProductReviews'
import EditProductReview from '@admin/components/products/EditProductReview'
import UploadDownload from '@admin/components/products/UploadDownload'
import Orders from '@admin/components/orders/Orders'
import AddOrder from '@admin/components/orders/AddOrder'
import OrderDetail from '@admin/components/orders/OrderDetail'
import InCompleteOrders from '@admin/components/orders/InCompleteOrders'
import InCompleteOrderDetail from '@admin/components/orders/InCompleteOrderDetail'
import ShippingOrders from '@admin/components/orders/Shipment';
import ShippingOrderDetail from '@admin/components/orders/ShipmentDetail';
import ReturnRequest from '@admin/components/orders/ReturnRequest';
import ReturnRequestDetail from '@admin/components/orders/ReturnRequestDetail';
import CancelledOrders from '@admin/components/orders/CancelledOrders';
import CancelledOrderDetail from '@admin/components/orders/CancelledOrderDetail';
import Complaints from '@admin/components/orders/Complaints';
import AddComplaint from '@admin/components/orders/AddComplaint';
import ComplaintDetail from '@admin/components/orders/ComplaintDetail';
import ComplaintConversation from '@admin/components/orders/ComplaintConversation';
import CurrentWishlist from '@admin/components/orders/CurrentWishlists';
import CurrentCart from '@admin/components/orders/CurrentCarts';
import BestSellers from '@admin/components/orders/BestSellers';
import ProductsNeverPurchase from '@admin/components/orders/ProductsNeverPurchase';
import ProductDetail from '@admin/components/orders/ProductDetail';
import Inventory from '@admin/components/orders/Inventory';
import CountryReport from '@admin/components/orders/CountryReport';
import AddCustomer from '@admin/components/customers/AddCustomer';
import Customers from '@admin/components/customers/Customers';
import Sellers from '@admin/components/customers/Sellers';
import CustomerDetail from '@admin/components/customers/CustomerDetail';
import CustomerReports from '@admin/components/customers/CustomerReports';
import Coupons from '@admin/components/coupons/Coupons';
import AddCoupon from '@admin/components/coupons/AddCoupon';
import ViewCoupon from '@admin/components/coupons/ViewCoupon';
import Locations from '@admin/components/locations/Locations';
import AddLocation from '@admin/components/locations/AddLocation';
import ViewLocation from '@admin/components/locations/ViewLocation';
import StockTransfer from '@admin/components/stockTransfer/StockTransfer';
import AddStockTransfer from '@admin/components/stockTransfer/AddStockTransfer';
import EditStockTransfer from '@admin/components/stockTransfer/EditStockTransfer';
import Vendors from '@admin/components/vendors/Vendors';
import AddVendor from '@admin/components/vendors/AddVendor';
import VendorDetail from '@admin/components/vendors/VendorDetail';
import EmailCampaign from '@admin/components/campaigns/EmailCampaign';
import AddEmailCampaign from '@admin/components/campaigns/AddEmailCampaign';
import ViewEmailCampaign from '@admin/components/campaigns/ViewEmailCampaign';
import Newsletters from "@admin/components/newsletters/Newsletters";
import GiftCertificates from "@admin/components/gifts/GiftCertificates";
import AddGiftCertificate from "@admin/components/gifts/AddGiftCertificate";
import ViewGiftCertificate from "@admin/components/gifts/ViewGiftCertificate";
import Promotions from "@admin/components/promotions/Promotions";
import AddPromotion from "@admin/components/promotions/AddPromotion";
import ViewPromotion from "@admin/components/promotions/ViewPromotion";
import AddSemExpense from "@admin/components/reports/AddSemExpense";
import SemSaleReport from "@admin/components/reports/SemSaleReport";
import SemExpensesReport from "@admin/components/reports/SemExpensesReport";
import ProductSaleCostReport from "@admin/components/reports/ProductSaleCostReport";
import CategorySaleCostReport from "@admin/components/reports/CategorySaleCostReport";
import ProductInsertReport from "@admin/components/reports/ProductInsertReport";
import ProductVisitsReport from "@admin/components/reports/ProductVisitsReport";
import TopCategoriesByCostReport from "@admin/components/reports/TopCategoriesByCostReport";
import TopCategoriesByItemReport from "@admin/components/reports/TopCategoriesByItemReport";
import TopProductsByCostReport from "@admin/components/reports/TopProductsByCostReport";
import TopProductsByItemReport from "@admin/components/reports/TopProductsByItemReport";
import TopCustomersByCostReport from "@admin/components/reports/TopCustomersByCostReport";
import TopCustomersByItemReport from "@admin/components/reports/TopCustomersByItemReport";
import ActiveCustomerLocationsReport from "@admin/components/reports/ActiveCustomerLocationsReport";
import ShippingCostReport from "@admin/components/reports/ShippingCostReport";
import OrderStatusReport from "@admin/components/reports/OrderStatusReport";
import CMS from "@admin/components/design/CMS";
import AddCMS from "@admin/components/design/AddCMS";
import ViewCMS from "@admin/components/design/ViewCMS";
import Guides from "@admin/components/design/Guides";
import AddGuide from "@admin/components/design/AddGuide";
import ViewGuide from "@admin/components/design/ViewGuide";
import HomePageBanners from "@admin/components/design/HomePageBanners";
import AddHomePageBanner from "@admin/components/design/AddHomePageBanner";
import ViewHomePageBanner from "@admin/components/design/ViewHomePageBanner";
import PaymentOptionsByCountry from "@admin/components/paymentOptionsByCountry/PaymentOptionsByCountry";
import AddPaymentOptionByCountry from "@admin/components/paymentOptionsByCountry/AddPaymentOptionByCountry";
import ViewPaymentOptionByCountry from "@admin/components/paymentOptionsByCountry/ViewPaymentOptionByCountry";
import AddStoreDetail from "@admin/components/settings/AddStoreDetail";
import WarehouseDetail from "@admin/components/settings/WarehouseDetail";
import Login from '@admin/components/Login'
import ForgotPassword from '@admin/components/ForgotPassword'
import UpdateProfile from '@admin/components/UpdateProfile'
import store from '@admin/store'
 import { LOAD_USER_ACTION} from '@admin/store/users/actions'

Vue.use(VueRouter)
const pathH = '/shop';
const routes = [
	{ path: pathH+'/admin/add-product',name:'addProduct', component: AddProduct,  meta: {
                requiresAuth: true,
                is_admin:true,
                role_id:1
            }},
    { path: pathH+'/admin/get-products',name:'getProducts', component: Products,  meta: {
                requiresAuth: true,
                is_admin:true,
                role_id:1
            }},
    { path: pathH+'/admin/get-product-reviews',name:'getProductReviews', component: ProductReviews,  meta: {
                requiresAuth: true,
                is_admin:true,
                role_id:1
            }},
    { path: pathH+'/admin/edit-product-review/:product_review_id',name:'editProductReview', component: EditProductReview,  meta: {
                requiresAuth: true,
                is_admin:true,
                role_id:1
            }},
    { path: pathH+'/admin/upload-download',name:'uploadDownload', component: UploadDownload,  meta: {
                requiresAuth: true,
                is_admin:true,
                role_id:1
            }},
    { path: pathH+'/admin/add-order',name:'addOrder', component: AddOrder,  meta: {
                requiresAuth: true,
                is_admin:true,
                role_id:1
            }},
    { path: pathH+'/admin/order-detail/:order_id?',name:'orderDetail', component: OrderDetail,  meta: {
                requiresAuth: true,
                is_admin:true,
                role_id:1
            }},
    { path: pathH+'/admin/get-orders',name:'getOrders', component: Orders,  meta: {
                requiresAuth: true,
                is_admin:true,
                role_id:1
            }},
    { path: pathH+'/admin/get-incomplete-orders',name:'getInCompleteOrders', component: InCompleteOrders,  meta: {
                requiresAuth: true,
                is_admin:true,
                role_id:1
            }},
    { path: pathH+'/admin/incomplete-order-detail/:order_id?',name:'incompleteOrderDetail', component: InCompleteOrderDetail,  meta: {
                requiresAuth: true,
                is_admin:true,
                role_id:1
            }},
    { path: pathH+'/admin/get-shipping-orders',name:'getShippingOrders', component: ShippingOrders,  meta: {
                requiresAuth: true,
                is_admin:true,
                role_id:1
            }},
    { path: pathH+'/admin/shipping-order-detail/:order_id?',name:'shippingOrderDetail', component: ShippingOrderDetail,  meta: {
                requiresAuth: true,
                is_admin:true,
                role_id:1
            }},
    { path: pathH+'/admin/get-returned-orders',name:'getReturnedOrders', component: ReturnRequest,  meta: {
                requiresAuth: true,
                is_admin:true,
                role_id:1
            }},
    { path: pathH+'/admin/return-request-detail/:order_id?',name:'returnRequestDetail', component: ReturnRequestDetail,  meta: {
                requiresAuth: true,
                is_admin:true,
                role_id:1
            }},
    { path: pathH+'/admin/get-cancelled-orders',name:'getCancelledOrders', component: CancelledOrders,  meta: {
                requiresAuth: true,
                is_admin:true,
                role_id:1
            }},
    { path: pathH+'/admin/cancelled-order-detail/:order_id?',name:'cancelledOrderDetail', component: CancelledOrderDetail,  meta: {
                requiresAuth: true,
                is_admin:true,
                role_id:1
            }},
    { path: pathH+'/admin/get-complaints',name:'getComplaints', component: Complaints,  meta: {
                requiresAuth: true,
                is_admin:true,
                role_id:1
            }},
    { path: pathH+'/admin/add-complaint',name:'addComplaint', component: AddComplaint,  meta: {
                requiresAuth: true,
                is_admin:true,
                role_id:1
            }},
    { path: pathH+'/admin/complaint-order-detail/:order_id?',name:'complaintDetail', component: ComplaintDetail,  meta: {
                requiresAuth: true,
                is_admin:true,
                role_id:1
            }},
    { path: pathH+'/admin/complaint-conversation/:order_id',name:'complaintConversation', component: ComplaintConversation,  meta: {
                requiresAuth: true,
                is_admin:true,
                role_id:1
            }},
    { path: pathH+'/admin/get-current-wishlists',name:'getCurrentWishlists', component: CurrentWishlist,  meta: {
                requiresAuth: true,
                is_admin:true,
                role_id:1
            }},
    { path: pathH+'/admin/get-current-carts',name:'getCurrentCart', component: CurrentCart,  meta: {
                requiresAuth: true,
                is_admin:true,
                role_id:1
            }},
    { path: pathH+'/admin/get-best-sellers',name:'getBestSellers', component: BestSellers,  meta: {
                requiresAuth: true,
                is_admin:true,
                role_id:1
            }},
    { path: pathH+'/admin/product-detail/:product_id',name:'productDetail', component: ProductDetail,  meta: {
                requiresAuth: true,
                is_admin:true,
                role_id:1
            }},
    { path: pathH+'/admin/get-never-purchased-products',name:'getProductsNeverPurchase', component: ProductsNeverPurchase,  meta: {
                requiresAuth: true,
                is_admin:true,
                role_id:1
            }},
    { path: pathH+'/admin/get-country-report',name:'getCountryReport', component: CountryReport,  meta: {
                requiresAuth: true,
                is_admin:true,
                role_id:1
            }},
    { path: pathH+'/admin/get-inventory',name:'getInventory', component: Inventory,  meta: {
                requiresAuth: true,
                is_admin:true,
                role_id:1
            }},
    { path: pathH+'/admin/add-customers', name:'addCustomer', component: AddCustomer,  meta: {
                requiresAuth: true,
                is_admin:true,
                role_id:1
            }},
    { path: pathH+'/admin/get-customers', name:'getCustomers', component: Customers,  meta: {
                requiresAuth: true,
                is_admin:true,
                role_id:1
            }},
    { path: pathH+'/admin/get-sellers', name:'getSellers', component: Sellers,  meta: {
                requiresAuth: true,
                is_admin:true,
                role_id:1
            }},
    { path: pathH+'/admin/get-customer-detail/:customer_id/:tab?', name:'getCustomerDetail', component: CustomerDetail,  meta: {
                requiresAuth: true,
                is_admin:true,
                role_id:1
            }},
    { path: pathH+'/admin/get-customer-reports', name:'getCustomerReports', component: CustomerReports,  meta: {
                requiresAuth: true,
                is_admin:true,
                role_id:1
            }},
    { path: pathH+'/admin/',name:'dashboardShop', component: Dashboard,  meta: {
                requiresAuth: true,
                is_admin:true,
                role_id:1
            }},
    { path: pathH+'/admin/dashboard',name:'dashboard', component: Dashboard,  meta: {
                requiresAuth: true,
                // is_admin:true,
                role_id:1
            }},
	{ path: pathH+'/admin/brand-list',name:'brandList', component: BrandList ,  meta: {
                requiresAuth: true,
                is_admin:true,
                role_id:1
            }},
	{ path: pathH+'/admin/add-brand/:brand_id?',name:'addBrand', component: AddBrand ,  meta: {
                requiresAuth: true,
                is_admin:true,
                role_id:1
            }},
	{ path: pathH+'/admin/category-list',name:'categoryList', component: CategoryList ,  meta: {
                requiresAuth: true,
                is_admin:true,
                role_id:2
            }},
    { path: pathH+'/admin/sub-categories',name:'subCategories', component: SubCategories ,  meta: {
                requiresAuth: true,
                is_admin:true,
                role_id:2
            }},
	{ path: pathH+'/admin/add-category/:category_id?',name:'addCategory', component: AddCategory ,  meta: {
                requiresAuth: true,
                is_admin:true,
                role_id:1
            }},
    { path: pathH+'/admin/add-sub-category',name:'addSubCategory', component: AddSubCategory ,  meta: {
                requiresAuth: true,
                is_admin:true,
                role_id:1
            }},
    { path: pathH+'/admin/edit-sub-category/:sub_category_id',name:'editSubCategory', component: EditSubCategory ,  meta: {
                requiresAuth: true,
                is_admin:true,
                role_id:1
            }},
	{ path: pathH+'/admin/attr-list',name:'attributesList', component: AttributesList,  meta: {
                requiresAuth: true,
                is_admin:true,
                role_id:1
            }} ,
	{ path: pathH+'/admin/add-attr',name:'addAttr', component: AddAttributes ,  meta: {
                requiresAuth: true,
                 is_admin:true,
                 role_id:1
            }},
    { path: pathH+'/admin/get-coupons',name:'getCoupons', component: Coupons ,  meta: {
                requiresAuth: true,
                 is_admin:true,
                 role_id:1
            }},
    { path: pathH+'/admin/add-coupon',name:'addCoupon', component: AddCoupon ,  meta: {
                requiresAuth: true,
                 is_admin:true,
                 role_id:1
            }},
    { path: pathH+'/admin/view-coupon/:coupon_id',name:'viewCoupon', component: ViewCoupon ,  meta: {
                requiresAuth: true,
                 is_admin:true,
                 role_id:1
            }},
    { path: pathH+'/admin/get-locations',name:'getLocations', component: Locations ,  meta: {
                requiresAuth: true,
                is_admin:true,
                role_id:1
            }},
    { path: pathH+'/admin/view-location/:location_id',name:'viewLocation', component: ViewLocation ,  meta: {
                requiresAuth: true,
                is_admin:true,
                role_id:1
            }},
    { path: pathH+'/admin/add-location',name:'addLocation', component: AddLocation ,  meta: {
                requiresAuth: true,
                is_admin:true,
                role_id:1
            }},
    { path: pathH+'/admin/get-stock-transfer',name:'getStockTransfer', component: StockTransfer ,  meta: {
                requiresAuth: true,
                is_admin:true,
                role_id:1
            }},
    { path: pathH+'/admin/add-stock-transfer',name:'addStockTransfer', component: AddStockTransfer ,  meta: {
                requiresAuth: true,
                is_admin:true,
                role_id:1
            }},
    { path: pathH+'/admin/view-stock-transfer/:stock_transfer_id',name:'editStockTransfer', component: EditStockTransfer ,  meta: {
                requiresAuth: true,
                is_admin:true,
                role_id:1
            }},
    { path: pathH+'/admin/get-vendors',name:'getVendors', component: Vendors ,  meta: {
                requiresAuth: true,
                is_admin:true,
                role_id:1
            }},
    { path: pathH+'/admin/add-vendor',name:'addVendor', component: AddVendor ,  meta: {
                requiresAuth: true,
                is_admin:true,
                role_id:1
            }},
    { path: pathH+'/admin/vendor-detail/:vendor_id',name:'vendorDetail', component: VendorDetail ,  meta: {
                requiresAuth: true,
                is_admin:true,
                role_id:1
            }},
    { path: pathH+'/admin/get-email-campaign',name:'emailCampaign', component: EmailCampaign ,  meta: {
                requiresAuth: true,
                is_admin:true,
                role_id:1
            }},
    { path: pathH+'/admin/add-email-campaign',name:'addEmailCampaign', component: AddEmailCampaign ,  meta: {
                requiresAuth: true,
                is_admin:true,
                role_id:1
            }},
    { path: pathH+'/admin/view-email-campaign/:email_campaign_id',name:'viewEmailCampaign', component: ViewEmailCampaign ,  meta: {
                requiresAuth: true,
                is_admin:true,
                role_id:1
            }},
    { path: pathH+'/admin/newsletters',name:'newsletters', component: Newsletters ,  meta: {
                requiresAuth: true,
                is_admin:true,
                role_id:1
            }},
    { path: pathH+'/admin/gift-certificates',name:'giftCertificates', component: GiftCertificates ,  meta: {
                requiresAuth: true,
                is_admin:true,
                role_id:1
            }},
    { path: pathH+'/admin/add-gift-certificate',name:'addGiftCertificate', component: AddGiftCertificate ,  meta: {
                requiresAuth: true,
                is_admin:true,
                role_id:1
            }},
    { path: pathH+'/admin/view-gift-certificate/:gift_certificate_id',name:'viewGiftCertificate', component: ViewGiftCertificate ,  meta: {
                requiresAuth: true,
                is_admin:true,
                role_id:1
            }},
    { path: pathH+'/admin/promotions',name:'promotions', component: Promotions ,  meta: {
                requiresAuth: true,
                is_admin:true,
                role_id:1
            }},
    { path: pathH+'/admin/add-promotion',name:'addPromotion', component: AddPromotion ,  meta: {
                requiresAuth: true,
                is_admin:true,
                role_id:1
            }},
    { path: pathH+'/admin/view-promotion/:promotion_id',name:'viewPromotion', component: ViewPromotion ,  meta: {
                requiresAuth: true,
                is_admin:true,
                role_id:1
            }},
    { path: pathH+'/admin/get-product-sale-cost-report',name:'productSaleCostReport', component: ProductSaleCostReport ,  meta: {
                requiresAuth: true,
                is_admin:true,
                role_id:1
            }},
    { path: pathH+'/admin/get-category-sales',name:'categorySaleCostReport', component: CategorySaleCostReport ,  meta: {
                requiresAuth: true,
                is_admin:true,
                role_id:1
            }},
    { path: pathH+'/admin/get-product-insert-report',name:'productInsertReport', component: ProductInsertReport ,  meta: {
                requiresAuth: true,
                is_admin:true,
                role_id:1
            }},
    { path: pathH+'/admin/get-product-visits-report',name:'productVisitsReport', component: ProductVisitsReport ,  meta: {
                requiresAuth: true,
                is_admin:true,
                role_id:1
            }},
    { path: pathH+'/admin/get-top-categories-by-cost',name:'topCategoriesByCost', component: TopCategoriesByCostReport ,  meta: {
                requiresAuth: true,
                is_admin:true,
                role_id:1
            }},
    { path: pathH+'/admin/get-top-categories-by-item',name:'topCategoriesByItem', component: TopCategoriesByItemReport ,  meta: {
                requiresAuth: true,
                is_admin:true,
                role_id:1
            }},
    { path: pathH+'/admin/get-top-products-by-cost',name:'topProductsByCost', component: TopProductsByCostReport ,  meta: {
                requiresAuth: true,
                is_admin:true,
                role_id:1
            }},
    { path: pathH+'/admin/get-top-products-by-item',name:'topProductsByItem', component: TopProductsByItemReport ,  meta: {
                requiresAuth: true,
                is_admin:true,
                role_id:1
            }},
    { path: pathH+'/admin/get-top-customers-by-cost',name:'topCustomersByCost', component: TopCustomersByCostReport ,  meta: {
                requiresAuth: true,
                is_admin:true,
                role_id:1
            }},
    { path: pathH+'/admin/get-top-customers-by-item',name:'topCustomersByItem', component: TopCustomersByItemReport ,  meta: {
                requiresAuth: true,
                is_admin:true,
                role_id:1
            }},
    { path: pathH+'/admin/get-active-customer-locations-report',name:'activeCustomerLocationsReport', component: ActiveCustomerLocationsReport ,  meta: {
                requiresAuth: true,
                is_admin:true,
                role_id:1
            }},
    { path: pathH+'/admin/add-sem-expense',name:'addSemExpense', component: AddSemExpense ,  meta: {
                requiresAuth: true,
                is_admin:true,
                role_id:1
            }},
    { path: pathH+'/admin/get-sem-expenses-report',name:'semExpensesReport', component: SemExpensesReport ,  meta: {
                requiresAuth: true,
                is_admin:true,
                role_id:1
            }},
    { path: pathH+'/admin/get-sem-sale-report',name:'semSaleReport', component: SemSaleReport ,  meta: {
                requiresAuth: true,
                is_admin:true,
                role_id:1
            }},
    { path: pathH+'/admin/get-shipping-cost-report',name:'shippingCostReport', component: ShippingCostReport ,  meta: {
                requiresAuth: true,
                is_admin:true,
                role_id:1
            }},
    { path: pathH+'/admin/get-order-status-report',name:'orderStatusReport', component: OrderStatusReport ,  meta: {
                requiresAuth: true,
                is_admin:true,
                role_id:1
            }},
    { path: pathH+'/admin/cms',name:'cms', component: CMS ,  meta: {
                requiresAuth: true,
                is_admin:true,
                role_id:1
            }},
    { path: pathH+'/admin/add-cms-page',name:'addCMSPage', component: AddCMS ,  meta: {
                requiresAuth: true,
                is_admin:true,
                role_id:1
            }},
    { path: pathH+'/admin/cms/:cms_page_id',name:'viewCMS', component: ViewCMS ,  meta: {
                requiresAuth: true,
                is_admin:true,
                role_id:1
            }},
    { path: pathH+'/admin/guides',name:'guides', component: Guides ,  meta: {
                requiresAuth: true,
                is_admin:true,
                role_id:1
            }},
    { path: pathH+'/admin/add-guide-page',name:'addGuidePage', component: AddGuide ,  meta: {
                requiresAuth: true,
                is_admin:true,
                role_id:1
            }},
    { path: pathH+'/admin/view-guide/:cms_page_id',name:'viewGuidePage', component: ViewGuide ,  meta: {
                requiresAuth: true,
                is_admin:true,
                role_id:1
            }},
    { path: pathH+'/admin/home-page-banners',name:'homePageBanners', component: HomePageBanners ,  meta: {
                requiresAuth: true,
                is_admin:true,
                role_id:1
            }},
    { path: pathH+'/admin/add-home-page-banner',name:'addHomePageBanner', component: AddHomePageBanner,  meta: {
                requiresAuth: true,
                is_admin:true,
                role_id:1
            }},
    { path: pathH+'/admin/view-home-page-banner/:banner_image_id',name:'viewHomePageBanner', component: ViewHomePageBanner ,  meta: {
                requiresAuth: true,
                is_admin:true,
                role_id:1
            }},
    { path: pathH+'/admin/get-payment-options-by-country',name:'getPaymentOptionsByCountry', component: PaymentOptionsByCountry ,  meta: {
                requiresAuth: true,
                is_admin:true,
                role_id:1
            }},
    { path: pathH+'/admin/add-payment-option-by-country',name:'addPaymentOptionByCountry', component: AddPaymentOptionByCountry ,  meta: {
                requiresAuth: true,
                is_admin:true,
                role_id:1
            }},
    { path: pathH+'/admin/view-payment-option-by-country/:payment_option_id',name:'viewPaymentOptionByCountry', component: ViewPaymentOptionByCountry ,  meta: {
                requiresAuth: true,
                is_admin:true,
                role_id:1
            }},
    { path: pathH+'/admin/add-store-detail',name:'addStoreDetail', component: AddStoreDetail ,  meta: {
                requiresAuth: true,
                is_admin:true,
                role_id:1
            }},
    { path: pathH+'/admin/warehouse',name:'warehouseDetail', component: WarehouseDetail ,  meta: {
                requiresAuth: true,
                is_admin:true,
                role_id:1
            }},
	{ path: pathH+'/admin/login',name:'login', component: Login },
	{ path: pathH+'/admin/forgot-password',name:'forgotPassword', component: ForgotPassword },
	{ path: pathH+'/admin/update-profile',name:'updateProfile', component: UpdateProfile, meta: {
            requiresAuth: true,
            is_admin:true,
            role_id:1
        }}
    ]
let router = new VueRouter({
    routes,
    mode: 'history',
});

router.beforeEach((to, from, next) => {
    if(to.matched.some(record => record.meta.requiresAuth)) {
      
        if (localStorage.getItem('getAdminLogin') == null) {
        let getUrl =   router.options.routes.find(function(item){return item.name == 'login'})
        window.location.href=getUrl.path;
        } else {
              store.dispatch('Users/'+LOAD_USER_ACTION)
                .then((authUser) => {
                    let getError = store.state.Users.getError;
                    if(getError.status == 0){
                         let getUrl =   router.options.routes.find(function(item){return item.name == 'login'})
                         window.location.href=getUrl.path;
                    }
                })
        	if(to.name == 'login' && from.name == null){
        		let getUrl =   router.options.routes.find(function(item){return item.name == 'dashboard'})
        		window.location.href=getUrl.path;
            }else if(to.name == 'dashboard' && from.name == 'login'){
               
               let getUrl =   router.options.routes.find(function(item){return item.name == 'dashboard'})
                window.location.href=getUrl.path;
        	}else{
        		let user = JSON.parse(localStorage.getItem('getAdminLogin'));
	            if(to.matched.some(record => record.meta.is_admin)) {
                   
	            	if(to.name != 'dashboard' ){

                        next();
		        	}
	             
	            }else {
	                 next()
	            }
        	}
          
        }
    } else {
         if (localStorage.getItem('getAdminLogin') != null) {
            let getUrl =   router.options.routes.find(function(item){return item.name == 'dashboard'})
            window.location.href=getUrl.path;
         }else{
    	   next();
         }
    }

})

export default router




