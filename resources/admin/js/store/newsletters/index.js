import mutations from './mutations'
import actions from './actions'
export default {
    namespaced: true,
    state: {
        getNewsLetters:{},
        excelLink: ''
    },
    mutations: mutations,
    actions: actions,
}