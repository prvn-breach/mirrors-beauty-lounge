import Vue from 'vue'
import { LOAD_TRACE_LIST_ACTION } from '@web/store/customers/traceLocation/actions'
import { LOAD_WISH_LIST_ACTION } from '@web/store/wishlists/actions'
import { LOAD_CART_LIST_ACTION } from '@web/store/carts/actions'
import { LOAD_VAT_ACTION } from '@web/store/products/actions'
import { GET_SHIPPING_LIST_ACTION } from '@web/store/shippings/actions'
import router from '@web/router'
import { mapState } from 'vuex'
 export default {
           data() {
            return {
              baseUrl:Vue.config.baseurl,
              baseUrlImage:Vue.config.baseUrlImage,
            }
        },
          isMobile() {
           if(/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
             return true
           } else {
             return false
           }
         },
        addObject:function(object, key, value) {
            var res = {};
            var textObject = JSON.stringify(object);
            if (textObject === '{}') {
                res = JSON.parse('{"' + key + '":"' + value + '"}');
            } else {
                res = JSON.parse('{' + textObject.substring(1, textObject.length - 1) + ',"' + key + '":"' + value + '"}');
            }
            return res;
        },
        getLang:function(){
          return router.currentRoute.params.country_leng;
        },
        getCurrentRoute:function(){
          return router.currentRoute;
        },
        getShippingsStatus:function(status){
             return [
              {status:'N',name:'Place Order',width:0},
              {status:'V',name:'Confirmed',width:0},
              {status:'S',name:'Shipped',width:0},
              {status:'D',name:'Delivered',width:0},
              {status:'C',name:'Cancelled',width:0},
              {status:'R',name:'Returned',width:0}
             
              ];
              
            },
       getOrderStatus:function(status){
              return [
                {status:'N',name:'Place Order'},
                {status:'V',name:'Confirmed'},
                {status:'S',name:'Shipped'},
                {status:'D',name:'Delivered'},
                {status:'C',name:'Cancelled'},
                {status:'R',name:'Returned'}
              ];
             
            },
          generateArrayOfYears:function() {
            var max = new Date().getFullYear()
            var min = max - 9
            var years = []

            for (var i = max; i >= min; i--) {
              years.push(i)
            }
            return years
          },
          getOrderItemStatus:function(status){
            let _this = this;
           return [{'P':'Processing'},
           {'R':'Returned'},
           {'C':'Cancelled'},
           {'D':'Delivered'}];
          },
          getPaymentMode:function(payment_mode){
            let _this = this;
            switch(payment_mode){
              case 'cash':
                return 'Cash on delivery';
              break;
              case 'card':
                return 'Payment by card';
              break;

            }
          },
           getShippingStatus:function(status){
              switch(status){
                case 'N':
                  return 'Place Order';
                break;
                case 'V':
                  return 'Confirmed';
                break;
                case 'S':
                  return 'Shipped';
                break;
                case 'D':
                  return 'Delivered';
                break;
                case 'R':
                  return 'Returned';
                break;
                case 'C':
                  return 'Cancelled';
                break;
                

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
          getSession:function(){
            let _this = this;
            let getSession = localStorage.getItem('session_id');
            if( getSession != undefined && getSession != null ){
                return getSession;
            }
            return null;
          },
          getImage:function(product){
            if(product.get_product_images.length > 0){
              let getImage = product.get_product_images.filter(function(item){
                return item.priority == 'P';
              })[0];
              return getImage.image;
            }
          },
        
      }
