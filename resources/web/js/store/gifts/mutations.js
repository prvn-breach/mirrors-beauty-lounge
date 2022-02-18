export const PROCESS_GET_GIFT_CERTIFICATES = 'PROCESS_GET_GIFT_CERTIFICATES';
export const PROCESS_GET_GIFT_CERTIFICATE = 'PROCESS_GET_GIFT_CERTIFICATE';

export default {
	[PROCESS_GET_GIFT_CERTIFICATES] (state, response) {
        let data = response.data;
        if(data.status == 200){
            state.getGiftCertificates = data.data;
        }
    },
    [PROCESS_GET_GIFT_CERTIFICATE] (state, response) {
        let data = response.data;
        if(data.status == 200){
            state.getGiftCertificate = data.data;
        }
    }
}