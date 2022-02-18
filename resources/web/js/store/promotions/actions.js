import { PROCESS_GET_PROMOTIONS, PROCESS_GET_PROMOTION } from './mutations'
export const GET_PROMOTIONS_ACTION = 'GET_PROMOTIONS_ACTION';
export const GET_PROMOTION_ACTION = 'GET_PROMOTION_ACTION';

export default {
    [GET_PROMOTIONS_ACTION] (context,params) {
        return new Promise((resolve, reject) => {
            axios.get(process.env.MIX_BASE_URL+'api/get-promotions', params).then((response) => {
                context.commit(PROCESS_GET_PROMOTIONS, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                reject()
            })
        })
    },
    [GET_PROMOTION_ACTION] (context) {
        return new Promise((resolve, reject) => {
            axios.get(process.env.MIX_BASE_URL+'api/get-promotion').then((response) => {
                context.commit(PROCESS_GET_PROMOTION, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                reject()
            })
        })
    }
}