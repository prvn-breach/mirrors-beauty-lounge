import mutations from './mutations'
import actions from './actions'
export default {
    namespaced: true,
    state: {
        getGiftCertificates:{},
        getGiftCertificate:{},
        excelLink: ''
    },
    mutations: mutations,
    actions: actions,
}