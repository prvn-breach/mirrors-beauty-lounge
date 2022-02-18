export const PROCESS_LOGIN_RESPONSE_MUTATION = 'PROCESS_LOGIN_RESPONSE_MUTATION'
export const PROCESS_USER_RESPONSE_MUTATION = 'PROCESS_USER_RESPONSE_MUTATION'
export const PROCESS_SAVE_USER_REGISTER_RESPONSE_MUTATION = 'PROCESS_SAVE_USER_REGISTER_RESPONSE_MUTATION'
export const PROCESS_CHANGE_PASSWORD_RESPONSE_MUTATION = 'PROCESS_CHANGE_PASSWORD_RESPONSE_MUTATION'
export const PROCESS_GET_RESET_PASSWORD_TOKEN_RESPONSE_MUTATION = 'PROCESS_GET_RESET_PASSWORD_TOKEN_RESPONSE_MUTATION'
export const PROCESS_FORGOT_PASSWORD_RESPONSE_MUTATION = 'PROCESS_FORGOT_PASSWORD_RESPONSE_MUTATION'
export const PROCESS_FORGOT_PASSWORD_SEND_MAIL_RESPONSE_MUTATION = 'PROCESS_FORGOT_PASSWORD_SEND_MAIL_RESPONSE_MUTATION'
export const PROCESS_LOGOUT = 'PROCESS_LOGOUT';
export const PROCESS_SUBSCRIBE_EMAIL = 'PROCESS_SUBSCRIBE_EMAIL';

export default {
	
	 [PROCESS_CHANGE_PASSWORD_RESPONSE_MUTATION] (state, response) {
        state.response = response.data;
        // state.getError = {};
        // if (data.status == 1) {
        //     state.getError = data.data;
        // }
        // console.log(response.data)
      /*  data.user = {};
        state.getUser = data;
       	localStorage.setItem('getLogin',JSON.stringify(data));*/

    },  
    [PROCESS_FORGOT_PASSWORD_RESPONSE_MUTATION] (state, response) {
        let response_data = response.data;
        state.getError = {};
        if (response_data.status == 0) {
            state.getError = response_data.data;
        }
        // console.log(response.data)
      /*  data.user = {};
        state.getUser = data;
       	localStorage.setItem('getLogin',JSON.stringify(data));*/

    },
    [PROCESS_FORGOT_PASSWORD_SEND_MAIL_RESPONSE_MUTATION] (state, response) {
        let response_data = response.data;
        state.getError = {};
        if (response_data.status == 0) {
            state.getError = response_data.data;
        }
    },
    [PROCESS_GET_RESET_PASSWORD_TOKEN_RESPONSE_MUTATION] (state, response) {
        let response_data = response.data;
        if (response_data.status == 200) {
            state.getResetPasswordToken = response_data.data;
        }
    },
    [PROCESS_LOGIN_RESPONSE_MUTATION] (state, response) {
        let data = response.data;
        state.getError = {};
        if(data.status==1){
            data.user = {};
           state.getUser = data;
            $('#login_register').modal('hide')
           localStorage.setItem('getLogin',JSON.stringify(data));
        }else{
            state.getError = {
                'message':data.error
            }
            // console.log(data)
        }

    }, 
    [PROCESS_SAVE_USER_REGISTER_RESPONSE_MUTATION] (state, response) {
        let data = response.data;
        if(data.status == 0){
        	state.getError = data.data;
        }else{
            $('#login_register').modal('hide')
        	state.getUser = data.data;
        	localStorage.setItem('getLogin',JSON.stringify(data.data))
        }
      

    }, 
    [PROCESS_USER_RESPONSE_MUTATION] (state, response) {
        let data = response.data;
         if(data.status == 200){
            let getObject = {};
            let getLogin = localStorage.getItem('getLogin');
            if( getLogin != ''){
                   let getDataObject = JSON.parse(getLogin);
                       getObject = getDataObject;
            }
           
            if(Object.keys(getObject).length > 0){
                let getToken = JSON.parse(localStorage.getItem('getLogin'));
                data.token = getToken.token;
                data.status = 1;
                data.user = data.data.getUser;

                localStorage.setItem('getLogin',JSON.stringify(data));
            }
            let getUser = JSON.parse(localStorage.getItem('getLogin'));
            state.getUser = getUser;
            
        }else{
            localStorage.removeItem('getLogin');
            state.getError = data;
        }
        //console.log(getUser)

    },
    [PROCESS_LOGOUT] () {},
    [PROCESS_SUBSCRIBE_EMAIL] (state, response) {
        let data = response.data;
        if (data.status == 0) {
            state.getSubscribeError = data.data['email'][0];
            setTimeout(() => {
                state.getSubscribeError = '';
            }, 3000);
        } else {
            state.getSubscriberEmail = data.data;
            setTimeout(() => {
                state.getSubscriberEmail = {};
            }, 3000);
        }
    }

}