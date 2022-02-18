<template>
	   <div id="content" class="flex">
                <!-- ############ Main START-->
                <div class="page-container">
                    <div class="pt-3 pr-3 pb-5 pl-3">
                        <div class="mb-5">
                            <h2 class="dv_page_heading">Product List </h2>
                            <div class="row dv_search_delete_action_common">
                                <div class="col-md-5 col-sm-5 col-xs-5 col-5">
                                    <input type="text" class="form-control dv_common_search_for_all" name="" placeholder="Search" @keyup="searchProduct">
                                </div>
                                <div class="col-md-7 col-sm-7 col-xs-7 col-7">
                                    <router-link :to="{ name : 'addProduct'}" tag="button" class="btn btn-default dv_filter_common" data-toggle="tooltip" data-placement="top" title="Add Product">                           
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                                    </router-link>
                                    <button @click="deleteProduct" type="text" :disabled="selected_products.length==0" class="btn btn-default dv_selected_delete_common" data-toggle="tooltip" data-placement="top" title="Delete Selected Products">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                    </button>
                                    <button type="text" class="btn btn-default dv_selected_filter_common" data-toggle="tooltip" data-placement="top" title="Filter">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3" ></polygon>
                                        </svg>
                                    </button>
                                    <button type="button" @click="excelDownload" class="btn btn-default dv_export_common" data-toggle="tooltip" data-placement="top" title="Download CSV">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="7 10 12 15 17 10"></polyline><line x1="12" y1="15" x2="12" y2="3"></line></svg>
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
                                                        <label class="text-muted text-capitalize d-block w-100" for="name">Brand</label>
                                                        <select class="form-control dv_common_select_for_all" v-model="filters.brand_id">
                                                            <option value="">Select</option>
                                                            <option :value="brand.id" v-for="(brand, index) in getBrands" :key="index">{{ brand.name }}</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label class="text-muted text-capitalize d-block w-100" for="name">Category</label>
                                                        <select class="form-control dv_common_select_for_all" v-model="filters.category_id">
                                                            <option value="">Select</option>
                                                            <option :value="category.id" v-for="(category, index) in getCategories" :key="index">{{ category.name }}</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <button type="button" class="btn btn-default dv_save_submit_btn" style="margin-top: 26px;" @click="getProudctFunc">Filter</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <pagination class="mt-2" :data="getProducts" @pagination-change-page="getProudctFunc"></pagination>
                            
                            <div class="table-responsive">
                                <table class="table table-theme table-row v-middle">
                                    <thead>
                                        <tr>
                                            <th style="width: 20px;">
                                                <label class="ui-check m-0 ui-check-rounded ui-check-md"><input type="checkbox" :checked="getProducts.data && (selected_products.length == getProducts.data.length)" @change="allSelect"> <i></i></label>
                                            </th>
                                            <th style="width: 5%;" class="text-muted sortable" @click="sorting(order('id'), 'id')">ID</th>
                                            <th style="width: 10%;" class="text-muted">image </th>
                                            <th style="width: 10%;" class="text-muted sortable" @click="sorting(order('product_code'), 'product_code')">code</th>
                                            <th style="width: 30%;" class="text-muted sortable" @click="sorting(order('name'), 'name')">product name</th>
                                            <th style="width: 10%;" class="text-muted sortable" @click="sorting(order('brand_id'), 'brand_id')">brand</th> 
                                            <th style="width: 10%;" class="text-muted sortable" @click="sorting(order('category_id'), 'category_id')">category</th>
                                            <th style="width: 10%;" class="text-muted sortable" >seller</th>
                                            <th style="width: 10%;" class="text-muted sortable" @click="sorting(order('discount_price'), 'discount_price')">price</th>
                                            <th style="width: 10%;" class="text-muted">status</th>
                                            <th style="width: 5%;" class="text-muted">action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        <tr v-for="(getProduct,index) in getProducts.data" class="v-middle" :key="index">
                                            <td>
                                                <label class="ui-check m-0 ui-check-rounded ui-check-md"><input  type="checkbox" id="multi-check" :checked="selected_products.includes(getProduct.id)" @change="seletProduct($event, getProduct.id)"> <i></i></label>
                                            </td>
                                            <td>{{ getProduct.id }} </td> 
                                            <td>
                                                <img v-if="getProduct.get_product_images.length>0" :src="baseUrlImage+'images/products/'+getProduct.get_product_images[0].image" :alt="getProduct.get_product_images[0].atr" title="" class="dv_product_list_img">
                                                <img v-else :src="baseUrlImage+'images/default_admin.jpg'" alt="" width="50" height="50">
                                            </td>
                                            <td>
                                                <span class="item-except text-muted text-sm h-1x">
                                               {{getProduct.product_code}}
                                                </span>
                                            </td>
                                            <td>
                                                <span class="item-except text-muted text-sm h-1x">
                                                    {{getProduct.name}}
                                                </span>
                                                <!-- <input type="text" class="form-control dv_common_search_for_all"  :value="getProduct.name"> -->
                                            </td>
                                            <td>{{ getProduct.get_brand ? getProduct.get_brand.name: ''}}</td> 
                                            <td>{{getProduct.get_category ? getProduct.get_category.name: ''}}</td>
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
                                                <label class="ui-switch ui-switch-md info m-t-xs"><input @change="getChangeStatus($event,getProduct)" :checked="getProduct.status == 'A'" type="checkbox"> <i></i></label>
                                            </td>
                                            <td>
                                                
                                                 <router-link :to="{ name : 'addProduct', params : { product_id:getProduct.id}}" >
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="dv_row_action_drp_svg_eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                                </router-link>
                                            </td>
                                        </tr>
                                      
                                    </tbody>
                                </table>
                            </div>

                            <pagination :data="getProducts" @pagination-change-page="getProudctFunc"></pagination>
                          
                        </div>

                    </div>
                </div>
                <!-- ############ Main END-->
            </div>
</template>

<script type="text/javascript">
import Vue from 'vue';
import { mapState } from 'vuex';
import { LOAD_PRODUCTS_LIST_ACTION,UPDATE_CHANGE_STATUS_PRODUCT_ACTION,EXCEL_DOWNLOAD_PRODUCTS_ACTION, DELETE_PRODUCTS_ACTION } from '@admin/store/products/actions';
import { LOAD_BRAND_LIST_ACTION } from '@admin/store/brands/actions';
import { GET_CATEGORIES_ACTION } from '@admin/store/categories/actions';
export default {
    components: { },
    data() {
        return {
            baseUrl:Vue.config.baseUrl,
            baseUrlImage:Vue.config.baseUrlImage,
            filters: {
                orderBy: 'desc',
                sortBy: 'id',
                perPage: 50,
                brand_id: '',
                category_id: ''
            },
            excel_fields: [ 
                'ID', 'Product Name', 'Product Code', 'BarCode', 
                'Brand', 'Category', 'Sale Price', 'Discount(%)', 
                'Discount Price', 'Color', 'Size', 'Size Measurment', 
                'Availability', 'Product Quantity', 'Model Number', 
                'Description', 'Warranty', 'Delivery', 'Tags', 'SEO Title',
                'SEO Keywords', 'SEO Description', 'Status'
            ],
            excel_db_columns: [
                { column: 'id' },
                { column: 'name' },
                { column: 'product_code' },
                { column: 'barcode' },
                { table: 'get_brand', column: 'name' },
                { table: 'get_category', column: 'name' },
                { column: 'sale_price' },
                { column: 'discount' },
                { column: 'discount_price' },
                { column: 'color' },
                { column: 'size' },
                { column: 'size_measurment' },
                { column: 'availibility' },
                { column: 'product_quantity' },
                { column: 'model_number' },
                { column: 'description' },
                { column: 'warranty' },
                { column: 'delivery' },
                { column: 'tags' },
                { column: 'seo_title' },
                { column: 'seo_keywords' },
                { column: 'seo_desciption' },
                { column: 'status' },
            ],
            selected_products: [],
        }
    },
    computed:{
        ...mapState({
            getProducts: state => state.getProduct.getProducts,
            excelLink: state => state.getProduct.excelLink,
            getBrands: state => state.getBrand.getBrands,
            getCategories: state => state.getCategory.getCategories
        }),
    },
    methods: {
        searchProduct:function(event){
            let search = event.target.value;
            this.getProudctFunc(1,search);  
        },
        onFileChange(event){
            const file = event.target.files[0];
            this.getBrandImagePreview = URL.createObjectURL(file);
            this.addBrand.image = event.target.files[0];
        },
        getChangeAuth:function(event){
            let _this = this;
            if(event.target.checked == true){
                _this.addBrand.isAuth = 1; 
            }else{
                _this.addBrand.isAuth = 0; 
            }
        }, 
        getChangeStatus:function(event,product){
            let _this = this;
            let data = {
                id:product.id,
            };
            if(event.target.checked == true){
                data.status = 'A'; 
            }else{
                data.status = 'I'; 
            }
            _this.$store.dispatch('getProduct/' + UPDATE_CHANGE_STATUS_PRODUCT_ACTION,data).then(function(e){

            });
        },
        getProudctFunc:function(page = 1,search=''){
            let _this = this;
            let query = [];
            query['params'] = { page, search };
            query['params'] = { ...query['params'], ...this.filters };
            query['params'] = this.deleteEmptyKeys(query['params']);
            if (this.$admin['role_id'] == 2) {
                query['params']['created_by'] = this.$admin['id'];
            }
            _this.$store.dispatch('getProduct/' + LOAD_PRODUCTS_LIST_ACTION,query);
        },
        excelDownload: function() {
            let params = {
                perPage: 'all',
                response_type: 'xlsx',
                orderBy: this.filters.orderBy,
                sortBy: this.filters.sortBy,
                brand_id: this.filters.brand_id,
                category_id: this.filters.category_id,
                excel_fields: this.excel_fields,
                excel_db_columns: this.excel_db_columns
            };
            params = this.deleteEmptyKeys(params);
            if (this.$admin['role_id'] == 2) {
                params['created_by'] = this.$admin['id'];
            }
            this.$store.dispatch('getProduct/' + EXCEL_DOWNLOAD_PRODUCTS_ACTION, params).then(() => {
                const link = document.createElement("a");
                link.href = this.excelLink;
                link.setAttribute("download", "products.xlsx");
                document.body.appendChild(link);
                link.click();
            });
        },
        sorting(orderBy, sortBy) {
            this.filters.orderBy = orderBy;
            this.filters.sortBy = sortBy;
            this.getProudctFunc();
        },
        order(sortBy) {
            if ((this.filters.sortBy == sortBy) && (this.filters.orderBy == 'desc')) {
                return 'asc';
            } else if ((this.filters.sortBy == sortBy) && (this.filters.orderBy == 'asc')) {
                return 'desc'
            } else {
                return 'desc';
            }
        },
        getBrandsList: function () {
            this.$store.dispatch('getBrand/' + LOAD_BRAND_LIST_ACTION,{ params: { perPage: 'all' } });
        },
        getCategoriesList: function () {
            this.$store.dispatch('getCategory/' + GET_CATEGORIES_ACTION,{});
        },
        seletProduct(event, product_id) {
            if (event.target.checked) {
                this.selected_products.push(product_id);
            } else {
                this.selected_products = this.selected_products.filter(id => id!=product_id);
            }
        },
        allSelect(event) {
            if (event.target.checked) { 
                this.selected_products = this.getProducts.data.map(product => product.id);
            } else {
                this.selected_products = [];
            }
        },
        deleteProduct() {
            if (confirm('Please confirm to delete selected products.')) {
                let params = {
                    product_ids : this.selected_products
                };
                this.$store.dispatch('getProduct/' + DELETE_PRODUCTS_ACTION, params).then(() => {
                    this.getProudctFunc();
                });
            }
        }
    },       
    created() {
        this.getProudctFunc();
        this.getBrandsList();
        this.getCategoriesList();
    }
}
</script>