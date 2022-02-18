<template>
    <div id="content" class="flex">
        <div class="page-container">
            <div class="pt-3 pr-3 pb-5 pl-3">
                <div class="mb-5">
                    <h2 class="dv_page_heading"><svg data-toggle="tooltip" data-placement="top" title="" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="dv_back_to_page_svg" data-original-title="Go back"><polyline points="15 18 9 12 15 6"></polyline></svg> Add New Expense </h2>
                    <div class="row dv_search_delete_action_common"></div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card mb-3">
                                <div class="card-header"><strong>Expense Details</strong></div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize" for="name">From Date </label>
                                                <input type="date" v-model="addSemExpense.from_date" :class="status($v.addSemExpense.from_date)" @input="setValue($event)" name="from_date" class="form-control dv_common_input_for_all" placeholder="Enter">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize" for="name">To Date </label>
                                                <input type="date" v-model="addSemExpense.to_date" :class="status($v.addSemExpense.to_date)" @input="setValue($event)" name="to_date" class="form-control dv_common_input_for_all" placeholder="Enter">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize" for="name">Amount </label>
                                                <input type="number" v-model="addSemExpense.amount" :class="status($v.addSemExpense.amount)" @input="setValue($event)" name="amount" class="form-control dv_common_input_for_all" placeholder="Enter">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize" for="name">Type </label>
                                                <select v-model="addSemExpense.type" :class="status($v.addSemExpense.type)" @input="setValue($event)" name="type" class="form-control dv_common_select_for_all">
                                                    <option value="">Select</option>
                                                    <option value="category" >Category</option>
                                                    <option value="brand" >Brand</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4" v-if="addSemExpense.type == 'category'">
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize" for="name">Category </label>
                                                <select @change="typeIdChange" class="form-control dv_common_select_for_all">
                                                    <option value="">Select</option>
                                                    <option :value="category['id']" v-for="(category,index) in getCategories" :key="index">{{ category['name'] }}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4" v-if="addSemExpense.type == 'brand'">
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize" for="name">Brand </label>
                                                <select @change="typeIdChange" class="form-control dv_common_select_for_all">
                                                    <option value="">Select</option>
                                                    <option :value="brand['id']" v-for="(brand,index) in getBrands" :key="index">{{ brand['name'] }}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize" for="name">Comments </label>
                                                <textarea v-model="addSemExpense.comments" :class="status($v.addSemExpense.comments)" @input="setValue($event)" name="comments" class="form-control dv_common_textarea_for_all" rows="6" style="resize: none;" placeholder="Enter"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 text-center">
                            <button type="button" class="btn btn-default text-muted dv_cancel_submit_btn" @click="$router.push({ name: 'semSaleReport' });">back</button>
                            <button type="button" class="btn btn-default dv_save_submit_btn" @click="saveSemExpense">save </button>
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
import { LOAD_BRAND_LIST_ACTION } from '@admin/store/brands/actions';
import { GET_CATEGORIES_ACTION } from '@admin/store/categories/actions';
import { ADD_SEM_EXPENSE_ACTION } from '@admin/store/reports/actions';
export default {
    components: { },
    data() {
        return {
            baseUrl:Vue.config.baseUrl,
            baseUrlImage: Vue.config.baseUrlImage,
            addSemExpense: {
                from_date: '',
                to_date: '',
                amount: '',
                type: '',
                type_id: '',
                comments: ''
            }
        }
    },
    validations: {
        addSemExpense: {
            from_date: { required },
            to_date: { required },
            amount: { required },
            type: { required },
            comments: { required }
        }
    },
    computed:{
        ...mapState({
            getBrands: state => state.getBrand.getBrands,
            getCategories: state => state.getCategory.getCategories
        })
    },
    mounted() {
        this.getBrandsList();
        this.getCategoriesList();
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
            this.addSemExpense[event.target.name] = event.target.value;
            this.$v.addSemExpense[event.target.name].$touch();
        },
        getBrandsList: function(){
            let query = [];
            query['params'] = {
                perPage: 'all'
            };
            this.$store.dispatch('getBrand/' + LOAD_BRAND_LIST_ACTION, query);
        },
        getCategoriesList: function() {
            this.$store.dispatch('getCategory/' + GET_CATEGORIES_ACTION);
        },
        typeIdChange: function(event) {
            this.addSemExpense.type_id = event.target.value;
        },
        saveSemExpense: function() {
            let _this = this;
            _this.$v.addSemExpense.$touch();
            if (!_this.$v.addSemExpense.$invalid) {
                this.loaderModal('show');
                let params = deleteEmptyKeys(this.addSemExpense);
                this.$store.dispatch('getReport/' + ADD_SEM_EXPENSE_ACTION, params).then(() => {
                    this.loaderModal('hide');
                    this.$router.push({ name: 'semSaleReport' });
                });
            }
        }
    }
}
</script>