<template>
    <div id="content" class="flex">
        <div class="page-container">
            <div class="pt-3 pr-3 pb-5 pl-3">
                <div class="mb-5">
                    <h2 class="dv_page_heading">Vendor Management </h2>
                    <div class="row dv_search_delete_action_common">
                        <div class="col-md-5 col-sm-5 col-xs-5 col-5">
                            <input v-model="filters.search" @input="getVendorsList" type="text" class="form-control dv_common_search_for_all" name="" placeholder="Search">
                        </div>
                        <div class="col-md-7 col-sm-7 col-xs-7 col-7">
                            <router-link :to="{ name: 'addVendor' }" tag="button" class="btn btn-default dv_filter_common" data-toggle="tooltip" data-placement="top" title="Add Vendor">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <line x1="12" y1="5" x2="12" y2="19"></line>
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                </svg>
                            </router-link>
                            <button @click="excelDownload" type="text" class="btn btn-default dv_export_common" data-toggle="tooltip" data-placement="top" title="Download all Product CSV">
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
                                                <label class="text-muted text-capitalize d-block w-100" for="name">Company </label>
                                                <input v-model="filters.company" type="text" class="form-control dv_common_input_for_all" name="" placeholder="Enter">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize d-block w-100" for="name">Email </label>
                                                <input v-model="filters.email" type="email" class="form-control dv_common_input_for_all" name="" placeholder="Enter">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize d-block w-100" for="name">Phone No </label>
                                                <input v-model="filters.mobile" type="number" class="form-control dv_common_input_for_all" name="" placeholder="Enter">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <button @click="getVendorsList" type="button" class="btn btn-default dv_save_submit_btn" style="margin-top: 26px;">Filter</button>
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
                                    <th style="width: 5%;" class="text-muted">ID</th>
                                    <th style="width: 18%;" class="text-muted">Company </th>
                                    <th style="width: 20;" class="text-muted">email </th>
                                    <th style="width: 20;" class="text-muted">phone no </th>
                                    <th style="width: 15%;" class="text-muted">brands </th>
                                    <th style="width: 15%;" class="text-muted">status </th>
                                    <th style="width: 10%;" class="text-muted">view </th>
                                    <th style="width: 10%;" class="text-muted">delete </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(vendor,index) in getVendors.data" :key="index" class="v-middle">
                                    <td>
                                        {{ vendor.id }}
                                    </td>
                                    <td>
                                        <span class="item-except text-muted text-sm h-1x">
                                            {{ vendor.company }}
                                        </span>
                                    </td>
                                    <td>
                                        <span class="item-except text-muted text-sm h-1x">
                                            {{ vendor.email }}
                                        </span>
                                    </td>
                                    <td>
                                        <span class="item-except text-muted text-sm h-1x">
                                            {{ vendor.phone_no }}
                                        </span>
                                    </td>
                                    <td>
                                        <span class="dv_counting_brands">
                                            {{ JSON.parse(vendor.brand_ids).length }}
                                        </span>
                                    </td>
                                    <td>
                                        <label class="ui-switch ui-switch-md info m-t-xs"><input checked="" v-model="vendor.active_status" @input="updateStatus($event, vendor.id)" type="checkbox"> <i></i></label>
                                    </td>
                                    <td>
                                        <router-link :to="{ name: 'vendorDetail', params: { vendor_id: vendor.id } }">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="dv_row_action_drp_svg_eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                        </router-link>
                                    </td>
                                    <td>
                                        <button @click="deleteVendor(vendor.id, vendor.company)" type="text" class="btn btn-default dv_selected_delete_common" data-toggle="tooltip" data-placement="top" title="Delete Selected Entries">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
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
import { GET_VENDORS_ACTION, EXCEL_DOWNLOAD_VENDORS_ACTION, DELETE_VENDOR_ACTION, UPDATE_VENDOR_ACTION  } from '@admin/store/vendors/actions'
export default {
    components: { },
    data() {
        return {
            baseUrl:Vue.config.baseUrl,
            baseUrlImage: Vue.config.baseUrlImage,
            filters: {
                page: 1,
                search: '',
                company: '',
                email: '',
                mobile: ''
            }
        }
    },
    computed:{
        ...mapState({
            getVendors: state => state.getVendor.getVendors,
            excelLink: state => state.getVendor.excelLink
        })
    },
    mounted() {
        this.getVendorsList();
    },
    methods: {
        getVendorsList: function(page=1) {
            let query = [];
            this.filters['page'] = page;
            query['params'] = deleteEmptyKeys(this.filters);
            this.$store.dispatch('getVendor/' + GET_VENDORS_ACTION, query);
        },
        excelDownload: function() {
            let query = [];
            let params = {
                perPage: 'all',
                search: this.filters['search'],
                company: this.filters['company'],
                email: this.filters['email'],
                mobile: this.filters['mobile'],
                response_type: 'xlsx'
            };
            query['params'] = deleteEmptyKeys(params);
            this.$store.dispatch('getVendor/' + EXCEL_DOWNLOAD_VENDORS_ACTION, query).then(() => {
                const link = document.createElement("a");
                link.href = this.excelLink;
                link.setAttribute("download", "vendors.xlsx");
                document.body.appendChild(link);
                link.click();
            });
        },
        updateStatus: function(event, vendor_id) {
            this.$store.dispatch('getVendor/' + UPDATE_VENDOR_ACTION, { 
                vendor_id, active_status: event.target.checked
            });
        },
        deleteVendor: function(vendor_id, company) {
            if (confirm('Please confirm to delete this '+company+' company ?')) {
                this.$store.dispatch('getVendor/' + DELETE_VENDOR_ACTION, { vendor_id }).then(() => {
                    this.getVendorsList();
                });
            }
        }
    }
}
</script>