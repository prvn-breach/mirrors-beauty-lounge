<template>
	<div >
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
					<router-link :to="{ name: 'getCheckoutShipping', params: {country_leng:getLeng() } }" class="dv_backto_incheckout">
						<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"><polyline points="15 18 9 12 15 6"></polyline></svg>
						Back to to shipping address 
					</router-link>
					<div class="row">
						<h4 class="dv_heading_pickup_address">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-map-pin"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
							shipping address
						</h4>
						<div class="col-md-6">
							<div class="dv_address_card_wrapper">
								<h4 class="dv_address_form_head">map location
									<span>
										<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 384 384" style="enable-background:new 0 0 384 384;" xml:space="preserve"> <g> <g> <path d="M192,136c-30.872,0-56,25.12-56,56s25.128,56,56,56s56-25.12,56-56S222.872,136,192,136z M192,216 c-13.232,0-24-10.768-24-24s10.768-24,24-24s24,10.768,24,24S205.232,216,192,216z"></path> </g> </g> <g> <g> <path d="M368,176h-32.944C327.648,109.368,274.632,56.352,208,48.944V16c0-8.832-7.168-16-16-16c-8.832,0-16,7.168-16,16v32.944 C109.368,56.352,56.352,109.368,48.944,176H16c-8.832,0-16,7.168-16,16c0,8.832,7.168,16,16,16h32.944 C56.352,274.632,109.368,327.648,176,335.056V368c0,8.832,7.168,16,16,16c8.832,0,16-7.168,16-16v-32.944 c66.632-7.408,119.648-60.424,127.056-127.056H368c8.832,0,16-7.168,16-16C384,183.168,376.832,176,368,176z M192,304 c-61.76,0-112-50.24-112-112S130.24,80,192,80s112,50.24,112,112S253.76,304,192,304z"></path> </g> </g> </svg>
										use current location
									</span>
								</h4>
								<div class="dv_location_for_all"></div>
							</div>
						</div>

						<div class="col-md-6">
							<div class="dv_address_card_wrapper">
								<h4 class="dv_address_form_head">enter shipping detail</h4>
								<div class="material-textfield mb-3">
							      <input placeholder="" type="tel" id="mobileno" class="form-control dv_material_input" placeholder="Enter" @input="setMobile($event.target.value)" v-model="getAddress.mobile" :class="status($v.getAddress.mobile)">
							      <label class="dv_material_lbl">Mobile </label>
							    </div>	
								<div class="material-textfield mb-3">
							      <input placeholder="" type="tel" id="telephoneno" class="form-control dv_material_input" placeholder="Enter"  v-model="getAddress.telephone" >
							      <label class="dv_material_lbl">Telephone</label>
							    </div>								
								<div class="material-textfield mb-3">
							      <input placeholder=" " type="text" class="form-control dv_material_input" @input="setAddress($event.target.value)" v-model="getAddress.address" :class="status($v.getAddress.address)">
							      <label class="dv_material_lbl">Address</label>
							    </div>
							   						
								<div class="material-textfield mb-3">
							      <input placeholder=" " type="text" class="form-control dv_material_input" @input="setCity($event.target.value)" v-model="getAddress.city" :class="status($v.getAddress.city)">
							      <label class="dv_material_lbl">City</label>
							    </div>							
								<div class="material-textfield mb-3">
							      <input placeholder=" " type="text" class="form-control dv_material_input" v-model="getAddress.postal_code" @input="setPincode($event.target.value)" :class="status($v.getAddress.postal_code)">
							      <label class="dv_material_lbl" >Postal code</label>
							    </div>	
							    <div class="material-textfield mb-3">
							      <input placeholder=" " type="text" class="form-control dv_material_input" @input="setState($event.target.value)" v-model="getAddress.state" :class="status($v.getAddress.state)">
							      <label class="dv_material_lbl">State</label>
							    </div> 
							    <div class="material-textfield mb-3">
							      <input placeholder=" " type="text" class="form-control dv_material_input" @input="setCountry($event.target.value)" v-model="getAddress.country" :class="status($v.getAddress.country)">
							      <label class="dv_material_lbl">Country</label>
							    </div>						
								<div class="material-textfield mb-3">
							      <input placeholder=" " type="text" class="form-control dv_material_input" style=" height: 70px;" 
							       v-model="getAddress.comments" >
							      <label class="dv_material_lbl">Comments </label>
							    </div>
							    <div class="btn-group mb-2" data-toggle="buttons" >
									<label class="btn btn-primary dv_group_btn_addres_type " :class="[status($v.getAddress.type),getCheckedActive('home')]">
										<input type="radio" name="options" id="option1" @change="checkAddressOption($event,'home')" :checked="getAddress.type == 'home'"> Home
									</label>
									<label class="btn btn-primary dv_group_btn_addres_type" :class="[status($v.getAddress.type), getCheckedActive('office')]">
										<input type="radio" name="options" id="option2" @change="checkAddressOption($event,'office')" :checked="getAddress.type == 'office'"> Office
									</label>
									<label class="btn btn-primary dv_group_btn_addres_type" :class="[status($v.getAddress.type),getCheckedActive('other')]">
										<input type="radio" name="options" id="option3" @change="checkAddressOption($event,'other')" :checked="getAddress.type == 'other'"> Other
									</label>
								</div>
							    <button type="button" class="btn btn-default dv_submit_address_btn" @click="getSaveAddress">Submit </button>
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
import { required, minLength } from 'vuelidate/lib/validators'
import { mapState } from 'vuex'
import { SAVE_ADDRESS_LIST_ACTION,GET_ADDRESS_BY_ID_LIST_ACTION } from '@web/store/addresses/actions'
 export default {
 	 components: {  },
 	  data() {
            return {
              baseUrl:Vue.config.baseurl,
              baseUrlImage:Vue.config.baseUrlImage,
              getAddress:{
              	id:'',
              	telephone:'',
              	mobile:'',
              	address:'',
              	city:'',
              	postal_code:'',
              	state:'',
              	country:'',
              	comments:'',
              	type:'',
              	user_id:'',
              }
            }
        },
         validations: {
         	getAddress:{
              	mobile:{
              		required
              	},
              	address:{
              		required
              	},
              	city:{
              		required
              	},
              	postal_code:{
              		required
              	},
              	state:{
              		required
              	},
              	country:{
              		required
              	},
              	type:{
              		required
              	}
              }
		  },
		  watch: {
		    '$route': function () {
		      	this.getAddressById();
		    },
		    
		  },
		   computed:{
	        	...mapState({
	             getAddressData:state => state.Addresses.getAddress
	            
	      

	        }),
	      },
         methods: {
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
         	getCheckedActive:function(type){
         		let _this = this;
         		if(type == _this.getAddress.type){
         			return 'active'
         		}
         	},
         	getSaveAddress:function(){
         		let _this = this;
         		_this.$v.getAddress.$touch();
         		if (_this.$v.getAddress.$invalid) {
			      } else {
			      	if(Object.keys(_this.$user).length > 0){
			      		_this.getAddress.user_id = _this.$user.id;
			      	  _this.$store.dispatch('Addresses/' + SAVE_ADDRESS_LIST_ACTION,_this.getAddress).then(function(e){
			      	  	_this.$router.push({name:'getCheckoutShipping'});
			      	  })
			      	}

			      }
         	},
         	checkAddressOption:function(event,option){
         		let _this = this;
         		_this.getAddress.type = option;
         	},
         	status(validation) {
         		if(validation != undefined){
			    	return {
			      	error: validation.$error,
			        dirty: validation.$dirty
			      }
         		}
		    },
		    setMobile:function(value){
		    	 this.getAddress.mobile = value
      			this.$v.getAddress.mobile.$touch()
		    }, 
		    
		    setAddress:function(value){
		    	 this.getAddress.address = value
      			this.$v.getAddress.address.$touch()
		    },
		    setCity:function(value){
		    	 this.getAddress.city = value
      			this.$v.getAddress.city.$touch()
		    }, 
		    setPincode:function(value){
		    	 this.getAddress.postal_code = value
      			this.$v.getAddress.postal_code.$touch()
		    },
		    setState:function(value){
		    	 this.getAddress.state = value
      			this.$v.getAddress.state.$touch()
		    },
		    setCountry:function(value){
		    	this.getAddress.country = value
      			this.$v.getAddress.country.$touch()
		    },

		    getAddressById:function(){
		    	let _this = this;
                let params = this.$route.params;
                if (params.address_id != undefined) {
                	_this.$store.dispatch('Addresses/' + GET_ADDRESS_BY_ID_LIST_ACTION,params.address_id).then(function(e){
			      	  	if(Object.keys(_this.getAddressData).length > 0){
			      	  		_this.getAddress = _this.getAddressData;
			      	  	}
			      	  })
                }
		    }
		   
         },
         mounted(){
         	this.getAddressById();
         }

 }
</script>