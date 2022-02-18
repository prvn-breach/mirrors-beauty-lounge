import Vue from 'vue'
import Vuex from 'vuex'
Vue.use(Vuex)
import getBrand from '@admin/store/brands/'
import getCategory from '@admin/store/categories/'
import getSubCategory from '@admin/store/sub-categories/'
import Users from '@admin/store/users/'
import getProduct from '@admin/store/products/'
import getOrder from '@admin/store/orders/'
import getCustomer from '@admin/store/customers/'
import getCoupon from '@admin/store/coupons/'
import getLocation from '@admin/store/locations/'
import getVendor from '@admin/store/vendors/'
import getCampaign from '@admin/store/campaigns/'
import getNewsLetter from '@admin/store/newsletters/'
import getGift from '@admin/store/gifts/'
import getPromotion from '@admin/store/promotions/'
import getReport from '@admin/store/reports/'
import getDesign from '@admin/store/design/'
import getImport from '@admin/store/imports/'
import getExport from '@admin/store/exports/'
import getCountry from '@admin/store/countries/'
import getPaymentOptionsByCountry from '@admin/store/paymentOptionsByCountry/'
import settings from '@admin/store/settings/'
const store = new Vuex.Store({
    modules: {
    	getBrand,
    	getCategory,
    	getSubCategory,
    	Users,
    	getProduct,
    	getOrder,
		getCustomer,
		getCoupon,
		getLocation,
		getVendor,
		getCampaign,
		getNewsLetter,
		getGift,
		getPromotion,
		getReport,
		getDesign,
		getImport,
		getExport,
		getCountry,
		getPaymentOptionsByCountry,
		settings
    },
})
export default store