import {
    PROCESS_GET_VENDORS,
    PROCESS_GET_VENDOR,
    PROCESS_ADD_VENDOR,
    PROCESS_UPDATE_VENDOR,
    PROCESS_DELETE_VENDOR,
    PROCESS_GET_BRANDS,

    PROCESS_EXCEL_DOWNLOAD_VENDORS,
} from './mutations'
export const GET_VENDORS_ACTION = 'GET_VENDORS_ACTION';
export const GET_VENDOR_ACTION = 'GET_VENDOR_ACTION';
export const ADD_VENDOR_ACTION = 'ADD_VENDOR_ACTION';
export const UPDATE_VENDOR_ACTION = 'UPDATE_VENDOR_ACTION';
export const DELETE_VENDOR_ACTION = 'DELETE_VENDOR_ACTION';
export const GET_BRANDS_ACTION = 'GET_BRANDS_ACTION';

export const EXCEL_DOWNLOAD_VENDORS_ACTION = 'EXCEL_DOWNLOAD_VENDORS_ACTION';

export default {
    [GET_VENDORS_ACTION] (context,params) {
        return new Promise((resolve, reject) => {
            axios.get(process.env.MIX_BASE_URL+'api/admin/get-vendors',params).then((response) => {
                context.commit(PROCESS_GET_VENDORS, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                reject()
            })
        })
    },
    [ADD_VENDOR_ACTION] (context,params) {
        return new Promise((resolve, reject) => {
            axios.post(process.env.MIX_BASE_URL+'api/admin/create-vendor',params).then((response) => {
                context.commit(PROCESS_ADD_VENDOR, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                reject()
            })
        })
    },
    [GET_BRANDS_ACTION] (context,params) {
        return new Promise((resolve, reject) => {
            axios.get(process.env.MIX_BASE_URL+'api/admin/get-brands', params).then((response) => {
                context.commit(PROCESS_GET_BRANDS, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                reject()
            })
        })
    },
    [EXCEL_DOWNLOAD_VENDORS_ACTION] (context,params) {
        return new Promise((resolve, reject) => {
            axios.get(process.env.MIX_BASE_URL+'api/admin/get-vendors',params).then((response) => {
                context.commit(PROCESS_EXCEL_DOWNLOAD_VENDORS, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                reject()
            })
        })
    },
    [GET_VENDOR_ACTION] (context,vendor_id) {
        return new Promise((resolve, reject) => {
            axios.get(process.env.MIX_BASE_URL+'api/admin/get-vendor/'+vendor_id).then((response) => {
                context.commit(PROCESS_GET_VENDOR, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                reject()
            })
        })
    },
    [UPDATE_VENDOR_ACTION] (context,params) {
        return new Promise((resolve, reject) => {
            axios.post(process.env.MIX_BASE_URL+'api/admin/update-vendor', params).then((response) => {
                context.commit(PROCESS_UPDATE_VENDOR, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                reject()
            })
        })
    },
    [DELETE_VENDOR_ACTION] (context,params) {
        return new Promise((resolve, reject) => {
            axios.post(process.env.MIX_BASE_URL+'api/admin/delete-vendor', params).then((response) => {
                context.commit(PROCESS_DELETE_VENDOR, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                reject()
            })
        })
    },
}