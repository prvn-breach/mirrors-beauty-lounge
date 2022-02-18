import {PROCESS_LOGIN_RESPONSE_MUTATION,PROCESS_USER_RESPONSE_MUTATION,PROCESS_SAVE_USER_REGISTER_RESPONSE_MUTATION,PROCESS_CHANGE_PASSWORD_RESPONSE_MUTATION, PROCESS_FORGOT_PASSWORD_RESPONSE_MUTATION, PROCESS_LOGOUT, PROCESS_SUBSCRIBE_EMAIL,
    PROCESS_GET_RESET_PASSWORD_TOKEN_RESPONSE_MUTATION, PROCESS_FORGOT_PASSWORD_SEND_MAIL_RESPONSE_MUTATION} from './mutations'
import Vue from 'vue'
export const LOAD_LOGIN_ACTION = 'LOAD_LOGIN_ACTION'
export const LOAD_USER_ACTION = 'LOAD_USER_ACTION'
export const SAVE_USER_REGISTER_ACTION = 'SAVE_USER_REGISTER_ACTION'
export const CHANGE_PASSWORD_ACTION = 'CHANGE_PASSWORD_ACTION'
export const GET_RESET_PASSWORD_TOKEN_ACTION = 'GET_RESET_PASSWORD_TOKEN_ACTION'
export const FORGOT_PASSWORD_SEND_MAIL_ACTION = 'FORGOT_PASSWORD_SEND_MAIL_ACTION';
export const FORGOT_PASSWORD_ACTION = 'FORGOT_PASSWORD_ACTION'
export const LOGOUT_ACTION = 'LOGOUT_ACTION';
export const SUBSCRIBE_EMAIL = 'SUBSCRIBE_EMAIL';
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
            axios.post(process.env.MIX_BASE_URL+'api/change-password',data).then((response) => {
                context.commit(PROCESS_CHANGE_PASSWORD_RESPONSE_MUTATION, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                reject()
            })
        })
    },
    [FORGOT_PASSWORD_ACTION] (context,data) {
        let _this = this;
        return new Promise((resolve, reject) => {
            axios.post(process.env.MIX_BASE_URL+'api/forgot-password',data).then((response) => {
                context.commit(PROCESS_FORGOT_PASSWORD_RESPONSE_MUTATION, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                reject()
            })
        })
    },
    [FORGOT_PASSWORD_SEND_MAIL_ACTION] (context,data) {
        let _this = this;
        return new Promise((resolve, reject) => {
            axios.post(process.env.MIX_BASE_URL+'api/forgot-password-mail',data).then((response) => {
                context.commit(PROCESS_FORGOT_PASSWORD_SEND_MAIL_RESPONSE_MUTATION, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                reject()
            })
        })
    },
    [GET_RESET_PASSWORD_TOKEN_ACTION] (context,data) {
        let _this = this;
        return new Promise((resolve, reject) => {
            axios.get(process.env.MIX_BASE_URL+'api/get-reset-password-token',data).then((response) => {
                context.commit(PROCESS_GET_RESET_PASSWORD_TOKEN_RESPONSE_MUTATION, response)
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
            axios.post(process.env.MIX_BASE_URL+'api/login',data).then((response) => {
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
        let getToken = JSON.parse(localStorage.getItem('getLogin'));
       if(getToken != null || getToken != undefined){
       
        return new Promise((resolve, reject) => {
            axios.get(process.env.MIX_BASE_URL+'api/get-user',{ headers: {"Authorization" : `Bearer ${getToken.token}`}}).then((response) => {
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
            axios.post(process.env.MIX_BASE_URL+'api/register',data).then((response) => {
                context.commit(PROCESS_SAVE_USER_REGISTER_RESPONSE_MUTATION, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                //reject()
            })
        })
    },
    [LOGOUT_ACTION] (context,data) {
        let _this = this;
        return new Promise((resolve, reject) => {
            axios.post(process.env.MIX_BASE_URL+'api/logout', data).then((response) => {
                context.commit(PROCESS_LOGOUT, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                //reject()
            })
        })
    },
    [SUBSCRIBE_EMAIL] (context,data) {
        return new Promise((resolve, reject) => {
            axios.post(process.env.MIX_BASE_URL+'api/newsletter-subscribe', data).then((response) => {
                context.commit(PROCESS_SUBSCRIBE_EMAIL, response)
                resolve()
            }).catch((error) => {
                console.log(error)
            })
        })
    }

    
}