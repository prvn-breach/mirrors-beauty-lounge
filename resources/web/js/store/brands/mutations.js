export const PROCESS_GET_BRAND_LIST_RESPONSE_MUTATION = 'PROCESS_GET_BRAND_LIST_RESPONSE_MUTATION'
export default {
	 [PROCESS_GET_BRAND_LIST_RESPONSE_MUTATION] (state, response) {
        let data = response.data;
       if(data.status == 200)
        state.getBrands = data.data;  
    },
    
   

}