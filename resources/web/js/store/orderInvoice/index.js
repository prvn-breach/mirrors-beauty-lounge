import mutations from './mutations'
import actions from './actions'
export default {
    namespaced: true,
    state: {
        path: ''
    },
    mutations: mutations,
    actions: actions,
}