export const PROCESS_GET_NEWSLETTERS = 'PROCESS_GET_NEWSLETTERS';

export const PROCESS_EXCEL_DOWNLOAD_NEWSLETTERS = 'PROCESS_EXCEL_DOWNLOAD_NEWSLETTERS';

export default {
	[PROCESS_GET_NEWSLETTERS] (state, response) {
        let data = response.data;
        if(data.status == 200){
            state.getNewsLetters = data.data;
        }
    },
    [PROCESS_EXCEL_DOWNLOAD_NEWSLETTERS] (state, response) {
        let data = response.data;
        if(data.status == 200){
            state.excelLink = data.data;
        }
    }
}