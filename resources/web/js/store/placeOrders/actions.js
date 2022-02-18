import {
    PROCESS_SAVE_PLACE_ORDER_RESPONSE_MUTATION,
     } from './mutations'
import Vue from 'vue'

export const SAVE_PLACE_ORDER_ACTION = 'SAVE_PLACE_ORDER_ACTION'
export default {
     data() {
            return {
              baseUrl:Vue.config.baseUrl,
              baseUrlImage:Vue.config.baseUrlImage,
            }
        },
    
   
    [SAVE_PLACE_ORDER_ACTION] (context,data) {
        let _this = this;
        
            return new Promise((resolve, reject) => {
                axios.post(process.env.MIX_BASE_URL+'api/save-place-order',data).then((response) => {
                    context.commit(PROCESS_SAVE_PLACE_ORDER_RESPONSE_MUTATION, response)
                    resolve()
                }).catch((error) => {
                    console.log(error)
                    reject()
                })
            })
        
    },
    
   
    
}