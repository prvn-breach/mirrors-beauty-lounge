import { 
    PROCESS_GET_CMS_PAGES,
    PROCESS_GET_CMS_PAGE,
    PROCESS_ADD_CMS_PAGE,
    PROCESS_UPDATE_CMS_PAGE,
    PROCESS_DELETE_CMS_PAGE,

    PROCESS_GET_BANNERS,
    PROCESS_ADD_HOME_PAGE_BANNER,
    PROCESS_GET_HOME_PAGE_BANNERS,
    PROCESS_GET_HOME_PAGE_BANNER,
    PROCESS_UPDATE_HOME_PAGE_BANNER,
    PROCESS_DELETE_HOME_PAGE_BANNER
} from './mutations'
export const GET_CMS_PAGES_ACTION = 'GET_CMS_PAGES_ACTION';
export const GET_CMS_PAGE_ACTION = 'GET_CMS_PAGE_ACTION';
export const ADD_CMS_PAGE_ACTION = 'ADD_CMS_PAGE_ACTION';
export const UPDATE_CMS_PAGE_ACTION = 'UPDATE_CMS_PAGE_ACTION';
export const DELETE_CMS_PAGE_ACTION = 'DELETE_CMS_PAGE_ACTION';

export const GET_BANNERS_ACTION = 'GET_BANNERS_ACTION';
export const ADD_HOME_PAGE_BANNER_ACTION = 'ADD_HOME_PAGE_BANNER_ACTION';
export const GET_HOME_PAGE_BANNERS_ACTION = 'GET_HOME_PAGE_BANNERS_ACTION';
export const GET_HOME_PAGE_BANNER_ACTION = 'GET_HOME_PAGE_BANNER_ACTION';
export const UPDATE_HOME_PAGE_BANNER_ACTION = 'UPDATE_HOME_PAGE_BANNER_ACTION';
export const DELETE_HOME_PAGE_BANNER_ACTION = 'DELETE_HOME_PAGE_BANNER_ACTION';

export default {
    [ADD_CMS_PAGE_ACTION] (context,params) {
        return new Promise((resolve, reject) => {
            axios.post(process.env.MIX_BASE_URL+'api/admin/create-cms-page', params).then((response) => {
                context.commit(PROCESS_ADD_CMS_PAGE, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                reject()
            })
        })
    },
    [GET_CMS_PAGES_ACTION] (context,params) {
        return new Promise((resolve, reject) => {
            axios.get(process.env.MIX_BASE_URL+'api/admin/get-cms-pages', params).then((response) => {
                context.commit(PROCESS_GET_CMS_PAGES, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                reject()
            })
        })
    },
    [GET_CMS_PAGE_ACTION] (context,cms_page_id) {
        return new Promise((resolve, reject) => {
            axios.get(process.env.MIX_BASE_URL+'api/admin/get-cms-page/'+cms_page_id).then((response) => {
                context.commit(PROCESS_GET_CMS_PAGE, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                reject()
            })
        })
    },
    [UPDATE_CMS_PAGE_ACTION] (context,params) {
        return new Promise((resolve, reject) => {
            axios.post(process.env.MIX_BASE_URL+'api/admin/update-cms-page', params).then((response) => {
                context.commit(PROCESS_UPDATE_CMS_PAGE, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                reject()
            })
        })
    },
    [DELETE_CMS_PAGE_ACTION] (context,params) {
        return new Promise((resolve, reject) => {
            axios.post(process.env.MIX_BASE_URL+'api/admin/delete-cms-page', params).then((response) => {
                context.commit(PROCESS_DELETE_CMS_PAGE, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                reject()
            })
        })
    },
    [GET_BANNERS_ACTION] (context,params) {
        return new Promise((resolve, reject) => {
            axios.get(process.env.MIX_BASE_URL+'api/admin/get-banners', params).then((response) => {
                context.commit(PROCESS_GET_BANNERS, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                reject()
            })
        })
    },
    [GET_HOME_PAGE_BANNERS_ACTION] (context,params) {
        return new Promise((resolve, reject) => {
            axios.get(process.env.MIX_BASE_URL+'api/admin/get-banner-images', params).then((response) => {
                context.commit(PROCESS_GET_HOME_PAGE_BANNERS, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                reject()
            })
        })
    },
    [GET_HOME_PAGE_BANNER_ACTION] (context,banner_image_id) {
        return new Promise((resolve, reject) => {
            axios.get(process.env.MIX_BASE_URL+'api/admin/get-banner-image/'+banner_image_id).then((response) => {
                context.commit(PROCESS_GET_HOME_PAGE_BANNER, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                reject()
            })
        })
    },
    [ADD_HOME_PAGE_BANNER_ACTION] (context,params) {
        return new Promise((resolve, reject) => {
            axios.post(process.env.MIX_BASE_URL+'api/admin/create-banner-image', params).then((response) => {
                context.commit(PROCESS_ADD_HOME_PAGE_BANNER, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                reject()
            })
        })
    },
    [UPDATE_HOME_PAGE_BANNER_ACTION] (context,params) {
        return new Promise((resolve, reject) => {
            axios.post(process.env.MIX_BASE_URL+'api/admin/update-banner-image', params).then((response) => {
                context.commit(PROCESS_UPDATE_HOME_PAGE_BANNER, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                reject()
            })
        })
    },
    [DELETE_HOME_PAGE_BANNER_ACTION] (context,params) {
        return new Promise((resolve, reject) => {
            axios.post(process.env.MIX_BASE_URL+'api/admin/delete-banner-image', params).then((response) => {
                context.commit(PROCESS_DELETE_HOME_PAGE_BANNER, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                reject()
            })
        })
    },
}