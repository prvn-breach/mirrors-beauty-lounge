<template>
    <div id="content" class="flex">
        <div class="page-container">
            <div class="pt-3 pr-3 pb-5 pl-3">
                <div class="mb-5">
                    <h2 class="dv_page_heading">Add Customer </h2>
                    <div class="row dv_search_delete_action_common"></div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize" for="name">First Name</label>
                                                <input v-model="addCustomer.first_name" :class="status($v.addCustomer.first_name)" @input="setValue($event)" name="first_name" type="text" class="form-control dv_common_input_for_all" placeholder="Enter">
                                                <span class="text-danger" v-if="getErrors.hasOwnProperty('first_name')">{{ getErrors['first_name'][0] }}</span>
                                            </div>                                                        
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize" for="name">Last Name</label>
                                                <input v-model="addCustomer.last_name" :class="status($v.addCustomer.last_name)" @input="setValue($event)" name="last_name" type="text" class="form-control dv_common_input_for_all" placeholder="Enter">
                                                <span class="text-danger" v-if="getErrors.hasOwnProperty('last_name')">{{ getErrors['last_name'][0] }}</span>
                                            </div>                                                        
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize" for="name">Email </label>
                                                <input v-model="addCustomer.email" :class="status($v.addCustomer.email)" @input="setValue($event)" name="email" type="email" class="form-control dv_common_input_for_all" placeholder="Enter">
                                                <span class="text-danger" v-if="getErrors.hasOwnProperty('email')">{{ getErrors['email'][0] }}</span>
                                            </div>                                                        
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize" for="name">Date Of Birth </label>
                                                <input v-model="addCustomer.dob" :class="status($v.addCustomer.dob)" @input="setValue($event)" name="dob" type="date" class="form-control dv_common_input_for_all" placeholder="Enter">
                                                <span class="text-danger" v-if="getErrors.hasOwnProperty('dob')">{{ getErrors['dob'][0] }}</span>
                                            </div>                                                        
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize" for="name">Mobile </label>
                                                <input v-model="addCustomer.mobile" :class="status($v.addCustomer.mobile)" @input="setValue($event)" name="mobile" type="number" class="form-control dv_common_input_for_all" placeholder="Enter">
                                                <span class="text-danger" v-if="getErrors.hasOwnProperty('mobile')">{{ getErrors['mobile'][0] }}</span>
                                            </div>                                                        
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 text-center">
                            <button type="button" class="btn btn-default text-muted dv_cancel_submit_btn" @click="$router.push({ name: 'getCustomers' });">cancel</button>
                            <button type="button" class="btn btn-default dv_save_submit_btn" @click="createCustomer">Submit </button>
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
import { required, minLength } from 'vuelidate/lib/validators';
import { CREATE_CUSTOMER_ACTION } from '@admin/store/customers/actions';
import { deleteEmptyKeys } from '../../mixins';
export default {
    data() {
        return {
            baseUrl: Vue.config.baseUrl,
            baseUrlImage: Vue.config.baseUrlImage,
            addCustomer: {
                first_name: '',
                last_name: '',
                dob: '',
                email: '',
                mobile: ''
            }
        }
    },
    computed: {
        ...mapState({
            getErrors: state => state.getOrder.getError
        })
    },
    validations: {
        addCustomer: {
            first_name: { required },
            last_name: { required },
            dob: { required },
            email: { required },
            mobile: { required, minLength: minLength(10) }
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
            this.addCustomer[event.target.name] = event.target.value;
            this.$v.addCustomer[event.target.name].$touch();
        },
        createCustomer: function() {
            let params = deleteEmptyKeys(this.addCustomer);
            this.$v.addCustomer.$touch();
            if (!this.$v.addCustomer.$invalid) {
                this.loaderModal('show');
                this.$store.dispatch('getCustomer/' + CREATE_CUSTOMER_ACTION, params).then(() => {
                    this.loaderModal('hide');
                    if (Object.keys(this.getErrors).length == 0) {
                        this.$router.push({ name: 'getCustomers' });
                    }
                });
            }
        }
    }
}
</script>