import mutations from './mutations'
import actions from './actions'
export default {
    namespaced: true,
    state: {
        getUser:{},
        getError:{},
    },
    mutations: mutations,
    actions: actions,
}