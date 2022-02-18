export const PROCESS_GET_CATEGORIES_RESPONSE_MUTATION = 'PROCESS_GET_CATEGORIES_RESPONSE_MUTATION'
export const PROCESS_SELECT_CATEGORY_LIST_RESPONSE_MUTATION = 'PROCESS_SELECT_CATEGORY_LIST_RESPONSE_MUTATION'
export const PROCESS_SUB_CATEGORY_LIST_RESPONSE_MUTATION = 'PROCESS_SUB_CATEGORY_LIST_RESPONSE_MUTATION'
export const PROCESS_PAGINATED_SELECT_CATEGORY_LIST_RESPONSE_MUTATION = 'PROCESS_PAGINATED_SELECT_CATEGORY_LIST_RESPONSE_MUTATION';
export const PROCESS_EXCEL_DOWNLOAD_CATEGORIES_MUTATION = 'PROCESS_EXCEL_DOWNLOAD_CATEGORIES_MUTATION'
export const PROCESS_ADD_CATEGORY_RESPONSE_MUTATION = 'PROCESS_ADD_CATEGORY_RESPONSE_MUTATION'
export const PROCESS_UPDATE_STATUS_CATEGORY_RESPONSE_MUTATION = 'PROCESS_UPDATE_STATUS_CATEGORY_RESPONSE_MUTATION'
export const PROCESS_EDIT_CATEGORY_LIST_RESPONSE_MUTATION = 'PROCESS_EDIT_CATEGORY_LIST_RESPONSE_MUTATION'
export const PROCESS_DELETE_ATTRIBUTE_OPTION_RESPONSE_MUTATION = 'PROCESS_DELETE_ATTRIBUTE_OPTION_RESPONSE_MUTATION'

export default {
    [PROCESS_DELETE_ATTRIBUTE_OPTION_RESPONSE_MUTATION] (state, response) {
        let data = response.data;
        /*if(data.status == 200){
            state.getCategory = data.data;
        }*/
        /*if(data.status == 200){
            state.getBrand = data.data;
        }*/
    },
    [PROCESS_EDIT_CATEGORY_LIST_RESPONSE_MUTATION] (state, response) {
        let data = response.data;
        if(data.status == 200){
            state.getCategory = data.data;
        }
        /*if(data.status == 200){
            state.getBrand = data.data;
        }*/
    }, 
    [PROCESS_UPDATE_STATUS_CATEGORY_RESPONSE_MUTATION] (state, response) {
        let data = response.data;
        console.log(data)
        /*if(data.status == 200){
            state.getBrand = data.data;
        }*/
    }, 
    [PROCESS_SELECT_CATEGORY_LIST_RESPONSE_MUTATION] (state, response) {
        let data = response.data;
        state.getSelectCategories = data;      
    },
    [PROCESS_GET_CATEGORIES_RESPONSE_MUTATION] (state, response) {
        let data = response.data;
        state.getCategories = data.data;      
    },
    [PROCESS_SUB_CATEGORY_LIST_RESPONSE_MUTATION] (state, response) {
        let data = response.data;
        state.getSubCategories = data.data;      
    },
    [PROCESS_PAGINATED_SELECT_CATEGORY_LIST_RESPONSE_MUTATION] (state, response) {
        let data = response.data;
        state.getSelectCategories = data;      
    },
    [PROCESS_EXCEL_DOWNLOAD_CATEGORIES_MUTATION] (state, response) {
        state.excelLink = response.data.data;   
    },
    [PROCESS_ADD_CATEGORY_RESPONSE_MUTATION] (state, response) {
        let data = response.data;
         console.log(data)
    },
}