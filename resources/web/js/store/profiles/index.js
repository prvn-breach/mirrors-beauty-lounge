import mutations from './mutations'
import actions from './actions'
export default {
    namespaced: true,
    state: {
        getUser:{},
        getError:{},
        getUploadError:{}
    },
    mutations: mutations,
    actions: actions,
}