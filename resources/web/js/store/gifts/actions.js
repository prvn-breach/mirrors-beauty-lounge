import {
    PROCESS_GET_GIFT_CERTIFICATES,
    PROCESS_GET_GIFT_CERTIFICATE
} from './mutations'
export const GET_GIFT_CERTIFICATES_ACTION = 'GET_GIFT_CERTIFICATES_ACTION';
export const GET_GIFT_CERTIFICATE_ACTION = 'GET_GIFT_CERTIFICATE_ACTION';

export default {
    [GET_GIFT_CERTIFICATES_ACTION] (context,params) {
        return new Promise((resolve, reject) => {
            axios.get(process.env.MIX_BASE_URL+'api/get-gift-certificates', params).then((response) => {
                context.commit(PROCESS_GET_GIFT_CERTIFICATES, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                reject()
            })
        })
    },
    [GET_GIFT_CERTIFICATE_ACTION] (context, params) {
        return new Promise((resolve, reject) => {
            axios.get(process.env.MIX_BASE_URL+'api/get-gift-certificate', params).then((response) => {
                context.commit(PROCESS_GET_GIFT_CERTIFICATE, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                reject()
            })
        })
    }
}