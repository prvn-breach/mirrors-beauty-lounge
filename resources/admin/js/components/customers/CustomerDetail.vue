<template>
    <div id="content" class="flex">
        <div class="page-container">
            <div class="pt-3 pr-3 pb-5 pl-3">
                <div class="mb-5">
                    <h2 class="dv_page_heading">Customer Detail</h2>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="b-b">
                                    <div class="nav-active-border b-primary bottom">
                                        <ul class="nav" id="myTab" role="tablist">
                                            <li class="nav-item"><a class="nav-link dv_tabs_a_tag" :class="$route.params.tab==null ? 'active': ''" id="home-tab" data-toggle="tab" href="#Info" role="tab" aria-controls="home" aria-selected="true"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>Info</a></li>
                                            <li class="nav-item"><a class="nav-link dv_tabs_a_tag" id="profile-tab" data-toggle="tab" href="#Order" role="tab" aria-controls="profile" aria-selected="false"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>Order</a></li>
                                            <li class="nav-item"><a class="nav-link dv_tabs_a_tag" id="address-tab" data-toggle="tab" href="#Address" role="tab" aria-controls="contact" aria-selected="false"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="1" y="3" width="15" height="13"></rect><polygon points="16 8 20 8 23 11 23 16 16 16 16 8"></polygon><circle cx="5.5" cy="18.5" r="2.5"></circle><circle cx="18.5" cy="18.5" r="2.5"></circle></svg>Address</a></li>
                                            <li class="nav-item"><a class="nav-link dv_tabs_a_tag" :class="$route.params.tab == 'cart' ? 'active': ''" id="cart-tab" data-toggle="tab" href="#Cart" role="tab" aria-controls="contact" aria-selected="false"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>Cart</a></li>
                                            <li class="nav-item"><a class="nav-link dv_tabs_a_tag" :class="$route.params.tab == 'wishlist' ? 'active': ''" id="wishlist-tab" data-toggle="tab" href="#Wishlist" role="tab" aria-controls="contact" aria-selected="false"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg>Wishlist</a></li>
                                            <li class="nav-item"><a class="nav-link dv_tabs_a_tag" id="activity-tab" data-toggle="tab" href="#Activity" role="tab" aria-controls="contact" aria-selected="false"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-check"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><polyline points="17 11 19 13 23 9"></polyline></svg>Activity log</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="tab-content">
                                    <div class="tab-pane fade" :class="$route.params.tab==null ? 'active show': ''" id="Info" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="card mb-0">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="text-muted text-capitalize" for="name">First Name</label>
                                                            <input type="text" class="form-control dv_common_input_for_all" placeholder="Enter" readonly="" v-model="customer.first_name">
                                                        </div>                                                        
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="text-muted text-capitalize" for="name">Last Name</label>
                                                            <input type="text" class="form-control dv_common_input_for_all" placeholder="Enter" readonly="" v-model="customer.last_name">
                                                        </div>                                                        
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="text-muted text-capitalize" for="name">Email ID </label>
                                                            <input type="text" class="form-control dv_common_input_for_all" placeholder="Enter" readonly="" v-model="customer.email">
                                                        </div>                                                        
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="text-muted text-capitalize" for="name">Mobile No </label>
                                                            <input type="text" class="form-control dv_common_input_for_all" placeholder="Enter" readonly="" v-model="customer.mobile">
                                                        </div>                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- <div class="card-footer">
                                                <button type="button" class="btn btn-default dv_save_submit_btn">Submit </button>
                                            </div> -->
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="Order" role="tabpanel" aria-labelledby="profile-tab">
                                        <div class="table-responsive">
                                            <table class="table table-theme table-row v-middle">
                                                <thead>
                                                    <tr>
                                                        <th style="width: 15%;" class="text-muted">created on</th>
                                                        <th style="width: 15%;" class="text-muted">order id</th>
                                                        <th style="width: 15%;" class="text-muted">order total </th>
                                                        <th style="width: 15%;" class="text-muted">payment mode</th>
                                                        <th style="width: 15%;" class="text-muted">payment status </th>
                                                        <th style="width: 15%;" class="text-muted">shipping status </th>
                                                        <th style="width: 10%;" class="text-muted">view</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr v-for="(order, index) in customer.orders" :key="index" class="v-middle">
                                                        <td>{{ order.created_at.split('T')[0] }}</td>
                                                        <td>
                                                            <strong>{{ order.id }}</strong>
                                                        </td>
                                                        <td>
                                                            <strong>AED {{ order.order_payment.sub_total }}</strong>
                                                        </td>
                                                        <td>
                                                            <img :src="payment_methods[order.order_payment.payment_mode]['image']" alt="" title="">
                                                        </td>
                                                        <td>
                                                            <span :class="payment_statuses[order.order_payment.payment_status]['class']">{{ payment_statuses[order.order_payment.payment_status]['label'] }}</span>
                                                        </td>
                                                        <td>
                                                            <span :class="order_shipping_statuses[order.order_status_shipping.status]['class']">{{ order_shipping_statuses[order.order_status_shipping.status]['label'] }} </span>
                                                        </td>
                                                        <td>
                                                            <router-link :to="{ name : 'orderDetail', params: { order_id: order.id } }">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="dv_row_action_drp_svg_eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                                            </router-link>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="Address" role="tabpanel" aria-labelledby="address-tab">
                                        <div class="card mb-0">
                                            <div class="card-body">
                                                <div v-for="(address, index) in customer.user_addresses" :key="index" class="row mb-3">
                                                    <span class="dv_address_details_per">address {{ index + 1 }} </span>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="text-muted text-capitalize" for="name">Full Name</label>
                                                            <input type="text" class="form-control dv_common_input_for_all" placeholder="Enter" readonly="" v-model="customer.name">
                                                        </div>                                                        
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="text-muted text-capitalize" for="name">Email </label>
                                                            <input type="text" class="form-control dv_common_input_for_all" placeholder="Enter" readonly="" v-model="customer.email">
                                                        </div>                                                        
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="text-muted text-capitalize" for="name">Mobile# </label>
                                                            <input type="text" class="form-control dv_common_input_for_all" placeholder="Enter" readonly="" v-model="address.mobile">
                                                        </div>                                                        
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="text-muted text-capitalize" for="name">Address</label>
                                                            <input type="text" class="form-control dv_common_input_for_all" placeholder="Enter" readonly="" v-model="address.address">
                                                        </div>                                                        
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="text-muted text-capitalize" for="name">City </label>
                                                            <input type="text" class="form-control dv_common_input_for_all" placeholder="Enter" readonly="" v-model="address.city">
                                                        </div>                                                        
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="text-muted text-capitalize" for="name">State </label>
                                                            <input type="text" class="form-control dv_common_input_for_all" placeholder="Enter" readonly="" v-model="address.state">
                                                        </div>                                                        
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="text-muted text-capitalize" for="name">Post code </label>
                                                            <input type="text" class="form-control dv_common_input_for_all" placeholder="Enter" readonly="" v-model="address.postal_code">
                                                        </div>                                                        
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="text-muted text-capitalize" for="name">Country </label>
                                                            <input type="text" class="form-control dv_common_input_for_all" placeholder="Enter" readonly="" v-model="address.country">
                                                        </div>                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" :class="$route.params.tab == 'cart' ? 'active show': ''" id="Cart" role="tabpanel" aria-labelledby="cart-tab">
                                        <div class="table-responsive">
                                            <table class="table table-theme table-row v-middle">
                                                <thead>
                                                    <tr>
                                                        <th style="width: 10%;" class="text-muted sortable">image</th>
                                                        <th style="width: 50%;" class="text-muted sortable">product </th>
                                                        <th style="width: 10%;" class="text-muted">qty</th>
                                                        <th style="width: 10%;" class="text-muted">unit price </th>
                                                        <th style="width: 10%;" class="text-muted">total</th>
                                                        <th style="width: 10%;" class="text-muted">Updated on </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr v-for="(item,index) in cart_items" :key="index" class="v-middle">
                                                        <td>
                                                            <img v-if="item.image" :src="item.image" alt="" title="" class="dv_stock_trasnfer_pr_img">
                                                            <img v-else :src="baseUrlImage+'images/default_admin.jpg'" alt="" width="50" height="50" class="dv_stock_trasnfer_pr_img">
                                                        </td>
                                                        <td>
                                                            <span class="item-except text-muted text-sm h-1x">
                                                                {{  item['product_name'] }}
                                                            </span>
                                                        </td>
                                                        <td>
                                                            <strong>{{ item['quantity']  }}</strong>
                                                        </td>
                                                        <td>
                                                            <strong class="text-muted text-line-through">
                                                                AED {{ item['price'] }}
                                                            </strong>
                                                        </td>
                                                        <td>
                                                            <strong>
                                                                AED {{ item['price'] * item['quantity'] }}
                                                            </strong>
                                                        </td>
                                                        <td>
                                                            {{ item['updated_at']!=null ? item['updated_at'].split('T')[0] : item['created_at'].split('T')[0] }}
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" :class="$route.params.tab == 'wishlist' ? 'active show': ''" id="Wishlist" role="tabpanel" aria-labelledby="wishlist-tab">
                                        <div class="table-responsive">
                                            <table class="table table-theme table-row v-middle">
                                                <thead>
                                                    <tr>
                                                        <th style="width: 10%;" class="text-muted sortable">image</th>
                                                        <th style="width: 50%;" class="text-muted sortable">product </th>
                                                        <th style="width: 10%;" class="text-muted">original price </th>
                                                        <th style="width: 10%;" class="text-muted">discount price</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr v-for="(wishlist, index) in customer.product_wishlist" :key="index" class="v-middle">
                                                        <td>
                                                            <img v-if="wishlist['product']['get_product_images'].length > 0" :src="baseUrlImage+'images/products/'+wishlist['product']['get_product_images'][0]['image']" alt="" title="" class="dv_stock_trasnfer_pr_img">
                                                            <img v-else :src="baseUrlImage+'images/default_admin.jpg'" alt="" width="50" height="50" class="dv_stock_trasnfer_pr_img">
                                                        </td>
                                                        <td>
                                                            <span class="item-except text-muted text-sm h-1x">
                                                                {{ wishlist.product.name }}
                                                            </span>
                                                        </td>
                                                        <td>
                                                            <strong class="text-muted text-line-through">
                                                                AED {{ wishlist.product.sale_price }}
                                                            </strong>
                                                        </td>
                                                        <td>
                                                            <strong>
                                                                AED {{ wishlist.product.discount_price }}
                                                            </strong>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="Activity" role="tabpanel" aria-labelledby="activity-tab">
                                        <div class="table-responsive">
                                            <table class="table table-theme table-row v-middle">
                                                <thead>
                                                    <tr>
                                                        <th style="width: 20%;" class="text-muted sortable">IP address</th>
                                                        <th style="width: 40%;" class="text-muted sortable">login date </th>
                                                        <th style="width: 40%;" class="text-muted">logout date </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr v-for="(activity, index) in customer.user_activity" :key="index" class="v-middle">
                                                        <td>
                                                            <span class="item-except text-muted text-sm h-1x">
                                                                198.192.1.100
                                                            </span>
                                                        </td>
                                                        <td>{{ activity['login'] }}</td>
                                                        <td>{{ activity['logout'] }}</td>
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
    </div>
</template>
<script>
import Vue from 'vue'
import { mapState } from 'vuex'
import { GET_CUSTOMER_DETAIL_ACTION } from '@admin/store/customers/actions'
export default {
    data() {
        return {
            baseUrl:Vue.config.baseUrl,
            baseUrlImage:Vue.config.baseUrlImage,
            payment_methods: {
                cash: {
                    label: 'CASH',
                    image: Vue.config.baseUrlImage+'images/payments/cash.png'
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
            cart_items: []
        }
    },
    computed:{
        ...mapState({
            customer: state => state.getCustomer.getCustomer,
        })
    },
    mounted() {
        this.getCustomerDetail();
    },
    methods: {
        getCustomerDetail: function (){
            this.$store.dispatch('getCustomer/' + GET_CUSTOMER_DETAIL_ACTION, this.$route.params.customer_id).then(()=> {
                // console.log(JSON.parse(this.customer.user_activity[0]['ip']));
                if (this.customer.cart) {
                this.cart_items = this.customer.cart.cart_items;
                }
            }); 
        }
    }
}
</script>