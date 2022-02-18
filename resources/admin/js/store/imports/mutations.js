export const PROCESS_IMPORT = 'PROCESS_IMPORT'

export default {
	[PROCESS_IMPORT] (state, response) {
        state.response = null;
        state.response = response.data.data;
    }
}