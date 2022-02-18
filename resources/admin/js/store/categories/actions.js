import {
    PROCESS_GET_CATEGORIES_RESPONSE_MUTATION,
    PROCESS_SELECT_CATEGORY_LIST_RESPONSE_MUTATION,
    PROCESS_SUB_CATEGORY_LIST_RESPONSE_MUTATION,
    PROCESS_EXCEL_DOWNLOAD_CATEGORIES_MUTATION,
    PROCESS_EDIT_CATEGORY_LIST_RESPONSE_MUTATION,
    PROCESS_ADD_CATEGORY_RESPONSE_MUTATION,
    PROCESS_UPDATE_STATUS_CATEGORY_RESPONSE_MUTATION,
    PROCESS_DELETE_ATTRIBUTE_OPTION_RESPONSE_MUTATION,
    PROCESS_PAGINATED_SELECT_CATEGORY_LIST_RESPONSE_MUTATION
} from './mutations'
export const GET_CATEGORIES_ACTION = 'GET_CATEGORIES_ACTION'
export const LOAD_SELECT_CATEGORY_LIST_ACTION = 'LOAD_SELECT_CATEGORY_LIST_ACTION'
export const GET_SUB_CATEGORY_LIST_ACTION = 'GET_SUB_CATEGORY_LIST_ACTION'
export const GET_PAGINATED_SELECT_CATEGORY_LIST_ACTION = 'GET_PAGINATED_SELECT_CATEGORY_LIST_ACTION'
export const EXCEL_DOWNLOAD_CATEGORIES_ACTION = 'EXCEL_DOWNLOAD_CATEGORIES_ACTION'
export const LOAD_EDIT_CATEGORY_LIST_ACTION = 'LOAD_EDIT_CATEGORY_LIST_ACTION'
export const ADD_CATEGORY_LIST_ACTION = 'ADD_CATEGORY_LIST_ACTION'
export const UPDATE_CHANGE_STATUS_CATEGORY_ACTION = 'UPDATE_CHANGE_STATUS_CATEGORY_ACTION'
export const DELETE_ATTRIBUTE_OPTION = 'DELETE_ATTRIBUTE_OPTION'
export default {
    [GET_CATEGORIES_ACTION] (context,params) {
        return new Promise((resolve, reject) => {
            axios.get(process.env.MIX_BASE_URL+'api/admin/categories', params).then((response) => {
                context.commit(PROCESS_GET_CATEGORIES_RESPONSE_MUTATION, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                reject()
            })
        })
    },
    [DELETE_ATTRIBUTE_OPTION] (context,id) {
        let _this = this;
        return new Promise((resolve, reject) => {
            axios.get(process.env.MIX_BASE_URL+'api/admin/delete-attribute-option/'+id).then((response) => {
                context.commit(PROCESS_DELETE_ATTRIBUTE_OPTION_RESPONSE_MUTATION, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                reject()
            })
        })
    },
    [LOAD_EDIT_CATEGORY_LIST_ACTION] (context,id) {
        let _this = this;
        return new Promise((resolve, reject) => {
            axios.get(process.env.MIX_BASE_URL+'api/admin/get-category/'+id).then((response) => {
                context.commit(PROCESS_EDIT_CATEGORY_LIST_RESPONSE_MUTATION, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                reject()
            })
        })
    }, 
    [UPDATE_CHANGE_STATUS_CATEGORY_ACTION] (context,data) {
        let _this = this;
        return new Promise((resolve, reject) => {
            axios.post(process.env.MIX_BASE_URL+'api/admin/update-change-status-category',data).then((response) => {
                context.commit(PROCESS_UPDATE_STATUS_CATEGORY_RESPONSE_MUTATION, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                reject()
            })
        })
    }, 
    [LOAD_SELECT_CATEGORY_LIST_ACTION] (context, params={}) {
        //context.commit(TYPE_LIST_NOT_LOADED_MUTATION)
       
        return new Promise((resolve, reject) => {
            axios.get(process.env.MIX_BASE_URL+'api/admin/get-select-categories', params).then((response) => {
                context.commit(PROCESS_SELECT_CATEGORY_LIST_RESPONSE_MUTATION, response)
                resolve()
            }).catch((error) => {
                console.log(error.response.data)
                reject()
            })
        })
    },
    [GET_SUB_CATEGORY_LIST_ACTION] (context, params={}) {
        return new Promise((resolve, reject) => {
            axios.get(process.env.MIX_BASE_URL+'api/admin/get-sub-categories', params).then((response) => {
                context.commit(PROCESS_SUB_CATEGORY_LIST_RESPONSE_MUTATION, response)
                resolve()
            }).catch((error) => {
                console.log(error.response.data)
                reject()
            })
        })
    },
    [GET_PAGINATED_SELECT_CATEGORY_LIST_ACTION] (context, params={}) {     
        return new Promise((resolve, reject) => {
            axios.get(process.env.MIX_BASE_URL+'api/admin/get-paginated-select-categories', params).then((response) => {
                context.commit(PROCESS_PAGINATED_SELECT_CATEGORY_LIST_RESPONSE_MUTATION, response)
                resolve()
            }).catch((error) => {
                console.log(error.response.data)
                reject()
            })
        })
    }, 
    [EXCEL_DOWNLOAD_CATEGORIES_ACTION] (context, params) {
        return new Promise((resolve, reject) => {
            axios.get(process.env.MIX_BASE_URL+'api/admin/categories', params).then((response) => {
                context.commit(PROCESS_EXCEL_DOWNLOAD_CATEGORIES_MUTATION, response)
                resolve()
            }).catch((error) => {
                console.log(error.response.data)
                reject()
            })
        })
    },  
    [ADD_CATEGORY_LIST_ACTION] (context,data) {
        //context.commit(TYPE_LIST_NOT_LOADED_MUTATION)
        let config = { headers: { 'Accept': 'application/json','Content-Type': 'application/x-www-form-urlencoded' } };
        return new Promise((resolve, reject) => {
            axios.post(process.env.MIX_BASE_URL+'api/admin/save-category',data).then((response) => {
                context.commit(PROCESS_ADD_CATEGORY_RESPONSE_MUTATION, response)
                resolve()
            }).catch((error) => {
                console.log(error.response.data)
                reject()
            })
        })
    },
}