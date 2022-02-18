<template>
    <div id="content" class="flex">
        <div class="page-container">
            <div class="pt-3 pr-3 pb-5 pl-3">
                <div class="mb-5">
                    <h2 class="dv_page_heading">Complaint Detail - <span>{{ $route.params.order_id }}</span> </h2>
                    <div class="card mb-0">
                        <div class="card-header">
                            <strong>Complaint Conversation </strong>
                        </div>
                        <div class="card-body">
                            <div class="list list-row block" style=" border: 1px solid #ebebeb; box-shadow: none; ">
                                <div v-for="(conversation,index) in orderDetail['complaints']" :key="index" class="list-item" style=" border-bottom: 1px solid #ebebeb; ">
                                    <div>
                                        <a href="#">
                                            <span class="w-48 avatar gd-black" v-if="conversation['user_id']" >{{ conversation['user']['name'].charAt(0) }}</span>
                                            <span class="w-48 avatar gd-warning" v-else >MBL</span>
                                        </a>
                                    </div>
                                    <div class="flex">
                                        <a href="#" class="item-author text-color" v-if="conversation['user_id']" >{{ conversation['user']['name'] }} </a>
                                        <a href="#" class="item-author text-color" v-else>Mirrors Beauty Lounge </a>
                                        <div class="item-except text-muted text-sm h-1x">{{ conversation['message'] }}</div>
                                    </div>
                                    <div class="no-wrap">
                                        <div class="item-date text-muted text-sm d-none d-md-block">{{ conversation['created_at'] }}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group" v-if="orderDetail.order_status_shipping && orderDetail.order_status_shipping.complaint_status!='COMPLETED'">
                                <label class="text-muted text-capitalize" for="name">Reply</label>
                                <textarea v-model="saveComplaint.message" class="form-control dv_common_textarea_for_all" rows="6" style="resize: none;" placeholder="Enter"></textarea>
                            </div> 
                            <div class="form-group">
                                <label class="text-muted text-capitalize" for="name">Status</label>
                                <select v-model="saveComplaint.complaint_status" :class="status($v.saveComplaint.complaint_status)" @input="setValue($event)" name="complaint_status" class="form-control dv_common_select_for_all">
                                    <option :value="index" v-for="(status,index) in complaint_statuses" :key="index" >{{ index }}</option>
                                </select>
                            </div>  
                        </div>
                    </div>
                    <div class="col-md-12 text-center">
                        <button type="button" class="btn btn-default text-muted dv_cancel_submit_btn" @click="$router.push({ name: 'getComplaints' });">cancel</button>
                        <button type="button" class="btn btn-default dv_save_submit_btn" @click="updateComplaintDetail()">Save </button>
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
import { GET_ORDER_ACTION, CREATE_COMPLAINT_DETAIL_ACTION  } from '@admin/store/orders/actions'
export default {
    components: { },
    data() {
        return {
            baseUrl:Vue.config.baseUrl,
            baseUrlImage:Vue.config.baseUrlImage,
            saveComplaint: {
                order_id: this.$route.params.order_id,
                message: '',
                complaint_status: ''
            },
            complaint_statuses: {
                RAISED: {
                    label: 'RAISED',
                    class: 'badge badge-danger text-capitalize'
                },
                PROCESSING: {
                    label: 'PROCESSING',
                    class: 'badge badge-warning text-capitalize'
                },
                COMPLETED: {
                    label: 'COMPLETED',
                    class: 'badge badge-success text-capitalize'
                }
            }
        }
    },
    validations: {
        saveComplaint: {
            complaint_status: { required }
        }
    },
    computed:{
        ...mapState({
            orderDetail: state => state.getOrder.getOrder,
        })
    },
    mounted() {
        this.getOrderDetail();
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
            this.saveComplaint[event.target.name] = event.target.value;
            this.$v.saveComplaint[event.target.name].$touch();
        },
        getOrderDetail: function() {
            this.$store.dispatch('getOrder/' + GET_ORDER_ACTION, this.$route.params.order_id).then(() => {
                this.saveComplaint.complaint_status = this.orderDetail.order_status_shipping.complaint_status;
            });
        },
        updateComplaintDetail: function() {
            let _this = this;
            _this.$v.saveComplaint.$touch();
            _this.saveComplaint.action = 0;
            if (!_this.$v.saveComplaint.$invalid) {
                this.loaderModal('show');
                this.$store.dispatch('getOrder/' + CREATE_COMPLAINT_DETAIL_ACTION, this.saveComplaint).then(() => {
                    this.loaderModal('hide');
                    this.saveComplaint.message = '';
                    this.getOrderDetail();
                });
            }
        }
    }
}
</script>