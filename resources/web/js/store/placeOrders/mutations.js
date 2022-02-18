export const PROCESS_SAVE_PLACE_ORDER_RESPONSE_MUTATION = 'PROCESS_SAVE_PLACE_ORDER_RESPONSE_MUTATION'

export default {
	
    [PROCESS_SAVE_PLACE_ORDER_RESPONSE_MUTATION] (state, response) {
        let data = response.data;
       if(data.status == 200){
       		state.saveOrderResponse = data;
       }
    }

}