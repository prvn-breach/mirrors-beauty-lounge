import mutations from './mutations'
import actions from './actions'
export default {
    namespaced: true,
    state: {
        getCountriesList:{}
    },
    mutations: mutations,
    actions: actions,
}