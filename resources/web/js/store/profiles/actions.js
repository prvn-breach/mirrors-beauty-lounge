import {PROCESS_PROFILE_RESPONSE_MUTATION,PROCESS_PROFILE_IMAGE_RESPONSE_MUTATION,PROCESS_PROFILE_IMAGE_ERROR_RESPONSE_MUTATION} from './mutations'
 import Vue from 'vue'
export const UPDATE_PROFILE_ACTION = 'UPDATE_PROFILE_ACTION'
export const UPDATE_PROFILE_IMAGE_ACTION = 'UPDATE_PROFILE_IMAGE_ACTION'
export default {
     data() {
            return {
              baseUrl:Vue.config.baseUrl,
              baseUrlImage:Vue.config.baseUrlImage,
            }
        },
    [UPDATE_PROFILE_ACTION] (context,data) {
        let _this = this;
       
        //context.commit(TYPE_LIST_NOT_LOADED_MUTATION)
        return new Promise((resolve, reject) => {
            axios.post(process.env.MIX_BASE_URL+'api/update-profile',data).then((response) => {
                context.commit(PROCESS_PROFILE_RESPONSE_MUTATION, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                reject()
            })
        })
    }, 
    [UPDATE_PROFILE_IMAGE_ACTION] (context,data) {
        let _this = this;
        //context.commit(TYPE_LIST_NOT_LOADED_MUTATION)
        return new Promise((resolve, reject) => {
            axios.post(process.env.MIX_BASE_URL+'api/update-profile-image',data).then((response) => {
                context.commit(PROCESS_PROFILE_RESPONSE_MUTATION, response)
                resolve()
            }).catch((error) => {
                 context.commit(PROCESS_PROFILE_IMAGE_ERROR_RESPONSE_MUTATION, error)
               // console.log(error)
                reject()
            })
        })
    },
   

    
}