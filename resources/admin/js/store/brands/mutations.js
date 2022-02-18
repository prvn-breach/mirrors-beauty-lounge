export const PROCESS_ADD_BRAND_RESPONSE_MUTATION = 'PROCESS_ADD_BRAND_RESPONSE_MUTATION'
export const PROCESS_DELETE_BRANDS_RESPONSE_MUTATION = 'PROCESS_DELETE_BRANDS_RESPONSE_MUTATION'
export const PROCESS_EXCEL_DOWNLOAD_BRANDS_MUTATION = 'PROCESS_EXCEL_DOWNLOAD_BRANDS_MUTATION'
export const PROCESS_BRAND_LIST_RESPONSE_MUTATION = 'PROCESS_BRAND_LIST_RESPONSE_MUTATION'
export const PROCESS_GET_BRAND_RESPONSE_MUTATION = 'PROCESS_GET_BRAND_RESPONSE_MUTATION'
export const PROCESS_UPDATE_STATUS_BRAND_RESPONSE_MUTATION = 'PROCESS_UPDATE_STATUS_BRAND_RESPONSE_MUTATION'
export const PROCESS_ADD_CATEGORY_RESPONSE_MUTATION = 'PROCESS_ADD_CATEGORY_RESPONSE_MUTATION'


export default {
	[PROCESS_ADD_CATEGORY_RESPONSE_MUTATION] (state, response) {
        let data = response.data;
        state.getError = {};
        if(data.status == 0){
            state.getError = data.data
        }else{

        }
        console.log(response.data)
      /*  data.user = {};
        state.getUser = data;
        localStorage.setItem('getLogin',JSON.stringify(data));*/

    },  
	 [PROCESS_UPDATE_STATUS_BRAND_RESPONSE_MUTATION] (state, response) {
        let data = response.data;
        console.log(data)
        /*if(data.status == 200){
            state.getBrand = data.data;
        }*/
    }, 
    [PROCESS_GET_BRAND_RESPONSE_MUTATION] (state, response) {
        let data = response.data;
        if(data.status == 200){
            state.getBrand = data.data;
        }
    },  
    [PROCESS_BRAND_LIST_RESPONSE_MUTATION] (state, response) {
        let data = response.data;
        state.getBrands = data;
       // console.log(response.data)
      /*  data.user = {};
        state.getUser = data;
        localStorage.setItem('getLogin',JSON.stringify(data));*/

    },  
    [PROCESS_EXCEL_DOWNLOAD_BRANDS_MUTATION] (state, response) {
        state.excelLink = response.data;
    },
    [PROCESS_ADD_BRAND_RESPONSE_MUTATION] (state, response) {
        let data = response.data;
        state.getError = {};
        if(data.status == 0){
            state.getError = data.data
        }else{

        }
        console.log(response.data)
      /*  data.user = {};
        state.getUser = data;
        localStorage.setItem('getLogin',JSON.stringify(data));*/

    },
    [PROCESS_DELETE_BRANDS_RESPONSE_MUTATION] () { }
}