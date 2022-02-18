import {
    PROCESS_CREATE_CUSTOMER,
    PROCESS_GET_CUSTOMERS,
    PROCESS_GET_SELLERS,
    PROCESS_GET_CUSTOMER_DETAIL,
    PROCESS_GET_CUSTOMER_REPORTS,

    PROCESS_EXCEL_DOWNLOAD_CUSTOMERS,
    PROCESS_EXCEL_DOWNLOAD_SELLERS,
    PROCESS_EXCEL_DOWNLOAD_CUSTOMERS_WITH_ORDERS_TOTAL,
    PROCESS_EXCEL_DOWNLOAD_CUSTOMERS_WITH_NUMBER_OF_ORDERS,
    PROCESS_EXCEL_DOWNLOAD_REGISTERED_CUSTOMERS
} from './mutations'
export const CREATE_CUSTOMER_ACTION = 'CREATE_CUSTOMER_ACTION';
export const GET_CUSTOMERS_ACTION = 'GET_CUSTOMERS_ACTION';
export const GET_SELLERS_ACTION = 'GET_SELLERS_ACTION';
export const GET_CUSTOMER_DETAIL_ACTION = 'GET_CUSTOMER_DETAIL_ACTION';
export const GET_CUSTOMER_REPORTS_ACTION = 'GET_CUSTOMER_REPORTS_ACTION';

export const EXCEL_DOWNLOAD_CUSTOMERS_ACTION = 'EXCEL_DOWNLOAD_CUSTOMERS_ACTION';
export const EXCEL_DOWNLOAD_SELLERS_ACTION = 'EXCEL_DOWNLOAD_SELLERS_ACTION';
export const EXCEL_DOWNLOAD_CUSTOMERS_WITH_ORDERS_TOTAL_ACTION = 'EXCEL_DOWNLOAD_CUSTOMERS_WITH_ORDERS_TOTAL_ACTION';
export const EXCEL_DOWNLOAD_CUSTOMERS_WITH_NUMBER_OF_ORDERS_ACTION = 'EXCEL_DOWNLOAD_CUSTOMERS_WITH_NUMBER_OF_ORDERS_ACTION';
export const EXCEL_DOWNLOAD_REGISTERED_CUSTOMERS_ACTION = 'EXCEL_DOWNLOAD_REGISTERED_CUSTOMERS_ACTION';

export default {
    [CREATE_CUSTOMER_ACTION] (context,params) {
        return new Promise((resolve, reject) => {
            axios.post(process.env.MIX_BASE_URL+'api/admin/create-customer', params).then((response) => {
                context.commit(PROCESS_CREATE_CUSTOMER, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                reject()
            })
        })
    },
    [GET_CUSTOMERS_ACTION] (context,params) {
        return new Promise((resolve, reject) => {
            axios.get(process.env.MIX_BASE_URL+'api/admin/get-users', params).then((response) => {
                context.commit(PROCESS_GET_CUSTOMERS, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                reject()
            })
        })
    },
    [GET_SELLERS_ACTION] (context,params) {
        return new Promise((resolve, reject) => {
            axios.get(process.env.MIX_BASE_URL+'api/admin/get-sellers', params).then((response) => {
                context.commit(PROCESS_GET_SELLERS, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                reject()
            })
        })
    },
    [GET_CUSTOMER_DETAIL_ACTION] (context,customer_id) {
        return new Promise((resolve, reject) => {
            axios.get(process.env.MIX_BASE_URL+'api/admin/get-user-detail/'+customer_id).then((response) => {
                context.commit(PROCESS_GET_CUSTOMER_DETAIL, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                reject()
            })
        })
    },
    [EXCEL_DOWNLOAD_CUSTOMERS_ACTION] (context,params) {
        return new Promise((resolve, reject) => {
            axios.get(process.env.MIX_BASE_URL+'api/admin/get-users', params).then((response) => {
                context.commit(PROCESS_EXCEL_DOWNLOAD_CUSTOMERS, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                reject()
            })
        })
    },
    [EXCEL_DOWNLOAD_SELLERS_ACTION] (context,params) {
        return new Promise((resolve, reject) => {
            axios.get(process.env.MIX_BASE_URL+'api/admin/get-sellers', params).then((response) => {
                context.commit(PROCESS_EXCEL_DOWNLOAD_SELLERS, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                reject()
            })
        })
    },
    [GET_CUSTOMER_REPORTS_ACTION] (context, params) {
        return new Promise((resolve, reject) => {
            axios.get(process.env.MIX_BASE_URL+'api/admin/get-customer-reports', params).then((response) => {
                context.commit(PROCESS_GET_CUSTOMER_REPORTS, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                reject()
            })
        }) 
    },
    [EXCEL_DOWNLOAD_CUSTOMERS_WITH_NUMBER_OF_ORDERS_ACTION] (context, params) {
        return new Promise((resolve, reject) => {
            axios.get(process.env.MIX_BASE_URL+'api/admin/get-customer-reports', params).then((response) => {
                context.commit(PROCESS_EXCEL_DOWNLOAD_CUSTOMERS_WITH_NUMBER_OF_ORDERS, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                reject()
            })
        }) 
    },
    [EXCEL_DOWNLOAD_CUSTOMERS_WITH_ORDERS_TOTAL_ACTION] (context, params) {
        return new Promise((resolve, reject) => {
            axios.get(process.env.MIX_BASE_URL+'api/admin/get-customer-reports', params).then((response) => {
                context.commit(PROCESS_EXCEL_DOWNLOAD_CUSTOMERS_WITH_ORDERS_TOTAL, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                reject()
            })
        }) 
    },
    [EXCEL_DOWNLOAD_REGISTERED_CUSTOMERS_ACTION] (context, params) {
        return new Promise((resolve, reject) => {
            axios.get(process.env.MIX_BASE_URL+'api/admin/get-customer-reports', params).then((response) => {
                context.commit(PROCESS_EXCEL_DOWNLOAD_REGISTERED_CUSTOMERS, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                reject()
            })
        }) 
    },
}