 <template>
 <div class="modal fade pr-0" id="login_register" tabindex="-1" role="dialog" aria-labelledby="login_register" aria-modal="true" data-backdrop="static" data-keyboard="false" style="z-index: 10000;">
	    <div class="modal-dialog dv_login_register_dialog">
	      <div class="modal-content dv_share_modal_content">
	        <div class="modal-header dv_share_modal_header">
	          <h4 class="modal-title">Create Account </h4>
	          <svg data-dismiss="modal" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
	        </div>
	        <div class="modal-body dv_share_modal_body">
	        	<div class="dv_signup_txt" v-if="getModelStatus=='register'">
	        		Already have an account? <a href="javascript:void(0);"  @click="getLogin(getModelStatus)">Sign In </a>
	        	</div>
	        	<div class="dv_signup_txt" v-if="getModelStatus=='login'">
	        		create an account? <a href="javascript:void(0);"  @click="getRegister(getModelStatus)">Register </a>
	        	</div>
	          <ul class="dv_customer_register_ul">
	          	<template v-if="getModelStatus == 'login'">
				<li>
					<div class="alert alert-danger" role="alert" v-if="getError.message">
						{{ getError.message }}
					</div>
				</li>
				<li>
	          		<div class="material-textfield">
				      <input placeholder=" " type="text" class="form-control dv_material_input " v-model="login.email" :class="status($v.login.email)" @input="setLoginEmail($event.target.value)">
				      <label class="dv_material_lbl">Email / Mobile No </label>
				    </div>
	          	</li>
	          	<li>
	          		<div class="material-textfield">
				      <input placeholder=" " type="password" class="form-control dv_material_input" v-model="login.password" :class="status($v.login.password)" @input="setLoginPassword($event.target.value)">
				      <label class="dv_material_lbl">Password </label>
				      <!-- <span v-if="getError.message == 'invalid_credentials'">Email or password doesn't match</span> -->
				    </div>
	          	</li>
	          	<li>
	          		 <p class="typo__p" v-if="loginSubmitStatus === 'OK'">Thanks for your submission!</p>
					  <p class="typo__p" v-if="loginSubmitStatus === 'ERROR'">Please fill the form correctly.</p>
					  <p class="typo__p" v-if="loginSubmitStatus === 'PENDING'">Sending...</p>
	          		<button type="button" class="btn btn-default dv_login_register_btn" @click="getSignIn" >Login </button>
	          	</li>
	         
	          	</template>
	          	<template v-else>
	          		<li>
	          		<div class="material-textfield">
				      <input placeholder=" " type="text" class="form-control dv_material_input" v-model="register.first_name" :class="status($v.register.first_name)"  @input="setRegisterFirstName($event.target.value)">
				      <label class="dv_material_lbl">First Name </label>
				      <span v-for="email in getError.email">{{getError.first_name}}</span>
				    </div>
	          	</li>
	          	<li>
	          		<div class="material-textfield">
				      <input placeholder=" " type="text" class="form-control dv_material_input"  v-model="register.last_name" :class="status($v.register.last_name)" @input="setRegisterLastName($event.target.value)">
				      <label class="dv_material_lbl">Last Name </label>
				      <span v-for="last_name in getError.last_name">{{last_name}}</span>
				    </div>
	          	</li>
	          	<li>
	          		<div class="material-textfield">
				      <input placeholder=" " value="" type="email" class="form-control dv_material_input"  v-model="register.email" :class="status($v.register.email)" @input="setRegisterEmail($event.target.value)">
				      <label class="dv_material_lbl ">Email ID </label>
				      <span v-for="email in getError.email">{{email}}</span>
				    </div>
	          	</li>
	          	<li>
	          		<div class="material-textfield">
				      <input placeholder="" type="tel" class="form-control dv_material_input" placeholder="Mobile Enter"  v-model="register.mobile" :class="status($v.register.mobile)" @input="setRegisterMobile($event.target.value)">
				      <span v-for="mobile in getError.mobile">{{mobile}}</span>
				    </div>
	          	</li>
	          	<li>
	          		<div class="material-textfield">
				      <input placeholder=" " type="password" class="form-control dv_material_input" v-model="register.password" :class="status($v.register.password)" @input="setRegisterPassword($event.target.value)">
				      <label class="dv_material_lbl">New Password </label>
				      <span v-for="password in getError.password">{{password}}</span>
				    </div>
	          	</li>
	          	<li>
	          		<div class="material-textfield">
				      <input placeholder=" " type="password" class="form-control dv_material_input" v-model="register.password_confirmation" :class="status($v.register.password_confirmation)" @input="setRegisterPasswordConfirmation($event.target.value)">
				      <label class="dv_material_lbl">Re-enter Password </label>
				      <span v-for="password_confirmation in getError.password_confirmation">{{password_confirmation}}</span>
				    </div>
	          	</li>
	          	<li>
					<button type="button" class="btn btn-default dv_login_register_btn" v-if="registerSubmitStatus == 'PENDING'">
						<div class="spinner-border" role="status">
							<span class="sr-only">Loading...</span>
						</div>
					</button>
	          		<button type="button" class="btn btn-default dv_login_register_btn" @click="saveRegister" v-else>
						Register
					</button>
	          	</li>
	          	</template>
	          	<!-- -->
	          	
	          	<!--  -->
	          </ul>
			  	<div v-if="getModelStatus=='login'">
					<a href="javascript:void(0);" data-toggle="modal" data-target="#forgot_pwd_modal" data-dismiss="modal">Forgot Password ? </a>
				</div>
	        </div>     
	      </div>
	    </div>
	  </div>
 </template>
 <script type="text/javascript">
 import Vue from 'vue'
 import { required, minLength } from 'vuelidate/lib/validators'
 import { LOAD_LOGIN_ACTION,LOAD_USER_ACTION,SAVE_USER_REGISTER_ACTION } from '@web/store/users/actions'
 import { mapState } from 'vuex'
 export default {
 	 components: { 
 	 
    },
 	 props: {
            getModelStatus: {
                getModelStatus: Object,
                required: true,
            },
        },
	data() {
		return {
			baseUrl:Vue.config.baseUrl,
			baseUrlImage:Vue.config.baseUrlImage,
			login:{
				email:'',
				password:'',
			},
			register:{
				first_name:'',
				last_name:'',
				email:'',
				mobile:'',
				password:'',
				password_confirmation:''
			},
			loginSubmitStatus: null,
			registerSubmitStatus: null,	
		}
	},
	validations: {
		login:{
			email: {
				required
			},
			password:{
				required,
				minLength: minLength(6)
			}
		},
		register:{
			first_name:{
				required
			},
			last_name:{
				required
			},
			email:{
				required
			},
			mobile:{
				required
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
			getError: state => state.Users.getError,
		}),
	},
	filters:{
		/*getCheckEmptyFilter:function(value){
			if(value.length > 0){
				return value[0];
			}
		}*/
	},
	methods: {
		getLogin:function(getModelStatus){
			this.$emit("updateLoginModel", getModelStatus) ;
		},
		getRegister:function(getModelStatus){
			this.$emit("updateRegisterModel", getModelStatus) ;
		},
		saveRegister:function(){
			let _this = this;
			_this.$v.register.$touch();
			if (_this.$v.register.$invalid) {
				_this.registerSubmitStatus = 'ERROR'
				} else {
					_this.registerSubmitStatus = 'PENDING'
					_this.$store.dispatch('Users/' + SAVE_USER_REGISTER_ACTION,_this.register).then(function(e){
							_this.registerSubmitStatus = 'Ok'
							
							_this.$emit("getLoginAccess") ;
							window.location.reload();
					})

				}
			
		},
		getSignIn:function(){
			let _this = this;
			_this.$v.login.$touch()
			if (_this.$v.login.$invalid) {
				_this.loginSubmitStatus = 'ERROR'
			} else {
				_this.loginSubmitStatus = 'PENDING'
				_this.$store.dispatch('Users/' + LOAD_LOGIN_ACTION,_this.login).then(function(e){
					_this.loginSubmitStatus = 'Ok'
					_this.$store.dispatch('Users/' + LOAD_USER_ACTION).then(function(e){
						if (!_this.getError.message) {
							_this.$emit("getLoginAccess") ;
							window.location.reload();
						}
					});
				})
			}
		},
		status(validation) {
			return {
				error: validation.$error,
				dirty: validation.$dirty
			}
		},
		setLoginEmail:function(value){
			this.login.email = value
			this.$v.login.email.$touch()
		},
		setLoginPassword:function(value){
			this.login.password = value
			this.$v.login.password.$touch()
		},
		setRegisterFirstName:function(value){
			this.register.first_name = value
			this.$v.register.first_name.$touch()
		}, 
		setRegisterLastName:function(value){
			this.register.last_name = value
			this.$v.register.last_name.$touch()
		},
		setRegisterEmail:function(value){
			this.register.email = value
			this.$v.register.email.$touch()
		},
		setRegisterMobile:function(value){
			this.register.mobile = value
			this.$v.register.mobile.$touch()
		},
		setRegisterPassword:function(value){
			this.register.password = value
			this.$v.register.password.$touch()
		},
		setRegisterPasswordConfirmation:function(value){
			this.register.password_confirmation = value
			this.$v.register.password_confirmation.$touch()
		}
	}
}
</script>