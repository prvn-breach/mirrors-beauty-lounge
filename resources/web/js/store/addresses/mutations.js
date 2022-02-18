export const PROCESS_SAVE_ADDRESS_RESPONSE_MUTATION = 'PROCESS_SAVE_ADDRESS_RESPONSE_MUTATION'
export const PROCESS_GET_ADDRESS_RESPONSE_MUTATION = 'PROCESS_GET_ADDRESS_RESPONSE_MUTATION'
export const PROCESS_GET_ADDRESS_BY_ID_RESPONSE_MUTATION = 'PROCESS_GET_ADDRESS_BY_ID_RESPONSE_MUTATION'
export const PROCESS_DELETE_ADDRESS_RESPONSE_MUTATION = 'PROCESS_DELETE_ADDRESS_RESPONSE_MUTATION'
export const PROCESS_SAVE_CART_ADDRESS_RESPONSE_MUTATION = 'PROCESS_SAVE_CART_ADDRESS_RESPONSE_MUTATION'

export default {
	 [PROCESS_SAVE_CART_ADDRESS_RESPONSE_MUTATION] (state, response) {
        let data = response.data;
        console.log(data) 	
    },
    [PROCESS_DELETE_ADDRESS_RESPONSE_MUTATION] (state, response) {
        let data = response.data;
        console.log(data)   
    }, 
    [PROCESS_SAVE_ADDRESS_RESPONSE_MUTATION] (state, response) {
        let data = response.data;
        console.log(data)   
    },
    [PROCESS_GET_ADDRESS_RESPONSE_MUTATION] (state, response) {
        let data = response.data;
       if(data.status == 200)
        state.getAddresses = data.data;  
    },
    [PROCESS_GET_ADDRESS_BY_ID_RESPONSE_MUTATION] (state, response) {
        let data = response.data;
       if(data.status == 200)
        state.getAddress = data.data;  
    },

}