export const PROCESS_GET_SUBCATEGORIES_RESPONSE_MUTATION = 'PROCESS_GET_SUBCATEGORIES_RESPONSE_MUTATION'
export const PROCESS_GET_SUBCATEGORY_RESPONSE_MUTATION = 'PROCESS_GET_SUBCATEGORY_RESPONSE_MUTATION'
export const PROCESS_EXCEL_DOWNLOAD_SUBCATEGORIES_RESPONSE_MUTATION = 'PROCESS_EXCEL_DOWNLOAD_SUBCATEGORIES_RESPONSE_MUTATION'
export const PROCESS_CREATE_SUBCATEGORY_RESPONSE_MUTATION = 'PROCESS_CREATE_SUBCATEGORY_RESPONSE_MUTATION';
export const PROCESS_UPDATE_SUBCATEGORY_RESPONSE_MUTATION = 'PROCESS_UPDATE_SUBCATEGORY_RESPONSE_MUTATION'
export const PROCESS_DELETE_SUBCATEGORY_RESPONSE_MUTATION = 'PROCESS_DELETE_SUBCATEGORY_RESPONSE_MUTATION'

export default {
    [PROCESS_GET_SUBCATEGORIES_RESPONSE_MUTATION] (state, response) {
        let data = response.data;
        state.getSubCategories = data.data;
    },
    [PROCESS_GET_SUBCATEGORY_RESPONSE_MUTATION] (state, response) {
        let data = response.data;
        state.getSubCategory = data.data;
    },
    [PROCESS_CREATE_SUBCATEGORY_RESPONSE_MUTATION] (state, response) {
        let data = response.data;
        state.getError = {};
        if (data.status == 0) {
            state.getError = data.data;
            return;
        }
        state.getSubCategory = data.data;
    },
    [PROCESS_EXCEL_DOWNLOAD_SUBCATEGORIES_RESPONSE_MUTATION] (state, response) {
        let data = response.data;
        state.excelLink = data.data;
    },
    [PROCESS_UPDATE_SUBCATEGORY_RESPONSE_MUTATION] (state, response) {
        let data = response.data;
        state.getError = {};
        if (data.status == 0) {
            state.getError = data.data;
            return;
        }
        state.getSubCategory = data.data;
    },
    [PROCESS_DELETE_SUBCATEGORY_RESPONSE_MUTATION] (state, response) {
        let data = response.data;
        state.getSubCategory = data.data;
    },
}