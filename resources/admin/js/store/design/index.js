import mutations from './mutations'
import actions from './actions'

export default {
    namespaced: true,
    state: {
        getCMSPages: {},
        getCMSPage: {},
        getBanners: {},
        getHomePageBanners: {},
        getHomePageBanner: {}
    },
    mutations: mutations,
    actions: actions,
}