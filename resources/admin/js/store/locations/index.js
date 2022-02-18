import mutations from './mutations'
import actions from './actions'
export default {
    namespaced: true,
    state: {
        getLocations:{},
        getDeletedLocations: {},
        getLocation: {},
        excelLink: ''
    },
    mutations: mutations,
    actions: actions,
}