import mutations from './mutations'
import actions from './actions'
export default {
    namespaced: true,
    state: {
        response:{},
        excelLink: ''
    },
    mutations: mutations,
    actions: actions,
}