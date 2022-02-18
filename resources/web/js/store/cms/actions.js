import { 
    PROCESS_GET_CMS_PAGES,
    PROCESS_GET_CMS_PAGE
} from './mutations'
export const GET_CMS_PAGES_ACTION = 'GET_CMS_PAGES_ACTION';
export const GET_CMS_PAGE_ACTION = 'GET_CMS_PAGE_ACTION';

export default {
    [GET_CMS_PAGES_ACTION] (context,params) {
        return new Promise((resolve, reject) => {
            axios.get(process.env.MIX_BASE_URL+'api/get-cms-pages', params).then((response) => {
                context.commit(PROCESS_GET_CMS_PAGES, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                reject()
            })
        })
    },
    [GET_CMS_PAGE_ACTION] (context,slug) {
        return new Promise((resolve, reject) => {
            axios.get(process.env.MIX_BASE_URL+'api/get-cms-page/'+slug).then((response) => {
                context.commit(PROCESS_GET_CMS_PAGE, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                reject()
            })
        })
    }
}