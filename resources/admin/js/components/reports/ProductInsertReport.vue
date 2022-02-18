<template>
    <div id="content" class="flex">
        <div class="page-container">
            <div class="pt-3 pr-3 pb-5 pl-3">
                <div class="mb-5">
                    <h2 class="dv_page_heading">Product Insert Report </h2>
                    <div class="row dv_search_delete_action_common">
                        <div class="col-md-5 col-sm-5 col-xs-5 col-5">
                            <input v-model="filters.search" @input="getProductsData" type="text" class="form-control dv_common_search_for_all" name="" placeholder="Search">
                        </div>
                        <div class="col-md-7 col-sm-7 col-xs-7 col-7">
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
                                            <button type="button" class="btn btn-default dv_save_submit_btn" style="margin-top: 26px;" @click="getProductsData">Filter</button>
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
                                    <th style="width: 10%;" class="text-muted">product id</th>
                                    <th style="width: 20%;" class="text-muted">product </th>
                                    <th style="width: 20%;" class="text-muted">code </th>
                                    <th style="width: 15%;" class="text-muted">brand </th>
                                    <th style="width: 15%;" class="text-muted">category </th>
                                    <th style="width: 10%;" class="text-muted">added date</th>
                                    <th style="width: 10%;" class="text-muted">Edited Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(product,index) in getProducts.data" :key="index" class="v-middle">
                                    <td>{{ product['id'] }}</td>
                                    <td>
                                        <span class="item-except text-muted text-sm h-1x">
                                            {{ product['name'] }}
                                        </span>
                                    </td>
                                    <td>
                                        <span class="text-muted text-sm h-1x">
                                            {{ product['product_code'] }}
                                        </span>
                                    </td>
                                    <td>{{ product['get_brand'] ? product['get_brand']['name'] : '' }}</td>
                                    <td>{{ product['get_category'] ? product['get_category']['name']: '' }}</td>
                                    <td>{{ product['created_at'].split('T')[0] }} </td>
                                    <td>{{ product['updated_at'] ? product['updated_at'].split('T')[0] : '-' }} </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <pagination :data="getProducts" @pagination-change-page="getProductsData"></pagination>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import Vue from 'vue'
import { mapState } from 'vuex'
import { deleteEmptyKeys } from "../../mixins";
import { GET_PRODUCT_INSERT_REPORT_ACTION, EXCEL_DOWNLOAD_PRODUCT_INSERT_REPORT_ACTION  } from '@admin/store/reports/actions'
export default {
    components: { },
    data() {
        return {
            baseUrl:Vue.config.baseUrl,
            baseUrlImage: Vue.config.baseUrlImage,
            filters: {
                page: 1,
                search: '',
                period: '',
                date: '',
                perPage: 10
            },
            excel_fields: [ 'ID', 'Product Name', 'Product Code', 'Brand', 'Category', 'Added Date', 'Edited Date' ],
            excel_db_columns: [
                { column: 'id' },
                { column: 'name' },
                { column: 'product_code' },
                { table:'get_brand', column: 'name' },
                { table:'get_category', column: 'name' },
                { column: 'created_at' },
                { column: 'updated_at' }
            ]
        }
    },
    computed:{
        ...mapState({
            getProducts: state => state.getReport.getProductInsertReport,
            excelLink: state => state.getReport.excelLink,
        })
    },
    mounted() {
        this.getProductsData();
    },
    methods: {
        getProductsData: function(page = 1) {
            let query = [];
            this.filters['page'] = page;
            query['params'] = deleteEmptyKeys(this.filters);
            if (this.$admin['role_id'] == 2) {
                query['params']['created_by'] = this.$admin['id'];
            }
            this.$store.dispatch('getReport/' + GET_PRODUCT_INSERT_REPORT_ACTION, query);
        },
        excelDownload: function() {
            let params = {
                search: this.filters['search'],
                period: this.filters['period'],
                date: this.filters['date'],
                response_type: 'xlsx',
                perPage: 'all',
                excel_fields: this.excel_fields,
                excel_db_columns: this.excel_db_columns
            };
            params = deleteEmptyKeys(params);
            if (this.$admin['role_id'] == 2) {
                params['created_by'] = this.$admin['id'];
            }
            this.$store.dispatch('getReport/' + EXCEL_DOWNLOAD_PRODUCT_INSERT_REPORT_ACTION, params).then(() => {
                const link = document.createElement("a");
                link.href = this.excelLink;
                link.setAttribute("download", "ProductInsertReport.xlsx");
                document.body.appendChild(link);
                link.click();
            });
        }
    }
}
</script>