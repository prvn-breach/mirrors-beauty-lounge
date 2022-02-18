export const PROCESS_PROFILE_RESPONSE_MUTATION = 'PROCESS_PROFILE_RESPONSE_MUTATION'
export const PROCESS_PROFILE_IMAGE_RESPONSE_MUTATION = 'PROCESS_PROFILE_IMAGE_RESPONSE_MUTATION'
export const PROCESS_PROFILE_IMAGE_ERROR_RESPONSE_MUTATION = 'PROCESS_PROFILE_IMAGE_ERROR_RESPONSE_MUTATION'


export default {
	
	 [PROCESS_PROFILE_RESPONSE_MUTATION] (state, response) {
        let data = response.data;
        state.getUploadError = '';
        if (data.status == 0) {
            state.getUploadError = data.data;
        }
       if(data.status == 1){
       	let getUser = JSON.parse(localStorage.getItem('getLogin'));
       	 state.getUser = data.data;
       	 getUser.user = data.data;
       	 localStorage.setItem('getLogin',JSON.stringify(getUser));
       }
       
       	

    }, 
    [PROCESS_PROFILE_IMAGE_RESPONSE_MUTATION] (state, response) {
        let data = response.data;
       if(data.status == 1){
       	let getUser = JSON.parse(localStorage.getItem('getLogin'));
       	 state.getUser = data.data;
       	 getUser.user = data.data;
       	 localStorage.setItem('getLogin',JSON.stringify(getUser));
       }
    },  

    [PROCESS_PROFILE_IMAGE_ERROR_RESPONSE_MUTATION] (state, response) {
        console.log(response)
      
    }, 
    

}