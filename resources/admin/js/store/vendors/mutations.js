export const PROCESS_GET_VENDORS = 'PROCESS_GET_VENDORS';
export const PROCESS_GET_VENDOR = 'PROCESS_GET_VENDOR';
export const PROCESS_UPDATE_VENDOR = 'PROCESS_UPDATE_VENDOR';
export const PROCESS_DELETE_VENDOR = 'PROCESS_DELETE_VENDOR';
export const PROCESS_GET_BRANDS = 'PROCESS_GET_BRANDS';
export const PROCESS_ADD_VENDOR = 'PROCESS_ADD_VENDOR';

export const PROCESS_EXCEL_DOWNLOAD_VENDORS = 'PROCESS_EXCEL_DOWNLOAD_VENDORS';

export default {
    [PROCESS_GET_BRANDS] (state, response) {
        let data = response;
        if(data.status == 200) {
            state.getBrands = data.data
        }
    },
	[PROCESS_GET_VENDORS] (state, response) {
        let data = response.data;
        if(data.status == 200) {
            state.getVendors = data.data
        }
    },
    [PROCESS_ADD_VENDOR] (state, response) {
        let data = response.data;
        if(data.status == 200) {
            state.getVendor = data.data
        }
    },
    [PROCESS_EXCEL_DOWNLOAD_VENDORS] (state, response) {
        let data = response.data;
        if(data.status == 200) {
            state.excelLink = data.data
        }
    },
    [PROCESS_GET_VENDOR] (state, response) {
        let data = response.data;
        if(data.status == 200) {
            state.getVendor = data.data
        }
    },
    [PROCESS_UPDATE_VENDOR] (state, response) {
        let data = response.data;
        if(data.status == 200) {
            state.getVendor = data.data
        }
    },
    [PROCESS_DELETE_VENDOR] (state, response) {
        let data = response.data;
        if(data.status == 200) {
            state.getVendor = data.data
        }
    }
}