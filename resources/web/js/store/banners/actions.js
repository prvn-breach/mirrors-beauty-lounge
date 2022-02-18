import {
    PROCESS_GET_BANNER_BY_TYPE_RESPONSE_MUTATION,
    PROCESS_GET_BANNER_HOME_DEAL_BY_TYPE_RESPONSE_MUTATION,
     } from './mutations'
import Vue from 'vue'
export const GET_BANNER_BY_TYPE = 'GET_BANNER_BY_TYPE'
export default {
     data() {
            return {
              baseUrl:Vue.config.baseUrl,
              baseUrlImage:Vue.config.baseUrlImage,
            }
        },
    
   
    [GET_BANNER_BY_TYPE] (context,type) {
        let _this = this;
            return new Promise((resolve, reject) => {
                axios.get(process.env.MIX_BASE_URL+'api/get-banner/'+type).then((response) => {
                    if(type == 'home'){
                        context.commit(PROCESS_GET_BANNER_BY_TYPE_RESPONSE_MUTATION, response)
                    }else if(type == 'home_deal'){
                        context.commit(PROCESS_GET_BANNER_HOME_DEAL_BY_TYPE_RESPONSE_MUTATION, response)

                    }
                    resolve()
                }).catch((error) => {
                    console.log(error)
                    reject()
                })
            })
        
    }, 
    
   
    
}