export const PROCESS_GET_SUBCATEGORIES_RESPONSE_MUTATION = 'PROCESS_GET_SUBCATEGORIES_RESPONSE_MUTATION'
export const PROCESS_GET_SUBCATEGORY_RESPONSE_MUTATION = 'PROCESS_GET_SUBCATEGORY_RESPONSE_MUTATION'

export default {
    [PROCESS_GET_SUBCATEGORIES_RESPONSE_MUTATION] (state, response) {
        let data = response.data;
        state.getSubCategories = data.data;
    },
    [PROCESS_GET_SUBCATEGORY_RESPONSE_MUTATION] (state, response) {
        let data = response.data;
        state.getSubCategory = data.data;
    }
}