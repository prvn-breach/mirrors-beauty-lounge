export const PROCESS_GET_BANNER_BY_TYPE_RESPONSE_MUTATION = 'PROCESS_GET_BANNER_BY_TYPE_RESPONSE_MUTATION'
export const PROCESS_GET_BANNER_HOME_DEAL_BY_TYPE_RESPONSE_MUTATION = 'PROCESS_GET_BANNER_HOME_DEAL_BY_TYPE_RESPONSE_MUTATION'

export default {
	 [PROCESS_GET_BANNER_HOME_DEAL_BY_TYPE_RESPONSE_MUTATION] (state, response) {
        let data = response.data;
       if(data.status == 200)
        state.getDealBanner = data.data;  
    },
    [PROCESS_GET_BANNER_BY_TYPE_RESPONSE_MUTATION] (state, response) {
        let data = response.data;
       if(data.status == 200)
        state.getBanner = data.data;  
    },
   

}