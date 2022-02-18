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
							address
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
					<h4 class="dv_accounts_page_head_sm show-mobile-767">Address detail</h4>
					<div class="dv_shipping_pickup_wrapper">
						<router-link :to="{ name: 'getAddressAccount'}" class="dv_backto_incheckout">
							<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"><polyline points="15 18 9 12 15 6"></polyline></svg>
							Back to address list
						</router-link>
						<div class="row">
							<div class="col-md-12 mb-3">
								<div class="dv_address_card_wrapper">
									<h4 class="dv_address_form_head">map location
										<span @click="currentLocation">
											<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 384 384" style="enable-background:new 0 0 384 384;" xml:space="preserve"> <g> <g> <path d="M192,136c-30.872,0-56,25.12-56,56s25.128,56,56,56s56-25.12,56-56S222.872,136,192,136z M192,216 c-13.232,0-24-10.768-24-24s10.768-24,24-24s24,10.768,24,24S205.232,216,192,216z"/> </g> </g> <g> <g> <path d="M368,176h-32.944C327.648,109.368,274.632,56.352,208,48.944V16c0-8.832-7.168-16-16-16c-8.832,0-16,7.168-16,16v32.944 C109.368,56.352,56.352,109.368,48.944,176H16c-8.832,0-16,7.168-16,16c0,8.832,7.168,16,16,16h32.944 C56.352,274.632,109.368,327.648,176,335.056V368c0,8.832,7.168,16,16,16c8.832,0,16-7.168,16-16v-32.944 c66.632-7.408,119.648-60.424,127.056-127.056H368c8.832,0,16-7.168,16-16C384,183.168,376.832,176,368,176z M192,304 c-61.76,0-112-50.24-112-112S130.24,80,192,80s112,50.24,112,112S253.76,304,192,304z"/> </g> </g> </svg>
											use current location
										</span>
									</h4>
									<div class="dv_location_for_all" style="height: 350px;"></div>
								</div>
							</div>
							<div class="col-md-12">
								<div class="dv_address_card_wrapper">
									<h4 class="dv_address_form_head">enter shipping detail</h4>
									<div class="material-textfield mb-3">
										<input placeholder="" type="number" id="mobileno" class="form-control dv_material_input" placeholder="Enter" @input="setMobile($event.target.value)" v-model="getAddress.mobile" :class="status($v.getAddress.mobile)">
										<label class="dv_material_lbl">Mobile </label>
									</div>	
									<div class="material-textfield mb-3">
										<input placeholder="" type="number" id="telephoneno" class="form-control dv_material_input" placeholder="Enter"  v-model="getAddress.telephone" >
										<label class="dv_material_lbl">Telephone</label>
									</div>								
									<div class="material-textfield mb-3">
										<input placeholder=" " type="text" class="form-control dv_material_input" @input="setAddress($event.target.value)" v-model="getAddress.address" :class="status($v.getAddress.address)">
										<label class="dv_material_lbl">Address</label>
									</div>	
									<div class="material-textfield mb-3">
										<input placeholder=" " type="text" onkeypress="return /[a-z]/i.test(event.key)" class="form-control dv_material_input" @input="setCity($event.target.value)" v-model="getAddress.city" :class="status($v.getAddress.city)">
										<label class="dv_material_lbl">City</label>
									</div>							
									<div class="material-textfield mb-3">
										<input placeholder=" " type="number" class="form-control dv_material_input" v-model="getAddress.postal_code" @input="setPincode($event.target.value)" :class="status($v.getAddress.postal_code)">
										<label class="dv_material_lbl" >Postal code</label>
									</div>	
									<div class="material-textfield mb-3">
										<input placeholder=" " type="text"  onkeypress="return /[a-z]/i.test(event.key)" class="form-control dv_material_input" @input="setState($event.target.value)" v-model="getAddress.state" :class="status($v.getAddress.state)">
										<label class="dv_material_lbl">State</label>
									</div> 
									<div class="material-textfield mb-3">
										<input placeholder=" " type="text" onkeypress="return /[a-z]/i.test(event.key)" class="form-control dv_material_input" @input="setCountry($event.target.value)" v-model="getAddress.country" :class="status($v.getAddress.country)">
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
									<div class="material-textfield mb-3 d-flex align-items-center">
										<label class="ui-switch ui-switch-md info m-t-xs"><input v-model="getAddress.status" type="checkbox"> <i></i></label>
										<label class="text-muted text-capitalize mb-0 ml-1" for="name">status </label>
									</div>
									<button type="button" class="btn btn-default dv_submit_address_btn" @click="getSaveAddress">Submit </button>
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
<script type="text/javascript">
import Vue from 'vue'
import SideNavigation from '@web/components/profiles/SideNavigation'
import ProfileNavigation from '@web/components/profiles/ProfileNavigation'
import { required, minLength, alpha, integer } from 'vuelidate/lib/validators'
import { mapState } from 'vuex'
import { SAVE_ADDRESS_LIST_ACTION,GET_ADDRESS_BY_ID_LIST_ACTION } from '@web/store/addresses/actions'
export default {
	components: { SideNavigation,ProfileNavigation },
	data() {
		return {
			baseUrl:Vue.config.baseUrl,
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
				status: true
			}
		}
	},
	validations: {
		getAddress:{
			mobile:{
				required, integer
			},
			address:{
				required
			},
			city:{
				required, alpha
			},
			postal_code:{
				required, integer
			},
			state:{
				required, alpha
			},
			country:{
				required, alpha
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
						if (_this.$route.query.prevRoute == 'get-checkout-shipping') {
							_this.$router.push({ name:'getCheckoutShipping' });
						} else {
							_this.$router.push({ name:'getAddressAccount' });
						}
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
						_this.loadLocation(_this.getAddress);
					}
				})
			}
		},
		currentLocation: function() {
			navigator.geolocation.getCurrentPosition((position) => {
				this.getAddress.latitude = position.coords.latitude;
				this.getAddress.longitude = position.coords.longitude;
				this.loadLocation(this.getAddress);
			});
		},
		loadLocation: function(location) {
			$('.dv_location_for_all').locationpicker({
                location: {
                    latitude: location.latitude,
                    longitude: location.longitude
                },
                radius: 300,
                enableAutocomplete: true,
                onchanged: (currentLocation) => {
					this.getAddress.latitude = currentLocation.latitude;
					this.getAddress.longitude = currentLocation.longitude;
				}
            });
		}  
	},
	mounted(){
		this.getAddressById();
		this.currentLocation();
	}
}
</script>

<style>
.ui-switch-md {
    width: 32px;
    height: 20px;
}
.ui-switch {
	cursor: pointer;
    position: relative;
    display: inline-block;
    width: 34px;
    height: 24px;
    border-radius: 30px;
    background-color: #448bff;
    margin: 0;
}
.ui-switch i {
    display: block;
    position: absolute;
    width: 100%;
    height: 100%;
}
.ui-switch input {
    position: absolute;
    opacity: 0;
    z-index: -1;
}
.ui-switch input:checked+i:before {
    top: 50%;
    bottom: 50%;
    left: 50%;
    right: 5px;
    border-width: 0;
    border-radius: 5px;
}
.ui-switch i:before {
    content: "";
    position: absolute;
    top: -1px;
    bottom: -1px;
    left: -1px;
    right: -1px;
    background-color: #fff;
    border: 1px solid rgba(135,150,165,.15);
    border-radius: 30px;
    transition: all .2s;
}
.ui-switch-md input:checked+i:after {
    margin-left: 13px;
}
.ui-switch input:checked+i:after {
    margin-left: 11px;
}

.ui-switch-md i:after {
    width: 18px;
}
.ui-switch i:after {
    content: "";
    position: absolute;
    background-color: #fff;
    width: 22px;
    top: 1px;
    bottom: 1px;
    border-radius: 50%;
    box-shadow: 1px 1px 3px rgb(0 0 0 / 25%);
    transition: margin .3s;
}
</style>
	
		

	