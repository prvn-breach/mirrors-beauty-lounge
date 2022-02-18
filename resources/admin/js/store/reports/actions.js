import {
    PROCESS_SEM_SALE_REPORT,
    PROCESS_SEM_EXPENSES_REPORT,
    PROCESS_ADD_SEM_EXPENSE,
    PROCESS_PRODUCT_INSERT_REPORT,
    PROCESS_TOP_CATEGORY_SALES_REPORT,
    PROCESS_TOP_CUSTOMER_SALES_REPORT,
    PROCESS_PRODUCT_VISITS_REPORT,
    PROCESS_PRODUCT_SALE_COST_REPORT,
    PROCESS_ACTIVE_CUSTOMER_LOCATIONS,
    PROCESS_ORDER_STATUS_REPORT,

    PROCESS_EXCEL_DOWNLOAD_PRODUCT_INSERT_REPORT,
    PROCESS_EXCEL_DOWNLOAD_SEM_SALE_REPORT,
    PROCESS_EXCEL_DOWNLOAD_PRODUCT_VISITS_REPORT,
    PROCESS_EXCEL_DOWNLOAD_PRODUCT_SALE_COST_REPORT,
    PROCESS_EXCEL_DOWNLOAD_CATEGORY_SALE_COST_REPORT,
    PROCESS_EXCEL_DOWNLOAD_ORDER_STATUS_REPORT,
    PROCESS_EXCEL_DOWNLOAD_CUSTOMER_SALES_REPORT,
    PROCESS_EXCEL_DOWNLOAD_ACTIVE_CUSTOMER_LOCATIONS_REPORT
} from './mutations'
export const GET_SEM_SALE_REPORT_ACTION = 'GET_SEM_SALE_REPORT_ACTION';
export const GET_SEM_EXPENSES_REPORT_ACTION = 'GET_SEM_EXPENSES_REPORT_ACTION';
export const ADD_SEM_EXPENSE_ACTION = 'ADD_SEM_EXPENSE_ACTION';
export const GET_PRODUCT_INSERT_REPORT_ACTION = 'GET_PRODUCT_INSERT_REPORT_ACTION';
export const GET_TOP_CATEGORY_SALES_REPORT_ACTION = 'GET_TOP_CATEGORY_SALES_REPORT_ACTION';
export const GET_TOP_CUSTOMER_SALES_REPORT_ACTION = 'GET_TOP_CUSTOMER_SALES_REPORT_ACTION';
export const GET_PRODUCT_VISITS_REPORT_ACTION = 'GET_PRODUCT_VISITS_REPORT_ACTION';
export const GET_PRODUCTS_SALE_COST_REPORT_ACTION = 'GET_PRODUCTS_SALE_COST_REPORT_ACTION';
export const GET_ACTIVE_CUSTOMER_LOCATIONS_ACTION = 'GET_ACTIVE_CUSTOMER_LOCATIONS_ACTION';
export const GET_ORDER_STATUS_REPORT_ACTION = 'GET_ORDER_STATUS_REPORT_ACTION';

export const EXCEL_DOWNLOAD_PRODUCT_INSERT_REPORT_ACTION = 'EXCEL_DOWNLOAD_PRODUCT_INSERT_REPORT_ACTION';
export const EXCEL_DOWNLOAD_SEM_SALE_REPORT_ACTION = 'EXCEL_DOWNLOAD_SEM_SALE_REPORT_ACTION';
export const EXCEL_DOWNLOAD_PRODUCT_VISITS_REPORT_ACTION = 'EXCEL_DOWNLOAD_PRODUCT_VISITS_REPORT_ACTION';
export const EXCEL_DOWNLOAD_PRODUCT_SALE_COST_REPORT_ACTION = 'EXCEL_DOWNLOAD_PRODUCT_SALE_COST_REPORT_ACTION';
export const EXCEL_DOWNLOAD_CATEGORY_SALE_COST_REPORT_ACTION = 'EXCEL_DOWNLOAD_CATEGORY_SALE_COST_REPORT_ACTION';
export const EXCEL_DOWNLOAD_ORDER_STATUS_REPORT_ACTION = 'EXCEL_DOWNLOAD_ORDER_STATUS_REPORT_ACTION';
export const EXCEL_DOWNLOAD_CUSTOMER_SALES_REPORT_ACTION = 'EXCEL_DOWNLOAD_CUSTOMER_SALES_REPORT_ACTION';
export const EXCEL_DOWNLOAD_ACTIVE_CUSTOMER_LOCATIONS_REPORT_ACTION = 'EXCEL_DOWNLOAD_ACTIVE_CUSTOMER_LOCATIONS_REPORT_ACTION';
export default {
    [GET_SEM_SALE_REPORT_ACTION] (context,params) {
        return new Promise((resolve, reject) => {
            axios.post(process.env.MIX_BASE_URL+'api/admin/get-sem-expenses-report',params).then((response) => {
                context.commit(PROCESS_SEM_SALE_REPORT, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                reject()
            })
        })
    },
    [EXCEL_DOWNLOAD_SEM_SALE_REPORT_ACTION] (context,params) {
        return new Promise((resolve, reject) => {
            axios.post(process.env.MIX_BASE_URL+'api/admin/get-sem-expenses-report',params).then((response) => {
                context.commit(PROCESS_EXCEL_DOWNLOAD_SEM_SALE_REPORT, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                reject()
            })
        })
    },
    [GET_SEM_EXPENSES_REPORT_ACTION] (context,params) {
        return new Promise((resolve, reject) => {
            axios.post(process.env.MIX_BASE_URL+'api/admin/get-sem-expenses-report',params).then((response) => {
                context.commit(PROCESS_SEM_EXPENSES_REPORT, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                reject()
            })
        })
    },
    [ADD_SEM_EXPENSE_ACTION] (context,params) {
        return new Promise((resolve, reject) => {
            axios.post(process.env.MIX_BASE_URL+'api/admin/add-sem-expense',params).then((response) => {
                context.commit(PROCESS_ADD_SEM_EXPENSE, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                reject()
            })
        })
    },
    [GET_PRODUCT_INSERT_REPORT_ACTION] (context,params) {
        return new Promise((resolve, reject) => {
            axios.get(process.env.MIX_BASE_URL+'api/admin/get-product-insert-report',params).then((response) => {
                context.commit(PROCESS_PRODUCT_INSERT_REPORT, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                reject()
            })
        })
    },
    [EXCEL_DOWNLOAD_PRODUCT_INSERT_REPORT_ACTION] (context,params) {
        return new Promise((resolve, reject) => {
            axios.post(process.env.MIX_BASE_URL+'api/admin/get-product-insert-report',params).then((response) => {
                context.commit(PROCESS_EXCEL_DOWNLOAD_PRODUCT_INSERT_REPORT, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                reject()
            })
        })
    },
    [GET_TOP_CATEGORY_SALES_REPORT_ACTION] (context,params) {
        return new Promise((resolve, reject) => {
            axios.get(process.env.MIX_BASE_URL+'api/admin/get-category-sales',params).then((response) => {
                context.commit(PROCESS_TOP_CATEGORY_SALES_REPORT, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                reject()
            })
        })
    },
    [EXCEL_DOWNLOAD_CATEGORY_SALE_COST_REPORT_ACTION] (context,params) {
        return new Promise((resolve, reject) => {
            axios.post(process.env.MIX_BASE_URL+'api/admin/get-category-sales',params).then((response) => {
                context.commit(PROCESS_EXCEL_DOWNLOAD_CATEGORY_SALE_COST_REPORT, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                reject()
            })
        })
    },
    [GET_TOP_CUSTOMER_SALES_REPORT_ACTION] (context,params) {
        return new Promise((resolve, reject) => {
            axios.get(process.env.MIX_BASE_URL+'api/admin/get-top-customers-sales',params).then((response) => {
                context.commit(PROCESS_TOP_CUSTOMER_SALES_REPORT, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                reject()
            })
        })
    },
    [EXCEL_DOWNLOAD_CUSTOMER_SALES_REPORT_ACTION] (context,params) {
        return new Promise((resolve, reject) => {
            axios.post(process.env.MIX_BASE_URL+'api/admin/get-top-customers-sales',params).then((response) => {
                context.commit(PROCESS_EXCEL_DOWNLOAD_CUSTOMER_SALES_REPORT, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                reject()
            })
        })
    },
    [GET_PRODUCT_VISITS_REPORT_ACTION] (context,params) {
        return new Promise((resolve, reject) => {
            axios.get(process.env.MIX_BASE_URL+'api/admin/get-product-vists',params).then((response) => {
                context.commit(PROCESS_PRODUCT_VISITS_REPORT, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                reject()
            })
        })
    },
    [EXCEL_DOWNLOAD_PRODUCT_VISITS_REPORT_ACTION] (context,params) {
        return new Promise((resolve, reject) => {
            axios.get(process.env.MIX_BASE_URL+'api/admin/get-product-vists',params).then((response) => {
                context.commit(PROCESS_EXCEL_DOWNLOAD_PRODUCT_VISITS_REPORT, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                reject()
            })
        })
    },
    [GET_PRODUCTS_SALE_COST_REPORT_ACTION] (context,params) {
        return new Promise((resolve, reject) => {
            axios.get(process.env.MIX_BASE_URL+'api/admin/get-product-sale-cost',params).then((response) => {
                context.commit(PROCESS_PRODUCT_SALE_COST_REPORT, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                reject()
            })
        })
    },
    [EXCEL_DOWNLOAD_PRODUCT_SALE_COST_REPORT_ACTION] (context,params) {
        return new Promise((resolve, reject) => {
            axios.post(process.env.MIX_BASE_URL+'api/admin/get-product-sale-cost',params).then((response) => {
                context.commit(PROCESS_EXCEL_DOWNLOAD_PRODUCT_SALE_COST_REPORT, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                reject()
            })
        })
    },
    [GET_ACTIVE_CUSTOMER_LOCATIONS_ACTION] (context,params) {
        return new Promise((resolve, reject) => {
            axios.get(process.env.MIX_BASE_URL+'api/admin/get-active-customer-locations',params).then((response) => {
                context.commit(PROCESS_ACTIVE_CUSTOMER_LOCATIONS, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                reject()
            })
        })
    },
    [EXCEL_DOWNLOAD_ACTIVE_CUSTOMER_LOCATIONS_REPORT_ACTION] (context,params) {
        return new Promise((resolve, reject) => {
            axios.get(process.env.MIX_BASE_URL+'api/admin/get-active-customer-locations',params).then((response) => {
                context.commit(PROCESS_EXCEL_DOWNLOAD_ACTIVE_CUSTOMER_LOCATIONS_REPORT, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                reject()
            })
        })
    },
    [GET_ORDER_STATUS_REPORT_ACTION] (context,params) {
        return new Promise((resolve, reject) => {
            axios.get(process.env.MIX_BASE_URL+'api/admin/get-order-status-report',params).then((response) => {
                context.commit(PROCESS_ORDER_STATUS_REPORT, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                reject()
            })
        })
    },
    [EXCEL_DOWNLOAD_ORDER_STATUS_REPORT_ACTION] (context,params) {
        return new Promise((resolve, reject) => {
            axios.get(process.env.MIX_BASE_URL+'api/admin/get-order-status-report',params).then((response) => {
                context.commit(PROCESS_EXCEL_DOWNLOAD_ORDER_STATUS_REPORT, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                reject()
            })
        })
    }
}