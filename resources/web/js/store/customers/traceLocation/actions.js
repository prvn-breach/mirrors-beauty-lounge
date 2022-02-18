import {PROCESS_TRACE_LIST_RESPONSE_MUTATION} from './mutations'
 import Vue from 'vue'
export const LOAD_TRACE_LIST_ACTION = 'LOAD_TRACE_LIST_ACTION'
export default {
     data() {
            return {
              baseUrl:Vue.config.baseUrl,
              baseUrlImage:Vue.config.baseUrlImage,
            }
        },
    [LOAD_TRACE_LIST_ACTION] (context) {
        let _this = this;
        //context.commit(TYPE_LIST_NOT_LOADED_MUTATION)
        return new Promise((resolve, reject) => {
            axios.get(process.env.MIX_BASE_URL+'api/get-customer-location').then((response) => {
                context.commit(PROCESS_TRACE_LIST_RESPONSE_MUTATION, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                reject()
            })
        })
    },
    
}