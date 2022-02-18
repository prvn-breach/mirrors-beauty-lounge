export const PROCESS_SAVE_COMPARE_RESPONSE_MUTATION = 'PROCESS_SAVE_COMPARE_RESPONSE_MUTATION'
export const PROCESS_GET_COMPARE_RESPONSE_MUTATION = 'PROCESS_GET_COMPARE_RESPONSE_MUTATION'
export const PROCESS_GET_COMPARE_BY_ID_RESPONSE_MUTATION = 'PROCESS_GET_COMPARE_BY_ID_RESPONSE_MUTATION'
export const PROCESS_DELETE_COMPARE_RESPONSE_MUTATION = 'PROCESS_DELETE_COMPARE_RESPONSE_MUTATION'
export const PROCESS_SAVE_CART_ADDRESS_RESPONSE_MUTATION = 'PROCESS_SAVE_CART_ADDRESS_RESPONSE_MUTATION'

export default {
	
    [PROCESS_DELETE_COMPARE_RESPONSE_MUTATION] (state, response) {
        let data = response.data;
        console.log(data)   
    }, 
    [PROCESS_SAVE_COMPARE_RESPONSE_MUTATION] (state, response) {
        let data = response.data;
        console.log(data)   
    },
    [PROCESS_GET_COMPARE_RESPONSE_MUTATION] (state, response) {
        let data = response.data;
       if(data.status == 200)
        state.getCompares = data.data;  
    },
    [PROCESS_GET_COMPARE_BY_ID_RESPONSE_MUTATION] (state, response) {
        let data = response.data;
       if(data.status == 200)
        state.getCompare = data.data;  
    },

}