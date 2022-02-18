<template>
    <div id="content" class="flex">
        <div class="page-container">
            <div class="pt-3 pr-3 pb-5 pl-3">
                <div class="mb-5">
                    <h2 class="dv_page_heading">Add Complaint </h2>
                    <div class="row dv_search_delete_action_common"></div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label class="text-muted text-capitalize" for="name"> Order ID </label>
                                        <input v-model="addComplaint.order_id" :class="status($v.addComplaint.order_id)" @input="setValue($event)" name="order_id" type="number" class="form-control dv_common_input_for_all" placeholder="Enter">
                                    </div>
                                    <div class="form-group">
                                        <label class="text-muted text-capitalize" for="name">Complaint</label>
                                        <textarea v-model="addComplaint.message" :class="status($v.addComplaint.message)" @input="setValue($event)" name="message" class="form-control dv_common_textarea_for_all" rows="6" style="resize: none;" placeholder="Enter"></textarea>
                                    </div> 
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 text-center">
                            <button type="button" class="btn btn-default text-muted dv_cancel_submit_btn" @click="$router.push({ name: 'getComplaints' });">cancel</button>
                            <button type="button" class="btn btn-default dv_save_submit_btn" @click="saveComplaint">save </button>
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
import { CREATE_COMPLAINT_DETAIL_ACTION } from '@admin/store/orders/actions';
export default {
    components: {  },
    data() {
        return {
            baseUrl:Vue.config.baseUrl,
            baseUrlImage: Vue.config.baseUrlImage,
            addComplaint: {
                order_id: '',
                message: '',
                complaint_status: 'RAISED'
            }
        }
    },
    computed:{
        ...mapState({
            error: state => state.getOrder.getError
        })
    },
    validations: {
        addComplaint: {
            order_id: { required },
            message: { required },
            complaint_status: { required }
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
            this.addComplaint[event.target.name] = event.target.value;
            this.$v.addComplaint[event.target.name].$touch();
        },
        saveComplaint: function() {
            let _this = this;
            _this.$v.addComplaint.$touch();
            if (!_this.$v.addComplaint.$invalid) {
                this.loaderModal('show');
                let params = deleteEmptyKeys(this.addComplaint);
                this.$store.dispatch('getOrder/' + CREATE_COMPLAINT_DETAIL_ACTION, params).then(() => {
                    this.loaderModal('hide');
                    if (this.error) {
                        alert(this.error['order_id'][0]);
                    } else {
                        this.$router.push({ name: 'getComplaints' });
                    }
                });
            }
        }
    }
}
</script>