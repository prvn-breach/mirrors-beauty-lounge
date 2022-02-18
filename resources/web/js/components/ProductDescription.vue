<template>
	<div class="dv_content">

			<section class="dv_bredcum_wrapper">
				<div class="container-fluid">
					<!-- <ul class="dv_bredcum_wrapper_ul">
						<li>
							<a href="#!">
								beauty health
								<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg>
							</a>
						</li>
						<li>
							<a href="#!">
								beauty fragrance
								<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg>
							</a>
						</li>
						<li>
							<a href="#!">
								fragrance
								<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg>
							</a>
						</li>
						<li>
							<a href="#!">
								gift set
							</a>
						</li>
					</ul> -->
				</div>
			</section>

			<section class="dv_product_description_wrap">
				<div class="container-fluid">
					<div class="row">
			      		<div class="col-md-4 col-sm-6 col-xs-12 col-12 dv_product_slider_4">
			      			<div class="dv_product_slider">
			      				<ul id="imageGallery" v-if="getProduct.get_product_images && (getProduct.get_product_images.length > 0)" class="show-in-mobile">
			                    	<li v-for="(image,index) in getProduct.get_product_images" :data-thumb="baseUrlImage+'images/products/'+image.image" :data-src="baseUrlImage+'images/products/'+image.image" :key="index">
			                    		<img :src="baseUrlImage+'images/products/'+image.image" alt="" title="" />
			                        </li>
			                    </ul>

								<!-- Default Image -->
								<ul id="imageGallery" class="show-in-mobile" v-else>
									<li :data-thumb="baseUrlImage+'images/default_web.jpg'" :data-src="baseUrlImage+'images/default_web.jpg'">
										<img :src="baseUrlImage+'images/default_web.jpg'" alt="" title="" />
									</li>
								</ul>

								<div v-if="getProduct.get_product_images && (getProduct.get_product_images.length > 0)" class="slider-show hide-in-mobile" :href="baseUrlImage+'images/products/'+getProduct.get_product_images[0].image">
									<img :src="baseUrlImage+'images/products/'+getProduct.get_product_images[0].image" id="show-img">
								</div>
								<!-- Default Image -->
								<div v-else class="slider-show hide-in-mobile" :href="baseUrlImage+'images/default_web.jpg'">
									<img :src="baseUrlImage+'images/default_web.jpg'" id="show-img">
								</div>

								<!-- Secondary carousel image thumbnail gallery -->
								<div class="small-img hide-in-mobile" v-if="getProduct.get_product_images && (getProduct.get_product_images.length > 0)">
									<img :src="baseUrlImage+'images/next-icon.png'" class="icon-left" alt="" id="prev-img">
									<div class="small-container">
										<div id="small-img-roll">
											<img v-for="(image,index) in getProduct.get_product_images" :src="baseUrlImage+'images/products/'+image.image" :key="index" class="show-small-img" alt="">
										</div>
									</div>
									<img :src="baseUrlImage+'images/next-icon.png'" class="icon-right" alt="" id="next-img">
								</div>

			                     <div class="dv_deal_discount_description" v-if="getProduct.discount > 0 && (!product_promotion || (product_promotion && !product_promotion.hasOwnProperty('discount_percentage')))">{{ getProduct.discount }}% Off</div>
			                     <div class="dv_deal_discount_description" v-else-if="product_promotion">{{ product_promotion.discount_percentage }}% Off</div>
			      			</div>
			      			<svg v-if="Object.keys($user).length > 0" @click="saveWishList(getProduct.id,getProduct.get_wish_list)" :class="getProduct.get_wish_list == null?'': 'added_to_wishlist'" data-toggle="tooltip" title="Add to Wishlist" data-placement="top" class="dv_wishlist_viewlist" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="0" stroke-linecap="round" stroke-linejoin="round"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg>
			      		</div>
			      		<div class="col-md-5 col-sm-6 col-xs-12 col-12 p-0 dv_product_info_5">
			      			<div class="dv_quick_view_pr_txt_6 p-0 pt-3">
			      				<div class="dv_quk_product_name">
			      					{{ getProduct.name }}
			      				</div>
			      				<div class="dv_quk_product_sku">
			      					{{ getProduct.sku }}
			      				</div>
			      				<div class="dv_quk_product_stock_instock" v-if="getProduct['product_quantity'] > 0">
			      					currently in <span class="dv_quk_product_stock_status">stock </span>
			      				</div>
								<div class="dv_quk_product_stock_instock" v-else>
			      					currently <span class="dv_quk_product_outstock_status">out of stock </span>
								</div>
			      				<ul class="dv_product_rating p-0">
									<li>
										<!-- Rating start -->
										<span class="fa" :class="{ 'fa-star': getProduct.avg_rating >=1, 'fa-star-o': getProduct.avg_rating < 1 }" style="color: #ff9ba1;"></span>
										<span class="fa" :class="{ 'fa-star': getProduct.avg_rating >=2, 'fa-star-o': getProduct.avg_rating < 2 }" style="color: #ff9ba1;"></span>
										<span class="fa" :class="{ 'fa-star': getProduct.avg_rating >=3, 'fa-star-o': getProduct.avg_rating < 3 }" style="color: #ff9ba1;"></span>
										<span class="fa" :class="{ 'fa-star': getProduct.avg_rating >=4, 'fa-star-o': getProduct.avg_rating < 4 }" style="color: #ff9ba1;"></span>
										<span class="fa" :class="{ 'fa-star': getProduct.avg_rating >=5, 'fa-star-o': getProduct.avg_rating < 5 }" style="color: #ff9ba1;"></span>
										<!-- Rating end -->
									</li>
									<li><a href="#!" data-toggle="modal" data-target="#viewallreviews">{{(Object.keys(getProduct).length > 0)?getProduct.get_reviews.length:0 }} reviews</a> </li>
								</ul>
								<div class="dv_share_product">
									<a href="javascript:void(0);" data-toggle="modal" data-target="#shareproducts">
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="18" cy="5" r="3"></circle><circle cx="6" cy="12" r="3"></circle><circle cx="18" cy="19" r="3"></circle><line x1="8.59" y1="13.51" x2="15.42" y2="17.49"></line><line x1="15.41" y1="6.51" x2="8.59" y2="10.49"></line></svg>Share
									</a>
								</div>
								<div class="badge badge-success" v-if="product_promotion && product_promotion['label']">{{ product_promotion['label'] }}</div>
			      				<div class="dv_quk_product_cut_sale_price">
									<ul v-if="!product_promotion || !product_promotion.hasOwnProperty('promotion_price')">
										<li v-if="getProduct.discount == 0"></li>
										<li>aed {{ getProduct.sale_price }}</li>
										<li v-if="getProduct.discount > 0">aed {{ getProduct.discount_price  }}</li>
									</ul>
									<ul v-else>
										<li>aed {{ getProduct.sale_price }}</li>
										<li>aed {{ product_promotion['promotion_price'] }}</li>
									</ul>
			      				</div>
			      				<div class="dv_quk_product_color_size">
			      					<ul v-if="getProduct.color">
			      						<li class="active">
											<div class="color-box" :style="'background-color: '+getProduct.color"></div>
										</li>
			      					</ul>
			      					<ul v-if="getProduct.size && getProduct.size_measurment">
			      						<li class="active">{{ getProduct.size+' '+getProduct.size_measurment }} </li>
			      					</ul>
			      				</div>
			      				<ul class="dv_add_cart_buynow_ul" v-if="getProduct['product_quantity'] > 0">
			      					<li>
			      						<button type="button" class="btn btn-default dv_buy_now_btn_detail m-0" @click="addToCartBuy(getProduct)">
					      					Buy now <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path><line x1="3" y1="6" x2="21" y2="6"></line><path d="M16 10a4 4 0 0 1-8 0"></path></svg>
					      				</button>
			      					</li>
			      					<li v-if="cart_item==null">
			      						<button type="button" class="btn btn-default dv_cart_button_detail m-0" data-toggle="modal" data-target="#addtocart_nextstep" @click="addToCart(getProduct)">
					      					Add to cart <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>
					      				</button>
			      					</li>
									<li v-else>
										<div class="dv_increse_descrese_wrapper">
											<div class="input-group">
												<div class="input-group-prepend">
													<button @click="removeQty" class="btn btn-outline-primary btn-number" data-type="minus" data-field="quant[1]" type="button">
														<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus"><line x1="5" y1="12" x2="19" y2="12"></line></svg>
													</button>
												</div>
												<input type="text" name="quant[1]" class="form-control input-number dv_qty_qk_pr_input" v-model="add_to_cart_qty" min="1" readonly>
												<div class="input-group-append">
													<button @click="addQty" class="btn btn-outline-primary btn-number" data-type="plus" data-field="quant[1]" type="button">
														<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
													</button>
												</div>
											</div>
										</div>
									</li>
			      				</ul>


								<!-- MOBILE VIEW QTY -->
								<div class="dv_increse_descrese_wrapper d-lg-none" v-if="cart_item!=null">
									<div class="input-group">
										<div class="input-group-prepend">
											<button @click="removeQty" class="btn btn-outline-primary btn-number" data-type="minus" data-field="quant[1]" type="button">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus"><line x1="5" y1="12" x2="19" y2="12"></line></svg>
											</button>
										</div>
										<input type="text" name="quant[1]" class="form-control input-number dv_qty_qk_pr_input" v-model="add_to_cart_qty" min="1" readonly>
										<div class="input-group-append">
											<button @click="addQty" class="btn btn-outline-primary btn-number" data-type="plus" data-field="quant[1]" type="button">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
											</button>
										</div>
									</div>
								</div>
			      				<!-- <a href="#!" class="dv_view_more_detail_a">view more details </a> -->
			      			</div>
			      		</div>
			      		<div class="col-md-3 col-sm-12 col-xs-12 col-12 dv_products_points_3">
			      			<!-- <div class="show-mobile-1080">
			      				<ul class="dv_points_slider_mobile owl-carousel owl-theme">
			      					<li class="item dv_points_slider_mobile_item">
			      						<img src="images/points-slider/1.png" alt="" title="">
			      					</li>
			      					<li class="item dv_points_slider_mobile_item">
			      						<img src="images/points-slider/2.png" alt="" title="">
			      					</li>
			      					<li class="item dv_points_slider_mobile_item">
			      						<img src="images/points-slider/3.png" alt="" title="">
			      					</li>
			      					<li class="item dv_points_slider_mobile_item">
			      						<img src="images/points-slider/4.png" alt="" title="">
			      					</li>
			      					<li class="item dv_points_slider_mobile_item">
			      						<img src="images/points-slider/5.png" alt="" title="">
			      					</li>
			      					<li class="item dv_points_slider_mobile_item">
			      						<img src="images/points-slider/6.png" alt="" title="">
			      					</li>
			      					<li class="item dv_points_slider_mobile_item">
			      						<img src="images/points-slider/7.png" alt="" title="">
			      					</li>
			      				</ul>
			      			</div> -->
			      			<ul class="dv_products_points hide-mobile-1080">
			      				<li>
			      					<span>
			      						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="17 1 21 5 17 9"></polyline><path d="M3 11V9a4 4 0 0 1 4-4h14"></path><polyline points="7 23 3 19 7 15"></polyline><path d="M21 13v2a4 4 0 0 1-4 4H3"></path></svg>
			      					</span>
			      					Item cannot be exchanged
			      				</li>
			      				<li>
			      					<span>
			      						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>
			      					</span>
									<router-link :to="{ name: 'getCmsPage', params: { slug: 'return-policy' }}" target="_blank">
			      						Return Policy
									</router-link>
			      				</li>
			      				<li>
			      					<span>
			      						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path><line x1="3" y1="6" x2="21" y2="6"></line><path d="M16 10a4 4 0 0 1-8 0"></path></svg>
			      					</span>
			      					Sold by <a href="#!">Mirrors </a>
			      				</li>
			      				<li>
			      					<span>
			      						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="1" y="3" width="15" height="13"></rect><polygon points="16 8 20 8 23 11 23 16 16 16 16 8"></polygon><circle cx="5.5" cy="18.5" r="2.5"></circle><circle cx="18.5" cy="18.5" r="2.5"></circle></svg>
			      					</span>
			      					Trusted Shipping
			      				</li>
			      				<li>
			      					<span>
			      						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 9V5a3 3 0 0 0-3-3l-4 9v11h11.28a2 2 0 0 0 2-1.7l1.38-9a2 2 0 0 0-2-2.3zM7 22H4a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h3"></path></svg>
			      					</span>
			      					Standard Delivery
			      				</li>
			      				<li>
			      					<span>
			      						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect><line x1="1" y1="10" x2="23" y2="10"></line></svg>
			      					</span>
			      					Secure Payment
			      				</li>
			      			</ul>
			      		</div>
			      	</div>	
				</div>
			</section>

			<section class="dv_specification_wrapper">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-12">
							<!-- Nav tabs -->
							  <ul class="nav nav-tabs dv_overview_rating_specs">
							    <li class="nav-item">
							      <a class="nav-link active" data-toggle="tab" href="#Overview">Overview </a>
							    </li>
							    <li class="nav-item">
							      <a class="nav-link" data-toggle="tab" href="#Specification">Specification </a>
							    </li>
							    <li class="nav-item">
							      <a class="nav-link" data-toggle="tab" href="#Ratings">Ratings </a>
							    </li>
							  </ul>

							  <!-- Tab panes -->
							  <div class="tab-content">
							    <div id="Overview" class="tab-pane dv_conent_wrapper_tabs active"><br>
							      <div class="dv_content_textarea" v-html="getProduct.description">
							      	
							      </div>
							    </div>
							    <div id="Specification" class="tab-pane dv_conent_wrapper_tabs fade"><br>
							      <div class="dv_content_textarea">
							      	<div class="dv_specifications_ul">
							      		<ul>
							      			<li>
							      				<table class="table dv_specification_table"> 
							      					<tbody>
							      						<tr v-for="(specification,index) in getProduct.get_product_specification" :key="index">
							      							<td>{{ specification.name }} </td>
															<td v-if="specification.name == 'color'">
																<div class="color-box" :style="'background-color: '+specification.value"></div>
															</td>
							      							<td v-else>{{specification.value}} </td>
							      						</tr>
							      					</tbody>
							      				</table>
							      			</li>
							      		</ul>
							      	</div>
							      </div>
							    </div>
							    <div id="Ratings" class="tab-pane dv_conent_wrapper_tabs fade"><br>
							      <div class="dv_content_textarea">
						      		<div class="row">
										<div class="col-sm-3 dv_rating_width_100_sm">
											<div class="rating-block text-center height-200">
												<h4>Average user rating</h4>
												<h2 class="bold padding-bottom-7">{{  getProduct.avg_rating ? getProduct.avg_rating : 0 }} <small>/ 5</small></h2>
												<!-- <vue-star-rate
													:rateRange="getProduct.avg_rating"
													:maxIcon="5"
													:readOnly="true"
													:iconHeight="26"
													:iconWidth="26"
													:hasCounter="false"
													iconColor="#ebebeb"
													iconColorHover="#ff9ba1"
													iconShape="star"
												></vue-star-rate> -->
												<span class="fa" :class="{ 'fa-star': getProduct.avg_rating >=1, 'fa-star-o': getProduct.avg_rating < 1 }" style="color: #ff9ba1;"></span>
												<span class="fa" :class="{ 'fa-star': getProduct.avg_rating >=2, 'fa-star-o': getProduct.avg_rating < 2 }" style="color: #ff9ba1;"></span>
												<span class="fa" :class="{ 'fa-star': getProduct.avg_rating >=3, 'fa-star-o': getProduct.avg_rating < 3 }" style="color: #ff9ba1;"></span>
												<span class="fa" :class="{ 'fa-star': getProduct.avg_rating >=4, 'fa-star-o': getProduct.avg_rating < 4 }" style="color: #ff9ba1;"></span>
												<span class="fa" :class="{ 'fa-star': getProduct.avg_rating >=5, 'fa-star-o': getProduct.avg_rating < 5 }" style="color: #ff9ba1;"></span>
											</div>
											<button type="button" class="btn btn-default dv_add_new_review_btn" data-toggle="modal" data-target="#add_review" v-if="loginStatus() && getProduct['is_auth_user_purchased_this_product']">{{ getProduct['current_user_review'] ? 'update' : 'add' }} review </button>
										</div>
										<div class="col-sm-3 dv_rating_width_100_sm">
											<div class="rating-block pb-0 height-200">
												<div v-for="(rating,index) in getProduct.stars" :key="index" class="dv_progress_bar" data-toggle="tooltip" :title="'View '+index+' star review'" data-placement="top">
													<div class="dv_star_rating_per">
														<span>{{ index }}</span> <svg style="fill: #ff9ba1;" stroke-width="0" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
													</div>
													<div class="progress mb-3" style="height: 10px;">
													  <div class="progress-bar bg-pink" :style="'width:'+rating['percentage']+'%;'"></div>
													</div>
													<span>{{ rating['count'] }} </span>
												</div>												
											</div>
										</div>			

										<div class="col-sm-6 dv_rating_width_100_sm" v-if="Object.keys(getReview).length > 0">
											<div class="review-block height-200">
												<div class="row">
													<div class="col-sm-3 text-center">
														<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 53 53" style="enable-background:new 0 0 53 53; width: 45px; width: 45px; " xml:space="preserve"> <path style="fill:#E7ECED;" d="M18.613,41.552l-7.907,4.313c-0.464,0.253-0.881,0.564-1.269,0.903C14.047,50.655,19.998,53,26.5,53 c6.454,0,12.367-2.31,16.964-6.144c-0.424-0.358-0.884-0.68-1.394-0.934l-8.467-4.233c-1.094-0.547-1.785-1.665-1.785-2.888v-3.322 c0.238-0.271,0.51-0.619,0.801-1.03c1.154-1.63,2.027-3.423,2.632-5.304c1.086-0.335,1.886-1.338,1.886-2.53v-3.546 c0-0.78-0.347-1.477-0.886-1.965v-5.126c0,0,1.053-7.977-9.75-7.977s-9.75,7.977-9.75,7.977v5.126 c-0.54,0.488-0.886,1.185-0.886,1.965v3.546c0,0.934,0.491,1.756,1.226,2.231c0.886,3.857,3.206,6.633,3.206,6.633v3.24 C20.296,39.899,19.65,40.986,18.613,41.552z"/> <g> <path style="fill:#5560800d;" d="M26.953,0.004C12.32-0.246,0.254,11.414,0.004,26.047C-0.138,34.344,3.56,41.801,9.448,46.76 c0.385-0.336,0.798-0.644,1.257-0.894l7.907-4.313c1.037-0.566,1.683-1.653,1.683-2.835v-3.24c0,0-2.321-2.776-3.206-6.633 c-0.734-0.475-1.226-1.296-1.226-2.231v-3.546c0-0.78,0.347-1.477,0.886-1.965v-5.126c0,0-1.053-7.977,9.75-7.977 s9.75,7.977,9.75,7.977v5.126c0.54,0.488,0.886,1.185,0.886,1.965v3.546c0,1.192-0.8,2.195-1.886,2.53 c-0.605,1.881-1.478,3.674-2.632,5.304c-0.291,0.411-0.563,0.759-0.801,1.03V38.8c0,1.223,0.691,2.342,1.785,2.888l8.467,4.233 c0.508,0.254,0.967,0.575,1.39,0.932c5.71-4.762,9.399-11.882,9.536-19.9C53.246,12.32,41.587,0.254,26.953,0.004z"/> </g></svg>
														<div class="review-block-name">{{ getReview.get_user.name }}</div>
														<div class="review-block-date">{{ moment(getReview.created_at).format('MMMM DD, YYYY'), }}</div>
													</div>
													<div class="col-sm-9">
														<!-- Rating start -->
														<span class="fa" :class="{ 'fa-star': getReview.star >=1, 'fa-star-o': getReview.star < 1 }" style="color: #ff9ba1;"></span>
														<span class="fa" :class="{ 'fa-star': getReview.star >=2, 'fa-star-o': getReview.star < 2 }" style="color: #ff9ba1;"></span>
														<span class="fa" :class="{ 'fa-star': getReview.star >=3, 'fa-star-o': getReview.star < 3 }" style="color: #ff9ba1;"></span>
														<span class="fa" :class="{ 'fa-star': getReview.star >=4, 'fa-star-o': getReview.star < 4 }" style="color: #ff9ba1;"></span>
														<span class="fa" :class="{ 'fa-star': getReview.star >=5, 'fa-star-o': getReview.star < 5 }" style="color: #ff9ba1;"></span>
														<!-- Rating end -->
														<div class="review-block-title">{{ getReview.title }}</div>
														<div class="review-block-description">{{ getReview.description }}</div>
													</div>
												</div>
											</div>
											<button type="button" class="btn btn-default dv_view_more_reviews" data-toggle="modal" data-target="#viewallreviews">view more {{(Object.keys(getProduct).length > 0)?getProduct.get_reviews.length-1:0 }} review </button>
										</div>
									</div>										
							      </div>
							    </div>
							  </div>
						</div>
					</div>
				</div>
			</section>
		
		<!-- ADD TO CART AND BUY NOW BUTTON BTNS IN MOBILE VIEW -->
		<div class="dv_continue_to_cart_scroll" v-if="getProduct['product_quantity'] > 0">
			<ul>
				<li>
					<a href="javascript:void(0);" @click="addToCartBuy(getProduct)">
						buy now
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-bag"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path><line x1="3" y1="6" x2="21" y2="6"></line><path d="M16 10a4 4 0 0 1-8 0"></path></svg>
					</a>
				</li>
				<li>
					<a href="javascript:void(0);" @click="addToCart(getProduct)" v-if="cart_item==null">
						add to cart
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>
					</a>
					<a href="javascript:void(0);" @click="$router.push({ name: 'getCart' })" v-else>
						go to cart
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>
					</a>
				</li>
			</ul>
		</div>

		<!-- Add Review Modal -->
		<div class="modal fade pr-0" id="add_review" tabindex="-1" role="dialog" aria-labelledby="add_review" aria-modal="true" data-backdrop="static" data-keyboard="false" style="z-index: 10000;">
			<div class="modal-dialog dv_add_review_dialog">
				<div class="modal-content dv_add_review_modal_content">
					<div class="modal-header dv_add_review_modal_header">
						<h4 class="modal-title">{{ getProduct['current_user_review'] ? 'Update' : 'Add'}} Review</h4>
						<svg class="cursor-pointer" data-dismiss="modal" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
					</div>
					<div class="modal-body dv_share_modal_body pb-0">
						<!-- <div class="dv_signup_txt p-3">
							<p class="dv_add_review_txt_head">Haven't purchased this product?</p>
							Sorry! You are not allowed to review this product since you haven't bought it on Mirrors.
						</div> -->
						<!-- <div class="dv_signup_txt">
							Natura Bissé Diamond Extreme Moisturiser 50ml
						</div> -->
						<ul class="dv_customer_register_ul">
							<li>
								<div class="star-rating d-flex justify-content-center">
									<span class="fa fa-2x fa-star-o m-1" data-rating="1" @click="setRating(1)"></span>
									<span class="fa fa-2x fa-star-o m-1" data-rating="2" @click="setRating(2)" ></span>
									<span class="fa fa-2x fa-star-o m-1" data-rating="3" @click="setRating(3)" ></span>
									<span class="fa fa-2x fa-star-o m-1" data-rating="4" @click="setRating(4)" ></span>
									<span class="fa fa-2x fa-star-o m-1" data-rating="5" @click="setRating(5)" ></span>
								</div>
							</li>
							<li>
								<div class="material-textfield">
									<input v-model="saveReview.title" type="text" class="form-control dv_material_input">
									<label class="dv_material_lbl">Review title (optional) </label>
								</div>
							</li>
							<li>
								<div class="material-textfield">
									<input v-model="saveReview.description" type="text" class="form-control dv_material_input" style="height: 100px;">
									<label class="dv_material_lbl">Review Description </label>
								</div>
							</li>
							<li>
								<button type="button" class="btn btn-default dv_login_register_btn" @click="updateReview">{{ getProduct['current_user_review'] ? 'Update' : 'Add'}} Review </button>
							</li>
						</ul>
					</div>     
				</div>
			</div>
		</div>

		<!-- View More Review Modal -->
		<div class="modal fade right" id="viewallreviews" tabindex="-1" role="dialog" aria-labelledby="viewallreviews" aria-modal="true" style="z-index: 99999;">
			<div class="modal-dialog dv_atc_nextstep_dialog">
				<div class="modal-content dv_atc_nextstep_content">
					<div class="modal-header dv_atc_nextstep_header">
					<h4 class="modal-title">See all reviews </h4>
					<svg class="cursor-pointer" data-dismiss="modal" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
					</div>
					<div class="modal-body dv_review_block_modal_body">
						<div class="dv_review_block_modal" v-for="(review,index) in getProduct['get_reviews']" :key="index">
							<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 53 53" style="enable-background:new 0 0 53 53; width: 45px; float: left; " xml:space="preserve"> <path style="fill:#E7ECED;" d="M18.613,41.552l-7.907,4.313c-0.464,0.253-0.881,0.564-1.269,0.903C14.047,50.655,19.998,53,26.5,53 c6.454,0,12.367-2.31,16.964-6.144c-0.424-0.358-0.884-0.68-1.394-0.934l-8.467-4.233c-1.094-0.547-1.785-1.665-1.785-2.888v-3.322 c0.238-0.271,0.51-0.619,0.801-1.03c1.154-1.63,2.027-3.423,2.632-5.304c1.086-0.335,1.886-1.338,1.886-2.53v-3.546 c0-0.78-0.347-1.477-0.886-1.965v-5.126c0,0,1.053-7.977-9.75-7.977s-9.75,7.977-9.75,7.977v5.126 c-0.54,0.488-0.886,1.185-0.886,1.965v3.546c0,0.934,0.491,1.756,1.226,2.231c0.886,3.857,3.206,6.633,3.206,6.633v3.24 C20.296,39.899,19.65,40.986,18.613,41.552z"></path> <g> <path style="fill:#5560800d;" d="M26.953,0.004C12.32-0.246,0.254,11.414,0.004,26.047C-0.138,34.344,3.56,41.801,9.448,46.76 c0.385-0.336,0.798-0.644,1.257-0.894l7.907-4.313c1.037-0.566,1.683-1.653,1.683-2.835v-3.24c0,0-2.321-2.776-3.206-6.633 c-0.734-0.475-1.226-1.296-1.226-2.231v-3.546c0-0.78,0.347-1.477,0.886-1.965v-5.126c0,0-1.053-7.977,9.75-7.977 s9.75,7.977,9.75,7.977v5.126c0.54,0.488,0.886,1.185,0.886,1.965v3.546c0,1.192-0.8,2.195-1.886,2.53 c-0.605,1.881-1.478,3.674-2.632,5.304c-0.291,0.411-0.563,0.759-0.801,1.03V38.8c0,1.223,0.691,2.342,1.785,2.888l8.467,4.233 c0.508,0.254,0.967,0.575,1.39,0.932c5.71-4.762,9.399-11.882,9.536-19.9C53.246,12.32,41.587,0.254,26.953,0.004z"></path> </g></svg>
							<div class="dv_review_holder_info">
								<div class="dv_review_holder_name">
									{{ review.get_user.name }}
								</div>
								<div class="dv_review_holder_time">
									{{ moment(review.created_at).format('MMMM DD, YYYY'), }}
								</div>
								<!-- Rating start -->
								<span class="fa" :class="{ 'fa-star': parseInt(review.star) >=1, 'fa-star-o': parseInt(review.star) < 1 }" style="color: #ff9ba1;"></span>
								<span class="fa" :class="{ 'fa-star': parseInt(review.star) >=2, 'fa-star-o': parseInt(review.star) < 2 }" style="color: #ff9ba1;"></span>
								<span class="fa" :class="{ 'fa-star': parseInt(review.star) >=3, 'fa-star-o': parseInt(review.star) < 3 }" style="color: #ff9ba1;"></span>
								<span class="fa" :class="{ 'fa-star': parseInt(review.star) >=4, 'fa-star-o': parseInt(review.star) < 4 }" style="color: #ff9ba1;"></span>
								<span class="fa" :class="{ 'fa-star': parseInt(review.star) >=5, 'fa-star-o': parseInt(review.star) < 5 }" style="color: #ff9ba1;"></span>
								<!-- Rating end -->
								<div class="dv_review_holder_title">
									{{ review.title }}
								</div>
								<div class="dv_review_holder_description">
									{{ review.description }}
								</div>
							</div>
						</div>
					</div>     
				</div>
			</div>
		</div>

		<!-- Share Model -->
		<div class="modal fade" id="shareproducts" tabindex="-1" role="dialog" aria-labelledby="shareproducts" aria-modal="true" data-backdrop="static" data-keyboard="false" style="z-index: 99999;">
			<div class="modal-dialog dv_share_modal_dialog">
				<div class="modal-content dv_share_modal_content">
					<div class="modal-header dv_share_modal_header">
					<h4 class="modal-title">Share to </h4>
					<svg data-dismiss="modal" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
					</div>
					<div class="modal-body dv_share_modal_body p-0">
					<ul>
						<li>
							<a :href="'https://www.facebook.com/sharer/sharer.php?u='+current_url" target="_blank">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>
								Facebook
							</a>
						</li>
						<li>
							<a href="#!">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-instagram"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>
								Instagram
							</a>
						</li>
						<li>
							<a :href="'https://www.linkedin.com/sharing/share-offsite/?text='+current_url" target="_blank">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-linkedin"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path><rect x="2" y="9" width="4" height="12"></rect><circle cx="4" cy="4" r="2"></circle></svg>
								Linkedin
							</a>
						</li>
						<li>
							<a :href="'http://twitter.com/share?text='+current_url" target="_blank">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path></svg>
								Twitter
							</a>
						</li>
						<li>
							<a href="#!">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-link"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"></path><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"></path></svg>
								Copy Link
							</a>
						</li>
					</ul>
					</div>     
				</div>
			</div>
	  	</div>

		<section class="dv_weare_always_tohelp">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-4">
						<div class="dv_wearehere">
							<h4>
								We’re Always Here To Help
							</h4>
							<p>Reach out to us through any of these support channels </p>
						</div>
					</div>
					<div class="col-md-8">
						<ul class="dv_help_email_con_wp">
							<li>
								<a href="#!">
									<img :src="baseUrlImage+'images/help.png'" alt="" title="">
								</a>
							</li>
							<li>
								<a href="#!">
									<img :src="baseUrlImage+'images/email-us.png'" alt="" title="">
								</a>
							</li>
							<li>
								<a href="#!">
									<img :src="baseUrlImage+'images/contact-us.png'" alt="" title="">
								</a>
							</li>
							<li>
								<a href="#!">
									<img :src="baseUrlImage+'images/whatsapp.png'" alt="" title="">
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</section>
	</div>
</template>
<script type="text/javascript">
import Vue from 'vue'
import { LOAD_PRODUCTS_DESCRIPTION_ACTION } from '@web/store/products/actions'
import { SAVE_CART_ACTION,LOAD_CART_LIST_ACTION, CHANGE_QTY_CART_ITEM_ACTION, REMOVE_CART_ITEM_ACTION } from '@web/store/carts/actions'
import { LOAD_WISH_LIST_ACTION,LOAD_SAVE_WISH_LIST_ACTION  } from '@web/store/wishlists/actions'
import { SAVE_REVIEW_ACTION  } from '@web/store/reviews/actions'
import { GET_PROMOTIONS_ACTION } from '@web/store/promotions/actions'
import vueStarRate from "vue-js-star-rating";
import { mapState } from 'vuex'
import $ from 'jquery'
import { uuid } from 'vue-uuid'
import moment from 'moment'
// import "../imageGallery";
export default {
	components: { vueStarRate },
	data() {
		return {
			baseUrl:Vue.config.baseUrl,
			baseUrlImage:Vue.config.baseUrlImage,
			categoryName:'',
			gridSet:0,
			getQueryParam:{},
			uuid: '',  
			token: '',
			add_to_cart_qty: 1,
			getVatData:{},
			getReview:{},
			getReviewCount:0,
			moment: moment,
			cartStatus:0,
			saveReview: {
				title: '',
				description: '',
				star: 0,
				user_id: '',
				product_id: ''
			},
			product_promotion: null,
			current_url : '',
			cart_item : null,
			slider: null
		}
	},
	updated: function () {
		this.$nextTick( () => {
			setTimeout(() => {
				this.getScript();
			}, 200);
		});
	},
	computed:{
		...mapState({
			getProduct: state => state.Products.getProduct,
			getVats: state => state.Products.getVat,
			getPromotions: state => state.Promotion.getPromotions,
			getCartQtyError: state => state.Carts.getError,
			getCarts: state => state.Carts.getCarts,
		}),
	},
	methods: {
		addQty: function () {
			this.add_to_cart_qty++;
			this.getChangeQty(this.cart_item);
		},
		removeQty: function () {
			if (this.add_to_cart_qty <= 1) {
				this.deleteItem(this.cart_item);
				return;
			}
			this.add_to_cart_qty--;
			this.getChangeQty(this.cart_item);
		},
		deleteItem:function(item){
			let _this = this;
			_this.$store.dispatch('Carts/' + REMOVE_CART_ITEM_ACTION, item.id).then(() => {
				_this.$emit('get-change-cart');
				_this.getProductDescription();
			});
		},
		addToCartBuy:function(getProduct){
			let _this = this;
			this.addInToCart(getProduct);
			this.cartStatus = 1;
		},
		getReviewFirst(product){
			let _this = this;
			if(Object.keys(product).length > 0){
				if(product.get_reviews.length > 0){
					_this.getReview=product.get_reviews[0];
					_this.getReviewCount=product.get_reviews.length;
				}
			}
		},
		saveWishList:function(product_id,wishList){
			let _this = this;
			let user_id = '';
			if(!Vue.helpers.isEmpty(_this.$user)){
				user_id = _this.$user.id;
			}
			
		_this.$store.dispatch('Wishlists/' + LOAD_SAVE_WISH_LIST_ACTION,{
			user_id:user_id,
			product_id:product_id,
			wishList:wishList
		}).then(function(){
			_this.getProductDescription();
			_this.$emit('get-change-wishlist');
		})

		},
		getVatFunc:function(){
			let _this = this;
			if(Object.keys(_this.getVat).length > 0){
				_this.getVatData = _this.getVat;

			}
			
		},
		getImage:function(product){
			if(product.get_product_images.length > 0){
				let getImage = product.get_product_images.filter(function(item){
					return item.priority == 'P';
				})[0];
				return getImage.image;
			}
		},
		addToCart:function(getProduct){
			let _this = this;
			_this.cartStatus = 0;
			_this.addInToCart(getProduct);
		},
		addInToCart:function(getProduct){
			let _this = this;
			this.getSession();
			this.getToken();
			let getProductObj = {
				id:getProduct.id,
				name:getProduct.name,
				qty:_this.add_to_cart_qty,
				image:_this.getImage(getProduct) ? _this.baseUrlImage+'images/products/'+_this.getImage(getProduct) : null,
				session_id:_this.uuid,
				token:_this.token,
				price:getProduct.sale_price,
				discount_price:getProduct.discount_price,
				discount:getProduct.discount,
				sku:getProduct.sku,
				barcode:getProduct.barcode,
				brand_id:getProduct.brand_id,
				category_id:getProduct.category_id,
				sub_category_id:getProduct.sub_category_id,
				warranty:getProduct.warranty,
				delivery:getProduct.delivery,
				user_id:null,
				vat:_this.getVats.percentage,
			};
			if (this.product_promotion) {
				if (this.product_promotion.hasOwnProperty('promotion_price')) {
					getProductObj['discount_price'] = this.product_promotion['promotion_price'];
				}
				if (this.product_promotion.hasOwnProperty('discount_percentage')) {
					getProductObj['discount'] = this.product_promotion['discount_percentage'];
				}
			}
			let getUser = {};
			if(!Vue.helpers.isEmpty(_this.$user)){
				getProductObj.user_id = _this.$user.id;
			}

			_this.$store.dispatch('Carts/' + SAVE_CART_ACTION,getProductObj).then(function(){
				_this.$emit('get-change-cart');
				if(_this.cartStatus == 1){
					_this.$router.push({name:'getCart'}); 
				}
				_this.getProductDescription();
			})
		},
		getSession:function(){
			let _this = this;
			let getSession = localStorage.getItem('session_id');
			if( getSession != undefined && getSession != null ){
					_this.uuid = getSession;
			}else{
				localStorage.setItem('session_id', uuid.v1());
				let getSession = localStorage.getItem('session_id');
				_this.uuid = getSession;
			}
		},
		getToken:function(){
			let _this = this;
			let getToken = localStorage.getItem('token');
			if( getToken != undefined && getToken != null ){
					_this.token = getToken;
			}else{
				localStorage.setItem('token', uuid.v1());
				let getToken = localStorage.getItem('token');
				_this.token = getToken;
			}
		},
		getProductDescription:function(){
			let _this = this;
			let getParam = this.$route.params;
			let getQuery = this.$route.query;
			this.getQueryParam  = getQuery;
			var params = new URLSearchParams({});
			for(let key in getQuery)
				params.append(key, getQuery[key]);
			let user_id = '';
			if(_this.$user != null){
				user_id = _this.$user.id;
			}
			params.append('user_id',user_id);
			let path = getParam.country_leng+'/'+getParam.productSlug;
				_this.categoryName = getParam.productSlug.replace(/\-+/g, ' ').toUpperCase();
			this.$store.dispatch('Products/' + LOAD_PRODUCTS_DESCRIPTION_ACTION,{
				path:path,
				queries:params.toString()
			}).then(() => {
				if (_this.getCarts!=null && _this.getCarts.get_cart_items!=null) {
					_this.cart_item = _this.getCarts.get_cart_items.find(item => item.product_id == _this.getProduct.id);
				}
				// _this.getScript();
				_this.getReviewFirst(_this.getProduct);
				if (this.getProduct['current_user_review']) {
					_this.saveReview.title = _this.getProduct['current_user_review']['title'];
					_this.saveReview.description = _this.getProduct['current_user_review']['description'];
					_this.saveReview.star = _this.getProduct['current_user_review']['star'];
				}
				_this.saveReview.product_id = _this.getProduct['id'];
				_this.saveReview.user_id = user_id;
				if (_this.cart_item) {
					_this.add_to_cart_qty = _this.cart_item.quantity;
				}
				this.getPromotionData();
				this.renderStarRating();
			});
		},
		getScript:function(){
			let _this = this;
			$(document).ready(function() {
				(function ($) {
					if (_this.slider!=null) {
						_this.slider.destroy();
					}
					_this.slider = $('#imageGallery').lightSlider({
						gallery:true,
						item:1,
						loop:true,
						thumbItem:9,
						slideMargin:0,
						enableDrag: false,
						currentPagerPosition:'left',
						onSliderLoad: function(el) {
							el.lightGallery({
								selector: '#imageGallery .lslide'
							});
						}   
					}); 

					$('.slider-show').zoomImage();
					
					$('.show-small-img:first-of-type').css({'border': 'solid 1px #951b25', 'padding': '2px'})
					$('.show-small-img:first-of-type').attr('alt', 'now').siblings().removeAttr('alt')

					$('.show-small-img').click(function () {
						// console.log($('#show-img'));
						$('#show-img').attr('src', $(this).attr('src'))
						$('div #big-img').last().attr('src', $(this).attr('src'))
						$(this).attr('alt', 'now').siblings().removeAttr('alt')
						$(this).css({'border': 'solid 1px #951b25', 'padding': '2px'}).siblings().css({'border': 'none', 'padding': '0'})
						if ($('#small-img-roll').children().length > 4) {
							if ($(this).index() >= 3 && $(this).index() < $('#small-img-roll').children().length - 1){
								$('#small-img-roll').css('left', -($(this).index() - 2) * 76 + 'px')
							} else if ($(this).index() == $('#small-img-roll').children().length - 1) {
								$('#small-img-roll').css('left', -($('#small-img-roll').children().length - 4) * 76 + 'px')
							} else {
								$('#small-img-roll').css('left', '0')
							}
						}
					})

					//Enable the next button
					$('#next-img').click(function (){
						$('#show-img').attr('src', $(".show-small-img[alt='now']").next().attr('src'))
						$('div #big-img').last().attr('src', $(".show-small-img[alt='now']").next().attr('src'))
						$(".show-small-img[alt='now']").next().css({'border': 'solid 1px #951b25', 'padding': '2px'}).siblings().css({'border': 'none', 'padding': '0'})
						$(".show-small-img[alt='now']").next().attr('alt', 'now').siblings().removeAttr('alt')
						if ($('#small-img-roll').children().length > 4) {
							if ($(".show-small-img[alt='now']").index() >= 3 && $(".show-small-img[alt='now']").index() < $('#small-img-roll').children().length - 1){
								$('#small-img-roll').css('left', -($(".show-small-img[alt='now']").index() - 2) * 76 + 'px')
							} else if ($(".show-small-img[alt='now']").index() == $('#small-img-roll').children().length - 1) {
								$('#small-img-roll').css('left', -($('#small-img-roll').children().length - 4) * 76 + 'px')
							} else {
								$('#small-img-roll').css('left', '0')
							}
						}
					})

					//Enable the previous button
					$('#prev-img').click(function (){
						$('#show-img').attr('src', $(".show-small-img[alt='now']").prev().attr('src'))
						$('div #big-img').last().attr('src', $(".show-small-img[alt='now']").prev().attr('src'))
						$(".show-small-img[alt='now']").prev().css({'border': 'solid 1px #951b25', 'padding': '2px'}).siblings().css({'border': 'none', 'padding': '0'})
						$(".show-small-img[alt='now']").prev().attr('alt', 'now').siblings().removeAttr('alt')
						if ($('#small-img-roll').children().length > 4) {
							if ($(".show-small-img[alt='now']").index() >= 3 && $(".show-small-img[alt='now']").index() < $('#small-img-roll').children().length - 1){
								$('#small-img-roll').css('left', -($(".show-small-img[alt='now']").index() - 2) * 76 + 'px')
							} else if ($(".show-small-img[alt='now']").index() == $('#small-img-roll').children().length - 1) {
								$('#small-img-roll').css('left', -($('#small-img-roll').children().length - 4) * 76 + 'px')
							} else {
								$('#small-img-roll').css('left', '0')
							}
						}
					})
				
				
				})(jQuery);
			})
		},
		setRating: function(rating) {
			this.saveReview.star = rating;
		},
		updateReview: function () {
			this.$store.dispatch('Review/' + SAVE_REVIEW_ACTION,this.saveReview).then(() => {
				this.modalToggle('hide');
				this.getProductDescription();
			});
		},
		renderStarRating: function() {
			var $star_rating = $('.star-rating .fa');
			var $star = this.saveReview.star;
			return $star_rating.each(function() {
				if ($star >= parseInt($(this).data('rating'))) {
					return $(this).removeClass('fa-star-o').addClass('fa-star');
				} else {
					return $(this).removeClass('fa-star').addClass('fa-star-o');
				}
			});
		},
		setRating: function(rating) {
			if (this.saveReview.star == rating) {
				this.saveReview.star--;
				this.renderStarRating();
				return;
			}
			this.saveReview.star = rating;
			this.renderStarRating();
		},
		loginStatus: function() {
			return localStorage.getItem('getLogin') ? true: false;
		},
		modalToggle: function(value) {
			$(document).ready(function() {
				(function($){
					$('#add_review').modal(value);
				})(jQuery)
			});
		},
		getPromotionData: function(){
			this.$store.dispatch('Promotion/' + GET_PROMOTIONS_ACTION).then(() => {
				this.product_promotion = this.getPromotionPrice(this.getProduct);
			});
		},
		getPromotionPrice: function(item) {
			for (let i=0;i<this.getPromotions.length;i++){
				let getPromotion = this.getPromotions[i];
				let bonus = null;
				if (getPromotion.conditions.type == 'products') {
					if (getPromotion.conditions.logic == '==') {
						bonus = getPromotion.bonus.find(val => val.id == item.id);
					} else if (getPromotion.conditions.logic == '!=' && !getPromotion.conditions.value.includes(item.id)) {
						bonus = getPromotion.bonus[0];
					}
				} else if (getPromotion.conditions.type == 'categories') {
					if (getPromotion.conditions.logic == '==') {
						bonus = getPromotion.bonus.find(val => val.id == item.category_id);
					} else if (getPromotion.conditions.logic == '!=' && !getPromotion.conditions.value.includes(item.category_id)) {
						bonus = getPromotion.bonus[0];
					}
				} else if (getPromotion.conditions.type == 'sub_categories') {
					if (getPromotion.conditions.logic == '==') {
						bonus = getPromotion.bonus.find(val => val.id == item.sub_category_id);
					} else if (getPromotion.conditions.logic == '!=' && !getPromotion.conditions.value.includes(item.sub_category_id)) {
						bonus = getPromotion.bonus[0];
					}
				} else if (getPromotion.conditions.type == 'brands') {
					if (getPromotion.conditions.logic == '==') {
						bonus = getPromotion.bonus.find(val => val.id == item.brand_id);
					} else if (getPromotion.conditions.logic == '!=' && !getPromotion.conditions.value.includes(item.brand_id)) {
						bonus = getPromotion.bonus[0];
					}
				} else if (getPromotion.conditions.type == 'users') {
					bonus = getPromotion.bonus.find(val => val.id == $user.id);
				} else if (getPromotion.conditions.type == 'products_price') {
					if (eval(getPromotion.conditions.value+getPromotion.conditions.logic+item.sale_price)) {
						bonus = getPromotion.bonus[0];
					}
				}
				
				if (bonus) {
					if (bonus.type == 'product_discount') {
						return { 
							promotion_price: bonus.logic == 'to_percentage_of_the_original_price' ? (item.sale_price - (item.sale_price * bonus.value / 100)) : item.sale_price - bonus.value,
							discount_percentage: bonus.logic == 'to_percentage_of_the_original_price' ? bonus.value : Math.floor((bonus.value / item.sale_price) * 100)
						}
					}

					if (bonus.type == 'free_product') {
						return { label: 'Free Product', promotion_price: 0, discount_percentage: 100 }
					}

					if (bonus.type == 'free_shipping') {
						return { label: 'Free Shipping' }
					}
				}
			}
			return false;
		},
		getChangeQty:function(item){
			let _this = this;
			let qty = _this.add_to_cart_qty;
			_this.$store.dispatch('Carts/' + CHANGE_QTY_CART_ITEM_ACTION,{
				product_id: item.product_id,
				cart_id:item.id,
				qty:qty,
				price:item.price,
				vat:_this.getVats.percentage
			}).then(function(){
				if (_this.getCartQtyError) {
					alert(_this.getCartQtyError);
					_this.add_to_cart_qty = item.quantity;
				}
			})
		}
	},
	props: {
		getVat: {
			getVat: Object,
			required: true,
		}
	},
	watch: {
		'$route': function () {
			this.getProductDescription();
		},
		getVat:[{
			handler: 'getVatFunc'
		}]
	},
	created(){
		this.current_url = window.location.href;
		this.getProductDescription();
	}
}
</script>
<style>
.star-rating {
	line-height:32px;
	font-size:1.25em;
}
.star-rating .fa-star{color: #ff9ba1;}
.star-rating .fa-star-o{color: #ebebeb;}
.color-box {
    width: 20px;
    height: 20px;
    display: inline-block;
    background-color: #ccc;
}
table.table.dv_specification_table>tbody>tr:nth-child(odd)>td {
	background: none;
	color: black !important;
}


	.slider-show{width:400px;height:400px}
.slider-show>img { width: 100%; }
	.small-img{width:350px;height:70px;margin-top:10px;position:relative;left:25px}
	.small-img .icon-left,.small-img .icon-right{width:12px;height:24px;cursor:pointer;position:absolute;top:0;bottom:0;margin:auto 0}
	.small-img .icon-left{transform:rotate(180deg)}
	.small-img .icon-right{right:0}
	.small-img .icon-left:hover,.small-img .icon-right:hover{opacity:.5}
	.small-container{width:310px;height:70px;overflow:hidden;position:absolute;left:0;right:0;margin:0 auto}
	.small-container div{width:800%;position:relative}
	.small-container .show-small-img{width:70px;height:70px;margin-right:6px;cursor:pointer;float:left}
	.small-container .show-small-img:last-of-type{margin-right:0}
@media (max-width: 1080px){ .dv_wrapper { padding: 60px 0 116px 0; } }

@media (max-width: 991px) {
	.dv_product_description_wrap .show-in-mobile, .dv_product_description_wrap .lSSlideOuter {
		display: block !important;
	}

	.dv_product_description_wrap .hide-in-mobile {
		display: none !important;
	}
}

.dv_product_description_wrap .show-in-mobile, .dv_product_description_wrap .lSSlideOuter {
    display: none;
}

</style>