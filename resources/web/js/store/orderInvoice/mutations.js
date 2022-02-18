export const EXPORT_ORDER_INVOICE_MUTATION = 'EXPORT_ORDER_INVOICE_MUTATION'

export default {
    [EXPORT_ORDER_INVOICE_MUTATION] (state, response) {
        let data = response.data;
        if(data.status == 200){
            state.path = data.data;
        }
    }
}