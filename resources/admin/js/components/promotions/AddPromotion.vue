<template>
    <div id="content" class="flex">
        <div class="page-container">
            <div class="pt-3 pr-3 pb-5 pl-3">
                <div class="mb-5">
                    <h2 class="dv_page_heading">Add Promotion </h2>
                    <div class="row dv_search_delete_action_common"></div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card mb-3">
                                <div class="card-header"><strong>Basic Details</strong></div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize" for="name">Promotion Name </label>
                                                <input v-model="addPromotion.promotion_name" :class="status($v.addPromotion.promotion_name)" @input="setValue($event)" name="promotion_name" type="text" class="form-control dv_common_input_for_all" placeholder="Enter">
                                            </div>                                                
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize" for="name">Short Description  </label>
                                                <input v-model="addPromotion.short_description" :class="status($v.addPromotion.short_description)" @input="setValue($event)" name="short_description" type="text" class="form-control dv_common_input_for_all" placeholder="Enter">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize" for="name">Start Date </label>
                                                <input v-model="addPromotion.start_date" :class="status($v.addPromotion.start_date)" @input="setValue($event)" name="start_date" type="date" class="form-control dv_common_input_for_all dvdatepicker" placeholder="Select">
                                            </div>                                                    
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize" for="name">End Date </label>
                                                <input v-model="addPromotion.end_date" :class="status($v.addPromotion.end_date)" @input="setValue($event)" name="end_date" type="date" class="form-control dv_common_input_for_all dvdatepicker" placeholder="Select">
                                            </div>                                                    
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize" for="name">Priority </label>
                                                <select v-model="addPromotion.priority" :class="status($v.addPromotion.priority)" @input="setValue($event)" name="priority" class="form-control dv_common_select_for_all">
                                                    <option value="">Select</option>
                                                    <option value="1" >Low</option>
                                                    <option value="2" >Medium</option>
                                                    <option value="3" >High</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-0">
                                                <label class="ui-switch ui-switch-md info m-t-xs float-left mr-3"><input checked="" v-model="addPromotion.status" type="checkbox"> <i></i></label>
                                                <label class="text-muted text-capitalize" for="name">Promotion status </label>
                                            </div>                                                    
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card mb-3">
                                <div class="card-header"><strong>Conditions </strong></div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <select v-model="addPromotion.conditions.type" @change="changeConditionType" class="form-control dv_common_select_for_all">
                                                    <option value="">Select</option>
                                                    <option :value="index" v-for="(condition_type, index) in condition_types" :key="index">{{ condition_type.label }}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3" v-if="addPromotion.conditions.type">
                                            <div class="form-group">
                                                <select v-model="addPromotion.conditions.logic" @change="changeLogic" class="form-control dv_common_select_for_all">
                                                    <option value="">Select</option>
                                                    <option :value="logic.value" v-for="(logic, index) in condition_logics[condition_types[addPromotion.conditions.type].condition]" :key="index">{{ logic.label }}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3" v-if="addPromotion.conditions.type">
                                            <div class="form-group" v-if="condition_types[addPromotion.conditions.type]['input_details']['choose'] == 'single'">
                                                <input v-model="addPromotion.conditions.value" type="number" class="form-control dv_common_input_for_all" name="" placeholder="Enter">
                                            </div>
                                            <button :disabled="!addPromotion.conditions.logic" v-else type="button" class="btn btn-default dv_connect_through_social w-100 pt-2 pb-2" data-toggle="modal" data-target="#openModal1" data-backdrop="static" data-keyboard="false">
                                                {{ condition_types[addPromotion.conditions.type]['input_details']['label'] }}
                                            </button>
                                        </div>
                                    </div>
                                    <div class="row ml-1 mb-3">
                                        <span v-for="(name,index) in preview_selections" :key="index" class="badge badge-secondary mr-2">{{ name }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="card mb-3">
                                <div class="card-header"><strong>Bonus </strong></div>
                                <div class="card-body">
                                    <div class="row mb-3 b-b" v-for="(data,index) in addPromotion.bonus" :key="index">
                                        <div class="col-md-3" v-if="data.item">
                                            <div class="form-group">    
                                                <input disabled v-model="data.item" type="text" class="form-control dv_common_input_for_all" name="" placeholder="Enter">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <select v-model="data.type" @change="changeBonusConditionType" class="form-control dv_common_select_for_all">
                                                    <option value="">Select</option>
                                                    <option :value="index" v-for="(condition_type, index) in bonus_condition_types" :key="index">{{ condition_type.label }}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3" v-if="data.type && bonus_condition_logics[bonus_condition_types[data.type].condition]">
                                            <div class="form-group">
                                                <select v-model="data.logic" class="form-control dv_common_select_for_all">
                                                    <option value="">Select</option>
                                                    <option :value="logic.value" v-for="(logic, index) in bonus_condition_logics[bonus_condition_types[data.type].condition]" :key="index">{{ logic.label }}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3" v-if="data.type">
                                            <div class="form-group" v-if="bonus_condition_types[data.type]['input_details']['choose'] == 'single'">
                                                <input v-model="data.value" type="number" class="form-control dv_common_input_for_all" name="" placeholder="Enter">
                                            </div>
                                            <!-- <button v-if="bonus_condition_types[data.type]['input_details']['choose'] == 'multiple'" type="button" class="btn btn-default dv_connect_through_social w-100 pt-2 pb-2" data-toggle="modal" data-target="#openModal2" data-backdrop="static" data-keyboard="false">
                                                {{ bonus_condition_types[data.type]['input_details']['label'] }}
                                            </button> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 text-center">
                            <button type="button" class="btn btn-default text-muted dv_cancel_submit_btn" @click="$router.push({ name: 'promotions' });">cancel</button>
                            <button type="button" class="btn btn-default dv_save_submit_btn" @click="savePromotion">save </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="openModal1" v-if="addPromotion.conditions.type">
            <div class="modal-dialog modal-lg">
                <div class="card">
                    <div class="card-header">
                        {{ condition_types[addPromotion.conditions.type]['input_details']['label'] }}
                        <button type="button" class="close float-right" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="card-body pt-0 pl-0 pr-0">
                            <!-- <div class="row pt-3 pl-3 pb-3 b-b">
                                <div class="col-md-8 col-sm-8 col-xs-8 col-8">
                                    <input type="text" class="form-control dv_common_search_for_all" name="" placeholder="Search">
                                </div>
                            </div> -->
                        <div class="table-responsive">
                            <table class="table table-theme table-row v-middle">
                                <thead>
                                    <tr>
                                        <th style="width: 5%;">
                                            <!-- <label class="ui-check m-0 ui-check-rounded ui-check-md"><input type="checkbox"> <i></i></label> -->
                                        </th>
                                        <th v-for="(column,index) in condition_types[addPromotion.conditions.type]['input_details']['columns']" :key="index" style="width: 20%;" class="text-muted sortable">{{ column }} </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(row,index) in condition_types[addPromotion.conditions.type]['input_details']['rows']" :key="index" class="v-middle">
                                        <td>
                                            <label class="ui-check m-0 ui-check-rounded ui-check-md"><input type="checkbox" @input="onSelectConditions($event, row['id'], row['name'])"> <i></i></label>
                                        </td>
                                        <td v-for="(column,index) in condition_types[addPromotion.conditions.type]['input_details']['db_columns']" :key="index">
                                            {{ row[column] }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-12 text-center">
                            <!-- <button type="button" class="btn btn-default text-muted dv_cancel_submit_btn mr-3" data-dismiss="modal">Cancel</button> -->
                            <button type="button" class="btn btn-default dv_save_submit_btn" data-dismiss="modal">Save </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="openModal2" v-if="addPromotion.bonus.type">
            <div class="modal-dialog modal-lg">
                <div class="card">
                    <div class="card-header">
                        {{ bonus_condition_types[addPromotion.bonus.type]['input_details']['label'] }}
                        <button type="button" class="close float-right" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="card-body pt-0 pl-0 pr-0">
                        <div class="row pt-3 pl-3 pb-3 b-b">
                            <div class="col-md-8 col-sm-8 col-xs-8 col-8">
                                <input type="text" class="form-control dv_common_search_for_all" name="" placeholder="Search">
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-theme table-row v-middle">
                                <thead>
                                    <tr>
                                        <th style="width: 5%;">
                                            <!-- <label class="ui-check m-0 ui-check-rounded ui-check-md"><input type="checkbox"> <i></i></label> -->
                                        </th>
                                        <th v-for="(column,index) in bonus_condition_types[addPromotion.bonus.type]['input_details']['columns']" :key="index" style="width: 20%;" class="text-muted sortable">{{ column }} </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(row,index) in bonus_condition_types[addPromotion.bonus.type]['input_details']['rows']" :key="index" class="v-middle">
                                        <td>
                                            <label class="ui-check m-0 ui-check-rounded ui-check-md"><input type="checkbox" @input="onSelectBonus($event, row['id'])"> <i></i></label>
                                        </td>
                                        <td v-for="(column,index) in bonus_condition_types[addPromotion.bonus.type]['input_details']['db_columns']" :key="index">
                                            {{ row[column] }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-12 text-center">
                            <!-- <button type="button" class="btn btn-default text-muted dv_cancel_submit_btn mr-3" data-dismiss="modal">Cancel</button> -->
                            <button type="button" class="btn btn-default dv_save_submit_btn" data-dismiss="modal">Save </button>
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
import { GET_CATEGORIES_ACTION } from '@admin/store/categories/actions';
import { GET_SUBCATEGORIES_ACTION } from '@admin/store/sub-categories/actions';
import { LOAD_PRODUCTS_LIST_ACTION } from '@admin/store/products/actions';
import { GET_CUSTOMERS_ACTION } from '@admin/store/customers/actions';
import { GET_NEWSLETTERS_ACTION } from '@admin/store/newsletters/actions';
import { ADD_PROMOTION_ACTION } from '@admin/store/promotions/actions';
export default {
    components: { },
    data() {
        return {
            baseUrl:Vue.config.baseUrl,
            baseUrlImage: Vue.config.baseUrlImage,
            preview_selections: [],
            addPromotion: {
                promotion_name: '',
                short_description: '',
                start_date: '',
                end_date: '',
                priority: '',
                status: true,
                conditions: {
                    type: '',
                    logic: '',
                    value: []
                },
                bonus: []
            },
            condition_types: {
                products_price: { 
                    label: 'Products Price', 
                    value: 'products_price', 
                    condition: 'condition1',
                    input_details: {
                        choose: 'single'
                    }
                },
                categories: {
                    label: 'Categories', 
                    value: 'categories', 
                    condition: 'condition2',
                    state: 'getCategories', 
                    input_details: {
                        choose: 'multiple',
                        label: 'Add/Remove',
                        db_columns: [ 'id', 'name' ],
                        columns: [ 'Category ID', 'Category Name' ],
                        rows: []
                    } 
                },
                sub_categories: {
                    label: 'Sub Categories', 
                    value: 'sub_categories', 
                    condition: 'condition2',
                    state: 'getSubCategories', 
                    input_details: {
                        choose: 'multiple',
                        label: 'Add/Remove',
                        db_columns: [ 'id', 'name' ],
                        columns: [ 'Sub Category ID', 'Sub Category Name' ],
                        rows: []
                    } 
                },
                products: {
                    label: 'Products', 
                    value: 'products', 
                    condition: 'condition2', 
                    state: 'getProducts',
                    input_details: {
                        choose: 'multiple',
                        label: 'Add/Remove',
                        db_columns: [ 'id', 'name' ],
                        columns: [ 'Product ID', 'Product Name' ],
                        rows: []
                    }  
                },
                users: { 
                    label: 'Users', 
                    value: 'users', 
                    condition: 'condition2',
                    state: 'getCustomers',
                    input_details: {
                        choose: 'multiple',
                        label: 'Add/Remove',
                        db_columns: [ 'id', 'name' ],
                        columns: [ 'User ID', 'User Name' ],
                        rows: []
                    } 
                },
                // customers_subscribed: { 
                //     label: 'Customers Subscribed', 
                //     value: 'customers_subscribed', 
                //     condition: 'condition2', 
                //     input_details: {
                //         choose: 'multiple',
                //         label: 'Add Customers Subscribed',
                //         db_columns: [ 'id', 'email' ],
                //         columns: [ 'Subscriber ID', 'Subscriber Email' ],
                //         rows: []
                //     } 
                // }
            },
            condition_logics: {
                condition1: [
                    { label: 'Equal', value: '==' },
                    { label: 'Not Equal', value: '!=' },
                    { label: 'Equal or Less', value: '>=' },
                    { label: 'Equal or Greater', value: '<=' },
                    { label: 'Less', value: '>' },
                    { label: 'Greater', value: '<' }
                ],
                condition2: [
                    { label: 'In', value: '==' },
                    { label: 'Not In', value: '!=' },
                ]
            },
            bonus_condition_types: {
                product_discount: {
                    label: 'Product Discount',
                    value: 'product_discount',
                    condition: 'condition1',
                    input_details: {
                        choose: 'single'
                    } 
                },
                order_discount: {
                    label: 'Order Discount',
                    value: 'order_discount',
                    condition: 'condition1',
                    input_details: {
                        choose: 'single'
                    }
                },
                free_shipping: {
                    label: 'Free Shipping',
                    value: 'free_shipping',
                    condition: '',
                    input_details: {
                        choose: ''
                    } 
                },
                free_product: {
                    label: 'Free Product',
                    value: 'free_product',
                    condition: '',
                    input_details: {
                        choose: '',
                    } 
                }
            },
            bonus_condition_logics: {
                condition1: [
                    {
                        label: 'to percentage of the original price',
                        value: 'to_percentage_of_the_original_price'
                    },
                    {
                        label: 'to fixed amount',
                        value: 'to_fixed_amount'
                    }
                ],
                condition2: [
                    {
                        label: 'Mirrors Delivery',
                        value: 'mirrors_delivery'
                    }
                ]
            }
        }
    },
    validations: {
        addPromotion: {
            promotion_name: { required },
            short_description: { required },
            start_date: { required },
            end_date: { required },
            priority: { required }
        }
    },
    computed:{
        ...mapState({
            getCategories: state => state.getCategory.getCategories,
            getSubCategories: state => state.getSubCategory.getSubCategories,
            getProducts: state => state.getProduct.getProducts,
            getCustomers: state => state.getCustomer.getCustomers,
            getCustomersSubscribed: state => state.getNewsLetter.getNewsLetters,
        })
    },
    mounted() {
        this.getSubCategoriesList();
        this.getCategoriesList();
        this.getProductsList();
        this.getCustomersList();
        // this.getCustomersSubscribedList();
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
            this.addPromotion[event.target.name] = event.target.value;
            this.$v.addPromotion[event.target.name].$touch();
        },
        onSelectConditions: function(event, id, name) {
            if (event.target.checked){
                this.preview_selections.push(name);
                this.addPromotion.conditions.value.push(id);
                if (this.addPromotion.conditions.logic == '==') {
                    this.addPromotion.bonus.push({ id, item: name, type: '', logic: '',  value: '' });
                }
            } else {
                this.preview_selections = this.preview_selections.filter(data => data!=name);
                this.addPromotion.conditions.value = this.addPromotion.conditions.value.filter(value => value!=id);
                if (this.addPromotion.conditions.logic == '==') {
                    this.addPromotion.bonus = this.addPromotion.bonus.filter(data => data.id!=id);
                }
            }

            // if (this.addPromotion.conditions.logic == 'NotIn') {
            //     this.addPromotion.bonus = [];
            //     this.getProducts.forEach(product => {
            //         this.addPromotion.bonus.push({ item: product.name, type: '', logic: '',  value: '' });
            //     });
            //     this.addPromotion.conditions.value.forEach(id => {
            //         this.addPromotion.bonus = this.addPromotion.bonus.filter(product => product.id!=id);
            //     });
            // }
        },
        onSelectBonus: function(event, id) {
            if (event.target.checked){
                this.addPromotion.bonus.value.push(id); 
            } else {
                this.addPromotion.bonus.value = this.addPromotion.bonus.value.filter(value => value!=id);
            }
        },
        changeLogic: function(event) {
            if (this.addPromotion.conditions.type == 'products_price') {
                return false;
            }
            this.addPromotion.bonus = [];
            let state = this.condition_types[this.addPromotion.conditions.type]['state'];
            if (event.target.value == '==') {
                this.addPromotion.conditions.value.forEach(id => {
                    let obj = this[state].find(data => data.id == id);
                    if (obj) {
                        this.addPromotion.bonus.push({ id, item: obj['name'], type: '', logic: '',  value: '' });
                    }
                });
            }

            if (event.target.value == '!=') {
                this.addPromotion.bonus.push({ item: '', type: '', logic: '', value: '' });
            }
        },
        changeConditionType: function(event) {
            this.preview_selections = [];
            this.addPromotion.conditions.logic = '';
            this.addPromotion.conditions.value = [];
            if (event.target.value == 'products_price') {
                this.addPromotion.bonus = [ { item: '', type: '', logic: '',  value: '' } ];
            } else {
                this.addPromotion.bonus = [];
            }
        },
        changeBonusConditionType: function() {
            this.addPromotion.bonus.logic = '';
            this.addPromotion.bonus.value = [];
        },
        getCategoriesList: function() {
            this.$store.dispatch('getCategory/' + GET_CATEGORIES_ACTION).then(() => {
                this.getCategories.forEach(category => {
                    let row = {};
                    this.condition_types.categories.input_details.db_columns.forEach(column => {
                        row[column] = category[column];
                    });
                    this.condition_types.categories.input_details.rows.push(row);
                });
            });
        },
        getSubCategoriesList: function() {
            this.$store.dispatch('getSubCategory/' + GET_SUBCATEGORIES_ACTION).then(() => {
                this.getSubCategories.forEach(sub_category => {
                    let row = {};
                    this.condition_types.sub_categories.input_details.db_columns.forEach(column => {
                        row[column] = sub_category[column];
                    });
                    this.condition_types.sub_categories.input_details.rows.push(row);
                });
            });
        },
        getProductsList: function() {
            this.$store.dispatch('getProduct/' + LOAD_PRODUCTS_LIST_ACTION, {
                params: {
                    perPage: 'all'
                }
            }).then(() => {
                this.getProducts.forEach(product => {
                    let row1 = {};
                    this.condition_types.products.input_details.db_columns.forEach(column => { 
                        row1[column] = product[column];
                    });
                    this.condition_types.products.input_details.rows.push(row1);
                    // let row2 = {};
                    // this.bonus_condition_types.free_product.input_details.db_columns.forEach(column => { row2[column] = product[column] });
                    // this.bonus_condition_types.free_product.input_details.rows.push(row2);
                });
            });
        },
        getCustomersList: function() {
            this.$store.dispatch('getCustomer/' + GET_CUSTOMERS_ACTION, {
                params: {
                    perPage: 'all'
                }
            }).then(() => {
                this.getCustomers.forEach(customer => {
                    let row = {};
                    this.condition_types.users.input_details.db_columns.forEach(column => {
                        row[column] = customer[column];
                    });
                    this.condition_types.users.input_details.rows.push(row);
                });
            });
        },
        getCustomersSubscribedList: function() {
            this.$store.dispatch('getNewsLetter/' + GET_NEWSLETTERS_ACTION, {
                params: {
                    perPage: 'all'
                }
            }).then(() => {
                this.getCustomersSubscribed.forEach(customer => {
                    let row = {};
                    this.condition_types.customers_subscribed.input_details.db_columns.forEach(column => {
                        row[column] = customer[column];
                    });
                    this.condition_types.customers_subscribed.input_details.rows.push(row);
                });
            });
        },
        savePromotion: function() {
            let _this = this;
            _this.$v.addPromotion.$touch();
            if (!_this.$v.addPromotion.$invalid) {
                let params = deleteEmptyKeys(this.addPromotion);
                this.loaderModal('show');
                this.$store.dispatch('getPromotion/' + ADD_PROMOTION_ACTION, params).then(() => {
                    this.loaderModal('hide');
                    this.$router.push({ name: 'promotions' });
                }).catch(() => this.loaderModal('hide'));
            }
        }
    }
}
</script>