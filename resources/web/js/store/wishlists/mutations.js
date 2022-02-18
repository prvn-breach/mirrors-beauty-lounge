export const PROCESS_WISH_LIST_RESPONSE_MUTATION = 'PROCESS_WISH_LIST_RESPONSE_MUTATION'
export const PROCESS_SAVE_WISH_LIST_RESPONSE_MUTATION = 'PROCESS_SAVE_WISH_LIST_RESPONSE_MUTATION'
export const PROCESS_WISH_LIST_BY_USER_RESPONSE_MUTATION = 'PROCESS_WISH_LIST_BY_USER_RESPONSE_MUTATION'

export default {
	 [PROCESS_WISH_LIST_BY_USER_RESPONSE_MUTATION] (state, response) {
        let data = response.data;
       if(data.status == 200)
      	state.getWishLists = data.data;
    }, 
    [PROCESS_SAVE_WISH_LIST_RESPONSE_MUTATION] (state, response) {
        let data = response.data;
       /*if(data.status == 200)
        state.getWishLists = data.data;*/
    },
    [PROCESS_WISH_LIST_RESPONSE_MUTATION] (state, response) {
        let data = response.data;
       if(data.status == 200)
        state.getWishLists = data.data;
       // localStorage.setItem('getWishlists',JSON.stringify(data.data));
    }

}