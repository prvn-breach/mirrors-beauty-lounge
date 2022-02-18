import {
    PROCESS_GET_PROMOTIONS,
    PROCESS_GET_PROMOTION,
    PROCESS_ADD_PROMOTION,
    PROCESS_DELETE_PROMOTION,
    PROCESS_UPDATE_PROMOTION,

    PROCESS_EXCEL_DOWNLOAD_PROMOTIONS
} from './mutations'
export const GET_PROMOTIONS_ACTION = 'GET_PROMOTIONS_ACTION';
export const GET_PROMOTION_ACTION = 'GET_PROMOTION_ACTION';
export const ADD_PROMOTION_ACTION = 'ADD_PROMOTION_ACTION';
export const DELETE_PROMOTION_ACTION = 'DELETE_PROMOTION_ACTION';
export const UPDATE_PROMOTION_ACTION = 'UPDATE_PROMOTION_ACTION';

export const EXCEL_DOWNLOAD_PROMOTIONS_ACTION = 'EXCEL_DOWNLOAD_PROMOTIONS_ACTION';

export default {
    [GET_PROMOTIONS_ACTION] (context,params) {
        return new Promise((resolve, reject) => {
            axios.get(process.env.MIX_BASE_URL+'api/admin/get-promotions', params).then((response) => {
                context.commit(PROCESS_GET_PROMOTIONS, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                reject()
            })
        })
    },
    [GET_PROMOTION_ACTION] (context,id) {
        return new Promise((resolve, reject) => {
            axios.get(process.env.MIX_BASE_URL+'api/admin/get-promotion/'+id).then((response) => {
                context.commit(PROCESS_GET_PROMOTION, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                reject()
            })
        })
    },
    [ADD_PROMOTION_ACTION] (context,params) {
        return new Promise((resolve, reject) => {
            axios.post(process.env.MIX_BASE_URL+'api/admin/create-promotion', params).then((response) => {
                context.commit(PROCESS_ADD_PROMOTION, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                reject()
            })
        })
    },
    [DELETE_PROMOTION_ACTION] (context,params) {
        return new Promise((resolve, reject) => {
            axios.post(process.env.MIX_BASE_URL+'api/admin/delete-promotion', params).then((response) => {
                context.commit(PROCESS_DELETE_PROMOTION, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                reject()
            })
        })
    },
    [UPDATE_PROMOTION_ACTION] (context,params) {
        return new Promise((resolve, reject) => {
            axios.post(process.env.MIX_BASE_URL+'api/admin/update-promotion', params).then((response) => {
                context.commit(PROCESS_UPDATE_PROMOTION, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                reject()
            })
        })
    },
    [EXCEL_DOWNLOAD_PROMOTIONS_ACTION] (context,params) {
        return new Promise((resolve, reject) => {
            axios.get(process.env.MIX_BASE_URL+'api/admin/get-promotions', params).then((response) => {
                context.commit(PROCESS_EXCEL_DOWNLOAD_PROMOTIONS, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                reject()
            })
        })
    }
}