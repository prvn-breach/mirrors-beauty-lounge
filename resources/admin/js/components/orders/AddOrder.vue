<template>
    <div id="content" class="flex">
        <div class="page-container">
            <div class="pt-3 pr-3 pb-5 pl-3">
                <div class="mb-5">
                    <h2 class="dv_page_heading">Add Order </h2>
                    <div class="row dv_search_delete_action_common"></div>
                    <!-- <div class="alert alert-danger" v-if="getError && alert_timer > 0"><strong>{{ getError }}</strong></div> -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card mb-3">
                                <div class="card-header"><strong>Customer Details</strong></div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize" for="name">First Name</label>
                                                <input v-model="addOrder.first_name" :class="status($v.addOrder.first_name)" @input="setValue($event)" name="first_name" type="text" class="form-control dv_common_input_for_all" placeholder="Enter">
                                                <span class="text-danger" v-if="getErrors.hasOwnProperty('first_name')">{{ getErrors['first_name'][0] }}</span>
                                            </div>                                                        
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize" for="name">Last Name</label>
                                                <input v-model="addOrder.last_name" :class="status($v.addOrder.last_name)" @input="setValue($event)" name="last_name" type="text" class="form-control dv_common_input_for_all" placeholder="Enter">
                                                <span class="text-danger" v-if="getErrors.hasOwnProperty('last_name')">{{ getErrors['last_name'][0] }}</span>
                                            </div>                                                        
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize" for="name">Email </label>
                                                <input v-model="addOrder.email" :class="status($v.addOrder.email)" @input="setValue($event)" name="email" type="email" class="form-control dv_common_input_for_all" placeholder="Enter">
                                                <span class="text-danger" v-if="getErrors.hasOwnProperty('email')">{{ getErrors['email'][0] }}</span>
                                            </div>                                                        
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize" for="name">Date Of Birth </label>
                                                <input v-model="addOrder.dob" :class="status($v.addOrder.dob)" @input="setValue($event)" name="dob" type="date" class="form-control dv_common_input_for_all" placeholder="Enter">
                                                <span class="text-danger" v-if="getErrors.hasOwnProperty('dob')">{{ getErrors['dob'][0] }}</span>
                                            </div>                                                        
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize" for="name">Mobile </label>
                                                <input v-model="addOrder.mobile" :class="status($v.addOrder.mobile)" @input="setValue($event)" name="mobile" type="number" class="form-control dv_common_input_for_all" placeholder="Enter">
                                                <span class="text-danger" v-if="getErrors.hasOwnProperty('mobile')">{{ getErrors['mobile'][0] }}</span>
                                            </div>                                                        
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card mb-3">
                                <div class="card-header"><strong>Order Billing Details</strong></div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize" for="name">Mobile</label>
                                                <input v-model="addOrder.billing_mobile" :class="status($v.addOrder.billing_mobile)" @input="setValue($event)" name="billing_mobile" type="number" class="form-control dv_common_input_for_all" placeholder="Enter">
                                            </div>                                                        
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize" for="name">Address</label>
                                                <input v-model="addOrder.billing_address" :class="status($v.addOrder.billing_address)" @input="setValue($event)" name="billing_address" type="text" class="form-control dv_common_input_for_all" placeholder="Enter">
                                            </div>                                                        
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize" for="name">City </label>
                                                <input v-model="addOrder.billing_city" :class="status($v.addOrder.billing_city)" @input="setValue($event)" name="billing_city" type="text" class="form-control dv_common_input_for_all" placeholder="Enter">
                                            </div>                                                        
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize" for="name">State </label>
                                                <input v-model="addOrder.billing_state" :class="status($v.addOrder.billing_state)" @input="setValue($event)" name="billing_state" type="text" class="form-control dv_common_input_for_all" placeholder="Enter">
                                            </div>                                                        
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize" for="name">Postal code </label>
                                                <input v-model="addOrder.billing_postal_code" :class="status($v.addOrder.billing_postal_code)" @input="setValue($event)" name="billing_postal_code" type="text" class="form-control dv_common_input_for_all" placeholder="Enter">
                                            </div>                                                        
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize" for="name">Country </label>
                                                <input v-model="addOrder.billing_country" :class="status($v.addOrder.billing_country)" @input="setValue($event)" name="billing_country" type="text" class="form-control dv_common_input_for_all" placeholder="Enter">
                                            </div>                                                        
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize" for="name">Address Type</label>
                                                <select v-model="addOrder.billing_address_type" :class="status($v.addOrder.billing_address_type)" @input="setValue($event)" name="billing_address_type" class="form-control dv_common_select_for_all">
                                                    <option value="home" selected>Home</option>
                                                    <option value="office">Office</option>
                                                    <option value="other">Other</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card mb-3">
                                <div class="card-header"><strong>Order Shipping Details</strong></div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group d-flex">
                                                <input type="checkbox" @change="checkSameAddress" v-model="check_same_address" placeholder="Enter">
                                                <label class="ml-2" >shipping details same as billing details</label>
                                            </div>                                                        
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize" for="name">Mobile</label>
                                                <input :disabled="check_same_address" v-model="addOrder.shipping_mobile" :class="status($v.addOrder.shipping_mobile)" @input="setValue($event)" name="shipping_mobile" type="number" class="form-control dv_common_input_for_all" placeholder="Enter">
                                            </div>                                                        
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize" for="name">Address</label>
                                                <input :disabled="check_same_address" v-model="addOrder.shipping_address" :class="status($v.addOrder.shipping_address)" @input="setValue($event)" name="shipping_address" type="text" class="form-control dv_common_input_for_all" placeholder="Enter">
                                            </div>                                                        
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize" for="name">City </label>
                                                <input :disabled="check_same_address" v-model="addOrder.shipping_city" :class="status($v.addOrder.shipping_city)" @input="setValue($event)" name="shipping_city" type="text" class="form-control dv_common_input_for_all" placeholder="Enter">
                                            </div>                                                        
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize" for="name">State </label>
                                                <input :disabled="check_same_address" v-model="addOrder.shipping_state" :class="status($v.addOrder.shipping_state)" @input="setValue($event)" name="shipping_state" type="text" class="form-control dv_common_input_for_all" placeholder="Enter">
                                            </div>                                                        
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize" for="name">Postal code </label>
                                                <input :disabled="check_same_address" v-model="addOrder.shipping_postal_code" :class="status($v.addOrder.shipping_postal_code)" @input="setValue($event)" name="shipping_postal_code" type="text" class="form-control dv_common_input_for_all" placeholder="Enter">
                                            </div>                                                        
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize" for="name">Country </label>
                                                <input :disabled="check_same_address" v-model="addOrder.shipping_country" :class="status($v.addOrder.shipping_country)" @input="setValue($event)" name="shipping_country" type="text" class="form-control dv_common_input_for_all" placeholder="Enter">
                                            </div>                                                        
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize" for="name">Address Type</label>
                                                <select :disabled="check_same_address" v-model="addOrder.shipping_address_type" :class="status($v.addOrder.shipping_address_type)" @input="setValue($event)" name="shipping_address_type" class="form-control dv_common_select_for_all">
                                                    <option value="home" selected>Home</option>
                                                    <option value="office">Office</option>
                                                    <option value="other">Other</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card mb-3">
                                <div class="card-header"><strong>Product Details</strong></div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-theme table-row v-middle">
                                            <thead>
                                                <tr>
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
                                                <tr v-for="(item,index) in addOrder.products" :key="index" class="v-middle">
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
                            </div>
                            <div class="card mb-3">
                                <div class="card-header"><strong>Order Payment Details</strong></div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-3 mb-3">
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize" for="name">Payment Mode</label>
                                                <select v-model="addOrder.payment_mode" :class="status($v.addOrder.payment_mode)" @input="setValue($event)" name="payment_mode" class="form-control dv_common_select_for_all">
                                                    <option value="cash" selected>CASH</option>
                                                    <option value="card">CARD</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize" for="name">Payment Status</label>
                                                <select v-model="addOrder.payment_status" :class="status($v.addOrder.payment_status)" @input="setValue($event)" name="payment_status" class="form-control dv_common_select_for_all">
                                                    <option value="NOT_PAID" selected>NOT PAID</option>
                                                    <option value="PAID">PAID</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 text-center">
                            <button type="button" class="btn btn-default text-muted dv_cancel_submit_btn" @click="$router.push({ name: 'getOrders' });">cancel</button>
                            <button type="button" class="btn btn-default dv_save_submit_btn" @click="addOrderAction()">Add Order </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import Vue from 'vue';
import { mapState } from 'vuex';
import { required, minLength, minValue } from 'vuelidate/lib/validators';
import { ADD_ORDER_ACTION } from '@admin/store/orders/actions';
import { LOAD_PRODUCTS_LIST_ACTION  } from '@admin/store/products/actions';
import { LOAD_BRAND_LIST_ACTION } from '@admin/store/brands/actions'
import { uuid } from 'vue-uuid'
export default {
    data() {
        return {
            baseUrl:Vue.config.baseUrl,
            baseUrlImage:Vue.config.baseUrlImage,
            check_same_address: false,
            alert_timer: 0,
            addOrder: {
                first_name: '',
                last_name: '',
                dob: '',
                email: '',
                mobile: '',
                billing_mobile: '',
                billing_address: '',
                billing_city: '',
                billing_state: '',
                billing_postal_code: '',
                billing_country: '',
                billing_address_type: 'home',
                shipping_mobile: '',
                shipping_address: '',
                shipping_city: '',
                shipping_state: '',
                shipping_postal_code: '',
                shipping_country: '',
                shipping_address_type: 'home',
                payment_mode: 'cash',
                payment_status: 'NOT_PAID',
                session_id: uuid.v1(),
                products: [],
            },
            current_product: {
                image: '',
                brand_id: '',
                product_id: '',
                in_stock_qty: 0,
                quantity: 1,
                price: 0,
                brands: [],
                products: []
            },
            lists: {
                products: [],
                brands: []
            }
        }
    },
    computed:{
        ...mapState({
            getErrors: state => state.getOrder.getErrors,
            brands: state => state.getBrand.getBrands,
            products: state => state.getProduct.getProducts
        })
    },
    validations: {
        addOrder: {
            first_name: { required },
            last_name: { required },
            dob: { required },
            email: { required },
            mobile: { required, minLength: minLength(10) },
            billing_mobile: { required },
            billing_address: { required },
            billing_city: { required },
            billing_state: { required },
            billing_postal_code: { required },
            billing_country: { required },
            billing_address_type: { required },
            shipping_mobile: { required },
            shipping_address: { required },
            shipping_city: { required },
            shipping_state: { required },
            shipping_postal_code: { required },
            shipping_country: { required },
            shipping_address_type: { required },
            payment_mode: { required },
            payment_status: { required }
        },
        current_product: {
            brand_id: { required },
            product_id: { required },
            quantity: { required, minValue: minValue(1) }
        }
    },
    mounted() {
        this.getProducts();
        this.getBrands();
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
            this.addOrder[event.target.name] = event.target.value;
            this.$v.addOrder[event.target.name].$touch();
        },
        checkSameAddress: function() {
            if (this.check_same_address) {
                this.addOrder.shipping_mobile = this.addOrder.billing_mobile;
                this.addOrder.shipping_address = this.addOrder.billing_address;
                this.addOrder.shipping_city = this.addOrder.billing_city;
                this.addOrder.shipping_state = this.addOrder.billing_state;
                this.addOrder.shipping_postal_code = this.addOrder.billing_postal_code;
                this.addOrder.shipping_country = this.addOrder.billing_country;
                this.addOrder.shipping_address_type = this.addOrder.billing_address_type;
            }
        },
        setAlertTimer: function(){
            this.alert_timer = 5;
            let interval = setInterval(() => {
                if (this.alert_timer < 1) {
                    clearInterval(interval);
                    return;
                }
                this.alert_timer--;
            }, 500);
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
        addProductInStock: function(){
            this.$v.current_product.$touch();
            if (!this.$v.current_product.$invalid) {
                this.addOrder.products.push({
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
            this.addOrder.products = this.addOrder.products.filter(product => product.product_id!=product_id);
        },
        onChangeBrand: function(event, data) {
            this.resetProductData(data);
            data.products = this.lists.products.filter(product => {
                if (event.target.value == product.brand_id) {
                    return product;
                }
            });
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
        },
        addOrderAction: function() {
            let _this = this;
            _this.$v.addOrder.$touch();
            _this.addOrder.action = 0;
            if (!_this.$v.addOrder.$invalid) {
                this.loaderModal('show');
                this.$store.dispatch('getOrder/' + ADD_ORDER_ACTION, this.addOrder).then(() => {
                    this.loaderModal('hide');
                    if (Object.keys(_this.getErrors).length==0) {
                        this.$router.push({ name: 'getOrders' });
                    }
                });
            }
        }
    }
}
</script>