<template>
    <div id="content" class="flex">
        <div class="page-container">
            <div class="pt-3 pr-3 pb-5 pl-3">
                <div class="mb-5">
                    <h2 class="dv_page_heading">Shipment Detail - <span>{{ $route.params.order_id }}</span> </h2>
                    <div class="row dv_search_delete_action_common">
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card mb-3">
                                <div class="card-header"><strong>Shipment Details</strong></div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize" for="name">Order# </label>
                                                <input type="text" class="form-control dv_common_input_for_all" placeholder="Select" v-model="shipment_details.order_id" readonly="">
                                            </div>                                                        
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize" for="name">Date Shipped </label>
                                                <input type="text" class="form-control dv_common_input_for_all" placeholder="Select" v-model="shipment_details.date_shipped" readonly="">
                                            </div>                                                        
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize" for="name">Total Weight </label>
                                                <input :class="status($v.shipment_details.weight)" @change="setValues($event)" name="weight" type="text" class="form-control dv_common_input_for_all" placeholder="Select" v-model="shipment_details.weight">
                                            </div>                                                        
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize" for="name">Payment Type </label>
                                                <select :class="status($v.shipment_details.payment_mode)" @change="setValues($event)" name="payment_mode" v-model="shipment_details.payment_mode" class="form-control dv_common_select_for_all">
                                                    <option value="">Select</option>
                                                    <option :value="index" v-for="(method, index) in payment_methods" :key="index">{{ method['label'] }}</option>
                                                </select>
                                            </div>                                                        
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize" for="name">Payment Status </label>
                                                <select :class="status($v.shipment_details.payment_status)" @change="setValues($event)" name="payment_status" v-model="shipment_details.payment_status" class="form-control dv_common_select_for_all">
                                                    <option :value="index" v-for="(status, index) in payment_statuses" :key="index">{{ status['label'] }}</option>
                                                </select>
                                            </div>                                                        
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize" for="name">Shipping Status </label>
                                                <select :class="status($v.shipment_details.shipping_status)" @change="setValues($event)" name="shipping_status" v-model="shipment_details.shipping_status" class="form-control dv_common_select_for_all">
                                                    <option :value="index" v-for="(status, index) in order_shipping_statuses" :key="index">{{ status['label'] }}</option>
                                                </select>
                                            </div>                                                        
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize" for="name">Date Delivered</label>
                                                <input :class="status($v.shipment_details.date_delivered)" @change="setValues($event)" name="date_delivered" type="date" class="form-control dv_common_input_for_all" placeholder="Select" v-model="shipment_details.date_delivered">
                                            </div>                                                        
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize" for="name">Internal Shipment Comments</label>
                                                <textarea :class="status($v.shipment_details.comments)" @change="setValues($event)" name="comments" class="form-control dv_common_textarea_for_all" rows="6" style="resize: none;" v-model="shipment_details.comments" placeholder="Enter"></textarea>
                                            </div>                                                        
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="button" class="btn btn-default dv_save_submit_btn" @click="saveShipmentDetail">Save Changes </button>
                                </div>
                            </div>

                            <div class="card mb-3">
                                <div class="card-header"><strong>Order Shipping Address</strong></div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize" for="name">Mobile</label>
                                                <input disabled v-model="shipment_address.mobile" name="shipping_mobile" type="number" class="form-control dv_common_input_for_all" placeholder="Enter">
                                            </div>                                                        
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize" for="name">Address</label>
                                                <input disabled v-model="shipment_address.address" name="shipping_address" type="text" class="form-control dv_common_input_for_all" placeholder="Enter">
                                            </div>                                                        
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize" for="name">City </label>
                                                <input disabled v-model="shipment_address.city" name="shipping_city" type="text" class="form-control dv_common_input_for_all" placeholder="Enter">
                                            </div>                                                        
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize" for="name">State </label>
                                                <input disabled v-model="shipment_address.state" name="shipping_state" type="text" class="form-control dv_common_input_for_all" placeholder="Enter">
                                            </div>                                                        
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize" for="name">Postal code </label>
                                                <input disabled v-model="shipment_address.postal_code" name="shipping_postal_code" type="text" class="form-control dv_common_input_for_all" placeholder="Enter">
                                            </div>                                                        
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize" for="name">Country </label>
                                                <input disabled v-model="shipment_address.country" name="shipping_country" type="text" class="form-control dv_common_input_for_all" placeholder="Enter">
                                            </div>                                                        
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize" for="name">Address Type</label>
                                                <select disabled v-model="shipment_address.type" name="shipping_address_type" class="form-control dv_common_select_for_all">
                                                    <option value="home" selected>Home</option>
                                                    <option value="office">Office</option>
                                                    <option value="other">Other</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card mb-3">
                                <div class="card-header"><strong>Order Billing Address</strong></div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize" for="name">Mobile</label>
                                                <input disabled v-model="billing_address.mobile" name="shipping_mobile" type="number" class="form-control dv_common_input_for_all" placeholder="Enter">
                                            </div>                                                        
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize" for="name">Address</label>
                                                <input disabled v-model="billing_address.address" name="shipping_address" type="text" class="form-control dv_common_input_for_all" placeholder="Enter">
                                            </div>                                                        
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize" for="name">City </label>
                                                <input disabled v-model="billing_address.city" name="shipping_city" type="text" class="form-control dv_common_input_for_all" placeholder="Enter">
                                            </div>                                                        
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize" for="name">State </label>
                                                <input disabled v-model="billing_address.state" name="shipping_state" type="text" class="form-control dv_common_input_for_all" placeholder="Enter">
                                            </div>                                                        
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize" for="name">Postal code </label>
                                                <input disabled v-model="billing_address.postal_code" name="shipping_postal_code" type="text" class="form-control dv_common_input_for_all" placeholder="Enter">
                                            </div>                                                        
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize" for="name">Country </label>
                                                <input disabled v-model="billing_address.country" name="shipping_country" type="text" class="form-control dv_common_input_for_all" placeholder="Enter">
                                            </div>                                                        
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize" for="name">Address Type</label>
                                                <select disabled v-model="billing_address.type" name="shipping_address_type" class="form-control dv_common_select_for_all">
                                                    <option value="home" selected>Home</option>
                                                    <option value="office">Office</option>
                                                    <option value="other">Other</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card mb-0">
                                <div class="card-header">
                                    <strong>Products</strong>
                                </div>
                                <div class="card-body p-0">
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
        </div>
    </div>
</template>
<script>
import Vue from 'vue'
import { mapState } from 'vuex'
import { required } from 'vuelidate/lib/validators'
import { GET_ORDER_ACTION, UPDATE_ORDER_STATUS_ACTION  } from '@admin/store/orders/actions'
export default {
    components: { },
    data() {
        return {
            baseUrl:Vue.config.baseUrl,
            baseUrlImage:Vue.config.baseUrlImage,
            payment_methods: {
                cash: {
                    label: 'CASH'
                }
            },
            payment_statuses: {
                NOT_PAID: {
                    label: 'NOT PAID',
                    class: 'badge badge-danger text-capitalize'
                },
                PAID: {
                    label: 'PAID',
                    class: 'badge badge-success text-capitalize'
                },
            },
            order_shipping_statuses: {
				N: {
                    label: 'NEW',
                    class: 'badge badge-info'
                },
                V: {
                    label: 'CONFIRMED',
                    class: 'badge badge-primary'
                },
				S: {
                    label: 'SHIPPED',
                    class: 'badge badge-warning'
                },
				D: {
                    label: 'DELIVERED',
                    class: 'badge badge-success'
                },
				R: {
                    label: 'RETURNED',
                    class: 'badge badge-dark'
                },
				C: {
                    label: 'CANCELLED',
                    class: 'badge badge-danger'
                }
            },
            shipment_details: {
                order_id: '',
                date_shipped: '',
                weight: '',
                date_delivered: '',
                payment_mode: '',
                payment_status: '',
                shipping_status: '',
                comments: ''
            },
            shipment_address: {
                mobile: '',
                address: '',
                city: '',
                state: '',
                postal_code: '',
                country: '',
                type: ''
            },
            billing_address: {
                mobile: '',
                address: '',
                city: '',
                state: '',
                postal_code: '',
                country: '',
                type: ''
            },
            order_items: [],
            order_payment_info: {},
        }
    },
    validations: {
        shipment_details:{
            weight: { required },
            date_delivered: { required },
            payment_mode: { required },
            payment_status: { required },
            shipping_status: { required },
            comments: { required }
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
                this.shipment_details.order_id = this.$route.params.order_id;
                if (this.orderDetail.order_status_shipping) {
                    this.shipment_details.date_shipped = this.orderDetail.order_status_shipping.created_at.split('T')[0];
                    this.shipment_details.weight = this.orderDetail.order_status_shipping.weight;
                    this.shipment_details.date_delivered = this.orderDetail.order_status_shipping.delivered_date;
                    this.shipment_details.shipping_status = this.orderDetail.order_status_shipping.status;
                    this.shipment_details.comments = this.orderDetail.order_status_shipping.comments;
                }

                if (this.orderDetail.order_payment) {
                    this.shipment_details.payment_mode = this.orderDetail.order_payment.payment_mode;
                    this.shipment_details.payment_status = this.orderDetail.order_payment.payment_status;
                }

                if (this.orderDetail.order_address) {
                    this.shipment_address = this.orderDetail.order_address;
                }

                if (this.orderDetail.billing_address) {
                    this.billing_address = this.orderDetail.billing_address;
                }
                
                // Order Items
                this.order_items = this.orderDetail.order_item;

                // Order Payment
                this.order_payment_info = this.orderDetail.order_payment;
                this.order_payment_info['discount_percentage'] = this.orderDetail.order_discount.discount;
                this.order_payment_info['coupon_discount_amount'] = this.orderDetail.order_discount.coupon_discount_amount;
                this.order_payment_info['gift_discount_amount'] = this.orderDetail.order_discount.gift_discount_amount;
            });
        },
        status: function(validation) {
            if(validation != undefined){
                return {
                    error: validation.$error,
                    dirty: validation.$dirty
                }
            }
        },
        setValues: function(event){
            this.shipment_details[event.target.name] = event.target.value;
            this.$v.shipment_details[event.target.name].$touch();
        },
        saveShipmentDetail: function(){
            let _this = this
            _this.$v.shipment_details.$touch();
            if (!_this.$v.shipment_details.$invalid) {
                this.loaderModal('show');
                this.$store.dispatch('getOrder/' + UPDATE_ORDER_STATUS_ACTION, {
                    order_status_shipping: {
                        order_id: this.shipment_details.order_id,
                        status: this.shipment_details.shipping_status,
                        delivered_date: this.shipment_details.date_delivered,
                        weight: this.shipment_details.weight,
                        comments: this.shipment_details.comments
                    },
                    order_payment: {
                        order_id: this.shipment_details.order_id,
                        payment_mode: this.shipment_details.payment_mode,
                        payment_status: this.shipment_details.payment_status
                    }
                }).then(() => {
                    this.loaderModal('hide');
                    this.$router.push({ name: 'getShippingOrders' });
                })
            }
        }
    }
}
</script>