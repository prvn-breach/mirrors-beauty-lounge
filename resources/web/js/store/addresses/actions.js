import {
    PROCESS_SAVE_ADDRESS_RESPONSE_MUTATION,
    PROCESS_GET_ADDRESS_RESPONSE_MUTATION,
    PROCESS_GET_ADDRESS_BY_ID_RESPONSE_MUTATION,
    PROCESS_DELETE_ADDRESS_RESPONSE_MUTATION,
    PROCESS_SAVE_CART_ADDRESS_RESPONSE_MUTATION
     } from './mutations'
import Vue from 'vue'
export const SAVE_ADDRESS_LIST_ACTION = 'SAVE_ADDRESS_LIST_ACTION'
export const GET_ADDRESS_LIST_ACTION = 'GET_ADDRESS_LIST_ACTION'
export const GET_ADDRESS_BY_ID_LIST_ACTION = 'GET_ADDRESS_BY_ID_LIST_ACTION'
export const DELETE_ADDRESS_ACTION = 'DELETE_ADDRESS_ACTION'
export const SAVE_CART_ADDRESS_ACTION = 'SAVE_CART_ADDRESS_ACTION'
export default {
     data() {
            return {
              baseUrl:Vue.config.baseUrl,
              baseUrlImage:Vue.config.baseUrlImage,
            }
        },
    
    [SAVE_CART_ADDRESS_ACTION] (context,data) {
        let _this = this;
            return new Promise((resolve, reject) => {
                axios.post(process.env.MIX_BASE_URL+'api/save-cart-address',data).then((response) => {
                    context.commit(PROCESS_SAVE_CART_ADDRESS_RESPONSE_MUTATION, response)
                    resolve()
                }).catch((error) => {
                    console.log(error)
                    reject()
                })
            })
        
    },
    [SAVE_ADDRESS_LIST_ACTION] (context,data) {
        let _this = this;
            return new Promise((resolve, reject) => {
                axios.post(process.env.MIX_BASE_URL+'api/save-address',data).then((response) => {
                    context.commit(PROCESS_SAVE_ADDRESS_RESPONSE_MUTATION, response)
                    resolve()
                }).catch((error) => {
                    console.log(error)
                    reject()
                })
            })
        
    },
    [GET_ADDRESS_BY_ID_LIST_ACTION] (context,address_id) {
        let _this = this;
            return new Promise((resolve, reject) => {
                axios.get(process.env.MIX_BASE_URL+'api/get-address-by-id/'+address_id).then((response) => {
                    context.commit(PROCESS_GET_ADDRESS_BY_ID_RESPONSE_MUTATION, response)
                    resolve()
                }).catch((error) => {
                    console.log(error)
                    reject()
                })
            })
        
    }, 
    [DELETE_ADDRESS_ACTION] (context,query) {
        let _this = this;
            return new Promise((resolve, reject) => {
                axios.get(process.env.MIX_BASE_URL+'api/delete-address-by-id?'+query).then((response) => {
                    context.commit(PROCESS_DELETE_ADDRESS_RESPONSE_MUTATION, response)
                    resolve()
                }).catch((error) => {
                    console.log(error)
                    reject()
                })
            })
        
    },
    [GET_ADDRESS_LIST_ACTION] (context,user_id) {
        let _this = this;
            return new Promise((resolve, reject) => {
                axios.get(process.env.MIX_BASE_URL+'api/get-addresses/'+user_id).then((response) => {
                    context.commit(PROCESS_GET_ADDRESS_RESPONSE_MUTATION, response)
                    resolve()
                }).catch((error) => {
                    console.log(error)
                    reject()
                })
            })
        
    },
    
   
    
}