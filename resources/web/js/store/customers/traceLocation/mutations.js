export const PROCESS_TRACE_LIST_RESPONSE_MUTATION = 'PROCESS_TRACE_LIST_RESPONSE_MUTATION'

export default {
	 [PROCESS_TRACE_LIST_RESPONSE_MUTATION] (state, response) {
        let data = response.data;
        state.getTrace = data;
           try {
            JSON.parse(JSON.stringify(data));
            } catch (e) {
               localStorage.clear()
            }
        if(!localStorage.hasOwnProperty('countries') && data){
        	localStorage.setItem('countries',JSON.stringify(data));
        }
        if(!localStorage.hasOwnProperty('lenguage')){

            let lenguage = [
                        {'name':'English','code':'en','active':1},
                        {'name':'Arabic','code':'ar','active':0}
                    ];
            localStorage.setItem('lenguage',JSON.stringify(lenguage));
        }
         if(!localStorage.hasOwnProperty('locale')){
       			localStorage.setItem('locale',JSON.stringify({'name':'English','code':'en','active':1}));
        }
    },

}