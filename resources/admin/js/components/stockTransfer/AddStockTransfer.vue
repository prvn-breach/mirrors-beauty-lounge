<template>
    <div id="content" class="flex">
        <div class="page-container">
            <div class="pt-3 pr-3 pb-5 pl-3">
                <div class="mb-5">
                    <h2 class="dv_page_heading">Add Stock Transfer </h2>
                    <div class="row dv_search_delete_action_common">
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card mb-3">
                                <div class="card-header"><strong>Basic Details</strong></div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize" for="name">From Location </label>
                                                <select name="from_location" v-model="addStockTransfer.from_location" :class="status($v.addStockTransfer.from_location)" @input="setValue($event)" class="form-control dv_common_select_for_all">
                                                    <option value="">Select </option>
                                                    <option value="Mirrors">Mirrors </option>
                                                </select>
                                            </div>                                                    
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize" for="name">To Location </label>
                                                <select name="to_location" v-model="addStockTransfer.to_location" :class="status($v.addStockTransfer.to_location)" @input="setValue($event)" class="form-control dv_common_select_for_all">
                                                    <option value="">Select </option>
                                                    <option :value="location.id" v-for="(location,index) in lists.locations" :key="index">{{ location['location_name'] }}</option>
                                                </select>
                                            </div>                                                    
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize" for="name">Date </label>
                                                <input name="date" v-model="addStockTransfer.date" type="date" :class="status($v.addStockTransfer.date)" @input="setValue($event)" class="form-control dv_common_input_for_all dvdatepicker">
                                            </div>                                                    
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize" for="name">Contact Person</label>
                                                <input name="contact_person" v-model="addStockTransfer.contact_person" type="text" :class="status($v.addStockTransfer.contact_person)" @input="setValue($event)" class="form-control dv_common_input_for_all">
                                            </div>                                                    
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize d-block" for="name">Transfer Stock Immediately? </label>
                                                <label class="ui-switch ui-switch-md info m-t-xs mt-2"><input checked="" v-model="addStockTransfer.transfer_stock_immediately" type="checkbox"> <i></i></label>
                                            </div>                                                    
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header"><strong>Products Details</strong></div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-theme table-row v-middle">
                                    <thead>
                                        <tr>
                                            <!-- <th style="width: 15%;" class="text-muted">category</th> -->
                                            <th style="width: 15%;" class="text-muted">brand</th>
                                            <th style="width: 10%;" class="text-muted">image</th>
                                            <th style="width: 30%;" class="text-muted">product </th>
                                            <th style="width: 10%;" class="text-muted">in stock qty </th>
                                            <th style="width: 10%;" class="text-muted">transfer qty</th>
                                            <th style="width: 10%;" class="text-muted">price</th>
                                            <th style="width: 10%;" class="text-muted">action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="(item,index) in addStockTransfer.products" :key="index" class="v-middle">
                                            <!-- <td>
                                                <select @input="onChangeCategory($event, item)" v-model="item.category_id" id="select2-single" class="form-control">
                                                    <option value="">Select Category </option>
                                                    <option :value="category.id" v-for="(category,index) in item.categories" :key="index">{{ category['name'] }}</option>
                                                </select>
                                            </td> -->
                                            <td>
                                                <select @input="onChangeBrand($event, item)" v-model="item.brand_id" id="select2-single" class="form-control">
                                                    <option value="">Select Brand </option>
                                                    <option :value="brand.id" v-for="(brand,index) in item.brands" :key="index">{{ brand['name'] }}</option>
                                                </select>
                                            </td>
                                            <td>
                                                <img :src="item.image" alt="" title="" class="dv_stock_trasnfer_pr_img">
                                            </td>
                                            <td>
                                                <select @input="onItemChange($event, item)" v-model="item.product_id" id="select2-single" class="form-control">
                                                    <option value="">Select Product </option>
                                                    <option :value="product.id" v-for="(product,index) in item.products" :key="index">{{ product['name'] }}</option>
                                                </select>
                                            </td>
                                            <td class="text-center">
                                                <strong> {{ item.in_stock_qty }} </strong>
                                            </td>
                                            <td>
                                                <input type="number" :disabled="!item.product_id" v-model="item.quantity" @input="onChangeQty($event, item)" class="form-control dv_common_input_for_all">
                                            </td>
                                            <td class="text-center">
                                                <strong> {{ item.price * item.quantity }} </strong>
                                            </td>
                                            <td>
                                                <button @click="deleteProductInStock(item.product_id)" type="text" class="btn btn-default dv_selected_delete_common float-none" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete Selected Entries">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr class="v-middle">
                                            <!-- <td>
                                                <select @input="onChangeCategory($event, current_product)" v-model="current_product.category_id" :class="status($v.current_product.category_id)" id="select2-single" class="form-control">
                                                    <option value="">Select Category </option>
                                                    <option :value="category.id" v-for="(category,index) in current_product.categories" :key="index">{{ category['name'] }}</option>
                                                </select>
                                            </td> -->
                                            <td>
                                                <select @input="onChangeBrand($event, current_product)" v-model="current_product.brand_id" :class="status($v.current_product.brand_id)" id="select2-single" class="form-control">
                                                    <option value="">Select Brand </option>
                                                    <option :value="brand.id" v-for="(brand,index) in current_product.brands" :key="index">{{ brand['name'] }}</option>
                                                </select>
                                            </td>
                                            <td>
                                                <img :src="current_product.image" alt="" title="" class="dv_stock_trasnfer_pr_img">
                                            </td>
                                            <td>
                                                <select @input="onProductChange" v-model="current_product.product_id" :class="status($v.current_product.product_id)" id="select2-single" class="form-control">
                                                    <option value="">Select Product </option>
                                                    <option :value="product.id" v-for="(product,index) in current_product.products" :key="index">{{ product['name'] }}</option>
                                                </select>
                                            </td>
                                            <td class="text-center">
                                                <strong> {{ current_product.in_stock_qty }} </strong>
                                            </td>
                                            <td>
                                                <input type="number" :disabled="!current_product.product_id" v-model="current_product.quantity" :class="status($v.current_product.quantity)" @input="onChangeQty($event, current_product)" class="form-control dv_common_input_for_all">
                                            </td>
                                            <td class="text-center">
                                                <strong> {{ current_product.price * current_product.quantity }} </strong>
                                            </td>
                                            <td>
                                                <button @click="addProductInStock" type="text" class="btn btn-default dv_filter_common float-none" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add Product">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-12 text-center">
                            <button type="button" class="btn btn-default text-muted dv_cancel_submit_btn" @click="$router.push({ name: 'getStockTransfer' });">cancel</button>
                            <button type="button" class="btn btn-default dv_save_submit_btn" @click="saveStockTransfer">save </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import Vue from 'vue'
import { mapState } from 'vuex';
import { required, minValue } from 'vuelidate/lib/validators';
import { deleteEmptyKeys } from "../../mixins";
import { GET_LOCATIONS_ACTION  } from '@admin/store/locations/actions';
import { LOAD_BRAND_LIST_ACTION } from '@admin/store/brands/actions'
import { LOAD_PRODUCTS_LIST_ACTION, ADD_STOCK_TRANSFER_ACTION  } from '@admin/store/products/actions';
import { GET_CATEGORIES_ACTION } from '@admin/store/categories/actions'
export default {
    components: { },
    data() {
        return {
            baseUrl:Vue.config.baseUrl,
            baseUrlImage: Vue.config.baseUrlImage,
            addStockTransfer: {
                from_location: 'Mirrors',
                to_location: '',
                date: '',
                contact_person: '',
                transfer_stock_immediately: true,
                products: []
            },
            current_product: {
                brand_id: '',
                image: '',
                product_id: '',
                in_stock_qty: 0,
                quantity: 1,
                price: 0,
                brands: [],
                categories: [],
                products: []
            },
            lists: {
                locations: [],
                products: [],
                brands: [],
                categories: []
            }
        }
    },
    validations: {
        addStockTransfer: {
            from_location: { required },
            to_location: { required },
            date: { required },
            contact_person: { required }
        },
        current_product: {
            brand_id: { required },
            product_id: { required },
            quantity: { required, minValue: minValue(1) }
        }
    },
    computed:{
        ...mapState({
            locations: state => state.getLocation.getLocations,
            brands: state => state.getBrand.getBrands,
            categories: state => state.getCategory.getCategories,
            products: state => state.getProduct.getProducts,
        })
    },
    mounted() {
        this.getLocations();
        this.getProducts();
        this.getBrands();
        // this.getCategories();
    },
    methods: {
        status: function(validation) {
            if(validation != undefined){
                return {
                    error: validation.$error,
                    dirty: validation.$dirty
                }
            }
        },
        setValue: function(event) {
            this.addStockTransfer[event.target.name] = event.target.value;
            this.$v.addStockTransfer[event.target.name].$touch();
        },
        addProductInStock: function(){
            this.$v.current_product.$touch();
            if (!this.$v.current_product.$invalid) {
                this.addStockTransfer.products.push({
                    brand_id: this.current_product.brand_id,
                    image: this.current_product.image,
                    product_id: this.current_product.product_id,
                    in_stock_qty: this.current_product.in_stock_qty,
                    quantity: this.current_product.quantity,
                    price: this.current_product.price,
                    brands: this.current_product.brands,
                    products: this.current_product.products
                });

                this.resetProductData(this.current_product);
                this.current_product.brand_id = '';
                this.current_product.products = this.products;
                this.current_product.brands = this.brands;
            }
        },
        deleteProductInStock: function(product_id) {
            this.addStockTransfer.products = this.addStockTransfer.products.filter(product => product.product_id!=product_id);
        },
        onProductChange: function(event) {
            let product = this.products.find(item => item.id == event.target.value);
            if (product) {
                if (product.get_product_images.length > 0) {
                    this.current_product.image = this.baseUrlImage+'images/products/'+product.get_product_images[0]['image']
                }
                this.current_product.product_id = event.target.value;
                this.current_product.price = product.sale_price;
                this.current_product.in_stock_qty = product.product_quantity;
            } else {
                this.current_product.image = ''
                this.current_product.product_id = '';
                this.current_product.in_stock_qty = 0;
                this.current_product.quantity = 1;
                this.current_product.price = 0;
            }
        },
        onItemChange: function(event, data) {
            let product = this.products.find(item => item.id == event.target.value);
            if (product) {
                data.image = this.baseUrlImage+'images/products/'+product.get_product_images[0]['image']
                data.product_id = event.target.value;
                data.price = product.sale_price;
                data.in_stock_qty = product.product_quantity;
            } else {
                data.image = ''
                data.product_id = '';
                data.in_stock_qty = 0;
                data.quantity = 1;
                data.price = 0;
            }
        },
        getLocations: function() {
            let query = [];
            query['params'] = {
                perPage: 'all'
            };
            this.$store.dispatch('getLocation/' + GET_LOCATIONS_ACTION, query).then(() => {
                this.lists.locations = this.locations;
            });
        },
        getProducts: function() {
            let query = [];
            query['params'] = {
                perPage: 'all'
            };
            this.$store.dispatch('getProduct/' + LOAD_PRODUCTS_LIST_ACTION, query).then(() => {
                this.lists.products = this.products;
                this.current_product.products = this.products;
            });;
        },
        saveStockTransfer: function () {
            let _this = this;
            _this.$v.addStockTransfer.$touch();
            if (_this.addStockTransfer.products.length == 0) {
                alert('Please add stock transfer atleast 1 product.');
                return;
            }
            let params = deleteEmptyKeys(this.addStockTransfer);
            let products = [];
            params.products.forEach(product => {
                products.push({
                    brand_id: product.brand_id,
                    image: product.image,
                    product_id: product.product_id,
                    in_stock_qty: product.in_stock_qty,
                    quantity: product.quantity,
                    price: product.price
                });
            });
            params.products = products;
            if (!_this.$v.addStockTransfer.$invalid) {
                this.loaderModal('show');
                this.$store.dispatch('getProduct/' + ADD_STOCK_TRANSFER_ACTION, params).then(() => {
                    this.loaderModal('hide');
                    this.$router.push({ name: 'getStockTransfer' });
                });
            }
        },
        getBrands:function(){
            let _this = this;
            let query = [];
            query['params'] = {
                perPage: 'all'
            }
            if (this.$admin['role_id'] == 2) {
                query['params']['created_by'] = this.$admin['id'];
            }
            _this.$store.dispatch('getBrand/' + LOAD_BRAND_LIST_ACTION,query).then(() => {
                _this.lists.brands = _this.brands;
                _this.current_product.brands = _this.brands;
            })
        },
        getCategories: function(){
            let query = [];
            if (this.$admin['role_id'] == 2) {
                query['params'] = { created_by: this.$admin['id']  };
            }
            this.$store.dispatch('getCategory/' + GET_CATEGORIES_ACTION, query).then(() => {
                this.lists.categories = this.categories;
                this.current_product.categories = this.categories;
            });
        },
        onChangeBrand: function(event, data) {
            this.resetProductData(data);
            data.products = this.lists.products.filter(product => {
                if (event.target.value == product.brand_id) {
                    return product;
                }
            });
        },
        onChangeCategory: function(event, data) {
            data.brand_id = '';
            this.resetProductData(data);
            if (event.target.value == '') {
                data.products = this.lists.products;
                data.brands = this.lists.brands;
                return;
            }
            data.products = this.lists.products.filter(product => event.target.value == product.category_id);
            data.brands = this.lists.brands.filter(brand => event.target.value == brand.category_id);
        },
        resetProductData: function(data) {
            data.product_id = '';
            data.image = '';
            data.in_stock_qty = 0;
            data.quantity = 1;
            data.price = 0;
        },
        onChangeQty: function(event, data) {
            if (event.target.value < 1) {
                alert('Transfer atleast 1 quantity.');
                data.quantity = 1;
            }
            let product = this.products.find(product => product.id == data.product_id);
            if (event.target.value > product['product_quantity']) {
                alert(product['name']+' have only '+product['product_quantity']+' pieces available.');
                data.quantity = product['product_quantity'];
            }
        }
    }
}
</script>