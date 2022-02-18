import { EXCEL_DOWNLOAD_ACTIVE_CUSTOMER_LOCATIONS_REPORT_ACTION } from "./actions";

export const PROCESS_SEM_SALE_REPORT= 'PROCESS_SEM_SALE_REPORT';
export const PROCESS_SEM_EXPENSES_REPORT= 'PROCESS_SEM_EXPENSES_REPORT';
export const PROCESS_ADD_SEM_EXPENSE = 'PROCESS_ADD_SEM_EXPENSE';
export const PROCESS_PRODUCT_INSERT_REPORT = 'PROCESS_PRODUCT_INSERT_REPORT';
export const PROCESS_TOP_CATEGORY_SALES_REPORT = 'PROCESS_TOP_CATEGORY_SALES_REPORT';
export const PROCESS_TOP_CUSTOMER_SALES_REPORT = 'PROCESS_TOP_CUSTOMER_SALES_REPORT';
export const PROCESS_PRODUCT_VISITS_REPORT = 'PROCESS_PRODUCT_VISITS_REPORT';
export const PROCESS_PRODUCT_SALE_COST_REPORT = 'PROCESS_PRODUCT_SALE_COST_REPORT';
export const PROCESS_ACTIVE_CUSTOMER_LOCATIONS = 'PROCESS_ACTIVE_CUSTOMER_LOCATIONS';
export const PROCESS_ORDER_STATUS_REPORT = 'PROCESS_ORDER_STATUS_REPORT';

export const PROCESS_EXCEL_DOWNLOAD_PRODUCT_INSERT_REPORT= 'PROCESS_EXCEL_DOWNLOAD_PRODUCT_INSERT_REPORT';
export const PROCESS_EXCEL_DOWNLOAD_SEM_SALE_REPORT= 'PROCESS_EXCEL_DOWNLOAD_SEM_SALE_REPORT';
export const PROCESS_EXCEL_DOWNLOAD_PRODUCT_VISITS_REPORT = 'PROCESS_EXCEL_DOWNLOAD_PRODUCT_VISITS_REPORT';
export const PROCESS_EXCEL_DOWNLOAD_PRODUCT_SALE_COST_REPORT = 'PROCESS_EXCEL_DOWNLOAD_PRODUCT_SALE_COST_REPORT';
export const PROCESS_EXCEL_DOWNLOAD_CATEGORY_SALE_COST_REPORT = 'PROCESS_EXCEL_DOWNLOAD_CATEGORY_SALE_COST_REPORT';
export const PROCESS_EXCEL_DOWNLOAD_ORDER_STATUS_REPORT = 'PROCESS_EXCEL_DOWNLOAD_ORDER_STATUS_REPORT';
export const PROCESS_EXCEL_DOWNLOAD_CUSTOMER_SALES_REPORT = 'PROCESS_EXCEL_DOWNLOAD_CUSTOMER_SALES_REPORT';
export const PROCESS_EXCEL_DOWNLOAD_ACTIVE_CUSTOMER_LOCATIONS_REPORT = 'PROCESS_EXCEL_DOWNLOAD_ACTIVE_CUSTOMER_LOCATIONS_REPORT';

export default {
    [PROCESS_SEM_SALE_REPORT] (state, response) {
        let data = response.data;
        if (data.status == 200) {
            state.getSemSalesReport = data.data;
        }
    },
    [PROCESS_EXCEL_DOWNLOAD_SEM_SALE_REPORT] (state, response) {
        let data = response.data;
        if (data.status == 200) {
            state.excelLink = data.data;
        }
    },
    [PROCESS_SEM_EXPENSES_REPORT] (state, response) {
        let data = response.data;
        if (data.status == 200) {
            state.getSemExpensesReport = data.data;
        }
    },
    [PROCESS_ADD_SEM_EXPENSE] (state, response) {
        let data = response.data;
        if (data.status == 200) {
            state.getSemExpense = data.data;
        }
    },
    [PROCESS_PRODUCT_INSERT_REPORT] (state, response) {
        let data = response.data;
        if (data.status == 200) {
            state.getProductInsertReport = data.data;
        }
    },
    [PROCESS_EXCEL_DOWNLOAD_PRODUCT_INSERT_REPORT] (state, response) {
        let data = response.data;
        if (data.status == 200) {
            state.excelLink = data.data;
        }
    },
    [PROCESS_TOP_CATEGORY_SALES_REPORT] (state, response) {
        let data = response.data;
        if (data.status == 200) {
            state.getTopCategorySalesReport = data.data;
        }
    },
    [PROCESS_EXCEL_DOWNLOAD_CATEGORY_SALE_COST_REPORT] (state, response) {
        let data = response.data;
        if (data.status == 200) {
            state.excelLink = data.data;
        }
    },
    [PROCESS_TOP_CUSTOMER_SALES_REPORT] (state, response) {
        let data = response.data;
        if (data.status == 200) {
            state.getTopCustomerSalesReport = data.data;
        }
    },
    [PROCESS_EXCEL_DOWNLOAD_CUSTOMER_SALES_REPORT] (state, response) {
        let data = response.data;
        if (data.status == 200) {
            state.excelLink = data.data;
        }
    },
    [PROCESS_PRODUCT_SALE_COST_REPORT] (state, response) {
        let data = response.data;
        if (data.status == 200) {
            state.getProductSalesReport = data.data;
        }
    },
    [PROCESS_EXCEL_DOWNLOAD_PRODUCT_SALE_COST_REPORT] (state, response) {
        let data = response.data;
        if (data.status == 200) {
            state.excelLink = data.data;
        }
    },
    [PROCESS_PRODUCT_VISITS_REPORT] (state, response) {
        let data = response.data;
        if (data.status == 200) {
            state.getProductVisitsReport = data.data;
        }
    },
    [PROCESS_EXCEL_DOWNLOAD_PRODUCT_VISITS_REPORT] (state, response) {
        let data = response.data;
        if (data.status == 200) {
            state.excelLink = data.data;
        }
    },
    [PROCESS_ACTIVE_CUSTOMER_LOCATIONS] (state, response) {
        let data = response.data;
        if (data.status == 200) {
            state.getActiveCustomerLocations = data.data;
        }
    },
    [PROCESS_EXCEL_DOWNLOAD_ACTIVE_CUSTOMER_LOCATIONS_REPORT] (state, response) {
        let data = response.data;
        if (data.status == 200) {
            state.excelLink = data.data;
        }
    },
    [PROCESS_ORDER_STATUS_REPORT] (state, response) {
        let data = response.data;
        if (data.status == 200) {
            state.getOrderStatusReport = data.data;
        }
    },
    [PROCESS_EXCEL_DOWNLOAD_ORDER_STATUS_REPORT] (state, response) {
        let data = response.data;
        if (data.status == 200) {
            state.excelLink = data.data;
        }
    },
}