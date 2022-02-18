import { 
    PROCESS_ORDERS_COUNT,
    PROCESS_GET_ORDER, 
    PROCESS_ADD_ORDER,
    PROCESS_GET_ORDERS_LIST,
    PROCESS_UPDATE_ORDER_STATUS,
    PROCESS_ADD_ORDER_FOLLOW_UP, 
    PROCESS_GET_INCOMPLETE_ORDERS_LIST, 
    PROCESS_GET_COMPLAINTS,
    PROCESS_CREATE_COMPLAINT_DETAIL,
    PROCESS_GET_CURRENT_CARTS,
    PROCESS_GET_CURRENT_WISHLISTS,
    PROCESS_GET_BEST_SELLER_PRODUCTS,
    PROCESS_GET_NEVER_PURCHASED_PRODUCTS,
    PROCESS_GET_COUNTRY_REPORT,
    
    PROCESS_EXCEL_DOWNLOAD_ORDERS,
    PROCESS_EXCEL_DOWNLOAD_INCOMPLETE_ORDERS,
    PROCESS_EXCEL_DOWNLOAD_COMPLAINTS,
    PROCESS_EXCEL_DOWNLOAD_WISHLISTS,
    PROCESS_EXCEL_DOWNLOAD_CARTS,
    PROCESS_EXCEL_DOWNLOAD_BEST_SELLER_PRODUCTS,
    PROCESS_EXCEL_DOWNLOAD_NEVER_PURCHASED_PRODUCTS,
    PROCESS_EXCEL_DOWNLOAD_COUNTRY_REPORT
} from './mutations'
export const GET_ORDERS_COUNT_ACTION = 'GET_ORDERS_COUNT_ACTION';
export const LOAD_ORDER_LIST_ACTION = 'LOAD_ORDER_LIST_ACTION';
export const LOAD_INCOMPLETE_ORDER_LIST_ACTION = 'LOAD_INCOMPLETE_ORDER_LIST_ACTION';
export const GET_ORDER_ACTION = 'GET_ORDER_ACTION';
export const ADD_ORDER_FOLLOW_UP_ACTION = 'ADD_ORDER_FOLLOW_UP_ACTION';
export const ADD_ORDER_ACTION = 'ADD_ORDER_ACTION';
export const UPDATE_ORDER_STATUS_ACTION = 'UPDATE_ORDER_STATUS_ACTION';
export const UPDATE_PAYMENT_STATUS_ACTION = 'UPDATE_PAYMENT_STATUS_ACTION';
export const GET_COMPLAINTS_ACTION = 'GET_COMPLAINTS_ACTION';
export const CREATE_COMPLAINT_DETAIL_ACTION = 'CREATE_COMPLAINT_DETAIL_ACTION';
export const GET_CURRENT_CARTS_ACTION = 'GET_CURRENT_CARTS_ACTION';
export const GET_CURRENT_WISHLISTS_ACTION = 'GET_CURRENT_WISHLISTS_ACTION';
export const GET_BEST_SELLER_PRODUCTS_ACTION = 'GET_BEST_SELLER_PRODUCTS_ACTION';
export const GET_NEVER_PURCHASED_PRODUCTS_ACTION = 'GET_NEVER_PURCHASED_PRODUCTS_ACTION';
export const GET_COUNTRY_REPORT_ACTION = 'GET_COUNTRY_REPORT_ACTION';

export const EXCEL_DOWNLOAD_ORDERS_ACTION = 'EXCEL_DOWNLOAD_ORDERS_ACTION';
export const EXCEL_DOWNLOAD_INCOMPLETE_ORDERS_ACTION = 'EXCEL_DOWNLOAD_INCOMPLETE_ORDERS_ACTION';
export const EXCEL_DOWNLOAD_COMPLAINTS = 'EXCEL_DOWNLOAD_COMPLAINTS';
export const EXCEL_DOWNLOAD_CARTS_ACTION = 'EXCEL_DOWNLOAD_CARTS_ACTION';
export const EXCEL_DOWNLOAD_WISHLISTS_ACTION = 'EXCEL_DOWNLOAD_WISHLISTS_ACTION';
export const EXCEL_DOWNLOAD_BEST_SELLER_PRODUCTS_ACTION = 'EXCEL_DOWNLOAD_BEST_SELLER_PRODUCTS_ACTION';
export const EXCEL_DOWNLOAD_NEVER_PURCHASED_PRODUCTS_ACTION = 'EXCEL_DOWNLOAD_NEVER_PURCHASED_PRODUCTS_ACTION';
export const EXCEL_DOWNLOAD_COUNTRY_REPORT_ACTION = 'EXCEL_DOWNLOAD_COUNTRY_REPORT_ACTION';

export default {
    [GET_ORDERS_COUNT_ACTION] (context, params) {
        return new Promise((resolve, reject) => {
            axios.get(process.env.MIX_BASE_URL+'api/admin/get-orders-count', params).then((response) => {
                context.commit(PROCESS_ORDERS_COUNT, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                reject()
            })
        })
    },
    [LOAD_ORDER_LIST_ACTION] (context,params) {
        return new Promise((resolve, reject) => {
            axios.get(process.env.MIX_BASE_URL+'api/admin/get-orders', params).then((response) => {
                context.commit(PROCESS_GET_ORDERS_LIST, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                reject()
            })
        })
    },
    [GET_ORDER_ACTION] (context, order_id) {
        return new Promise((resolve, reject) => {
            axios.get(process.env.MIX_BASE_URL+'api/admin/get-order/'+order_id).then((response) => {
                context.commit(PROCESS_GET_ORDER, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                reject()
            })
        })
    },
    [ADD_ORDER_FOLLOW_UP_ACTION] (context, params) {
        return new Promise((resolve, reject) => {
            axios.post(process.env.MIX_BASE_URL+'api/admin/add-order-follow-up', params).then((response) => {
                context.commit(PROCESS_ADD_ORDER_FOLLOW_UP, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                reject()
            })
        })
    },
    [ADD_ORDER_ACTION] (context, params) {
        return new Promise((resolve, reject) => {
            axios.post(process.env.MIX_BASE_URL+'api/admin/add-order', params).then((response) => {
                context.commit(PROCESS_ADD_ORDER, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                reject()
            })
        })
    },
    [UPDATE_ORDER_STATUS_ACTION] (context, params) {
        return new Promise((resolve, reject) => {
            axios.post(process.env.MIX_BASE_URL+'api/admin/update-order', params).then((response) => {
                context.commit(PROCESS_UPDATE_ORDER_STATUS, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                reject()
            })
        })
    },
    [EXCEL_DOWNLOAD_ORDERS_ACTION] (context, params) {
        return new Promise((resolve, reject) => {
            axios.post(process.env.MIX_BASE_URL+'api/admin/get-orders', params).then((response) => {
                context.commit(PROCESS_EXCEL_DOWNLOAD_ORDERS, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                reject()
            })
        })
    },
    [LOAD_INCOMPLETE_ORDER_LIST_ACTION] (context,params) {
        return new Promise((resolve, reject) => {
            axios.get(process.env.MIX_BASE_URL+'api/admin/get-incomplete-orders', params).then((response) => {
                context.commit(PROCESS_GET_INCOMPLETE_ORDERS_LIST, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                reject()
            })
        })
    },
    [EXCEL_DOWNLOAD_INCOMPLETE_ORDERS_ACTION] (context, params) {
        return new Promise((resolve, reject) => {
            axios.post(process.env.MIX_BASE_URL+'api/admin/get-incomplete-orders', params).then((response) => {
                context.commit(PROCESS_EXCEL_DOWNLOAD_INCOMPLETE_ORDERS, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                reject()
            })
        })
    },
    [GET_COMPLAINTS_ACTION] (context, params) {
        return new Promise((resolve, reject) => {
            axios.get(process.env.MIX_BASE_URL+'api/admin/get-complaints', params).then((response) => {
                context.commit(PROCESS_GET_COMPLAINTS, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                reject()
            })
        })
    },
    [CREATE_COMPLAINT_DETAIL_ACTION] (context, params) {
        return new Promise((resolve, reject) => {
            axios.post(process.env.MIX_BASE_URL+'api/admin/create-complaint', params).then((response) => {
                context.commit(PROCESS_CREATE_COMPLAINT_DETAIL, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                reject()
            })
        })
    },
    [EXCEL_DOWNLOAD_COMPLAINTS] (context, params) {
        return new Promise((resolve, reject) => {
            axios.post(process.env.MIX_BASE_URL+'api/admin/get-complaints', params).then((response) => {
                context.commit(PROCESS_EXCEL_DOWNLOAD_COMPLAINTS, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                reject()
            })
        })
    },
    [EXCEL_DOWNLOAD_INCOMPLETE_ORDERS_ACTION] (context, params) {
        return new Promise((resolve, reject) => {
            axios.post(process.env.MIX_BASE_URL+'api/admin/get-incomplete-orders', params).then((response) => {
                context.commit(PROCESS_EXCEL_DOWNLOAD_INCOMPLETE_ORDERS, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                reject()
            })
        })
    },
    [GET_CURRENT_CARTS_ACTION] (context, params) {
        return new Promise((resolve, reject) => {
            axios.get(process.env.MIX_BASE_URL+'api/admin/get-carts', params).then((response) => {
                context.commit(PROCESS_GET_CURRENT_CARTS, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                reject()
            })
        })
    },
    [GET_CURRENT_WISHLISTS_ACTION] (context, params) {
        return new Promise((resolve, reject) => {
            axios.get(process.env.MIX_BASE_URL+'api/admin/get-wishlist', params).then((response) => {
                context.commit(PROCESS_GET_CURRENT_WISHLISTS, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                reject()
            })
        })
    },
    [EXCEL_DOWNLOAD_CARTS_ACTION] (context, params) {
        return new Promise((resolve, reject) => {
            axios.get(process.env.MIX_BASE_URL+'api/admin/get-carts', params).then((response) => {
                context.commit(PROCESS_EXCEL_DOWNLOAD_CARTS, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                reject()
            })
        })
    },
    [EXCEL_DOWNLOAD_WISHLISTS_ACTION] (context, params) {
        return new Promise((resolve, reject) => {
            axios.get(process.env.MIX_BASE_URL+'api/admin/get-wishlist', params).then((response) => {
                context.commit(PROCESS_EXCEL_DOWNLOAD_WISHLISTS, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                reject()
            })
        })
    },
    [GET_BEST_SELLER_PRODUCTS_ACTION] (context, params) {
        return new Promise((resolve, reject) => {
            axios.get(process.env.MIX_BASE_URL+'api/admin/get-best-seller-products', params).then((response) => {
                context.commit(PROCESS_GET_BEST_SELLER_PRODUCTS, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                reject()
            })
        })
    },
    [EXCEL_DOWNLOAD_BEST_SELLER_PRODUCTS_ACTION] (context, params) {
        return new Promise((resolve, reject) => {
            axios.get(process.env.MIX_BASE_URL+'api/admin/get-best-seller-products', params).then((response) => {
                context.commit(PROCESS_EXCEL_DOWNLOAD_BEST_SELLER_PRODUCTS, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                reject()
            })
        })
    },
    [GET_NEVER_PURCHASED_PRODUCTS_ACTION] (context, params) {
        return new Promise((resolve, reject) => {
            axios.get(process.env.MIX_BASE_URL+'api/admin/get-never-purchased-products', params).then((response) => {
                context.commit(PROCESS_GET_NEVER_PURCHASED_PRODUCTS, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                reject()
            })
        })
    },
    [EXCEL_DOWNLOAD_NEVER_PURCHASED_PRODUCTS_ACTION] (context, params) {
        return new Promise((resolve, reject) => {
            axios.get(process.env.MIX_BASE_URL+'api/admin/get-never-purchased-products', params).then((response) => {
                context.commit(PROCESS_EXCEL_DOWNLOAD_NEVER_PURCHASED_PRODUCTS, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                reject()
            })
        })
    },
    [GET_COUNTRY_REPORT_ACTION] (context, params) {
        return new Promise((resolve, reject) => {
            axios.get(process.env.MIX_BASE_URL+'api/admin/get-country-report', params).then((response) => {
                context.commit(PROCESS_GET_COUNTRY_REPORT, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                reject()
            })
        })
    },
    [EXCEL_DOWNLOAD_COUNTRY_REPORT_ACTION] (context, params) {
        return new Promise((resolve, reject) => {
            axios.get(process.env.MIX_BASE_URL+'api/admin/get-country-report', params).then((response) => {
                context.commit(PROCESS_EXCEL_DOWNLOAD_COUNTRY_REPORT, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                reject()
            })
        })
    }
}