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
									Profile
								</a>
							</li>
						</ul>
					</div>
				</div>
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-12">
							<ProfileNavigation ></ProfileNavigation>
						</div>
						<div class="col-md-3 hide-mobile-767">
							<SideNavigation></SideNavigation>
						</div>
						<div class="col-md-9">
							<h4 class="dv_accounts_page_head_sm show-mobile-767">account setting </h4>
							<h5 class="dv_accounts_page_head">change avatar </h5>
							<div class="dv_account_pages_data_card">
								<div class="dv_profile_page">
									<div class="row" v-if="showImageUpdateMsg">
										<div class="col-md-12">
											<div class="alert alert-success alert-dismissible" role="alert">
												Image Updated
												<button type="button" class="close" data-dismiss="alert" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-2 mb-3 text-center" >
											<span v-if="getProfileImagePreview == null">	
											<svg  version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 53 53" style="enable-background:new 0 0 53 53;width: 60px; height: 60px; margin: 15px 0 0 0;" xml:space="preserve"> <path style="fill:#E7ECED;" d="M18.613,41.552l-7.907,4.313c-0.464,0.253-0.881,0.564-1.269,0.903C14.047,50.655,19.998,53,26.5,53 c6.454,0,12.367-2.31,16.964-6.144c-0.424-0.358-0.884-0.68-1.394-0.934l-8.467-4.233c-1.094-0.547-1.785-1.665-1.785-2.888v-3.322 c0.238-0.271,0.51-0.619,0.801-1.03c1.154-1.63,2.027-3.423,2.632-5.304c1.086-0.335,1.886-1.338,1.886-2.53v-3.546 c0-0.78-0.347-1.477-0.886-1.965v-5.126c0,0,1.053-7.977-9.75-7.977s-9.75,7.977-9.75,7.977v5.126 c-0.54,0.488-0.886,1.185-0.886,1.965v3.546c0,0.934,0.491,1.756,1.226,2.231c0.886,3.857,3.206,6.633,3.206,6.633v3.24 C20.296,39.899,19.65,40.986,18.613,41.552z"></path> <g> <path style="fill:#c7c7c7;" d="M26.953,0.004C12.32-0.246,0.254,11.414,0.004,26.047C-0.138,34.344,3.56,41.801,9.448,46.76 c0.385-0.336,0.798-0.644,1.257-0.894l7.907-4.313c1.037-0.566,1.683-1.653,1.683-2.835v-3.24c0,0-2.321-2.776-3.206-6.633 c-0.734-0.475-1.226-1.296-1.226-2.231v-3.546c0-0.78,0.347-1.477,0.886-1.965v-5.126c0,0-1.053-7.977,9.75-7.977 s9.75,7.977,9.75,7.977v5.126c0.54,0.488,0.886,1.185,0.886,1.965v3.546c0,1.192-0.8,2.195-1.886,2.53 c-0.605,1.881-1.478,3.674-2.632,5.304c-0.291,0.411-0.563,0.759-0.801,1.03V38.8c0,1.223,0.691,2.342,1.785,2.888l8.467,4.233 c0.508,0.254,0.967,0.575,1.39,0.932c5.71-4.762,9.399-11.882,9.536-19.9C53.246,12.32,41.587,0.254,26.953,0.004z"></path> </g> </svg>
											</span>
											<span v-else>
												<img :src="getProfileImagePreview" style="enable-background:new 0 0 53 53;width: 60px; height: 60px; margin: 15px 0 0 0;border-radius:50%">
											</span>
										</div>

										<div class="col-md-10 mb-3">
											<label style=" font-size: 13px; color: #999999; text-transform: capitalize;">avatar</label>
											<div class="custom-file">
												<input type="file" class="custom-file-input" id="customFile" @change="onFileChange">
												<label class="custom-file-label" for="customFile">Choose file</label>
												<div v-if="getProfileImageError.hasOwnProperty('image')">
													<span class="text-danger" v-for="(error,index) in getProfileImageError['image']" :key="index">{{error}}</span>
												</div>
											</div>
										</div>
										<!-- <div class="col-md-4 mb-3">
											<div class="material-textfield">
										      <input placeholder=" " type="text" class="form-control dv_material_input">
										      <label class="dv_material_lbl">Enter OTP </label>
										    </div>
										</div> -->
										<div class="col-md-12 mb-3">
											<button class="btn btn-default dv_save_account_info_btn float-right mb-0 w-auto" @click="submitProfileImage">
										  		<!-- <span class="spinner-border spinner-border-sm"></span> -->
										  		update avatar
										  	</button>
										</div>
									</div>
								</div>
							</div>
							<h4 class="dv_accounts_page_head_sm show-mobile-767">profile </h4>
							<h5 class="dv_accounts_page_head">genaral information </h5>
							<div class="dv_account_pages_data_card">
								<div class="dv_profile_page">
									<div class="row">
										<div class="col-md-4 mb-3">
											<div class="material-textfield">
										      <input placeholder=" " type="text" class="form-control dv_material_input" v-model="getProfile.first_name">
										      <label class="dv_material_lbl">First Name </label>
										    </div>
										</div>
										<div class="col-md-4 mb-3">
											<div class="material-textfield">
										      <input placeholder=" " type="text" class="form-control dv_material_input" v-model="getProfile.last_name">
										      <label class="dv_material_lbl">Last Name </label>
										    </div>
										</div>
										<div class="col-md-4 mb-3">
											<div class="material-textfield">
										      <input placeholder=" " type="date" class="form-control dv_material_input" v-model="getProfile.dob">
										      <label class="dv_material_lbl">DOB </label>
										    </div>
										</div>
										<div class="col-md-4 mb-3">
											<div class="material-textfield">
										      <input placeholder="" type="tel" id="mobileno" class="form-control dv_material_input"  v-model="getProfile.mobile">
										        <label class="dv_material_lbl">Mobile Number </label>
										    </div>
										</div>
										<div class="col-md-8 mb-3">
											<div class="material-textfield">
										      <input placeholder=" " type="text" class="form-control dv_material_input" v-model="getProfile.email" readonly="">
										      <label class="dv_material_lbl">Email Address </label>
										    </div>
										</div>
										<div class="col-md-4 mb-3">
											<div class="custom-control custom-radio custom-control-inline">
												<input type="radio" class="custom-control-input dv_male_female_input" id="customRadio1" name="example" value="customEx" :checked="getProfile.gender == 'M'" @change="getGenderChange('M')">
												<label class="custom-control-label" for="customRadio1">Male </label>
											</div>
											<div class="custom-control custom-radio custom-control-inline">
												<input type="radio" class="custom-control-input dv_male_female_input" id="customRadio2" name="example" value="customEx" :checked="getProfile.gender == 'F'" @change="getGenderChange('F')">
												<label class="custom-control-label" for="customRadio2">Female </label>
											</div>
										</div>
										<div class="col-md-12 mb-3">
											<button class="btn btn-default dv_save_account_info_btn float-right mb-0 w-auto" @click="submitProfile">
										  		<!-- <span class="spinner-border spinner-border-sm"></span> -->
										  		save
										  	</button>
										</div>
									</div>
								</div>
							</div>
							<!-- <h5 class="dv_accounts_page_head">Preferred language </h5>
							<div class="dv_account_pages_data_card">
								<div class="dv_profile_page">
									<div class="row">
										<div class="col-md-4 mb-3">
											<div class="material-textfield">
										      <label class="dv_material_lbl position-relative m-0">language </label>
										      <select class="form-control" style="appearance: none; background: #ffffff url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAFQAAAAuCAYAAAC20j5mAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyZpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuNi1jMTQyIDc5LjE2MDkyNCwgMjAxNy8wNy8xMy0wMTowNjozOSAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wTU09Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9tbS8iIHhtbG5zOnN0UmVmPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvc1R5cGUvUmVzb3VyY2VSZWYjIiB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6NTNFQUM4ODMwQzNDMTFFOUE2ODBGNjc1QTE2M0QzNzIiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6NTNFQUM4ODIwQzNDMTFFOUE2ODBGNjc1QTE2M0QzNzIiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENDIDIwMTggKFdpbmRvd3MpIj4gPHhtcE1NOkRlcml2ZWRGcm9tIHN0UmVmOmluc3RhbmNlSUQ9InhtcC5paWQ6NzJBNjE2MzAwQzNCMTFFOUE4NDc5N0FBNzY4N0ZFMUYiIHN0UmVmOmRvY3VtZW50SUQ9InhtcC5kaWQ6NzJBNjE2MzEwQzNCMTFFOUE4NDc5N0FBNzY4N0ZFMUYiLz4gPC9yZGY6RGVzY3JpcHRpb24+IDwvcmRmOlJERj4gPC94OnhtcG1ldGE+IDw/eHBhY2tldCBlbmQ9InIiPz53mYnzAAABiElEQVR42uzbyQ3CMBAFUNMKLdATLdACLYQiacEQKQcrJHiZ7duekSwORMr8h0gcG0L4rdt3PINXrlajW4wxpOMI8/0d6zuLm53Wshm996hnmNFRs5jxCPUfpqPmMX9Q17r+wXTUPGaKei09eHbUIp/9NdRRiZhHd3lHJWAegToqAfMM1FEr8peCzoxalbsGdEbU6ry1oDOhNuVsAZ0BtTlfK+jIqKRcFNARUcl5qKAjobLk4AAdAZWtfy7QnlFZ++YE7RGVvV9u0J5QRfqUAO0BVaw/KVBkVNG+JEERUcX7kQZFQlXpQwMUAVXt/Fqglqiq59UEtUBV/xC1QTVDmnwjLEA1wppds61AJUOb3gAtQSXCm0/RrEE5ESDmuwigHBgwT2QooBQUqMdbJNBSnEdy/ANtAQYNtBT1vg241SxE0FJUyPVWVFAqqtniNTJoK6rp9go6aC2q+V5VD6BwU6MRQHOoMFvTPYGeoUL9eKI30LWeCSbcf1D3oJfQR9231xciaFofAQYAfyG4Tw36XToAAAAASUVORK5CYII=) no-repeat; -moz-appearance: none; -webkit-appearance: none; appearance: none; background-size: 13px; background-position: right 9px; background-origin: content-box; border-radius: 4px; width: 110px;" @change="changeLanguage($event.target.value)">
										      	<option :selected="getProfile.language =='english'" value="english">English </option>
										      	<option :selected="getProfile.language =='arabic'" value="arabic">Arabic </option>
										      </select>
										    </div>
										</div>
										<div class="col-md-12 mb-3">
											<button class="btn btn-default dv_save_account_info_btn float-right mb-0 w-auto" @click="submitProfile">
										  		save
										  	</button>
										</div>
									</div>
								</div>
							</div> -->
							<h5 class="dv_accounts_page_head">FAQ's </h5>
							<div class="dv_show_question_card">
								<div class="dv_question_txt_help">
									What happens when I update my email address (or mobile number)? 
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg>
								</div>
								<div class="dv_answer_txt_help">
									Your login email id (or mobile number) changes, likewise. You'll receive all your account related communication on your updated email address (or mobile number).
								</div>
							</div>
							<div class="dv_show_question_card">
								<div class="dv_question_txt_help">
									When will my Mirrors account be updated with the new email address (or mobile number)?
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg>
								</div>
								<div class="dv_answer_txt_help">
									It happens as soon as you confirm the verification code sent to your email (or mobile) and save the changes.
								</div>
							</div>
							<div class="dv_show_question_card">
								<div class="dv_question_txt_help">
									What happens to my existing Mirrors account when I update my email address (or mobile number)?
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg>
								</div>
								<div class="dv_answer_txt_help">
									Updating your email address (or mobile number) doesn't invalidate your account. Your account remains fully functional. You'll continue seeing your Order history, saved information and personal details.
								</div>
							</div>
							<div class="dv_show_question_card">
								<div class="dv_question_txt_help">
									Does my Seller account get affected when I update my email address?
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg>
								</div>
								<div class="dv_answer_txt_help">
									Mirrors has a 'single sign-on' policy. Any changes will reflect in your Seller account also.
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
 
 import { UPDATE_PROFILE_ACTION, UPDATE_PROFILE_IMAGE_ACTION} from '@web/store/profiles/actions'
 import SideNavigation from '@web/components/profiles/SideNavigation'
 import ProfileNavigation from '@web/components/profiles/ProfileNavigation'
 import { mapState } from 'vuex'
 export default {
 	 components: { SideNavigation,ProfileNavigation },
 	  data() {
            return {
              baseUrl:Vue.config.baseUrl,
              baseUrlImage:Vue.config.baseUrlImage,
              getUser:{
              	token:'',
              	status:0,
              	user:{}
              },
              getGreets:'',
              getProfile:{
              	first_name:'',
              	last_name:'',
              	name:'',
              	email:'',
              	dob:'',
              	mobile:'',
              	gender:'',
              	language:'',
              	image:null,
              },
              getImageFile:{},
              getProfileImagePreview:null,
              getProfileImageError:'',
              showImageUpdateMsg: false,
            }
        },
        computed:{
	        ...mapState({
				getUploadError: state => state.Profiles.getUploadError
	        }),
		},
         methods: {
         	

         	onFileChange(event){
         		const file = event.target.files[0];
         		this.getProfileImagePreview = URL.createObjectURL(file);
         		this.getImageFile = event.target;
			},
         	submitProfileImage:function(){
         			let _this = this;
	         		let data = new FormData();
	         		_this.getProfileImageError = '';
	         		if((Object.keys(_this.getImageFile).length == 0) || (_this.getImageFile.files.length === 0)){
	         			_this.getProfileImageError  = {image:['Please select image']};
	         			return false
	         		}
	         		this.getImageFile = this.getImageFile.files[0];
	         		data.append('id', this.getProfile.id); 
	         		data.append('image', this.getImageFile); 
				   this.$store.dispatch('Profiles/' + UPDATE_PROFILE_IMAGE_ACTION,data).then(function(){
					   _this.getProfileImageError = _this.getUploadError;
						if (Object.keys(_this.getProfileImageError).length == 0) {
							_this.showImageUpdateMsg = true;
						}
						_this.getProfileUser();
						_this.$root.$emit('getProfileUser')
	         		});
         	},
         	submitProfile:function(){
         		let _this = this;
         		this.$store.dispatch('Profiles/' + UPDATE_PROFILE_ACTION,this.getProfile).then(function(){
         			_this.getProfileUser();
         		});
         	},
         	changeLanguage:function(language){
         		this.getProfile.language = language;
         	},
         	getGenderChange:function(gender){
         		this.getProfile.gender = gender;
         	},
         	
         	getProfileUser:function(){
         		let _this = this;
         		if(localStorage.getItem('getLogin') != null ){
         			_this.getUser = JSON.parse(localStorage.getItem('getLogin'))
         			 _this.getProfile={
         			 	id:_this.getUser.user.id,
		              	first_name:_this.getUser.user.first_name,
		              	last_name:_this.getUser.user.last_name,
		              	name:_this.getUser.user.first_name+' '+_this.getUser.user.last_name,
		              	email:_this.getUser.user.email,
		              	dob:_this.getUser.user.dob,
		              	mobile:_this.getUser.user.mobile,
		              	gender:_this.getUser.user.gender,
		              	language:_this.getUser.user.language,
		              	profile_image:_this.getUser.user.profile_image
		              }
		              _this.getProfileImagePreview = _this.baseUrlImage+'images/profiles/'+_this.getUser.user.profile_image;
         		}

         	},
         	
         },
          watch: {
            
          },
         created() {
         	this.getProfileUser();
         	
          
        },
         mounted(){
         }

 }
</script>
