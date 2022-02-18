import {
    EXPORT_ORDER_INVOICE_MUTATION,
} from './mutations'

export const EXPORT_ORDER_INVOICE_ACTION = 'EXPORT_ORDER_INVOICE_ACTION'
export default {
    [EXPORT_ORDER_INVOICE_ACTION] (context,data) {
        return new Promise((resolve, reject) => {
            axios.get(process.env.MIX_BASE_URL+'api/export-order-invoice',data).then((response) => {
                context.commit(EXPORT_ORDER_INVOICE_MUTATION, response)
                resolve()
            }).catch((error) => {
                console.log(error)
                reject()
            })
        })   
    } 
}