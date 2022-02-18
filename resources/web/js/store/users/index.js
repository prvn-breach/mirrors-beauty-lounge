import mutations from './mutations'
import actions from './actions'
export default {
    namespaced: true,
    state: {
        getUser:{},
        getError:{},
        getSubscriberEmail: {},
        getSubscribeError: '',
        response: {},
        getResetPasswordToken: []
    },
    mutations: mutations,
    actions: actions,
}