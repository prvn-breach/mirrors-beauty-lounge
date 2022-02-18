import {
    PROCESS_GET_PICKUP_RESPONSE_MUTATION,
    PROCESS_GET_PICKUP_BY_ID_RESPONSE_MUTATION,
    PROCESS_SAVE_PICKUP_IN_CART_RESPONSE_MUTATION,
    PROCESS_DELETE_PICKUP_LOCATION_RESPONSE_MUTATION
     } from './mutations'
import Vue from 'vue'

export const GET_PICKUP_LIST_ACTION = 'GET_PICKUP_LIST_ACTION'
export const GET_PICKUP_BY_ID_LIST_ACTION = 'GET_PICKUP_BY_ID_LIST_ACTION'
export const SAVE_PICKUP_IN_CART_LOCATION_ACTION = 'SAVE_PICKUP_IN_CART_LOCATION_ACTION'
export const DELETE_PICKUP_LOCATION_ACTION = 'DELETE_PICKUP_LOCATION_ACTION'
export default {
     data() {
            return {
              baseUrl:Vue.config.baseUrl,
              baseUrlImage:Vue.config.baseUrlImage,
            }
        },
    
    
    [SAVE_PICKUP_IN_CART_LOCATION_ACTION] (context,data) {
        let _this = this;
            return new Promise((resolve, reject) => {
                axios.post(process.env.MIX_BASE_URL+'api/save-pickup-location-in-cart',data).then((response) => {
                    context.commit(PROCESS_SAVE_PICKUP_IN_CART_RESPONSE_MUTATION, response)
                    resolve()
                }).catch((error) => {
                    console.log(error)
                    reject()
                })
            })
        
    }, 
    [DELETE_PICKUP_LOCATION_ACTION] (context,query) {
        let _this = this;
            return new Promise((resolve, reject) => {
                axios.get(process.env.MIX_BASE_URL+'api/delete-pickup-location-by-cart-id?'+query).then((response) => {
                    context.commit(PROCESS_DELETE_PICKUP_LOCATION_RESPONSE_MUTATION, response)
                    resolve()
                }).catch((error) => {
                    console.log(error)
                    reject()
                })
            })
        
    },
    [GET_PICKUP_BY_ID_LIST_ACTION] (context,address_id) {
        let _this = this;
            return new Promise((resolve, reject) => {
                axios.get(process.env.MIX_BASE_URL+'api/get-pickup-location-by-id/'+address_id).then((response) => {
                    context.commit(PROCESS_GET_PICKUP_BY_ID_RESPONSE_MUTATION, response)
                    resolve()
                }).catch((error) => {
                    console.log(error)
                    reject()
                })
            })
        
    }, 
    
    [GET_PICKUP_LIST_ACTION] (context) {
        let _this = this;
            return new Promise((resolve, reject) => {
                axios.get(process.env.MIX_BASE_URL+'api/get-pickup-locations').then((response) => {
                    context.commit(PROCESS_GET_PICKUP_RESPONSE_MUTATION, response)
                    resolve()
                }).catch((error) => {
                    console.log(error)
                    reject()
                })
            })
        
    },
    
   
    
}