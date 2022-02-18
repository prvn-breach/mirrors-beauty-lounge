import mutations from './mutations'
import actions from './actions'
export default {
    namespaced: true,
    state: {
        getProducts: {},
        getFilters:{},
        getProduct:{},
        getVat:{},
        getProductDeals:{},
        getCategoryByProducts:[],
        getSubCategoryByProducts:[],
        excelLink: ''
    },
    mutations: mutations,
    actions: actions,
}