<template>
    <div id="content" class="flex">
        <div class="page-container">
            <div class="pt-3 pr-3 pb-5 pl-3">
                <div class="mb-5">
                    <h2 class="dv_page_heading">Current wishlist</h2>
                    <div class="row dv_search_delete_action_common">
                        <div class="col-md-5 col-sm-5 col-xs-5 col-5">
                            <input type="text" v-model="filters.search" @input="getCurrentWishlists" class="form-control dv_common_search_for_all" name="" placeholder="Search">
                        </div>
                        <div class="col-md-7 col-sm-7 col-xs-7 col-7">
                            <button @click="excelDownload" type="text" class="btn btn-default dv_export_common mr-0" data-toggle="tooltip" data-placement="top" title="Download CSV">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="7 10 12 15 17 10"></polyline><line x1="12" y1="15" x2="12" y2="3"></line></svg>
                            </button>
                        </div>
                    </div>
                    <pagination class="mt-2" :data="getWishlists" @pagination-change-page="getCurrentWishlists"></pagination>
                    <div class="table-responsive">
                        <table class="table table-theme table-row v-middle">
                            <thead>
                                <tr>
                                    <th class="text-muted">Customer id </th>
                                    <th class="text-muted">Customer name </th>
                                    <th class="text-muted">email id </th>
                                    <th class="text-muted">total items </th>
                                    <th class="text-muted">action </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(wishlist, index) in getWishlists.data" :key="index" class="v-middle">
                                    <td>{{ wishlist['user']['id'] }} </td>
                                    <td>{{ wishlist['user']['name'] }} </td>
                                    <td><span class="item-except text-muted text-sm h-1x">
                                            {{ wishlist['user']['email'] }}
                                        </span></td>
                                    <td>{{ wishlist['count'] }}</td>
                                    <td>
                                        <router-link :to="{ name : 'getCustomerDetail', params: { customer_id: wishlist['user']['id'], tab: 'wishlist' } }">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="dv_row_action_drp_svg_eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                        </router-link>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <pagination :data="getWishlists" @pagination-change-page="getCurrentWishlists"></pagination>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import Vue from 'vue'
import { mapState } from 'vuex'
import { deleteEmptyKeys } from "../../mixins";
import { GET_CURRENT_WISHLISTS_ACTION, EXCEL_DOWNLOAD_WISHLISTS_ACTION } from '@admin/store/orders/actions'
export default {
    data(){
        return {
            baseUrl:Vue.config.baseUrl,
            baseUrlImage: Vue.config.baseUrlImage,
            filters: {
                search: '',
                page: 1,
                perPage: 50
            }
        }
    },
    computed:{
        ...mapState({
            getWishlists: state => state.getOrder.getWishlists,
            excelLink: state => state.getOrder.excelLink
        })
    },
    mounted() {
        this.getCurrentWishlists();
    },
    methods: {
        getCurrentWishlists: function (page=1){
            let query = [];
            this.filters['page'] = page;
            query['params'] = deleteEmptyKeys(this.filters);
            if (this.$admin['role_id'] == 2) {
                query['params']['created_by'] = this.$admin['id'];
            }
            this.$store.dispatch('getOrder/' + GET_CURRENT_WISHLISTS_ACTION, query);
        },
        excelDownload: function() {
            let query = [];
            let params = {
                response_type: 'xlsx'
            };
            query['params'] = deleteEmptyKeys(params);
            if (this.$admin['role_id'] == 2) {
                params['created_by'] = this.$admin['id'];
            }
            this.$store.dispatch('getOrder/' + EXCEL_DOWNLOAD_WISHLISTS_ACTION, query).then(() => {
                const link = document.createElement("a");
                link.href = this.excelLink;
                link.setAttribute("download", "CurrentWishlists.xlsx"); //or any other extension
                document.body.appendChild(link);
                link.click();
            });
        }
    }
}
</script>