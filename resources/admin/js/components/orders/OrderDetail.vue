<template>
    <div id="content" class="flex">
        <div class="page-container">
            <div class="pt-3 pr-3 pb-5 pl-3">
                <div class="mb-5">
                    <h2 class="dv_page_heading">Orders - <span>{{ orderDetail.id }}</span>
                        <!-- <button type="text" class="btn btn-default dv_selected_filter_common mr-0" data-toggle="tooltip" data-placement="top" title="Next Order" data-original-title="Filter">   <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg>
                        </button>
                        <button type="text" class="btn btn-default dv_selected_filter_common" data-toggle="tooltip" data-placement="top" title="Previous Order" data-original-title="Filter"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="15 18 9 12 15 6"></polyline></svg>
                        </button> -->
                    </h2>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="b-b">
                                    <div class="nav-active-border b-primary bottom">
                                        <ul class="nav" id="myTab" role="tablist">
                                            <li class="nav-item"><a class="nav-link dv_tabs_a_tag active" id="home-tab" data-toggle="tab" href="#info" role="tab" aria-controls="home" aria-selected="true"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>Info</a></li>
                                            <li class="nav-item"><a class="nav-link dv_tabs_a_tag" id="profile-tab" data-toggle="tab" href="#Billing" role="tab" aria-controls="profile" aria-selected="false"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>Billing</a></li>
                                            <li class="nav-item"><a class="nav-link dv_tabs_a_tag" id="contact-tab" data-toggle="tab" href="#Shipping" role="tab" aria-controls="contact" aria-selected="false"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="1" y="3" width="15" height="13"></rect><polygon points="16 8 20 8 23 11 23 16 16 16 16 8"></polygon><circle cx="5.5" cy="18.5" r="2.5"></circle><circle cx="18.5" cy="18.5" r="2.5"></circle></svg>Shipping</a></li>
                                            <li class="nav-item"><a class="nav-link dv_tabs_a_tag" id="contact-tab" data-toggle="tab" href="#Products" role="tab" aria-controls="contact" aria-selected="false"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="16.5" y1="9.4" x2="7.5" y2="4.21"></line><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg>Products</a></li>
                                            <li v-if="order_payment_info.payment_status == 'NOT_PAID'" class="nav-item"><a class="nav-link dv_tabs_a_tag" id="contact-tab" data-toggle="tab" href="#Followup" role="tab" aria-controls="contact" aria-selected="false"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 18v-6a9 9 0 0 1 18 0v6"></path><path d="M21 19a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2h3zM3 19a2 2 0 0 0 2 2h1a2 2 0 0 0 2-2v-3a2 2 0 0 0-2-2H3z"></path></svg>Followup</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="tab-content">
                                    <div class="tab-pane fade active show" id="info" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="card mb-0">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="text-muted text-capitalize" for="name">Order ID</label>
                                                            <input type="text" class="form-control dv_common_input_for_all" placeholder="Enter" readonly="" :value="customer_info.order_id">
                                                        </div>                                                        
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="text-muted text-capitalize" for="name">Customer Name</label>
                                                            <input type="text" class="form-control dv_common_input_for_all" placeholder="Enter" readonly="" :value="customer_info.name">
                                                        </div>                                                        
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="text-muted text-capitalize" for="name">Customer Email </label>
                                                            <input type="text" class="form-control dv_common_input_for_all" placeholder="Enter" readonly="" :value="customer_info.email">
                                                        </div>                                                        
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="text-muted text-capitalize" for="name">Date Added </label>
                                                            <input type="text" class="form-control dv_common_input_for_all" placeholder="Enter" readonly="" :value="customer_info.date">
                                                        </div>                                                        
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="text-muted text-capitalize" for="name">Total Amount </label>
                                                            <input type="text" class="form-control dv_common_input_for_all" placeholder="Enter" readonly="" :value="customer_info.total">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="text-muted text-capitalize" for="name">Payment Type </label>
                                                            <select v-model="customer_info.payment_mode" class="form-control dv_common_select_for_all">
                                                                <option value="">Select</option>
                                                                <option :value="index" v-for="(method, index) in payment_methods" :key="index">{{ method['label'] }}</option>
                                                            </select>
                                                        </div>                                                        
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="text-muted text-capitalize" for="name">Payment Status </label>
                                                            <select v-model="customer_info.payment_status" class="form-control dv_common_select_for_all">
                                                                <option :value="index" v-for="(status, index) in payment_statuses" :key="index">{{ status['label'] }}</option>
                                                            </select>
                                                        </div>                                                        
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="text-muted text-capitalize" for="name">Shipping Status </label>
                                                            <select v-model="customer_info.shipping_status" class="form-control dv_common_select_for_all">
                                                                <option :value="index" v-for="(status, index) in order_shipping_statuses" :key="index">{{ status['label'] }}</option>
                                                            </select>
                                                        </div>                                                        
                                                    </div>
                                                    <div class="col-md-12" v-if="customer_info.shipping_status == 'R'">
                                                        <div class="form-group">
                                                            <label class="text-muted text-capitalize" for="name">Reason </label>
                                                            <textarea class="form-control dv_common_textarea_for_all" name="reason" :class="status($v.returned.reason)" @input="returnReasonInput($event)" rows="6" style="resize: none;" placeholder="Enter" v-model="returned.reason"></textarea>
                                                            <div class="error" v-if="!$v.returned.reason.minLength">Minimum {{$v.returned.reason.$params.minLength.min}} characters.</div>
                                                        </div>                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer">
                                                <button type="button" class="btn btn-default dv_save_submit_btn" :disabled="save_order_button" @click="updateOrder()">Save Order</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="Billing" role="tabpanel" aria-labelledby="profile-tab">
                                        <div class="card mb-0">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="text-muted text-capitalize" for="name">Full Name</label>
                                                            <input type="text" class="form-control dv_common_input_for_all" placeholder="Enter" readonly="" :value="billing_info.full_name">
                                                        </div>                                                        
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="text-muted text-capitalize" for="name">Customer Email </label>
                                                            <input type="text" class="form-control dv_common_input_for_all" placeholder="Enter" readonly="" :value="billing_info.email">
                                                        </div>                                                        
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="text-muted text-capitalize" for="name">Mobile# </label>
                                                            <input type="text" class="form-control dv_common_input_for_all" placeholder="Enter" readonly="" :value="billing_info.mobile">
                                                        </div>                                                        
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="text-muted text-capitalize" for="name">Address 1 </label>
                                                            <input type="text" class="form-control dv_common_input_for_all" placeholder="Enter" readonly="" :value="billing_info.address1">
                                                        </div>                                                        
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="text-muted text-capitalize" for="name">Address 2 </label>
                                                            <input type="text" class="form-control dv_common_input_for_all" placeholder="Enter" readonly="" value="">
                                                        </div>                                                        
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="text-muted text-capitalize" for="name">City </label>
                                                            <input type="text" class="form-control dv_common_input_for_all" placeholder="Enter" readonly="" :value="billing_info.city">
                                                        </div>                                                        
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="text-muted text-capitalize" for="name">State </label>
                                                            <input type="text" class="form-control dv_common_input_for_all" placeholder="Enter" readonly="" :value="billing_info.state">
                                                        </div>                                                        
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="text-muted text-capitalize" for="name">Post code </label>
                                                            <input type="text" class="form-control dv_common_input_for_all" placeholder="Enter" readonly="" :value="billing_info.postal_code">
                                                        </div>                                                        
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="text-muted text-capitalize" for="name">Phone# </label>
                                                            <input type="text" class="form-control dv_common_input_for_all" placeholder="Enter" readonly="" :value="billing_info.phone">
                                                        </div>                                                        
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="text-muted text-capitalize" for="name">Country </label>
                                                            <input type="text" class="form-control dv_common_input_for_all" placeholder="Enter" readonly="" :value="billing_info.country">
                                                        </div>                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="Shipping" role="tabpanel" aria-labelledby="contact-tab">
                                        <div class="card mb-0">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="text-muted text-capitalize" for="name">Full Name</label>
                                                            <input type="text" class="form-control dv_common_input_for_all" placeholder="Enter" readonly="" :value="shipping_info.full_name">
                                                        </div>                                                        
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="text-muted text-capitalize" for="name">Customer Email </label>
                                                            <input type="text" class="form-control dv_common_input_for_all" placeholder="Enter" readonly="" :value="shipping_info.email">
                                                        </div>                                                        
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="text-muted text-capitalize" for="name">Mobile# </label>
                                                            <input type="text" class="form-control dv_common_input_for_all" placeholder="Enter" readonly="" :value="shipping_info.mobile">
                                                        </div>                                                        
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="text-muted text-capitalize" for="name">Address 1 </label>
                                                            <input type="text" class="form-control dv_common_input_for_all" placeholder="Enter" readonly="" :value="shipping_info.address1">
                                                        </div>                                                        
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="text-muted text-capitalize" for="name">Address 2 </label>
                                                            <input type="text" class="form-control dv_common_input_for_all" placeholder="Enter" readonly="" value="">
                                                        </div>                                                        
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="text-muted text-capitalize" for="name">City </label>
                                                            <input type="text" class="form-control dv_common_input_for_all" placeholder="Enter" readonly="" :value="shipping_info.city">
                                                        </div>                                                        
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="text-muted text-capitalize" for="name">State </label>
                                                            <input type="text" class="form-control dv_common_input_for_all" placeholder="Enter" readonly="" :value="shipping_info.state">
                                                        </div>                                                        
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="text-muted text-capitalize" for="name">Post code </label>
                                                            <input type="text" class="form-control dv_common_input_for_all" placeholder="Enter" readonly="" :value="shipping_info.postal_code">
                                                        </div>                                                        
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="text-muted text-capitalize" for="name">Phone# </label>
                                                            <input type="text" class="form-control dv_common_input_for_all" placeholder="Enter" readonly="" :value="shipping_info.phone">
                                                        </div>                                                        
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="text-muted text-capitalize" for="name">Country </label>
                                                            <input type="text" class="form-control dv_common_input_for_all" placeholder="Enter" readonly="" :value="shipping_info.country">
                                                        </div>                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="Products" role="tabpanel" aria-labelledby="contact-tab">
                                        <div class="table-responsive">
                                            <table class="table table-theme table-row v-middle">
                                                <thead>
                                                    <tr>
                                                        <th style="width: 10%;" class="text-muted">image</th>
                                                        <th style="width: 50%;" class="text-muted">product </th>
                                                        <th style="width: 10%;" class="text-muted">qty</th>
                                                        <th style="width: 10%;" class="text-muted">unit price </th>
                                                        <th style="width: 10%;" class="text-muted">Discounted </th>
                                                        <th style="width: 10%;" class="text-muted">total</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr v-for="(item, index) in order_items" :key="index" class="v-middle">
                                                        <td>
                                                            <img v-if="item.image" :src="item.image" alt="" title="" class="dv_stock_trasnfer_pr_img">
                                                            <img v-else :src="baseUrlImage+'images/default_admin.jpg'" class="dv_stock_trasnfer_pr_img" alt="" width="50" height="50">
                                                        </td>
                                                        <td>
                                                            <span class="item-except text-muted text-sm h-1x">
                                                                {{ item.product_name }}
                                                            </span>
                                                        </td>
                                                        <td>
                                                            <strong>{{ item.quantity }}</strong>
                                                        </td>
                                                        <td>
                                                            <strong class="text-muted text-line-through">
                                                                AED {{ item.original_price  }}
                                                            </strong>
                                                        </td>
                                                        <td>
                                                            <strong>{{ item.discount }}%</strong>
                                                        </td>
                                                        <td>
                                                            <strong>
                                                                AED {{ item.price  }}
                                                            </strong>
                                                        </td>
                                                    </tr>
                                                    <tr class="v-middle">
                                                        <td colspan="2" class="text-right">
                                                            
                                                        </td>
                                                        <td>
                                                            Subtotal
                                                        </td>
                                                        <td>
                                                            <strong>
                                                                AED {{ order_payment_info.original_sub_total }}
                                                            </strong>
                                                        </td>
                                                        <td>
                                                            <strong>
                                                                AED {{ (order_payment_info.original_sub_total * order_payment_info.discount_percentage) / 100 }}
                                                            </strong>
                                                        </td>
                                                        <td>
                                                            <strong>
                                                                AED {{ order_payment_info.sub_total }}
                                                            </strong>
                                                        </td>
                                                    </tr>
                                                    <tr class="v-middle">
                                                        <td colspan="2" class="text-right">
                                                            
                                                        </td>
                                                        <td>
                                                            
                                                        </td>
                                                        <td>
                                                            
                                                        </td>
                                                        <td>
                                                            Shipping cost
                                                        </td>
                                                        <td>
                                                            <strong>
                                                                AED {{ order_payment_info.shipping }}
                                                            </strong>
                                                        </td>
                                                    </tr>
                                                    <tr class="v-middle">
                                                        <td colspan="2" class="text-right">
                                                            
                                                        </td>
                                                        <td>
                                                            
                                                        </td>
                                                        <td>
                                                            
                                                        </td>
                                                        <td>
                                                            Delivery Charge
                                                        </td>
                                                        <td>
                                                            <strong>
                                                                AED {{ order_payment_info.delivery_charge }}
                                                            </strong>
                                                        </td>
                                                    </tr>
                                                    <tr class="v-middle">
                                                        <td colspan="2" class="text-right">
                                                            
                                                        </td>
                                                        <td>
                                                            
                                                        </td>
                                                        <td>
                                                            
                                                        </td>
                                                        <td>
                                                            vat
                                                        </td>
                                                        <td>
                                                            <strong>
                                                                AED {{ order_payment_info.vat }}
                                                            </strong>
                                                        </td>
                                                    </tr>
                                                    <tr class="v-middle" v-if="order_payment_info.coupon_discount_amount > 0">
                                                        <td colspan="2" class="text-right">
                                                            
                                                        </td>
                                                        <td>
                                                            
                                                        </td>
                                                        <td>
                                                            
                                                        </td>
                                                        <td>
                                                            Coupon Discount
                                                        </td>
                                                        <td>
                                                            <strong>
                                                                AED {{ order_payment_info.coupon_discount_amount }}
                                                            </strong>
                                                        </td>
                                                    </tr>
                                                    <tr class="v-middle" v-if="order_payment_info.gift_discount_amount > 0">
                                                        <td colspan="2" class="text-right">
                                                            
                                                        </td>
                                                        <td>
                                                            
                                                        </td>
                                                        <td>
                                                            
                                                        </td>
                                                        <td>
                                                            Voucher Discount
                                                        </td>
                                                        <td>
                                                            <strong>
                                                                AED {{ order_payment_info.gift_discount_amount }}
                                                            </strong>
                                                        </td>
                                                    </tr>
                                                    <tr class="v-middle">
                                                        <td colspan="2" class="text-right">
                                                            
                                                        </td>
                                                        <td>
                                                            
                                                        </td>
                                                        <td>
                                                            
                                                        </td>
                                                        <td>
                                                            Total
                                                        </td>
                                                        <td>
                                                            <strong>
                                                                AED {{ order_payment_info.total }}
                                                            </strong>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div v-if="order_payment_info.payment_status == 'NOT_PAID'" class="tab-pane fade" id="Followup" role="tabpanel" aria-labelledby="contact-tab">
                                        <div class="card mb-3">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="text-muted text-capitalize" for="name">Select Reason </label>
                                                            <select v-model="addFollowUp.reason_type" :class="status($v.addFollowUp.reason_type)" @change="setValues($event)" name="reason_type" class="form-control dv_common_select_for_all">
                                                                <option value="">Select</option>
                                                                <option value="not_intrested">Not Interested</option>
                                                                <option value="completed">Completed</option>
                                                                <option value="contact_later">Contact Later</option>
                                                                <option value="other">Other</option>
                                                            </select>
                                                        </div>                                                        
                                                    </div>
                                                    <div class="col-md-4" v-if="addFollowUp.reason_type == 'other'">
                                                        <div class="form-group">
                                                            <label class="text-muted text-capitalize" for="name">Other Reason Type </label>
                                                            <input type="text" class="form-control dv_common_input_for_all" name="other_reason_type" placeholder="Select" v-model="addFollowUp.other_reason_type">
                                                        </div>                                                        
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="text-muted text-capitalize" for="name">Date </label>
                                                            <input type="date" class="form-control dv_common_input_for_all dvdatepicker" :class="status($v.addFollowUp.date)" @input="setValues($event)" name="date" placeholder="Select" v-model="addFollowUp.date">
                                                        </div>                                                        
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="text-muted text-capitalize" for="name">Reason </label>
                                                            <textarea class="form-control dv_common_textarea_for_all" :class="status($v.addFollowUp.reason)" @input="setValues($event)" name="reason" rows="6" style="resize: none;" placeholder="Enter" v-model="addFollowUp.reason"></textarea>
                                                        </div>                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer">
                                                <button type="button" :disabled="submit_follow_up_button" class="btn btn-default dv_save_submit_btn" @click="submitOrderFollowUp(0)">Submit</button>
                                            </div>
                                        </div>

                                        <div class="card mb-0">
                                            <div class="card-header">
                                                <strong>Follow-up History</strong>
                                            </div>
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table table-theme table-row v-middle">
                                                        <thead>
                                                            <tr>
                                                                <th style="width: 10%;" class="text-muted sortable">date</th>
                                                                <th style="width: 20%;" class="text-muted">reason type</th>
                                                                <th style="width: 70%;" class="text-muted sortable">reason </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr v-for="(follow_up, index) in order_follow_ups" :key="index" class="v-middle">
                                                                <td>{{ follow_up.date }}</td>    
                                                                <td>{{ follow_up.reason_type!='other' ? follow_up.reason_type : follow_up.other_reason_type }}</td>
                                                                <td>{{ follow_up.reason }}</td>
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
        </div>
    </div>
</template>
<script>
import Vue from 'vue'
import { mapState } from 'vuex'
import { required, minLength } from 'vuelidate/lib/validators'
import { GET_ORDER_ACTION, ADD_ORDER_FOLLOW_UP_ACTION, UPDATE_ORDER_STATUS_ACTION  } from '@admin/store/orders/actions'
export default {
    components: { },
    data() {
        return {
            baseUrl:Vue.config.baseUrl,
            baseUrlImage:Vue.config.baseUrlImage,
            customer_info: {
                user_id: '',
                order_id: '',
                name: '',
                ip: '',
                email: '',
                date: '',
                total: '',
                payment_mode: '',
                payment_status: '',
                shipping_status: ''
            },
            billing_info: {
                full_name: '',
                email: '',
                mobile: '',
                address1: '',
                address2: '',
                city: '',
                state: '',
                postal_code: '',
                phone: '',
                country: ''
            },
            shipping_info: {
                full_name: '',
                email: '',
                mobile: '',
                address1: '',
                address2: '',
                city: '',
                state: '',
                postal_code: '',
                phone: '',
                country: ''
            },
            returned: {
                reason: ''
            },
            order_items: [],
            order_payment_info: {},
            addFollowUp: {
                order_id: '',
                reason_type: '',
                other_reason_type: '',
                date: '',
                reason: '',
            },
            order_follow_ups: [],
            submit_follow_up_button: false,
            save_order_button: false,
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
            }
        }
    },
    validations: {
        addFollowUp:{
            reason_type: { required },
            date: { required },
            reason: { required }
        },
        returned: {
            reason: {
                required, minLength: minLength(100)
            }
        }
    },
    computed:{
        ...mapState({
            orderDetail: state => state.getOrder.getOrder,
        })
    },
    mounted() {
        this.getOrderDetail();
        this.addFollowUp['order_id'] = this.$route.params.order_id;
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
        setValues: function(event){
            this.addFollowUp[event.target.name] = event.target.value;
            this.$v.addFollowUp[event.target.name].$touch();
        },
        returnReasonInput: function(event) {
            this.returned.reason = event.target.value;
            this.$v.returned.reason.$touch();
        },
        getOrderDetail: function() {
            this.$store.dispatch('getOrder/' + GET_ORDER_ACTION, this.$route.params.order_id).then(() => {
                // Customer Info
                this.customer_info.order_id = this.orderDetail.id;
                this.customer_info.user_id = this.orderDetail.user_id;
                this.customer_info.name = this.orderDetail.order_user.name;
                this.customer_info.email = this.orderDetail.order_user.email;
                this.customer_info.date = this.orderDetail.created_at;
                this.customer_info.payment_mode = this.orderDetail.order_payment.payment_mode;
                this.customer_info.payment_status = this.orderDetail.order_payment.payment_status;
                this.customer_info.shipping_status = this.orderDetail.order_status_shipping.status;
                this.customer_info.total = this.orderDetail.order_payment.total;
                this.returned.reason = this.orderDetail.order_status_shipping.reason;
                
                // Billing Info
                this.billing_info.full_name = this.orderDetail.order_user.name;
                this.billing_info.email = this.orderDetail.order_user.email;
                if (this.orderDetail.billing_address) {
                    this.billing_info.mobile = this.orderDetail.billing_address.mobile;
                    this.billing_info.phone = this.orderDetail.billing_address.telephone;
                    this.billing_info.address1 = this.orderDetail.billing_address.address;
                    this.billing_info.city = this.orderDetail.billing_address.city;
                    this.billing_info.state = this.orderDetail.billing_address.state;
                    this.billing_info.postal_code = this.orderDetail.billing_address.postal_code;
                    this.billing_info.country = this.orderDetail.billing_address.country;
                }

                // Shipping Info
                this.shipping_info.full_name = this.orderDetail.order_user.name;
                this.shipping_info.email = this.orderDetail.order_user.email;
                if (this.orderDetail.order_address) {
                    this.shipping_info.mobile = this.orderDetail.order_address.mobile;
                    this.shipping_info.phone = this.orderDetail.order_address.telephone;
                    this.shipping_info.address1 = this.orderDetail.order_address.address;
                    this.shipping_info.city = this.orderDetail.order_address.city;
                    this.shipping_info.state = this.orderDetail.order_address.state;
                    this.shipping_info.postal_code = this.orderDetail.order_address.postal_code;
                    this.shipping_info.country = this.orderDetail.order_address.country;
                }


                // Order Items
                this.order_items = this.orderDetail.order_item;

                // Order Payment
                this.order_payment_info = this.orderDetail.order_payment;
                this.order_payment_info['discount_percentage'] = this.orderDetail.order_discount.discount;
                this.order_payment_info['coupon_discount_amount'] = this.orderDetail.order_discount.coupon_discount_amount;
                this.order_payment_info['gift_discount_amount'] = this.orderDetail.order_discount.gift_discount_amount;
            
                // Order Follow Ups
                this.order_follow_ups = this.orderDetail.order_follow_up;
            });
        },
        submitOrderFollowUp: function(action) {
            let _this = this;
            _this.$v.addFollowUp.$touch();
            _this.addFollowUp.action = action;
            if (!_this.$v.addFollowUp.$invalid) {
                this.submit_follow_up_button = true;
                this.loaderModal('show');
                this.$store.dispatch('getOrder/' + ADD_ORDER_FOLLOW_UP_ACTION, this.addFollowUp).then(() => {
                    this.loaderModal('hide');
                    this.addFollowUp.reason_type = '';
                    this.addFollowUp.date = '';
                    this.addFollowUp.reason = '';
                    this.getOrderDetail();
                    this.submit_follow_up_button = false;
                }).catch(() => this.loaderModal('hide'));
            }
        },
        updateOrder: function(){
            this.$v.returned.$touch();
            if (this.$v.returned.$invalid && (this.customer_info.shipping_status == 'R')) {
                return;
            }
            this.save_order_button = true;
            this.loaderModal('show');
            this.$store.dispatch('getOrder/' + UPDATE_ORDER_STATUS_ACTION, {
                order_status_shipping: {
                    order_id: this.customer_info.order_id,
                    status: this.customer_info.shipping_status,
                    reason: this.returned.reason,
                    return_status: this.customer_info.shipping_status=='R' ? 'PENDING': ''
                },
                order_payment: {
                    order_id: this.customer_info.order_id,
                    payment_mode: this.customer_info.payment_mode,
                    payment_status: this.customer_info.payment_status
                }
            }).then(() => {
                this.loaderModal('hide');
                this.save_order_button = false;
                this.$router.push({ name: 'getOrders' });
            }).catch(() => this.loaderModal('hide'));
        }
    }
}
</script>