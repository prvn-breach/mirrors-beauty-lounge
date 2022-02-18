import mutations from './mutations'
import actions from './actions'

export default {
    namespaced: true,
    state: {
        getCoupons: {},
        getCoupon: {},
        excelLink: ''
    },
    mutations: mutations,
    actions: actions,
}