import {PROCESS_CATEGORY_LIST_RESPONSE_MUTATION} from './mutations'
export const LOAD_CATEGORY_LIST_ACTION = 'LOAD_CATEGORY_LIST_ACTION'
export default {
    [LOAD_CATEGORY_LIST_ACTION] (context) {
        let _this = this;
        //context.commit(TYPE_LIST_NOT_LOADED_MUTATION)
        return new Promise((resolve, reject) => {
            axios.get(process.env.MIX_BASE_URL+'api/get-categories').then((response) => {
                context.commit(PROCESS_CATEGORY_LIST_RESPONSE_MUTATION, response)
                resolve()
            }).catch((error) => {
                console.log(error.response.data)
                reject()
            })
        })
    },
    
}