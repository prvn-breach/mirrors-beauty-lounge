<template>
    <div id="content" class="flex">
        <div class="page-container">
            <div class="pt-3 pr-3 pb-5 pl-3">
                <div class="mb-5">
                    <h2 class="dv_page_heading">SEM Sale Report </h2>
                    <div class="row dv_search_delete_action_common">
                        <div class="col-md-5 col-sm-5 col-xs-5 col-5">
                            <input @input="getSemSales" v-model="filters.search" type="text" class="form-control dv_common_search_for_all" name="" placeholder="Search">
                        </div>
                        <div class="col-md-7 col-sm-7 col-xs-7 col-7">
                            <router-link :to="{ name: 'addSemExpense' }" tag="button" class="btn btn-default dv_filter_common" data-toggle="tooltip" data-placement="top" title="Add New Expense">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <line x1="12" y1="5" x2="12" y2="19"></line>
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                </svg>
                            </router-link>
                            <button @click="excelDownload" type="text" class="btn btn-default dv_export_common" data-toggle="tooltip" data-placement="top" title="Download CSV">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="7 10 12 15 17 10"></polyline><line x1="12" y1="15" x2="12" y2="3"></line></svg>
                            </button>
                            <button type="text" class="btn btn-default dv_selected_filter_common" data-toggle="tooltip" data-placement="top" title="Filter">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"></polygon></svg>
                            </button>
                        </div>
                    </div>
                    <div class="row mt-4 dv_filter_content_show" style="display: none;">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <strong>Filter </strong>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize d-block w-100" for="name">period</label>
                                                <select v-model="filters.period" class="form-control dv_common_select_for_all">
                                                    <option value="">Select </option>
                                                    <option value="current_year">This year </option>
                                                    <option value="current_month">This month </option>
                                                    <option value="current_week">This week</option>
                                                    <option value="current_day">This day</option>
                                                    <option value="0">Custom</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3" v-if="filters.period == '0'">
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize" for="name">From to - to Date</label>
                                                <input v-model="filters.date" type="text" class="form-control dv_common_input_for_all" name="" placeholder="Select">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize d-block w-100" for="name">Type</label>
                                                <select v-model="filters.type" class="form-control dv_common_select_for_all">
                                                    <option value="">Select </option>
                                                    <option value="category">Category </option>
                                                    <option value="brand">Brand </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3" v-if="filters.type == 'category'">
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize d-block w-100" for="name">Categories </label>
                                                <select v-model="filters.type_id" class="form-control dv_common_select_for_all">
                                                    <option value="">Select </option>
                                                    <option :value="category['id']" v-for="(category,index) in getCategories" :key="index">{{ category['name'] }}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3" v-if="filters.type == 'brand'">
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize d-block w-100" for="name">Brands</label>
                                                <select v-model="filters.type_id" class="form-control dv_common_select_for_all">
                                                    <option value="">Select </option>
                                                    <option :value="brand['id']" v-for="(brand,index) in getBrands" :key="index">{{ brand['name'] }}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <button type="button" class="btn btn-default dv_save_submit_btn" style="margin-top: 26px;" @click="getSemSales">Filter</button>
                                        </div>
                                    </div>
                                </div>
                            </div>                                    
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-theme table-row v-middle">
                            <thead>
                                <tr>
                                    <th style="width: 12%;" class="text-muted">from date</th>
                                    <th style="width: 12%;" class="text-muted">to date</th>
                                    <th style="width: 12%;" class="text-muted">type</th>
                                    <th style="width: 12%;" class="text-muted">Category / Brand</th>
                                    <th style="width: 12%;" class="text-muted">spend Amt </th>
                                    <th style="width: 20%;" class="text-muted">Sale Amt </th>
                                    <th style="width: 12%;" class="text-muted">Profit / Loss </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(data,index) in getSemSalesReport.data" :key="index" class="v-middle">
                                    <td>{{ data['from_date'] }} </td>
                                    <td>{{ data['to_date'] }} </td>
                                    <td>{{ data['type'] }} </td>
                                    <td>{{ data['type_name'] }} </td>
                                    <td><strong>{{ data['amount'] }} AED</strong></td>
                                    <td>{{ data['sale_amount'] }} AED </td>
                                    <td>{{ data['profit_loss'] }} </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <pagination :data="getSemSalesReport" @pagination-change-page="getSemSales"></pagination>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import Vue from 'vue'
import { mapState } from 'vuex';
import { deleteEmptyKeys } from "../../mixins";
import { LOAD_BRAND_LIST_ACTION } from '@admin/store/brands/actions';
import { GET_CATEGORIES_ACTION } from '@admin/store/categories/actions';
import { GET_SEM_SALE_REPORT_ACTION, EXCEL_DOWNLOAD_SEM_SALE_REPORT_ACTION } from '@admin/store/reports/actions';
export default {
    components: { },
    data() {
        return {
            baseUrl:Vue.config.baseUrl,
            baseUrlImage: Vue.config.baseUrlImage,
            filters: {
                page: 1,
                search: '',
                date: '',
                period: '',
                type: '',
                type_id: ''
            },
            excel_fields: [ 'ID', 'From Date', 'To Date', 'Type', 'Category / Brand', 'Spend Amount', 'Sale Amount', 'Profit / Loss' ],
            excel_db_columns: [
               { column: 'id' },
               { column: 'from_date' },
               { column: 'to_date' },
               { column: 'type' },
               { column: 'type_name' },
               { column: 'amount' },
               { column: 'sale_amount' },
               { column: 'profit_loss' }
            ]
        }
    },
    computed:{
        ...mapState({
            getBrands: state => state.getBrand.getBrands,
            getCategories: state => state.getCategory.getCategories,
            excelLink: state => state.getReport.excelLink,
            getSemSalesReport: state => state.getReport.getSemSalesReport
        })
    },
    mounted() {
        this.getBrandsList();
        this.getCategoriesList();
        this.getSemSales();
    },
    methods: {
        getBrandsList: function(){
            let query = [];
            query['params'] = {
                perPage: 'all'
            };
            this.$store.dispatch('getBrand/' + LOAD_BRAND_LIST_ACTION, query);
        },
        getCategoriesList: function() {
            this.$store.dispatch('getCategory/' + GET_CATEGORIES_ACTION, {});
        },
        getSemSales: function(page=1) {
            this.filters['page'] = page;
            let params = deleteEmptyKeys(this.filters);
            if (this.$admin['role_id'] == 2) {
                params['created_by'] = this.$admin['id'];
            }
            this.$store.dispatch('getReport/' + GET_SEM_SALE_REPORT_ACTION, params);
        },
        excelDownload: function() {
            let params = {
                search: this.filters['search'],
                date: this.filters['date'],
                period: this.filters['period'],
                type: this.filters['type'],
                type_id: this.filters['type_id'],
                response_type: 'xlsx',
                excel_fields: this.excel_fields,
                excel_db_columns: this.excel_db_columns
            };
            params = deleteEmptyKeys(params);
            if (this.$admin['role_id'] == 2) {
                params['created_by'] = this.$admin['id'];
            }
            this.$store.dispatch('getReport/' + EXCEL_DOWNLOAD_SEM_SALE_REPORT_ACTION, params).then(() => {
                const link = document.createElement("a");
                link.href = this.excelLink;
                link.setAttribute("download", "SemSaleReport.xlsx"); //or any other extension
                document.body.appendChild(link);
                link.click();
            });
        }
    }
}
</script>