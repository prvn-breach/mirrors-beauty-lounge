export const PROCESS_GET_EMAIL_CAMPAIGNS = 'PROCESS_GET_EMAIL_CAMPAIGNS';
export const PROCESS_GET_EMAIL_CAMPAIGN = 'PROCESS_GET_EMAIL_CAMPAIGN';
export const PROCESS_ADD_EMAIL_CAMPAIGN = 'PROCESS_ADD_EMAIL_CAMPAIGN';
export const PROCESS_UPDATE_EMAIL_CAMPAIGN = 'PROCESS_UPDATE_EMAIL_CAMPAIGN';
export const PROCESS_DELETE_EMAIL_CAMPAIGN = 'PROCESS_DELETE_EMAIL_CAMPAIGN';

export const PROCESS_EXCEL_DOWNLOAD_EMAIL_CAMPAIGN = 'PROCESS_EXCEL_DOWNLOAD_EMAIL_CAMPAIGN';

export default {
    [PROCESS_GET_EMAIL_CAMPAIGNS] (state, response) {
        let data = response.data;
        if(data.status == 200){
            state.getEmailCampaigns = data.data;
        }
    },
    [PROCESS_GET_EMAIL_CAMPAIGN] (state, response) {
        let data = response.data;
        if(data.status == 200){
            state.getEmailCampaign = data.data;
        }
    },
    [PROCESS_EXCEL_DOWNLOAD_EMAIL_CAMPAIGN] (state, response) {
        let data = response.data;
        if(data.status == 200){
            state.excelLink = data.data;
        }
    },
    [PROCESS_ADD_EMAIL_CAMPAIGN] (state, response) {
        let data = response.data;
        if(data.status == 200){
            state.getEmailCampaign = data.data;
        }
    },
    [PROCESS_UPDATE_EMAIL_CAMPAIGN] (state, response) {
        let data = response.data;
        if(data.status == 200){
            state.getEmailCampaign = data.data;
        }
    },
    [PROCESS_DELETE_EMAIL_CAMPAIGN] (state, response) {
        let data = response.data;
        if(data.status == 200){
            state.getEmailCampaign = data.data;
        }
    }
}