import mutations from './mutations'
import actions from './actions'
export default {
    namespaced: true,
    state: {
        getBrands: [],
    },
    mutations: mutations,
    actions: actions,
}