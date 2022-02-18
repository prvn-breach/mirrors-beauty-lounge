import {
    PROCESS_LOGIN_RESPONSE_MUTATION,
    PROCESS_USER_RESPONSE_MUTATION,
    PROCESS_SAVE_USER_REGISTER_RESPONSE_MUTATION,
    PROCESS_CHANGE_PASSWORD_RESPONSE_MUTATION, 
    PROCESS_FORGOT_PASSWORD_RESPONSE_MUTATION,
    PROCESS_UPDATE_PROFILE_RESPONSE_MUTATION
} from './mutations'
import Vue from 'vue'
export const LOAD_LOGIN_ACTION = 'LOAD_LOGIN_ACTION'
export const LOAD_USER_ACTION = 'LOAD_USER_ACTION'
export const SAVE_USER_REGISTER_ACTION = 'SAVE_USER_REGISTER_ACTION'
export const CHANGE_PASSWORD_ACTION = 'CHANGE_PASSWORD_ACTION'
export const FORGOT_PASSWORD_ACTION = 'FORGOT_PASSWORD_ACTION'
export const UPDATE_PROFILE_ACTION = 'UPDATE_PROFILE_ACTION'
export default {
    data() {
        return {
            baseUrl:Vue.config.baseUrl,
            baseUrlImage:Vue.config.baseUrlImage,
        }
    },
    [CHANGE_PASSWORD_ACTION] (context,data) {
        let _this = this;
       
        return new Promise((resolve, reject) => {
            axios.post(process.env.MIX_BASE_URL+'api/admin/change-password',data).then((response) => {
                context.commit(PROCESS_CHANGE_PASSWORD_RESPONSE_MUTATION, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                reject()
            })
        })
    },
    [LOAD_LOGIN_ACTION] (context,data) {
        let _this = this;
        //console.log(context,data)
        //context.commit(TYPE_LIST_NOT_LOADED_MUTATION)
        return new Promise((resolve, reject) => {
            axios.post(process.env.MIX_BASE_URL+'api/admin/login',data).then((response) => {
                context.commit(PROCESS_LOGIN_RESPONSE_MUTATION, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                reject()
            })
        })
    },
    [LOAD_USER_ACTION] (context) {
        let _this = this;
        let getToken = JSON.parse(localStorage.getItem('getAdminLogin'));
       if(getToken != null || getToken != undefined){
        
        return new Promise((resolve, reject) => {
            axios.get(process.env.MIX_BASE_URL+'api/admin/get-user',{ headers: {"Authorization" : `Bearer ${getToken.token}`}}).then((response) => {
                context.commit(PROCESS_USER_RESPONSE_MUTATION, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                reject()
            })
        })

       }
    },
    [SAVE_USER_REGISTER_ACTION] (context,data) {
        let _this = this;
        //console.log(context,data)
        //context.commit(TYPE_LIST_NOT_LOADED_MUTATION)
        return new Promise((resolve, reject) => {
            axios.post(process.env.MIX_BASE_URL+'api/admin/register',data).then((response) => {
                context.commit(PROCESS_SAVE_USER_REGISTER_RESPONSE_MUTATION, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                //reject()
            })
        })
    },
    [FORGOT_PASSWORD_ACTION] (context,data) {
        return new Promise((resolve, reject) => {
            axios.post(process.env.MIX_BASE_URL+'api/admin/forgot-password',data).then((response) => {
                context.commit(PROCESS_FORGOT_PASSWORD_RESPONSE_MUTATION, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                //reject()
            })
        })
    },
    [UPDATE_PROFILE_ACTION] (context,data) {
        return new Promise((resolve, reject) => {
            axios.post(process.env.MIX_BASE_URL+'api/admin/update-profile',data).then((response) => {
                context.commit(PROCESS_UPDATE_PROFILE_RESPONSE_MUTATION, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                //reject()
            })
        })
    }
}