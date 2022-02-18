<template>
    <div id="content" class="flex">
        <div class="page-container">
            <div class="pt-3 pr-3 pb-5 pl-3">
                <div class="mb-5">
                    <h2 class="dv_page_heading">Customers List </h2>
                    <div class="row dv_search_delete_action_common">
                        <div class="col-md-5 col-sm-5 col-xs-5 col-5">
                            <input v-model="filters.search" @keyup="getCustomersList" type="text" class="form-control dv_common_search_for_all" name="" placeholder="Search">
                        </div>
                        <div class="col-md-7 col-sm-7 col-xs-7 col-7">
                            <router-link :to="{ name: 'addCustomer' }" tag="button" class="btn btn-default dv_filter_common" data-toggle="tooltip" data-placement="top" title="Add Customer">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <line x1="12" y1="5" x2="12" y2="19"></line>
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                </svg>
                            </router-link>
                            <button @click="excelDownload" type="text" class="btn btn-default dv_export_common" data-toggle="tooltip" data-placement="top" title="Download all Product CSV">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="7 10 12 15 17 10"></polyline><line x1="12" y1="15" x2="12" y2="3"></line></svg>
                            </button>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-theme table-row v-middle">
                            <thead>
                                <tr>
                                    <th style="width: 5%;" class="text-muted">Customer ID</th>
                                    <th style="width: 15%;" class="text-muted">created </th>
                                    <th style="width: 23%;" class="text-muted">customer email </th>
                                    <th style="width: 22%;" class="text-muted">customer name</th>
                                    <th style="width: 13%;" class="text-muted">last login activity </th>
                                    <th style="width: 5%;" class="text-muted">action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(customer, index) in getCustomers.data" :key="index" class="v-middle">
                                    <td>{{ customer['id'] }}</td>
                                    <td>{{ customer['created_at'].split('T')[0] }}</td>
                                    <td>
                                        <span class="item-except text-muted text-sm h-1x">
                                            {{ customer['email'] }}
                                        </span>
                                    </td>
                                    <td>
                                        <span class="item-except text-muted text-sm h-1x">
                                            {{ customer['name'] }}
                                        </span>
                                    </td>
                                    <td> {{ customer['latest_user_activity']!=null ? customer['latest_user_activity']['login']: '-' }} </td>
                                    <td>
                                        <router-link :to="{ name : 'getCustomerDetail', params: { customer_id: customer.id } }">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="dv_row_action_drp_svg_eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                        </router-link>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <pagination :data="getCustomers" @pagination-change-page="getCustomersList"></pagination>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import Vue from 'vue'
import { mapState } from 'vuex'
import { deleteEmptyKeys } from "../../mixins";
import { GET_CUSTOMERS_ACTION, EXCEL_DOWNLOAD_CUSTOMERS_ACTION  } from '@admin/store/customers/actions'
export default {
    components: { },
    data() {
        return {
            baseUrl:Vue.config.baseUrl,
            baseUrlImage: Vue.config.baseUrlImage,
            filters: {
                page: 1,
                search: ''
            }
        }
    },
    computed:{
        ...mapState({
            getCustomers: state => state.getCustomer.getCustomers,
            excelLink: state => state.getCustomer.excelLink
        })
    },
    mounted() {
        this.getCustomersList();
    },
    methods: {
        getCustomersList: function(page = 1) {
            let query = [];
            this.filters['page'] = page;
            query['params'] = deleteEmptyKeys(this.filters);
            this.$store.dispatch('getCustomer/' + GET_CUSTOMERS_ACTION, query);
        },
        excelDownload: function() {
            let query = [];
            let params = {
                page: this.filters['page'],
                response_type: 'xlsx'
            };
            query['params'] = deleteEmptyKeys(params);
            this.$store.dispatch('getCustomer/' + EXCEL_DOWNLOAD_CUSTOMERS_ACTION, query).then(() => {
                const link = document.createElement("a");
                link.href = this.excelLink;
                link.setAttribute("download", "customers.xlsx");
                document.body.appendChild(link);
                link.click();
            });
        }
    }
}
</script>