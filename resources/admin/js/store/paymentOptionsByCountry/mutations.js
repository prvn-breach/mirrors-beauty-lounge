export const PROCESS_ADD_PAYMENT_OPTION_BY_COUNTRY = 'PROCESS_ADD_PAYMENT_OPTION_BY_COUNTRY';
export const PROCESS_GET_PAYMENT_OPTIONS_BY_COUNTRY = 'PROCESS_GET_PAYMENT_OPTIONS_BY_COUNTRY';
export const PROCESS_GET_PAYMENT_OPTION_BY_COUNTRY = 'PROCESS_GET_PAYMENT_OPTION_BY_COUNTRY';
export const PROCESS_UPDATE_PAYMENT_OPTION_BY_COUNTRY = 'PROCESS_UPDATE_PAYMENT_OPTION_BY_COUNTRY';
export const PROCESS_DELETE_PAYMENT_OPTION_BY_COUNTRY = 'PROCESS_DELETE_PAYMENT_OPTION_BY_COUNTRY';

export const PROCESS_EXCEL_DOWNLOAD_PAYMENT_OPTIONS_BY_COUNTRY = 'PROCESS_EXCEL_DOWNLOAD_PAYMENT_OPTIONS_BY_COUNTRY';

export default {
	[PROCESS_ADD_PAYMENT_OPTION_BY_COUNTRY] (state, response) {
        let data = response.data;
        if (data.status == 200) {
            state.getPaymentOptionByCountry = data.data;
        }
    },
    [PROCESS_GET_PAYMENT_OPTIONS_BY_COUNTRY] (state, response) {
        let data = response.data;
        if (data.status == 200) {
            state.getPaymentOptionsByCountry = data.data;
        }
    },
    [PROCESS_EXCEL_DOWNLOAD_PAYMENT_OPTIONS_BY_COUNTRY] (state, response) {
        let data = response.data;
        if (data.status == 200) {
            state.excelLink = data.data;
        }
    },
    [PROCESS_GET_PAYMENT_OPTION_BY_COUNTRY] (state, response) {
        let data = response.data;
        if (data.status == 200) {
            state.getPaymentOptionByCountry = data.data;
        }
    },
    [PROCESS_UPDATE_PAYMENT_OPTION_BY_COUNTRY] (state, response) {
        let data = response.data;
        if (data.status == 200) {
            state.getPaymentOptionByCountry = data.data;
        }
    },
    [PROCESS_DELETE_PAYMENT_OPTION_BY_COUNTRY] (state, response) {
        let data = response.data;
        if (data.status == 200) {
            state.getPaymentOptionByCountry = data.data;
        }
    }
}