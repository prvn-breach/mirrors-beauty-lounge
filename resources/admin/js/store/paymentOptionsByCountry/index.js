import mutations from './mutations'
import actions from './actions'
export default {
    namespaced: true,
    state: {
        getPaymentOptionsByCountry:{},
        getPaymentOptionByCountry:{},
        excelLink:''
    },
    mutations: mutations,
    actions: actions,
}