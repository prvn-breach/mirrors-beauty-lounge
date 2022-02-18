import mutations from './mutations'
import actions from './actions'
export default {
    namespaced: true,
    state: {
        getCategories: [],
        getCategory: {},
     
        
    },
    mutations: mutations,
    actions: actions,
}