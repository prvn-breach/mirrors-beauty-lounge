<template>
	<div>
		<div class="dv_three_steps_container">
			<div class="container-fluid">
				<ul class="dv_three_step_ul">
					<li class="active">
						shipping
					</li>
					<li >
						payment
					</li>
					<li>
						confirm
					</li>
				</ul>
			</div>
		</div>
		<div class="dv_three_container_content">

			

			<div class="dv_shipping_pickup_wrapper">
				<div class="container-fluid">
					<div class="row" v-if="getCarts.get_cart_pickup_location == null">
						<h4 class="dv_heading_pickup_address">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-map-pin"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
							shipping address
						</h4>
						<div class="col-md-4">
							<div class="dv_per_address_wrapper">
								<div class="dv_add_new_address_click" @click="addAddress">
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
									add new address
								</div>
							</div>
						</div>
						<div class="col-md-4" v-for="(address,index) in getAddresses.filter(address => address.status == 1)" :key="index">
							<div class="dv_per_address_wrapper " @click="getSelectAddress(address,getCarts.get_cart_address)" :class="{ 'dv_selected_Address': getCarts.get_cart_address!=null && (getCarts.get_cart_address.address_id == address.id) }">
								<ul class="dv_address_type_ul">
									<li>
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg> type : <span>{{ address.type }} </span>
									</li>
									<li>
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg> name : <span>{{ $user.name }} </span></li>
									<li>
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-map-pin"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg> address : <span>{{ address.address }} </span></li>
									<li>
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-phone"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>contact : <span>{{ address.mobile }}</span></li>
									</ul>
							</div>
							<ul class="dv_edit_delete_address_ul">
								<li>

									<router-link :to="{ name: 'AddAddressAccount', params: {country_leng:getLeng(),address_id: address.id }, query: { prevRoute:'get-checkout-shipping' } }" >
										edit
									</router-link>
								</li>
								<li>
									<a href="javascript:void(0)" @click="deleteAddress(address)">
										delete
									</a>
								</li>
							</ul>
						</div>
						

					</div>
					<div class="row" v-if="getCarts.get_cart_address == null">
						<h4 class="dv_heading_pickup_address">
							<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 489.4 489.4" style="enable-background:new 0 0 489.4 489.4;width: 24px;height: 24px;margin: 0 5px 3px 0;" xml:space="preserve"> <g> <g> <path d="M347.7,263.75h-66.5c-18.2,0-33,14.8-33,33v51c0,18.2,14.8,33,33,33h66.5c18.2,0,33-14.8,33-33v-51 C380.7,278.55,365.9,263.75,347.7,263.75z M356.7,347.75c0,5-4.1,9-9,9h-66.5c-5,0-9-4.1-9-9v-51c0-5,4.1-9,9-9h66.5 c5,0,9,4.1,9,9V347.75z"></path> <path d="M489.4,171.05c0-2.1-0.5-4.1-1.6-5.9l-72.8-128c-2.1-3.7-6.1-6.1-10.4-6.1H84.7c-4.3,0-8.3,2.3-10.4,6.1l-72.7,128 c-1,1.8-1.6,3.8-1.6,5.9c0,28.7,17.3,53.3,42,64.2v211.1c0,6.6,5.4,12,12,12h66.3c0.1,0,0.2,0,0.3,0h93c0.1,0,0.2,0,0.3,0h221.4 c6.6,0,12-5.4,12-12v-209.6c0-0.5,0-0.9-0.1-1.3C472,224.55,489.4,199.85,489.4,171.05z M91.7,55.15h305.9l56.9,100.1H34.9 L91.7,55.15z M348.3,179.15c-3.8,21.6-22.7,38-45.4,38c-22.7,0-41.6-16.4-45.4-38H348.3z M232,179.15c-3.8,21.6-22.7,38-45.4,38 s-41.6-16.4-45.5-38H232z M24.8,179.15h90.9c-3.8,21.6-22.8,38-45.5,38C47.5,217.25,28.6,200.75,24.8,179.15z M201.6,434.35h-69 v-129.5c0-9.4,7.6-17.1,17.1-17.1h34.9c9.4,0,17.1,7.6,17.1,17.1v129.5H201.6z M423.3,434.35H225.6v-129.5 c0-22.6-18.4-41.1-41.1-41.1h-34.9c-22.6,0-41.1,18.4-41.1,41.1v129.6H66v-193.3c1.4,0.1,2.8,0.1,4.2,0.1 c24.2,0,45.6-12.3,58.2-31c12.6,18.7,34,31,58.2,31s45.5-12.3,58.2-31c12.6,18.7,34,31,58.1,31c24.2,0,45.5-12.3,58.1-31 c12.6,18.7,34,31,58.2,31c1.4,0,2.7-0.1,4.1-0.1L423.3,434.35L423.3,434.35z M419.2,217.25c-22.7,0-41.6-16.4-45.4-38h90.9 C460.8,200.75,441.9,217.25,419.2,217.25z"></path> </g> </g> </svg>
							pickup from store
						</h4>
						
						<div class="col-md-4">
							<div class="dv_per_address_wrapper">
								<div class="dv_add_new_address_click" @click="pickupFromStore">
									<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 489.4 489.4" style="enable-background:new 0 0 489.4 489.4;" xml:space="preserve"> <g> <g> <path d="M347.7,263.75h-66.5c-18.2,0-33,14.8-33,33v51c0,18.2,14.8,33,33,33h66.5c18.2,0,33-14.8,33-33v-51 C380.7,278.55,365.9,263.75,347.7,263.75z M356.7,347.75c0,5-4.1,9-9,9h-66.5c-5,0-9-4.1-9-9v-51c0-5,4.1-9,9-9h66.5 c5,0,9,4.1,9,9V347.75z"/> <path d="M489.4,171.05c0-2.1-0.5-4.1-1.6-5.9l-72.8-128c-2.1-3.7-6.1-6.1-10.4-6.1H84.7c-4.3,0-8.3,2.3-10.4,6.1l-72.7,128 c-1,1.8-1.6,3.8-1.6,5.9c0,28.7,17.3,53.3,42,64.2v211.1c0,6.6,5.4,12,12,12h66.3c0.1,0,0.2,0,0.3,0h93c0.1,0,0.2,0,0.3,0h221.4 c6.6,0,12-5.4,12-12v-209.6c0-0.5,0-0.9-0.1-1.3C472,224.55,489.4,199.85,489.4,171.05z M91.7,55.15h305.9l56.9,100.1H34.9 L91.7,55.15z M348.3,179.15c-3.8,21.6-22.7,38-45.4,38c-22.7,0-41.6-16.4-45.4-38H348.3z M232,179.15c-3.8,21.6-22.7,38-45.4,38 s-41.6-16.4-45.5-38H232z M24.8,179.15h90.9c-3.8,21.6-22.8,38-45.5,38C47.5,217.25,28.6,200.75,24.8,179.15z M201.6,434.35h-69 v-129.5c0-9.4,7.6-17.1,17.1-17.1h34.9c9.4,0,17.1,7.6,17.1,17.1v129.5H201.6z M423.3,434.35H225.6v-129.5 c0-22.6-18.4-41.1-41.1-41.1h-34.9c-22.6,0-41.1,18.4-41.1,41.1v129.6H66v-193.3c1.4,0.1,2.8,0.1,4.2,0.1 c24.2,0,45.6-12.3,58.2-31c12.6,18.7,34,31,58.2,31s45.5-12.3,58.2-31c12.6,18.7,34,31,58.1,31c24.2,0,45.5-12.3,58.1-31 c12.6,18.7,34,31,58.2,31c1.4,0,2.7-0.1,4.1-0.1L423.3,434.35L423.3,434.35z M419.2,217.25c-22.7,0-41.6-16.4-45.4-38h90.9 C460.8,200.75,441.9,217.25,419.2,217.25z"/> </g> </g> </svg>
									Pick up from store
								</div>
							</div>
						</div>
						
						<div class="col-md-4" v-if="getCarts.get_cart_pickup_location != null">
						    <div class="dv_per_address_wrapper dv_selected_Address">
						        <ul class="dv_address_type_ul">
						            <li>
						                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
						                    <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
						                    <polyline points="9 22 9 12 15 12 15 22"></polyline>
						                </svg>
						                Shop / Location : <span>{{ getCarts.get_cart_pickup_location.shop_no }} / {{  getCarts.get_cart_pickup_location.name }}</span>
						            </li>
						            <li>
						                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-map-pin">
						                    <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
						                    <circle cx="12" cy="10" r="3"></circle>
						                </svg>
						                street name : <span>{{  getCarts.get_cart_pickup_location.street_name }}</span>
						            </li>
						            <li>
						                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-phone">
						                    <path
						                        d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"
						                    ></path>
						                </svg>
						                Tel : <span>{{  getCarts.get_cart_pickup_location.telephone }}</span>
						            </li>
						            <li>
						                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-phone-call">
						                    <path
						                        d="M15.05 5A5 5 0 0 1 19 8.95M15.05 1A9 9 0 0 1 23 8.94m-1 7.98v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"
						                    ></path>
						                </svg>
						                contact : <span>{{  getCarts.get_cart_pickup_location.mobile }}</span>
						            </li>
						        </ul>
						    </div>
						    <ul class="dv_edit_delete_address_ul">
								<li></li>
								<li>
									<a href="javascript:void(0)" @click="deletePickupLocation(getCarts.get_cart_pickup_location)">
										delete
									</a>
								</li>
							</ul>
						</div>



					</div>
					<div class="row">
						<div class="col-md-12 text-center">
							<button type="button" class="btn btn-default dv_continue_to_payment" v-if="getCarts.get_cart_address != null || getCarts.get_cart_pickup_location != null" @click="gotoNext">
								continue to payment
							</button> 
						</div>
					</div>
				</div>				
			</div>
	</div>
</div>
</template>
<script type="text/javascript">
 import Vue from 'vue'
 import { mapState } from 'vuex'
 import { uuid } from 'vue-uuid'
 import { GET_ADDRESS_LIST_ACTION,DELETE_ADDRESS_ACTION,SAVE_CART_ADDRESS_ACTION } from '@web/store/addresses/actions'
 import { GET_PICKUP_BY_ID_LIST_ACTION,GET_PICKUP_LIST_ACTION,DELETE_PICKUP_LOCATION_ACTION } from '@web/store/pickupLocations/actions'
 export default {
 	 components: {  },
 	  data() {
            return {
              baseUrl:Vue.config.baseUrl,
              baseUrlImage:Vue.config.baseUrlImage,
              getVatData:{},
              getSessionId:Vue.helpers.getSession(),
            }
        },
       props: {
            getCartItems: {
                getCartItems: Object,
                required: true,
            },
            getCarts: {
                getCarts: Object,
                required: true,
            },
            getTotal: {
                getTotal: Object,
                required: true,
            }
        },
         watch: {
		    '$route': function () {
		      	this.getAddressFunc();
		      	
		    },
		    
		  },
        computed:{
	        	...mapState({
	            getAddresses:state => state.Addresses.getAddresses
	        }),
	        },
         methods: {
         	gotoNext:function(){
				window.location.href = this.baseUrl+'get-checkout-payment/'+this.$route.params.country_leng;
         		// this.$router.push({name:'getCheckoutPayment'})
         	},
         	deletePickupLocation:function(pickup){
         		let _this = this;

         		if(Object.keys(_this.$user).length > 0 && _this.getSessionId != null){
 				let query = new URLSearchParams({
	         			cart_id:pickup.cart_id,
	         			user_id:_this.$user.id,
	         			session_id:_this.getSessionId,
	         		}).toString();
         		this.$store.dispatch('PickupLocation/'+DELETE_PICKUP_LOCATION_ACTION ,query).then(function(){
         			_this.$emit('get-change-cart');
         		});
         	}
         	},
         	pickupFromStore:function(){
         		this.$router.push({name:'getStorePickup'})
         	},
         	
         	getSelectAddress:function(address,cartAddress){
         			let _this = this;
         		if(Object.keys(_this.$user).length > 0 && _this.getSessionId != null){
         			let status = 'save';
         			if(cartAddress != null){
         				status = 'delete';
         			}
	         		_this.$store.dispatch('Addresses/' + SAVE_CART_ADDRESS_ACTION,{
	         			address:address,
	         			user_id:_this.$user.id,
	         			session_id:_this.getSessionId,
	         			status:status,
	         		}).then(function(e){
				      	  	_this.$emit('get-change-cart');
				      	  })
	         	}
         	},
         	deleteAddress:function(address){
         		let _this = this;
         		if(Object.keys(_this.$user).length > 0 && _this.getSessionId != null){
         			let query = new URLSearchParams({
	         			address_id:address.id,
	         			user_id:_this.$user.id,
	         			session_id:_this.getSessionId,
	         		}).toString();
         		_this.$store.dispatch('Addresses/'+DELETE_ADDRESS_ACTION ,query).then(function(){
         			_this.getAddressFunc();
         		});
         	}
         	},
         	getLeng:function(){
                 let _this = this;
                    var currentUrl = window.location.pathname;
                    if(currentUrl != ''){
                        currentUrl = currentUrl.split('/');
                        if(currentUrl.length > 0){
                            currentUrl = currentUrl[currentUrl.length - 1];

                        }
                        if(currentUrl != ''){
                            return currentUrl;
                        }
                    }

            },
         	addAddress:function(){
         		this.$router.push({name:'AddAddressAccount', query: { prevRoute: 'get-checkout-shipping' }}); 
         	},
            getAddressFunc:function(){
            	let _this = this;
            	if(!Vue.helpers.isEmpty(_this.$user)){
            	_this.$store.dispatch('Addresses/'+GET_ADDRESS_LIST_ACTION ,_this.$user.id).then(function(){});
            }
            }
         	
          },
         created() {
         	
           
        },
         mounted(){
         	
         	this.getAddressFunc();
         	
         	
         }

 }
</script>