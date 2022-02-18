export const PROCESS_CREATE_COMPLAINT = 'PROCESS_CREATE_COMPLAINT'

export default {
    [PROCESS_CREATE_COMPLAINT](state, response) {
        let data = response.data;
        if (data.status == 200) {
            state.getComplaint = data.data;
        }
    }
}