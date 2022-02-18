export const PROCESS_GET_COUPONS = 'PROCESS_GET_COUPONS';
export const PROCESS_GET_COUPON = 'PROCESS_GET_COUPON';
export const PROCESS_CREATE_COUPON = 'PROCESS_CREATE_COUPON';
export const PROCESS_DELETE_COUPON = 'PROCESS_DELETE_COUPON';
export const PROCESS_UPDATE_COUPON = 'PROCESS_UPDATE_COUPON';

export const PROCESS_EXCEL_DOWNLOAD_COUPONS = 'PROCESS_EXCEL_DOWNLOAD_COUPONS';

export default {
	[PROCESS_GET_COUPONS] (state, response) {
        let data = response.data;
        if(data.status == 200) {
      	    state.getCoupons = data.data; 
        }
    },
    [PROCESS_GET_COUPON] (state, response) {
        let data = response.data;
        if(data.status == 200) {
      	    state.getCoupon = data.data; 
        }
    },
    [PROCESS_EXCEL_DOWNLOAD_COUPONS] (state, response) {
        let data = response.data;
        if(data.status == 200) {
      	    state.excelLink = data.data; 
        }
    },
    [PROCESS_CREATE_COUPON] (state, response) {
        let data = response.data;
        if(data.status == 200) {
      	    state.getCoupon = data.data; 
        }
    },
    [PROCESS_DELETE_COUPON] (state, response) {
        let data = response.data;
        if(data.status == 200) {
      	    state.getCoupon = data.data; 
        }
    },
    [PROCESS_UPDATE_COUPON] (state, response) {
        let data = response.data;
        if(data.status == 200) {
      	    state.getCoupon = data.data; 
        }
    }
}