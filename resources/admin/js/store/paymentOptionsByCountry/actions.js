import {
    PROCESS_ADD_PAYMENT_OPTION_BY_COUNTRY,
    PROCESS_GET_PAYMENT_OPTIONS_BY_COUNTRY,
    PROCESS_GET_PAYMENT_OPTION_BY_COUNTRY,
    PROCESS_UPDATE_PAYMENT_OPTION_BY_COUNTRY,
    PROCESS_DELETE_PAYMENT_OPTION_BY_COUNTRY,

    PROCESS_EXCEL_DOWNLOAD_PAYMENT_OPTIONS_BY_COUNTRY
} from './mutations'
export const ADD_PAYMENT_OPTION_BY_COUNTRY_ACTION = 'ADD_PAYMENT_OPTION_BY_COUNTRY_ACTION';
export const GET_PAYMENT_OPTIONS_BY_COUNTRY_ACTION = 'GET_PAYMENT_OPTIONS_BY_COUNTRY_ACTION';
export const GET_PAYMENT_OPTION_BY_COUNTRY_ACTION = 'GET_PAYMENT_OPTION_BY_COUNTRY_ACTION';
export const UPDATE_PAYMENT_OPTION_BY_COUNTRY_ACTION = 'UPDATE_PAYMENT_OPTION_BY_COUNTRY_ACTION';
export const DELETE_PAYMENT_OPTION_BY_COUNTRY_ACTION = 'DELETE_PAYMENT_OPTION_BY_COUNTRY_ACTION';

export const EXCEL_DOWNLOAD_PAYMENT_OPTIONS_BY_COUNTRY_ACTION = 'EXCEL_DOWNLOAD_PAYMENT_OPTIONS_BY_COUNTRY_ACTION';

export default {
    [ADD_PAYMENT_OPTION_BY_COUNTRY_ACTION] (context, params) {
        return new Promise((resolve, reject) => {
            axios.post(process.env.MIX_BASE_URL+'api/admin/create-payment-option-by-country', params).then((response) => {
                context.commit(PROCESS_ADD_PAYMENT_OPTION_BY_COUNTRY, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                reject()
            })
        })
    },
    [GET_PAYMENT_OPTIONS_BY_COUNTRY_ACTION] (context, params) {
        return new Promise((resolve, reject) => {
            axios.get(process.env.MIX_BASE_URL+'api/admin/get-payment-options-by-country', params).then((response) => {
                context.commit(PROCESS_GET_PAYMENT_OPTIONS_BY_COUNTRY, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                reject()
            })
        })
    },
    [EXCEL_DOWNLOAD_PAYMENT_OPTIONS_BY_COUNTRY_ACTION] (context, params) {
        return new Promise((resolve, reject) => {
            axios.get(process.env.MIX_BASE_URL+'api/admin/get-payment-options-by-country', params).then((response) => {
                context.commit(PROCESS_EXCEL_DOWNLOAD_PAYMENT_OPTIONS_BY_COUNTRY, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                reject()
            })
        })
    },
    [GET_PAYMENT_OPTION_BY_COUNTRY_ACTION] (context, id) {
        return new Promise((resolve, reject) => {
            axios.get(process.env.MIX_BASE_URL+'api/admin/get-payment-option-by-country/'+id).then((response) => {
                context.commit(PROCESS_GET_PAYMENT_OPTION_BY_COUNTRY, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                reject()
            })
        })
    },
    [UPDATE_PAYMENT_OPTION_BY_COUNTRY_ACTION] (context, params) {
        return new Promise((resolve, reject) => {
            axios.post(process.env.MIX_BASE_URL+'api/admin/update-payment-option-by-country', params).then((response) => {
                context.commit(PROCESS_UPDATE_PAYMENT_OPTION_BY_COUNTRY, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                reject()
            })
        })
    },
    [DELETE_PAYMENT_OPTION_BY_COUNTRY_ACTION] (context, params) {
        return new Promise((resolve, reject) => {
            axios.post(process.env.MIX_BASE_URL+'api/admin/delete-payment-option-by-country', params).then((response) => {
                context.commit(PROCESS_DELETE_PAYMENT_OPTION_BY_COUNTRY, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                reject()
            })
        })
    }
}