<template>
    <div id="content" class="flex">
        <div class="page-container">
            <div class="pt-3 pr-3 pb-5 pl-3">
                <div class="mb-5">
                    <h2 class="dv_page_heading">Customer Reports </h2>
                    <div class="row dv_search_delete_action_common">
                        <div class="col-md-5 col-sm-5 col-xs-5 col-5">
                            <input v-model="filters.search" @input="getCustomerReports" type="text" class="form-control dv_common_search_for_all" name="" placeholder="Search">
                        </div>
                        <!-- <div class="col-md-7 col-sm-7 col-xs-7 col-7">
                            <button type="text" class="btn btn-default dv_export_common" data-toggle="tooltip" data-placement="top" title="Download all Product CSV">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="7 10 12 15 17 10"></polyline><line x1="12" y1="15" x2="12" y2="3"></line></svg>
                            </button>
                        </div> -->
                    </div>
                    <div class="row mt-4 dv_filter_content_show" style="display: none;">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <strong>Filter </strong>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize d-block w-100" for="name">Date From - to </label>
                                                <input type="text" class="form-control dv_common_input_for_all dv_range_datepicker" name="" placeholder="Select">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize d-block w-100" for="name">Order Status </label>
                                                <select class="form-control dv_common_select_for_all">
                                                    <option value="">Select</option>
                                                    <option value="Delivered">Delivered</option>
                                                    <option value="Shipped">Shipped</option>            
                                                    <option value="Processing">Processing</option>
                                                    <option value="Canceled">Canceled</option>
                                                    <option value="Returned">Returned</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize d-block w-100" for="name">Payment Status </label>  
                                                <select class="form-control dv_common_select_for_all">
                                                    <option value="">Select</option>
                                                    <option value="Successfully Authorized">Successfully Authorized</option>
                                                    <option value="Successfully Captured">Successfully Captured</option>            
                                                    <option value="Successfully Refund">Successfully Refund</option>
                                                    <option value="Partially Captured">Partially Captured</option>
                                                    <option value="Partially Refund">Partially Refund</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>                                    
                        </div>
                    </div>
                    <div class="card mt-3 mb-0">
                        <div class="b-b">
                            <div class="nav-active-border b-primary bottom">
                                <ul class="nav" id="myTab" role="tablist">
                                    <li class="nav-item d-flex align-items-center" @click="tabChange('orders_total')">
                                        <a class="nav-link dv_tabs_a_tag active" id="home-tab" data-toggle="tab" href="#reportone" role="tab" aria-controls="home" aria-selected="true"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>Customers by order total</a>
                                        <button @click="excelDownload" v-if="current_tab == 'orders_total'" type="text" class="btn btn-default dv_export_common" style="height: 30px;" data-toggle="tooltip" data-placement="top" title="Download all Product CSV">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="7 10 12 15 17 10"></polyline><line x1="12" y1="15" x2="12" y2="3"></line></svg>
                                        </button>
                                    </li>
                                    <li class="nav-item d-flex align-items-center" @click="tabChange('no_of_orders')">
                                        <a class="nav-link dv_tabs_a_tag" id="profile-tab" data-toggle="tab" href="#reporttwo" role="tab" aria-controls="profile" aria-selected="false"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>Customers by number of orders</a>
                                        <button @click="excelDownload" v-if="current_tab == 'no_of_orders'" type="text" class="btn btn-default dv_export_common" style="height: 30px;" data-toggle="tooltip" data-placement="top" title="Download all Product CSV">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="7 10 12 15 17 10"></polyline><line x1="12" y1="15" x2="12" y2="3"></line></svg>
                                        </button>
                                    </li>
                                    <li class="nav-item d-flex align-items-center" @click="tabChange('registered_customers')">
                                        <a class="nav-link dv_tabs_a_tag" id="contact-tab" data-toggle="tab" href="#reportthree" role="tab" aria-controls="contact" aria-selected="false"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-check"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><polyline points="17 11 19 13 23 9"></polyline></svg>Registered customers</a>
                                        <button @click="excelDownload" v-if="current_tab == 'registered_customers'" type="text" class="btn btn-default dv_export_common" style="height: 30px;" data-toggle="tooltip" data-placement="top" title="Download all Product CSV">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="7 10 12 15 17 10"></polyline><line x1="12" y1="15" x2="12" y2="3"></line></svg>
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="reportone" role="tabpanel" aria-labelledby="home-tab">
                            <div class="table-responsive">
                                <table class="table table-theme table-row v-middle">
                                    <thead>
                                        <tr>
                                            <th style="width: 30%;" class="text-muted">customer </th>
                                            <th style="width: 25%;" class="text-muted">order total </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="(user,index) in getReports.users_with_orders" :key="index" class="v-middle">
                                            <td>
                                                <span class="item-except text-muted text-sm h-1x">
                                                    {{  user['email'] }}    
                                                </span>
                                            </td>
                                            <td>
                                                <strong>AED {{ user['user_with_payments_sum_total'] == null ? 0 : user['user_with_payments_sum_total'] }}</strong>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="reporttwo" role="tabpanel" aria-labelledby="home-tab">
                            <div class="table-responsive">
                                <table class="table table-theme table-row v-middle">
                                    <thead>
                                        <tr>
                                            <th style="width: 30%;" class="text-muted sortable">customer </th>
                                            <th style="width: 30%;" class="text-muted sortable">Number of orders </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="(user,index) in getReports.users_with_orders" :key="index" class="v-middle">
                                            <td>
                                                <span class="item-except text-muted text-sm h-1x">
                                                    {{  user['email'] }}     
                                                </span>
                                            </td>
                                            <td>
                                                {{  user['orders_count'] }}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="reportthree" role="tabpanel" aria-labelledby="home-tab">
                            <div class="table-responsive">
                                <table class="table table-theme table-row v-middle">
                                    <thead>
                                        <tr>
                                            <th style="width: 40%;" class="text-muted sortable">period </th>
                                            <th style="width: 45%;" class="text-muted sortable">count </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="(customer,index) in registered_customers" :key="index" class="v-middle">
                                            <td>
                                                <span class="item-except text-muted text-sm h-1x">
                                                    {{ customer['period'] }}
                                                </span>
                                            </td>
                                            <td>
                                                {{ customer['count'] }}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import Vue from 'vue'
import { mapState } from 'vuex'
import { deleteEmptyKeys } from "../../mixins";
import { 
    GET_CUSTOMER_REPORTS_ACTION, 
    EXCEL_DOWNLOAD_CUSTOMERS_WITH_ORDERS_TOTAL_ACTION, 
    EXCEL_DOWNLOAD_CUSTOMERS_WITH_NUMBER_OF_ORDERS_ACTION,
    EXCEL_DOWNLOAD_REGISTERED_CUSTOMERS_ACTION
} from '@admin/store/customers/actions'
export default {
    data(){
        return {
            baseUrl:Vue.config.baseUrl,
            baseUrlImage: Vue.config.baseUrlImage,
            filters: {
                search: ''
            },
            current_tab: 'orders_total',
            tabs: {
                orders_total : {
                    excel: EXCEL_DOWNLOAD_CUSTOMERS_WITH_ORDERS_TOTAL_ACTION
                },
                no_of_orders: {
                    excel: EXCEL_DOWNLOAD_CUSTOMERS_WITH_NUMBER_OF_ORDERS_ACTION
                },
                registered_customers: {
                    excel: EXCEL_DOWNLOAD_REGISTERED_CUSTOMERS_ACTION
                }
            },
            registered_customers: [ ]
        }
    },
    computed:{
        ...mapState({
            getReports: state => state.getCustomer.getCustomerReports,
            excelLink: state => state.getCustomer.excelLink
        })
    },
    mounted() {
        this.getCustomerReports();
    },
    methods: {
        getCustomerReports: function (){
            let query = [];
            query['params'] = deleteEmptyKeys(this.filters);
            this.$store.dispatch('getCustomer/' + GET_CUSTOMER_REPORTS_ACTION, query).then(() => {
                this.registered_customers = [];
                if (this.getReports['registered_users']['7']) {
                    this.registered_customers.push({
                        period: 'In the last 7 days',
                        count: this.getReports['registered_users']['7']
                    });
                }

                if (this.getReports['registered_users']['14']) {
                    this.registered_customers.push({
                        period: 'In the last 14 days',
                        count: this.getReports['registered_users']['14']
                    });
                }

                if (this.getReports['registered_users']['30']) {
                    this.registered_customers.push({
                        period: 'In the last month',
                        count: this.getReports['registered_users']['30']
                    });
                }

                if (this.getReports['registered_users']['365']) {
                    this.registered_customers.push({
                        period: 'In the last year',
                        count: this.getReports['registered_users']['365']
                    });
                }
            });
        },
        tabChange: function (tab){
            this.current_tab = tab;
        },
        excelDownload: function() {
            let query = [];
            let params = {
                search: this.filters.search,
                tab: this.current_tab,
                response_type: 'xlsx'
            };
            query['params'] = deleteEmptyKeys(params);
            this.$store.dispatch('getCustomer/' + this.tabs[this.current_tab]['excel'], query).then(() => {
                const link = document.createElement("a");
                link.href = this.excelLink;
                link.setAttribute("download", "reports.xlsx"); //or any other extension
                document.body.appendChild(link);
                link.click();
            });
        }
    }
}
</script>