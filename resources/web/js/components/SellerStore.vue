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
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
								store
							</h4>
						  	<h4 class="dv_form_based_chkout_heading">store details </h4>
						  	<div class="dv_seller_step_1_card mb-3">
							  	<div class="material-textfield mb-3">
							      <input placeholder=" " type="text" class="form-control dv_material_input">
							      <label class="dv_material_lbl">Store Name </label>
							    </div>
							  	<div class="material-textfield mb-3">
							      <input placeholder=" " type="text" class="form-control dv_material_input">
							      <label class="dv_material_lbl">store address </label>
							    </div>
							  	<div class="material-textfield mb-3">
							      <label style=" font-size: 13px; display: block; color: gray; ">store from </label>
							  		<select class="form-control dv_seller_store_from">
							  			<option selected="">Select</option>
							  			<option>Dubai</option>
							  			<option>Abu Dhabi</option>
							  		</select>
							    </div>
							  	<div class="material-textfield">
							      <input placeholder=" " type="text" class="form-control dv_material_input">
							      <label class="dv_material_lbl">PO Box No </label>
							    </div>
						  	</div>
						  	<h4 class="dv_form_based_chkout_heading">Company Emirates ID </h4>
						  	<div class="dv_seller_step_1_card dv_document_attachment mb-2">
						  		<label style=" font-size: 13px; color: #999999; text-transform: capitalize;">attach doument </label>
								<div class="custom-file mb-4">
									<input type="file" class="custom-file-input" id="customFile">
									<label class="custom-file-label" for="customFile">Choose file</label>
								</div>
							  	<div class="material-textfield mb-3">
							      <input placeholder=" " type="text" class="form-control dv_material_input">
							      <label class="dv_material_lbl">Document ID </label>
							    </div>
							  	<div class="material-textfield mb-3">
							      <input placeholder=" " type="text" class="form-control dv_material_input">
							      <label class="dv_material_lbl">Expiry Date </label>
							    </div>
						  	</div>
						  	<h4 class="dv_form_based_chkout_heading">Company Trade License</h4>
						  	<div class="dv_seller_step_1_card dv_document_attachment mb-4">
						  		<label style=" font-size: 13px; color: #999999; text-transform: capitalize;">attach doument </label>
								<div class="custom-file mb-4">
									<input type="file" class="custom-file-input" id="customFile">
									<label class="custom-file-label" for="customFile">Choose file</label>
								</div>
							  	<div class="material-textfield mb-3">
							      <input placeholder=" " type="text" class="form-control dv_material_input">
							      <label class="dv_material_lbl">Document ID </label>
							    </div>
							  	<div class="material-textfield mb-3">
							      <input placeholder=" " type="text" class="form-control dv_material_input">
							      <label class="dv_material_lbl">Expiry Date </label>
							    </div>
								<div class="custom-control custom-checkbox cursor-pointer">
								    <input type="checkbox" class="custom-control-input dv_save_card_for_future_input cursor-pointer" id="savecard" name="example1">
								    <label style="font-size: 13px;" class="custom-control-label cursor-pointer" for="savecard"><span style=" position: relative; top: 2px; "> I have read and accepted terms and conditions of the <a href="#!">agreement</a>.</span> </label>
								</div>
						  	</div>

						  	<button class="btn btn-default dv_place_order_btn" disabled="">
						  		<span class="spinner-border spinner-border-sm"></span>
						  		save & continue
						  	</button>
						  </div>
					</div>
				</div>
			</div>


			
		</div>

	</div>
</template>