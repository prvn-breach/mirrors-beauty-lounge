<template>
	<div>

		<div class="dv_three_steps_container">
			<div class="container-fluid">
				<ul class="dv_three_step_ul">
					<li class="active">
						shipping
					</li >
					<li class="active">
						payment
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
						<div class="col-md-8">
							<h4 class="dv_cart_header_txt">
								<svg width="24" height="24" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 480.48 480.48" style="enable-background:new 0 0 480.48 480.48;" xml:space="preserve"> <g> <g> <g> <path d="M477.128,172.606l-53.68-139.568C413.276,6.654,383.641-6.488,357.257,3.684c-0.383,0.148-0.765,0.3-1.145,0.457 l-268.256,111.2c-25.543,10.478-38.097,39.391-28.312,65.208l7.376,19.688H50c-27.601,0.031-49.969,22.399-50,50v180 c0.031,27.601,22.399,49.969,50,50h340c27.601-0.031,49.969-22.399,50-50v-180c-0.016-2.714-0.257-5.422-0.72-8.096l9.288-3.76 C474.339,227.818,487.005,198.648,477.128,172.606z M50,216.238h340c17.956,0.051,32.768,14.074,33.8,32H16.2 C17.232,230.311,32.044,216.288,50,216.238z M130.408,168.046l53.472-26.744l10.992,27.496L141.4,195.534L130.408,168.046z M424,430.238c-0.022,18.769-15.231,33.978-34,34H50c-18.769-0.022-33.978-15.231-34-34v-102h408V430.238z M424,312.238H16v-48 h408V312.238z M442.568,223.598l-8.36,3.384c-8.635-16.424-25.652-26.718-44.208-26.744H167.776l40.84-20.424 c3.724-1.859,5.401-6.263,3.856-10.128l-16.968-42.4c-1.641-4.102-6.296-6.098-10.398-4.458c-0.207,0.083-0.41,0.174-0.609,0.274 l-67.832,33.936c-3.721,1.862-5.394,6.265-3.848,10.128l13.232,33.072H84l-9.472-25.264c-6.715-17.738,1.91-37.598,19.456-44.8 l268.248-111.2c17.933-7.436,38.499,1.073,45.936,19.006c0.116,0.279,0.228,0.56,0.336,0.842l53.68,139.568 C468.975,196.285,460.276,216.333,442.568,223.598z"/> <path d="M287.775,441.742c14.908,8.661,33.317,8.661,48.225,0c22.922,13.317,52.3,5.53,65.617-17.392s5.53-52.3-17.392-65.617 c-7.357-4.274-15.717-6.516-24.225-6.496c-8.434,0.004-16.716,2.245-24,6.496c-22.922-13.317-52.3-5.531-65.617,17.391 C257.066,399.047,264.853,428.424,287.775,441.742z M349.376,370.19c3.403-1.254,6.997-1.914,10.624-1.952 c17.673,0,32,14.327,32,32c0,17.673-14.327,32-32,32c-3.627-0.038-7.221-0.698-10.624-1.952 C363.54,412.757,363.54,387.718,349.376,370.19z M336,379.294c10.667,11.926,10.667,29.962,0,41.888 C325.333,409.256,325.333,391.219,336,379.294z M312,368.238c3.627,0.037,7.221,0.698,10.624,1.952 c-14.164,17.528-14.164,42.568,0,60.096c-3.403,1.254-6.997,1.914-10.624,1.952c-17.673,0-32-14.327-32-32 C280,382.564,294.327,368.238,312,368.238z"/> <rect x="370.883" y="113.937" transform="matrix(-0.4062 -0.9138 0.9138 -0.4062 390.4948 565.1589)" width="16" height="83.52"/> <rect x="284.256" y="122.262" transform="matrix(0.908 -0.4191 0.4191 0.908 -22.8353 156.5479)" width="121.408" height="15.992"/> </g> </g> </g> </svg>
							payment </h4>
							<ul class="nav nav-tabs dv_payment_option_tabs">
								 <li class="nav-item dv_payment_option_li">
							    <a class="nav-link active" data-toggle="tab" href="#cash">
							    	<svg x="0px" y="0px" viewBox="0 0 407.534 407.534" style="fill: #999999; enable-background:new 0 0 407.534 407.534;" xml:space="preserve"> <g> <g> <g> <path d="M406.962,226.838c-0.001-0.002-0.001-0.003-0.002-0.005l-76.944-193.2c-1.633-4.105-6.286-6.109-10.391-4.476 c-0.003,0.001-0.006,0.002-0.009,0.004L7.464,153.457c-1.273,0.55-2.377,1.428-3.2,2.544C1.668,157.35,0.028,160.02,0,162.945 v208c0,4.418,3.582,8,8,8h336c4.418,0,8-3.582,8-8v-113.6l50.496-20.112C406.6,235.596,408.599,230.942,406.962,226.838z M336,362.945H16v-192h320V362.945z M133.48,154.985l133.952-53.376c11.955,12.566,28.52,19.708,45.864,19.776l13.36,33.6H133.48 z M352,240.161v-77.216c0-4.418-3.582-8-8-8h-0.128l-16.952-42.576c-0.188-0.355-0.407-0.693-0.656-1.008 c-0.858-3.853-4.426-6.482-8.36-6.16c-16.138,1.471-31.925-5.327-41.944-18.064c-2.493-3.077-6.875-3.842-10.264-1.792 c-0.38,0.045-0.757,0.115-1.128,0.208l-163.536,65.12c-1.979,0.776-3.562,2.315-4.392,4.272H46.976l271.136-107.96l71.032,178.36 L352,240.161z"/> <path d="M37.712,308.937c15.532,4.591,27.686,16.73,32.296,32.256c1.011,3.389,4.128,5.711,7.664,5.712 c0.415-0.026,0.827-0.088,1.232-0.184c0.359,0.102,0.726,0.177,1.096,0.224h192c0.33-0.043,0.656-0.11,0.976-0.2 c3.997,0.972,8.025-1.479,8.998-5.476c0.003-0.015,0.007-0.029,0.01-0.044c4.598-15.542,16.754-27.698,32.296-32.296 c3.769-1.152,6.111-4.908,5.488-8.8c0.107-0.388,0.184-0.784,0.232-1.184v-64c-0.047-0.401-0.127-0.797-0.24-1.184 c0.627-3.893-1.716-7.651-5.488-8.8c-15.542-4.597-27.695-16.758-32.28-32.304c-1.158-3.795-4.951-6.143-8.864-5.488 c-0.37-0.103-0.747-0.178-1.128-0.224H80c-0.403,0.048-0.802,0.128-1.192,0.24c-3.891-0.62-7.645,1.721-8.8,5.488 c-4.601,15.539-16.756,27.691-32.296,32.288c-3.769,1.152-6.111,4.908-5.488,8.8c-0.104,0.389-0.179,0.784-0.224,1.184v64 c0.046,0.376,0.121,0.748,0.224,1.112C31.568,303.974,33.915,307.772,37.712,308.937z M48,238.193 c16.064-6.452,28.796-19.184,35.248-35.248h185.496c6.455,16.064,19.19,28.796,35.256,35.248v57.504 c-16.059,6.459-28.789,19.189-35.248,35.248H83.248C76.789,314.886,64.059,302.156,48,295.697V238.193z"/> <path d="M176,314.945c26.51,0,48-21.49,48-48c0-26.51-21.49-48-48-48c-26.51,0-48,21.49-48,48 C128.026,293.444,149.501,314.919,176,314.945z M176,234.945c17.673,0,32,14.327,32,32s-14.327,32-32,32s-32-14.327-32-32 S158.327,234.945,176,234.945z"/> <path d="M88,278.945c6.627,0,12-5.373,12-12c0-6.627-5.373-12-12-12s-12,5.373-12,12C76,273.573,81.373,278.945,88,278.945z M88,262.945c2.209,0,4,1.791,4,4c0,2.209-1.791,4-4,4c-2.209,0-4-1.791-4-4C84,264.736,85.791,262.945,88,262.945z"/> <path d="M264,278.945c6.627,0,12-5.373,12-12c0-6.627-5.373-12-12-12c-6.627,0-12,5.373-12,12 C252,273.573,257.373,278.945,264,278.945z M264,262.945c2.209,0,4,1.791,4,4c0,2.209-1.791,4-4,4c-2.209,0-4-1.791-4-4 C260,264.736,261.791,262.945,264,262.945z"/> </g> </g> </g></svg>
									cash <span class="hide-mobile-1080">payment</span>
							    </a>
							  </li>
							<!--   <li class="nav-item dv_payment_option_li">
							    <a class="nav-link " data-toggle="tab" href="#card">
							    	<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect><line x1="1" y1="10" x2="23" y2="10"></line></svg>
									card <span class="hide-mobile-1080">payment</span>
							    </a>
							  </li> -->
							 
							</ul>
							<div class="tab-content">
							 <div class="tab-pane " id="card">
							  	<h4 class="dv_form_based_chkout_heading">select card to proceed </h4>
							  	<div class="dv_payment_card_attched">
									<div class="custom-control custom-checkbox cursor-pointer">
										<input type="checkbox" class="custom-control-input dv_save_card_list_use cursor-pointer" id="customCheck" name="example1">
										<label class="custom-control-label dv_check_card_attached" for="customCheck">
										  	<div class="dv_card_details cursor-pointer ml-3">
										  		<!-- <div class="dv_card_name_short">
										  			sanjay ********
										  		</div> -->
										  		<div class="dv_card_number_short">
										  			**** **** **** 0123
										  		</div>
										  		<!-- <div class="dv_card_cvv_short">
										  			*78
										  		</div> -->
										  		<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 504 504" style="width: 30px;margin: 0 15px 0 0;" xml:space="preserve"> <polygon style="fill:#3C58BF;" points="184.8,324.4 210.4,180.4 250.4,180.4 225.6,324.4 "></polygon> <polygon style="fill:#293688;" points="184.8,324.4 217.6,180.4 250.4,180.4 225.6,324.4 "></polygon> <path style="fill:#3C58BF;" d="M370.4,182c-8-3.2-20.8-6.4-36.8-6.4c-40,0-68.8,20-68.8,48.8c0,21.6,20,32.8,36,40 s20.8,12,20.8,18.4c0,9.6-12.8,14.4-24,14.4c-16,0-24.8-2.4-38.4-8l-5.6-2.4l-5.6,32.8c9.6,4,27.2,8,45.6,8 c42.4,0,70.4-20,70.4-50.4c0-16.8-10.4-29.6-34.4-40c-14.4-7.2-23.2-11.2-23.2-18.4c0-6.4,7.2-12.8,23.2-12.8 c13.6,0,23.2,2.4,30.4,5.6l4,1.6L370.4,182L370.4,182z"></path> <path style="fill:#293688;" d="M370.4,182c-8-3.2-20.8-6.4-36.8-6.4c-40,0-61.6,20-61.6,48.8c0,21.6,12.8,32.8,28.8,40 s20.8,12,20.8,18.4c0,9.6-12.8,14.4-24,14.4c-16,0-24.8-2.4-38.4-8l-5.6-2.4l-5.6,32.8c9.6,4,27.2,8,45.6,8 c42.4,0,70.4-20,70.4-50.4c0-16.8-10.4-29.6-34.4-40c-14.4-7.2-23.2-11.2-23.2-18.4c0-6.4,7.2-12.8,23.2-12.8 c13.6,0,23.2,2.4,30.4,5.6l4,1.6L370.4,182L370.4,182z"></path> <path style="fill:#3C58BF;" d="M439.2,180.4c-9.6,0-16.8,0.8-20.8,10.4l-60,133.6h43.2l8-24h51.2l4.8,24H504l-33.6-144H439.2z M420.8,276.4c2.4-7.2,16-42.4,16-42.4s3.2-8.8,5.6-14.4l2.4,13.6c0,0,8,36,9.6,44h-33.6V276.4z"></path> <path style="fill:#293688;" d="M448.8,180.4c-9.6,0-16.8,0.8-20.8,10.4l-69.6,133.6h43.2l8-24h51.2l4.8,24H504l-33.6-144H448.8z M420.8,276.4c3.2-8,16-42.4,16-42.4s3.2-8.8,5.6-14.4l2.4,13.6c0,0,8,36,9.6,44h-33.6V276.4z"></path> <path style="fill:#3C58BF;" d="M111.2,281.2l-4-20.8c-7.2-24-30.4-50.4-56-63.2l36,128h43.2l64.8-144H152L111.2,281.2z"></path> <path style="fill:#293688;" d="M111.2,281.2l-4-20.8c-7.2-24-30.4-50.4-56-63.2l36,128h43.2l64.8-144H160L111.2,281.2z"></path> <path style="fill:#FFBC00;" d="M0,180.4l7.2,1.6c51.2,12,86.4,42.4,100,78.4l-14.4-68c-2.4-9.6-9.6-12-18.4-12H0z"></path> <path style="fill:#F7981D;" d="M0,180.4L0,180.4c51.2,12,93.6,43.2,107.2,79.2l-13.6-56.8c-2.4-9.6-10.4-15.2-19.2-15.2L0,180.4z"></path> <path style="fill:#ED7C00;" d="M0,180.4L0,180.4c51.2,12,93.6,43.2,107.2,79.2l-9.6-31.2c-2.4-9.6-5.6-19.2-16.8-23.2L0,180.4z"></path> <g> <path style="fill:#051244;" d="M151.2,276.4L124,249.2l-12.8,30.4l-3.2-20c-7.2-24-30.4-50.4-56-63.2l36,128h43.2L151.2,276.4z"></path> <polygon style="fill:#051244;" points="225.6,324.4 191.2,289.2 184.8,324.4"></polygon> <path style="fill:#051244;" d="M317.6,274.8L317.6,274.8c3.2,3.2,4.8,5.6,4,8.8c0,9.6-12.8,14.4-24,14.4c-16,0-24.8-2.4-38.4-8 l-5.6-2.4l-5.6,32.8c9.6,4,27.2,8,45.6,8c25.6,0,46.4-7.2,58.4-20L317.6,274.8z"></path> <path style="fill:#051244;" d="M364,324.4h37.6l8-24h51.2l4.8,24H504L490.4,266l-48-46.4l2.4,12.8c0,0,8,36,9.6,44h-33.6 c3.2-8,16-42.4,16-42.4s3.2-8.8,5.6-14.4"></path> </g> </svg>
										  	</div>											
										</label>
									</div>
								  	<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
							  	</div>
							  	<div class="dv_payment_card_attched">
									<div class="custom-control custom-checkbox cursor-pointer">
										<input type="checkbox" class="custom-control-input dv_save_card_list_use cursor-pointer" id="customCheck1" name="example1">
										<label class="custom-control-label dv_check_card_attached" for="customCheck1">
										  	<div class="dv_card_details cursor-pointer ml-3">
										  		<!-- <div class="dv_card_name_short">
										  			sanjay ********
										  		</div> -->
										  		<div class="dv_card_number_short">
										  			**** **** **** 0123
										  		</div>
										  		<!-- <div class="dv_card_cvv_short">
										  			*78
										  		</div> -->
										  		<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 473.94 473.94" style="width: 30px;margin: 0 15px 0 0;" xml:space="preserve"> <circle style="fill:#003473;" cx="236.97" cy="236.97" r="236.97"></circle> <g> <path style="fill:#009DDD;" d="M230.767,308.282c20.61-18.604,33.616-45.616,33.616-75.618c0-30.009-13.01-57.006-33.616-75.816 c-18.009-16.4-42.002-26.406-68.411-26.406c-56.404,0-102.226,45.814-102.226,102.218c0,56.419,45.822,102.024,102.226,102.024 C188.766,334.688,212.758,324.69,230.767,308.282L230.767,308.282z"></path> <path style="fill:#009DDD;" d="M230.767,308.282c20.61-18.604,33.616-45.616,33.616-75.618c0-30.009-13.01-57.006-33.616-75.816 V308.282L230.767,308.282z"></path> </g> <path style="fill:#ED1C2E;" d="M299.392,130.446c-26.413,0-50.421,10.006-68.624,26.406c-3.596,3.398-6.993,7.001-10.204,10.81 h20.602c2.806,3.39,5.407,7.199,7.805,10.795h-36.213c-2.193,3.603-4.195,7.21-6.002,10.803h48.015 c1.609,3.596,3.199,7.21,4.4,10.806h-56.598c-1.205,3.6-2.208,7.21-3.005,11.001h62.608c1.396,6.803,2.208,14.208,2.208,21.601 c0,11.203-1.811,22.211-5.212,32.411h-56.598c1.19,3.596,2.593,7.203,4.187,10.803h48.015c-1.796,3.603-3.603,7.401-5.804,10.803 h-36.213c2.413,3.802,5.007,7.401,7.805,10.803h20.602c-3.195,3.802-6.601,7.405-10.398,10.803 c18.204,16.408,42.211,26.406,68.624,26.406c56.411,0,102.024-45.605,102.024-102.024 C401.411,176.261,355.803,130.446,299.392,130.446L299.392,130.446z"></path> <g> <path style="fill:#FFFFFF;" d="M366.194,254.67c0-1.804,1.609-3.199,3.405-3.199c1.804,0,3.199,1.396,3.199,3.199 c0,1.807-1.396,3.405-3.199,3.405C367.803,258.075,366.194,256.477,366.194,254.67L366.194,254.67z M369.599,257.274 c1.396,0,2.398-1.201,2.398-2.604c0-1.399-1.003-2.402-2.398-2.402c-1.403,0-2.593,1.003-2.593,2.402 C367.006,256.073,368.196,257.274,369.599,257.274L369.599,257.274z M369.198,256.073h-0.797v-2.803h1.197 c0.393,0,0.599,0,0.804,0.202c0.198,0.198,0.393,0.393,0.393,0.599c0,0.404-0.198,0.804-0.599,0.804l0.599,1.197h-0.804 l-0.393-1.003h-0.4V256.073L369.198,256.073z M369.198,254.475h0.4c0,0,0.198,0,0.393,0c0,0,0-0.206,0-0.404v-0.206 c-0.198,0-0.393,0-0.591,0h-0.206v0.61H369.198z"></path> <polygon style="fill:#FFFFFF;" points="149.552,258.075 136.755,258.075 144.354,218.266 126.955,258.075 115.341,258.075 113.346,218.464 105.747,258.075 94.14,258.075 103.947,206.266 123.943,206.266 124.942,238.266 138.963,206.266 159.546,206.266 "></polygon> <path style="fill:#FFFFFF;" d="M291.586,257.48c-3.603,0.992-6.204,1.392-9.209,1.392c-6.395,0-10.006-3.199-10.006-9.194 c0-1.205,0.206-2.41,0.4-3.809l0.797-4.202l0.614-3.195l5.796-32.202h12.599l-1.792,9.594h6.593l-1.796,10.211h-6.6l-3.199,17.598 c-0.206,0.801-0.4,1.403-0.4,1.8c0,2.204,1.403,3.195,4.408,3.195c1.396,0,2.586-0.198,3.398-0.397L291.586,257.48L291.586,257.48z "></path> <path style="fill:#FFFFFF;" d="M328.593,216.272c-1.003-0.408-1.197-0.408-1.396-0.408c-0.606-0.206-1.003-0.206-1.003-0.397 c-0.408,0-0.804,0-1.396,0c-4.21,0-7.207,1.8-11.012,6.795l1.197-6.398h-11.607l-7.798,42.211h12.804 c4.599-25.815,6.402-30.41,12.599-30.41c0.4,0,1.01,0.202,1.602,0.202l1.403,0.397L328.593,216.272L328.593,216.272z"></path> <path style="fill:#FFFFFF;" d="M241.166,229.263c0,5.205,3.005,9.003,9.807,11.611c5.205,2.193,6.006,2.799,6.006,4.801 c0,2.597-2.406,3.802-7.405,3.802c-3.802,0-7.409-0.602-11.607-1.796l-1.601,9.803h0.606l2.193,0.595 c0.797,0,1.994,0.202,3.398,0.202c3.005,0.393,5.407,0.393,7.207,0.393c13.403,0,19.805-4.4,19.805-13.998 c0-5.804-2.601-9.201-9.201-11.802c-5.407-2.002-6.002-2.601-6.002-4.602c0-2.193,2.2-3.398,6.402-3.398 c2.398,0,5.994,0.206,9.194,0.595l1.804-9.598c-3.398-0.591-8.397-0.797-11.203-0.797 C246.172,215.067,241.166,221.465,241.166,229.263L241.166,229.263z"></path> <path style="fill:#FFFFFF;" d="M190.76,258.075h-10.406l0.206-4.408c-3.199,3.405-7.6,5.003-13.403,5.003 c-6.795,0-11.6-4.599-11.6-11.401c0-10.208,8.191-16.206,22.406-16.206c1.388,0,3.195,0,5.197,0.206c0.4-1.399,0.4-2.006,0.4-2.601 c0-2.799-2.208-3.802-8.206-3.802c-3.603,0-7.592,0.4-10.398,1.003l-1.796,0.602l-1.205,0.195l1.796-9.399 c6.41-1.609,10.406-2.2,15.214-2.2c10.993,0,16.599,4.195,16.599,12.194c0,2.204-0.198,3.805-0.995,8.408l-2.601,15.005l-0.4,2.597 l-0.408,2.208l-0.198,1.392L190.76,258.075L190.76,258.075z M181.559,239.265c-1.411-0.198-2.002-0.198-2.799-0.198 c-7.207,0-10.803,2.2-10.803,6.406c0,2.597,1.594,4.4,4.393,4.4C177.563,249.873,181.357,245.473,181.559,239.265L181.559,239.265z "></path> <path style="fill:#FFFFFF;" d="M232.563,257.072c-4.393,1.201-8.595,1.796-13.003,1.796c-14.185,0-21.601-6.604-21.601-19.005 c0-14.406,9.407-25.006,22.211-25.006c10.398,0,17.014,6.002,17.014,15.203c0,3.195-0.408,6.211-1.403,10.406h-25.418 c0,0.797,0,0.995,0,1.403c0,4.801,3.603,7.398,11.005,7.398c4.602,0,8.801-0.797,13.197-2.593L232.563,257.072L232.563,257.072z M225.768,232.073c0-0.804,0-1.609,0-2.204c0-3.398-2.208-5.407-6.002-5.407c-4.004,0-6.803,2.799-8.011,7.611H225.768 L225.768,232.073z"></path> <path style="fill:#FFFFFF;" d="M368.196,238.868c-2.002,13.994-11.802,20.198-24.812,20.198c-14.193,0-19.989-8.595-19.989-19.397 c0-14.806,9.792-25.018,24.995-25.018c13.205,0,20.206,8.404,20.206,19.008C368.6,236.275,368.6,236.47,368.196,238.868 L368.196,238.868z M354.998,233.461c0-4.4-1.804-8.389-6.993-8.389c-6.417,0-10.413,7.592-10.413,14.398 c0,5.605,2.806,9.403,7.207,9.403c2.799,0,8.801-3.798,9.8-10.2C354.998,237.065,354.998,235.272,354.998,233.461L354.998,233.461z "></path> </g> </svg>
										  	</div>											
										</label>
									</div>
								  	<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
							  	</div>
							  	<h4 class="dv_form_based_chkout_heading">Enter Card Detail </h4>
							  	<!-- <h4 class="dv_form_based_chkout_heading">enter card detail </h4> -->
							  	<div class="dv_payment_card_form">
								  	<div class="material-textfield mb-3">
								      <input placeholder=" " type="text" class="form-control dv_material_input">
								      <label class="dv_material_lbl">Card holder Name </label>
								    </div>
								  	<div class="material-textfield mb-3">
								      <input placeholder=" " type="text" class="form-control dv_material_input">
								      <label class="dv_material_lbl">Card Number </label>
								    </div>
								    <div class="row">
								    	<div class="col-md-3">
										  	<div class="material-textfield mb-3">
										      <input placeholder=" " type="text" class="form-control dv_material_input">
										      <label class="dv_material_lbl">Expiry MM </label>
										    </div>
										</div>
								    	<div class="col-md-3">
										  	<div class="material-textfield mb-3">
										      <input placeholder=" " type="text" class="form-control dv_material_input">
										      <label class="dv_material_lbl">Expiry YY </label>
										    </div>
										</div>
								    	<div class="col-md-3">
										  	<div class="material-textfield mb-3">
										      <input placeholder=" " type="text" class="form-control dv_material_input">
										      <label class="dv_material_lbl">CVV Code </label>
										    </div>
										</div>
								    	<div class="col-md-12">
											<div class="custom-control custom-checkbox cursor-pointer">
											    <input type="checkbox" class="custom-control-input dv_save_card_for_future_input cursor-pointer" id="savecard" name="example1">
											    <label style="font-size: 13px;" class="custom-control-label cursor-pointer" for="savecard"><span style=" position: relative; top: 2px; ">save card for future use</span> </label>
											</div>
										</div>
								    </div>
							  	</div>
							  	
							  	<button class="btn btn-default dv_place_order_btn" >
							  		<span class="spinner-border spinner-border-sm"></span>
							  		place order
							  	</button>
							  </div>
							  <div class="tab-pane active" id="cash">
							  	<!-- <div class="dv_cod_charge_note">
							  		<p>Please note there is a non-refundable fee of <span>AED 10.00</span> for our cash on delivery service.</p>
							  		<p>To save on this amount, please <span>proceed with debit/credit card.</span></p>
							  	</div> -->
								<div class="dv_delivery_option" v-if="(getCarts.get_cart_pickup_location==null) && !shipping_free">
									<h4 class="dv_form_based_chkout_heading">select delivery mode </h4>
									<div class="row">
										<div class="col-md-6 mb-3">
											<div class="dv_delivery_option_card">
												<div class="custom-control custom-radio custom-control-inline">
													<input type="radio" class="custom-control-input" id="customRadio3" name="example" value="customEx" @change="getDeliveryOption($event,'free')" checked="">
													<label class="custom-control-label" for="customRadio3">Regular Delivery</label>
												</div>
												<strong>free </strong>
												<span>
													Select this option to receive all your items within 4/5 working days. This will apply to all Normal delivery for your order.
												</span>
											</div>
										</div>
										<div class="col-md-6 mb-3">
											<div class="dv_delivery_option_card">
												<div class="custom-control custom-radio custom-control-inline">
													<input type="radio" class="custom-control-input" id="customRadio4" name="example" value="customEx" @change="getDeliveryOption($event,'fast_delivery')">
													<label class="custom-control-label" for="customRadio4">Fast Delivery </label>
												</div>
												<strong> + {{ getShipping.fast_delivery }} AED </strong>
												<span>Your delivery will get today only before 9 pm at your door. You will get contact details at your order history of delivery person. </span>
											</div>							  				
										</div>
									</div>
								</div>

								<div class="dv_order_summery_detail hide-mobile-1080 mt-5" v-else-if="getCarts.get_cart_pickup_location && !shipping_free">
									<span>Pickup Location </span> 
							
									<ul class="dv_shipping_address_at_payment">
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

								<button class="btn btn-default dv_place_order_btn" @click="placeOrder('cash')" v-if="!place_order_loading">
									place order
								</button>
								<button class="btn btn-default dv_place_order_btn" v-else>
									<div class="spinner-border" role="status">
										<span class="sr-only">Loading...</span>
									</div>
								</button>
							  </div>
							</div>
							
						</div>
						<div class="col-md-4">
							<h4 class="dv_cart_header_txt">
								<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
							order summary </h4>
							<div class="dv_order_summery_detail">
								<span>Subtotal Aed ({{ getCartItems.length }} item {{ (getCartItems.length > 1)?'s':'' }}) <strong>aed {{ getTotalData.subTotal }}</strong> </span>
								<span>Vat <strong>Aed {{ getTotalData.vat }}</strong> </span>
								<span>shipping <strong> Aed {{ getTotalData.shippingCharge }}</strong> </span>
								<span>delivery <strong>aed {{ getTotalData.deliveryChange }}</strong> </span>
								<span v-if="getCarts['coupon_id']" >Coupon ({{ getCarts['get_coupon']['code'] }}) <strong>aed {{ getTotalData.coupon_discount_amount }}</strong> </span>
								<span v-if="getCarts['gift_certificate_id']" >Gift Voucher ({{ getCarts['get_gift_certificate']['certificate_code'] }}) <strong>aed {{ getTotalData.gift_discount_amount }}</strong> </span>
								<span>Total amount <strong>aed {{ getTotalData.total}}</strong> </span>
							</div>
							<div class="dv_order_summery_detail hide-mobile-1080" v-if="getCarts.get_cart_address != null">
								<span>shipping address </span> 
								<ul class="dv_shipping_address_at_payment" >
									<li>
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg> type : <span>{{ getCarts.get_cart_address.type }} </span>
									</li>
									<li>
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg> name : <span>{{ $user.name }} </span></li>
									<li>
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-map-pin"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg> address : <span>{{ getCarts.get_cart_address.address }} </span></li>
									<li>
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-phone"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>contact : <span>{{ getCarts.get_cart_address.mobile }} </span></li>
								</ul> 
							</div>
							<div class="dv_order_summery_detail hide-mobile-1080 d-none" v-if="getCarts.get_cart_pickup_location != null">
								<span>Pickup Location </span> 
						   
						        <ul class="dv_shipping_address_at_payment">
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
							<div class="dv_order_summery_detail">
								<span>secure payment types </span>
								<ul>
									<li>
										<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 504 504" style="width: 60px; margin: 0 15px 0 0; enable-background:new 0 0 504 504;" xml:space="preserve"> <polygon style="fill:#3C58BF;" points="184.8,324.4 210.4,180.4 250.4,180.4 225.6,324.4 "/> <polygon style="fill:#293688;" points="184.8,324.4 217.6,180.4 250.4,180.4 225.6,324.4 "/> <path style="fill:#3C58BF;" d="M370.4,182c-8-3.2-20.8-6.4-36.8-6.4c-40,0-68.8,20-68.8,48.8c0,21.6,20,32.8,36,40 s20.8,12,20.8,18.4c0,9.6-12.8,14.4-24,14.4c-16,0-24.8-2.4-38.4-8l-5.6-2.4l-5.6,32.8c9.6,4,27.2,8,45.6,8 c42.4,0,70.4-20,70.4-50.4c0-16.8-10.4-29.6-34.4-40c-14.4-7.2-23.2-11.2-23.2-18.4c0-6.4,7.2-12.8,23.2-12.8 c13.6,0,23.2,2.4,30.4,5.6l4,1.6L370.4,182L370.4,182z"/> <path style="fill:#293688;" d="M370.4,182c-8-3.2-20.8-6.4-36.8-6.4c-40,0-61.6,20-61.6,48.8c0,21.6,12.8,32.8,28.8,40 s20.8,12,20.8,18.4c0,9.6-12.8,14.4-24,14.4c-16,0-24.8-2.4-38.4-8l-5.6-2.4l-5.6,32.8c9.6,4,27.2,8,45.6,8 c42.4,0,70.4-20,70.4-50.4c0-16.8-10.4-29.6-34.4-40c-14.4-7.2-23.2-11.2-23.2-18.4c0-6.4,7.2-12.8,23.2-12.8 c13.6,0,23.2,2.4,30.4,5.6l4,1.6L370.4,182L370.4,182z"/> <path style="fill:#3C58BF;" d="M439.2,180.4c-9.6,0-16.8,0.8-20.8,10.4l-60,133.6h43.2l8-24h51.2l4.8,24H504l-33.6-144H439.2z M420.8,276.4c2.4-7.2,16-42.4,16-42.4s3.2-8.8,5.6-14.4l2.4,13.6c0,0,8,36,9.6,44h-33.6V276.4z"/> <path style="fill:#293688;" d="M448.8,180.4c-9.6,0-16.8,0.8-20.8,10.4l-69.6,133.6h43.2l8-24h51.2l4.8,24H504l-33.6-144H448.8z M420.8,276.4c3.2-8,16-42.4,16-42.4s3.2-8.8,5.6-14.4l2.4,13.6c0,0,8,36,9.6,44h-33.6V276.4z"/> <path style="fill:#3C58BF;" d="M111.2,281.2l-4-20.8c-7.2-24-30.4-50.4-56-63.2l36,128h43.2l64.8-144H152L111.2,281.2z"/> <path style="fill:#293688;" d="M111.2,281.2l-4-20.8c-7.2-24-30.4-50.4-56-63.2l36,128h43.2l64.8-144H160L111.2,281.2z"/> <path style="fill:#FFBC00;" d="M0,180.4l7.2,1.6c51.2,12,86.4,42.4,100,78.4l-14.4-68c-2.4-9.6-9.6-12-18.4-12H0z"/> <path style="fill:#F7981D;" d="M0,180.4L0,180.4c51.2,12,93.6,43.2,107.2,79.2l-13.6-56.8c-2.4-9.6-10.4-15.2-19.2-15.2L0,180.4z"/> <path style="fill:#ED7C00;" d="M0,180.4L0,180.4c51.2,12,93.6,43.2,107.2,79.2l-9.6-31.2c-2.4-9.6-5.6-19.2-16.8-23.2L0,180.4z"/> <g> <path style="fill:#051244;" d="M151.2,276.4L124,249.2l-12.8,30.4l-3.2-20c-7.2-24-30.4-50.4-56-63.2l36,128h43.2L151.2,276.4z"/> <polygon style="fill:#051244;" points="225.6,324.4 191.2,289.2 184.8,324.4"/> <path style="fill:#051244;" d="M317.6,274.8L317.6,274.8c3.2,3.2,4.8,5.6,4,8.8c0,9.6-12.8,14.4-24,14.4c-16,0-24.8-2.4-38.4-8 l-5.6-2.4l-5.6,32.8c9.6,4,27.2,8,45.6,8c25.6,0,46.4-7.2,58.4-20L317.6,274.8z"/> <path style="fill:#051244;" d="M364,324.4h37.6l8-24h51.2l4.8,24H504L490.4,266l-48-46.4l2.4,12.8c0,0,8,36,9.6,44h-33.6 c3.2-8,16-42.4,16-42.4s3.2-8.8,5.6-14.4"/> </g> </svg>
									</li>
									<li>
										<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="width: 50px; margin: 0 15px 0 0; enable-background:new 0 0 512 512;" xml:space="preserve"> <path style="fill:#0099DF;" d="M512,402.282c0,16.716-13.55,30.267-30.265,30.267H30.265C13.55,432.549,0,418.996,0,402.282V109.717 c0-16.715,13.55-30.266,30.265-30.266h451.469c16.716,0,30.265,13.551,30.265,30.266L512,402.282L512,402.282z"/> <path style="opacity:0.15;fill:#202121;enable-background:new    ;" d="M21.517,402.282V109.717 c0-16.715,13.552-30.266,30.267-30.266h-21.52C13.55,79.451,0,93.003,0,109.717v292.565c0,16.716,13.55,30.267,30.265,30.267h21.52 C35.07,432.549,21.517,418.996,21.517,402.282z"/> <path style="fill:#EA001B;" d="M334.687,234.577c0-18.028,8.304-34.115,21.296-44.649c-9.872-8.005-22.455-12.806-36.156-12.806 c-31.731,0-57.45,25.722-57.45,57.454c0,31.731,25.719,57.451,57.45,57.451c13.703,0,26.284-4.798,36.156-12.806 C342.991,268.69,334.687,252.604,334.687,234.577z"/> <path style="fill:#F79F1A;" d="M392.14,177.123c-13.703,0-26.28,4.801-36.156,12.806c12.994,10.534,21.298,26.621,21.298,44.649 c0,18.027-8.304,34.113-21.298,44.645c9.876,8.007,22.455,12.806,36.156,12.806c31.733,0,57.452-25.72,57.452-57.451 C449.592,202.845,423.871,177.123,392.14,177.123z"/> <path style="fill:#FF5F01;" d="M377.281,234.577c0-18.028-8.304-34.115-21.298-44.649c-12.991,10.534-21.296,26.621-21.296,44.649 c0,18.027,8.304,34.113,21.296,44.645C368.976,268.69,377.281,252.604,377.281,234.577z"/> <path style="fill:#FFC715;" d="M165.843,261.211c0,4.037-3.276,7.308-7.308,7.308H67.852c-4.037,0-7.308-3.271-7.308-7.308v-70.667 c0-4.037,3.272-7.307,7.308-7.307h90.683c4.033,0,7.308,3.27,7.308,7.307V261.211L165.843,261.211z"/> <g> <path style="fill:#34495E;" d="M166.843,331.106h-106.3c-4.611,0-8.348-3.738-8.348-8.348c0-4.611,3.736-8.348,8.348-8.348h106.3 c4.611,0,8.348,3.736,8.348,8.348C175.191,327.368,171.454,331.106,166.843,331.106z"/> <path style="fill:#34495E;" d="M166.843,365.919h-106.3c-4.611,0-8.348-3.736-8.348-8.348c0-4.611,3.736-8.348,8.348-8.348h106.3 c4.611,0,8.348,3.736,8.348,8.348C175.191,362.182,171.454,365.919,166.843,365.919z"/> </g> <g> <polygon style="fill:#FFA617;" points="88.893,268.52 105.589,268.52 105.589,260.172 105.589,191.584 105.589,183.236 88.893,183.236 88.893,191.584 88.893,203.314 68.891,203.314 60.543,203.314 60.543,220.01 68.891,220.01 88.893,220.01 88.893,231.746 68.891,231.746 60.543,231.746 60.543,248.441 68.891,248.441 88.893,248.441 88.893,260.172 	"/> <path style="fill:#FFA617;" d="M157.496,220.01h8.348v-16.696h-8.348h-15.92v-11.73v-8.348H124.88v8.348v48.509 c0,4.61,3.736,8.348,8.348,8.348h24.268h8.348v-16.696h-8.348h-15.92V220.01H157.496z"/> </g> <path style="opacity:0.15;fill:#202121;enable-background:new    ;" d="M75.92,261.211v-70.667c0-4.037,3.271-7.307,7.308-7.307 H67.852c-4.037,0-7.308,3.27-7.308,7.307v70.667c0,4.037,3.272,7.308,7.308,7.308h15.377C79.191,268.52,75.92,265.248,75.92,261.211 z"/> </svg>
									</li>
									<li>
										<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 473.94 473.94" style="width: 40px; margin: 0 15px 0 0; enable-background:new 0 0 473.94 473.94;" xml:space="preserve"> <circle style="fill:#003473;" cx="236.97" cy="236.97" r="236.97"/> <g> <path style="fill:#009DDD;" d="M230.767,308.282c20.61-18.604,33.616-45.616,33.616-75.618c0-30.009-13.01-57.006-33.616-75.816 c-18.009-16.4-42.002-26.406-68.411-26.406c-56.404,0-102.226,45.814-102.226,102.218c0,56.419,45.822,102.024,102.226,102.024 C188.766,334.688,212.758,324.69,230.767,308.282L230.767,308.282z"/> <path style="fill:#009DDD;" d="M230.767,308.282c20.61-18.604,33.616-45.616,33.616-75.618c0-30.009-13.01-57.006-33.616-75.816 V308.282L230.767,308.282z"/> </g> <path style="fill:#ED1C2E;" d="M299.392,130.446c-26.413,0-50.421,10.006-68.624,26.406c-3.596,3.398-6.993,7.001-10.204,10.81 h20.602c2.806,3.39,5.407,7.199,7.805,10.795h-36.213c-2.193,3.603-4.195,7.21-6.002,10.803h48.015 c1.609,3.596,3.199,7.21,4.4,10.806h-56.598c-1.205,3.6-2.208,7.21-3.005,11.001h62.608c1.396,6.803,2.208,14.208,2.208,21.601 c0,11.203-1.811,22.211-5.212,32.411h-56.598c1.19,3.596,2.593,7.203,4.187,10.803h48.015c-1.796,3.603-3.603,7.401-5.804,10.803 h-36.213c2.413,3.802,5.007,7.401,7.805,10.803h20.602c-3.195,3.802-6.601,7.405-10.398,10.803 c18.204,16.408,42.211,26.406,68.624,26.406c56.411,0,102.024-45.605,102.024-102.024 C401.411,176.261,355.803,130.446,299.392,130.446L299.392,130.446z"/> <g> <path style="fill:#FFFFFF;" d="M366.194,254.67c0-1.804,1.609-3.199,3.405-3.199c1.804,0,3.199,1.396,3.199,3.199 c0,1.807-1.396,3.405-3.199,3.405C367.803,258.075,366.194,256.477,366.194,254.67L366.194,254.67z M369.599,257.274 c1.396,0,2.398-1.201,2.398-2.604c0-1.399-1.003-2.402-2.398-2.402c-1.403,0-2.593,1.003-2.593,2.402 C367.006,256.073,368.196,257.274,369.599,257.274L369.599,257.274z M369.198,256.073h-0.797v-2.803h1.197 c0.393,0,0.599,0,0.804,0.202c0.198,0.198,0.393,0.393,0.393,0.599c0,0.404-0.198,0.804-0.599,0.804l0.599,1.197h-0.804 l-0.393-1.003h-0.4V256.073L369.198,256.073z M369.198,254.475h0.4c0,0,0.198,0,0.393,0c0,0,0-0.206,0-0.404v-0.206 c-0.198,0-0.393,0-0.591,0h-0.206v0.61H369.198z"/> <polygon style="fill:#FFFFFF;" points="149.552,258.075 136.755,258.075 144.354,218.266 126.955,258.075 115.341,258.075 113.346,218.464 105.747,258.075 94.14,258.075 103.947,206.266 123.943,206.266 124.942,238.266 138.963,206.266 159.546,206.266 "/> <path style="fill:#FFFFFF;" d="M291.586,257.48c-3.603,0.992-6.204,1.392-9.209,1.392c-6.395,0-10.006-3.199-10.006-9.194 c0-1.205,0.206-2.41,0.4-3.809l0.797-4.202l0.614-3.195l5.796-32.202h12.599l-1.792,9.594h6.593l-1.796,10.211h-6.6l-3.199,17.598 c-0.206,0.801-0.4,1.403-0.4,1.8c0,2.204,1.403,3.195,4.408,3.195c1.396,0,2.586-0.198,3.398-0.397L291.586,257.48L291.586,257.48z "/> <path style="fill:#FFFFFF;" d="M328.593,216.272c-1.003-0.408-1.197-0.408-1.396-0.408c-0.606-0.206-1.003-0.206-1.003-0.397 c-0.408,0-0.804,0-1.396,0c-4.21,0-7.207,1.8-11.012,6.795l1.197-6.398h-11.607l-7.798,42.211h12.804 c4.599-25.815,6.402-30.41,12.599-30.41c0.4,0,1.01,0.202,1.602,0.202l1.403,0.397L328.593,216.272L328.593,216.272z"/> <path style="fill:#FFFFFF;" d="M241.166,229.263c0,5.205,3.005,9.003,9.807,11.611c5.205,2.193,6.006,2.799,6.006,4.801 c0,2.597-2.406,3.802-7.405,3.802c-3.802,0-7.409-0.602-11.607-1.796l-1.601,9.803h0.606l2.193,0.595 c0.797,0,1.994,0.202,3.398,0.202c3.005,0.393,5.407,0.393,7.207,0.393c13.403,0,19.805-4.4,19.805-13.998 c0-5.804-2.601-9.201-9.201-11.802c-5.407-2.002-6.002-2.601-6.002-4.602c0-2.193,2.2-3.398,6.402-3.398 c2.398,0,5.994,0.206,9.194,0.595l1.804-9.598c-3.398-0.591-8.397-0.797-11.203-0.797 C246.172,215.067,241.166,221.465,241.166,229.263L241.166,229.263z"/> <path style="fill:#FFFFFF;" d="M190.76,258.075h-10.406l0.206-4.408c-3.199,3.405-7.6,5.003-13.403,5.003 c-6.795,0-11.6-4.599-11.6-11.401c0-10.208,8.191-16.206,22.406-16.206c1.388,0,3.195,0,5.197,0.206c0.4-1.399,0.4-2.006,0.4-2.601 c0-2.799-2.208-3.802-8.206-3.802c-3.603,0-7.592,0.4-10.398,1.003l-1.796,0.602l-1.205,0.195l1.796-9.399 c6.41-1.609,10.406-2.2,15.214-2.2c10.993,0,16.599,4.195,16.599,12.194c0,2.204-0.198,3.805-0.995,8.408l-2.601,15.005l-0.4,2.597 l-0.408,2.208l-0.198,1.392L190.76,258.075L190.76,258.075z M181.559,239.265c-1.411-0.198-2.002-0.198-2.799-0.198 c-7.207,0-10.803,2.2-10.803,6.406c0,2.597,1.594,4.4,4.393,4.4C177.563,249.873,181.357,245.473,181.559,239.265L181.559,239.265z "/> <path style="fill:#FFFFFF;" d="M232.563,257.072c-4.393,1.201-8.595,1.796-13.003,1.796c-14.185,0-21.601-6.604-21.601-19.005 c0-14.406,9.407-25.006,22.211-25.006c10.398,0,17.014,6.002,17.014,15.203c0,3.195-0.408,6.211-1.403,10.406h-25.418 c0,0.797,0,0.995,0,1.403c0,4.801,3.603,7.398,11.005,7.398c4.602,0,8.801-0.797,13.197-2.593L232.563,257.072L232.563,257.072z M225.768,232.073c0-0.804,0-1.609,0-2.204c0-3.398-2.208-5.407-6.002-5.407c-4.004,0-6.803,2.799-8.011,7.611H225.768 L225.768,232.073z"/> <path style="fill:#FFFFFF;" d="M368.196,238.868c-2.002,13.994-11.802,20.198-24.812,20.198c-14.193,0-19.989-8.595-19.989-19.397 c0-14.806,9.792-25.018,24.995-25.018c13.205,0,20.206,8.404,20.206,19.008C368.6,236.275,368.6,236.47,368.196,238.868 L368.196,238.868z M354.998,233.461c0-4.4-1.804-8.389-6.993-8.389c-6.417,0-10.413,7.592-10.413,14.398 c0,5.605,2.806,9.403,7.207,9.403c2.799,0,8.801-3.798,9.8-10.2C354.998,237.065,354.998,235.272,354.998,233.461L354.998,233.461z "/> </g> </svg>
									</li>
									<li>
										<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 473.94 473.94" style="width: 40px; margin: 0 15px 0 0; enable-background:new 0 0 473.94 473.94;" xml:space="preserve"> <circle style="fill:#F3F2F2;" cx="236.97" cy="236.97" r="236.97"/> <circle style="fill:#F26E21;" cx="252.34" cy="222.26" r="31.18"/> <g> <path style="fill:#0B161F;" d="M84.407,237.19c-3.674,3.289-8.415,4.715-15.944,4.715h-3.124v-39.146h3.124 c7.528,0,12.082,1.332,15.944,4.789c4.026,3.551,6.428,9.048,6.428,14.728C90.835,227.959,88.433,233.65,84.407,237.19 L84.407,237.19z M70.798,192.734H53.691v59.187h17.021c9.033,0,15.562-2.118,21.291-6.832c6.795-5.59,10.829-14.02,10.829-22.735 C102.831,204.88,89.668,192.734,70.798,192.734"/> <polyline style="fill:#0B161F;" points="108.2,251.921 119.83,251.921 119.83,192.734 108.2,192.734 108.2,251.921 	"/> <path style="fill:#0B161F;" d="M148.301,215.439c-6.99-2.571-9.048-4.262-9.048-7.442c0-3.731,3.663-6.571,8.681-6.571 c3.491,0,6.35,1.418,9.407,4.782l6.073-7.888c-5.006-4.355-11.001-6.571-17.541-6.571c-10.552,0-18.612,7.278-18.612,16.939 c0,8.176,3.753,12.344,14.679,16.258c4.565,1.59,6.885,2.649,8.052,3.371c2.324,1.512,3.495,3.633,3.495,6.118 c0,4.801-3.85,8.344-9.048,8.344c-5.549,0-10.02-2.746-12.707-7.895l-7.506,7.195c5.358,7.798,11.802,11.274,20.669,11.274 c12.078,0,20.576-8,20.576-19.442C165.476,224.498,161.547,220.236,148.301,215.439"/> <path style="fill:#0B161F;" d="M169.143,222.354c0,17.414,13.785,30.903,31.506,30.903c5.014,0,9.302-0.984,14.589-3.454V236.21 c-4.658,4.621-8.778,6.481-14.058,6.481c-11.723,0-20.048-8.434-20.048-20.419c0-11.356,8.591-20.325,19.517-20.325 c5.538,0,9.751,1.949,14.589,6.657v-13.583c-5.096-2.567-9.313-3.626-14.327-3.626 C183.286,191.399,169.143,205.157,169.143,222.354"/> <polyline style="fill:#0B161F;" points="309.556,232.491 293.623,192.734 280.916,192.734 306.252,253.437 312.508,253.437 338.289,192.734 325.668,192.734 309.556,232.491 	"/> <polyline style="fill:#0B161F;" points="343.576,251.921 376.593,251.921 376.593,241.905 355.209,241.905 355.209,225.913 375.774,225.913 375.774,215.896 355.209,215.896 355.209,202.758 376.593,202.758 376.593,192.734 343.576,192.734 343.576,251.921 	"/> <path style="fill:#0B161F;" d="M399.313,219.978h-3.39V202.04h3.573c7.263,0,11.203,3.031,11.203,8.789 C410.699,216.771,406.759,219.978,399.313,219.978L399.313,219.978z M422.669,210.201c0-11.087-7.689-17.467-21.122-17.467h-17.268 v59.187h11.641v-23.786h1.527l16.097,23.786h14.32l-18.802-24.935C417.846,225.213,422.669,219.26,422.669,210.201"/> </g> <path d="M138.61,306.933v-33.298l22.735,23.786v-21.669h4.707v33.077l-22.735-23.73v21.829h-4.707V306.933z"/> <path d="M190.729,280.176h-12.501v7.491h12.138v4.426h-12.138v10.417h12.501v4.423h-17.205v-31.176h17.205V280.176z"/> <path d="M205.509,280.176v26.754h-4.707v-26.754h-7.165v-4.423h19.023v4.423H205.509z"/> <path d="M220.251,275.757l8.12,20.838l8.486-22.353l8.116,22.353l8.621-20.838h5.111l-13.934,33.156l-8.019-22.091l-8.359,22.114 l-13.25-33.178L220.251,275.757L220.251,275.757z"/> <path d="M259.607,291.206c0-4.393,1.613-8.161,4.827-11.308c3.203-3.151,7.057-4.726,11.555-4.726c4.441,0,8.251,1.587,11.427,4.763 c3.192,3.181,4.782,6.993,4.782,11.454c0,4.479-1.601,8.284-4.801,11.409c-3.218,3.136-7.102,4.707-11.652,4.707 c-4.022,0-7.641-1.396-10.844-4.18C261.373,300.239,259.607,296.198,259.607,291.206z M264.355,291.255 c0,3.442,1.16,6.271,3.472,8.494c2.301,2.223,4.962,3.33,7.981,3.33c3.267,0,6.028-1.13,8.277-3.386 c2.249-2.286,3.371-5.07,3.371-8.352c0-3.326-1.111-6.11-3.334-8.352c-2.208-2.26-4.939-3.39-8.198-3.39 c-3.244,0-5.983,1.13-8.213,3.39C265.474,285.212,264.355,287.973,264.355,291.255z"/> <path d="M308.677,293.646l9.654,13.287h-5.755l-8.905-12.759h-0.849v12.759h-4.707v-31.176h5.512c4.123,0,7.094,0.775,8.928,2.324 c2.021,1.721,3.031,3.996,3.031,6.825c0,2.208-0.632,4.105-1.901,5.691C312.418,292.183,310.753,293.204,308.677,293.646z M302.824,290.072h1.489c4.456,0,6.687-1.703,6.687-5.108c0-3.192-2.167-4.786-6.503-4.786h-1.673L302.824,290.072L302.824,290.072z "/> <path d="M327.722,288.194l12.135-12.438h6.282l-14.095,14.118l14.178,17.059h-6.301l-11.229-13.871l-0.969,0.973v12.898h-4.707 v-31.176h4.707v12.437L327.722,288.194L327.722,288.194z"/> <path style="fill:#F26E21;" d="M473.194,254.743c-44.568,56.448-148.017,153.97-331.984,198.987 c29.283,12.954,61.657,20.202,95.737,20.202C361.836,473.931,464.09,377.3,473.194,254.743z"/> </svg>
									</li>
									<li>
										<svg style="width: 60px;" viewBox="0 0 74 74" xmlns="http://www.w3.org/2000/svg" data-name="color line"><path d="m60.884 20.475v-1.375a2.9 2.9 0 0 0 -2.9-2.9h-52.084a2.9 2.9 0 0 0 -2.9 2.9v31.526a2.9 2.9 0 0 0 2.9 2.895h2.444" fill="#27ccbc"/><path d="m8.344 54.021h-2.444a3.4 3.4 0 0 1 -3.4-3.395v-31.526a3.409 3.409 0 0 1 3.4-3.4h52.079a3.409 3.409 0 0 1 3.4 3.4v1.376a.5.5 0 1 1 -1 0v-1.376a2.407 2.407 0 0 0 -2.4-2.4h-52.079a2.407 2.407 0 0 0 -2.4 2.4v31.526a2.4 2.4 0 0 0 2.4 2.395h2.444a.5.5 0 1 1 0 1z" fill="#323c6b"/><path d="m66.22 35.235v-11.856a2.9 2.9 0 0 0 -2.9-2.9h-52.079a2.9 2.9 0 0 0 -2.9 2.9v31.528a2.9 2.9 0 0 0 2.9 2.9h52.079" fill="#27ccbc"/><path d="m63.43 25.978v10.272h2.387l.1-.8v-11.862a2.9 2.9 0 0 0 -2.9-2.9h-52.077a2.9 2.9 0 0 0 -2.86 2.42 2.222 2.222 0 0 1 .37-.03h52.08a2.9 2.9 0 0 1 2.9 2.9z" fill="#21b3a9"/><path d="m61.817 35.5v-4.585a5.838 5.838 0 0 1 -5.838-5.838h-37.4a5.838 5.838 0 0 1 -5.838 5.838v16.455a5.838 5.838 0 0 1 5.838 5.838h36.968" fill="#21b3a9"/><path d="m55.547 53.708h-36.965a.5.5 0 0 1 -.5-.5 5.344 5.344 0 0 0 -5.338-5.338.5.5 0 0 1 -.5-.5v-16.454a.5.5 0 0 1 .5-.5 5.344 5.344 0 0 0 5.338-5.338.5.5 0 0 1 .5-.5h37.4a.5.5 0 0 1 .5.5 5.344 5.344 0 0 0 5.338 5.338.5.5 0 0 1 .5.5v4.584a.5.5 0 0 1 -1 0v-4.1a6.348 6.348 0 0 1 -5.82-5.822h-36.437a6.348 6.348 0 0 1 -5.819 5.822v15.49a6.348 6.348 0 0 1 5.818 5.818h36.485a.5.5 0 0 1 0 1z" fill="#323c6b"/><circle cx="37.28" cy="39.143" fill="#eeefee" r="8.469"/><path d="m37.28 48.112a8.969 8.969 0 1 1 8.97-8.969 8.979 8.979 0 0 1 -8.97 8.969zm0-16.939a7.969 7.969 0 1 0 7.97 7.97 7.979 7.979 0 0 0 -7.97-7.97z" fill="#323c6b"/><circle cx="20.968" cy="39.143" fill="#eeefee" r="2.623"/><path d="m20.968 42.267a3.124 3.124 0 1 1 3.124-3.124 3.127 3.127 0 0 1 -3.124 3.124zm0-5.247a2.124 2.124 0 1 0 2.124 2.124 2.126 2.126 0 0 0 -2.124-2.124z" fill="#323c6b"/><circle cx="53.593" cy="39.143" fill="#eeefee" r="2.623"/><g fill="#323c6b"><path d="m53.593 42.267a3.124 3.124 0 1 1 3.124-3.124 3.127 3.127 0 0 1 -3.124 3.124zm0-5.247a2.124 2.124 0 1 0 2.124 2.124 2.126 2.126 0 0 0 -2.124-2.124z"/><path d="m36.8 44.212v-.734a4.08 4.08 0 0 1 -2.143-.617l.343-.937a3.732 3.732 0 0 0 2.017.6c.995 0 1.667-.574 1.667-1.373 0-.771-.546-1.247-1.583-1.667-1.429-.56-2.311-1.2-2.311-2.423a2.3 2.3 0 0 1 2.11-2.254v-.734h.868v.678a3.737 3.737 0 0 1 1.822.49l-.35.925a3.386 3.386 0 0 0 -1.765-.476c-1.079 0-1.485.644-1.485 1.2 0 .728.518 1.093 1.737 1.6 1.443.589 2.171 1.317 2.171 2.564a2.437 2.437 0 0 1 -2.213 2.382v.776z"/><path d="m19.063 61.307h-10.188a.5.5 0 0 1 0-1h10.188a.5.5 0 1 1 0 1z"/><path d="m22.313 61.307h-.937a.5.5 0 0 1 0-1h.938a.5.5 0 1 1 0 1z"/><path d="m41.958 13.693h-.844a.5.5 0 0 1 0-1h.844a.5.5 0 0 1 0 1z"/><path d="m54.852 13.693h-10.519a.5.5 0 0 1 0-1h10.519a.5.5 0 0 1 0 1z"/></g><path d="m71 39.17c0 2.39-3.61 4.32-8.07 4.32s-8.08-1.93-8.08-4.32 3.62-4.31 8.08-4.31 8.07 1.93 8.07 4.31z" fill="#fcd462"/><path d="m71 39.17v4.78c0 2.38-3.61 4.31-8.07 4.31s-8.08-1.93-8.08-4.31v-4.78c0 2.39 3.62 4.32 8.08 4.32s8.07-1.93 8.07-4.32z" fill="#fcd462"/><path d="m71 43.95v4.77c0 2.38-3.61 4.31-8.07 4.31s-8.08-1.93-8.08-4.31v-4.77c0 2.38 3.62 4.31 8.08 4.31s8.07-1.93 8.07-4.31z" fill="#fcd462"/><path d="m71 48.72v4.77c0 2.38-3.61 4.32-8.07 4.32s-8.08-1.94-8.08-4.32v-4.77c0 2.38 3.62 4.31 8.08 4.31s8.07-1.93 8.07-4.31z" fill="#fcd462"/><path d="m62.575 34.985c-3.29 0-6.12 1.05-7.37 2.55a12.655 12.655 0 0 1 5.36-1.09c4.358 0 7.9 1.844 8.064 4.149v1.555a3.552 3.552 0 0 0 2.016-2.854c0-2.38-3.61-4.31-8.07-4.31z" fill="#f7be56"/><path d="m70.83 39.17v4.78c0 1.18-.88 2.24-2.31 3.02v-4.77c1.43-.79 2.31-1.85 2.31-3.03z" fill="#f7be56"/><path d="m70.83 43.95v4.77c0 1.18-.88 2.24-2.31 3.02v-4.77c1.43-.78 2.31-1.84 2.31-3.02z" fill="#f7be56"/><path d="m70.83 48.72v4.77c0 2.38-3.61 4.32-8.07 4.32-.39 0-.77-.02-1.15-.05 3.91-.3 6.91-2.1 6.91-4.27v-1.75c1.43-.78 2.31-1.84 2.31-3.02z" fill="#f7be56"/><path d="m62.56 41.577v-.348a4.642 4.642 0 0 1 -1.644-.292l.258-.445a4.222 4.222 0 0 0 1.548.285c.763 0 1.279-.272 1.279-.651s-.419-.591-1.215-.79c-1.1-.265-1.773-.571-1.773-1.149 0-.551.634-.969 1.623-1.069v-.348h.664v.321a4.283 4.283 0 0 1 1.4.232l-.269.438a3.859 3.859 0 0 0 -1.354-.226c-.828 0-1.139.305-1.139.571 0 .345.4.518 1.333.757 1.107.279 1.666.624 1.666 1.215 0 .525-.591 1.016-1.7 1.129v.368z" fill="#323c6b"/><path d="m63.32 58.307h-52.079a3.4 3.4 0 0 1 -3.4-3.4v-31.528a3.4 3.4 0 0 1 3.4-3.4h52.079a3.4 3.4 0 0 1 3.4 3.4v11.856a.5.5 0 0 1 -1 0v-11.856a2.4 2.4 0 0 0 -2.4-2.4h-52.079a2.4 2.4 0 0 0 -2.4 2.4v31.528a2.4 2.4 0 0 0 2.4 2.4h52.079a.5.5 0 0 1 0 1z" fill="#323c6b"/><path d="m62.93 43.99c-4.811 0-8.58-2.117-8.58-4.82s3.769-4.81 8.58-4.81 8.57 2.113 8.57 4.81-3.764 4.82-8.57 4.82zm0-8.63c-4.109 0-7.58 1.745-7.58 3.81s3.471 3.82 7.58 3.82 7.57-1.75 7.57-3.82-3.467-3.81-7.57-3.81z" fill="#323c6b"/><path d="m62.93 48.76c-4.811 0-8.58-2.113-8.58-4.81v-4.78a.5.5 0 1 1 1 0c0 2.071 3.471 3.82 7.58 3.82s7.57-1.75 7.57-3.82a.5.5 0 0 1 1 0v4.78c0 2.697-3.764 4.81-8.57 4.81zm-7.58-7.3v2.49c0 2.065 3.471 3.81 7.58 3.81s7.57-1.745 7.57-3.81v-2.485c-1.429 1.516-4.251 2.525-7.57 2.525s-6.15-1.011-7.58-2.527z" fill="#323c6b"/><path d="m62.93 53.53c-4.811 0-8.58-2.113-8.58-4.81v-4.77a.5.5 0 0 1 1 0c0 2.065 3.471 3.81 7.58 3.81s7.57-1.745 7.57-3.81a.5.5 0 0 1 1 0v4.77c0 2.697-3.764 4.81-8.57 4.81zm-7.58-7.291v2.481c0 2.065 3.471 3.81 7.58 3.81s7.57-1.745 7.57-3.81v-2.48c-1.429 1.512-4.251 2.52-7.57 2.52s-6.15-1.009-7.58-2.521z" fill="#323c6b"/><path d="m62.93 58.31c-4.811 0-8.58-2.117-8.58-4.82v-4.77a.5.5 0 0 1 1 0c0 2.065 3.471 3.81 7.58 3.81s7.57-1.745 7.57-3.81a.5.5 0 0 1 1 0v4.77c0 2.703-3.764 4.82-8.57 4.82zm-7.58-7.3v2.48c0 2.07 3.471 3.82 7.58 3.82s7.57-1.75 7.57-3.82v-2.48c-1.429 1.512-4.251 2.52-7.57 2.52s-6.15-1.009-7.58-2.522z" fill="#323c6b"/><path d="m46.342 50.9h-9.131a.583.583 0 0 1 0-1.165h9.131a.583.583 0 0 1 0 1.165z" fill="#fff"/><path d="m34.578 50.9h-1.12a.583.583 0 0 1 0-1.165h1.12a.583.583 0 0 1 0 1.165z" fill="#fff"/></svg>
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
import { uuid } from 'vue-uuid'
import { SAVE_PLACE_ORDER_ACTION } from '@web/store/placeOrders/actions'
import { GET_PROMOTIONS_ACTION } from '@web/store/promotions/actions'
export default {
	components: {  },
	data() {
		return {
			baseUrl:Vue.config.baseUrl,
			baseUrlImage:Vue.config.baseUrlImage,
			getVatData:{},
			getTotalData : {
				subTotal:0.00,
				vat:0.00,
				vatName:0.00,
				discount:0.00,
				difference_price:0.00,
				shippingCharge:0.00,
				deliveryChange:0.00,
				coupon_discount_amount: 0.00,
				gift_discount_amount: 0.00,
				total:0.00
			},
			default_shipping_charge: 0,
			shipping_free: false,
			place_order_loading: false,
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
		}, 
		getShipping: {
			getShipping: Object,
			required: true,
		}
	},
	watch: {
		'$route': function () { },
		getTotal:[{
			handler: 'getTotalFunc'
		}],
	},
	computed:{
		...mapState({
			saveOrderResponse:state => state.PlaceOrder.saveOrderResponse,
			getPromotions: state => state.Promotion.getPromotions,
		}),
	},
	methods: {
		placeOrder:function(paymentMode){
			let _this = this;
			if(!Vue.helpers.isEmpty(_this.$user)){
				_this.place_order_loading = true;
				_this.$store.dispatch('PlaceOrder/'+SAVE_PLACE_ORDER_ACTION ,{
					'user_id':_this.$user.id,
					'data':_this.getTotalData,
					'paymentMode':paymentMode,
					'session_id':Vue.helpers.getSession()
				}).then(() => {
					_this.place_order_loading = false;
					if(_this.saveOrderResponse.data > 0){
						_this.$router.push({name:'getCheckoutConfirmed'}) 
					}
				});
			}
		},
		getTotalFunc:function(){
			let _this = this;
			_this.getTotalData = _this.getTotal;
			_this.default_shipping_charge = _this.getTotal.shippingCharge;
		},
		getDeliveryOption:function(event,status){
			let _this = this;
			if(status == 'free'){
				_this.getTotalData.deliveryChange = 0.00;
				_this.getTotalData.shippingCharge =_this.default_shipping_charge;
				_this.getTotalData.total-=_this.getShipping.fast_delivery - _this.default_shipping_charge;
			}else{
				_this.getTotalData.deliveryChange = _this.getShipping.fast_delivery;
				_this.getTotalData.shippingCharge = 0;
				_this.getTotalData.total+=_this.getShipping.fast_delivery - _this.default_shipping_charge;
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
		getPromotionData: function(){
			this.$store.dispatch('Promotion/' + GET_PROMOTIONS_ACTION).then(() => {
				this.getPromotionDiscount();
			});
		},
		getPromotionDiscount: function() {
			if ((this.getCartItems.length!=1) || (this.getPromotions.length ==0)) {
				return;
			}
			let item = this.getCartItems[0];
			for (let i=0;i<this.getPromotions.length;i++){
				let getPromotion = this.getPromotions[i];
				let bonus = null;
				if (getPromotion.conditions.type == 'products') {
					if (getPromotion.conditions.logic == '==') {
						bonus = getPromotion.bonus.find(val => val.id == item.product_id);
					} else if (getPromotion.conditions.logic == '!=' && !getPromotion.conditions.value.includes(item.id)) {
						bonus = getPromotion.bonus[0];
					}
				} else if (getPromotion.conditions.type == 'categories') {
					if (getPromotion.conditions.logic == '==') {
						if (getCartItems.find(product => product.category_id != item.category_id)) {
							return false;
						}
						bonus = getPromotion.bonus.find(val => val.id == item.category_id);
					} else if (getPromotion.conditions.logic == '!=' && !getPromotion.conditions.value.includes(item.category_id)) {
						bonus = getPromotion.bonus[0];
					}
				} else if (getPromotion.conditions.type == 'brands') {
					if (getPromotion.conditions.logic == '==') {
						if (getCartItems.find(product => product.brand_id != item.brand_id)) {
							return false;
						}
						bonus = getPromotion.bonus.find(val => val.id == item.brand_id);
					} else if (getPromotion.conditions.logic == '!=' && !getPromotion.conditions.value.includes(item.brand_id)) {
						bonus = getPromotion.bonus[0];
					}
				} else if (getPromotion.conditions.type == 'users') {
					if (getPromotion.conditions.logic == '==') {
						bonus = getPromotion.bonus.find(val => val.id == $user.id);
					} else if (getPromotion.conditions.logic == '!=' && !getPromotion.conditions.value.includes($user.id)) {
						bonus = getPromotion.bonus[0];
					}
				} else if (getPromotion.conditions.type == 'products_price') {
					getCartItems.forEach(product => {
						if (eval(product.original_price+getPromotion.conditions.logic+getPromotion.conditions.value)) {
							bonus = getPromotion.bonus[0];
						} else {
							return false;
						}
					});
				}
				
				if (bonus) {
					if (bonus.type == 'free_shipping') {
						this.getTotal['total']-=this.getTotal['shippingCharge'];
						this.getTotal['shippingCharge'] = 0;
						this.shipping_free = true;
					}

					if (bonus.type == 'order_discount') {
						this.getTotal['total'] = bonus.logic == 'to_percentage_of_the_original_price' ? (this.getTotal['total']-((this.getTotal['total'] * bonus.value)/100)) : (this.getTotal['total'] - bonus.value);
					}
				}
			}

			return false;
		}         	
	},
	mounted(){
		this.getPromotionData();
	}

}
</script>