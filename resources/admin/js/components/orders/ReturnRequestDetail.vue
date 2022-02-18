<template>
    <div id="content" class="flex">
        <div class="page-container">
            <div class="pt-3 pr-3 pb-5 pl-3">
                <div class="mb-5">
                    <h2 class="dv_page_heading">Return Request - <span>{{ order_info.return_id }}</span> </h2>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card mb-3">
                                <div class="b-b">
                                    <div class="nav-active-border b-primary bottom">
                                        <ul class="nav" id="myTab" role="tablist">
                                            <li class="nav-item"><a class="nav-link dv_tabs_a_tag active" id="home-tab" data-toggle="tab" href="#info" role="tab" aria-controls="home" aria-selected="true"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>Info</a></li>
                                            <li class="nav-item"><a class="nav-link dv_tabs_a_tag" id="profile-tab" data-toggle="tab" href="#Return" role="tab" aria-controls="profile" aria-selected="false"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="17 1 21 5 17 9"></polyline><path d="M3 11V9a4 4 0 0 1 4-4h14"></path><polyline points="7 23 3 19 7 15"></polyline><path d="M21 13v2a4 4 0 0 1-4 4H3"></path></svg>Return action</a></li>
                                        </ul>
                                    </div>
                                    <div class="tab-content">
                                        <div class="tab-pane fade active show" id="info" role="tabpanel" aria-labelledby="home-tab">
                                            <div class="card mb-3">
                                                <div class="card-header">
                                                    <strong>Order Information </strong>
                                                </div>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label class="text-muted text-capitalize" for="name">Return ID# </label>
                                                                <input type="text" class="form-control dv_common_input_for_all" placeholder="Select" v-model="order_info.return_id" readonly="">
                                                            </div>                                                        
                                                        </div>
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
                                        <div class="tab-pane fade" id="Return" role="tabpanel" aria-labelledby="home-tab">
                                            <div class="card">
                                                <div class="card-header">
                                                    <strong>Fill the form for return</strong>
                                                </div>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label class="text-muted text-capitalize" for="name">Return Status </label>
                                                                <select v-model="returned.return_status" class="form-control dv_common_select_for_all" :class="status($v.returned.return_status)" @input="setValue($event)" name="return_status">
                                                                    <option value="PENDING">PENDING</option>
                                                                    <option value="COMPLETED">RETURN COMPLETED</option>
                                                                </select>
                                                            </div>                                                        
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group mb-0">
                                                                <label class="text-muted text-capitalize" for="name">Comments  </label>
                                                                <textarea v-model="returned.comments" :class="status($v.returned.comments)" name="comments" @input="setValue($event)" class="form-control dv_common_textarea_for_all" rows="6" style="resize: none;" placeholder="Enter"></textarea>
                                                            </div>                                                        
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-footer">
                                                    <button type="button" class="btn btn-default dv_save_submit_btn" @click="saveOrder">Save Changes </button>
                                                </div>
                                            </div>
                                        </div>
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
import { required } from 'vuelidate/lib/validators';
import { GET_ORDER_ACTION, UPDATE_ORDER_STATUS_ACTION  } from '@admin/store/orders/actions'
export default {
    components: { },
    data() {
        return {
            baseUrl:Vue.config.baseUrl,
            baseUrlImage:Vue.config.baseUrlImage,
            order_info: {
                return_id: '',
                user_id: '',
                order_id: '',
                name: '',
                email: '',
                order_date: '',
                reason: '',
                status: ''
            },
            returned: {
                return_status: 'PENDING',
                comments: ''
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
    computed:{
        ...mapState({
            orderDetail: state => state.getOrder.getOrder,
        })
    },
    validations: {
        returned: {
            return_status: { required },
            comments: { required }
        }
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
            this.returned[event.target.name] = event.target.value;
            this.$v.returned[event.target.name].$touch();
        },
        getOrderDetail: function() {
            this.$store.dispatch('getOrder/' + GET_ORDER_ACTION, this.$route.params.order_id).then(() => {
                // Customer Info
                this.order_info.order_id = this.orderDetail.id;
                this.order_info.return_id = this.orderDetail.order_status_shipping.return_id;
                this.order_info.user_id = this.orderDetail.user_id;
                this.order_info.name = this.orderDetail.order_user.name;
                this.order_info.email = this.orderDetail.order_user.email;
                this.order_info.order_date = this.orderDetail.created_at.split('T')[0];
                this.order_info.reason = this.orderDetail.order_status_shipping.reason;
                this.order_info.status = this.orderDetail.order_status_shipping.status;
                this.returned.return_status = this.orderDetail.order_status_shipping.return_status;
                this.returned.comments = this.orderDetail.order_status_shipping.comments;


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
        saveOrder: function(){
            this.$v.returned.$touch();
            if (this.$v.returned.$invalid) {
                return;
            }
            this.loaderModal('show');
            this.$store.dispatch('getOrder/' + UPDATE_ORDER_STATUS_ACTION, {
                order_status_shipping: {
                    order_id: this.order_info.order_id,
                    return_status: this.returned.return_status,
                    comments: this.returned.comments,
                    status: this.order_info.status
                }
            }).then(() => {
                this.loaderModal('hide');
                this.$router.push({ name: 'getReturnedOrders' });
            })
        }
    }
}
</script>