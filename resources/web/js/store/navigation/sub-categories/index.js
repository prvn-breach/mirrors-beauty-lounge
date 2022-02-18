import mutations from './mutations'
import actions from './actions'
export default {
    namespaced: true,
    state: {
        getSubCategories:[],
        getSubCategory: {},
        getError:{}
    },
    mutations: mutations,
    actions: actions,
}