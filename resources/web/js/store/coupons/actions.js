import { 
    PROCESS_GET_COUPONS,
    PROCESS_GET_COUPON,
    PROCESS_VALIDATE_COUPON
} from './mutations'
export const GET_COUPONS_ACTION = 'GET_COUPONS_ACTION';
export const GET_COUPON_ACTION = 'GET_COUPON_ACTION';
export const VALIDATE_COUPON_ACTION = 'VALIDATE_COUPON_ACTION';

export default {
    [GET_COUPONS_ACTION] (context,params) {
        return new Promise((resolve, reject) => {
            axios.get(process.env.MIX_BASE_URL+'api/get-coupons', params).then((response) => {
                context.commit(PROCESS_GET_COUPONS, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                reject()
            })
        })
    },
    [GET_COUPON_ACTION] (context, params) {
        return new Promise((resolve, reject) => {
            axios.get(process.env.MIX_BASE_URL+'api/get-coupon', params).then((response) => {
                context.commit(PROCESS_GET_COUPON, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                reject()
            })
        })
    },
    [VALIDATE_COUPON_ACTION] (context, params) {
        return new Promise((resolve, reject) => {
            axios.get(process.env.MIX_BASE_URL+'api/validate-coupon', params).then((response) => {
                context.commit(PROCESS_VALIDATE_COUPON, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                reject()
            })
        })
    }
}