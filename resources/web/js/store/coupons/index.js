import mutations from './mutations'
import actions from './actions'

export default {
    namespaced: true,
    state: {
        getCoupons: {},
        getCoupon: {},
        getError: ''
    },
    mutations: mutations,
    actions: actions,
}