import mutations from './mutations'
import actions from './actions'
export default {
    namespaced: true,
    state: {
        getEmailCampaigns: {},
        getEmailCampaign: {},
        excelLink: '',
        getError:{},
    },
    mutations: mutations,
    actions: actions,
}