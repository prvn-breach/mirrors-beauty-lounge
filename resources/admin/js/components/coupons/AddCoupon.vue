<template>
    <div id="content" class="flex">
        <div class="page-container">
            <div class="pt-3 pr-3 pb-5 pl-3">
                <div class="mb-5">
                    <h2 class="dv_page_heading">Add Coupon </h2>
                    <div class="row dv_search_delete_action_common"></div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card mb-3">
                                <div class="card-header"><strong>Basic Details</strong></div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize" for="name">Coupon Title</label>
                                                <input type="text" v-model="addCoupon.title" :class="status($v.addCoupon.title)" @input="setValue($event)" name="title" class="form-control dv_common_input_for_all" placeholder="Enter">
                                            </div>                                                    
                                        </div>                                                
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize d-block" for="name">Coupon Code <span class="dv_generate_coupon_code" @click="randomString(5)">generate random</span> </label>
                                                <input type="text" v-model="addCoupon.code" :class="status($v.addCoupon.code)" @input="setValue($event)" name="code" class="form-control dv_common_input_for_all" placeholder="Enter">
                                            </div>                                                    
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize" for="name">Start Date </label>
                                                <input type="date" class="form-control dv_common_input_for_all dvdatepicker" :class="status($v.addCoupon.start_date)" @input="setValue($event)" name="start_date" placeholder="Select" v-model="addCoupon.start_date">
                                            </div>                                                    
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize" for="name">End Date </label>
                                                <input type="date" class="form-control dv_common_input_for_all dvdatepicker" :class="status($v.addCoupon.end_date)" @input="setValue($event)" name="end_date" placeholder="Select" v-model="addCoupon.end_date">
                                            </div>                                                    
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize" for="name">Coupon Discount Type </label>
                                                <select v-model="addCoupon.discount_type" :class="status($v.addCoupon.discount_type)" @input="setValue($event)" name="discount_type" class="form-control dv_common_select_for_all">
                                                    <option value="">Select </option>
                                                    <option value="PERCENTAGE_BASED">Percentage Based</option>
                                                    <option value="FIXED_PRICE_BASED">Fixed Price Based</option>
                                                </select>
                                            </div>                                                    
                                        </div>
                                        <div class="col-md-4" v-if="addCoupon.discount_type">
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize" for="name">Discount</label>
                                                <div class="input-group mb-3">
                                                    <input v-model="addCoupon.discount" :class="status($v.addCoupon.discount)" @input="setValue($event)" name="discount" type="number" class="form-control dv_common_input_for_all" placeholder="Enter">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text" id="basic-addon1">{{ discount_types[addCoupon.discount_type] }}</span>
                                                    </div>
                                                </div>
                                            </div>                                                    
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize" for="name">Coupon Accessibility </label>
                                                <select v-model="selected_accessibility" class="form-control dv_common_select_for_all">
                                                    <option value="1">Single Use</option>
                                                    <option value="N">N times</option>
                                                    <option value="0">Custom Counts</option>
                                                </select>
                                            </div>                                                    
                                        </div>
                                        <div class="col-md-1" v-if="selected_accessibility == '0'">
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize" for="name">Count </label>
                                                <input type="number" v-model="addCoupon.accessibility" class="form-control dv_common_input_for_all" placeholder="Enter">
                                            </div>                                                    
                                        </div>
                                    </div>
                                    <div class="form-group mb-0">
                                        <label class="ui-switch ui-switch-md info m-t-xs float-left mr-3"><input checked="" v-model="addCoupon.status" type="checkbox"> <i></i></label>
                                        <label class="text-muted text-capitalize" for="name">Coupon status </label>
                                    </div>
                                </div>
                            </div>
                            <div class="card mb-3">
                                <div class="card-header"><strong>Coupon Condition</strong></div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize" for="name">Condition </label>
                                                <select v-model="addCoupon.coupon_condition" :class="status($v.addCoupon.coupon_condition)" @input="setValue($event)" name="coupon_condition" class="form-control dv_common_select_for_all">
                                                    <option value="">Select </option>
                                                    <option value="=">Equal </option>
                                                    <option value="!=">Not Equal </option>
                                                    <option value=">=">Equal or Less </option>
                                                    <option value="<=">Equal or Greater </option>
                                                    <option value=">">Less</option>
                                                    <option value="<">Greater </option>
                                                </select>
                                            </div>                                                    
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize" for="name">Condition Amount </label>
                                                <div class="input-group mb-3">
                                                    <input v-model="addCoupon.condition_amount" :class="status($v.addCoupon.condition_amount)" @input="setValue($event)" name="condition_amount" type="text" class="form-control dv_common_input_for_all" placeholder="Enter">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text" id="basic-addon1">AED</span>
                                                    </div>
                                                </div>
                                            </div>                                                    
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card mb-3">
                                <div class="card-header"><strong>Coupon Valid on</strong></div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize">Category</label>
                                                <multiselect @input="onMultiSelect('category_ids')" :close-on-select="false" v-model="category_ids" tag-placeholder="Add this as new tag" placeholder="Search" label="name" track-by="code" :options="lists.categories" :multiple="true" :taggable="true"></multiselect>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize">Sub Category</label>
                                                <multiselect @input="onMultiSelect('sub_category_ids')" :close-on-select="false" v-model="sub_category_ids" tag-placeholder="Add this as new tag" placeholder="Search" label="name" track-by="code" :options="lists.sub_categories" :multiple="true" :taggable="true"></multiselect>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize">Brands</label>
                                                <multiselect @input="onMultiSelect('brand_ids')" :close-on-select="false" v-model="brand_ids" tag-placeholder="Add this as new tag" placeholder="Search" label="name" track-by="code" :options="lists.brands" :multiple="true" :taggable="true"></multiselect>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize">Products</label>
                                                <multiselect @input="onMultiSelect('product_ids')" :close-on-select="false" v-model="product_ids" tag-placeholder="Add this as new tag" placeholder="Search" label="name" track-by="code" :options="lists.products" :multiple="true" :taggable="true"></multiselect>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize">Customers</label>
                                                <multiselect @input="onMultiSelect('customer_ids')" :close-on-select="false" v-model="customer_ids" tag-placeholder="Add this as new tag" placeholder="Search" label="name" track-by="code" :options="lists.customers" :multiple="true" :taggable="true"></multiselect>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 text-center">
                            <button type="button" class="btn btn-default text-muted dv_cancel_submit_btn" @click="$router.push({ name: 'getCoupons' });">cancel</button>
                            <button type="button" class="btn btn-default dv_save_submit_btn" @click="saveCoupon">save </button>
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
import { required } from 'vuelidate/lib/validators';
import { deleteEmptyKeys } from "../../mixins";
import { GET_COUPON_ACTION, CREATE_COUPON_ACTION  } from '@admin/store/coupons/actions'
import { LOAD_BRAND_LIST_ACTION } from '@admin/store/brands/actions'
import { GET_CUSTOMERS_ACTION } from '@admin/store/customers/actions';
import { LOAD_PRODUCTS_LIST_ACTION } from '@admin/store/products/actions'
import { GET_CATEGORIES_ACTION } from '@admin/store/categories/actions'
import { GET_SUBCATEGORIES_ACTION } from '@admin/store/sub-categories/actions'
import Multiselect from 'vue-multiselect'
export default {
    components: { Multiselect },
    data() {
        return {
            baseUrl:Vue.config.baseUrl,
            baseUrlImage: Vue.config.baseUrlImage,
            selected_accessibility: 1,
            addCoupon: {
                title: '',
                code: '',
                start_date: '',
                end_date: '',
                discount_type: '',
                discount: '',
                accessibility: '',
                status: true,
                coupon_condition: '',
                condition_amount: '',
                category_ids: '',
                brand_ids: '',
                product_ids: '',
                customer_ids: ''
            },
            discount_types: {
                PERCENTAGE_BASED: '%',
                FIXED_PRICE_BASED: 'AED',
            },
            category_ids: [],
            sub_category_ids: [],
            brand_ids: [],
            product_ids: [],
            customer_ids: [],
            lists: {
                categories: [],
                sub_categories: [],
                brands: [],
                products: [],
                customers: []
            }
        }
    },
    validations: {
        addCoupon: { 
            title: { required },
            code: { required },
            start_date: { required },
            end_date: { required },
            discount_type: { required },
            discount: { required },
            accessibility: { required },
            coupon_condition: { required },
            condition_amount: { required }
        }
    },
    computed:{
        ...mapState({
            getCategories: state => state.getCategory.getCategories,
            getSubCategories: state => state.getSubCategory.getSubCategories,
            getProducts: state => state.getProduct.getProducts,
            getBrands: state => state.getBrand.getBrands,
            getCustomers: state => state.getCustomer.getCustomers,
        })
    },
    mounted() {
        this.getCategoriesList();
        this.getSubCategoriesList();
        this.getProductsList();
        this.getBrandsList();
        this.getCustomersList();
    },
    methods: {
        onMultiSelect(name) {
            this.addCoupon[name] = JSON.stringify(this[name].map(data => data.code));
        },
        status: function(validation) {
            if(validation != undefined){
                return {
                    error: validation.$error,
                    dirty: validation.$dirty
                }
            }
        },
        setValue: function(event) {
            this.addCoupon[event.target.name] = event.target.value;
            this.$v.addCoupon[event.target.name].$touch();
        },
        getCategoriesList: function() {
            this.$store.dispatch('getCategory/' + GET_CATEGORIES_ACTION).then(() => {
                this.getCategories.forEach(category => this.lists.categories.push({ name: category.name, code: category.id }));
            });
        },
        getSubCategoriesList: function() {
            this.$store.dispatch('getSubCategory/' + GET_SUBCATEGORIES_ACTION).then(() => {
                this.getSubCategories.forEach(sub_category => this.lists.sub_categories.push({ name: sub_category.name, code: sub_category.id }));
            });
        },
        getBrandsList: function() {
            this.$store.dispatch('getBrand/' + LOAD_BRAND_LIST_ACTION, {
                params: {
                    perPage: 'all',
                    status: 'A'
                }
            }).then(() => {
                this.getBrands.forEach(brand => this.lists.brands.push({ name: brand.name, code: brand.id }));
            })
        },
        getProductsList: function() {
            this.$store.dispatch('getProduct/' + LOAD_PRODUCTS_LIST_ACTION, {
                params: {
                    perPage: 'all'
                }
            }).then(() => {
                this.getProducts.forEach(product => this.lists.products.push({ name: product.name, code: product.id }));
            });
        },
        getCustomersList: function() {
            this.$store.dispatch('getCustomer/' + GET_CUSTOMERS_ACTION, {
                params: {
                    perPage: 'all'
                }
            }).then(() => {
                this.getCustomers.forEach(customer => this.lists.customers.push({ name: customer.name, code: customer.id }));
            });
        },
        getCouponDetail: function() {
            this.$store.dispatch('getCoupon/' + GET_COUPON_ACTION).then(() => {
                this.getCoupon.categories.forEach(category => this.lists.categories.push({ name: category.name, code: category.id }));
                this.getCoupon.sub_categories.forEach(sub_category => this.lists.sub_categories.push({ name: sub_category.name, code: sub_category.id }));
                this.getCoupon.brands.forEach(brand => this.lists.brands.push({ name: brand.name, code: brand.id }));
                this.getCoupon.products.forEach(product => this.lists.products.push({ name: product.name, code: product.id }));
            });
        },
        saveCoupon: function () {
            if (this.selected_accessibility!=0) {
                this.addCoupon.accessibility = this.selected_accessibility;
            }
            let _this = this;
            _this.$v.addCoupon.$touch();
            let params = deleteEmptyKeys(this.addCoupon);
            if (!_this.$v.addCoupon.$invalid) {
                this.loaderModal('show');
                params['created_by'] = this.$admin['id'];
                this.$store.dispatch('getCoupon/' + CREATE_COUPON_ACTION, params).then(() => {
                    this.loaderModal('hide');
                    this.$router.push({ name: 'getCoupons' });
                });
            }
        },
        randomString(len) {
            let text = " "
            let chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
            for( let i=0; i < len; i++ ) {
                text += chars.charAt(Math.floor(Math.random() * chars.length))
            }
            this.addCoupon.code = text;
		}
    }
}
</script>
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>