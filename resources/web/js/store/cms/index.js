import mutations from './mutations'
import actions from './actions'

export default {
    namespaced: true,
    state: {
        getCMSPages: {},
        getCMSPage: {}
    },
    mutations: mutations,
    actions: actions,
}