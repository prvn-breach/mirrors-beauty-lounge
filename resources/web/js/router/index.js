import Vue from 'vue'

import VueRouter from 'vue-router'
Vue.use(VueRouter)
import Index from '@web/components/Index'
import Cart from '@web/components/Cart'
import Offer from '@web/components/Offer'
import ProductDescription from '@web/components/ProductDescription'
import ProductList from '@web/components/ProductList'
import AddressCheckout from '@web/components/AddressCheckout'
import StorePickup from '@web/components/StorePickup'
import CheckoutShipping from '@web/components/CheckoutShipping'
import CheckoutPayment from '@web/components/CheckoutPayment'
import CheckoutConfirmed from '@web/components/CheckoutConfirmed'
import Profile from '@web/components/Profile'
import Orders from '@web/components/Orders'
import AccountPassword from '@web/components/AccountPassword'
import AddressAccount from '@web/components/AddressAccount'
import Address from '@web/components/Address'
import OrdersDetails from '@web/components/OrdersDetails'
import Payments from '@web/components/Payments'
import Returns from '@web/components/Returns'
import Complaints from '@web/components/Complaints'
import SellWithUs from '@web/components/SellWithUs'
import SellerAccount from '@web/components/SellerAccount'
import SellerStore from '@web/components/SellerStore'
import SellerConfirmation from '@web/components/SellerConfirmation'
import CmsPage from '@web/components/CmsPage'
import Category from '@web/components/mobile/Category'
import Account from '@web/components/mobile/Account'
import Search from '@web/components/mobile/Search'
import EventBus from '@web/event/bus'
import SellerRegister from '@web/components/SellerRegister';
import ChangePassword from '@web/components/ChangePassword';
import { LOAD_USER_ACTION} from '@web/store/users/actions'
import store from '@web/store'
const pathH = '/shop';
const originalPush = VueRouter.prototype.push
// Rewrite the push method on the prototype and handle the error message uniformly
VueRouter.prototype.push = function push(location) {
  return originalPush.call(this, location).catch(err => err)
}
VueRouter.prototype.replace = function replace(location) {
  return originalPush.call(this, location).catch(err => err)
}
const routes = [
    { path: pathH+'/get-home/:country_leng?', name: 'getHome', component:Index},
   { path: pathH+'/:country_leng?', name: 'getIndex', component:Index},
   { path: pathH+'/get-category/:country_leng?', name: 'getMobileCategory', component:Category},
   { path: pathH+'/get-account/:country_leng?', name: 'getMobileAccount', component:Account,meta: {
                requiresAuth: true
            }},
   { path: pathH+'/get-search/:country_leng?', name: 'getMobileSearch', component:Search},
   	{ path: pathH+'/get-cart/:country_leng?', name: 'getCart', component:Cart},
   	{ path: pathH+'/get-offer/:country_leng?', name: 'getOffer', component:Offer},
   	{ path: pathH+'/get-product-description/:country_leng?/:productSlug', name: 'getProductDescription', component:ProductDescription},
   	{ path: pathH+'/get-product-list/:country_leng?/:viewType/:productSlug', name: 'getProductList', component:ProductList},
   	{ path: pathH+'/get-product-list/:country_leng?', name: 'getAllProducts', component:ProductList},
   	{ 
      path: pathH+'/get-address-checkout/:country_leng?/:address_id?',
      name: pathH+'getAddressCheckout',
      component:AddressCheckout,
      meta: {
                requiresAuth: true
            }
    },
   	{ 
      path: pathH+'/get-store-pickup/:country_leng?',
      name: 'getStorePickup',
      component:StorePickup,
      meta: {
                requiresAuth: true
            }
    },
   	{ 
      path: pathH+'/get-checkout-shipping/:country_leng?', 
      name: 'getCheckoutShipping', 
      component:CheckoutShipping,
      meta: {
                requiresAuth: true
            }
    },
   	{ 
      path: pathH+'/get-checkout-payment/:country_leng?',
      name: 'getCheckoutPayment',
      component:CheckoutPayment,
      meta: {
                requiresAuth: true
            }
    },
   	{ 
      path: pathH+'/get-checkout-confirmed/:country_leng?', 
      name: 'getCheckoutConfirmed', 
      component:CheckoutConfirmed,
      meta: {
                requiresAuth: true
            }
    },
   	{ 
      path: pathH+'/get-profile/:country_leng?', 
      name: 'getProfile', 
      component:Profile,
      meta: {
                requiresAuth: true
            }
    },
   	{ path: pathH+'/get-orders/:country_leng?', name: 'getOrders', component:Orders,meta: {
                requiresAuth: true
            }},
   	{ 
      path: pathH+'/get-account-password/:country_leng?', 
      name: 'getAccountPassword', 
      component:AccountPassword,
       meta: {
                requiresAuth: true
            }
    },
   	{ path: pathH+'/get-address-account/:country_leng?', name: 'getAddressAccount', component:Address,
       meta: {
                requiresAuth: true
            }},  
    { path: pathH+'/add-address-account/:country_leng?/:address_id?', name: 'AddAddressAccount', component:AddressAccount,
       meta: {
                requiresAuth: true
            }},
   	{ path: pathH+'/get-address/:country_leng?', name: 'getAddress', component:Address},
   	{ path: pathH+'/get-order-details/:country_leng?/:session_id?', name: 'getOrderDetails', component:OrdersDetails,meta: {
                requiresAuth: true
            }},
   	{ path: pathH+'/get-payments/:country_leng?', name: 'getPayments', component:Payments},
   	{ path: pathH+'/get-returns/:country_leng?', name: 'getReturns', component:Returns},
   	{ path: pathH+'/get-complaints/:country_leng?', name: 'getComplaints', component:Complaints},
   	{ path: pathH+'/get-sell-with-us/:country_leng?', name: 'getSellWithUs', component:SellWithUs},
   	{ path: pathH+'/get-seller-account/:country_leng?', name: 'getSellerAccount', component:SellerAccount},
   	{ path: pathH+'/get-seller-store/:country_leng?', name: 'getSellerStore', component:SellerStore},
   	{ path: pathH+'/get-seller-confirmation/:country_leng?', name: 'getSellerConfirmation', component:SellerConfirmation},

   	{ path: pathH+'/cms/:slug', name: 'getCmsPage', component: CmsPage },    
   	{ path: pathH+'/seller/register', name: 'sellerRegister', component: SellerRegister },    
   	{ path: pathH+'/change-password/:token', name: 'changePassword', component: ChangePassword },    
   ];

let router = new VueRouter({
    routes,
    mode: 'history',
});
router.beforeResolve((to, from, next) => {
  // If this isn't an initial page load.
  if (to.name) {
      // Start the route progress bar
      /* window.addEventListener("load", function(event) {
       }*/
      
  }
   next()
  
})

/*router.afterEach((to, from) => {
  // Complete the animation of the route progress bar.
  
})*/
router.beforeEach((to, from, next) => {
 
        if (localStorage.getItem('getLogin') == null) {
          if(to.matched.some(record => record.meta.requiresAuth)) {
            let getUrl =   router.options.routes.find(function(item){
              return item.name == 'getHome'
            })
            window.location.href=Vue.config.baseUrl;
          }else{
           next()
          }
        } else {
            let getStatusUser = 1;
              store.dispatch('Users/'+LOAD_USER_ACTION)
                .then((authUser) => {
                    let getError = store.state.Users.getError;
                    if(getError.status == 0){
                        getStatusUser = 0;
                    }
                });
           if(to.matched.some(record => record.meta.requiresAuth) && getStatusUser == 0) {
               let getUrl =   router.options.routes.find(function(item){return item.name == 'getHome'})
                window.location.href=Vue.config.baseUrl;
            } else {
                next();
            }
          
        }


})


export default router


