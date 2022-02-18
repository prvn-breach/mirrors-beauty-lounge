import {
    PROCESS_GET_NEWSLETTERS,

    PROCESS_EXCEL_DOWNLOAD_NEWSLETTERS
} from './mutations'
import Vue from 'vue'
export const GET_NEWSLETTERS_ACTION = 'GET_NEWSLETTERS_ACTION';

export const EXCEL_DOWNLOAD_NEWSLETTERS_ACTION = 'EXCEL_DOWNLOAD_NEWSLETTERS_ACTION';

export default {
    [GET_NEWSLETTERS_ACTION] (context,params) {
        return new Promise((resolve, reject) => {
            axios.get(process.env.MIX_BASE_URL+'api/admin/get-newsletters', params).then((response) => {
                context.commit(PROCESS_GET_NEWSLETTERS, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                reject()
            })
        })
    },
    [EXCEL_DOWNLOAD_NEWSLETTERS_ACTION] (context,params) {
        return new Promise((resolve, reject) => {
            axios.get(process.env.MIX_BASE_URL+'api/admin/get-newsletters/', params).then((response) => {
                context.commit(PROCESS_EXCEL_DOWNLOAD_NEWSLETTERS, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                reject()
            })
        })
    },
}