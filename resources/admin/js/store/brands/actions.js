import {
    PROCESS_ADD_BRAND_RESPONSE_MUTATION,
    PROCESS_DELETE_BRANDS_RESPONSE_MUTATION,
    PROCESS_EXCEL_DOWNLOAD_BRANDS_MUTATION,
    PROCESS_BRAND_LIST_RESPONSE_MUTATION,
    PROCESS_GET_BRAND_RESPONSE_MUTATION,
    PROCESS_UPDATE_STATUS_BRAND_RESPONSE_MUTATION,
    PROCESS_ADD_CATEGORY_RESPONSE_MUTATION
     } from './mutations'
 import Vue from 'vue'
export const ADD_BRAND_ACTION = 'ADD_BRAND_ACTION'
export const DELETE_BRANDS_ACTION = 'DELETE_BRANDS_ACTION'
export const EXCEL_DOWNLOAD_BRANDS_ACTION = 'EXCEL_DOWNLOAD_BRANDS_ACTION'
export const LOAD_BRAND_LIST_ACTION = 'LOAD_BRAND_LIST_ACTION'
export const LOAD_GET_BRAND_ACTION = 'LOAD_GET_BRAND_ACTION'
export const UPDATE_CHANGE_STATUS_BRAND_ACTION = 'UPDATE_CHANGE_STATUS_BRAND_ACTION'
export const ADD_CATEGORY_ACTION = 'ADD_CATEGORY_ACTION'

export default {
    data() {
        return {
            baseUrl:Vue.config.baseUrl,
            baseUrlImage:Vue.config.baseUrlImage,
        }
    },
    [ADD_CATEGORY_ACTION] (context,data) {
        let _this = this;

        return new Promise((resolve, reject) => {
            axios.post(process.env.MIX_BASE_URL+'api/admin/add-category',data).then((response) => {
                context.commit(PROCESS_ADD_CATEGORY_RESPONSE_MUTATION, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                reject()
            })
        })
    },
    [UPDATE_CHANGE_STATUS_BRAND_ACTION] (context,data) {
        let _this = this;
        return new Promise((resolve, reject) => {
            axios.post(process.env.MIX_BASE_URL+'api/admin/update-change-status-brand',data).then((response) => {
                context.commit(PROCESS_UPDATE_STATUS_BRAND_RESPONSE_MUTATION, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                reject()
            })
        })
    }, 
    [LOAD_GET_BRAND_ACTION] (context,brand_id) {
        let _this = this;

        return new Promise((resolve, reject) => {
            axios.get(process.env.MIX_BASE_URL+'api/admin/get-brand/'+brand_id).then((response) => {
                context.commit(PROCESS_GET_BRAND_RESPONSE_MUTATION, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                reject()
            })
        })
    },
    [LOAD_BRAND_LIST_ACTION] (context,params) {
        let _this = this;

        return new Promise((resolve, reject) => {
            axios.get(process.env.MIX_BASE_URL+'api/admin/get-brands', params).then((response) => {
                context.commit(PROCESS_BRAND_LIST_RESPONSE_MUTATION, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                reject()
            })
        })
    },
    [EXCEL_DOWNLOAD_BRANDS_ACTION] (context,params) {
        return new Promise((resolve, reject) => {
            axios.get(process.env.MIX_BASE_URL+'api/admin/get-brands', params).then((response) => {
                context.commit(PROCESS_EXCEL_DOWNLOAD_BRANDS_MUTATION, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                reject()
            })
        })
    },
    [ADD_BRAND_ACTION] (context,data) {
        let _this = this;

        return new Promise((resolve, reject) => {
            axios.post(process.env.MIX_BASE_URL+'api/admin/add-brand',data).then((response) => {
                context.commit(PROCESS_ADD_BRAND_RESPONSE_MUTATION, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                reject()
            })
        })
    },
    [DELETE_BRANDS_ACTION] (context,data) {
        let _this = this;
        return new Promise((resolve, reject) => {
            axios.post(process.env.MIX_BASE_URL+'api/admin/delete-brands',data).then((response) => {
                context.commit(PROCESS_DELETE_BRANDS_RESPONSE_MUTATION, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                reject()
            })
        })
    }, 
}