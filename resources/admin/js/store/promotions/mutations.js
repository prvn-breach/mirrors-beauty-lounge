export const PROCESS_GET_PROMOTIONS = 'PROCESS_GET_PROMOTIONS';
export const PROCESS_GET_PROMOTION = 'PROCESS_GET_PROMOTION';
export const PROCESS_ADD_PROMOTION = 'PROCESS_ADD_PROMOTION';
export const PROCESS_DELETE_PROMOTION = 'PROCESS_DELETE_PROMOTION';
export const PROCESS_UPDATE_PROMOTION = 'PROCESS_UPDATE_PROMOTION';

export const PROCESS_EXCEL_DOWNLOAD_PROMOTIONS = 'PROCESS_EXCEL_DOWNLOAD_PROMOTIONS';

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
    },
    [PROCESS_ADD_PROMOTION] (state, response) {
        let data = response.data;
        if(data.status == 200){
            state.getPromotion = data.data;
        }
    },
    [PROCESS_DELETE_PROMOTION] (state, response) {
        let data = response.data;
        if(data.status == 200){
            state.getPromotion = data.data;
        }
    },
    [PROCESS_UPDATE_PROMOTION] (state, response) {
        let data = response.data;
        if(data.status == 200){
            state.getPromotion = data.data;
        }
    },
    [PROCESS_EXCEL_DOWNLOAD_PROMOTIONS] (state, response) {
        let data = response.data;
        if(data.status == 200){
            state.excelLink = data.data;
        }
    }
}