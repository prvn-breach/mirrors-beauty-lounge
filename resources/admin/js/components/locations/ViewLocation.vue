<template>
    <div id="content" class="flex">
        <div class="page-container">
            <div class="pt-3 pr-3 pb-5 pl-3">
                <div class="mb-5">
                    <h2 class="dv_page_heading">View Location </h2>
                    <div class="row dv_search_delete_action_common"></div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card mb-3">
                                <div class="card-header"><strong>Basic Details</strong></div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize" for="name">Location Type</label>
                                                <select class="form-control dv_common_select_for_all" v-model="saveLocation.location_type" :class="status($v.saveLocation.location_type)" @input="setValue($event)" name="location_type">
                                                    <option value="">Select</option>
                                                    <option value="Store">Store</option>
                                                    <option value="Pickup Point">Pickup Point</option>
                                                    <option value="Warehouse">Warehouse</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize" for="name">Location name</label>
                                                <input type="text" v-model="saveLocation.location_name" :class="status($v.saveLocation.location_name)" @input="setValue($event)" name="location_name" class="form-control dv_common_input_for_all" placeholder="Enter">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize" for="name">Contact Person </label>
                                                <input type="text" v-model="saveLocation.contact_person" :class="status($v.saveLocation.contact_person)" @input="setValue($event)" name="contact_person" class="form-control dv_common_input_for_all" placeholder="Enter">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize" for="name">Contact # </label>
                                                <input type="number" v-model="saveLocation.mobile" :class="status($v.saveLocation.mobile)" @input="setValue($event)" name="mobile" class="form-control dv_common_input_for_all" placeholder="Enter">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize" for="name">Telephone # </label>
                                                <input type="number" v-model="saveLocation.telephone" :class="status($v.saveLocation.telephone)" @input="setValue($event)" name="telephone" class="form-control dv_common_input_for_all" placeholder="Enter">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize" for="name">Start Time </label>
                                                <input type="time" v-model="saveLocation.start_time" :class="status($v.saveLocation.start_time)" @input="setValue($event)" name="start_time" class="form-control dv_common_input_for_all" placeholder="Enter">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize" for="name">End Time </label>
                                                <input type="time" v-model="saveLocation.end_time" :class="status($v.saveLocation.end_time)" @input="setValue($event)" name="end_time" class="form-control dv_common_input_for_all" placeholder="Enter">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card mb-3">
                                <div class="card-header"><strong>Address Details</strong></div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label class="text-muted text-capitalize" for="name">Address </label>
                                        <textarea v-model="saveLocation.address" :class="status($v.saveLocation.address)" @input="setValue($event)" name="address" class="form-control dv_common_textarea_for_all" rows="6" style="resize: none;" placeholder="Enter"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label class="text-muted text-capitalize" for="name">City </label>
                                        <input v-model="saveLocation.city" :class="status($v.saveLocation.city)" @input="setValue($event)" name="city" type="text" class="form-control dv_common_input_for_all" placeholder="Enter">
                                    </div>
                                    <div class="form-group">
                                        <label class="text-muted text-capitalize" for="name">State </label>
                                        <input v-model="saveLocation.state" :class="status($v.saveLocation.state)" @input="setValue($event)" name="state" type="text" class="form-control dv_common_input_for_all" placeholder="Enter">
                                    </div>
                                    <div class="form-group">
                                        <label class="text-muted text-capitalize" for="name">Zipcode  </label>
                                        <input v-model="saveLocation.zip_code" :class="status($v.saveLocation.zip_code)" @input="setValue($event)" name="zip_code" type="number" class="form-control dv_common_input_for_all" placeholder="Enter">
                                    </div>
                                    <div class="form-group">
                                        <label class="text-muted text-capitalize" for="name">Country </label>
                                        <input v-model="saveLocation.country" :class="status($v.saveLocation.country)" @input="setValue($event)" name="country" type="text" class="form-control dv_common_input_for_all" placeholder="Enter">
                                    </div>
                                    <div class="form-group">
                                        <label class="text-muted text-capitalize" for="name">Latitude </label>
                                        <input v-model="saveLocation.latitude" :class="status($v.saveLocation.latitude)" @input="setValue($event)" name="latitude" type="text" class="form-control dv_common_input_for_all" placeholder="Enter">
                                    </div>
                                    <div class="form-group">
                                        <label class="text-muted text-capitalize" for="name">Longitude </label>
                                        <input v-model="saveLocation.longitude" :class="status($v.saveLocation.longitude)" @input="setValue($event)" name="longitude" type="text" class="form-control dv_common_input_for_all" placeholder="Enter">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 text-center">
                            <button type="button" class="btn btn-default text-muted dv_cancel_submit_btn" @click="$router.push({ name: 'getLocations' })">cancel</button>
                            <button type="button" class="btn btn-default dv_save_submit_btn" @click="updateLocation">update </button>
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
import { UPDATE_LOCATION_ACTION, GET_LOCATION_ACTION  } from '@admin/store/locations/actions'
export default {
    components: { },
    data() {
        return {
            baseUrl:Vue.config.baseUrl,
            baseUrlImage: Vue.config.baseUrlImage,
            saveLocation: {
                location_name: '',
                location_type: '',
                contact_person: '',
                mobile: '',
                telephone: '',
                address: '',
                city: '',
                state: '',
                zip_code: '',
                country: '',
                start_time: '',
                end_time: '',
                latitude: '',
                longitude: '',
                status: 1
            }
        }
    },
    validations: {
        saveLocation: {
            location_name: { required },
            location_type: { required },
            contact_person: { required },
            mobile: { required },
            telephone: { required },
            address: { required },
            city: { required },
            state: { required },
            zip_code: { required },
            country: { required },
            start_time: { required },
            end_time: { required },
            latitude: { required },
            longitude: { required }
        }
    },
    computed:{
        ...mapState({
            getLocation: state => state.getLocation.getLocation,
        })
    },
    mounted() {
        this.getLocationDetail();
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
            this.saveLocation[event.target.name] = event.target.value;
            this.$v.saveLocation[event.target.name].$touch();
        },
        getLocationDetail: function() {
            this.$store.dispatch('getLocation/' + GET_LOCATION_ACTION, this.$route.params.location_id).then(() => {
                this.saveLocation.location_name = this.getLocation.location_name;
                this.saveLocation.location_type = this.getLocation.location_type;
                this.saveLocation.contact_person = this.getLocation.contact_person;
                this.saveLocation.mobile = this.getLocation.mobile;
                this.saveLocation.telephone = this.getLocation.telephone;
                this.saveLocation.address = this.getLocation.address;
                this.saveLocation.city = this.getLocation.city;
                this.saveLocation.state = this.getLocation.state;
                this.saveLocation.zip_code = this.getLocation.zip_code;
                this.saveLocation.country = this.getLocation.country;
                this.saveLocation.status = this.getLocation.status;
                this.saveLocation.start_time = this.getLocation.start_time;
                this.saveLocation.end_time = this.getLocation.end_time;
                this.saveLocation.latitude = this.getLocation.latitude;
                this.saveLocation.longitude = this.getLocation.longitude;
            });
        },
        updateLocation: function () {
            let _this = this;
            _this.$v.saveLocation.$touch();
            if (!_this.$v.saveLocation.$invalid) {
                _this.loaderModal('show');
                let params = deleteEmptyKeys(this.saveLocation);
                params['location_id'] = this.$route.params.location_id;
                this.$store.dispatch('getLocation/' + UPDATE_LOCATION_ACTION, params).then(() => {
                    _this.loaderModal('hide');
                    this.$router.push({ name: 'getLocations' });
                });
            }
        }
    }
}
</script>