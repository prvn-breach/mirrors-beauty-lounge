export const PROCESS_LOGIN_RESPONSE_MUTATION = 'PROCESS_LOGIN_RESPONSE_MUTATION'
export const PROCESS_USER_RESPONSE_MUTATION = 'PROCESS_USER_RESPONSE_MUTATION'
export const PROCESS_SAVE_USER_REGISTER_RESPONSE_MUTATION = 'PROCESS_SAVE_USER_REGISTER_RESPONSE_MUTATION'
export const PROCESS_CHANGE_PASSWORD_RESPONSE_MUTATION = 'PROCESS_CHANGE_PASSWORD_RESPONSE_MUTATION'
export const PROCESS_FORGOT_PASSWORD_RESPONSE_MUTATION = 'PROCESS_FORGOT_PASSWORD_RESPONSE_MUTATION';
export const PROCESS_UPDATE_PROFILE_RESPONSE_MUTATION = 'PROCESS_UPDATE_PROFILE_RESPONSE_MUTATION';

export default {
	
    [PROCESS_CHANGE_PASSWORD_RESPONSE_MUTATION] (state, response) {
        let data = response.data;
    },  
    [PROCESS_LOGIN_RESPONSE_MUTATION] (state, response) {
        let data = response.data;
        state.getError = {};
        if(data.status==1){
            data.user = {};
           state.getUser = data;
           localStorage.setItem('getAdminLogin',JSON.stringify(data));
        }else{
            state.getError = {
                'message':data.error
            }
        }
    }, 
    [PROCESS_UPDATE_PROFILE_RESPONSE_MUTATION] (state, response) {
        let data = response.data;
        state.getError = {};
        if(data.status==1){
            data.user = {};
           state.getUser = data;
           localStorage.setItem('getAdminLogin',JSON.stringify(data));
        }else if(data.status == 0){
            state.getError = data.data;
        } else{
            state.getError = {
                'message':data.error
            }
        }
    }, 
    [PROCESS_SAVE_USER_REGISTER_RESPONSE_MUTATION] (state, response) {
        let data = response.data;
        if(data.status == 0){
        	state.getError = data.data;
        }else{
            $('#login_register').modal('hide')
        	state.getUser = data;
           
        	localStorage.setItem('getAdminLogin',JSON.stringify(data))
        }
      

    }, 
    [PROCESS_USER_RESPONSE_MUTATION] (state, response) {
        let data = response.data;
       // console.log('login user data',data)
        if(data.status == 200){
            if(localStorage.getItem('getAdminLogin') == null){
            let getToken = JSON.parse(localStorage.getItem('getAdminLogin'));
            data.token = getToken.token;
            data.status = 1;
            localStorage.setItem('getAdminLogin',JSON.stringify(data.data));
            }
            let getUser = JSON.parse(localStorage.getItem('getAdminLogin'));
            state.getUser = getUser;
        }else{
           
            localStorage.removeItem('getAdminLogin');
            state.getError = data;
        }
      

    },
    [PROCESS_FORGOT_PASSWORD_RESPONSE_MUTATION] (state, response) {
        let data = response.data;
        state.getError = {};
        if (data.status == 0) {
            state.getError = data.data;
        }
    }
}