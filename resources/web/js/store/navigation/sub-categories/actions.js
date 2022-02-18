import {
    PROCESS_GET_SUBCATEGORIES_RESPONSE_MUTATION,
    PROCESS_GET_SUBCATEGORY_RESPONSE_MUTATION
} from './mutations'
export const GET_SUBCATEGORIES_ACTION = 'GET_SUBCATEGORIES_ACTION'
export const GET_SUBCATEGORY_ACTION = 'GET_SUBCATEGORY_ACTION'
export default {
    [GET_SUBCATEGORIES_ACTION] (context,params) {
        return new Promise((resolve, reject) => {
            axios.get(process.env.MIX_BASE_URL+'api/sub-categories', params).then((response) => {
                context.commit(PROCESS_GET_SUBCATEGORIES_RESPONSE_MUTATION, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                reject()
            })
        })
    },
    [GET_SUBCATEGORY_ACTION] (context,params) {
        return new Promise((resolve, reject) => {
            axios.get(process.env.MIX_BASE_URL+'api/sub-category', params).then((response) => {
                context.commit(PROCESS_GET_SUBCATEGORY_RESPONSE_MUTATION, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                reject()
            })
        })
    }
}