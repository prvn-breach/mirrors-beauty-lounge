import {
    PROCESS_GET_GIFT_CERTIFICATES,
    PROCESS_GET_GIFT_CERTIFICATE,
    PROCESS_ADD_GIFT_CERTIFICATE,
    PROCESS_DELETE_GIFT_CERTIFICATE,
    PROCESS_UPDATE_GIFT_CERTIFICATE,

    PROCESS_EXCEL_DOWNLOAD_GIFT_CERTIFICATES
} from './mutations'
export const GET_GIFT_CERTIFICATES_ACTION = 'GET_GIFT_CERTIFICATES_ACTION';
export const GET_GIFT_CERTIFICATE_ACTION = 'GET_GIFT_CERTIFICATE_ACTION';
export const ADD_GIFT_CERTIFICATE_ACTION = 'ADD_GIFT_CERTIFICATE_ACTION';
export const DELETE_GIFT_CERTIFICATE_ACTION = 'DELETE_GIFT_CERTIFICATE_ACTION';
export const UPDATE_GIFT_CERTIFICATE_ACTION = 'UPDATE_GIFT_CERTIFICATE_ACTION';

export const EXCEL_DOWNLOAD_GIFT_CERTIFICATES_ACTION = 'EXCEL_DOWNLOAD_GIFT_CERTIFICATES_ACTION';

export default {
    [GET_GIFT_CERTIFICATES_ACTION] (context,params) {
        return new Promise((resolve, reject) => {
            axios.get(process.env.MIX_BASE_URL+'api/admin/get-gift-certificates', params).then((response) => {
                context.commit(PROCESS_GET_GIFT_CERTIFICATES, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                reject()
            })
        })
    },
    [GET_GIFT_CERTIFICATE_ACTION] (context,id) {
        return new Promise((resolve, reject) => {
            axios.get(process.env.MIX_BASE_URL+'api/admin/get-gift-certificate/'+id).then((response) => {
                context.commit(PROCESS_GET_GIFT_CERTIFICATE, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                reject()
            })
        })
    },
    [ADD_GIFT_CERTIFICATE_ACTION] (context,params) {
        return new Promise((resolve, reject) => {
            axios.post(process.env.MIX_BASE_URL+'api/admin/create-gift-certificate', params).then((response) => {
                context.commit(PROCESS_ADD_GIFT_CERTIFICATE, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                reject()
            })
        })
    },
    [DELETE_GIFT_CERTIFICATE_ACTION] (context,params) {
        return new Promise((resolve, reject) => {
            axios.post(process.env.MIX_BASE_URL+'api/admin/delete-gift-certificate', params).then((response) => {
                context.commit(PROCESS_DELETE_GIFT_CERTIFICATE, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                reject()
            })
        })
    },
    [UPDATE_GIFT_CERTIFICATE_ACTION] (context,params) {
        return new Promise((resolve, reject) => {
            axios.post(process.env.MIX_BASE_URL+'api/admin/update-gift-certificate', params).then((response) => {
                context.commit(PROCESS_UPDATE_GIFT_CERTIFICATE, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                reject()
            })
        })
    },
    [EXCEL_DOWNLOAD_GIFT_CERTIFICATES_ACTION] (context,params) {
        return new Promise((resolve, reject) => {
            axios.get(process.env.MIX_BASE_URL+'api/admin/get-gift-certificates', params).then((response) => {
                context.commit(PROCESS_EXCEL_DOWNLOAD_GIFT_CERTIFICATES, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                reject()
            })
        })
    }
}