export const PROCESS_CATEGORY_LIST_RESPONSE_MUTATION = 'PROCESS_CATEGORY_LIST_RESPONSE_MUTATION'

export default {
	 [PROCESS_CATEGORY_LIST_RESPONSE_MUTATION] (state, response) {
	 //	console.log(response)
        let data = response.data;
        state.getCategories = data;        /*
        let getdata = data.data;
        if(getdata.length){
          state.types =   getdata.map(function(item){
            if(item.status == 'A'){
                item.color = globalVars.getCompletedColor;
            }else{
                item.color = globalVars.getInCompletedColor;
            }
            return item;
        });
        state.loaded = true
        state.perPage = data.per_page
        state.currentPage = data.current_page
        state.lastPage = data.last_page
        state.path = data.path
        }*/
        

       
    },
}