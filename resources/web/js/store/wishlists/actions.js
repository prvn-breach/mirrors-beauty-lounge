import {PROCESS_WISH_LIST_RESPONSE_MUTATION,PROCESS_SAVE_WISH_LIST_RESPONSE_MUTATION,PROCESS_WISH_LIST_BY_USER_RESPONSE_MUTATION } from './mutations'
import Vue from 'vue'
export const LOAD_WISH_LIST_ACTION = 'LOAD_WISH_LIST_ACTION'
export const LOAD_SAVE_WISH_LIST_ACTION = 'LOAD_SAVE_WISH_LIST_ACTION'
export const LOAD_WISH_LIST_BY_USER_ACTION = 'LOAD_WISH_LIST_BY_USER_ACTION'

export default {
     data() {
            return {
              baseUrl:Vue.config.baseUrl,
              baseUrlImage:Vue.config.baseUrlImage,
            }
        },
    /*[LOAD_WISH_LIST_BY_USER_ACTION] (context,user_id) {
        let _this = this;
            return new Promise((resolve, reject) => {
                axios.post(process.env.MIX_BASE_URL+'api/get-wish-list-by-user',user_id).then((response) => {
                    context.commit(PROCESS_WISH_LIST_BY_USER_RESPONSE_MUTATION, response)
                    resolve()
                }).catch((error) => {
                    console.log(error)
                    reject()
                })
            })
        
    }, */
    [LOAD_SAVE_WISH_LIST_ACTION] (context,data) {
        let _this = this;
            return new Promise((resolve, reject) => {
                axios.post(process.env.MIX_BASE_URL+'api/save-wish-list',data).then((response) => {
                    context.commit(PROCESS_SAVE_WISH_LIST_RESPONSE_MUTATION, response)
                    resolve()
                }).catch((error) => {
                    console.log(error)
                    reject()
                })
            })
        
    }, 
    [LOAD_WISH_LIST_ACTION] (context,user_id) {
        let _this = this;
            return new Promise((resolve, reject) => {
                axios.get(process.env.MIX_BASE_URL+'api/get-wish-list/'+user_id).then((response) => {
                    context.commit(PROCESS_WISH_LIST_RESPONSE_MUTATION, response)
                    resolve()
                }).catch((error) => {
                    console.log(error)
                    reject()
                })
            })
        
    },
   
    
}