<template>
    <div id="content" class="flex">
        <div class="page-container">
            <div class="pt-3 pr-3 pb-5 pl-3">
                <div class="mb-5">
                    <h2 class="dv_page_heading">Complaint Detail - <span>{{ order_info.order_id }}</span> </h2>
                    <div class="card">
                        <div class="card-header">
                            <strong>Order Information </strong>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="text-muted text-capitalize" for="name">Order# </label>
                                        <input type="text" class="form-control dv_common_input_for_all" placeholder="Select" v-model="order_info.order_id" readonly="">
                                    </div>                                                        
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="text-muted text-capitalize" for="name">Order Date </label>
                                        <input type="text" class="form-control dv_common_input_for_all" placeholder="Select" v-model="order_info.order_date" readonly="">
                                    </div>                                                        
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="text-muted text-capitalize" for="name">Customer Name </label>
                                        <input type="text" class="form-control dv_common_input_for_all" placeholder="Select" v-model="order_info.name" readonly="">
                                    </div>                                                        
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="text-muted text-capitalize" for="name">Email </label>
                                        <input type="text" class="form-control dv_common_input_for_all" placeholder="Select" v-model="order_info.email" readonly="">
                                    </div>                                                        
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-3">
                        <div class="card-header">
                            <strong>Product Information</strong>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-theme table-row v-middle">
                                    <thead>
                                        <tr>
                                            <th style="width: 15%;" class="text-muted">Product Code </th>
                                            <th style="width: 40%;" class="text-muted">Product Title </th>
                                            <th style="width: 11%;" class="text-muted">Quantity </th>
                                            <th style="width: 10%;" class="text-muted">Unit Price </th>
                                            <th style="width: 12%;" class="text-muted">Discount </th>
                                            <th style="width: 12%;" class="text-muted">Total </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="(item, index) in order_items" :key="index" class="v-middle">
                                            <td>{{ item.barcode }}</td>
                                            <td>{{ item.product_name }}</td>
                                            <td>{{ item.quantity }}</td>
                                            <td>AED {{ item.original_price }}</td>
                                            <td>{{ item.discount }}%</td>
                                            <td>AED {{ item.price }}</td>
                                        </tr>
                                        <tr class="v-middle">
                                            <td colspan="3" class="text-right">
                                                <strong> Subtotal </strong>
                                            </td>
                                            <td>AED {{ order_payment_info.original_sub_total }}</td>
                                            <td>AED {{ (order_payment_info.original_sub_total * order_payment_info.discount_percentage) / 100 }}</td>
                                            <td>AED {{ order_payment_info.sub_total }}</td>
                                        </tr>
                                        <tr class="v-middle">
                                            <td colspan="4" class="text-right">
                                                
                                            </td>
                                            <td>
                                                <strong>Shipping Charge</strong>
                                            </td>
                                            <td>
                                                <strong>AED {{ order_payment_info.shipping }}</strong>
                                            </td>
                                        </tr>
                                        <tr class="v-middle">
                                            <td colspan="4" class="text-right">
                                                
                                            </td>
                                            <td>
                                                <strong>Delivery Charge</strong>
                                            </td>
                                            <td>
                                                <strong>AED {{ order_payment_info.delivery_charge }}</strong>
                                            </td>
                                        </tr>
                                        <tr class="v-middle">
                                            <td colspan="4" class="text-right">
                                                
                                            </td>
                                            <td>
                                                <strong>Vat</strong>
                                            </td>
                                            <td>
                                                <strong>AED {{ order_payment_info.vat }}</strong>
                                            </td>
                                        </tr>
                                        <tr class="v-middle" v-if="order_payment_info.coupon_discount_amount > 0">
                                            <td colspan="4" class="text-right">
                                                
                                            </td>
                                            <td>
                                                <strong>Coupon Discount</strong>
                                            </td>
                                            <td>
                                                <strong>AED {{ order_payment_info.coupon_discount_amount }}</strong>
                                            </td>
                                        </tr>
                                        <tr class="v-middle" v-if="order_payment_info.gift_discount_amount > 0">
                                            <td colspan="4" class="text-right">
                                                
                                            </td>
                                            <td>
                                                <strong>Voucher Discount</strong>
                                            </td>
                                            <td>
                                                <strong>AED {{ order_payment_info.gift_discount_amount }}</strong>
                                            </td>
                                        </tr>
                                        <tr class="v-middle">
                                            <td colspan="4" class="text-right">
                                                
                                            </td>
                                            <td>
                                                <strong>Total</strong>
                                            </td>
                                            <td>
                                                <strong>AED {{ order_payment_info.total }}</strong>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>                                                            
                            </div>
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
import { GET_ORDER_ACTION, CREATE_COMPLAINT_DETAIL_ACTION  } from '@admin/store/orders/actions'
export default {
    components: { },
    data() {
        return {
            baseUrl:Vue.config.baseUrl,
            baseUrlImage:Vue.config.baseUrlImage,
            order_info: {
                user_id: '',
                order_id: '',
                name: '',
                email: '',
                order_date: ''
            },
            order_items: [],
            order_payment_info: {}
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
        getOrderDetail: function() {
            this.$store.dispatch('getOrder/' + GET_ORDER_ACTION, this.$route.params.order_id).then(() => {
                // Customer Info
                this.order_info.order_id = this.orderDetail.id;
                this.order_info.user_id = this.orderDetail.user_id;
                this.order_info.name = this.orderDetail.order_user.name;
                this.order_info.email = this.orderDetail.order_user.email;
                this.order_info.order_date = this.orderDetail.created_at.split('T')[0];
                this.order_info.complaint = this.orderDetail.order_status_shipping.complaint;

                // Order Items
                this.order_items = this.orderDetail.order_item;

                // Order Payment
                this.order_payment_info = this.orderDetail.order_payment;
                this.order_payment_info['discount_percentage'] = this.orderDetail.order_discount.discount;
                this.order_payment_info['coupon_discount_amount'] = this.orderDetail.order_discount.coupon_discount_amount;
                this.order_payment_info['gift_discount_amount'] = this.orderDetail.order_discount.gift_discount_amount;

            });
        }
    }
}
</script>