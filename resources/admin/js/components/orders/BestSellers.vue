<template>
    <div id="content" class="flex">
        <div class="page-container">
            <div class="pt-3 pr-3 pb-5 pl-3">
                <div class="mb-5">
                    <h2 class="dv_page_heading">Best Sellers </h2>
                    <div class="row dv_search_delete_action_common">
                        <div class="col-md-5 col-sm-5 col-xs-5 col-5">
                            <input type="text" v-model="filters.search" @input="getBestSellerProducts" class="form-control dv_common_search_for_all" name="" placeholder="Search">
                        </div>
                        <div class="col-md-7 col-sm-7 col-xs-7 col-7">
                            <button @click="excelDownload" type="text" class="btn btn-default dv_export_common" data-toggle="tooltip" data-placement="top" title="Download all Product CSV">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="7 10 12 15 17 10"></polyline><line x1="12" y1="15" x2="12" y2="3"></line></svg>
                            </button>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-theme table-row v-middle">
                            <thead>
                                <tr>
                                    <th style="width: 8%;" class="text-muted">product id</th>
                                    <th style="width: 10%;" class="text-muted">image</th>
                                    <th style="width: 37%;" class="text-muted">product name </th>
                                    <th style="width: 15%;" class="text-muted">Total quantity   </th>
                                    <th style="width: 15%;" class="text-muted">Amount(excl tax) </th>
                                    <th style="width: 10%;" class="text-muted">View</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(product,index) in getProducts.data" :key="index" class="v-middle">
                                    <td>{{ product['id'] }}</td>
                                    <td>
                                        <img v-if="product['get_product_images'].length>0" :src="baseUrlImage+'images/products/'+product['get_product_images'][0].image" :alt="product['get_product_images'][0].atr" title="" class="dv_product_list_img">
                                        <img v-else :src="baseUrlImage+'images/default_admin.jpg'" alt="" width="50" height="50">
                                    </td>
                                    <td>
                                        <span class="item-except text-muted text-sm h-1x">
                                            {{ product['name'] }}
                                        </span>
                                    </td>
                                    <td>
                                        <strong>{{ product['order_items_count'] }}</strong>
                                    </td>
                                    <td>
                                        <strong>AED {{ product['discount_price'] }}</strong>
                                    </td>
                                    <td>
                                        <router-link :to="{ name: 'productDetail', params: { product_id: product['id'] }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="dv_row_action_drp_svg_eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                        </router-link>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <pagination :data="getProducts" @pagination-change-page="getBestSellerProducts"></pagination>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import Vue from 'vue'
import { mapState } from 'vuex'
import { deleteEmptyKeys } from "../../mixins";
import { GET_BEST_SELLER_PRODUCTS_ACTION, EXCEL_DOWNLOAD_BEST_SELLER_PRODUCTS_ACTION } from '@admin/store/orders/actions'
export default {
    data(){
        return {
            baseUrl:Vue.config.baseUrl,
            baseUrlImage: Vue.config.baseUrlImage,
            filters: {
                search: '',
                page: 1
            }
        }
    },
    computed:{
        ...mapState({
            getProducts: state => state.getOrder.getBestSellerProducts,
            excelLink: state => state.getOrder.excelLink
        })
    },
    mounted() {
        this.getBestSellerProducts();
    },
    methods: {
        getBestSellerProducts: function (page=1){
            let query = [];
            this.filters['page'] = page;
            query['params'] = deleteEmptyKeys(this.filters);
            if (this.$admin['role_id'] == 2) {
                query['params']['created_by'] = this.$admin['id'];
            }
            this.$store.dispatch('getOrder/' + GET_BEST_SELLER_PRODUCTS_ACTION, query);
        },
        excelDownload: function() {
            let query = [];
            let params = {
                search: this.filters.search,
                response_type: 'xlsx'
            };
            query['params'] = deleteEmptyKeys(params);
            if (this.$admin['role_id'] == 2) {
                query['params']['created_by'] = this.$admin['id'];
            }
            this.$store.dispatch('getOrder/' + EXCEL_DOWNLOAD_BEST_SELLER_PRODUCTS_ACTION, query).then(() => {
                const link = document.createElement("a");
                link.href = this.excelLink;
                link.setAttribute("download", "BestSellers.xlsx"); //or any other extension
                document.body.appendChild(link);
                link.click();
            });
        }
    }
}
</script>