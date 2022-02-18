<template>
    <div id="content" class="flex">
        <div class="page-container">
            <div class="pt-3 pr-3 pb-5 pl-3">
                <div class="mb-5">
                    <h2 class="dv_page_heading">Store detail </h2>
                    <div class="row dv_search_delete_action_common"></div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card mb-3">
                                <div class="card-header"><strong>Basic Details</strong></div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label class="text-muted text-capitalize" for="name">Store URL </label>
                                        <input type="text" v-model="addStoreDetail.store_url" :class="status($v.addStoreDetail.store_url)" @input="setValue($event)" name="store_url"  class="form-control dv_common_input_for_all" placeholder="Enter">
                                    </div>
                                    <div class="form-group">
                                        <label class="text-muted text-capitalize" for="name">Facebook </label>
                                        <input type="text" v-model="addStoreDetail.facebook" :class="status($v.addStoreDetail.facebook)" @input="setValue($event)" name="facebook" class="form-control dv_common_input_for_all" placeholder="Enter">
                                    </div>
                                    <div class="form-group">
                                        <label class="text-muted text-capitalize" for="name">Twitter </label>
                                        <input type="text" v-model="addStoreDetail.twitter" :class="status($v.addStoreDetail.twitter)" @input="setValue($event)" name="twitter" class="form-control dv_common_input_for_all" placeholder="Enter">
                                    </div>
                                    <div class="form-group">
                                        <label class="text-muted text-capitalize" for="name">Google+ </label>
                                        <input type="text" v-model="addStoreDetail.googleplus" :class="status($v.addStoreDetail.googleplus)" @input="setValue($event)" name="googleplus" class="form-control dv_common_input_for_all" placeholder="Enter">
                                    </div>
                                    <div class="form-group">
                                        <label class="text-muted text-capitalize" for="name">Pinterest </label>
                                        <input type="text" v-model="addStoreDetail.pinterest" :class="status($v.addStoreDetail.pinterest)" @input="setValue($event)" name="pinterest" class="form-control dv_common_input_for_all" placeholder="Enter">
                                    </div>
                                    <div class="form-group">
                                        <label class="text-muted text-capitalize" for="name">Youtube </label>
                                        <input type="text" v-model="addStoreDetail.youtube" :class="status($v.addStoreDetail.youtube)" @input="setValue($event)" name="youtube" class="form-control dv_common_input_for_all" placeholder="Enter">
                                    </div>
                                    <div class="form-group">
                                        <label class="text-muted text-capitalize" for="name">LinkedIn </label>
                                        <input type="text" v-model="addStoreDetail.linkedin" :class="status($v.addStoreDetail.linkedin)" @input="setValue($event)" name="linkedin" class="form-control dv_common_input_for_all" placeholder="Enter">
                                    </div>
                                    <div class="form-group">
                                        <label class="text-muted text-capitalize" for="name">Email to Receive Contact Us Inquiries </label>
                                        <input type="text" v-model="addStoreDetail.email" :class="status($v.addStoreDetail.email)" @input="setValue($event)" name="email" class="form-control dv_common_input_for_all" placeholder="Enter">
                                    </div>
                                    <div class="form-group">
                                        <label class="text-muted text-capitalize" for="name">Quotation No. </label>
                                        <input type="text" v-model="addStoreDetail.quotation_number" :class="status($v.addStoreDetail.quotation_number)" @input="setValue($event)" name="quotation_number" class="form-control dv_common_input_for_all" placeholder="Enter">
                                    </div>
                                    <div class="form-group">
                                        <label class="text-muted text-capitalize" for="name">Administrator Email </label>
                                        <input type="text" v-model="addStoreDetail.administrator_email" :class="status($v.addStoreDetail.administrator_email)" @input="setValue($event)" name="administrator_email" class="form-control dv_common_input_for_all" placeholder="Enter">
                                    </div>
                                    <div class="form-group">
                                        <label class="text-muted text-capitalize" for="name">Order Number </label>
                                        <input type="text" v-model="addStoreDetail.order_number" :class="status($v.addStoreDetail.order_number)" @input="setValue($event)" name="order_number" class="form-control dv_common_input_for_all" placeholder="Enter">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 text-center">
                            <!-- <button type="button" class="btn btn-default text-muted dv_cancel_submit_btn">cancel</button> -->
                            <button type="button" class="btn btn-default dv_save_submit_btn" @click="saveStoreDetail" >save </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import Vue from 'vue'
import { required } from 'vuelidate/lib/validators';
import { deleteEmptyKeys } from "../../mixins";
import { ADD_STORE_DETAIL_ACTION  } from '@admin/store/settings/actions';
export default {
    components: { },
    data() {
        return {
            baseUrl:Vue.config.baseUrl,
            baseUrlImage: Vue.config.baseUrlImage,
            addStoreDetail: {
                store_url: '',
                facebook: '',
                twitter: '',
                googleplus: '',
                pinterest:'',
                youtube: '',
                linkedin: '',
                email: '',
                quotation_number: '',
                administrator_email: '',
                order_number: ''
            }
        }
    },
    validations: {
        addStoreDetail: {
            store_url: { required },
            facebook: { required },
            twitter: { required },
            googleplus: { required },
            pinterest:{ required },
            youtube: { required },
            linkedin: { required },
            email: { required },
            quotation_number: { required },
            administrator_email: { required },
            order_number: { required }
        }
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
            this.addStoreDetail[event.target.name] = event.target.value;
            this.$v.addStoreDetail[event.target.name].$touch();
        },
        saveStoreDetail: function () {
            let _this = this;
            _this.$v.addStoreDetail.$touch();
            let params = deleteEmptyKeys(this.addStoreDetail);
            if (!_this.$v.addStoreDetail.$invalid) {
                this.$store.dispatch('getStoreDetail/' + ADD_STORE_DETAIL_ACTION, params).then(() => {
                    this.addStoreDetail = {
                        store_url: '',
                        facebook: '',
                        twitter: '',
                        googleplus: '',
                        pinterest:'',
                        youtube: '',
                        linkedin: '',
                        email: '',
                        quotation_number: '',
                        administrator_email: '',
                        order_number: ''
                    }
                });
            }
        }
    }
}
</script>