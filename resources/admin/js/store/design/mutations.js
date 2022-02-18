export const PROCESS_GET_CMS_PAGES = 'PROCESS_GET_CMS_PAGES';
export const PROCESS_GET_CMS_PAGE = 'PROCESS_GET_CMS_PAGE';
export const PROCESS_ADD_CMS_PAGE = 'PROCESS_ADD_CMS_PAGE';
export const PROCESS_UPDATE_CMS_PAGE = 'PROCESS_UPDATE_CMS_PAGE';
export const PROCESS_DELETE_CMS_PAGE = 'PROCESS_DELETE_CMS_PAGE';

export const PROCESS_GET_BANNERS = 'PROCESS_GET_BANNERS';
export const PROCESS_ADD_HOME_PAGE_BANNER = 'PROCESS_ADD_HOME_PAGE_BANNER';
export const PROCESS_GET_HOME_PAGE_BANNERS = 'PROCESS_GET_HOME_PAGE_BANNERS';
export const PROCESS_GET_HOME_PAGE_BANNER = 'PROCESS_GET_HOME_PAGE_BANNER';
export const PROCESS_UPDATE_HOME_PAGE_BANNER = 'PROCESS_UPDATE_HOME_PAGE_BANNER';
export const PROCESS_DELETE_HOME_PAGE_BANNER = 'PROCESS_DELETE_HOME_PAGE_BANNER';

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
    },
    [PROCESS_ADD_CMS_PAGE] (state, response) {
        let data = response.data;
        if(data.status == 200) {
      	    state.getCMSPage = data.data; 
        }
    },
    [PROCESS_UPDATE_CMS_PAGE] (state, response) {
        let data = response.data;
        if(data.status == 200) {
      	    state.getCMSPage = data.data; 
        }
    },
    [PROCESS_DELETE_CMS_PAGE] (state, response) {
        let data = response.data;
        if(data.status == 200) {
      	    state.getCMSPage = data.data; 
        }
    },
    [PROCESS_GET_BANNERS] (state, response) {
        let data = response.data;
        if(data.status == 200) {
      	    state.getBanners = data.data; 
        }
    },
    [PROCESS_ADD_HOME_PAGE_BANNER] (state, response) {
        let data = response.data;
        if(data.status == 200) {
      	    state.getHomePageBanner = data.data; 
        }
    },
    [PROCESS_GET_HOME_PAGE_BANNERS] (state, response) {
        let data = response.data;
        if(data.status == 200) {
      	    state.getHomePageBanners = data.data; 
        }
    },
    [PROCESS_GET_HOME_PAGE_BANNER] (state, response) {
        let data = response.data;
        if(data.status == 200) {
      	    state.getHomePageBanner = data.data; 
        }
    },
    [PROCESS_UPDATE_HOME_PAGE_BANNER] (state, response) {
        let data = response.data;
        if(data.status == 200) {
      	    state.getHomePageBanner = data.data; 
        }
    },
    [PROCESS_DELETE_HOME_PAGE_BANNER] (state, response) {
        let data = response.data;
        if(data.status == 200) {
      	    state.getHomePageBanner = data.data; 
        }
    },
}