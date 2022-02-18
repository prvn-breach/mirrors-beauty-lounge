import {
    PROCESS_EXPORT
} from './mutations'
export const EXPORT_ACTION = 'EXPORT_ACTION';

export default {
    [EXPORT_ACTION] (context,params) {
        return new Promise((resolve, reject) => {
            axios.get(process.env.MIX_BASE_URL+'api/admin/export',params).then((response) => {
                context.commit(PROCESS_EXPORT, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                reject()
            })
        })
    }
}