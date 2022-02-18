import Vue from 'vue'
import Vuex from 'vuex'
import Categories from '@web/store/navigation/categories/'
import SubCategories from '@web/store/navigation/sub-categories/'
import TraceLocation from '@web/store/customers/traceLocation/'
import Users from '@web/store/users/'
import Profiles from '@web/store/profiles/'
import Products from '@web/store/products/'
import Wishlists from '@web/store/wishlists/'
import Carts from '@web/store/carts/'
import Addresses from '@web/store/addresses/'
import PickupLocation from '@web/store/pickupLocations/'
import Shipping from '@web/store/shippings/'
import PlaceOrder from '@web/store/placeOrders/'
import OrderConfirm from '@web/store/orderConfirms/'
import Banner from '@web/store/banners/'
import Brand from '@web/store/brands/'
import Review from '@web/store/reviews/'
import Compare from '@web/store/compares/'
import Complaint from '@web/store/complaints/'
import Coupons from '@web/store/coupons/'
import Gifts from '@web/store/gifts/'
import Cms from '@web/store/cms/'
import Promotion from '@web/store/promotions/'
import OrderInvoice from '@web/store/orderInvoice/'
Vue.use(Vuex)
const store = new Vuex.Store({
    modules: {
    Compare,
     Categories,
     SubCategories,
     TraceLocation,
     Users,
     Profiles,
     Products,
     Wishlists,
     Carts,
     Addresses,
     PickupLocation,
     Shipping,
     PlaceOrder,
     OrderConfirm,
     Banner,
     Brand,
     Review,
     Complaint,
     Coupons,
     Gifts,
     Cms,
     Promotion,
     OrderInvoice
    },
})

export default store