export const PROCESS_PRODUCTS_LIST_RESPONSE_MUTATION = 'PROCESS_PRODUCTS_LIST_RESPONSE_MUTATION'
export const PROCESS_PRODUCTS_FILTER_RESPONSE_MUTATION = 'PROCESS_PRODUCTS_FILTER_RESPONSE_MUTATION'
export const PROCESS_PRODUCTS_DESCRIPTION_RESPONSE_MUTATION = 'PROCESS_PRODUCTS_DESCRIPTION_RESPONSE_MUTATION'
export const PROCESS_VAT_RESPONSE_MUTATION = 'PROCESS_VAT_RESPONSE_MUTATION'
export const PROCESS_PRODUCT_DEAL_LIST_RESPONSE_MUTATION = 'PROCESS_PRODUCT_DEAL_LIST_RESPONSE_MUTATION'
export const PROCESS_PRODUCT_CATEGORY_LIST_RESPONSE_MUTATION = 'PROCESS_PRODUCT_CATEGORY_LIST_RESPONSE_MUTATION'

export default {
	 [PROCESS_PRODUCT_CATEGORY_LIST_RESPONSE_MUTATION] (state, response) {
        let data = response.data;
       if(data.status == 200)
      	state.getCategoryByProducts = data.data;
    },
    [PROCESS_PRODUCT_DEAL_LIST_RESPONSE_MUTATION] (state, response) {
        let data = response.data;
       if(data.status == 200)
        state.getProductDeals = data.data;
    },
    [PROCESS_VAT_RESPONSE_MUTATION] (state, response) {
        let data = response.data;
       if(data.status == 200)
        state.getVat = data.data;
    },
    [PROCESS_PRODUCTS_DESCRIPTION_RESPONSE_MUTATION] (state, response) {
        let data = response.data;
       if(data.status == 200)
        state.getProduct = data.data;
    },
    [PROCESS_PRODUCTS_FILTER_RESPONSE_MUTATION] (state, response) {
        let data = response.data;
       if(data.status == 200)
        state.getFilters = data.data;
    },
    [PROCESS_PRODUCTS_LIST_RESPONSE_MUTATION] (state, response) {
        let data = response.data;
       if(data.status == 200)
      state.getProducts = data.data;
    },

}