export const PROCESS_ADD_STORE_DETAIL = 'PROCESS_ADD_STORE_DETAIL';
export const PROCESS_ADD_WAREHOUSE_ADDRESS = 'PROCESS_ADD_WAREHOUSE_ADDRESS';
export const PROCESS_GET_WAREHOUSE_ADDRESS = 'PROCESS_GET_WAREHOUSE_ADDRESS';

export default {
	[PROCESS_ADD_STORE_DETAIL] (state, response) {
        let data = response.data;
        if (data.status == 200) {
            state.getStoreDetails = data.data;
        }
    },
    [PROCESS_ADD_WAREHOUSE_ADDRESS] (state, response) {
        let data = response.data;
        if (data.status == 200) {
            state.getWarehouseAddress = data.data;
        }
    },
    [PROCESS_GET_WAREHOUSE_ADDRESS] (state, response) {
        let data = response.data;
        if (data.status == 200) {
            state.getWarehouseAddress = data.data;
        }
    }
}