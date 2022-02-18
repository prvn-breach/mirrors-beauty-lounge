import {
    PROCESS_GET_EMAIL_CAMPAIGNS,
    PROCESS_GET_EMAIL_CAMPAIGN,
    PROCESS_ADD_EMAIL_CAMPAIGN,
    PROCESS_UPDATE_EMAIL_CAMPAIGN,
    PROCESS_DELETE_EMAIL_CAMPAIGN,

    PROCESS_EXCEL_DOWNLOAD_EMAIL_CAMPAIGN,
} from './mutations'
export const GET_EMAIL_CAMPAIGNS_ACTION = 'GET_EMAIL_CAMPAIGNS_ACTION';
export const GET_EMAIL_CAMPAIGN_ACTION = 'GET_EMAIL_CAMPAIGN_ACTION';
export const ADD_EMAIL_CAMPAIGN_ACTION = 'ADD_EMAIL_CAMPAIGN_ACTION';
export const UPDATE_EMAIL_CAMPAIGN_ACTION = 'UPDATE_EMAIL_CAMPAIGN_ACTION';
export const DELETE_EMAIL_CAMPAIGN_ACTION = 'DELETE_EMAIL_CAMPAIGN_ACTION';

export const EXCEL_DOWNLOAD_EMAIL_CAMPAIGN_ACTION = 'EXCEL_DOWNLOAD_EMAIL_CAMPAIGN_ACTION';

export default {
    [GET_EMAIL_CAMPAIGNS_ACTION] (context,params) {
        return new Promise((resolve, reject) => {
            axios.get(process.env.MIX_BASE_URL+'api/admin/get-email-campaigns', params).then((response) => {
                context.commit(PROCESS_GET_EMAIL_CAMPAIGNS, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                reject()
            })
        })
    },
    [GET_EMAIL_CAMPAIGN_ACTION] (context,email_campaign_id) {
        return new Promise((resolve, reject) => {
            axios.get(process.env.MIX_BASE_URL+'api/admin/get-email-campaign/'+email_campaign_id).then((response) => {
                context.commit(PROCESS_GET_EMAIL_CAMPAIGN, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                reject()
            })
        })
    },
    [EXCEL_DOWNLOAD_EMAIL_CAMPAIGN_ACTION] (context,params) {
        return new Promise((resolve, reject) => {
            axios.get(process.env.MIX_BASE_URL+'api/admin/get-email-campaigns', params).then((response) => {
                context.commit(PROCESS_EXCEL_DOWNLOAD_EMAIL_CAMPAIGN, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                reject()
            })
        })
    },
    [ADD_EMAIL_CAMPAIGN_ACTION] (context,params) {
        return new Promise((resolve, reject) => {
            axios.post(process.env.MIX_BASE_URL+'api/admin/create-email-campaign', params).then((response) => {
                context.commit(PROCESS_ADD_EMAIL_CAMPAIGN, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                reject()
            })
        })
    },
    [UPDATE_EMAIL_CAMPAIGN_ACTION] (context, params) {
        return new Promise((resolve, reject) => {
            axios.post(process.env.MIX_BASE_URL+'api/admin/update-email-campaign', params).then((response) => {
                context.commit(PROCESS_UPDATE_EMAIL_CAMPAIGN, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                reject()
            })
        })
    },
    [DELETE_EMAIL_CAMPAIGN_ACTION] (context, params) {
        return new Promise((resolve, reject) => {
            axios.post(process.env.MIX_BASE_URL+'api/admin/delete-email-campaign', params).then((response) => {
                context.commit(PROCESS_DELETE_EMAIL_CAMPAIGN, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                reject()
            })
        })
    }
}