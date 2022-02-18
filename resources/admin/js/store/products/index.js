import mutations from './mutations'
import actions from './actions'

export default {
    namespaced: true,
    state: {
        getSelectCategories:[],
        getError:{},
        getAttributes:[],
        getBrands:[],
        getProducts:{},
        getProduct:{},
        getStockTransferRecords: {},
        getStockTransferRecord: {},
        getProductReviews: {},
        getProductReview: {},
        excelLink: '',
    },
    mutations: mutations,
    actions: actions,
}