<template>
	<div class="dv_content">
			<div class="dv_account_pages_wrapper">
				<div class="dv_account_bredcum_wrapper">
					<div class="container-fluid">
						<!-- <ul class="dv_ac_bredcum_wrapper_ul">
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
						</ul> -->
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
							<h4 class="dv_accounts_page_head_sm show-mobile-767">Address </h4>
							<h5 class="dv_accounts_page_head">manage address </h5>
							<button type="button" class="btn btn-default dv_add_new_address_btn_account" @click="addAddress">add new address </button>
							<div class="dv_account_address_data_card" v-for="(address,index) in getAddresses" :key="index">
								<div class="dv_address_type">
									{{ address.type }}
								</div>
								<div class="dv_address_holder_name">
									{{ $user.name }}
								</div>
								<div class="dv_address_contact_no">
									{{ address.mobile }}
								</div>
								<div class="dv_full_address_txt">
								{{ address.address }}
								</div>
								<a :href="baseUrl+'add-address-account/'+getLeng()+'/'+address.id" >
								<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="dv_edit_current_address"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg>
								</a>
								<span @click="deleteAddress(address)">
								<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="dv_delete_current_address"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
								</span>
								<span>
									<label class="ui-switch ui-switch-md info m-t-xs"><input :checked="address.status" @change="statusChange($event, address['id'])" type="checkbox"> <i></i></label>
								</span>
							</div>
							
							<h5 class="dv_accounts_page_head">FAQ's </h5>
							<div class="dv_show_question_card">
								<div class="dv_question_txt_help">
									address question will come here
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg>
								</div>
								<div class="dv_answer_txt_help">
									address question answer will come here
								</div>
							</div>
							<div class="dv_show_question_card">
								<div class="dv_question_txt_help">
									address question will come here
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg>
								</div>
								<div class="dv_answer_txt_help">
									address question answer will come here
								</div>
							</div>
							<div class="dv_show_question_card">
								<div class="dv_question_txt_help">
									address question will come here
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg>
								</div>
								<div class="dv_answer_txt_help">
									address question answer will come here
								</div>
							</div>
							<div class="dv_show_question_card">
								<div class="dv_question_txt_help">
									address question will come here
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg>
								</div>
								<div class="dv_answer_txt_help">
									address question answer will come here
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
 import { uuid } from 'vue-uuid'
 import { GET_ADDRESS_LIST_ACTION,DELETE_ADDRESS_ACTION,SAVE_CART_ADDRESS_ACTION, SAVE_ADDRESS_LIST_ACTION } from '@web/store/addresses/actions'
 import { GET_PICKUP_BY_ID_LIST_ACTION,GET_PICKUP_LIST_ACTION,DELETE_PICKUP_LOCATION_ACTION } from '@web/store/pickupLocations/actions'
 import SideNavigation from '@web/components/profiles/SideNavigation'
  import ProfileNavigation from '@web/components/profiles/ProfileNavigation'
 export default {
 	 components: { SideNavigation,ProfileNavigation },
 	  data() {
            return {
              baseUrl:Vue.config.baseUrl,
              baseUrlImage:Vue.config.baseUrlImage,
              getVatData:{},
              getSessionId:Vue.helpers.getSession(),
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
         	deleteAddress:function(address){
         		let _this = this;
				let query = new URLSearchParams({
					address_id:address.id
				}).toString();
         		_this.$store.dispatch('Addresses/'+DELETE_ADDRESS_ACTION ,query).then(function(){
         			_this.getAddressFunc();
         		});
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
				window.location.href = this.baseUrl+'add-address-account/'+this.$route.params.country_leng;
         	},
            getAddressFunc:function(){
            	let _this = this;
            	if(!Vue.helpers.isEmpty(_this.$user)){
            		_this.$store.dispatch('Addresses/'+GET_ADDRESS_LIST_ACTION ,_this.$user.id).then(function(){});
            	}
            },
			statusChange: function(event, id) {
				this.$store.dispatch('Addresses/' + SAVE_ADDRESS_LIST_ACTION,{ id, status: event.target.checked  });
			}
         	
          },
         created() {
         	
           
        },
         mounted(){
         	
         	this.getAddressFunc();
         	
         	
         }

 }
</script>

		

		