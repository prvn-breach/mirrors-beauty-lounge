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
									password
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
							<h5 class="dv_accounts_page_head">change password </h5>
							<div class="dv_account_pages_data_card">
								<div class="dv_profile_page">
									<div class="row">
										<div class="col-md-6 mb-3">
											<div class="alert alert-success" role="alert" v-if="response.status == 200">
												{{ response.data }}
											</div>
											<div class="alert alert-danger" role="alert" v-if="response.status == 1">
												{{ response.data }}
											</div>
											<div class="alert alert-danger" role="alert" v-if="response.status == 0">
												{{ response.data.password[0] }}
											</div>
										</div>
										<div class="col-md-12 mb-3">
											<div class="material-textfield">
										      <input placeholder=" " type="password" class="form-control dv_material_input" value="" v-model="changePassword.old_password" :class="status($v.changePassword.old_password)">
										      <label class="dv_material_lbl">Enter current password </label>
										    </div>
										</div>
										<div class="col-md-12 mb-3">
											<div class="material-textfield">
										      <input placeholder=" " type="password" class="form-control dv_material_input" value="" v-model="changePassword.password" :class="status($v.changePassword.password)">
										      <label class="dv_material_lbl">Enter new password </label>
										    </div>
										</div>
										<div class="col-md-12 mb-3">
											<div class="material-textfield">
										      <input placeholder=" " type="password" class="form-control dv_material_input" value="" v-model="changePassword.password_confirmation"  :class="status($v.changePassword.password_confirmation)">
										      <label class="dv_material_lbl">Re-enter old password </label>
										    </div>
										</div>
										<div class="col-md-12 mb-3">
											<button class="btn btn-default dv_save_account_info_btn float-right mb-0 w-auto" @click="getChangePassword">
										  		<!-- <span class="spinner-border spinner-border-sm"></span> -->
										  		reset password
										  	</button>
										</div>
									</div>
								</div>
							</div>
							<h5 class="dv_accounts_page_head">FAQ's </h5>
							<div class="dv_show_question_card">
								<div class="dv_question_txt_help">
									account & password question will come here
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg>
								</div>
								<div class="dv_answer_txt_help">
									account & password question answer will come here
								</div>
							</div>
							<div class="dv_show_question_card">
								<div class="dv_question_txt_help">
									account & password question will come here
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg>
								</div>
								<div class="dv_answer_txt_help">
									account & password question answer will come here
								</div>
							</div>
							<div class="dv_show_question_card">
								<div class="dv_question_txt_help">
									account & password question will come here
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg>
								</div>
								<div class="dv_answer_txt_help">
									account & password question answer will come here
								</div>
							</div>
							<div class="dv_show_question_card">
								<div class="dv_question_txt_help">
									account & password question will come here
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg>
								</div>
								<div class="dv_answer_txt_help">
									account & password question answer will come here
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
import SideNavigation from '@web/components/profiles/SideNavigation'
import ProfileNavigation from '@web/components/profiles/ProfileNavigation'
import {CHANGE_PASSWORD_ACTION } from '@web/store/users/actions'
import { mapState } from 'vuex'
export default {
	components: { SideNavigation,ProfileNavigation },
	data() {
		return {
			baseUrl:Vue.config.baseurl,
			baseUrlImage:Vue.config.baseUrlImage,
			changePassword:{
				id:'',
				old_password:'',
				password:'',
				password_confirmation:'',
			}
		}
	},
	validations: {
		changePassword:{
			old_password:{
				required,
			},
			password:{
				required,
				minLength: minLength(6)
			},
			password_confirmation:{
				required,
				minLength: minLength(6)
			}
		}
	},
	computed:{
		...mapState({
			response: state => state.Users.response
		})
	},
	methods: {
		getChangePassword:function(){
			let _this = this;
			_this.$v.changePassword.$touch();
			if (!_this.$v.changePassword.$invalid) {
				if(localStorage.getItem('getLogin') != null ){
					let getUser = JSON.parse(localStorage.getItem('getLogin'))
					_this.changePassword.id = getUser.user.id
					_this.$store.dispatch('Users/' + CHANGE_PASSWORD_ACTION,_this.changePassword).then((e) => {
						if (_this.response.status == 200) {
							_this.changePassword = {
								id:'',
								old_password:'',
								password:'',
								password_confirmation:''
							}
						}
					})
				}
			}
		},
		status(validation) {
			return {
		      	error: validation.$error,
		        dirty: validation.$dirty
			}
		}
	}
}
</script>