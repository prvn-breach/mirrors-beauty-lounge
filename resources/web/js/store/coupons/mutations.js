export const PROCESS_GET_COUPONS = 'PROCESS_GET_COUPONS';
export const PROCESS_GET_COUPON = 'PROCESS_GET_COUPON';
export const PROCESS_VALIDATE_COUPON = 'PROCESS_VALIDATE_COUPON';

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
    [PROCESS_VALIDATE_COUPON] (state, response) {
        let data = response.data;
        if(data.status == 0) {
      	    state.getError = data.message;
        } else {
            state.getError = '';
        }
    }
}