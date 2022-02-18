export const PROCESS_GET_COUNTRIES_LIST = 'PROCESS_GET_COUNTRIES_LIST'

export default {
	[PROCESS_GET_COUNTRIES_LIST] (state, response) {
        let data = response.data;
        if (data.status == 200) {
            state.getCountriesList = data.data;
        }
    }
}