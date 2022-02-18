export const PROCESS_CREATE_CUSTOMER = 'PROCESS_CREATE_CUSTOMER';
export const PROCESS_GET_CUSTOMERS = 'PROCESS_GET_CUSTOMERS';
export const PROCESS_GET_SELLERS = 'PROCESS_GET_SELLERS';
export const PROCESS_GET_CUSTOMER_DETAIL = 'PROCESS_GET_CUSTOMER_DETAIL';
export const PROCESS_GET_CUSTOMER_REPORTS = 'PROCESS_GET_CUSTOMER_REPORTS';

export const PROCESS_EXCEL_DOWNLOAD_CUSTOMERS = 'PROCESS_EXCEL_DOWNLOAD_CUSTOMERS';
export const PROCESS_EXCEL_DOWNLOAD_SELLERS = 'PROCESS_EXCEL_DOWNLOAD_SELLERS';
export const PROCESS_EXCEL_DOWNLOAD_CUSTOMERS_WITH_ORDERS_TOTAL = 'PROCESS_EXCEL_DOWNLOAD_CUSTOMERS_WITH_ORDERS_TOTAL';
export const PROCESS_EXCEL_DOWNLOAD_CUSTOMERS_WITH_NUMBER_OF_ORDERS = 'PROCESS_EXCEL_DOWNLOAD_CUSTOMERS_WITH_NUMBER_OF_ORDERS';
export const PROCESS_EXCEL_DOWNLOAD_REGISTERED_CUSTOMERS = 'PROCESS_EXCEL_DOWNLOAD_REGISTERED_CUSTOMERS';

export default {
    [PROCESS_CREATE_CUSTOMER] (state, response) {
        let data = response.data;
        state.getErrors = {};
        if (data.status == 0) {
            state.getErrors = data.data;
        }
        if(data.status == 200) {
      	    state.getCustomer = data.data; 
        }
    },
	[PROCESS_GET_CUSTOMERS] (state, response) {
        let data = response.data;
        if(data.status == 200) {
      	    state.getCustomers = data.data; 
        }
    },
    [PROCESS_GET_SELLERS] (state, response) {
        let data = response.data;
        if(data.status == 200) {
      	    state.getSellers = data.data; 
        }
    },
    [PROCESS_GET_CUSTOMER_DETAIL] (state, response) {
        let data = response.data;
        if(data.status == 200) {
      	    state.getCustomer = data.data; 
        }
    },
    [PROCESS_EXCEL_DOWNLOAD_CUSTOMERS] (state, response) {
        let data = response.data;
        if(data.status == 200) {
      	    state.excelLink = data.data; 
        }
    },
    [PROCESS_EXCEL_DOWNLOAD_SELLERS] (state, response) {
        let data = response.data;
        if(data.status == 200) {
      	    state.excelLink = data.data; 
        }
    },
    [PROCESS_GET_CUSTOMER_REPORTS] (state, response) {
        let data = response.data;
        if(data.status == 200) {
      	    state.getCustomerReports = data.data; 
        }
    },
    [PROCESS_EXCEL_DOWNLOAD_CUSTOMERS_WITH_ORDERS_TOTAL] (state, response) {
        let data = response.data;
        if(data.status == 200) {
      	    state.excelLink = data.data; 
        }
    },
    [PROCESS_EXCEL_DOWNLOAD_CUSTOMERS_WITH_NUMBER_OF_ORDERS] (state, response) {
        let data = response.data;
        if(data.status == 200) {
      	    state.excelLink = data.data; 
        }
    },
    [PROCESS_EXCEL_DOWNLOAD_REGISTERED_CUSTOMERS] (state, response) {
        let data = response.data;
        if(data.status == 200) {
      	    state.excelLink = data.data; 
        }
    }
}