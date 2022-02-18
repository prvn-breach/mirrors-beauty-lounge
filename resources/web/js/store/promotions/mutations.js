export const PROCESS_GET_PROMOTIONS = 'PROCESS_GET_PROMOTIONS';
export const PROCESS_GET_PROMOTION = 'PROCESS_GET_PROMOTION';

export default {
	[PROCESS_GET_PROMOTIONS] (state, response) {
        let data = response.data;
        if(data.status == 200){
            state.getPromotions = data.data;
        }
    },
    [PROCESS_GET_PROMOTION] (state, response) {
        let data = response.data;
        if(data.status == 200){
            state.getPromotion = data.data;
        }
    }
}