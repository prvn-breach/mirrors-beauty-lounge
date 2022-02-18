import {
    PROCESS_CREATE_COMPLAINT
} from './mutations'

export const CREATE_COMPLAINT_ACTION = 'CREATE_COMPLAINT_ACTION';

export default {
    [CREATE_COMPLAINT_ACTION] (context, params) {
        return new Promise((resolve, reject) => {
            axios.post(process.env.MIX_BASE_URL+'api/create-complaint',params).then((response) => {
                context.commit(PROCESS_CREATE_COMPLAINT, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                reject()
            })
        })
    } 
}