import mutations from './mutations'
import actions from './actions'
export default {
    namespaced: true,
    state: {
    	getOrder:{},
    	getOrderByUser:{}
    },
    mutations: mutations,
    actions: actions,
}