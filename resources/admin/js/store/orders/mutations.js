export const PROCESS_ORDERS_COUNT = 'PROCESS_ORDERS_COUNT';
export const PROCESS_GET_ORDERS_LIST = 'PROCESS_GET_ORDERS_LIST';
export const PROCESS_GET_INCOMPLETE_ORDERS_LIST = 'PROCESS_GET_INCOMPLETE_ORDERS_LIST';
export const PROCESS_GET_ORDER = 'PROCESS_GET_ORDER';
export const PROCESS_ADD_ORDER_FOLLOW_UP = 'PROCESS_ADD_ORDER_FOLLOW_UP';
export const PROCESS_ADD_ORDER = 'PROCESS_ADD_ORDER';
export const PROCESS_UPDATE_ORDER_STATUS = 'PROCESS_UPDATE_ORDER_STATUS';
export const PROCESS_GET_COMPLAINTS = 'PROCESS_GET_COMPLAINTS';
export const PROCESS_CREATE_COMPLAINT_DETAIL = 'PROCESS_CREATE_COMPLAINT_DETAIL';
export const PROCESS_GET_CURRENT_CARTS = 'PROCESS_GET_CURRENT_CARTS';
export const PROCESS_GET_CURRENT_WISHLISTS = 'PROCESS_GET_CURRENT_WISHLISTS';
export const PROCESS_GET_BEST_SELLER_PRODUCTS = 'PROCESS_GET_BEST_SELLER_PRODUCTS';
export const PROCESS_GET_NEVER_PURCHASED_PRODUCTS = 'PROCESS_GET_NEVER_PURCHASED_PRODUCTS';
export const PROCESS_GET_COUNTRY_REPORT = 'PROCESS_GET_COUNTRY_REPORT';

export const PROCESS_EXCEL_DOWNLOAD_ORDERS = 'PROCESS_EXCEL_DOWNLOAD_ORDERS';
export const PROCESS_EXCEL_DOWNLOAD_INCOMPLETE_ORDERS = 'PROCESS_EXCEL_DOWNLOAD_INCOMPLETE_ORDERS';
export const PROCESS_EXCEL_DOWNLOAD_COMPLAINTS = 'PROCESS_EXCEL_DOWNLOAD_COMPLAINTS';
export const PROCESS_EXCEL_DOWNLOAD_CARTS = 'PROCESS_EXCEL_DOWNLOAD_CARTS';
export const PROCESS_EXCEL_DOWNLOAD_WISHLISTS = 'PROCESS_EXCEL_DOWNLOAD_WISHLISTS';
export const PROCESS_EXCEL_DOWNLOAD_BEST_SELLER_PRODUCTS = 'PROCESS_EXCEL_DOWNLOAD_BEST_SELLER_PRODUCTS';
export const PROCESS_EXCEL_DOWNLOAD_NEVER_PURCHASED_PRODUCTS = 'PROCESS_EXCEL_DOWNLOAD_NEVER_PURCHASED_PRODUCTS';
export const PROCESS_EXCEL_DOWNLOAD_COUNTRY_REPORT = 'PROCESS_EXCEL_DOWNLOAD_COUNTRY_REPORT';

export default {
    [PROCESS_ORDERS_COUNT] (state, response) {
        let data = response.data;
        if(data.status == 200) {
      	    state.getOrdersCount = data.data; 
        }
    },
	[PROCESS_GET_ORDERS_LIST] (state, response) {
        let data = response.data;
        if(data.status == 200) {
      	    state.getOrders = data.data; 
        }
    },
    [PROCESS_GET_INCOMPLETE_ORDERS_LIST] (state, response) {
        let data = response.data;
        if(data.status == 200) {
      	    state.getOrders = data.data; 
        }
    },
    [PROCESS_GET_ORDER] (state, response) {
        let data = response.data;
        if(data.status == 200) {
      	    state.getOrder = data.data; 
        }
    },
    [PROCESS_ADD_ORDER_FOLLOW_UP] (state, response) {
        let data = response.data;
        if(data.status == 200) {
      	    state.orderFollowUp = data.data; 
        }
    },
    [PROCESS_ADD_ORDER] (state, response) {
        let data = response.data;
        state.getErrors = {};
        if (data.status == 0) {
            state.getErrors = data.data;
        }
        if(data.status == 200) {
      	    state.getOrder = data.data; 
        }
    },
    [PROCESS_EXCEL_DOWNLOAD_ORDERS] (state, response) {
        let data = response.data;
        if(data.status == 200) {
      	    state.excelLink = data.data; 
        }
    },
    [PROCESS_EXCEL_DOWNLOAD_INCOMPLETE_ORDERS] (state, response) {
        let data = response.data;
        if(data.status == 200) {
      	    state.excelLink = data.data; 
        }
    },
    [PROCESS_GET_COMPLAINTS] (state, response) {
        let data = response.data;
        if(data.status == 200) {
      	    state.getOrders = data.data; 
        }
    },
    [PROCESS_CREATE_COMPLAINT_DETAIL] (state, response) {
        let data = response.data;
        if(data.status == 0) {
      	    state.getError = data.data; 
        } else {
            state.getError = false;
        }
    },
    [PROCESS_EXCEL_DOWNLOAD_COMPLAINTS] (state, response) {
        let data = response.data;
        if(data.status == 200) {
      	    state.excelLink = data.data; 
        }
    },
    [PROCESS_GET_CURRENT_CARTS] (state, response) {
        let data = response.data;
        if(data.status == 200) {
      	    state.getCarts = data.data; 
        }
    },
    [PROCESS_GET_CURRENT_WISHLISTS] (state, response) {
        let data = response.data;
        if(data.status == 200) {
      	    state.getWishlists = data.data; 
        }
    },
    [PROCESS_EXCEL_DOWNLOAD_CARTS] (state, response) {
        let data = response.data;
        if(data.status == 200) {
      	    state.excelLink = data.data; 
        }
    },
    [PROCESS_EXCEL_DOWNLOAD_WISHLISTS] (state, response) {
        let data = response.data;
        if(data.status == 200) {
      	    state.excelLink = data.data; 
        }
    },
    [PROCESS_GET_BEST_SELLER_PRODUCTS] (state, response) {
        let data = response.data;
        if(data.status == 200) {
      	    state.getBestSellerProducts = data.data; 
        }
    },
    [PROCESS_EXCEL_DOWNLOAD_BEST_SELLER_PRODUCTS] (state, response) {
        let data = response.data;
        if(data.status == 200) {
      	    state.excelLink = data.data; 
        }
    },
    [PROCESS_GET_NEVER_PURCHASED_PRODUCTS] (state, response) {
        let data = response.data;
        if(data.status == 200) {
      	    state.getProductsNeverPurchase = data.data; 
        }
    },
    [PROCESS_EXCEL_DOWNLOAD_NEVER_PURCHASED_PRODUCTS] (state, response) {
        let data = response.data;
        if(data.status == 200) {
      	    state.excelLink = data.data; 
        }
    },    
    [PROCESS_GET_COUNTRY_REPORT] (state, response) {
        let data = response;
        if(data.status == 200) {
      	    state.getCountryReport = data.data; 
        }
    },
    [PROCESS_EXCEL_DOWNLOAD_COUNTRY_REPORT] (state, response) {
        let data = response.data;
        if(data.status == 200) {
      	    state.excelLink = data.data; 
        }
    },
    [PROCESS_UPDATE_ORDER_STATUS] () {},
}