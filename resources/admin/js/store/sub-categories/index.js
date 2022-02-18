import mutations from './mutations'
import actions from './actions'
export default {
    namespaced: true,
    state: {
        getSubCategories:[],
        getSubCategory: {},
        getError:{},
        excelLink: ''
    },
    mutations: mutations,
    actions: actions,
}