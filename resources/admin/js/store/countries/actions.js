import {
    PROCESS_GET_COUNTRIES_LIST
} from './mutations'
export const GET_COUNTRIES_LIST_ACTION = 'GET_COUNTRIES_LIST_ACTION';

export default {
    [GET_COUNTRIES_LIST_ACTION] (context, params) {
        return new Promise((resolve, reject) => {
            axios.get(process.env.MIX_BASE_URL+'api/admin/get-countries', params).then((response) => {
                context.commit(PROCESS_GET_COUNTRIES_LIST, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                reject()
            })
        })
    }   
}