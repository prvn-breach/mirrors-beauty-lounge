import mutations from './mutations'
import actions from './actions'
export default {
    namespaced: true,
    state: {
        getGiftCertificates:{},
        getGiftCertificate:{}
    },
    mutations: mutations,
    actions: actions,
}