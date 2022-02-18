import {
    PROCESS_IMPORT
} from './mutations'
export const IMPORT_ACTION = 'IMPORT_ACTION';

export default {
    [IMPORT_ACTION] (context,params) {
        return new Promise((resolve, reject) => {
            axios.post(process.env.MIX_BASE_URL+'api/admin/import',params).then((response) => {
                context.commit(PROCESS_IMPORT, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                reject()
            })
        })
    }
}