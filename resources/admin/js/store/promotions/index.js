import mutations from './mutations'
import actions from './actions'
export default {
    namespaced: true,
    state: {
        getPromotions:{},
        getPromotion:{},
        getError: {},
        excelLink: ''
    },
    mutations: mutations,
    actions: actions,
}