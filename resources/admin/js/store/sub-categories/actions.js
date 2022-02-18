import {
    PROCESS_GET_SUBCATEGORIES_RESPONSE_MUTATION,
    PROCESS_GET_SUBCATEGORY_RESPONSE_MUTATION,
    PROCESS_EXCEL_DOWNLOAD_SUBCATEGORIES_RESPONSE_MUTATION,
    PROCESS_CREATE_SUBCATEGORY_RESPONSE_MUTATION,
    PROCESS_UPDATE_SUBCATEGORY_RESPONSE_MUTATION,
    PROCESS_DELETE_SUBCATEGORY_RESPONSE_MUTATION
} from './mutations'
export const GET_SUBCATEGORIES_ACTION = 'GET_SUBCATEGORIES_ACTION'
export const EXCEL_DOWNLOAD_SUBCATEGORIES_ACTION = 'EXCEL_DOWNLOAD_SUBCATEGORIES_ACTION'
export const GET_SUBCATEGORY_ACTION = 'GET_SUBCATEGORY_ACTION'
export const CREATE_SUBCATEGORY_ACTION = 'CREATE_SUBCATEGORY_ACTION'
export const UPDATE_SUBCATEGORY_ACTION = 'UPDATE_SUBCATEGORY_ACTION'
export const DELETE_SUBCATEGORY_ACTION = 'DELETE_SUBCATEGORY_ACTION'
export default {
    [GET_SUBCATEGORIES_ACTION] (context,params) {
        return new Promise((resolve, reject) => {
            axios.get(process.env.MIX_BASE_URL+'api/admin/sub-categories', params).then((response) => {
                context.commit(PROCESS_GET_SUBCATEGORIES_RESPONSE_MUTATION, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                reject()
            })
        })
    },
    [EXCEL_DOWNLOAD_SUBCATEGORIES_ACTION] (context,params) {
        return new Promise((resolve, reject) => {
            axios.get(process.env.MIX_BASE_URL+'api/admin/sub-categories', params).then((response) => {
                context.commit(PROCESS_EXCEL_DOWNLOAD_SUBCATEGORIES_RESPONSE_MUTATION, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                reject()
            })
        })
    },
    [GET_SUBCATEGORY_ACTION] (context,params) {
        return new Promise((resolve, reject) => {
            axios.get(process.env.MIX_BASE_URL+'api/admin/sub-category', params).then((response) => {
                context.commit(PROCESS_GET_SUBCATEGORY_RESPONSE_MUTATION, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                reject()
            })
        })
    },
    [CREATE_SUBCATEGORY_ACTION] (context,params) {
        return new Promise((resolve, reject) => {
            axios.post(process.env.MIX_BASE_URL+'api/admin/create-sub-category', params).then((response) => {
                context.commit(PROCESS_CREATE_SUBCATEGORY_RESPONSE_MUTATION, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                reject()
            })
        })
    },
    [UPDATE_SUBCATEGORY_ACTION] (context,params) {
        return new Promise((resolve, reject) => {
            axios.post(process.env.MIX_BASE_URL+'api/admin/update-sub-category', params).then((response) => {
                context.commit(PROCESS_DELETE_SUBCATEGORY_RESPONSE_MUTATION, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                reject()
            })
        })
    },
    [DELETE_SUBCATEGORY_ACTION] (context,params) {
        return new Promise((resolve, reject) => {
            axios.post(process.env.MIX_BASE_URL+'api/admin/delete-sub-category', params).then((response) => {
                context.commit(PROCESS_UPDATE_SUBCATEGORY_RESPONSE_MUTATION, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                reject()
            })
        })
    }
}