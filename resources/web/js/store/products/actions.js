import {PROCESS_PRODUCTS_LIST_RESPONSE_MUTATION,
    PROCESS_PRODUCTS_FILTER_RESPONSE_MUTATION,
    PROCESS_PRODUCTS_DESCRIPTION_RESPONSE_MUTATION,
    PROCESS_VAT_RESPONSE_MUTATION,
    PROCESS_PRODUCT_DEAL_LIST_RESPONSE_MUTATION,
    PROCESS_PRODUCT_CATEGORY_LIST_RESPONSE_MUTATION,
     } from './mutations'
 import Vue from 'vue'
export const LOAD_PRODUCTS_LIST_ACTION = 'LOAD_PRODUCTS_LIST_ACTION'
export const LOAD_PRODUCT_FILTER_ACTION = 'LOAD_PRODUCT_FILTER_ACTION'
export const LOAD_PRODUCTS_DESCRIPTION_ACTION = 'LOAD_PRODUCTS_DESCRIPTION_ACTION'
export const LOAD_VAT_ACTION = 'LOAD_VAT_ACTION'
export const LOAD_PRODUCT_DEAL_LIST_ACTION = 'LOAD_PRODUCT_DEAL_LIST_ACTION'
export const LOAD_PRODUCT_CATEGORY_LIST_ACTION = 'LOAD_PRODUCT_CATEGORY_LIST_ACTION'
export default {
     data() {
            return {
              baseUrl:Vue.config.baseUrl,
              baseUrlImage:Vue.config.baseUrlImage,
            }
        },
    [LOAD_PRODUCT_CATEGORY_LIST_ACTION] (context) {
        let _this = this;
        //context.commit(TYPE_LIST_NOT_LOADED_MUTATION)
        return new Promise((resolve, reject) => {
            axios.get(process.env.MIX_BASE_URL+'api/get-categories-home').then((response) => {
                context.commit(PROCESS_PRODUCT_CATEGORY_LIST_RESPONSE_MUTATION, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                reject()
            })
        })
    },[LOAD_PRODUCT_DEAL_LIST_ACTION] (context) {
        let _this = this;
        //context.commit(TYPE_LIST_NOT_LOADED_MUTATION)
        return new Promise((resolve, reject) => {
            axios.get(process.env.MIX_BASE_URL+'api/get-product-deal').then((response) => {
                context.commit(PROCESS_PRODUCT_DEAL_LIST_RESPONSE_MUTATION, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                reject()
            })
        })
    },[LOAD_VAT_ACTION] (context) {
        let _this = this;
        //context.commit(TYPE_LIST_NOT_LOADED_MUTATION)
        return new Promise((resolve, reject) => {
            axios.get(process.env.MIX_BASE_URL+'api/get-vat').then((response) => {
                context.commit(PROCESS_VAT_RESPONSE_MUTATION, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                reject()
            })
        })
    },[LOAD_PRODUCTS_DESCRIPTION_ACTION] (context,params) {
        let _this = this;
        //context.commit(TYPE_LIST_NOT_LOADED_MUTATION)
        return new Promise((resolve, reject) => {
            axios.get(process.env.MIX_BASE_URL+'api/get-product-description/'+params.path+'?'+params.queries).then((response) => {
                context.commit(PROCESS_PRODUCTS_DESCRIPTION_RESPONSE_MUTATION, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                reject()
            })
        })
    },[LOAD_PRODUCT_FILTER_ACTION] (context,params) {
        let _this = this;
        //context.commit(TYPE_LIST_NOT_LOADED_MUTATION)
        return new Promise((resolve, reject) => {
            axios.get(process.env.MIX_BASE_URL+'api/get-product-filter',params).then((response) => {
                context.commit(PROCESS_PRODUCTS_FILTER_RESPONSE_MUTATION, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                reject()
            })
        })
    },[LOAD_PRODUCTS_LIST_ACTION] (context,params) {
        let _this = this;
        //context.commit(TYPE_LIST_NOT_LOADED_MUTATION)
        return new Promise((resolve, reject) => {
            axios.get(process.env.MIX_BASE_URL+'api/get-products/'+params.path+'?'+params.queries).then((response) => {
                context.commit(PROCESS_PRODUCTS_LIST_RESPONSE_MUTATION, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                reject()
            })
        })
    },
    
}