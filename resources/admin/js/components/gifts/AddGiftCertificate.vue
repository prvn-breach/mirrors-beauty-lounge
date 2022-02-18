<template>
    <div id="content" class="flex">
        <div class="page-container">
            <div class="pt-3 pr-3 pb-5 pl-3">
                <div class="mb-5">
                    <h2 class="dv_page_heading">Add Gift Certificate </h2>
                    <div class="row dv_search_delete_action_common">
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card mb-3">
                                <div class="card-header"><strong>Basic Details</strong></div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize" for="name">Certificate Title </label>
                                                <input v-model="addGiftCertificate.certificate_title" :class="status($v.addGiftCertificate.certificate_title)" @input="setValue($event)" name="certificate_title" type="text" class="form-control dv_common_input_for_all" placeholder="Enter">
                                            </div>                                                
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize" for="name">Certificate Code </label>
                                                <input v-model="addGiftCertificate.certificate_code" :class="status($v.addGiftCertificate.certificate_code)" @input="setValue($event)" name="certificate_code" type="text" class="form-control dv_common_input_for_all" placeholder="Enter">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize" for="name">Start Date </label>
                                                <input type="date" class="form-control dv_common_input_for_all dvdatepicker" :class="status($v.addGiftCertificate.start_date)" @input="setValue($event)" name="start_date" placeholder="Select" v-model="addGiftCertificate.start_date">
                                            </div>                                                    
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize" for="name">End Date </label>
                                                <input type="date" class="form-control dv_common_input_for_all dvdatepicker" :class="status($v.addGiftCertificate.end_date)" @input="setValue($event)" name="end_date" placeholder="Select" v-model="addGiftCertificate.end_date">
                                            </div>                                                    
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize" for="name">Certificate Discount Type </label>
                                                <select v-model="addGiftCertificate.certificate_discount_type" :class="status($v.addGiftCertificate.certificate_discount_type)" @input="setValue($event)" name="certificate_discount_type" class="form-control dv_common_select_for_all">
                                                    <option value="">Select</option>
                                                    <option value="PERCENTAGE_BASED">Percentage Based</option>
                                                    <option value="FIXED_PRICE_BASED">Fixed Price Based</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3" v-if="addGiftCertificate.certificate_discount_type">
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize" for="name">Discount</label>
                                                <div class="input-group mb-3">
                                                    <input v-model="addGiftCertificate.discount" :class="status($v.addGiftCertificate.discount)" @input="setValue($event)" name="discount" type="number" class="form-control dv_common_input_for_all" placeholder="Enter">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text" id="basic-addon1">{{ discount_types[addGiftCertificate.certificate_discount_type] }}</span>
                                                    </div>
                                                </div>
                                            </div>                                                    
                                        </div>
                                        <!-- <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize" for="name">Accessibility </label>
                                                <select v-model="selected_accessibility" name="selected_accessibility" class="form-control dv_common_select_for_all">
                                                    <option value="1">Single Use</option>
                                                    <option value="N">Multiple Use</option>
                                                    <option value="0">Custom Counts</option>
                                                </select>
                                            </div>
                                        </div> -->
                                        <div class="col-md-1" v-if="selected_accessibility == '0'">
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize" for="name">Count </label>
                                                <input type="number" v-model="addGiftCertificate.accessibility" name="accessibility" class="form-control dv_common_input_for_all">
                                            </div>                                                    
                                        </div>                                       
                                        <div class="col-md-3">
                                            <div class="form-group mb-0 mt-4">
                                                <label class="ui-switch ui-switch-md info m-t-xs float-left mr-3"><input checked="" v-model="addGiftCertificate.status" type="checkbox"> <i></i></label>
                                                <label class="text-muted text-capitalize" for="name">Certificate status </label>
                                            </div>                                                    
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card mb-3">
                                <div class="card-header"><strong>Voucher Condition</strong></div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize" for="name">Condition </label>
                                                <select v-model="addGiftCertificate.logic" :class="status($v.addGiftCertificate.logic)" @input="setValue($event)" name="logic" class="form-control dv_common_select_for_all">
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
                                                    <input v-model="addGiftCertificate.condition_amount" :class="status($v.addGiftCertificate.condition_amount)" @input="setValue($event)" name="condition_amount" type="text" class="form-control dv_common_input_for_all" placeholder="Enter">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text" id="basic-addon1">AED</span>
                                                    </div>
                                                </div>
                                            </div>                                                    
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 text-center">
                            <button type="button" class="btn btn-default text-muted dv_cancel_submit_btn" @click="$router.push({ name: 'giftCertificates' })">cancel</button>
                            <button type="button" class="btn btn-default dv_save_submit_btn" @click="saveGiftCertificate">save </button>
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
import { ADD_GIFT_CERTIFICATE_ACTION } from '@admin/store/gifts/actions'
export default {
    components: { },
    data() {
        return {
            baseUrl:Vue.config.baseUrl,
            baseUrlImage: Vue.config.baseUrlImage,
            addGiftCertificate: {
                certificate_title: '',
                certificate_code: '',
                start_date: '',
                end_date: '',
                logic: '',
                condition_amount: '',
                certificate_discount_type: '',
                discount: 0,
                accessibility: '',
                status: true
            },
            selected_accessibility: 1,
            discount_types: {
                PERCENTAGE_BASED: '%',
                FIXED_PRICE_BASED: 'AED',
            }
        }
    },
    validations: {
        addGiftCertificate: {
            certificate_title: { required },
            certificate_code: { required },
            start_date: { required },
            discount: { required },
            end_date: { required },
            logic: { required },
            condition_amount: { required },
            certificate_discount_type: { required }
        }
    },
    computed:{
        ...mapState({
            getErrors: state => state.getGift.getErrors,
        })
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
            this.addGiftCertificate[event.target.name] = event.target.value;
            this.$v.addGiftCertificate[event.target.name].$touch();
        },
        saveGiftCertificate: function () {
            if (this.selected_accessibility!=0) {
                this.addGiftCertificate.accessibility = this.selected_accessibility;
            }
            let _this = this;
            _this.$v.addGiftCertificate.$touch();
            let params = deleteEmptyKeys(this.addGiftCertificate);
            if (!_this.$v.addGiftCertificate.$invalid) {
                this.loaderModal('show');
                this.$store.dispatch('getGift/' + ADD_GIFT_CERTIFICATE_ACTION, params).then(() => {
                    this.loaderModal('hide');
                    this.$router.push({ name: 'giftCertificates' });
                });
            }
        }
    }
}
</script>