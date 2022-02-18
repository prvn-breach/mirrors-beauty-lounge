import {
    PROCESS_CART_LIST_RESPONSE_MUTATION,
    PROCESS_SAVE_CART_RESPONSE_MUTATION,
    PROCESS_REMOVE_CART_ITEM_RESPONSE_MUTATION,
    PROCESS_QTY_CART_ITEM_RESPONSE_MUTATION,
    PROCESS_UPDATE_CART_MUTATION
     } from './mutations'
import Vue from 'vue'
export const LOAD_CART_LIST_ACTION = 'LOAD_CART_LIST_ACTION'
export const REMOVE_CART_ITEM_ACTION = 'REMOVE_CART_ITEM_ACTION'
export const SAVE_CART_ACTION = 'SAVE_CART_ACTION'
export const CHANGE_QTY_CART_ITEM_ACTION = 'CHANGE_QTY_CART_ITEM_ACTION'
export const UPDATE_CART_ACTION = 'UPDATE_CART_ACTION'

export default {
     data() {
            return {
              baseUrl:Vue.config.baseUrl,
              baseUrlImage:Vue.config.baseUrlImage,
            }
        },
    
    [CHANGE_QTY_CART_ITEM_ACTION] (context,data) {
        let _this = this;
            return new Promise((resolve, reject) => {
                axios.post(process.env.MIX_BASE_URL+'api/save-qty-cart-item',data).then((response) => {
                    context.commit(PROCESS_QTY_CART_ITEM_RESPONSE_MUTATION, response)
                    resolve()
                }).catch((error) => {
                    console.log(error)
                    reject()
                })
            })
        
    },
    [REMOVE_CART_ITEM_ACTION] (context,item_id) {
        let _this = this;
            return new Promise((resolve, reject) => {
                axios.get(process.env.MIX_BASE_URL+'api/delete-cart-item/'+item_id).then((response) => {
                    context.commit(PROCESS_REMOVE_CART_ITEM_RESPONSE_MUTATION, response)
                    resolve()
                }).catch((error) => {
                    console.log(error)
                    reject()
                })
            })
        
    },
    [SAVE_CART_ACTION] (context,data) {
        let _this = this;
            return new Promise((resolve, reject) => {
                axios.post(process.env.MIX_BASE_URL+'api/save-cart',data).then((response) => {
                    context.commit(PROCESS_SAVE_CART_RESPONSE_MUTATION, response)
                    resolve()
                }).catch((error) => {
                    console.log(error)
                    reject()
                })
            })
        
    }, 
    [LOAD_CART_LIST_ACTION] (context,session_id) {
        let _this = this;
            return new Promise((resolve, reject) => {
                axios.get(process.env.MIX_BASE_URL+'api/get-carts/'+session_id).then((response) => {
                    context.commit(PROCESS_CART_LIST_RESPONSE_MUTATION, response)
                    resolve()
                }).catch((error) => {
                    console.log(error)
                    reject()
                })
            })
        
    },
    [UPDATE_CART_ACTION] (context,params) {
        return new Promise((resolve, reject) => {
            axios.post(process.env.MIX_BASE_URL+'api/update-cart', params).then((response) => {
                context.commit(PROCESS_UPDATE_CART_MUTATION, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                reject()
            })
        })
    },
    
}