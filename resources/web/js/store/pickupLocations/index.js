import mutations from './mutations'
import actions from './actions'
export default {
    namespaced: true,
    state: {
        getPickupLocations: [],
        getPickupLocation:{}
        
       
    },
    mutations: mutations,
    actions: actions,
}