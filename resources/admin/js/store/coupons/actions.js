import { 
    PROCESS_GET_COUPONS,
    PROCESS_GET_COUPON,
    PROCESS_CREATE_COUPON,
    PROCESS_DELETE_COUPON,
    PROCESS_UPDATE_COUPON,

    PROCESS_EXCEL_DOWNLOAD_COUPONS,
} from './mutations'
export const GET_COUPONS_ACTION = 'GET_COUPONS_ACTION';
export const GET_COUPON_ACTION = 'GET_COUPON_ACTION';
export const CREATE_COUPON_ACTION = 'CREATE_COUPON_ACTION';
export const DELETE_COUPON_ACTION = 'DELETE_COUPON_ACTION';
export const UPDATE_COUPON_ACTION = 'UPDATE_COUPON_ACTION';

export const EXCEL_DOWNLOAD_COUPONS_ACTION = 'EXCEL_DOWNLOAD_COUPONS_ACTION';

export default {
    [GET_COUPONS_ACTION] (context,params) {
        return new Promise((resolve, reject) => {
            axios.get(process.env.MIX_BASE_URL+'api/admin/get-coupons', params).then((response) => {
                context.commit(PROCESS_GET_COUPONS, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                reject()
            })
        })
    },
    [GET_COUPON_ACTION] (context,coupon_id = '') {
        return new Promise((resolve, reject) => {
            axios.get(process.env.MIX_BASE_URL+'api/admin/get-coupon/'+coupon_id).then((response) => {
                context.commit(PROCESS_GET_COUPON, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                reject()
            })
        })
    },
    [EXCEL_DOWNLOAD_COUPONS_ACTION] (context,params) {
        return new Promise((resolve, reject) => {
            axios.get(process.env.MIX_BASE_URL+'api/admin/get-coupons', params).then((response) => {
                context.commit(PROCESS_EXCEL_DOWNLOAD_COUPONS, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                reject()
            })
        })
    },
    [CREATE_COUPON_ACTION] (context,params) {
        return new Promise((resolve, reject) => {
            axios.post(process.env.MIX_BASE_URL+'api/admin/create-coupon', params).then((response) => {
                context.commit(PROCESS_CREATE_COUPON, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                reject()
            })
        })
    },
    [DELETE_COUPON_ACTION] (context,params) {
        return new Promise((resolve, reject) => {
            axios.post(process.env.MIX_BASE_URL+'api/admin/delete-coupon', params).then((response) => {
                context.commit(PROCESS_DELETE_COUPON, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                reject()
            })
        })
    },
    [UPDATE_COUPON_ACTION] (context,params) {
        return new Promise((resolve, reject) => {
            axios.post(process.env.MIX_BASE_URL+'api/admin/update-coupon', params).then((response) => {
                context.commit(PROCESS_UPDATE_COUPON, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                reject()
            })
        })
    },
}