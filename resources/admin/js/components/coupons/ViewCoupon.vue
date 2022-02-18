<template>
    <div id="content" class="flex">
        <div class="page-container">
            <div class="pt-3 pr-3 pb-5 pl-3">
                <div class="mb-5">
                    <h2 class="dv_page_heading">Coupon Detail </h2>
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
                                                <input type="text" v-model="saveCoupon.title" :class="status($v.saveCoupon.title)" @input="setValue($event)" name="title" class="form-control dv_common_input_for_all" placeholder="Enter">
                                            </div>                                                    
                                        </div>                                                
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize d-block" for="name">Coupon Code <span class="dv_generate_coupon_code" @click="randomString(5)">generate random</span> </label>
                                                <input type="text" v-model="saveCoupon.code" :class="status($v.saveCoupon.code)" @input="setValue($event)" name="code" class="form-control dv_common_input_for_all" placeholder="Enter">
                                            </div>                                                    
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize" for="name">Start Date </label>
                                                <input type="date" class="form-control dv_common_input_for_all dvdatepicker" :class="status($v.saveCoupon.start_date)" @input="setValue($event)" name="start_date" placeholder="Select" v-model="saveCoupon.start_date">
                                            </div>                                                    
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize" for="name">End Date </label>
                                                <input type="date" class="form-control dv_common_input_for_all dvdatepicker" :class="status($v.saveCoupon.end_date)" @input="setValue($event)" name="end_date" placeholder="Select" v-model="saveCoupon.end_date">
                                            </div>                                                    
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize" for="name">Coupon Discount Type </label>
                                                <select v-model="saveCoupon.discount_type" :class="status($v.saveCoupon.discount_type)" @input="setValue($event)" name="discount_type" class="form-control dv_common_select_for_all">
                                                    <option value="">Select </option>
                                                    <option value="PERCENTAGE_BASED">Percentage Based</option>
                                                    <option value="FIXED_PRICE_BASED">Fixed Price Based</option>
                                                </select>
                                            </div>                                                    
                                        </div>
                                        <div class="col-md-4" v-if="saveCoupon.discount_type">
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize" for="name">Discount</label>
                                                <div class="input-group mb-3">
                                                    <input v-model="saveCoupon.discount" :class="status($v.saveCoupon.discount)" @input="setValue($event)" name="discount" type="number" class="form-control dv_common_input_for_all" placeholder="Enter">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text" id="basic-addon1">{{ discount_types[saveCoupon.discount_type] }}</span>
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
                                                <input type="number" v-model="saveCoupon.accessibility" class="form-control dv_common_input_for_all" placeholder="Enter">
                                            </div>                                                    
                                        </div>
                                    </div>
                                    <div class="form-group mb-0">
                                        <label class="ui-switch ui-switch-md info m-t-xs float-left mr-3"><input checked="" v-model="saveCoupon.status" type="checkbox"> <i></i></label>
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
                                                <select v-model="saveCoupon.coupon_condition" :class="status($v.saveCoupon.coupon_condition)" @input="setValue($event)" name="coupon_condition" class="form-control dv_common_select_for_all">
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
                                                    <input v-model="saveCoupon.condition_amount" :class="status($v.saveCoupon.condition_amount)" @input="setValue($event)" name="condition_amount" type="text" class="form-control dv_common_input_for_all" placeholder="Enter">
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
                            <button type="button" class="btn btn-default dv_save_submit_btn" @click="updateCoupon">update </button>
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
import { required } from 'vuelidate/lib/validators';
import { deleteEmptyKeys } from "../../mixins";
import { GET_COUPON_ACTION, UPDATE_COUPON_ACTION  } from '@admin/store/coupons/actions'
import Multiselect from 'vue-multiselect'
export default {
    components: { Multiselect },
    data() {
        return {
            baseUrl:Vue.config.baseUrl,
            baseUrlImage: Vue.config.baseUrlImage,
            selected_accessibility: 1,
            saveCoupon: {
                coupon_id: '',
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
                sub_category_ids: '',
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
        saveCoupon: { 
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
            getCoupon: state => state.getCoupon.getCoupon,
        })
    },
    mounted() {
        this.getCouponDetail();
    },
    methods: {
        onMultiSelect(name) {
            this.saveCoupon[name] = JSON.stringify(this[name].map(data => data.code));
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
            this.saveCoupon[event.target.name] = event.target.value;
            this.$v.saveCoupon[event.target.name].$touch();
        },
        getCouponDetail: function() {
            this.$store.dispatch('getCoupon/' + GET_COUPON_ACTION, this.$route.params.coupon_id).then(() => {
                this.saveCoupon.coupon_id = this.getCoupon.coupon.id;
                this.saveCoupon.title = this.getCoupon.coupon.title;
                this.saveCoupon.start_date = this.getCoupon.coupon.start_date;
                this.saveCoupon.end_date = this.getCoupon.coupon.end_date;
                this.saveCoupon.code = this.getCoupon.coupon.code;
                this.saveCoupon.discount_type = this.getCoupon.coupon.discount_type;
                this.saveCoupon.discount = this.getCoupon.coupon.discount;
                this.selected_accessibility = !['1','N'].includes(this.getCoupon.coupon.accessibility) ? 0 : this.getCoupon.coupon.accessibility;
                this.saveCoupon.accessibility = this.getCoupon.coupon.accessibility;
                this.saveCoupon.coupon_condition = this.getCoupon.coupon.coupon_condition;
                this.saveCoupon.condition_amount = this.getCoupon.coupon.condition_amount;
                this.saveCoupon.category_ids = this.getCoupon.coupon.category_ids;
                this.saveCoupon.brand_ids = this.getCoupon.coupon.brand_ids;
                this.saveCoupon.product_ids = this.getCoupon.coupon.product_ids;

                if (this.getCoupon.coupon.category_ids) {
                    JSON.parse(this.getCoupon.coupon.category_ids).forEach(id => {
                        let category = this.getCoupon.categories.find(category => category.id == id);
                        if (category!=null) {
                            this.category_ids.push({
                                name: category['name'],
                                code: id
                            });
                        }
                    });
                }

                if (this.getCoupon.coupon.sub_category_ids) {
                    JSON.parse(this.getCoupon.coupon.sub_category_ids).forEach(id => {
                        let sub_category = this.getCoupon.sub_categories.find(sub_category => sub_category.id == id);
                        if (sub_category!=null) {
                            this.sub_category_ids.push({
                                name: sub_category['name'],
                                code: id
                            });
                        }
                    });
                }

                if (this.getCoupon.coupon.brand_ids) {
                    JSON.parse(this.getCoupon.coupon.brand_ids).forEach(id => {
                        let brand = this.getCoupon.brands.find(brand => brand.id == id);
                        if (brand!=null) {
                            this.brand_ids.push({
                                name: brand['name'],
                                code: id
                            });
                        }
                    });
                }

                if (this.getCoupon.coupon.product_ids) {
                    JSON.parse(this.getCoupon.coupon.product_ids).forEach(id => {
                        let product = this.getCoupon.products.find(product => product.id == id);
                        if (product!=null) {
                            this.product_ids.push({
                                name: product['name'],
                                code: id
                            });
                        }
                    });
                }

                if (this.getCoupon.coupon.customer_ids) {
                    JSON.parse(this.getCoupon.coupon.customer_ids).forEach(id => {
                        let customer = this.getCoupon.customers.find(customer => customer.id == id);
                        if (customer!=null) {
                            this.customer_ids.push({
                                name: customer['name'],
                                code: id
                            });
                        }
                    });
                }

                this.getCoupon.categories.forEach(category => this.lists.categories.push({ name: category.name, code: category.id }));
                this.getCoupon.sub_categories.forEach(sub_category => this.lists.sub_categories.push({ name: sub_category.name, code: sub_category.id }));
                this.getCoupon.brands.forEach(brand => this.lists.brands.push({ name: brand.name, code: brand.id }));
                this.getCoupon.products.forEach(product => this.lists.products.push({ name: product.name, code: product.id }));
                this.getCoupon.customers.forEach(customer => this.lists.customers.push({ name: customer.name, code: customer.id }));
            })
        },
        updateCoupon: function () {
            if (this.selected_accessibility!=0) {
                this.saveCoupon.accessibility = this.selected_accessibility;
            }
            let _this = this;
            _this.$v.saveCoupon.$touch();
            let params = deleteEmptyKeys(this.saveCoupon);
            if (!_this.$v.saveCoupon.$invalid) {
                this.loaderModal('show');
                this.$store.dispatch('getCoupon/' + UPDATE_COUPON_ACTION, params).then(() => {
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
            this.saveCoupon.code = text;
		}
    }
}
</script>
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>