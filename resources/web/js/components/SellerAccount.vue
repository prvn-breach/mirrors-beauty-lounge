<template>
<div>
	<div class="dv_three_steps_container">
		<div class="container-fluid">
			<ul class="dv_three_step_ul">
				<li class="active">
					account
				</li>
				<li >
					store
				</li>
				<li>
					confirm
				</li>
			</ul>
		</div>
	</div>
	<div class="dv_three_container_content">

		<div class="dv_payment_option">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-8 m-auto">
						<h4 class="dv_seller_register_header_txt">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-at-sign"><circle cx="12" cy="12" r="4"></circle><path d="M16 8v5a3 3 0 0 0 6 0v-1a10 10 0 1 0-3.92 7.94"></path></svg>
							Account setup
						</h4>
					  	<h4 class="dv_form_based_chkout_heading">Personal details </h4>
					  	<div class="dv_seller_step_1_card mb-3">
						  	<div class="material-textfield mb-3">
						      <input placeholder=" " type="text" class="form-control dv_material_input">
						      <label class="dv_material_lbl">First Name </label>
						    </div>
						  	<div class="material-textfield mb-3">
						      <input placeholder=" " type="text" class="form-control dv_material_input">
						      <label class="dv_material_lbl">last Name </label>
						    </div>
						  	<div class="material-textfield mb-3">
						      <input placeholder="Contact No" type="tel" id="mobileno1" class="form-control dv_input_mobile">
						    </div>
						  	<div class="material-textfield mb-3">
						      <input placeholder="Phone No" type="tel" id="mobileno2" class="form-control dv_input_mobile">
						    </div>
						  	<div class="material-textfield mb-3">
						      <input placeholder=" " type="text" class="form-control dv_material_input">
						      <label class="dv_material_lbl">Email Address </label>
						    </div>
						  	<div class="material-textfield mb-3">
						      <input placeholder=" " type="password" class="form-control dv_material_input">
						      <label class="dv_material_lbl">Password </label>
						    </div>
						  	<div class="material-textfield mb-3">
						      <input placeholder=" " type="password" class="form-control dv_material_input">
						      <label class="dv_material_lbl">Retype Password </label>
						    </div>
					  	</div>
					  	<button class="btn btn-default dv_place_order_btn" disabled="">
					  		<span class="spinner-border spinner-border-sm"></span>
					  		save & continue
					  	</button>
					  	<div class="dv_login_seller_txt">
			        		Already have an account? <a href="javascript:void(0);" data-toggle="modal" data-target="#login_register">Sign In </a>
			        	</div>
					  </div>
				</div>
			</div>
		</div>
	</div>
</div>

</template>