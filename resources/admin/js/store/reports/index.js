import mutations from './mutations'
import actions from './actions'

export default {
    namespaced: true,
    state: {
        getSemExpense:{},
        getSemExpensesReport: {},
        getOrderStatusReport: {},
        getSemSalesReport: {},
        getProductInsertReport:{},
        getTopCategorySalesReport:{},
        getTopCustomerSalesReport:{},
        getProductVisitsReport:{},
        getProductSalesReport:{},
        getActiveCustomerLocations:{},
        getError:{},
        excelLink: '',
    },
    mutations: mutations,
    actions: actions,
}