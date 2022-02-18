<template>
    <div id="content" class="flex">
        <div class="page-container">
            <div class="pt-3 pr-3 pb-5 pl-3">
                <div class="mb-5">
                    <h2 class="dv_page_heading">Stock Transfer </h2>
                    <div class="row dv_search_delete_action_common">
                        <div class="col-md-5 col-sm-5 col-xs-5 col-5">
                            <input type="text" @input="getStockTransferRecords" v-model="filters.search" class="form-control dv_common_search_for_all" name="" placeholder="Search">
                        </div>
                        <div class="col-md-7 col-sm-7 col-xs-7 col-7">
                            <router-link :to="{ name: 'addStockTransfer' }" tag="button" class="btn btn-default dv_filter_common" data-toggle="tooltip" data-placement="top" title="Add Stock Transfer">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <line x1="12" y1="5" x2="12" y2="19"></line>
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                </svg>
                            </router-link>
                            <button @click="excelDownload" type="text" class="btn btn-default dv_export_common" data-toggle="tooltip" data-placement="top" title="Download CSV">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="7 10 12 15 17 10"></polyline><line x1="12" y1="15" x2="12" y2="3"></line></svg>
                            </button>
                            <!-- <button type="text" class="btn btn-default dv_selected_filter_common" data-toggle="tooltip" data-placement="top" title="Filter">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"></polygon></svg>
                            </button> -->
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
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize d-block w-100" for="name">Status</label>
                                                <select v-model="filters.status" class="form-control dv_common_select_for_all  w-100" id="select2-single">
                                                    <option value="">Select</option>
                                                    <option :value="index" v-for="(status,index) in statuses" :key="index">{{status['label']}}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <button @click="getStockTransferRecords" type="button" class="btn btn-default dv_save_submit_btn" style="margin-top: 26px;">Filter</button>
                                        </div>
                                    </div>
                                </div>
                            </div>                                    
                        </div>
                    </div>
                    <pagination class="mt-2" :data="stockTransferData" @pagination-change-page="getStockTransferRecords"></pagination>
                    <div class="table-responsive">
                        <table class="table table-theme table-row v-middle">
                            <thead>
                                <tr>
                                    <th class="text-muted">transfer id</th>
                                    <th class="text-muted">from </th>
                                    <th class="text-muted">to</th>
                                    <th class="text-muted">date</th>
                                    <th class="text-muted">qty</th>
                                    <th class="text-muted">total amt</th>
                                    <th class="text-muted">status</th>
                                    <th class="text-muted">contact person </th>
                                    <th class="text-muted">action </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(data,index) in stockTransferData.data" :key="index" class="v-middle">
                                    <td>{{ data.id }}</td>
                                    <td><span class="text-muted">{{ data.from_location }}</span></td>
                                    <td><span class="text-muted">{{ data.to.location_name }}</span></td>
                                    <td><span class="text-muted">{{ data.date }}</span></td>
                                    <td><span class="text-muted">{{ data.total_quantity }}</span></td>
                                    <td><strong>AED {{ data.total_amount }}</strong></td>
                                    <td>
                                        <span :class="statuses[data.status]['class']">{{ data.status }}</span>
                                    </td>
                                    <td>{{ data.contact_person }}</td>
                                    <td>
                                        <router-link :to="{ name : 'editStockTransfer', params: { stock_transfer_id: data.id } }">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="dv_row_action_drp_svg_eye">
                                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                                <circle cx="12" cy="12" r="3"></circle>
                                            </svg>
                                        </router-link>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <pagination :data="stockTransferData" @pagination-change-page="getStockTransferRecords"></pagination>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import Vue from 'vue'
import { mapState } from 'vuex'
import { deleteEmptyKeys } from "../../mixins";
import { GET_STOCK_TRANSFER_RECORDS_ACTION, EXCEL_DOWNLOAD_STOCK_TRANFER_RECORDS_ACTION } from '@admin/store/products/actions'
export default {
    components: { },
    data() {
        return {
            baseUrl:Vue.config.baseUrl,
            baseUrlImage: Vue.config.baseUrlImage,
            filters: {
                perPage: 50,
                page: 1,
                search: '',
                status: '',
                sort_by: 'id',
                order_by: 'desc'
            },
            statuses: {
                SHIPPED: {
                    label: 'SHIPPED',
                    class: 'badge badge-info'
                },
                RECEIVED: {
                    label: 'RECEIVED',
                    class: 'badge badge-success'
                },
                CANCELLED: {
                    label: 'CANCELLED',
                    class: 'badge badge-danger'
                }
            }
        }
    },
    computed:{
        ...mapState({
            stockTransferData: state => state.getProduct.getStockTransferRecords,
            excelLink: state => state.getProduct.excelLink
        })
    },
    mounted() {
        this.getStockTransferRecords();
    },
    methods: {
        getStockTransferRecords: function (page=1){
            let query = [];
            this.filters['page'] = page;
            query['params'] = deleteEmptyKeys(this.filters);
            if (this.$admin['role_id'] == 2) {
                query['params']['created_by'] = this.$admin['id'];
            }
            this.$store.dispatch('getProduct/' + GET_STOCK_TRANSFER_RECORDS_ACTION, query);
        },
        excelDownload: function() {
            let query = [];
            let params = {
                search: this.filters['search'],
                status: this.filters['status'],
                response_type: 'xlsx'
            };
            query['params'] = deleteEmptyKeys(params);
            if (this.$admin['role_id'] == 2) {
                query['params']['created_by'] = this.$admin['id'];
            }
            this.$store.dispatch('getProduct/' + EXCEL_DOWNLOAD_STOCK_TRANFER_RECORDS_ACTION, query).then(() => {
                const link = document.createElement("a");
                link.href = this.excelLink;
                link.setAttribute("download", "StockTransfer.xlsx");
                document.body.appendChild(link);
                link.click();
            });
        },
    }
}
</script>