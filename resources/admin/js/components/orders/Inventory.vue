<template>
    <div id="content" class="flex">
        <div class="page-container">
            <div class="pt-3 pr-3 pb-5 pl-3">
                <div class="mb-5">
                    <h2 class="dv_page_heading">Inventory </h2>
                    <div class="row dv_search_delete_action_common">
                        <div class="col-md-5 col-sm-5 col-xs-5 col-5">
                            <input type="text" class="form-control dv_common_search_for_all" name="" placeholder="Search" @keyup="searchProduct">
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-theme table-row v-middle">
                            <thead>
                                <tr>
                                    <th style="width: 5%;" class="text-muted sortable">ID</th>
                                    <th style="width: 10%;" class="text-muted sortable">image </th>
                                    <th style="width: 10%;" class="text-muted">code</th>
                                    <th style="width: 30%;" class="text-muted">product name</th>
                                    <th style="width: 10%;" class="text-muted">brand</th> 
                                    <th style="width: 10%;" class="text-muted">category</th>
                                    <th style="width: 10%;" class="text-muted">seller</th>
                                    <th style="width: 10%;" class="text-muted">price</th>
                                    <th style="width: 10%;" class="text-muted">Stock Status</th>
                                    <th style="width: 10%;" class="text-muted">Stock Avalibility</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(getProduct,index) in getProducts.data" :key="index" class="v-middle">
                                    <td>{{ getProduct.id }} </td> 
                                    <td>
                                        <img v-if="getProduct.get_product_images.length > 0" :src="baseUrlImage+'images/products/'+getProduct.get_product_images[0].image" :alt="getProduct.get_product_images[0].atr" title="" class="dv_product_list_img">
                                        <img v-else :src="baseUrlImage+'images/default_admin.jpg'" alt="" width="50" height="50">
                                    </td>
                                    <td>
                                        <span class="item-except text-muted text-sm h-1x">
                                        {{getProduct.product_code}}
                                        </span>
                                    </td>
                                    <td>
                                        <span class="item-except text-muted text-sm h-1x">
                                            {{ getProduct.name }}
                                        </span>
                                    </td>
                                    <td>{{ getProduct.get_brand ? getProduct.get_brand.name : '' }}</td> 
                                    <td>{{ getProduct.get_category ? getProduct.get_category.name : '' }}</td>
                                    <td>
                                        <span class="item-except text-muted text-sm h-1x">
                                            Mirrorsbeautylounge
                                        </span>
                                    </td>
                                    <td v-if="(getProduct.discount > 0 && getProduct.discount_price > 0)">
                                        <b ><del>{{getProduct.sale_price}}</del> / {{getProduct.discount_price}}</b>
                                    </td> 
                                    <td v-else>
                                        <b >{{getProduct.sale_price}}</b>
                                    </td>
                                    <td>
                                        <span class="badge badge-success" v-if="getProduct.product_quantity > 0">IN STOCK</span>
                                        <span class="badge badge-danger" v-else>OUT OF STOCK</span>
                                    </td>
                                    <td>{{ getProduct.product_quantity ? getProduct.product_quantity : 0}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <pagination :data="getProducts" @pagination-change-page="getProudctFunc"></pagination>
                </div>
            </div>
        </div>
    </div>
</template>

<script type="text/javascript">
 import Vue from 'vue'
 import { mapState } from 'vuex'
import { LOAD_PRODUCTS_LIST_ACTION } from '@admin/store/products/actions'
 export default {
    components: { },
      data() {
            return {
            baseUrl:Vue.config.baseUrl,
            baseUrlImage:Vue.config.baseUrlImage
        }
    },  
    computed:{
        ...mapState({
            getProducts: state => state.getProduct.getProducts,
        }),
    },
    created() {
        this.getProudctFunc();
    },
    methods: {
        searchProduct:function(event){
            let search = event.target.value;
            this.getProudctFunc(1,search);  
        },
        getProudctFunc:function(page = 1,search=''){
            let _this = this;
            let query = [];
            query['params'] = { page, search };
            if (this.$admin['role_id'] == 2) {
                query['params']['created_by'] = this.$admin['id'];
            }
            _this.$store.dispatch('getProduct/' + LOAD_PRODUCTS_LIST_ACTION,query);
        },
    }
}
</script>