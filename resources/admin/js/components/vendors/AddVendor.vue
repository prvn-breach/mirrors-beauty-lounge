<template>
    <div id="content" class="flex">
        <div class="page-container">
            <div class="pt-3 pr-3 pb-5 pl-3">
                <div class="mb-5">
                    <h2 class="dv_page_heading">Add Vendor </h2>
                    <div class="row dv_search_delete_action_common"></div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card mb-3">
                                <div class="card-header"><strong>Basic Details</strong></div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label class="text-muted text-capitalize" for="name">Company </label>
                                        <input v-model="addVendor.company" :class="status($v.addVendor.company)" @input="setValue($event)" name="company" type="text" class="form-control dv_common_input_for_all" placeholder="Enter">
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="input-group mb-3">
                                                <label class="text-muted text-capitalize w-100 d-block" for="name">Website </label>
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon3">www</span>
                                                </div>
                                                <input v-model="addVendor.website" :class="status($v.addVendor.website)" @input="setValue($event)" name="website" type="text" class="form-control dv_common_input_for_all" placeholder="Enter">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize" for="name">email </label>
                                                <input v-model="addVendor.email" :class="status($v.addVendor.email)" @input="setValue($event)" name="email" type="text" class="form-control dv_common_input_for_all" placeholder="Enter">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="input-group mb-3">
                                                <label class="text-muted text-capitalize w-100 d-block" for="name">Phone No </label>
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon3">+91</span>
                                                </div>
                                                <input v-model="addVendor.phone_no" :class="status($v.addVendor.phone_no)" @input="setValue($event)" name="phone_no" type="number" class="form-control dv_common_input_for_all" placeholder="Enter">
                                            </div>                                                    
                                        </div>
                                        <div class="col-md-4">
                                            <div class="input-group mb-3">
                                                <label class="text-muted text-capitalize w-100 d-block" for="name">Alternative Number </label>
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon3">+91</span>
                                                </div>
                                                <input v-model="addVendor.alternate_phone_no" name="alternate_phone_no" type="number" class="form-control dv_common_input_for_all" placeholder="Enter">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize" for="name">Active status </label>
                                                <label class="ui-switch ui-switch-md info m-t-xs d-block">
                                                    <input v-model="addVendor.active_status" checked="" type="checkbox"> <i></i></label>
                                            </div>                                                    
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card mb-3">
                                <div class="card-header"><strong>Address Details</strong></div>
                                <div class="card-body">

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize" for="name">Address  </label>
                                                <textarea v-model="addVendor.address" :class="status($v.addVendor.address)" @input="setValue($event)" name="address" class="form-control dv_common_textarea_for_all" rows="6" style="resize: none;" placeholder="Enter"></textarea>
                                            </div>                                                    
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize" for="name">City </label>
                                                <input v-model="addVendor.city" :class="status($v.addVendor.city)" @input="setValue($event)" name="city" type="text" class="form-control dv_common_input_for_all" placeholder="Enter">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize" for="name">State </label>
                                                <input v-model="addVendor.state" :class="status($v.addVendor.state)" @input="setValue($event)" name="state" type="text" class="form-control dv_common_input_for_all" placeholder="Enter">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize" for="name">Country </label>
                                                <input v-model="addVendor.country" :class="status($v.addVendor.country)" @input="setValue($event)" name="country" type="text" class="form-control dv_common_input_for_all" placeholder="Enter">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize" for="name">Zip Code </label>
                                                <input v-model="addVendor.zip_code" :class="status($v.addVendor.zip_code)" @input="setValue($event)" name="zip_code" type="number" class="form-control dv_common_input_for_all" placeholder="Enter">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize" for="name">PO Box# </label>
                                                <input v-model="addVendor.po_box" type="text" class="form-control dv_common_input_for_all" placeholder="Enter">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize" for="name">Fax </label>
                                                <input v-model="addVendor.fax" type="text" class="form-control dv_common_input_for_all" placeholder="Enter">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card mb-3">
                                <div class="card-header"><strong>Email setup</strong></div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label class="text-muted text-capitalize" for="name">Year started </label>
                                        <input v-model="addVendor.year_started" type="text" class="form-control dv_common_input_for_all" placeholder="Enter">
                                    </div>
                                    <div class="form-group">
                                        <label class="text-muted text-capitalize" for="name">User Department Email </label>
                                        <input v-model="addVendor.user_department_email" type="text" class="form-control dv_common_input_for_all" placeholder="Enter">
                                    </div>
                                    <div class="form-group">
                                        <label class="text-muted text-capitalize" for="name">Site Administrator Email </label>
                                        <input v-model="addVendor.site_administrator_email" type="text" class="form-control dv_common_input_for_all" placeholder="Enter">
                                    </div>
                                    <div class="form-group">
                                        <label class="text-muted text-capitalize" for="name">Order Department Email </label>
                                        <input v-model="addVendor.order_department_email" type="text" class="form-control dv_common_input_for_all" placeholder="Enter">
                                    </div>
                                    <div class="form-group">
                                        <label class="text-muted text-capitalize" for="name">Help Support Email </label>
                                        <input v-model="addVendor.help_support_email" type="text" class="form-control dv_common_input_for_all" placeholder="Enter">
                                    </div>
                                </div>
                            </div>
                            <div class="card mb-3">
                                <div class="card-header"><strong>Brands</strong></div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label class="text-muted text-capitalize" for="name">Select Brands </label>
                                        <multiselect @input="onMultiSelect('brand_ids')" :close-on-select="false" v-model="brand_ids" tag-placeholder="Add this as new tag" placeholder="Search" label="name" track-by="code" :options="lists.brands" :multiple="true" :taggable="true"></multiselect>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 text-center">
                            <button type="button" class="btn btn-default text-muted dv_cancel_submit_btn" @click="$router.push({ name: 'getVendors' });">cancel</button>
                            <button type="button" class="btn btn-default dv_save_submit_btn" @click="saveVendor">save </button>
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
import { ADD_VENDOR_ACTION, GET_BRANDS_ACTION  } from '@admin/store/vendors/actions';
import Multiselect from 'vue-multiselect'
export default {
    components: { Multiselect },
    data() {
        return {
            baseUrl:Vue.config.baseUrl,
            baseUrlImage: Vue.config.baseUrlImage,
            addVendor: {
                company: '',
                website: '',
                email: '',
                phone_no: '',
                alternate_phone_no: '',
                active_status: true,
                address: '',
                city: '',
                state: '',
                zip_code: '',
                country: '',
                fax: '',
                po_box: '',
                year_started: '',
                user_deparment_email: '',
                side_administrator_email: '',
                order_department_email: '',
                help_support_email: '',
                brand_ids:''
            },
            brand_ids: [],
            lists: {
                brands: []
            }
        }
    },
    validations: {
        addVendor: {
            company: { required },
            website: { required },
            email: { required },
            phone_no: { required },
            address: { required },
            city: { required },
            state: { required },
            zip_code: { required },
            country: { required }
        }
    },
    computed:{
        ...mapState({
            getBrands: state => state.getVendor.getBrands,
        })
    },
    mounted() {
        this.getBrandsList();
    },
    methods: {
        onMultiSelect(name) {
            this.addVendor[name] = JSON.stringify(this[name].map(data => data.code));
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
            this.addVendor[event.target.name] = event.target.value;
            this.$v.addVendor[event.target.name].$touch();
        },
        getBrandsList: function() {
            let query = [];
            query['params'] = {
                page: 1,
                perPage: 'all',
                status: 'A'
            }
            this.$store.dispatch('getVendor/' + GET_BRANDS_ACTION, query).then(() => {
                this.getBrands.forEach(brand => this.lists.brands.push({ name: brand.name, code: brand.id }));
            });
        },
        saveVendor: function () {
            let _this = this;
            _this.$v.addVendor.$touch();
            let params = deleteEmptyKeys(this.addVendor);
            if (!_this.$v.addVendor.$invalid) {
                this.$store.dispatch('getVendor/' + ADD_VENDOR_ACTION, params).then(() => {
                    this.$router.push({ name: 'getVendors' });
                });
            }
        }
    }
}
</script>
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>