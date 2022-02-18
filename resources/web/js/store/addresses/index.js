import mutations from './mutations'
import actions from './actions'
export default {
    namespaced: true,
    state: {
        getAddresses: [],
        getAddress:{}
        
       
    },
    mutations: mutations,
    actions: actions,
}