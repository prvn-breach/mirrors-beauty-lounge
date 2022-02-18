import mutations from './mutations'
import actions from './actions'

export default {
    namespaced: true,
    state: {
        getCustomers: {},
        getCustomer: {},
        getSellers: {},
        getCustomerReports: {},
        excelLink: '',
        getErrors: {}
    },
    mutations: mutations,
    actions: actions,
}