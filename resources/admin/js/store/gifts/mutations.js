export const PROCESS_GET_GIFT_CERTIFICATES = 'PROCESS_GET_GIFT_CERTIFICATES';
export const PROCESS_GET_GIFT_CERTIFICATE = 'PROCESS_GET_GIFT_CERTIFICATE';
export const PROCESS_ADD_GIFT_CERTIFICATE = 'PROCESS_ADD_GIFT_CERTIFICATE';
export const PROCESS_DELETE_GIFT_CERTIFICATE = 'PROCESS_DELETE_GIFT_CERTIFICATE';
export const PROCESS_UPDATE_GIFT_CERTIFICATE = 'PROCESS_UPDATE_GIFT_CERTIFICATE';

export const PROCESS_EXCEL_DOWNLOAD_GIFT_CERTIFICATES = 'PROCESS_EXCEL_DOWNLOAD_GIFT_CERTIFICATES';

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
    },
    [PROCESS_ADD_GIFT_CERTIFICATE] (state, response) {
        let data = response.data;
        if(data.status == 200){
            state.getGiftCertificate = data.data;
        }
    },
    [PROCESS_DELETE_GIFT_CERTIFICATE] (state, response) {
        let data = response.data;
        if(data.status == 200){
            state.getGiftCertificate = data.data;
        }
    },
    [PROCESS_UPDATE_GIFT_CERTIFICATE] (state, response) {
        let data = response.data;
        if(data.status == 200){
            state.getGiftCertificate = data.data;
        }
    },
    [PROCESS_EXCEL_DOWNLOAD_GIFT_CERTIFICATES] (state, response) {
        let data = response.data;
        if(data.status == 200){
            state.excelLink = data.data;
        }
    }
}