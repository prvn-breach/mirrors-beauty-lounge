export const PROCESS_GET_PICKUP_RESPONSE_MUTATION = 'PROCESS_GET_PICKUP_RESPONSE_MUTATION'
export const PROCESS_GET_PICKUP_BY_ID_RESPONSE_MUTATION = 'PROCESS_GET_PICKUP_BY_ID_RESPONSE_MUTATION'
export const PROCESS_SAVE_PICKUP_IN_CART_RESPONSE_MUTATION = 'PROCESS_SAVE_PICKUP_IN_CART_RESPONSE_MUTATION'
export const PROCESS_DELETE_PICKUP_LOCATION_RESPONSE_MUTATION = 'PROCESS_DELETE_PICKUP_LOCATION_RESPONSE_MUTATION'

export default {
	 
    [PROCESS_DELETE_PICKUP_LOCATION_RESPONSE_MUTATION] (state, response) {
        let data = response.data;
      console.log(data)
    },
    [PROCESS_SAVE_PICKUP_IN_CART_RESPONSE_MUTATION] (state, response) {
        let data = response.data;
      console.log(data)
    },
    [PROCESS_GET_PICKUP_RESPONSE_MUTATION] (state, response) {
        let data = response.data;
       if(data.status == 200)
        state.getPickupLocations = data.data;  
    },
    [PROCESS_GET_PICKUP_BY_ID_RESPONSE_MUTATION] (state, response) {
        let data = response.data;
       if(data.status == 200)
        state.getPickupLocation = data.data;  
    },

}