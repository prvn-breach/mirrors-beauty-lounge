<template>

    <div id="app">
        <template v-if="in_array(currentUrl,getArrayOfUrl)">
            <div class="dv_wrapper">
            <CheckoutHeader></CheckoutHeader>

           <router-view :getCartItems="getCartItems" :getCarts="getCarts" @get-change-cart="getCart" :getTotal="getTotal"  :getShipping="getShipping" :getWishlist="getWishlistData"></router-view>
            <CheckoutFooter :getCartItems="getCartItems" :getCarts="getCarts" @get-change-cart="getCart" :getTotal="getTotal"  :getShipping="getShipping" :getWishlist="getWishlistData"></CheckoutFooter>
            </div>
        </template>
        <template v-else-if="in_array(currentUrl,getArrayOfUrlSeller)">

            <div class="dv_checkout_wrapper">
                 <SellerHeader ></SellerHeader>
           <router-view ></router-view>
            <SellerFooter ></SellerFooter>
            </div>
        </template>
        <template v-else-if="currentUrl.match('seller') || currentUrl.match('change-password') || currentUrl.match('get-search')">
            <router-view></router-view>
        </template>
        <template v-else>
            <div class="dv_wrapper">

           <top :getWishlist="getWishlistData" :getCartItems="getCartItems" ></top>
           <router-view 
           @get-change-wishlist="getWishList" 
           @get-change-cart="getCart" 
           :getCarts="getCarts"
           :getWishlistData="getWishlistData" 
           :getCartItems="getCartItems" 
           :getVat="getVat"
           :getShipping="getShipping"
           ></router-view>
            <foot ></foot>
            </div>
        </template>
    	 <loader v-show="getLoaderStatus"></loader>
       <compare ></compare>

        <!-- Loader -->
        <div class="modal fade bd-example-modal-lg" id="loaderModal" data-backdrop="static" data-keyboard="false" tabindex="-1">
            <div class="modal-dialog modal-sm">
                <div class="modal-content" style="width: 48px">
                    <div class="spinner-border text-white" style="width: 3rem; height: 3rem;" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    import Vue from 'vue'
    import router from '@web/router'
    import top from './include/Header'
    import foot from './include/Footer'
    import CheckoutHeader from './include/CheckoutHeader'
    import CheckoutFooter from './include/CheckoutFooter'
    import SellerFooter from './include/SellerFooter'
    import SellerHeader from './include/SellerHeader'
    import { LOAD_TRACE_LIST_ACTION } from '@web/store/customers/traceLocation/actions'
    import { LOAD_WISH_LIST_ACTION } from '@web/store/wishlists/actions'
    import { LOAD_CART_LIST_ACTION } from '@web/store/carts/actions'
     import { LOAD_VAT_ACTION } from '@web/store/products/actions'
     import Loader from '@web/components/Loader'
     import Compare from '@web/components/products/Compare'
     import { GET_SHIPPING_LIST_ACTION } from '@web/store/shippings/actions'
    import { mapState } from 'vuex'
    import EventBus from '@web/event/bus'
    import Vuex from 'vuex';
  
    export default {
        
        components: {
            Loader,
            top,
            foot,
            CheckoutHeader,
            CheckoutFooter,
            SellerFooter,
            SellerHeader,
            Compare
        },
         data() {
            return {
              baseUrl:Vue.config.baseUrl,
              baseUrlImage:Vue.config.baseUrlImage,
              currentUrl:'',
              getArrayOfUrl:[],
              getArrayOfUrlSeller:[],
              getCartItems:[],
              getWishlistData:[],
              getTotal:{},
              getVatData:{},
              getShippingData:{},
              getLoaderStatus:false
            }
        },
        computed:{
            ...mapState({
              getWishLists: state => state.Wishlists.getWishLists,
              getCarts: state => state.Carts.getCarts,
              getVat: state => state.Products.getVat,
              getShipping: state => state.Shipping.getShipping

          }),
          },
          
        methods: {
                getLoader:function(){
                  let _this = this;
                  this.getLoaderStatus=true;
                  setTimeout(function() {
                   _this.getLoaderStatus=false;
                   
                  }, 3000);
                },
                
                getCalcCart:function(){
                  let _this = this;
                  
                  if(_this.getCartItems.length > 0){
                     let originalTotal = _this.getCartItems.reduce(function (sum, obj) { return sum + obj.original_price*obj.quantity; }, 0);
                    let subTotal = _this.getCartItems.reduce(function (sum, obj) { return sum + obj.price*obj.quantity; }, 0);
                    let getDifferencePrice = (originalTotal-subTotal);
                    let discount  = 0;
                    if(getDifferencePrice > 0){
                       discount =  ((getDifferencePrice/originalTotal)*100).toFixed(2);
                    }

                    let vat = _this.getCartItems.reduce(function (sum, obj) { return sum + obj.vat; }, 0);
                    let shippingChange = ((subTotal > 200)? 0.00 :_this.getShippingData.amount );
                    if (this.getCarts.get_cart_pickup_location) {
                        shippingChange = 0;
                    }
                      _this.getTotal = {
                        subTotal:subTotal,
                        vat:vat,
                        discount:discount,
                        original_price:originalTotal,
                        difference_price:getDifferencePrice,
                        vatName:_this.getVatData.name,
                        shippingCharge:shippingChange,
                        deliveryChange:0.00,
                        total:(subTotal+vat+shippingChange)

                      };
                    
                    // Apply Coupon in Total
					if (this.getCarts.coupon_id) {
						let coupon = this.getCarts.get_coupon;
						if (!eval(coupon['condition_amount']+coupon['coupon_condition']+this.getTotal.subTotal)) {
							this.updateCart({ cart_id: this.getCarts['id'], coupon_id: null });
							return;
						}
						_this.getTotal.coupon_code = coupon.code;
						if (coupon.discount_type == 'FIXED_PRICE_BASED') {
							_this.getTotal.coupon_discount_amount = coupon.discount;
						} else if (coupon.discount_type == 'PERCENTAGE_BASED') {
							_this.getTotal.coupon_discount_amount = (coupon.discount * _this.getTotal.total / 100);
						}
						_this.getTotal.total = _this.getTotal.total - _this.getTotal.coupon_discount_amount;
					}

					// Apply Voucher in Total
					if (this.getCarts.gift_certificate_id) {
						let gift = this.getCarts.get_gift_certificate;
						if (!eval(gift['condition_amount']+gift['logic']+this.getTotal.subTotal)) {
							this.updateCart({ cart_id: this.getCarts['id'], gift_certificate_id: null });
							return;
						}
						_this.getTotal.gift_code = gift.certificate_code;
						if (gift.certificate_discount_type == 'FIXED_PRICE_BASED') {
							_this.getTotal.gift_discount_amount = gift.discount;
						} else if (gift.certificate_discount_type == 'PERCENTAGE_BASED') {
							_this.getTotal.gift_discount_amount = (gift.discount * _this.getTotal.total / 100);
						}
						_this.getTotal.total = _this.getTotal.total - _this.getTotal.gift_discount_amount;
					}
                   
                  }else{
                    _this.getTotal = {
                      subTotal:0.00,
                      vat:0.00,
                      vatName:0.00,
                      shippingCharge:0.00,
                      deliveryChange:0.00,
                      total:0.00

                    };
                  }
                  
                },

                getUrlArray:function(){
                    this.getArrayOfUrl =  [
                    'get-address-checkout',
                    'get-store-pickup',
                    'get-checkout-shipping',
                    'get-checkout-payment'
                    ];
                },
                getSellerUrlArray:function(){
                    this.getArrayOfUrlSeller =  [
                    'get-seller-account',
                    'get-seller-store',
                    'get-seller-confirmation'
                    ];
                },
              in_array:function (needle, haystack) {
                    for(var i in haystack) {
                        if(haystack[i] == needle) return true;
                    }
                    return false;
                },
            getUrlNamge:function(){
                 let _this = this;
                    var currentUrl = window.location.pathname;
                    if(currentUrl != ''){
                        currentUrl = currentUrl.split('/');
                        if(currentUrl.length > 0){
                            currentUrl = currentUrl[currentUrl.length - 2];

                        }
                        if(currentUrl != ''){
                            _this.currentUrl = currentUrl;
                        }
                    }

            },
            getTraceLocation:function(){
              let _this = this;
                this.$store.dispatch('TraceLocation/' + LOAD_TRACE_LIST_ACTION).then(function(){
                   _this.getSetUrl();
                });
              
            },
            getSetUrl:function(){
                let _this = this;
                let getLocalo = JSON.parse(localStorage.getItem('locale'));
                let getCountries = JSON.parse(localStorage.countries);
                let getCountry = getCountries.get_countries.find(function(item){
                    return item.active == 1;
                });
                let route = this.$route;
                let path = route.path;
                let name = route.name;
                let params= route.params;
                if(params.country_leng == undefined){
                  
                  router.replace({
                    ...router.currentRoute,
                    params: {
                      country_leng: getCountry.code.toLowerCase()+'-'+getLocalo.code || undefined,
                    }
                  }).catch(err => {
                    // Ignore the vuex err regarding  navigating to the page they are already on.
                    if (
                      err.name !== 'NavigationDuplicated' &&
                      !err.message.includes('Avoided redundant navigation to current location')
                    ) {
                      // But print any other errors to the console
                      logError(err);
                    }
                  });
                }
            },
            isEmpty:function(obj) {
              for(var prop in obj) {
                if(obj.hasOwnProperty(prop)) {
                  return false;
                }
              }
              return JSON.stringify(obj) === JSON.stringify({});
            },
            getWishList:function(){
              let _this = this;
              if(!_this.isEmpty(_this.$user) && (_this.$getWishLists == undefined || _this.$getWishLists == 0)){
              let user_id = _this.$user.id;
                      _this.$store.dispatch('Wishlists/' + LOAD_WISH_LIST_ACTION,user_id).then(function(){
                        _this.getWishlistData = _this.getWishLists;
                      });
            }
            },

            getCart:function(){
              let _this = this;
              let getSession = this.getSession();
              if(getSession != null){
                  _this.$store.dispatch('Carts/' + LOAD_CART_LIST_ACTION,getSession).then(function(){

                    if(_this.getCarts != null){
                        _this.getCartItems = _this.getCarts.get_cart_items;
                        _this.getCalcCart();
                    }
                      });
              }

            },
            getVatFunc:function(){
              let _this = this;
              _this.$store.dispatch('Products/' + LOAD_VAT_ACTION).then(function(){   
                  _this.getVatData = _this.getVat;
                 });
            },
            getSession:function(){
            let _this = this;
            let getSession = localStorage.getItem('session_id');
            if( getSession != undefined && getSession != null ){
               return getSession;
            }
            return null;
          },
          getShippingFunc:function(){
            let _this = this;
             _this.$store.dispatch('Shipping/' + GET_SHIPPING_LIST_ACTION).then(function(){
                _this.getShippingData=_this.getShipping;
                _this.getCalcCart();
             });
          },        
         },
          watch: {
            '$route': function(to, from) {
                 let route = this.$route;
                if(!route.params.hasOwnProperty('country_leng')){
                  if (localStorage.getItem('locale')) {
                let getLocalo = JSON.parse(localStorage.getItem('locale'));
                 this.$lang.setLocale(getLocalo.code);
                } else {
                      this.$lang.setLocale('en');
                }
                this.getSetUrl();
                }
             this.getWishList();
             this.getCart();
             this.getCalcCart();
             this.getShippingFunc();
             this.getLoader();
            },

          },
   
        created: function(){
          this.getLoaderStatus=true;
             this.getTraceLocation();
              this.getUrlNamge();
               this.getUrlArray();
               this.getSellerUrlArray();
               this.getWishList();
               this.getCart();
               this.getVatFunc();
               
               this.getShippingFunc();
      },
      mounted:function(){
        let _this = this;
        this.getLoader();
        
          
         
      }
    }
</script>
