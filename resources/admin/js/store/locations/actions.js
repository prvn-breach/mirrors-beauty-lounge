import {
    PROCESS_GET_LOCATIONS,
    PROCESS_GET_LOCATION,
    PROCESS_GET_DELETED_LOCATIONS,
    PROCESS_ADD_LOCATION,
    PROCESS_DELETE_LOCATION,
    PROCESS_DELETE_LOCATIONS,
    PROCESS_UPDATE_LOCATION,

    PROCESS_EXCEL_DOWNLOAD_LOCATIONS
} from './mutations'
import Vue from 'vue'
export const GET_LOCATIONS_ACTION = 'GET_LOCATIONS_ACTION';
export const GET_LOCATION_ACTION = 'GET_LOCATION_ACTION';
export const ADD_LOCATION_ACTION = 'ADD_LOCATION_ACTION';
export const DELETE_LOCATION_ACTION = 'DELETE_LOCATION_ACTION';
export const DELETE_LOCATIONS_ACTION = 'DELETE_LOCATIONS_ACTION';
export const UPDATE_LOCATION_ACTION = 'UPDATE_LOCATION_ACTION';
export const GET_DELETED_LOCATIONS_ACTION = 'GET_DELETED_LOCATIONS_ACTION';

export const EXCEL_DOWNLOAD_LOCATIONS_ACTION = 'EXCEL_DOWNLOAD_LOCATIONS_ACTION';

export default {
    [GET_LOCATIONS_ACTION] (context,params) {
        let _this = this;
        return new Promise((resolve, reject) => {
            axios.get(process.env.MIX_BASE_URL+'api/admin/get-locations', params).then((response) => {
                context.commit(PROCESS_GET_LOCATIONS, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                reject()
            })
        })
    },
    [GET_LOCATION_ACTION] (context,id) {
        return new Promise((resolve, reject) => {
            axios.get(process.env.MIX_BASE_URL+'api/admin/get-location/'+id).then((response) => {
                context.commit(PROCESS_GET_LOCATION, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                reject()
            })
        })
    },
    [ADD_LOCATION_ACTION] (context,params) {
        let _this = this;
        return new Promise((resolve, reject) => {
            axios.post(process.env.MIX_BASE_URL+'api/admin/create-location', params).then((response) => {
                context.commit(PROCESS_ADD_LOCATION, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                reject()
            })
        })
    },
    [DELETE_LOCATION_ACTION] (context,params) {
        let _this = this;
        return new Promise((resolve, reject) => {
            axios.post(process.env.MIX_BASE_URL+'api/admin/delete-location', params).then((response) => {
                context.commit(PROCESS_DELETE_LOCATION, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                reject()
            })
        })
    },
    [DELETE_LOCATIONS_ACTION] (context,params) {
        let _this = this;
        return new Promise((resolve, reject) => {
            axios.post(process.env.MIX_BASE_URL+'api/admin/delete-locations', params).then((response) => {
                context.commit(PROCESS_DELETE_LOCATIONS, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                reject()
            })
        })
    },
    [UPDATE_LOCATION_ACTION] (context,params) {
        let _this = this;
        return new Promise((resolve, reject) => {
            axios.post(process.env.MIX_BASE_URL+'api/admin/update-location', params).then((response) => {
                context.commit(PROCESS_UPDATE_LOCATION, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                reject()
            })
        })
    },
    [GET_DELETED_LOCATIONS_ACTION] (context,params) {
        let _this = this;
        return new Promise((resolve, reject) => {
            axios.get(process.env.MIX_BASE_URL+'api/admin/get-deleted-locations', params).then((response) => {
                context.commit(PROCESS_GET_DELETED_LOCATIONS, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                reject()
            })
        })
    },
    [EXCEL_DOWNLOAD_LOCATIONS_ACTION] (context,params) {
        let _this = this;
        return new Promise((resolve, reject) => {
            axios.get(process.env.MIX_BASE_URL+'api/admin/get-locations/', params).then((response) => {
                context.commit(PROCESS_EXCEL_DOWNLOAD_LOCATIONS, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                reject()
            })
        })
    },
}