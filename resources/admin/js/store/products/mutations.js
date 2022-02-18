export const PROCESS_SELECT_CATEGORY_LIST_RESPONSE_MUTATION = 'PROCESS_SELECT_CATEGORY_LIST_RESPONSE_MUTATION'
export const PROCESS_ADD_CATEGORY_RESPONSE_MUTATION = 'PROCESS_ADD_CATEGORY_RESPONSE_MUTATION'
export const PROCESS_ATTRIBUTE_BY_CATEGORY_LIST_RESPONSE_MUTATION = 'PROCESS_ATTRIBUTE_BY_CATEGORY_LIST_RESPONSE_MUTATION'
export const PROCESS_SAVE_PRODUCT_RESPONSE_MUTATION = 'PROCESS_SAVE_PRODUCT_RESPONSE_MUTATION'
export const PROCESS_SELECT_BRAND_LIST_RESPONSE_MUTATION = 'PROCESS_SELECT_BRAND_LIST_RESPONSE_MUTATION'
export const PROCESS_PRODUCT_LIST_RESPONSE_MUTATION = 'PROCESS_PRODUCT_LIST_RESPONSE_MUTATION'
export const PROCESS_GET_PRODUCT_RESPONSE_MUTATION = 'PROCESS_GET_PRODUCT_RESPONSE_MUTATION'
export const PROCESS_DELETE_PRODUCTS_RESPONSE_MUTATION = 'PROCESS_DELETE_PRODUCTS_RESPONSE_MUTATION'
export const PROCESS_DELETE_ATTRIBUTE_OPTION_PRODUCT_RESPONSE_MUTATION = 'PROCESS_DELETE_ATTRIBUTE_OPTION_PRODUCT_RESPONSE_MUTATION'
export const PROCESS_DELETE_SPECIFICATION_PRODUCT_RESPONSE_MUTATION = 'PROCESS_DELETE_SPECIFICATION_PRODUCT_RESPONSE_MUTATION'
export const PROCESS_DELETE_IMAGE_PRODUCT_RESPONSE_MUTATION = 'PROCESS_DELETE_IMAGE_PRODUCT_RESPONSE_MUTATION'
export const PROCESS_CHANGE_STATUS_PRODUCT_RESPONSE_MUTATION = 'PROCESS_CHANGE_STATUS_PRODUCT_RESPONSE_MUTATION'
export const PROCESS_GET_STOCK_TRANSFER_RECORDS = 'PROCESS_GET_STOCK_TRANSFER_RECORDS'
export const PROCESS_GET_STOCK_TRANSFER_RECORD = 'PROCESS_GET_STOCK_TRANSFER_RECORD'
export const PROCESS_ADD_STOCK_TRANSFER = 'PROCESS_ADD_STOCK_TRANSFER'
export const PROCESS_UPDATE_STOCK_TRANSFER = 'PROCESS_UPDATE_STOCK_TRANSFER'
export const PROCESS_GET_PRODUCT_REVIEWS = 'PROCESS_GET_PRODUCT_REVIEWS'
export const PROCESS_GET_PRODUCT_REVIEW = 'PROCESS_GET_PRODUCT_REVIEW'
export const PROCESS_UPDATE_PRODUCT_REVIEW = 'PROCESS_UPDATE_PRODUCT_REVIEW'
export const PROCESS_DELETE_PRODUCT_REVIEW = 'PROCESS_DELETE_PRODUCT_REVIEW'
export const PROCESS_DELETE_PRODUCT_REVIEWS = 'PROCESS_DELETE_PRODUCT_REVIEWS'

export const PROCESS_EXCEL_DOWNLOAD_PRODUCTS = 'PROCESS_EXCEL_DOWNLOAD_PRODUCTS'
export const PROCESS_EXCEL_DOWNLOAD_STOCK_TRANFER_RECORDS = 'PROCESS_EXCEL_DOWNLOAD_STOCK_TRANFER_RECORDS'
export const PROCESS_EXCEL_DOWNLOAD_PRODUCT_REVIEWS = 'PROCESS_EXCEL_DOWNLOAD_PRODUCT_REVIEWS'


export default {
    [PROCESS_CHANGE_STATUS_PRODUCT_RESPONSE_MUTATION] (state, response) {
        let data = response.data;
       console.log(data)
       
        /*if(data.status == 200)
      	state.getAttributes = data.data; */
    }, 
    [PROCESS_DELETE_IMAGE_PRODUCT_RESPONSE_MUTATION] (state, response) {
        let data = response.data;
       console.log(data)
       
        /*if(data.status == 200)
        state.getAttributes = data.data; */
    }, 
    [PROCESS_DELETE_SPECIFICATION_PRODUCT_RESPONSE_MUTATION] (state, response) {
        let data = response.data;
       console.log(data)
       
        /*if(data.status == 200)
        state.getAttributes = data.data; */
    },   
    [PROCESS_DELETE_ATTRIBUTE_OPTION_PRODUCT_RESPONSE_MUTATION] (state, response) {
        let data = response.data;
       console.log(data)
       
        /*if(data.status == 200)
        state.getAttributes = data.data; */
    },  
    [PROCESS_GET_PRODUCT_RESPONSE_MUTATION] (state, response) {
        let data = response.data;
       
        if(data.status == 200){
            state.getProduct = data.data;
           
        }
       
        /*if(data.status == 200)
        state.getAttributes = data.data; */
    }, 
    [PROCESS_DELETE_PRODUCTS_RESPONSE_MUTATION] (state, response) {
        let data = response.data;
        if(data.status == 200){
            state.getProduct = data.data;
        }
    },   
    [PROCESS_PRODUCT_LIST_RESPONSE_MUTATION] (state, response) {
        let data = response.data;
       
        if(data.status == 200){
            state.getProducts = data.data;
           
        }
       
        /*if(data.status == 200)
        state.getAttributes = data.data; */
    }, 
    [PROCESS_EXCEL_DOWNLOAD_PRODUCTS] (state, response) {
        let data = response.data;
        if(data.status == 200){
            state.excelLink = data.data;
        }
    }, 
    [PROCESS_SELECT_BRAND_LIST_RESPONSE_MUTATION] (state, response) {
        let data = response.data;
        if(data.status == 200){
            state.getBrands = data.data;
        }
       
        /*if(data.status == 200)
        state.getAttributes = data.data; */
    }, 
    [PROCESS_SAVE_PRODUCT_RESPONSE_MUTATION] (state, response) {
        let data = response.data;
        state.getError = '';
        if (data.status == 0) {
            state.getError = data.data;
        }
        /*if(data.status == 200)
      	state.getAttributes = data.data; */
    }, 
    [PROCESS_ATTRIBUTE_BY_CATEGORY_LIST_RESPONSE_MUTATION] (state, response) {
        let data = response.data;
        if(data.status == 200)
      	state.getAttributes = data.data; 
    }, 
    [PROCESS_SELECT_CATEGORY_LIST_RESPONSE_MUTATION] (state, response) {
        let data = response.data;
        state.getSelectCategories = data;      
    },
    [PROCESS_GET_STOCK_TRANSFER_RECORDS] (state, response) {
        let data = response.data;
        if(data.status == 200) {
            state.getStockTransferRecords = data.data; 
        }
    }, 
    [PROCESS_GET_STOCK_TRANSFER_RECORD] (state, response) {
        let data = response.data;
        if(data.status == 200) {
            state.getStockTransferRecord = data.data; 
        }
    }, 
    [PROCESS_ADD_STOCK_TRANSFER] (state, response) {
        let data = response.data;
        if(data.status == 200) {
            state.getStockTransferRecord = data.data; 
        }
    }, 
    [PROCESS_UPDATE_STOCK_TRANSFER] (state, response) {
        let data = response.data;
        if(data.status == 200) {
            state.getStockTransferRecord = data.data; 
        }
    }, 
    [PROCESS_EXCEL_DOWNLOAD_STOCK_TRANFER_RECORDS] (state, response) {
        let data = response.data;
        if(data.status == 200) {
            state.excelLink = data.data; 
        }
    },
    [PROCESS_GET_PRODUCT_REVIEW] (state, response) {
        let data = response.data;
        if(data.status == 200) {
            state.getProductReview = data.data; 
        }
    },
    [PROCESS_GET_PRODUCT_REVIEWS] (state, response) {
        let data = response.data;
        if(data.status == 200) {
            state.getProductReviews = data.data; 
        }
    },
    [PROCESS_UPDATE_PRODUCT_REVIEW] (state, response) {
        let data = response.data;
        if(data.status == 200) {
            state.getProductReview = data.data; 
        }
    },
    [PROCESS_DELETE_PRODUCT_REVIEW] (state, response) {
        let data = response.data;
        if(data.status == 200) {
            state.getProductReview = data.data; 
        }
    },
    [PROCESS_DELETE_PRODUCT_REVIEWS] (state, response) {
        let data = response.data;
        if(data.status == 200) {
            state.getProductReview = data.data; 
        }
    },
    [PROCESS_EXCEL_DOWNLOAD_PRODUCT_REVIEWS] (state, response) {
        let data = response.data;
        if(data.status == 200) {
            state.excelLink = data.data; 
        }
    }
}