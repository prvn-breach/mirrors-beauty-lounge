import mutations from './mutations'
import actions from './actions'
export default {
    namespaced: true,
    state: {
        getVendors:{},
        getVendor:{},
        getBrands: {},
        excelLink:'',
    },
    mutations: mutations,
    actions: actions,
}