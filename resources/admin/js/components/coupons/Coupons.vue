<template>
    <div id="content" class="flex">
        <div class="page-container">
            <div class="pt-3 pr-3 pb-5 pl-3">
                <div class="mb-5">
                    <h2 class="dv_page_heading">Coupons </h2>
                    <div class="row dv_search_delete_action_common">
                        <div class="col-md-5 col-sm-5 col-xs-5 col-5">
                            <input @input="getCouponsList" v-model="filters.search" type="text" class="form-control dv_common_search_for_all" name="" placeholder="Search">
                        </div>
                        <div class="col-md-7 col-sm-7 col-xs-7 col-7">
                            <router-link :to="{ name: 'addCoupon' }" tag="button" class="btn btn-default dv_filter_common" data-toggle="tooltip" data-placement="top" title="Add Order">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <line x1="12" y1="5" x2="12" y2="19"></line>
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                </svg>
                            </router-link>
                            <button type="button" @click="excelDownload" class="btn btn-default dv_export_common" data-toggle="tooltip" data-placement="top" title="Download CSV">
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
                                                <label class="text-muted text-capitalize d-block w-100" for="name">Discount type </label>
                                                <select v-model="filters.discount_type" class="form-control dv_common_select_for_all">
                                                    <option value="">select</option>
                                                    <option value="PERCENTAGE_BASED">Percentage Based</option>
                                                    <option value="FIXED_PRICE_BASED">Fixed Price Based</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <button type="button" class="btn btn-default dv_save_submit_btn" style="margin-top: 26px;" @click="getCouponsList">Filter</button>
                                        </div>
                                    </div>
                                </div>
                            </div>                                    
                        </div>
                    </div>
                    <pagination class="mt-2" :data="getCoupons" @pagination-change-page="getCouponsList"></pagination>
                    <div class="table-responsive">
                        <table class="table table-theme table-row v-middle">
                            <thead>
                                <tr>
                                    <th class="text-muted">ID </th>
                                    <th class="text-muted">Coupon title </th>
                                    <th class="text-muted">Coupon code </th>
                                    <th class="text-muted">Discount type </th>
                                    <th class="text-muted">Discount </th>
                                    <th class="text-muted">Start date </th>
                                    <th class="text-muted">End Date </th>
                                    <th class="text-muted">Accessibility </th>
                                    <th class="text-muted">View </th>
                                    <th class="text-muted">Delete </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(coupon,index) in getCoupons.data" :key="index" class="v-middle">
                                    <td>
                                        {{ coupon.id }}
                                    </td>
                                    <td>{{ coupon.title }} </td>
                                    <td>{{ coupon.code }} </td>
                                    <td>
                                        {{ coupon.discount_type.replaceAll('_', " ") }}
                                    </td>
                                    <td>{{ coupon.discount+''+discount_types[coupon.discount_type] }}</td>
                                    <td>{{ coupon.start_date }}</td>
                                    <td>{{ coupon.end_date }}</td>
                                    <td>{{ coupon.accessibility }}</td>
                                    <td>
                                        <router-link :to="{ name : 'viewCoupon', params: { coupon_id: coupon.id } }">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="dv_row_action_drp_svg_eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                        </router-link>
                                    </td>
                                     <td>
                                        <button @click="deleteCoupon(coupon.id, coupon.code)" type="text" class="btn btn-default dv_selected_delete_common" data-toggle="tooltip" data-placement="top" title="Delete Selected Entries">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <pagination :data="getCoupons" @pagination-change-page="getCouponsList"></pagination>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import Vue from 'vue'
import { mapState } from 'vuex'
import { deleteEmptyKeys } from "../../mixins";
import { GET_COUPONS_ACTION, DELETE_COUPON_ACTION, EXCEL_DOWNLOAD_COUPONS_ACTION  } from '@admin/store/coupons/actions'
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
                discount_type: ''
            },
            discount_types: {
                PERCENTAGE_BASED: '%',
                FIXED_PRICE_BASED: 'AED',
            }
        }
    },
    computed:{
        ...mapState({
            getCoupons: state => state.getCoupon.getCoupons,
            excelLink: state => state.getCoupon.excelLink
        })
    },
    mounted() {
        this.getCouponsList();
    },
    methods: {
        getCouponsList: function(page=1) {
            let query = [];
            this.filters['page'] = page;
            query['params'] = deleteEmptyKeys(this.filters);
            if (this.$admin['role_id'] == 2) {
                query['params']['created_by'] = this.$admin['id'];
            }
            this.$store.dispatch('getCoupon/' + GET_COUPONS_ACTION, query);
        },
        excelDownload: function() {
            let query = [];
            let params = {
                search: this.filters['search'],
                discount_type: this.filters['discount_type'],
                response_type: 'xlsx'
            };
            query['params'] = deleteEmptyKeys(params);
            if (this.$admin['role_id'] == 2) {
                query['params']['created_by'] = this.$admin['id'];
            }
            this.$store.dispatch('getCoupon/' + EXCEL_DOWNLOAD_COUPONS_ACTION, query).then(() => {
                const link = document.createElement("a");
                link.href = this.excelLink;
                link.setAttribute("download", "coupons.xlsx");
                document.body.appendChild(link);
                link.click();
            });
        },
        deleteCoupon: function(coupon_id, code) {
            if (confirm('Please confirm to delete '+code+' coupon')) {
                this.$store.dispatch('getCoupon/' + DELETE_COUPON_ACTION, { coupon_id: coupon_id }).then(() => {
                    this.getCouponsList();
                });
            }
        }
    }
}
</script>