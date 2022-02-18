import mutations from './mutations'
import actions from './actions'

export default {
    namespaced: true,
    state: {
        getOrdersCount:{},
        getOrders: {},
        getOrder: {},
        getCarts: {},
        getWishlists: {},
        getBestSellerProducts: {},
        getProductsNeverPurchase: {},
        getCountryReport:{},
        getErrors: {},
        excelLink: ''
    },
    mutations: mutations,
    actions: actions,
}