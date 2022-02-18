import {
    PROCESS_ADD_STORE_DETAIL,
    PROCESS_ADD_WAREHOUSE_ADDRESS,
    PROCESS_GET_WAREHOUSE_ADDRESS
} from './mutations'
export const ADD_STORE_DETAIL_ACTION = 'ADD_STORE_DETAIL_ACTION';
export const ADD_WAREHOUSE_ADDRESS_ACTION = 'ADD_WAREHOUSE_ADDRESS_ACTION';
export const GET_WAREHOUSE_ADDRESS_ACTION = 'GET_WAREHOUSE_ADDRESS_ACTION';

export default {
    [ADD_STORE_DETAIL_ACTION] (context, params) {
        return new Promise((resolve, reject) => {
            axios.post(process.env.MIX_BASE_URL+'api/admin/create-store-detail', params).then((response) => {
                context.commit(PROCESS_ADD_STORE_DETAIL, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                reject()
            })
        })
    },
    [ADD_WAREHOUSE_ADDRESS_ACTION] (context, params) {
        return new Promise((resolve, reject) => {
            axios.post(process.env.MIX_BASE_URL+'api/admin/create-warehouse', params).then((response) => {
                context.commit(PROCESS_ADD_WAREHOUSE_ADDRESS, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                reject()
            })
        })
    },
    [GET_WAREHOUSE_ADDRESS_ACTION] (context, params) {
        return new Promise((resolve, reject) => {
            axios.get(process.env.MIX_BASE_URL+'api/admin/get-warehouse', params).then((response) => {
                context.commit(PROCESS_GET_WAREHOUSE_ADDRESS, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                reject()
            })
        })
    }
}