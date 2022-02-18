import mutations from './mutations'
import actions from './actions'
export default {
    namespaced: true,
    state: {
        getBrands:{},
        getBrand:{},
        getError:{},
        excelLink: ''
    },
    mutations: mutations,
    actions: actions,
}