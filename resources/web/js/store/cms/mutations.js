export const PROCESS_GET_CMS_PAGES = 'PROCESS_GET_CMS_PAGES';
export const PROCESS_GET_CMS_PAGE = 'PROCESS_GET_CMS_PAGE';

export default {
	[PROCESS_GET_CMS_PAGES] (state, response) {
        let data = response.data;
        if(data.status == 200) {
      	    state.getCMSPages = data.data; 
        }
    },
    [PROCESS_GET_CMS_PAGE] (state, response) {
        let data = response.data;
        if(data.status == 200) {
      	    state.getCMSPage = data.data; 
        }
    }
}