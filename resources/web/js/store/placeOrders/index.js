import mutations from './mutations'
import actions from './actions'
export default {
    namespaced: true,
    state: {
    	saveOrderResponse:{}
    },
    mutations: mutations,
    actions: actions,
}