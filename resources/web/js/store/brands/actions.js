import {
    PROCESS_GET_BRAND_LIST_RESPONSE_MUTATION,
     } from './mutations'
import Vue from 'vue'
export const GET_BRAND_LIST = 'GET_BRAND_LIST'
export default {
     data() {
            return {
              baseUrl:Vue.config.baseUrl,
              baseUrlImage:Vue.config.baseUrlImage,
            }
        },
    
   
    [GET_BRAND_LIST] (context) {
        let _this = this;
            return new Promise((resolve, reject) => {
                console.log(process.env)
                axios.get(process.env.MIX_BASE_URL+'api/get-brands').then((response) => {
                        context.commit(PROCESS_GET_BRAND_LIST_RESPONSE_MUTATION, response)
                    resolve()
                }).catch((error) => {
                    console.log(error)
                    reject()
                })
            })
        
    }, 
    
   
    
}