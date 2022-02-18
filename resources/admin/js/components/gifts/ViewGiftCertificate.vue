<template>
    <div id="content" class="flex">
        <div class="page-container">
            <div class="pt-3 pr-3 pb-5 pl-3">
                <div class="mb-5">
                    <h2 class="dv_page_heading">View Gift Certificate </h2>
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
                                                <input v-model="saveGiftCertificate.certificate_title" :class="status($v.saveGiftCertificate.certificate_title)" @input="setValue($event)" name="certificate_title" type="text" class="form-control dv_common_input_for_all" placeholder="Enter">
                                            </div>                                                
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize" for="name">Certificate Code </label>
                                                <input v-model="saveGiftCertificate.certificate_code" :class="status($v.saveGiftCertificate.certificate_code)" @input="setValue($event)" name="certificate_code" type="text" class="form-control dv_common_input_for_all" placeholder="Enter">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize" for="name">Start Date </label>
                                                <input type="date" class="form-control dv_common_input_for_all dvdatepicker" :class="status($v.saveGiftCertificate.start_date)" @input="setValue($event)" name="start_date" placeholder="Select" v-model="saveGiftCertificate.start_date">
                                            </div>                                                    
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize" for="name">End Date </label>
                                                <input type="date" class="form-control dv_common_input_for_all dvdatepicker" :class="status($v.saveGiftCertificate.end_date)" @input="setValue($event)" name="end_date" placeholder="Select" v-model="saveGiftCertificate.end_date">
                                            </div>                                                    
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize" for="name">Certificate Discount Type </label>
                                                <select v-model="saveGiftCertificate.certificate_discount_type" :class="status($v.saveGiftCertificate.certificate_discount_type)" @input="setValue($event)" name="certificate_discount_type" class="form-control dv_common_select_for_all">
                                                    <option value="">Select</option>
                                                    <option value="PERCENTAGE_BASED">Percentage Based</option>
                                                    <option value="FIXED_PRICE_BASED">Fixed Price Based</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3" v-if="saveGiftCertificate.certificate_discount_type">
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize" for="name">Discount</label>
                                                <div class="input-group mb-3">
                                                    <input v-model="saveGiftCertificate.discount" :class="status($v.saveGiftCertificate.discount)" @input="setValue($event)" name="discount" type="number" class="form-control dv_common_input_for_all" placeholder="Enter">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text" id="basic-addon1">{{ discount_types[saveGiftCertificate.certificate_discount_type] }}</span>
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
                                                <input type="number" v-model="saveGiftCertificate.accessibility" name="accessibility" class="form-control dv_common_input_for_all" placeholder="Enter">
                                            </div>                                                    
                                        </div>                                       
                                        <div class="col-md-3">
                                            <div class="form-group mb-0 mt-4">
                                                <label class="ui-switch ui-switch-md info m-t-xs float-left mr-3"><input checked="" v-model="saveGiftCertificate.status" type="checkbox"> <i></i></label>
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
                                                <select v-model="saveGiftCertificate.logic" :class="status($v.saveGiftCertificate.logic)" @input="setValue($event)" name="logic" class="form-control dv_common_select_for_all">
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
                                                    <input v-model="saveGiftCertificate.condition_amount" :class="status($v.saveGiftCertificate.condition_amount)" @input="setValue($event)" name="condition_amount" type="text" class="form-control dv_common_input_for_all" placeholder="Enter">
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
                            <button type="button" class="btn btn-default dv_save_submit_btn" @click="updateGiftCertificate">Update </button>
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
import { GET_GIFT_CERTIFICATE_ACTION, UPDATE_GIFT_CERTIFICATE_ACTION } from '@admin/store/gifts/actions'
export default {
    components: { },
    data() {
        return {
            baseUrl:Vue.config.baseUrl,
            baseUrlImage: Vue.config.baseUrlImage,
            saveGiftCertificate: {
                certificate_title: '',
                certificate_code: '',
                start_date: '',
                end_date: '',
                logic: '',
                condition_amount: '',
                certificate_discount_type: '',
                discount: '',
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
        saveGiftCertificate: {
            certificate_title: { required },
            certificate_code: { required },
            start_date: { required },
            end_date: { required },
            logic: { required },
            condition_amount: { required },
            certificate_discount_type: { required },
            discount: { required }
        }
    },
    computed:{
        ...mapState({
            getGiftCertificate: state => state.getGift.getGiftCertificate,
            getErrors: state => state.getGift.getErrors,
        })
    },
    mounted() {
        this.getGiftCertificateDetail();
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
            this.saveGiftCertificate[event.target.name] = event.target.value;
            this.$v.saveGiftCertificate[event.target.name].$touch();
        },
        getGiftCertificateDetail: function() {
            this.$store.dispatch('getGift/' + GET_GIFT_CERTIFICATE_ACTION, this.$route.params.gift_certificate_id).then(() => {
                this.saveGiftCertificate.certificate_title = this.getGiftCertificate.certificate_title;
                this.saveGiftCertificate.certificate_code = this.getGiftCertificate.certificate_code;
                this.saveGiftCertificate.start_date = this.getGiftCertificate.start_date;
                this.saveGiftCertificate.end_date = this.getGiftCertificate.end_date;
                this.saveGiftCertificate.logic = this.getGiftCertificate.logic;
                this.saveGiftCertificate.condition_amount = this.getGiftCertificate.condition_amount;
                this.saveGiftCertificate.certificate_discount_type = this.getGiftCertificate.certificate_discount_type;
                this.selected_accessibility = !['1','N'].includes(this.getGiftCertificate.accessibility) ? 0 : this.getGiftCertificate.accessibility;
                this.saveGiftCertificate.accessibility = this.getGiftCertificate.accessibility;
                this.saveGiftCertificate.discount = this.getGiftCertificate.discount;
                this.saveGiftCertificate.status = this.getGiftCertificate.status;
            });
        },
        updateGiftCertificate: function () {
            if (this.selected_accessibility!=0) {
                this.saveGiftCertificate.accessibility = this.selected_accessibility;
            }
            let _this = this;
            _this.$v.saveGiftCertificate.$touch();
            let params = deleteEmptyKeys(this.saveGiftCertificate);
            params['gift_certificate_id'] = this.$route.params.gift_certificate_id;
            if (!_this.$v.saveGiftCertificate.$invalid) {
                this.loaderModal('show');
                this.$store.dispatch('getGift/' + UPDATE_GIFT_CERTIFICATE_ACTION, params).then(() => {
                    this.loaderModal('hide');
                    this.$router.push({ name: 'giftCertificates' });
                });
            }
        }
    }
}
</script>