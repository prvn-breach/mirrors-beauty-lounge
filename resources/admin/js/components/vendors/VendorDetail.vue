<template>
    <div id="content" class="flex">
        <div class="page-container">
            <div class="pt-3 pr-3 pb-5 pl-3">
                <div class="mb-5">
                    <h2 class="dv_page_heading">Vendor Detail </h2>
                    <div class="row dv_search_delete_action_common"></div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card mb-3">
                                <div class="card-header"><strong>Basic Details</strong></div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label class="text-muted text-capitalize" for="name">Company </label>
                                        <input v-model="saveVendor.company" :class="status($v.saveVendor.company)" @input="setValue($event)" name="company" type="text" class="form-control dv_common_input_for_all" placeholder="Enter">
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="input-group mb-3">
                                                <label class="text-muted text-capitalize w-100 d-block" for="name">Website </label>
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon3">www</span>
                                                </div>
                                                <input v-model="saveVendor.website" :class="status($v.saveVendor.website)" @input="setValue($event)" name="website" type="text" class="form-control dv_common_input_for_all" placeholder="Enter">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize" for="name">email </label>
                                                <input v-model="saveVendor.email" :class="status($v.saveVendor.email)" @input="setValue($event)" name="email" type="text" class="form-control dv_common_input_for_all" placeholder="Enter">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="input-group mb-3">
                                                <label class="text-muted text-capitalize w-100 d-block" for="name">Phone No </label>
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon3">+91</span>
                                                </div>
                                                <input v-model="saveVendor.phone_no" :class="status($v.saveVendor.phone_no)" @input="setValue($event)" name="phone_no" type="number" class="form-control dv_common_input_for_all" placeholder="Enter">
                                            </div>                                                    
                                        </div>
                                        <div class="col-md-4">
                                            <div class="input-group mb-3">
                                                <label class="text-muted text-capitalize w-100 d-block" for="name">Alternative Number </label>
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon3">+91</span>
                                                </div>
                                                <input v-model="saveVendor.alternate_phone_no" name="alternate_phone_no" type="number" class="form-control dv_common_input_for_all" placeholder="Enter">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize" for="name">Active status </label>
                                                <label class="ui-switch ui-switch-md info m-t-xs d-block">
                                                    <input v-model="saveVendor.active_status" checked="" type="checkbox"> <i></i></label>
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
                                                <textarea v-model="saveVendor.address" :class="status($v.saveVendor.address)" @input="setValue($event)" name="address" class="form-control dv_common_textarea_for_all" rows="6" style="resize: none;" placeholder="Enter"></textarea>
                                            </div>                                                    
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize" for="name">City </label>
                                                <input v-model="saveVendor.city" :class="status($v.saveVendor.city)" @input="setValue($event)" name="city" type="text" class="form-control dv_common_input_for_all" placeholder="Enter">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize" for="name">State </label>
                                                <input v-model="saveVendor.state" :class="status($v.saveVendor.state)" @input="setValue($event)" name="state" type="text" class="form-control dv_common_input_for_all" placeholder="Enter">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize" for="name">Country </label>
                                                <input v-model="saveVendor.country" :class="status($v.saveVendor.country)" @input="setValue($event)" name="country" type="text" class="form-control dv_common_input_for_all" placeholder="Enter">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize" for="name">Zip Code </label>
                                                <input v-model="saveVendor.zip_code" :class="status($v.saveVendor.zip_code)" @input="setValue($event)" name="zip_code" type="number" class="form-control dv_common_input_for_all" placeholder="Enter">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize" for="name">PO Box# </label>
                                                <input v-model="saveVendor.po_box" type="text" class="form-control dv_common_input_for_all" placeholder="Enter">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize" for="name">Fax </label>
                                                <input v-model="saveVendor.fax" type="text" class="form-control dv_common_input_for_all" placeholder="Enter">
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
                                        <input v-model="saveVendor.year_started" type="text" class="form-control dv_common_input_for_all" placeholder="Enter">
                                    </div>
                                    <div class="form-group">
                                        <label class="text-muted text-capitalize" for="name">User Department Email </label>
                                        <input v-model="saveVendor.user_department_email" type="text" class="form-control dv_common_input_for_all" placeholder="Enter">
                                    </div>
                                    <div class="form-group">
                                        <label class="text-muted text-capitalize" for="name">Site Administrator Email </label>
                                        <input v-model="saveVendor.site_administrator_email" type="text" class="form-control dv_common_input_for_all" placeholder="Enter">
                                    </div>
                                    <div class="form-group">
                                        <label class="text-muted text-capitalize" for="name">Order Department Email </label>
                                        <input v-model="saveVendor.order_department_email" type="text" class="form-control dv_common_input_for_all" placeholder="Enter">
                                    </div>
                                    <div class="form-group">
                                        <label class="text-muted text-capitalize" for="name">Help Support Email </label>
                                        <input v-model="saveVendor.help_support_email" type="text" class="form-control dv_common_input_for_all" placeholder="Enter">
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
                            <button type="button" class="btn btn-default dv_save_submit_btn" @click="updateVendor">save </button>
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
import { UPDATE_VENDOR_ACTION, GET_BRANDS_ACTION, GET_VENDOR_ACTION  } from '@admin/store/vendors/actions';
import Multiselect from 'vue-multiselect'
export default {
    components: { Multiselect },
    data() {
        return {
            baseUrl:Vue.config.baseUrl,
            baseUrlImage: Vue.config.baseUrlImage,
            saveVendor: {
                vendor_id: '',
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
                user_department_email: '',
                side_administrator_email: '',
                order_department_email: '',
                help_support_email: '',
                brand_ids: []
            },
            brand_ids: [],
            lists: {
                brands: []
            }
        }
    },
    validations: {
        saveVendor: {
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
            getVendor: state => state.getVendor.getVendor
        })
    },
    mounted() {
        this.getBrandsList();
        this.getVendorDetail();
    },
    methods: {
        onMultiSelect(name) {
            this.saveVendor[name] = JSON.stringify(this[name].map(data => data.code));
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
            this.saveVendor[event.target.name] = event.target.value;
            this.$v.saveVendor[event.target.name].$touch();
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
        getVendorDetail: function (){
            this.$store.dispatch('getVendor/' + GET_VENDOR_ACTION, this.$route.params.vendor_id).then(() => {
                this.saveVendor.vendor_id = this.$route.params.vendor_id;
                this.saveVendor.company = this.getVendor.company;
                this.saveVendor.website = this.getVendor.website;
                this.saveVendor.email = this.getVendor.email;
                this.saveVendor.phone_no = this.getVendor.phone_no;
                this.saveVendor.alternate_phone_no = this.getVendor.alternate_phone_no;
                this.saveVendor.active_status = this.getVendor.active_status;
                this.saveVendor.address = this.getVendor.address;
                this.saveVendor.city = this.getVendor.city;
                this.saveVendor.state = this.getVendor.state;
                this.saveVendor.zip_code = this.getVendor.zip_code;
                this.saveVendor.country = this.getVendor.country;
                this.saveVendor.po_box = this.getVendor.po_box;
                this.saveVendor.fax = this.getVendor.fax;
                this.saveVendor.year_started = this.getVendor.year_started;
                this.saveVendor.user_department_email = this.getVendor.user_department_email;
                this.saveVendor.side_administrator_email = this.getVendor.side_administrator_email;
                this.saveVendor.order_department_email = this.getVendor.order_department_email;
                this.saveVendor.help_support_email = this.getVendor.help_support_email;
                
                if (this.getVendor.brand_ids) {
                    JSON.parse(this.getVendor.brand_ids).forEach(id => {
                        let brand = this.getBrands.find(brand => brand.id == id);
                        if (brand!=null) {
                            this.brand_ids.push({
                                name: brand['name'],
                                code: id
                            });
                        }
                    });
                }
            });
        },
        updateVendor: function () {
            let _this = this;
            _this.$v.saveVendor.$touch();
            let params = deleteEmptyKeys(this.saveVendor);
            if (!_this.$v.saveVendor.$invalid) {
                this.$store.dispatch('getVendor/' + UPDATE_VENDOR_ACTION, params).then(() => {
                    this.$router.push({ name: 'getVendors' });
                });
            }
        }
    }
}
</script>
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>