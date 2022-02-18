export const PROCESS_CART_LIST_RESPONSE_MUTATION = 'PROCESS_CART_LIST_RESPONSE_MUTATION'
export const PROCESS_SAVE_CART_RESPONSE_MUTATION = 'PROCESS_SAVE_CART_RESPONSE_MUTATION'
export const PROCESS_REMOVE_CART_ITEM_RESPONSE_MUTATION = 'PROCESS_REMOVE_CART_ITEM_RESPONSE_MUTATION'
export const PROCESS_QTY_CART_ITEM_RESPONSE_MUTATION = 'PROCESS_QTY_CART_ITEM_RESPONSE_MUTATION'
export const PROCESS_UPDATE_CART_MUTATION = 'PROCESS_UPDATE_CART_MUTATION'

export default {
    [PROCESS_QTY_CART_ITEM_RESPONSE_MUTATION] (state, response) {
        let data = response.data;
        if (data.status == 0){
            state.getError = data.message;
        } else {
            state.getError = '';
        }
       /*if(data.status == 200)
        state.getWishLists = data.data;*/
    }, 
    [PROCESS_REMOVE_CART_ITEM_RESPONSE_MUTATION] (state, response) {
        let data = response.data;
       /*if(data.status == 200)
        state.getWishLists = data.data;*/
    },
    [PROCESS_SAVE_CART_RESPONSE_MUTATION] (state, response) {
        let data = response.data;
       /*if(data.status == 200)
        state.getWishLists = data.data;*/
    },
    [PROCESS_CART_LIST_RESPONSE_MUTATION] (state, response) {
        let data = response.data;
       if(data.status == 200){
        state.getCarts = data.data;
       }
       // localStorage.setItem('getWishlists',JSON.stringify(data.data));
    },
    [PROCESS_UPDATE_CART_MUTATION] (state, response) {
        let data = response.data;
    }
}