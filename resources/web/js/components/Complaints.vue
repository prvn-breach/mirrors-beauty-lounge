<template>
    	<div class="dv_content">
			<div class="dv_account_pages_wrapper">
				<div class="dv_account_bredcum_wrapper">
					<div class="container-fluid">
						<ul class="dv_ac_bredcum_wrapper_ul">
							<li>
								<a href="#!">
									Home
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg>
								</a>
							</li>
							<li>
								<a href="#!">
									my account
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg>
								</a>
							</li>
							<li>
								<a href="#!">
									complaints
								</a>
							</li>
						</ul>
					</div>
				</div>
				<div class="container-fluid">
					<div class="row">
                        <div class="col-md-12">
							<ProfileNavigation></ProfileNavigation>
						</div>
                        <div class="col-md-3 hide-mobile-767">
                            <SideNavigation></SideNavigation>
                        </div>
                        <div class="col-md-9">
                            <h4 class="dv_accounts_page_head_sm show-mobile-767">orders </h4>
                            <h5 class="dv_accounts_page_head">filter your compaints </h5>
                            <div class="dv_account_pages_data_card">
                                <div class="dv_profile_page">
                                    <div class="row">
                                        <div class="col-md-3 mb-3">
                                            <div class="form-group">
                                                <label style="font-size: 13px; color: #999999;">complaint status </label>
                                                <select v-model="filter.status" class="form-control" style="font-size: 15px; appearance: none; background: #ffffff url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAFQAAAAuCAYAAAC20j5mAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyZpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuNi1jMTQyIDc5LjE2MDkyNCwgMjAxNy8wNy8xMy0wMTowNjozOSAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wTU09Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9tbS8iIHhtbG5zOnN0UmVmPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvc1R5cGUvUmVzb3VyY2VSZWYjIiB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6NTNFQUM4ODMwQzNDMTFFOUE2ODBGNjc1QTE2M0QzNzIiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6NTNFQUM4ODIwQzNDMTFFOUE2ODBGNjc1QTE2M0QzNzIiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENDIDIwMTggKFdpbmRvd3MpIj4gPHhtcE1NOkRlcml2ZWRGcm9tIHN0UmVmOmluc3RhbmNlSUQ9InhtcC5paWQ6NzJBNjE2MzAwQzNCMTFFOUE4NDc5N0FBNzY4N0ZFMUYiIHN0UmVmOmRvY3VtZW50SUQ9InhtcC5kaWQ6NzJBNjE2MzEwQzNCMTFFOUE4NDc5N0FBNzY4N0ZFMUYiLz4gPC9yZGY6RGVzY3JpcHRpb24+IDwvcmRmOlJERj4gPC94OnhtcG1ldGE+IDw/eHBhY2tldCBlbmQ9InIiPz53mYnzAAABiElEQVR42uzbyQ3CMBAFUNMKLdATLdACLYQiacEQKQcrJHiZ7duekSwORMr8h0gcG0L4rdt3PINXrlajW4wxpOMI8/0d6zuLm53Wshm996hnmNFRs5jxCPUfpqPmMX9Q17r+wXTUPGaKei09eHbUIp/9NdRRiZhHd3lHJWAegToqAfMM1FEr8peCzoxalbsGdEbU6ry1oDOhNuVsAZ0BtTlfK+jIqKRcFNARUcl5qKAjobLk4AAdAZWtfy7QnlFZ++YE7RGVvV9u0J5QRfqUAO0BVaw/KVBkVNG+JEERUcX7kQZFQlXpQwMUAVXt/Fqglqiq59UEtUBV/xC1QTVDmnwjLEA1wppds61AJUOb3gAtQSXCm0/RrEE5ESDmuwigHBgwT2QooBQUqMdbJNBSnEdy/ANtAQYNtBT1vg241SxE0FJUyPVWVFAqqtniNTJoK6rp9go6aC2q+V5VD6BwU6MRQHOoMFvTPYGeoUL9eKI30LWeCSbcf1D3oJfQR9231xciaFofAQYAfyG4Tw36XToAAAAASUVORK5CYII=) no-repeat; -moz-appearance: none; -webkit-appearance: none; appearance: none; background-size: 13px; background-position: right 9px; background-origin: content-box; border-radius: 4px; width: 100%;">
                                                    <option value="">Select </option>
                                                    <option value="RAISED">Raised </option>
                                                    <option value="PROCESSING">Processing </option>
                                                    <option value="COMPLETED">Completed </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <div class="form-group">
                                                <label style="font-size: 13px; color: #999999;">Year </label>
                                                <select v-model="filter.year" class="form-control" style="font-size: 15px; appearance: none; background: #ffffff url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAFQAAAAuCAYAAAC20j5mAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyZpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuNi1jMTQyIDc5LjE2MDkyNCwgMjAxNy8wNy8xMy0wMTowNjozOSAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wTU09Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9tbS8iIHhtbG5zOnN0UmVmPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvc1R5cGUvUmVzb3VyY2VSZWYjIiB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6NTNFQUM4ODMwQzNDMTFFOUE2ODBGNjc1QTE2M0QzNzIiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6NTNFQUM4ODIwQzNDMTFFOUE2ODBGNjc1QTE2M0QzNzIiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENDIDIwMTggKFdpbmRvd3MpIj4gPHhtcE1NOkRlcml2ZWRGcm9tIHN0UmVmOmluc3RhbmNlSUQ9InhtcC5paWQ6NzJBNjE2MzAwQzNCMTFFOUE4NDc5N0FBNzY4N0ZFMUYiIHN0UmVmOmRvY3VtZW50SUQ9InhtcC5kaWQ6NzJBNjE2MzEwQzNCMTFFOUE4NDc5N0FBNzY4N0ZFMUYiLz4gPC9yZGY6RGVzY3JpcHRpb24+IDwvcmRmOlJERj4gPC94OnhtcG1ldGE+IDw/eHBhY2tldCBlbmQ9InIiPz53mYnzAAABiElEQVR42uzbyQ3CMBAFUNMKLdATLdACLYQiacEQKQcrJHiZ7duekSwORMr8h0gcG0L4rdt3PINXrlajW4wxpOMI8/0d6zuLm53Wshm996hnmNFRs5jxCPUfpqPmMX9Q17r+wXTUPGaKei09eHbUIp/9NdRRiZhHd3lHJWAegToqAfMM1FEr8peCzoxalbsGdEbU6ry1oDOhNuVsAZ0BtTlfK+jIqKRcFNARUcl5qKAjobLk4AAdAZWtfy7QnlFZ++YE7RGVvV9u0J5QRfqUAO0BVaw/KVBkVNG+JEERUcX7kQZFQlXpQwMUAVXt/Fqglqiq59UEtUBV/xC1QTVDmnwjLEA1wppds61AJUOb3gAtQSXCm0/RrEE5ESDmuwigHBgwT2QooBQUqMdbJNBSnEdy/ANtAQYNtBT1vg241SxE0FJUyPVWVFAqqtniNTJoK6rp9go6aC2q+V5VD6BwU6MRQHOoMFvTPYGeoUL9eKI30LWeCSbcf1D3oJfQR9231xciaFofAQYAfyG4Tw36XToAAAAASUVORK5CYII=) no-repeat; -moz-appearance: none; -webkit-appearance: none; appearance: none; background-size: 13px; background-position: right 9px; background-origin: content-box; border-radius: 4px; width: 100%;">
                                                    <option value="">Select</option>
                                                    <option :value="new Date().getFullYear()-3">{{ new Date().getFullYear()-3 }} </option>
                                                    <option :value="new Date().getFullYear()-2">{{ new Date().getFullYear()-2 }} </option>
                                                    <option :value="new Date().getFullYear()-1">{{ new Date().getFullYear()-1 }} </option>
                                                    <option :value="new Date().getFullYear()">{{ new Date().getFullYear() }} </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <button class="btn btn-default dv_save_account_info_btn float-left mt-4 mb-0 w-auto" @click="filterData">
                                                filter
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h5 class="dv_accounts_page_head">
                                See how your complaints are managed and check the latest status of your complaints
                            </h5>
                            <div class="dv_account_pages_data_wrapper">
                                <div class="dv_per_ordered_page" v-for="(getOrder,index) in complaints" :key="index" @click="orderDetail(getOrder)">
                                    <div class="dv_order_details d-inline">
                                        {{ getOrder.get_invoice.invoice }}
                                    </div>
                                    <div class="ml-2 d-inline" :class="order_shipping_statuses[getOrder.get_status_shipping.status].class">{{ order_shipping_statuses[getOrder.get_status_shipping.status].label }}</div>
                                    <div class="mt-2" :class="complaint_statuses[getOrder.get_status_shipping.complaint_status].class">Complaint Status: {{ complaint_statuses[getOrder.get_status_shipping.complaint_status].label }}</div>
                                    <div class="dv_product_per_ordered" v-for="(item,index) in getOrder.get_items" :key="index">
                                        <img v-if="item.image" :src="item.image" alt="" title="">
								        <img v-else :src="baseUrlImage+'images/default_web.jpg'" alt="" title="">
                                        <div class="dv_per_products_details">
                                            <div class="dv_product_name_orde">
                                                {{ item.product_name }}
                                            </div>
                                            <!-- <div class="dv_product_processing">
                                                processing
                                            </div> -->
                                        </div>
                                    </div>

                                    <ul class="dv_coversation_ul">
                                        <li v-for="(complaint,index) in getOrder.get_complaints" :key="index">
                                            <span class="dv_sent_by_me" v-if="complaint['user_id']" >me</span>
                                            <span class="dv_sent_by_mirrors" v-else>mirrors</span>
                                            {{ complaint['message'] }} 
                                            <b class="red-text"> <span>{{ complaint['created_at'] }}</span></b> 
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <h5 class="dv_accounts_page_head">FAQ's </h5>
                            <div class="dv_show_question_card">
                                <div class="dv_question_txt_help">
                                    I missed the delivery of my order today. What should I do?
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg>
                                </div>
                                <div class="dv_answer_txt_help">
                                    The courier service delivering your order usually tries to deliver on the next business day in case you miss a delivery. You can check your SMS for more details on when the courier service will try to deliver again.
                                </div>
                            </div>
                            <div class="dv_show_question_card">
                                <div class="dv_question_txt_help">
                                    Will the delivery be tried again if I'm not able to collect my order the first time?
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg>
                                </div>
                                <div class="dv_answer_txt_help">
                                    Couriers make sure that the delivery is re-attempted the next working day if you can't collect your order the first time.
                                </div>
                            </div>
                            <div class="dv_show_question_card">
                                <div class="dv_question_txt_help">
                                    The delivery of my order is delayed. What should I do?
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg>
                                </div>
                                <div class="dv_answer_txt_help">
                                    On the rare occasion that your order is delayed, please check your email & messages for updates. A new delivery timeframe will be shared with you and you can also track its status by visiting My Orders.
                                </div>
                            </div>
                            <div class="dv_show_question_card">
                                <div class="dv_question_txt_help">
                                    What should I do if my order is approved but hasn't been shipped yet?
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg>
                                </div>
                                <div class="dv_answer_txt_help">
                                    Sellers usually ship orders 1-2 business days before the delivery date so that they reach you on time. In case your order hasn't been shipped within this time please contact our Customer Support so that we can look into it.
                                </div>
                            </div>
                            <div class="dv_show_question_card">
                                <div class="dv_question_txt_help">
                                    Can I take the shipment after opening and checking the contents inside?
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg>
                                </div>
                                <div class="dv_answer_txt_help">
                                    As per company policy, a shipment can't be opened before delivery, but you can accept the shipment and get in touch with us later in case you have any concerns.
                                </div>
                            </div>
                            <div class="dv_show_question_card">
                                <div class="dv_question_txt_help">
                                    How do I know my order has been confirmed?
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg>
                                </div>
                                <div class="dv_answer_txt_help">
                                    An e-mail & SMS will be sent once you've successfully placed your order. We'll also let you know as soon as the seller ships the item(s) to you along with the tracking number(s) for your shipment(s). You can track your orders from the 'My Orders' section on your Mirrors account.
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
import SideNavigation from '@web/components/profiles/SideNavigation'
import ProfileNavigation from '@web/components/profiles/ProfileNavigation'
import { mapState } from 'vuex'
import moment from 'moment'
import { GET_ORDER_BY_USER_ACTION } from '@web/store/orderConfirms/actions'
 export default {
    components: { SideNavigation,ProfileNavigation },
    data() {
        return {
            baseUrl: Vue.config.baseurl,
            baseUrlImage: Vue.config.baseUrlImage,
            getYearsData:[],
            getAllOrderData:[],
            getOrderResults:[],
            getOrderStatusData:[],
            getCurrentRoute: Vue.helpers.getCurrentRoute(),
            filter:{
                status:'',
                year:''
            },
            order_shipping_statuses: {
                N: {
                    label: 'Place Order',
                    class: 'dv_product_processing'
                },
                V: {
                    label: 'Confirmed',
                    class: 'dv_product_processing'
                },
                S: {
                    label: 'Shipped',
                    class: 'dv_product_delivered'
                },
                D: {
                    label: 'Delivered',
                    class: 'dv_product_delivered'
                },
                R: {
                    label: 'Returned',
                    class: 'dv_product_cancelled'
                },
                C: {
                    label: 'Cancelled',
                    class: 'dv_product_cancelled'
                }
            },
            complaint_statuses: {
                RAISED: {
                    label: 'RAISED',
                    class: 'dv_product_cancelled'
                },
                PROCESSING: {
                    label: 'PROCESSING',
                    class: 'dv_product_processing'
                },
                COMPLETED: {
                    label: 'COMPLETED',
                    class: 'dv_product_delivered'
                }
            },
            complaints: []
        }
    },
    watch: {
        '$route': function () {
            this.getOrderByUsers();
        }
    },
    computed:{
        ...mapState({
            getOrderByUser:state => state.OrderConfirm.getOrderByUser
        })
    },
    mounted() {
        this.getOrderByUsers();
    },
    methods: {
        getOrderByUsers:function(){	
            let _this = this;
            if(!Vue.helpers.isEmpty(_this.$user)){
                _this.$store.dispatch('OrderConfirm/'+GET_ORDER_BY_USER_ACTION ,_this.$user.id).then(function(){
                    _this.getAllOrderData = _this.getOrderByUser;
                    _this.getOrderResults = _this.getOrderByUser;
                    _this.complaints = _this.getOrderResults.filter(order => order.get_complaints.length > 0);
                });
            }
        },
        filterData: function() {
            this.complaints = [];
            let order_complaints = this.getOrderResults.filter(order => order.get_complaints.length > 0);
            for(let i = 0; i<order_complaints.length; i++) {
                let year = new Date(order_complaints[i].get_complaints[0]['created_at']).getFullYear();
                if (this.filter.year && (this.filter.year!=year)) {
                    continue;
                }
                if (this.filter.status && (this.filter.status!=order_complaints[i].get_status_shipping.complaint_status)) {
                    continue;
                }
                this.complaints.push(order_complaints[i]);
            };
        },
        orderDetail:function(order){
            let _this = this;
            _this.$router.replace({name:'getOrderDetails',params:{country_leng:Vue.helpers.getLang(),session_id:order.session_id}});
        }
    }
 }
</script>
<style type="text/css">
.red-text {color: red; text-transform: capitalize;}
.blue-text {color: blue; text-transform: capitalize;}
.green-text {color: green; text-transform: capitalize;}
ul.dv_coversation_ul {
    display: block;
    margin: 0;
    padding: 0;
}
ul.dv_coversation_ul>li {
    list-style-type: none;
    display: block;
    border: 1px solid #ebebeb;
    padding: 15px 70px 15px 15px;
    margin: 0 0 15px 0;
    border-radius: 5px;
    position: relative;
    font-size: 13px;
}
ul.dv_coversation_ul>li>span {
    display: block;
    position: absolute;
    right: 10px;
    top: 0;
}
span.dv_sent_by_me {
    background: #ebebeb;
    padding: 2px 12px;
    border-radius: 0px 0px 5px 5px;
}
ul.dv_coversation_ul>li>b {
    font-family: "Sailec-Bold";
    font-weight: normal;
    display: block;
    margin: 5px 0;
}
ul.dv_coversation_ul>li>b>span {
    display: block;
    font-family: "Sailec-Regular";
    color: #999999;
    margin: 5px 0;
}
span.dv_sent_by_mirrors {
    background: #000000;
    color: #ffffff;
    padding: 2px 12px;
    border-radius: 0px 0px 5px 5px;
}
</style>