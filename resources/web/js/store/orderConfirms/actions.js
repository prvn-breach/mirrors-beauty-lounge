import {
    PROCESS_GET_ORDER_BY_USER_RESPONSE_MUTATION,
    PROCESS_GET_ORDER_RESPONSE_MUTATION,
    PROCESS_CHANGE_STATUS_ORDER_RESPONSE_MUTATION,
     } from './mutations'
import Vue from 'vue'

export const SAVE_GET_ORDER_ACTION = 'SAVE_GET_ORDER_ACTION'
export const GET_ORDER_BY_USER_ACTION = 'GET_ORDER_BY_USER_ACTION'
export const GET_CHANGE_STATUS_ORDER_ACTION = 'GET_CHANGE_STATUS_ORDER_ACTION'
export default {
     data() {
            return {
              baseUrl:Vue.config.baseUrl,
              baseUrlImage:Vue.config.baseUrlImage,
            }
        },
    
   
    [GET_CHANGE_STATUS_ORDER_ACTION] (context,data) {
        let _this = this;
        
            return new Promise((resolve, reject) => {
                axios.post(process.env.MIX_BASE_URL+'api/save-status-order',data).then((response) => {
                    context.commit(PROCESS_CHANGE_STATUS_ORDER_RESPONSE_MUTATION, response)
                    resolve()
                }).catch((error) => {
                    console.log(error)
                    reject()
                })
            })
        
    },
    [GET_ORDER_BY_USER_ACTION] (context,user_id) {
        let _this = this;
        
            return new Promise((resolve, reject) => {
                axios.get(process.env.MIX_BASE_URL+'api/get-order-by-user/'+user_id).then((response) => {
                    context.commit(PROCESS_GET_ORDER_BY_USER_RESPONSE_MUTATION, response)
                    resolve()
                }).catch((error) => {
                    console.log(error)
                    reject()
                })
            })
        
    },
    [SAVE_GET_ORDER_ACTION] (context,session_id) {
        let _this = this;
        
            return new Promise((resolve, reject) => {
                axios.get(process.env.MIX_BASE_URL+'api/get-order/'+session_id).then((response) => {
                    context.commit(PROCESS_GET_ORDER_RESPONSE_MUTATION, response)
                    resolve()
                }).catch((error) => {
                    console.log(error)
                    reject()
                })
            })
        
    },
    
   
    
}