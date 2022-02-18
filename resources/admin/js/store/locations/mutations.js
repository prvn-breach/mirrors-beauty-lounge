export const PROCESS_GET_LOCATIONS = 'PROCESS_GET_LOCATIONS';
export const PROCESS_GET_LOCATION = 'PROCESS_GET_LOCATION';
export const PROCESS_ADD_LOCATION = 'PROCESS_ADD_LOCATION';
export const PROCESS_DELETE_LOCATION = 'PROCESS_DELETE_LOCATION';
export const PROCESS_DELETE_LOCATIONS = 'PROCESS_DELETE_LOCATIONS';
export const PROCESS_UPDATE_LOCATION = 'PROCESS_UPDATE_LOCATION';
export const PROCESS_GET_DELETED_LOCATIONS = 'PROCESS_GET_DELETED_LOCATIONS';

export const PROCESS_EXCEL_DOWNLOAD_LOCATIONS = 'PROCESS_EXCEL_DOWNLOAD_LOCATIONS';

export default {
	[PROCESS_GET_LOCATIONS] (state, response) {
        let data = response.data;
        if(data.status == 200){
            state.getLocations = data.data;
        }
    },
    [PROCESS_GET_LOCATION] (state, response) {
        let data = response.data;
        if(data.status == 200){
            state.getLocation = data.data;
        }
    },
    [PROCESS_ADD_LOCATION] (state, response) {
        let data = response.data;
        if(data.status == 200){
            state.getLocation = data.data;
        }
    },
    [PROCESS_DELETE_LOCATION] (state, response) {
        let data = response.data;
        if(data.status == 200){
            state.getLocation = data.data;
        }
    },
    [PROCESS_DELETE_LOCATIONS] (state, response) {
        let data = response.data;
        if(data.status == 200){
            state.getLocation = data.data;
        }
    },
    [PROCESS_UPDATE_LOCATION] (state, response) {
        let data = response.data;
        if(data.status == 200){
            state.getLocation = data.data;
        }
    },
    [PROCESS_GET_DELETED_LOCATIONS] (state, response) {
        let data = response.data;
        if(data.status == 200){
            state.getDeletedLocations = data.data;
        }
    },
    [PROCESS_EXCEL_DOWNLOAD_LOCATIONS] (state, response) {
        let data = response.data;
        if(data.status == 200){
            state.excelLink = data.data;
        }
    }
}