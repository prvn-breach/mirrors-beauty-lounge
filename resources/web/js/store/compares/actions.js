import {
    PROCESS_SAVE_COMPARE_RESPONSE_MUTATION,
    PROCESS_GET_COMPARE_RESPONSE_MUTATION,
    PROCESS_GET_COMPARE_BY_ID_RESPONSE_MUTATION,
    PROCESS_DELETE_COMPARE_RESPONSE_MUTATION
     } from './mutations'
import Vue from 'vue'
export const SAVE_COMPARE_ACTION = 'SAVE_COMPARE_ACTION'
export const GET_COMPARE_LIST_ACTION = 'GET_COMPARE_LIST_ACTION'
export const GET_COMPARE_BY_ID_LIST_ACTION = 'GET_COMPARE_BY_ID_LIST_ACTION'
export const DELETE_COMPARE_ACTION = 'DELETE_COMPARE_ACTION'

export default {
     data() {
            return {
              baseUrl:Vue.config.baseUrl,
              baseUrlImage:Vue.config.baseUrlImage,
            }
        },
    
    
    [SAVE_COMPARE_ACTION] (context,data) {
        let _this = this;
            return new Promise((resolve, reject) => {
                axios.post(process.env.MIX_BASE_URL+'api/save-compare',data).then((response) => {
                    context.commit(PROCESS_SAVE_COMPARE_RESPONSE_MUTATION, response)
                    resolve()
                }).catch((error) => {
                    console.log(error)
                    reject()
                })
            })
        
    },
    [GET_COMPARE_BY_ID_LIST_ACTION] (context,address_id) {
        let _this = this;
            return new Promise((resolve, reject) => {
                axios.get(process.env.MIX_BASE_URL+'api/get-compare-by-id/'+address_id).then((response) => {
                    context.commit(PROCESS_GET_COMPARE_BY_ID_RESPONSE_MUTATION, response)
                    resolve()
                }).catch((error) => {
                    console.log(error)
                    reject()
                })
            })
        
    }, 
    [DELETE_COMPARE_ACTION] (context,query) {
        let _this = this;
            return new Promise((resolve, reject) => {
                axios.get(process.env.MIX_BASE_URL+'api/delete-compare?'+query).then((response) => {
                    context.commit(PROCESS_DELETE_COMPARE_RESPONSE_MUTATION, response)
                    resolve()
                }).catch((error) => {
                    console.log(error)
                    reject()
                })
            })
        
    },
    [GET_COMPARE_LIST_ACTION] (context,id) {
        let _this = this;
            return new Promise((resolve, reject) => {
                axios.get(process.env.MIX_BASE_URL+'api/get-compares/'+id).then((response) => {
                    context.commit(PROCESS_GET_COMPARE_RESPONSE_MUTATION, response)
                    resolve()
                }).catch((error) => {
                    console.log(error)
                    reject()
                })
            })
        
    },
    
   
    
}