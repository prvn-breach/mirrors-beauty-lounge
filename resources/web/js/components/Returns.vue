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
									orders
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
							<h5 class="dv_accounts_page_head">
								My Returns
							</h5>
							<div class="dv_account_pages_data_wrapper" >
								<div class="dv_per_ordered_page" v-for="(getOrder,index) in getOrderResults.filter(order => order.get_status_shipping.status == 'R')" :key="index" @click="orderDetail(getOrder)">
									<div class="d-flex">
										<div class="dv_order_details">
											{{ getOrder.get_invoice.invoice }}
										</div>
										<div style="height:29px;margin-left:10px;padding-top:7px;padding-bottom:7px;" :class="return_statuses[getOrder.get_status_shipping.return_status].class">{{ return_statuses[getOrder.get_status_shipping.return_status].label }}</div>
									</div>
									<div class="dv_product_per_ordered" v-for="(item,index) in getOrder.get_items" :key="index">
										<img v-if="item.image" :src="item.image" alt="" title="">
										<img v-else :src="baseUrlImage+'images/default_web.jpg'" alt="" title="">
										<div class="dv_per_products_details">
											<div class="dv_product_name_orde">
												{{ item.product_name }}
											</div>
											<!-- <div :class="getOrderItemStatus(item.get_item_status.status,getOrder).class">
												{{ getOrderItemStatus(item.get_item_status.status,getOrder).status }}
											</div> -->
										</div>
									</div>
									
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
<script type="text/javascript">
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
				baseUrl:Vue.config.baseurl,
				baseUrlImage:Vue.config.baseUrlImage,
				getYearsData:[],
				getAllOrderData:[],
				getOrderResults:[],
				getOrderStatusData:[],
				getCurrentRoute:Vue.helpers.getCurrentRoute(),
				filter:{
					status:'',
					year:''
				},
				return_statuses: {
					PENDING: {
						label: 'Return Pending',
						class: 'dv_product_processing'
					},
					COMPLETED: {
						label: 'Return Completed',
						class: 'dv_product_delivered'
					}
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
            }
        },
        watch: {
		    '$route': function () {
		      	this.getOrderByUsers();
		      	this.getYears();
		      	this.getOrderStatus();
		    },
		    
		  },
		   computed:{
	        	...mapState({
	             getOrderByUser:state => state.OrderConfirm.getOrderByUser
	            
	      

	        }),
	        },
         methods: {
         	orderDetail:function(order){
         		let _this = this;
         		_this.$router.replace({name:'getOrderDetails',params:{country_leng:Vue.helpers.getLang(),session_id:order.session_id}});
         	},
         	getResultFilter:function(){
         		let _this = this;
         		let getAllData = _this.getAllOrderData;
         		if(getAllData.length > 0){
         			if(_this.filter.status != ''){
         				getAllData = getAllData.filter(function(item){
	         				return item.get_status_shipping.status == _this.filter.status;
	         				});
         			}
         			if(_this.filter.year != ''){
         				getAllData = getAllData.filter(function(item){
	         				return moment(item.created_at).format('YYYY') == _this.filter.year;
	         				});
         			}

	         		_this.getOrderResults = getAllData;
         		}
         	},
         	getOrderStatus:function(){
         		let getOrderStatus = Vue.helpers.getOrderStatus();
         		this.getOrderStatusData=getOrderStatus;
         	},
         	getYears:function(){
         		let getYears = Vue.helpers.generateArrayOfYears();
         		this.getYearsData=getYears;
         	},

         	 getOrderItemStatus:function(status,getOrder){
            let _this = this;
            if(getOrder.get_status_shipping.status != 'F' && getOrder.get_status_shipping.status != 'R'){
	            switch(status){
	              case 'P':
	                return {'status':'Processing','class':''};
	              break;
	              case 'R':
	               return {'status':'Returned','class':''};
	              break;
	              case 'C':
	                 return {'status':'Cancelled','class':''};
	              break;
	              case 'D':
	               return {'status':'Delivered','class':'dv_product_delivered'};
	              break;

	            }
        }else{
        	if(getOrder.get_status_shipping.status == 'F'){
        		return {'status':'Cancelled','class':''};
        	}else{
        		return {'status':'Returned','class':''};
        	}
        }
          },
         	getOrderByUsers:function(){
         		
         		let _this = this;
         		if(!Vue.helpers.isEmpty(_this.$user)){
	            	_this.$store.dispatch('OrderConfirm/'+GET_ORDER_BY_USER_ACTION ,_this.$user.id).then(function(){
	            		_this.getAllOrderData = _this.getOrderByUser;
	            		_this.getOrderResults = _this.getOrderByUser;
	            	});
            	}
         	}
         },
         mounted(){
         	this.getOrderByUsers();
         	this.getYears();
         	this.getOrderStatus();
         }

 }
 
</script>
		