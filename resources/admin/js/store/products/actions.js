import {
    PROCESS_SELECT_CATEGORY_LIST_RESPONSE_MUTATION,
    PROCESS_ATTRIBUTE_BY_CATEGORY_LIST_RESPONSE_MUTATION,
    PROCESS_SAVE_PRODUCT_RESPONSE_MUTATION,
    PROCESS_SELECT_BRAND_LIST_RESPONSE_MUTATION,
    PROCESS_PRODUCT_LIST_RESPONSE_MUTATION,
    PROCESS_DELETE_PRODUCTS_RESPONSE_MUTATION,
    PROCESS_GET_PRODUCT_RESPONSE_MUTATION,
    PROCESS_DELETE_ATTRIBUTE_OPTION_PRODUCT_RESPONSE_MUTATION,
    PROCESS_DELETE_SPECIFICATION_PRODUCT_RESPONSE_MUTATION,
    PROCESS_DELETE_IMAGE_PRODUCT_RESPONSE_MUTATION,
    PROCESS_CHANGE_STATUS_PRODUCT_RESPONSE_MUTATION,
    PROCESS_GET_STOCK_TRANSFER_RECORDS,
    PROCESS_GET_STOCK_TRANSFER_RECORD,
    PROCESS_ADD_STOCK_TRANSFER,
    PROCESS_UPDATE_STOCK_TRANSFER,
    PROCESS_GET_PRODUCT_REVIEWS,
    PROCESS_GET_PRODUCT_REVIEW,
    PROCESS_UPDATE_PRODUCT_REVIEW,
    PROCESS_DELETE_PRODUCT_REVIEW,
    PROCESS_DELETE_PRODUCT_REVIEWS,
    
    PROCESS_EXCEL_DOWNLOAD_PRODUCTS,
    PROCESS_EXCEL_DOWNLOAD_STOCK_TRANFER_RECORDS,
    PROCESS_EXCEL_DOWNLOAD_PRODUCT_REVIEWS

   
} from './mutations'
export const LOAD_SELECT_CATEGORY_LIST_ACTION = 'LOAD_SELECT_CATEGORY_LIST_ACTION'
export const LOAD_PRODUCTS_LIST_ACTION = 'LOAD_PRODUCTS_LIST_ACTION'
export const DELETE_PRODUCTS_ACTION = 'DELETE_PRODUCTS_ACTION'
export const LOAD_SELECT_BRAND_LIST_ACTION = 'LOAD_SELECT_BRAND_LIST_ACTION'
export const LOAD_ATTRIBUTE_BY_CATEGORY_ACTION = 'LOAD_ATTRIBUTE_BY_CATEGORY_ACTION'
export const ADD_PRODUCT_ACTION = 'ADD_PRODUCT_ACTION'
export const LOAD_GET_PRODUCT_ACTION = 'LOAD_GET_PRODUCT_ACTION'
export const DELETE_ATTRIBUTE_OPTION_PRODUCT_ACTION = 'DELETE_ATTRIBUTE_OPTION_PRODUCT_ACTION'
export const DELETE_SPECIFICATION_PRODUCT_ACTION = 'DELETE_SPECIFICATION_PRODUCT_ACTION'
export const DELETE_PRODUCT_IMAGE_ACTION = 'DELETE_PRODUCT_IMAGE_ACTION'
export const UPDATE_CHANGE_STATUS_PRODUCT_ACTION = 'UPDATE_CHANGE_STATUS_PRODUCT_ACTION'
export const GET_STOCK_TRANSFER_RECORDS_ACTION = 'GET_STOCK_TRANSFER_RECORDS_ACTION'; 
export const GET_STOCK_TRANSFER_RECORD_ACTION = 'GET_STOCK_TRANSFER_RECORD_ACTION'; 
export const ADD_STOCK_TRANSFER_ACTION = 'ADD_STOCK_TRANSFER_ACTION'; 
export const UPDATE_STOCK_TRANSFER_ACTION = 'UPDATE_STOCK_TRANSFER_ACTION';
export const GET_PRODUCT_REVIEWS_ACTION = 'GET_PRODUCT_REVIEWS_ACTION';
export const GET_PRODUCT_REVIEW_ACTION = 'GET_PRODUCT_REVIEW_ACTION';
export const UPDATE_PRODUCT_REVIEW_ACTION = 'UPDATE_PRODUCT_REVIEW_ACTION';
export const DELETE_PRODUCT_REVIEW_ACTION = 'DELETE_PRODUCT_REVIEW_ACTION';
export const DELETE_PRODUCT_REVIEWS_ACTION = 'DELETE_PRODUCT_REVIEWS_ACTION';

export const EXCEL_DOWNLOAD_PRODUCTS_ACTION = 'EXCEL_DOWNLOAD_PRODUCTS_ACTION'; 
export const EXCEL_DOWNLOAD_STOCK_TRANFER_RECORDS_ACTION = 'EXCEL_DOWNLOAD_STOCK_TRANFER_RECORDS_ACTION'; 
export const EXCEL_DOWNLOAD_GET_PRODUCT_REVIEWS_ACTION = 'EXCEL_DOWNLOAD_GET_PRODUCT_REVIEWS_ACTION'; 

export default {
    [UPDATE_CHANGE_STATUS_PRODUCT_ACTION] (context,status) {
        let _this = this;
        return new Promise((resolve, reject) => {
            axios.post(process.env.MIX_BASE_URL+'api/admin/change-product-status',status).then((response) => {
                context.commit(PROCESS_CHANGE_STATUS_PRODUCT_RESPONSE_MUTATION, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                reject()
            })
        })
    },  
    [DELETE_PRODUCT_IMAGE_ACTION] (context,image_id) {
        let _this = this;
        return new Promise((resolve, reject) => {
            axios.get(process.env.MIX_BASE_URL+'api/admin/delete-product-image/'+image_id).then((response) => {
                context.commit(PROCESS_DELETE_IMAGE_PRODUCT_RESPONSE_MUTATION, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                reject()
            })
        })
    }, 
    [DELETE_SPECIFICATION_PRODUCT_ACTION] (context,specification_id) {
        let _this = this;
        return new Promise((resolve, reject) => {
            axios.get(process.env.MIX_BASE_URL+'api/admin/delete-specification-product/'+specification_id).then((response) => {
                context.commit(PROCESS_DELETE_SPECIFICATION_PRODUCT_RESPONSE_MUTATION, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                reject()
            })
        })
    }, 
    [DELETE_ATTRIBUTE_OPTION_PRODUCT_ACTION] (context,options) {
        let _this = this;

        return new Promise((resolve, reject) => {
            axios.post(process.env.MIX_BASE_URL+'api/admin/delete-product-attribute-option',options).then((response) => {
                context.commit(PROCESS_DELETE_ATTRIBUTE_OPTION_PRODUCT_RESPONSE_MUTATION, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                reject()
            })
        })
    },
    [LOAD_GET_PRODUCT_ACTION] (context,product_id) {
        let _this = this;

        return new Promise((resolve, reject) => {
            axios.get(process.env.MIX_BASE_URL+'api/admin/get-product/'+product_id).then((response) => {
                context.commit(PROCESS_GET_PRODUCT_RESPONSE_MUTATION, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                reject()
            })
        })
    },
    [LOAD_PRODUCTS_LIST_ACTION] (context,params) {
        return new Promise((resolve, reject) => {
            axios.get(process.env.MIX_BASE_URL+'api/admin/get-products', params).then((response) => {
                context.commit(PROCESS_PRODUCT_LIST_RESPONSE_MUTATION, response)
                resolve()
            }).catch((error) => {
                console.log(error.response.data)
                reject()
            })
        })
    },
    [DELETE_PRODUCTS_ACTION] (context,params) {
        return new Promise((resolve, reject) => {
            axios.post(process.env.MIX_BASE_URL+'api/admin/delete-products', params).then((response) => {
                context.commit(PROCESS_DELETE_PRODUCTS_RESPONSE_MUTATION, response)
                resolve()
            }).catch((error) => {
                console.log(error.response.data)
                reject()
            })
        })
    },
    [EXCEL_DOWNLOAD_PRODUCTS_ACTION] (context,params) {
        return new Promise((resolve, reject) => {
            axios.post(process.env.MIX_BASE_URL+'api/admin/get-products', params).then((response) => {
                context.commit(PROCESS_EXCEL_DOWNLOAD_PRODUCTS, response)
                resolve()
            }).catch((error) => {
                console.log(error.response.data)
                reject()
            })
        })
    },  
    [LOAD_SELECT_BRAND_LIST_ACTION] (context,category_id) {
        return new Promise((resolve, reject) => {
            axios.get(process.env.MIX_BASE_URL+'api/admin/get-select-brands/'+category_id).then((response) => {
                context.commit(PROCESS_SELECT_BRAND_LIST_RESPONSE_MUTATION, response)
                resolve()
            }).catch((error) => {
                console.log(error.response.data)
                reject()
            })
        })
    },  
    [ADD_PRODUCT_ACTION] (context,data) {
        //context.commit(TYPE_LIST_NOT_LOADED_MUTATION)
       
        return new Promise((resolve, reject) => {
            axios.post(process.env.MIX_BASE_URL+'api/admin/save-products',data).then((response) => {
                context.commit(PROCESS_SAVE_PRODUCT_RESPONSE_MUTATION, response)
                resolve()
            }).catch((error) => {
                console.log(error.response.data)
                reject()
            })
        })
    },  
    [LOAD_SELECT_CATEGORY_LIST_ACTION] (context) {
        //context.commit(TYPE_LIST_NOT_LOADED_MUTATION)
       
        return new Promise((resolve, reject) => {
            axios.get(process.env.MIX_BASE_URL+'api/admin/get-select-categories').then((response) => {
                context.commit(PROCESS_SELECT_CATEGORY_LIST_RESPONSE_MUTATION, response)
                resolve()
            }).catch((error) => {
                console.log(error.response.data)
                reject()
            })
        })
    },  
    [LOAD_ATTRIBUTE_BY_CATEGORY_ACTION] (context,id) {
        //context.commit(TYPE_LIST_NOT_LOADED_MUTATION)
       
        return new Promise((resolve, reject) => {
            axios.get(process.env.MIX_BASE_URL+'api/admin/get-attribute-by-categories/'+id).then((response) => {
                context.commit(PROCESS_ATTRIBUTE_BY_CATEGORY_LIST_RESPONSE_MUTATION, response)
                resolve()
            }).catch((error) => {
                console.log(error.response.data)
                reject()
            })
        })
    },  
    [GET_STOCK_TRANSFER_RECORDS_ACTION] (context, params) {
        return new Promise((resolve, reject) => {
            axios.get(process.env.MIX_BASE_URL+'api/admin/get-stock-transfer', params).then((response) => {
                context.commit(PROCESS_GET_STOCK_TRANSFER_RECORDS, response)
                resolve()
            }).catch((error) => {
                console.log(error.response.data)
                reject()
            })
        })
    },
    [GET_STOCK_TRANSFER_RECORD_ACTION] (context, id) {
        return new Promise((resolve, reject) => {
            axios.get(process.env.MIX_BASE_URL+'api/admin/get-stock/'+id).then((response) => {
                context.commit(PROCESS_GET_STOCK_TRANSFER_RECORD, response)
                resolve()
            }).catch((error) => {
                console.log(error.response.data)
                reject()
            })
        })
    },
    [ADD_STOCK_TRANSFER_ACTION] (context, params) {
        return new Promise((resolve, reject) => {
            axios.post(process.env.MIX_BASE_URL+'api/admin/create-stock-transfer', params).then((response) => {
                context.commit(PROCESS_ADD_STOCK_TRANSFER, response)
                resolve()
            }).catch((error) => {
                console.log(error.response.data)
                reject()
            })
        })
    }, 
    [UPDATE_STOCK_TRANSFER_ACTION] (context, params) {
        return new Promise((resolve, reject) => {
            axios.post(process.env.MIX_BASE_URL+'api/admin/update-stock-transfer', params).then((response) => {
                context.commit(PROCESS_UPDATE_STOCK_TRANSFER, response)
                resolve()
            }).catch((error) => {
                console.log(error.response.data)
                reject()
            })
        })
    }, 
    [EXCEL_DOWNLOAD_STOCK_TRANFER_RECORDS_ACTION] (context, params) {
        return new Promise((resolve, reject) => {
            axios.get(process.env.MIX_BASE_URL+'api/admin/get-stock-transfer', params).then((response) => {
                context.commit(PROCESS_EXCEL_DOWNLOAD_STOCK_TRANFER_RECORDS, response)
                resolve()
            }).catch((error) => {
                console.log(error.response.data)
                reject()
            })
        })
    },
    [GET_PRODUCT_REVIEWS_ACTION] (context, params) {
        return new Promise((resolve, reject) => {
            axios.get(process.env.MIX_BASE_URL+'api/admin/get-product-reviews', params).then((response) => {
                context.commit(PROCESS_GET_PRODUCT_REVIEWS, response)
                resolve()
            }).catch((error) => {
                console.log(error.response.data)
                reject()
            })
        })
    },
    [GET_PRODUCT_REVIEW_ACTION] (context, params) {
        return new Promise((resolve, reject) => {
            axios.get(process.env.MIX_BASE_URL+'api/admin/get-product-review', params).then((response) => {
                context.commit(PROCESS_GET_PRODUCT_REVIEW, response)
                resolve()
            }).catch((error) => {
                console.log(error.response.data)
                reject()
            })
        })
    },
    [UPDATE_PRODUCT_REVIEW_ACTION] (context, params) {
        return new Promise((resolve, reject) => {
            axios.post(process.env.MIX_BASE_URL+'api/admin/update-product-review', params).then((response) => {
                context.commit(PROCESS_UPDATE_PRODUCT_REVIEW, response)
                resolve()
            }).catch((error) => {
                console.log(error.response.data)
                reject()
            })
        })
    },
    [DELETE_PRODUCT_REVIEW_ACTION] (context, params) {
        return new Promise((resolve, reject) => {
            axios.post(process.env.MIX_BASE_URL+'api/admin/delete-product-review', params).then((response) => {
                context.commit(PROCESS_DELETE_PRODUCT_REVIEW, response)
                resolve()
            }).catch((error) => {
                console.log(error.response.data)
                reject()
            })
        })
    },
    [DELETE_PRODUCT_REVIEWS_ACTION] (context, params) {
        return new Promise((resolve, reject) => {
            axios.post(process.env.MIX_BASE_URL+'api/admin/delete-product-reviews', params).then((response) => {
                context.commit(PROCESS_DELETE_PRODUCT_REVIEWS, response)
                resolve()
            }).catch((error) => {
                console.log(error.response.data)
                reject()
            })
        })
    },
    [EXCEL_DOWNLOAD_GET_PRODUCT_REVIEWS_ACTION] (context, params) {
        return new Promise((resolve, reject) => {
            axios.get(process.env.MIX_BASE_URL+'api/admin/get-product-reviews', params).then((response) => {
                context.commit(PROCESS_EXCEL_DOWNLOAD_PRODUCT_REVIEWS, response)
                resolve()
            }).catch((error) => {
                console.log(error.response.data)
                reject()
            })
        })
    }
}