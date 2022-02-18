import {
    PROCESS_GET_SHIPPING_RESPONSE_MUTATION,
     } from './mutations'
import Vue from 'vue'

export const GET_SHIPPING_LIST_ACTION = 'GET_SHIPPING_LIST_ACTION'
export default {
     data() {
            return {
              baseUrl:Vue.config.baseUrl,
              baseUrlImage:Vue.config.baseUrlImage,
            }
        },
    
   
    [GET_SHIPPING_LIST_ACTION] (context) {
        let _this = this;
        
            return new Promise((resolve, reject) => {
                axios.get(process.env.MIX_BASE_URL+'api/get-shippings').then((response) => {
                    context.commit(PROCESS_GET_SHIPPING_RESPONSE_MUTATION, response)
                    resolve()
                }).catch((error) => {
                    console.log(error)
                    reject()
                })
            })
        
    },
    
   
    
}