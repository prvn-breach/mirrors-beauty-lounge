<template>
<div>
<header class="hide-mobile-1080">
			<div class="dv_sm_head">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-6">
							<ul class="dv_cash_hyg_brands">
								<li>Cash on delivery</li>
								<li>100% hygienic </li>
								<li>100% Genuine Brands </li>
							</ul>
						</div>
						<div class="col-md-6 text-right">
							
							<ul class="dv_login_ab_sell">
								<!-- <li class="nav-item dropdown">
									<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">My Account </a>
								    <ul class="dropdown-menu dv_myaccount_drp">
									  <li><a class="dropdown-item" href="#">Profile </a></li>
									  <li><a class="dropdown-item" href="#">Orders </a></li>
									  <li><a class="dropdown-item" href="#">Cart </a></li>
									  <li><a class="dropdown-item" href="#">WishList </a></li>
									  <li><a class="dropdown-item" href="#">Address </a></li>
									  <li><a class="dropdown-item" href="#">Payments </a></li>
									  <li><a class="dropdown-item" href="#">Claims </a></li>
									  <li><a class="dropdown-item" href="#">Sell </a></li>
								    </ul>
								</li> -->
								<li class="nav-item " :class="checkCountry()?'dropdown':''" >
									<a class="nav-link " href="javascript:void" :class="checkCountry()?'dropdown-toggle':''" :data-toggle="checkCountry()?'dropdown':''" >
									{{getCurrentCountry()}} </a>

								    <ul v-if="checkCountry" class="dropdown-menu dv_myaccount_drp">
								    	<Country v-for="getCountry in getTraceLocation.get_countries" v-bind:getCountry="getCountry" v-bind:key="getCountry.id"></Country>
								    </ul>
								</li>
								<!-- <li class="nav-item dropdown">
									<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">{{getLocale.name}} </a>
								    <ul class="dropdown-menu dv_myaccount_drp">
									  <Lenguage v-for="lenguage in getLenguage" v-bind:getLenguage="lenguage" v-bind:key="lenguage.code"></Lenguage>
								    </ul>
								</li> -->
								<!-- <li><a :href="baseUrl+'seller/register'"> Seller Registration </a></li> -->
								<li v-if="getUser.status == 0"><a class="nav-link " href="javascript:void(0)" data-toggle="modal" data-target="#login_register" @click="getLogin">Login </a></li>
								<li v-if="getUser.status == 0"><a class="nav-link " href="javascript:void(0)" data-toggle="modal" data-target="#login_register" @click="getRegister">Register </a></li>
								<li class="nav-item dropdown" v-if="getUser.status == 1">
									<a class="nav-link dropdown-toggle" href="javascript:void(0)" data-toggle="dropdown">My Account </a>
								    <ul class="dropdown-menu dv_myaccount_drp">
									  <li>
									  	 <router-link :to="{ name: 'getProfile'}" class="dropdown-item">
									  		<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg> Profile
									  </router-link>
									  </li>
									  <li>
									   <router-link :to="{ name: 'getOrders'}" class="dropdown-item">
									  		<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>
									  	Orders 
									  </router-link>
									  </li>
									  <li>
									  <router-link :to="{ name: 'getCart'}" class="dropdown-item">
									  		<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>Cart
									  	</router-link>
									  </li>
									  <li>
									   <router-link :to="{ name: 'getCart'}" class="dropdown-item">
									  		<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg> WishList
									  	</router-link>
									  </li>
									  <li>
									  	 <router-link :to="{ name: 'getAddressAccount'}" class="dropdown-item">
									  		<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-map-pin"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>Address 
									  	</router-link>
									  </li>
									  <li>
									  	 <router-link :to="{ name: 'getPayments'}" class="dropdown-item">
									  		<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-dollar-sign"><line x1="12" y1="1" x2="12" y2="23"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>Payments
									  	</router-link>
									  </li>
									  <!-- <li>
									  	 <router-link :to="{ name: 'getReturns'}" class="dropdown-item">
									  		<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-repeat"><polyline points="17 1 21 5 17 9"></polyline><path d="M3 11V9a4 4 0 0 1 4-4h14"></path><polyline points="7 23 3 19 7 15"></polyline><path d="M21 13v2a4 4 0 0 1-4 4H3"></path></svg>Returns
									  	</router-link>
									  </li> -->
									  <li>
									  	<router-link :to="{ name: 'getAccountPassword'}" class="dropdown-item">
									  		<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>Change Password
									  	</router-link>
									  </li>
									  <li>
									  	<a class="dropdown-item" href="javascript:void(0);" @click="logout">
									  		<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>Sign Out
									  	</a>
									  </li>
								    </ul>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="dv_logo_seach_cart sticky-header">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-2">
							<a :href="baseUrl" title="Mirror Beauty Lounge">
							<svg  version="1.1" class="dv_logo_main" enable-background="new 0 0 512 512" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 685 168"> <g> <g> <path d="M104.2,4v96.2H83.6l0.5-64.8L54.8,77.3h-5.7l-29-40.9l0.5,63.8H0.1L0.1,4h21.1L52,50.5L82.6,4H104.2z"></path> <path d="M124.7,4h20.7v96.2h-20.7V4z"></path> <path d="M233.6,100.2l-29-35.2h-17.9v35.2H166V4h47.7c9.8,0,17.8,2.8,23.9,8.3s9.2,12.9,9.2,22c0,6.3-1.8,12-5.5,16.9 c-3.7,5-8.7,8.6-15,11l32.2,38H233.6z M186.7,47.7h24.1c4.5,0,8.1-1.2,10.7-3.6c2.7-2.4,4-5.5,4-9.5c0-4.2-1.3-7.5-4-9.8 c-2.7-2.3-6.3-3.5-10.7-3.5h-24.1V47.7z"></path> <path d="M335,100.2L306,65H288v35.2h-20.7V4h47.7c9.8,0,17.8,2.8,23.9,8.3c6.1,5.5,9.2,12.9,9.2,22c0,6.3-1.8,12-5.5,16.9 c-3.7,5-8.7,8.6-15,11l32.2,38H335z M288,47.7h24.1c4.5,0,8.1-1.2,10.7-3.6c2.7-2.4,4-5.5,4-9.5c0-4.2-1.3-7.5-4-9.8 c-2.7-2.3-6.3-3.5-10.7-3.5H288V47.7z"></path> <path d="M378,86.6c-9.7-9.1-14.5-20.6-14.5-34.5s4.8-25.4,14.5-34.5C387.6,8.5,399.9,4,414.7,4c14.9,0,27.1,4.5,36.7,13.6 c9.6,9.1,14.4,20.6,14.4,34.5s-4.8,25.4-14.4,34.5c-9.6,9.1-21.9,13.6-36.7,13.6C399.9,100.2,387.6,95.7,378,86.6z M436.1,73.9 c5.7-5.7,8.5-13,8.5-21.8s-2.8-16-8.5-21.8c-5.7-5.7-12.8-8.6-21.4-8.6c-8.7,0-15.9,2.9-21.6,8.6c-5.7,5.7-8.5,13-8.5,21.8 s2.8,16,8.5,21.8c5.7,5.7,12.9,8.6,21.6,8.6C423.3,82.5,430.5,79.6,436.1,73.9z"></path> <path d="M547.6,100.2l-29-35.2h-17.9v35.2h-20.7V4h47.7c9.8,0,17.8,2.8,23.9,8.3s9.2,12.9,9.2,22c0,6.3-1.8,12-5.5,16.9 c-3.7,5-8.7,8.6-15,11l32.2,38H547.6z M500.6,47.7h24.1c4.5,0,8.1-1.2,10.7-3.6c2.7-2.4,4-5.5,4-9.5c0-4.2-1.3-7.5-4-9.8 c-2.7-2.3-6.3-3.5-10.7-3.5h-24.1V47.7z"></path> <path d="M577.1,92.3l5.8-17.9c10.8,6.4,22,9.6,33.6,9.6c5.2,0,9.3-0.9,12.5-2.7c3.1-1.8,4.7-4.6,4.7-8.4c0-3.1-1.7-5.4-5.2-7 c-3.5-1.6-10.1-3.5-19.8-5.8c-3.3-0.8-6.2-1.6-8.7-2.4c-2.5-0.8-5.2-2-8.1-3.5c-2.9-1.5-5.4-3.3-7.2-5.3c-1.9-2-3.5-4.5-4.7-7.6 c-1.3-3.1-1.9-6.5-1.9-10.3c0-9.3,3.6-16.5,10.7-21.6C595.7,4.5,605,2,616.5,2c11.8,0,23,2.7,33.6,8.2l-6.5,17 c-9.1-4.9-18.6-7.4-28.5-7.4c-5.1,0-9,0.8-11.8,2.5c-2.8,1.7-4.2,4-4.2,7c0,3,1.6,5.3,4.8,6.9c3.2,1.6,8.7,3.3,16.4,5.1 c3.9,0.9,7.1,1.7,9.8,2.5c2.6,0.8,5.7,2,9.1,3.6c3.4,1.6,6.2,3.4,8.2,5.3c2.1,1.9,3.8,4.5,5.3,7.6c1.4,3.1,2.2,6.7,2.2,10.6 c0,9.6-3.8,17.2-11.3,22.8c-7.5,5.6-17.1,8.4-28.8,8.4C602.3,102.2,589.6,98.9,577.1,92.3z"></path> </g> <g> <path d="M3.9,130.6H15c3.2,0,5.6,0.7,7.3,2.1c1.7,1.4,2.6,3.3,2.6,5.8c0,1.8-0.5,3.3-1.4,4.6s-2.1,2.1-3.6,2.4 c2.2,0.4,3.9,1.2,5.1,2.4c1.2,1.2,1.8,2.8,1.8,4.7c0,2.6-1,4.6-3.1,6c-2.1,1.4-4.9,2.1-8.6,2.1H3.9V130.6z M16,144.4 c1.9,0,3.4-0.5,4.4-1.5c1.1-1,1.6-2.5,1.6-4.3c0-1.8-0.6-3.1-1.9-4c-1.2-0.9-3-1.4-5.3-1.4H6.6v11.3H16z M15.1,158.2 c2.8,0,5-0.5,6.5-1.4c1.5-0.9,2.3-2.3,2.3-4.2c0-1.8-0.7-3.2-2.1-4.2s-3.3-1.5-5.9-1.5H6.6v11.3H15.1z"></path> <path d="M78.9,158.2v2.5H57.8v-30h21.1v2.5H60.5v11.5h16.6v2.5H60.5v11.1H78.9z"></path> <path d="M120,130.6h2.9l13,30h-3l-3.2-7.6h-16.5l-3.2,7.6H107L120,130.6z M128.7,150.6l-7.2-16.9l-7.3,16.9H128.7z"></path> <path d="M168.2,158.2c-2.1-2-3.1-4.9-3.1-8.5v-19.1h2.7v19.1c0,2.9,0.8,5.2,2.4,6.7c1.6,1.5,3.9,2.3,6.9,2.3c3,0,5.3-0.8,7-2.3 c1.6-1.5,2.5-3.8,2.5-6.7v-19.1h2.7v19.1c0,3.7-1.1,6.5-3.2,8.5c-2.1,2-5.1,3-9,3C173.3,161.2,170.3,160.2,168.2,158.2z"></path> <path d="M244.8,133.1h-11.5v27.5h-2.7v-27.5h-11.5v-2.5h25.7V133.1z"></path> <path d="M283.1,148l-11.8-17.3h3.1l10.1,15l10.1-15h3.1L285.9,148v12.7h-2.7L283.1,148z"></path> <path d="M361.2,130.6h2.7v27.5h17.6v2.5h-20.3V130.6z"></path> <path d="M414,156.8c-2.9-2.9-4.3-6.7-4.3-11.2s1.4-8.3,4.3-11.2c2.9-2.9,6.5-4.4,10.9-4.4c4.4,0,8,1.5,10.9,4.4 c2.9,2.9,4.3,6.7,4.3,11.2s-1.4,8.3-4.3,11.2c-2.9,2.9-6.5,4.4-10.9,4.4C420.5,161.2,416.9,159.8,414,156.8z M433.7,155 c2.3-2.5,3.5-5.6,3.5-9.4s-1.2-6.9-3.5-9.4c-2.3-2.5-5.3-3.7-8.8-3.7c-3.6,0-6.5,1.2-8.9,3.7c-2.3,2.5-3.5,5.6-3.5,9.4 s1.2,6.9,3.5,9.4c2.3,2.5,5.3,3.7,8.9,3.7C428.5,158.7,431.4,157.5,433.7,155z"></path> <path d="M473.8,158.2c-2.1-2-3.1-4.9-3.1-8.5v-19.1h2.7v19.1c0,2.9,0.8,5.2,2.4,6.7c1.6,1.5,3.9,2.3,6.9,2.3c3,0,5.3-0.8,7-2.3 c1.6-1.5,2.5-3.8,2.5-6.7v-19.1h2.7v19.1c0,3.7-1.1,6.5-3.2,8.5c-2.1,2-5.1,3-9,3C478.8,161.2,475.9,160.2,473.8,158.2z"></path> <path d="M551.7,130.6v30h-2.6l-19.7-25.8v25.8h-2.7v-30h2.6l19.6,25.7v-25.7H551.7z"></path> <path d="M586.5,157.1c-2.9-2.8-4.3-6.5-4.3-11.2c0-4.9,1.4-8.7,4.4-11.6c3-2.8,6.8-4.3,11.6-4.3c3.4,0,6.7,0.8,9.8,2.4l-0.9,2.4 c-2.7-1.6-5.6-2.3-8.8-2.3c-3.9,0-7.1,1.2-9.6,3.6c-2.5,2.4-3.7,5.6-3.7,9.7c0,3.9,1.2,7.1,3.6,9.4c2.4,2.3,5.5,3.5,9.3,3.5 c2.6,0,5.4-0.6,8.2-1.9l0-8.8h-9v-2.5h11.7v12.8c-4.1,1.9-7.8,2.9-11.2,2.9C593.1,161.2,589.3,159.8,586.5,157.1z"></path> <path d="M661.1,158.2v2.5H640v-30h21.1v2.5h-18.4v11.5h16.6v2.5h-16.6v11.1H661.1z"></path></g></g></svg>
						</a>
						</div>
						<div class="col-md-8">
						<autocomplete
							:source="distributionGroupsEndpoint"
							ref="autocomplete"
							:initial-display="getSearchName"
							placeholder="What are you looking for ?"
							:results-display="formattedDisplay"
							@selected="addDistributionGroup"
							@clear="getSearchFocus()"
						></autocomplete>
							<!-- <autocomplete :suggestions="cities" :selection.sync="value"></autocomplete> -->
						<!-- 	<div class="input-group">
								<input id="autocomplete" type="text" class="form-control dv_search_input" placeholder="What are you looking for ?">
								<div class="input-group-btn">
									<button class="btn btn-primary dv_search_btn" type="submit">
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
									</button>
								</div>
								<span class="loading"></span>
							</div> -->
						</div>
						<div class="col-md-2 text-right">
							<ul class="dv_cart_wish_account">
								<li>
									<router-link :to="{ name: 'getCart'}" >
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg>
										<span class="dv_circle_value">{{  getWishlist.length }}</span>
									</router-link>
								</li>
								<li v-if="Object.keys($user).length > 0">
									<router-link :to="{ name: 'getProfile'}">
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
									</router-link>
								</li>
								<li>
									<router-link :to="{ name: 'getCart'}" >
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>
										<span class="dv_circle_value">{{ (getCartItems != undefined) ? getCartItems.length:0 }} </span>
									</router-link>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="dv_all_category">
				<div class="container-fluid">
					<ul class="navbar-nav dv_all_cate_menu">
						<Category v-for="getCategory in getCategories" v-bind:getCategory="getCategory" v-bind:key="getCategory.id"></Category>
					</ul>
				</div>
			</div>
			

			
</header>
<Login :getModelStatus="getModelStatus" @updateLoginModel="getLogin" @updateRegisterModel="getRegister" @getLoginAccess="getLoginSign"></Login>

<!-- Forgot Password Modal -->
<div class="modal fade pr-0" id="forgot_pwd_modal" tabindex="-1" role="dialog" aria-labelledby="forgot_pwd_modal" aria-modal="true" data-backdrop="static" data-keyboard="false" style="z-index: 10000;">
	<div class="modal-dialog dv_login_register_dialog">
		<div class="modal-content dv_share_modal_content">
			<div class="modal-header dv_share_modal_header">
				<h4 class="modal-title">Forgot Password </h4>
				<svg data-dismiss="modal" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
			</div>
			<div class="modal-body dv_share_modal_body">
				<ul class="dv_customer_register_ul">
					<li>
						<div class="material-textfield">
							<input placeholder=" " type="email" class="form-control dv_material_input " v-model="forgotPwd.email" :class="status($v.forgotPwd.email)" @input="setLoginEmail($event.target.value)">
							<label class="dv_material_lbl">Email </label>
							<span v-for="(email, index) in getUserError.email" :key="index" class="text-danger">{{email}}</span>
							<span v-if="forgotPasswordMailMessage" class="text-dark font-weight-bold">{{ forgotPasswordMailMessage }}</span>
						</div>
					</li>
					<li>
						<button type="button" class="btn btn-default dv_login_register_btn" @click="forgotPassword">Submit</button>
					</li>
				</ul>
			</div>     
		</div>
	</div>
</div>
<mobile-view :getCartItems="getCartItems" :getWishlist="getWishlist" ></mobile-view>
	</div>
	</template>
<script type="text/javascript">
 import Vue from 'vue'
  import MobileView from '@web/components/include/MobileView'; 
 import Category from '@web/components/navigation/Category'
import Autocomplete from 'vuejs-auto-complete'
 import Login from '@web/components/users/Login'
 import Country from '@web/components/include/Countries'
 import Lenguage from '@web/components/include/Lenguage'
 import { LOAD_CATEGORY_LIST_ACTION } from '@web/store/navigation/categories/actions'
 import { LOAD_WISH_LIST_ACTION } from '@web/store/wishlists/actions'
 import { LOGOUT_ACTION } from '@web/store/users/actions'
 import $ from "jquery";
 import { mapState } from 'vuex'
 import { required, minLength } from 'vuelidate/lib/validators'
 import { FORGOT_PASSWORD_SEND_MAIL_ACTION } from '@web/store/users/actions'

 export default {
 	 components: { Category,Country,Lenguage,Login,Autocomplete,MobileView },
 	  data() {
            return {
              baseUrl:Vue.config.baseUrl,
              baseUrlImage:Vue.config.baseUrlImage,
              getLenguage:{},
              getLocale:{},
              getTraceLocation:[],
              getSearchTags:[],
              getSearchName:'',
              getModelStatus:'login',
              getUser:{
              	token:'',
              	status:0,
              	user:{}
              },
			  forgotPwd: {
				  email: ''
			  },
			  forgotPasswordMailMessage: null
            }
        },
		validations: {
			forgotPwd: {
				email: {
					required
				}
			}
		},
        props: {
            getCartItems: {
                getCartItems: Object,
                required: true,
            }, 
            getWishlist: {
                getWishlist: Object,
                required: true,
            },
        },
        computed:{
			...mapState({
	            getCategories: state => state.Categories.getCategories,
				getUserError: state => state.Users.getError
	        }),
		},
         methods: {
			status: function(validation) {
				return {
					error: validation.$error,
					dirty: validation.$dirty
				}
			},
			setLoginEmail:function(value){
				this.forgotPwd.email = value
				this.$v.forgotPwd.email.$touch()
			},
			setForgotPassword:function(value){
				this.forgotPwd.password = value
				this.$v.forgotPwd.password.$touch()
			},
			setForgotPasswordConfirmation:function(value){
				this.forgotPwd.password_confirmation = value
				this.$v.forgotPwd.password_confirmation.$touch()
			},
         	getSearchFocus:function(){
         		/*if(this.$route.name == 'getProductList'){
	         		let getQuery = this.$route.query;
	         		getQuery.q = '';
	         		this.getQuery(getQuery);
         		}*/
         		
         	},
         	distributionGroupsEndpoint (input) {
		    return this.baseUrl + 'api/get-tag-search?q=' + input
		  },
        getQuery:function(getQuery){
         		this.$router.replace({name: 'getProductList', query: getQuery});
         },
         addDistributionGroup (group) {
         	let _this = this;
         	let currentUrl = this.$router.currentRoute;
         	
         	let routeName = currentUrl.name;
         	let getParam = this.$route.params;
         	 let getQuery = this.$route.query;
		  	let params ={
		  		viewType:'product',
		  		country_leng:getParam.country_leng,
		  		productSlug:group.selectedObject.category
		  	};
		  	let query = {};
		  	Object.assign(query,getQuery);
		  	query.q = group.display;
		   this.getSearchName = group.display;

		  if(routeName == 'getProductList'  ){
		  	getQuery = getQuery;
		  	_this.$router.push({path: this.$route.path,query: query})
		  }else{
			  window.location.href = this.baseUrl + 'get-product-list/'+getParam.country_leng+'?'+'grid=0&q='+group.display;
		  }
		    
		  },
		  formattedDisplay (result) {
			    return result;
			 },
         	 isEmpty:function(obj) {
              for(var prop in obj) {
                if(obj.hasOwnProperty(prop)) {
                  return false;
                }
              }
              return JSON.stringify(obj) === JSON.stringify({});
            },
         	getWishlistCount:function(){
         		let _this = this;
         		if(this.$getWishLists != undefined){
         			return _this.$getWishLists.length
         		}else{
         			return 0;
         		}
         		//
         	},
         	getLogin:function(login=null){
         		this.getModelStatus = 'login';
         		
         	},
         	getRegister:function(register=null){
         		this.getModelStatus = 'register';
         	},
         	setLenguage:function(){
				if (localStorage.getItem("lenguage") === null) {
					return;
				}
				if (localStorage.getItem("locale") === null) {
					return;
				}
         		this.getLenguage = JSON.parse(localStorage.lenguage);
         		this.getLocale = JSON.parse(localStorage.locale);
         	},
         	checkCountry:function(){
				if (localStorage.getItem("countries") === null) {
					return false;
				}
         		let getCountries = JSON.parse(localStorage.countries);
         		if(getCountries && getCountries.get_countries && getCountries.get_countries.length > 1){
         			return true;
         		}else{
         			return false;
         		}
         	},
         	getCurrentCountry:function(){
				if (localStorage.getItem("countries") === null) {
					return false;
				}
         		let getCountries = JSON.parse(localStorage.countries);
         		if(getCountries){
	         		getCountries = getCountries.get_countries.find(function(item){
	         			return item.active==1;
	         		});
	         		return getCountries.code;
         		}
         	},
         	getCountriesData:function(){
				if (localStorage.getItem("countries") === null) {
					return false;
				}
         		let getCountries = JSON.parse(localStorage.countries);
         		this.getTraceLocation = getCountries;
         	},
         	getLoginSign:function(){
         		let _this = this;
         		if(localStorage.getItem('getLogin') != null ){
         			_this.getUser = JSON.parse(localStorage.getItem('getLogin'))
         		}

         	},
         	logout:function(){
         		let _this = this;
         		if(localStorage.getItem('getLogin') != null){
					 let user = JSON.parse(localStorage.getItem('getLogin'))['user'];
					_this.$store.dispatch('Users/' + LOGOUT_ACTION, { user_id: user['id'] }).then(() => {
						localStorage.removeItem('getLogin');
						_this.getUser  =  {
											token:'',
											status:0,
											user:{}
										};
						window.location.href=_this.baseUrl;
					})

         		}
         	},
			forgotPassword:function(){
         		let _this = this;
				_this.$v.forgotPwd.$touch();
				if (!_this.$v.forgotPwd.$invalid) {
					_this.$store.dispatch('Users/' + FORGOT_PASSWORD_SEND_MAIL_ACTION, _this.forgotPwd).then(() => {
						if (Object.keys(_this.getUserError).length == 0) {
							_this.forgotPwd.email = '';
							_this.forgotPasswordMailMessage = 'Please check your mail';
						}
					});
				}
         	},
         	getUserData:function(){
         		let _this = this;
         		if(localStorage.getItem('getLogin') != null ){
         			_this.getUser = JSON.parse(localStorage.getItem('getLogin'))
         		}
         	},
         	getScript:function(){
				$(window).on('load', function(){
					$(document).ready(function() {
						(function ($) {
							function sticky_header(){
							if($('.sticky-header').length){
								var sticky = new Waypoint.Sticky({
								element: $('.sticky-header')
								})
							}
						}
						function fixed_menu_scroll() {
							var scroll = $(window).scrollTop();
							if(scroll >= 100) {
								$(".dv_drp_menu").css({"top":"47px"});
								$(".dv_total_match_sorting_mobile").addClass('dv_total_match_sorting_sticky');
							} else {
								$(".dv_drp_menu").css({"top":"auto"});
								$(".dv_total_match_sorting_mobile").removeClass('dv_total_match_sorting_sticky');
							}
						};
						$(window).scroll(function() {    
							var scroll = $(window).scrollTop();
							if (scroll >= 300) {
								$(".dv_total_match_sorting_mobile").addClass("dv_total_match_sorting_sticky");
							}
							else {
								$(".dv_total_match_sorting_mobile").removeClass('dv_total_match_sorting_sticky');
							}
						});
						sticky_header();
						fixed_menu_scroll();
						})(jQuery);
					})
				});
         	}
         	
         },
          watch: {
            '$route': function(to, from) {
            let _this = this;
            
               this.$store.dispatch('Categories/' + LOAD_CATEGORY_LIST_ACTION)
	             this.setLenguage();
	         	this.getCountriesData();
            }
          },
         created() {

         		let _this = this;
         		let getQuery = this.$route.query;
         	if(getQuery.q != '' && getQuery.q != null && getQuery.q != undefined){

         		_this.getSearchName = getQuery.q;
         	}
           		this.$store.dispatch('Categories/' + LOAD_CATEGORY_LIST_ACTION)
				
        },
         mounted(){
         	this.setLenguage();
         	this.getCountriesData();
         	this.getLogin();
         	this.getUserData();
         	this.getScript();
         	
         	
         	
         }

 }
</script>