<template>
<div>
	<div class="dv_three_steps_container">
		<div class="container-fluid">
			<ul class="dv_three_step_ul">
				<li class="active">
					shipping
				</li >
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
						<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 489.4 489.4" style="enable-background:new 0 0 489.4 489.4;width: 24px;height: 24px;margin: 0 5px 3px 0;" xml:space="preserve"> <g> <g> <path d="M347.7,263.75h-66.5c-18.2,0-33,14.8-33,33v51c0,18.2,14.8,33,33,33h66.5c18.2,0,33-14.8,33-33v-51 C380.7,278.55,365.9,263.75,347.7,263.75z M356.7,347.75c0,5-4.1,9-9,9h-66.5c-5,0-9-4.1-9-9v-51c0-5,4.1-9,9-9h66.5 c5,0,9,4.1,9,9V347.75z"></path> <path d="M489.4,171.05c0-2.1-0.5-4.1-1.6-5.9l-72.8-128c-2.1-3.7-6.1-6.1-10.4-6.1H84.7c-4.3,0-8.3,2.3-10.4,6.1l-72.7,128 c-1,1.8-1.6,3.8-1.6,5.9c0,28.7,17.3,53.3,42,64.2v211.1c0,6.6,5.4,12,12,12h66.3c0.1,0,0.2,0,0.3,0h93c0.1,0,0.2,0,0.3,0h221.4 c6.6,0,12-5.4,12-12v-209.6c0-0.5,0-0.9-0.1-1.3C472,224.55,489.4,199.85,489.4,171.05z M91.7,55.15h305.9l56.9,100.1H34.9 L91.7,55.15z M348.3,179.15c-3.8,21.6-22.7,38-45.4,38c-22.7,0-41.6-16.4-45.4-38H348.3z M232,179.15c-3.8,21.6-22.7,38-45.4,38 s-41.6-16.4-45.5-38H232z M24.8,179.15h90.9c-3.8,21.6-22.8,38-45.5,38C47.5,217.25,28.6,200.75,24.8,179.15z M201.6,434.35h-69 v-129.5c0-9.4,7.6-17.1,17.1-17.1h34.9c9.4,0,17.1,7.6,17.1,17.1v129.5H201.6z M423.3,434.35H225.6v-129.5 c0-22.6-18.4-41.1-41.1-41.1h-34.9c-22.6,0-41.1,18.4-41.1,41.1v129.6H66v-193.3c1.4,0.1,2.8,0.1,4.2,0.1 c24.2,0,45.6-12.3,58.2-31c12.6,18.7,34,31,58.2,31s45.5-12.3,58.2-31c12.6,18.7,34,31,58.1,31c24.2,0,45.5-12.3,58.1-31 c12.6,18.7,34,31,58.2,31c1.4,0,2.7-0.1,4.1-0.1L423.3,434.35L423.3,434.35z M419.2,217.25c-22.7,0-41.6-16.4-45.4-38h90.9 C460.8,200.75,441.9,217.25,419.2,217.25z"></path> </g> </g> </svg>
						pickup from store
						<!-- <button type="button" class="btn btn-default dv_show_near_stores">
							<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 489.4 489.4" style="enable-background:new 0 0 489.4 489.4;" xml:space="preserve"> <g> <g> <path d="M347.7,263.75h-66.5c-18.2,0-33,14.8-33,33v51c0,18.2,14.8,33,33,33h66.5c18.2,0,33-14.8,33-33v-51 C380.7,278.55,365.9,263.75,347.7,263.75z M356.7,347.75c0,5-4.1,9-9,9h-66.5c-5,0-9-4.1-9-9v-51c0-5,4.1-9,9-9h66.5 c5,0,9,4.1,9,9V347.75z"></path> <path d="M489.4,171.05c0-2.1-0.5-4.1-1.6-5.9l-72.8-128c-2.1-3.7-6.1-6.1-10.4-6.1H84.7c-4.3,0-8.3,2.3-10.4,6.1l-72.7,128 c-1,1.8-1.6,3.8-1.6,5.9c0,28.7,17.3,53.3,42,64.2v211.1c0,6.6,5.4,12,12,12h66.3c0.1,0,0.2,0,0.3,0h93c0.1,0,0.2,0,0.3,0h221.4 c6.6,0,12-5.4,12-12v-209.6c0-0.5,0-0.9-0.1-1.3C472,224.55,489.4,199.85,489.4,171.05z M91.7,55.15h305.9l56.9,100.1H34.9 L91.7,55.15z M348.3,179.15c-3.8,21.6-22.7,38-45.4,38c-22.7,0-41.6-16.4-45.4-38H348.3z M232,179.15c-3.8,21.6-22.7,38-45.4,38 s-41.6-16.4-45.5-38H232z M24.8,179.15h90.9c-3.8,21.6-22.8,38-45.5,38C47.5,217.25,28.6,200.75,24.8,179.15z M201.6,434.35h-69 v-129.5c0-9.4,7.6-17.1,17.1-17.1h34.9c9.4,0,17.1,7.6,17.1,17.1v129.5H201.6z M423.3,434.35H225.6v-129.5 c0-22.6-18.4-41.1-41.1-41.1h-34.9c-22.6,0-41.1,18.4-41.1,41.1v129.6H66v-193.3c1.4,0.1,2.8,0.1,4.2,0.1 c24.2,0,45.6-12.3,58.2-31c12.6,18.7,34,31,58.2,31s45.5-12.3,58.2-31c12.6,18.7,34,31,58.1,31c24.2,0,45.5-12.3,58.1-31 c12.6,18.7,34,31,58.2,31c1.4,0,2.7-0.1,4.1-0.1L423.3,434.35L423.3,434.35z M419.2,217.25c-22.7,0-41.6-16.4-45.4-38h90.9 C460.8,200.75,441.9,217.25,419.2,217.25z"></path> </g> </g> </svg>
							show near me
						</button> -->
					</h4>
				</div>
				<div class="row" v-for="(pickup,index) in getPickupLocations" :key="index">
					<div class="col-md-4 mb-4">
						<div class="dv_address_card_wrapper">
							<h4 class="dv_address_form_head">{{ pickup.name }}
							</h4>
							<div :class="'dv_location_for_all'+index" style="height: 293px;"></div>
						</div>
					</div>

					<div class="col-md-8 mb-4">
						<div class="dv_address_card_wrapper">
							<h4 class="dv_address_form_head">{{ pickup.name }} Store Detail </h4>
							<div class="material-textfield mb-3">
								<input placeholder=" " type="text" class="form-control dv_material_input" :value="pickup.shop_no" disabled="">
								<label class="dv_material_lbl">Shop No </label>
							</div>
							<div class="material-textfield mb-3">
								<input placeholder=" " type="text" class="form-control dv_material_input" :value="pickup.street_name" disabled="">
								<label class="dv_material_lbl">Street Name </label>
							</div>
							<div class="material-textfield mb-3">
								<input placeholder=" " type="text" class="form-control dv_material_input" :value="pickup.telephone" disabled="">
								<label class="dv_material_lbl">Tel No </label>
							</div>
							<div class="material-textfield mb-3">
								<input placeholder=" " type="text" class="form-control dv_material_input" :value="pickup.mobile" disabled="">
								<label class="dv_material_lbl">Mobile No </label>
							</div>
							<ul class="dv_view_direction_or_select_ul">
								<!-- <li>
									<button type="button" class="btn btn-default dv_view_direction_btn">View Direction </button>
								</li> -->
								<li>
									<button type="button" class="btn btn-default dv_select_store_btn" @click="selectStore(pickup)">Select this store </button>
								</li>
							</ul>
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
import { mapState } from 'vuex'
import { GET_PICKUP_BY_ID_LIST_ACTION,GET_PICKUP_LIST_ACTION,SAVE_PICKUP_IN_CART_LOCATION_ACTION } from '@web/store/pickupLocations/actions'
export default {
	components: {  },
	data() {
		return {
			baseUrl:Vue.config.baseUrl,
			baseUrlImage:Vue.config.baseUrlImage,
		}
	},
	computed:{
		...mapState({
			getPickupLocations:state => state.PickupLocation.getPickupLocations
		}),
	},
	watch: {
		'$route': function () {
			this.getPickupLocationFunc();
		},
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
		selectStore:function(pickup){
			let _this = this;
			if(Object.keys(_this.$user).length > 0 && Vue.helpers.getSession() != null){
				_this.$store.dispatch('PickupLocation/' + SAVE_PICKUP_IN_CART_LOCATION_ACTION,{
					pickup:pickup,
					user_id:_this.$user.id,
					session_id:Vue.helpers.getSession()
				}).then(function(e){
					_this.$router.push({name:'getCheckoutShipping'});
				})
			}
		},
		getPickupLocationFunc:function(){
			let _this = this;
			_this.$store.dispatch('PickupLocation/' + GET_PICKUP_LIST_ACTION).then(() => {
				_this.getPickupLocations.forEach((location, i) => _this.loadLocation(i, location));
			});
		},
		loadLocation: function(index, location) {
			$('.dv_location_for_all'+index).locationpicker({
                location: {
                    latitude: location.latitude,
                    longitude: location.longitude
                },
                radius: 300,
                /*inputBinding: {
                    latitudeInput: $('#us3-lat'),
                    longitudeInput: $('#us3-lon'),
                    radiusInput: $('#us3-radius'),
                    locationNameInput: $('#us3-address')
                },*/
                enableAutocomplete: true,
                onchanged: function (currentLocation, radius, isMarkerDropped) {
                    // Uncomment line below to show alert on each Location Changed event
                    //alert("Location changed. New location (" + currentLocation.latitude + ", " + currentLocation.longitude + ")");
                }
            });
		}
	},
	mounted(){
		this.getPickupLocationFunc();
	}
}
</script>