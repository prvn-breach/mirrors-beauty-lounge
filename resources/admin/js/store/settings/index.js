import mutations from './mutations'
import actions from './actions'
export default {
    namespaced: true,
    state: {
        getStoreDetails:{},
        getWarehouseAddress:{}
    },
    mutations: mutations,
    actions: actions,
}