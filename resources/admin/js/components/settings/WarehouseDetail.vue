<template>
    <div id="content" class="flex">
        <div class="page-container">
            <div class="pt-3 pr-3 pb-5 pl-3">
                <div class="mb-5">
                    <h2 class="dv_page_heading">Warehouse Address </h2>
                    <div class="row dv_search_delete_action_common"></div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card mb-3">
                                <div class="card-header"><strong>Basic Details</strong></div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label class="text-muted text-capitalize" for="name">Location name</label>
                                        <input type="text" v-model="addLocation.location_name" :class="status($v.addLocation.location_name)" @input="setValue($event)" name="location_name" class="form-control dv_common_input_for_all" placeholder="Enter">
                                    </div>
                                    <div class="form-group">
                                        <label class="text-muted text-capitalize" for="name">Contact Person </label>
                                        <input type="text" v-model="addLocation.contact_person" :class="status($v.addLocation.contact_person)" @input="setValue($event)" name="contact_person" class="form-control dv_common_input_for_all" placeholder="Enter">
                                    </div>
                                    <div class="form-group">
                                        <label class="text-muted text-capitalize" for="name">Contact # </label>
                                        <input type="number" v-model="addLocation.mobile" :class="status($v.addLocation.mobile)" @input="setValue($event)" name="mobile" class="form-control dv_common_input_for_all" placeholder="Enter">
                                    </div>
                                    <div class="form-group">
                                        <label class="text-muted text-capitalize" for="name">Telephone # </label>
                                        <input type="number" v-model="addLocation.telephone" :class="status($v.addLocation.telephone)" @input="setValue($event)" name="telephone" class="form-control dv_common_input_for_all" placeholder="Enter">
                                    </div>
                                </div>
                            </div>
                            <div class="card mb-3">
                                <div class="card-header"><strong>Address Details</strong></div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label class="text-muted text-capitalize" for="name">Address </label>
                                        <textarea v-model="addLocation.address" :class="status($v.addLocation.address)" @input="setValue($event)" name="address" class="form-control dv_common_textarea_for_all" rows="6" style="resize: none;" placeholder="Enter"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label class="text-muted text-capitalize" for="name">City </label>
                                        <input v-model="addLocation.city" :class="status($v.addLocation.city)" @input="setValue($event)" name="city" type="text" class="form-control dv_common_input_for_all" placeholder="Enter">
                                    </div>
                                    <div class="form-group">
                                        <label class="text-muted text-capitalize" for="name">State </label>
                                        <input v-model="addLocation.state" :class="status($v.addLocation.state)" @input="setValue($event)" name="state" type="text" class="form-control dv_common_input_for_all" placeholder="Enter">
                                    </div>
                                    <div class="form-group">
                                        <label class="text-muted text-capitalize" for="name">Zipcode  </label>
                                        <input v-model="addLocation.zip_code" :class="status($v.addLocation.zip_code)" @input="setValue($event)" name="zip_code" type="number" class="form-control dv_common_input_for_all" placeholder="Enter">
                                    </div>
                                    <div class="form-group">
                                        <label class="text-muted text-capitalize" for="name">Country </label>
                                        <input v-model="addLocation.country" :class="status($v.addLocation.country)" @input="setValue($event)" name="country" type="text" class="form-control dv_common_input_for_all" placeholder="Enter">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 text-center">
                            <button type="button" class="btn btn-default dv_save_submit_btn" @click="saveLocation">save </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import Vue from 'vue'
import { mapState } from 'vuex'
import { required } from 'vuelidate/lib/validators';
import { deleteEmptyKeys } from "../../mixins";
import { ADD_WAREHOUSE_ADDRESS_ACTION, GET_WAREHOUSE_ADDRESS_ACTION  } from '@admin/store/settings/actions'
export default {
    components: { },
    data() {
        return {
            baseUrl:Vue.config.baseUrl,
            baseUrlImage: Vue.config.baseUrlImage,
            addLocation: {
                location_name: '',
                contact_person: '',
                mobile: '',
                telephone: '',
                address: '',
                city: '',
                state: '',
                zip_code: '',
                country: '',
                status: 1
            }
        }
    },
    validations: {
        addLocation: {
            location_name: { required },
            contact_person: { required },
            mobile: { required },
            telephone: { required },
            address: { required },
            city: { required },
            state: { required },
            zip_code: { required },
            country: { required }
        }
    },
    mounted() {
        this.getLocation();
    },
    computed:{
        ...mapState({
            getWarehouseAddress: state => state.settings.getWarehouseAddress
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
            this.addLocation[event.target.name] = event.target.value;
            this.$v.addLocation[event.target.name].$touch();
        },
        saveLocation: function () {
            let _this = this;
            _this.$v.addLocation.$touch();
            let params = deleteEmptyKeys(this.addLocation);
            if (!_this.$v.addLocation.$invalid) {
                _this.loaderModal('show');
                this.$store.dispatch('settings/' + ADD_WAREHOUSE_ADDRESS_ACTION, params).then(() => {
                    _this.loaderModal('hide');
                }).catch(() => _this.loaderModal('hide'));
            }
        },
        getLocation: function () {
            this.$store.dispatch('settings/' + GET_WAREHOUSE_ADDRESS_ACTION, {}).then(() => {
                if (this.getWarehouseAddress) {
                    this.addLocation = this.getWarehouseAddress;
                }
            });
        }
    }
}
</script>