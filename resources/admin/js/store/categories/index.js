import mutations from './mutations'
import actions from './actions'
export default {
    namespaced: true,
    state: {
        getCategories: [],
        getSelectCategories:[],
        getSubCategories:[],
        getCategory: {},
        getError:{},
        excelLink: ''
    },
    mutations: mutations,
    actions: actions,
}