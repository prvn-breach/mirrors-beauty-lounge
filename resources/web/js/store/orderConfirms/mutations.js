export const PROCESS_GET_ORDER_RESPONSE_MUTATION = 'PROCESS_GET_ORDER_RESPONSE_MUTATION'
export const PROCESS_GET_ORDER_BY_USER_RESPONSE_MUTATION = 'PROCESS_GET_ORDER_BY_USER_RESPONSE_MUTATION'
export const PROCESS_CHANGE_STATUS_ORDER_RESPONSE_MUTATION = 'PROCESS_CHANGE_STATUS_ORDER_RESPONSE_MUTATION'

export default {
	
    [PROCESS_CHANGE_STATUS_ORDER_RESPONSE_MUTATION] (state, response) {
        let data = response.data;
       
    },
    [PROCESS_GET_ORDER_BY_USER_RESPONSE_MUTATION] (state, response) {
        let data = response.data;
       if(data.status == 200){
          state.getOrderByUser = data.data;
       }
    },
    [PROCESS_GET_ORDER_RESPONSE_MUTATION] (state, response) {
        let data = response.data;
       if(data.status == 200){
       		state.getOrder = data.data;
       }
    }

}