<template>
<div class="dv_content">
			<section class="dv_middle_offer_slider hide-mobile-1080" v-if="Object.keys(getBanner).length > 0">
				<div class="container-fluid">
					<div class="middle-offer-desktop-slider owl-carousel owl-theme">
						<div class="item" v-for="(getImage,index) in getBanner.get_images">

							<a :href="getImage.link">
								<img class="dv_home_desktop_banner" :src="baseUrlImage+getImage.image" :alt="getImage.image" title="">
							</a>
						</div>
						
					</div>
				</div>
			</section>

			<section class="dv_middle_offer_slider show-mobile-1080"  v-if="Object.keys(getBanner).length > 0">
				<div class="container-fluid">
					<div class="middle-offer-mobile-slider owl-carousel owl-theme">
						<div class="item" v-for="(getImage,index) in getBanner.get_images">

							<a :href="getImage.link">
								<img class="dv_home_desktop_banner" :src="baseUrlImage+getImage.mobile_image" :alt="getImage.mobile_image" title="">
							</a>
						</div>
					</div>
				</div>
			</section>

			<section class="dv_tawk_to_professinal_wrapper">
				<div class="container-fluid">
					<div class="dv_talk_to_professional_container">
						<div class="row">
							<div class="col-md-3 col-sm-12">
								<div class="dv_tawk_to_professinal">
									Talk to Professional
								</div>
							</div>
							<div class="col-md-4 col-sm-12">
								<ul class="dv_professionals_avatar">
									<li>
										<a href="javascript:void();">
											<img :src="baseUrlImage+'images/staff/1.jpg'" alt="" title="">
											<span></span>
										</a>
									</li>
									<li>
										<a href="javascript:void();">
											<img :src="baseUrlImage+'images/staff/2.jpg'" alt="" title="">
											<span></span>
										</a>
									</li>
									<li>
										<a href="javascript:void();">
											<img :src="baseUrlImage+'images/staff/3.jpg'" alt="" title="">
											<span></span>
										</a>
									</li>
								</ul>
							</div>
							<div class="col-md-5 col-sm-12">
								<ul class="dv_chat_email_call">
									<li>
										<a href="mailto:" data-toggle="tooltip" title="" data-placement="top" data-original-title="Mail to us">
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg> Mail
										</a>
									</li>
									<li>
										<a href="javascript:void(Tawk_API.toggle())" data-toggle="tooltip" title="" data-placement="top" data-original-title="Chat with us">
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path></svg> Chat
										</a>
									</li>
									<li>
										<a href="tel:" data-toggle="tooltip" title="" data-placement="top" data-original-title="Call to us">
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg> Call
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</section>
			<section class="dv_filter_products_wrapper">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-3 pr-0 dv_filter_wrapper_3">
							<filter-product :getProductDatas="getProductDatas"> </filter-product>
						</div>
						<div class="col-md-9 dv_product_listing_9">
							<div class="dv_total_match_sorting">
								<div class="row">
									<div class="col-md-7">
										<div class="dv_result_for_wrapper">
											{{ getProductDatas.data ? getProductDatas.data.length : 0  }}  Results 
											<!-- <span v-if="categoryName">for {{ categoryName }}</span> -->
										</div>
									</div>
									<div class="col-md-5">
										<ul class="dv_sort_per_page_ul">
											<li class="nav-item dropdown">
												<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" >{{ getSortName() }}
												 </a>
											    <ul class="dropdown-menu dv_myaccount_drp">
												  <li><a class="dropdown-item" href="javascript:void(0)" @click="getSort('recommended','')">Recommended</a></li>
												  <li><a class="dropdown-item" href="javascript:void(0)" @click="getSort('price','desc')">Price High to Low</a></li>
												  <li><a class="dropdown-item" href="javascript:void(0)" @click="getSort('price','asc')">Price Low to High</a></li>
												  <li><a class="dropdown-item" href="javascript:void(0)" @click="getSort('new_arrivals','desc')">New Arrivals </a></li>
											    </ul>
											</li>
											<li class="nav-item dropdown">
												<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">{{ (getQueryParam.perPage != undefined)?getQueryParam.perPage:'Per Page' }} </a>
											    <ul class="dropdown-menu dv_myaccount_drp">
												  <li><a class="dropdown-item" href="javascript:void(0)" @click="getPerPage(50)" >50 per page </a></li>
												  <li><a class="dropdown-item" href="javascript:void(0)" @click="getPerPage(100)">100 per page </a></li>
												  <li><a class="dropdown-item" href="javascript:void(0)" @click="getPerPage(150)">150 per page </a></li>
											    </ul>
											</li>
											<li>
												<a :class="getQueryParam.grid==0?'active':''" href="javascript:void(0);" @click="setGride(0)" data-toggle="tooltip" title="" data-placement="top" data-original-title="Grid View">
													<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-grid"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect></svg>
												</a>
											</li>
											<li>
												<a :class="getQueryParam.grid==1?'active':''" href="javascript:void(0);" data-toggle="tooltip" @click="setGride(1)" title="" data-placement="top" data-original-title="List View">
													<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-list"><line x1="8" y1="6" x2="21" y2="6"></line><line x1="8" y1="12" x2="21" y2="12"></line><line x1="8" y1="18" x2="21" y2="18"></line><line x1="3" y1="6" x2="3.01" y2="6"></line><line x1="3" y1="12" x2="3.01" y2="12"></line><line x1="3" y1="18" x2="3.01" y2="18"></line></svg>
												</a>
											</li>
											<li>
												<a :class="getQueryParam.grid==2?'active':''" href="javascript:void(0);" data-toggle="tooltip" @click="setGride(2)" title="" data-placement="top" data-original-title="Image View">
													<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><circle cx="8.5" cy="8.5" r="1.5"></circle><polyline points="21 15 16 10 5 21"></polyline></svg>
												</a>
											</li>
										</ul>
									</div>
								</div>
							</div>
							<ul class="dv_total_match_sorting_mobile dv_total_match_sorting_sticky">
								<li>
									<a href="javascript:void(0);" data-toggle="modal" data-target="#viewmobilefilter">
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"></polygon></svg> filter
									</a>
								</li>
								<li>
									<a href="javascript:void(0);" data-toggle="modal" data-target="#viewmobilesortby">
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="17 1 21 5 17 9"></polyline><path d="M3 11V9a4 4 0 0 1 4-4h14"></path><polyline points="7 23 3 19 7 15"></polyline><path d="M21 13v2a4 4 0 0 1-4 4H3"></path></svg> sort
									</a>
								</li>
								<li>
									<a href="javascript:void(0);" data-toggle="modal" data-target="#viewmobileperpagelist">
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="10" x2="6" y2="10"></line><line x1="21" y1="6" x2="3" y2="6"></line><line x1="21" y1="14" x2="3" y2="14"></line><line x1="18" y1="18" x2="6" y2="18"></line></svg> Page
									</a>
								</li>
								<li>
									<a href="javascript:void(0);" data-toggle="modal" data-target="#viewmobilepageviewlist">
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect></svg> View
									</a>
								</li>
							</ul>
							<ul class="dv_product_list_ul" v-if="getQueryParam.grid==0">
								<li v-for="(product,index) in getProductDatas.data" :key="index">
									<div class="dv_hover_none h-100">
										<figure class="imghvr-slide-up dv_product_list_per w-100" style="height:99% !important">
											<a :href="baseUrl+'get-product-description/'+$route.params.country_leng+'/'+product.slug" :title="product.name" class="dv_product_redirect_inside" />
											<!-- <router-link :to="{ name: 'getProductDescription', params: {productSlug:product.slug } }" :title="product.name" class="dv_product_redirect_inside"></router-link> -->
											<img v-if="getImage(product)" :src="baseUrlImage+'images/products/'+getImage(product)" alt="" title="" style="height:62% !important">
											<img v-else :src="baseUrlImage+'images/default_web.jpg'" alt="" title="" style="height:62% !important">
											<div class="dv_deal_discount_list" v-if="product.discount > 0 && (!getPromotionPrice(product) || (getPromotionPrice(product) && !getPromotionPrice(product).hasOwnProperty('discount_percentage')))"> {{ product.discount }}% off </div>										
											<div class="dv_deal_discount_list" v-else-if="getPromotionPrice(product)"> {{ getPromotionPrice(product)['discount_percentage'] }}% off </div>										
											<span>{{ product.name }}</span>
											<div class="badge badge-success" v-if="getPromotionPrice(product) && getPromotionPrice(product)['label']">{{ getPromotionPrice(product)['label'] }}</div>
											<ul class="dv_cut_with_price" v-if="!getPromotionPrice(product) || !getPromotionPrice(product).hasOwnProperty('promotion_price')">
												<li v-if="product.discount == 0"></li>
												<li>aed {{ product.sale_price }}</li>
												<li v-if="product.discount > 0">aed {{ product.discount_price  }}</li>
											</ul>
											<ul v-else class="dv_cut_with_price">
												<li>aed {{ product.sale_price }}</li>
												<li>aed {{ getPromotionPrice(product)['promotion_price'] }}</li>
											</ul>
											<!-- <ul class="dv_cut_with_price" v-else>
												<li></li>
												<li>aed {{ product.sale_price }}</li>
											</ul> -->
											<vue-star-rate
												:rateRange="product.avg_rating"
												:maxIcon="5"
												:readOnly="true"
												:iconHeight="16"
												:iconWidth="16"
												:hasCounter="false"
												iconColor="#ebebeb"
												iconColorHover="#ff9ba1"
												iconShape="star"
										    ></vue-star-rate>
											
											<!-- <div class="dv_compare_checkbox" data-toggle="tooltip" title="" data-placement="top" data-original-title="Add to compare">
												<div  class="custom-control cursor-pointer custom-checkbox dv_compare_checkbox_parent">
													<input type="checkbox" class="custom-control-input" :id="'Compare'+index" >
													<label class="custom-control-label" :for="'Compare'+index" @click="getCompare(product,$event.target)"></label>
												</div>
											</div> -->
											<figcaption>
												<div class="dv_view_wish_cart_list_pg">
													<svg @click="$refs.quickView.getProductDescription(product.slug)" xmlns="http://www.w3.org/2000/svg" data-toggle="modal" data-target="#quickviewproducts" title="" data-placement="top" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye dv_all_btn_hover" data-original-title="Quick View"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>

													<svg v-if="Object.keys($user).length > 0" @click="saveWishList(product.id,product.get_wish_list)" :class="product.get_wish_list == null?'': 'added_to_wishlist1'" xmlns="http://www.w3.org/2000/svg" data-toggle="tooltip" title="" data-placement="top" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart dv_all_btn_hover" data-original-title="Add to wishlist"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg>
													<svg v-if="product['product_quantity'] > 0" @click="addToCart(product)" xmlns="http://www.w3.org/2000/svg" data-toggle="tooltip" title="" data-placement="top" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart dv_all_btn_hover" data-original-title="Add to cart"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>
												</div>
								            </figcaption>
										</figure>
									</div>
								</li>
							</ul>

							<ul class="dv_product_list_list_view" v-if="getQueryParam.grid==1">
								<li v-for="(product,index) in getProductDatas.data" :key="index">
									<div class="row">
										<div class="dv_list_view_discount" v-if="product.discount > 0 && (!getPromotionPrice(product) || (getPromotionPrice(product) && !getPromotionPrice(product).hasOwnProperty('discount_percentage')))"> {{ product.discount }}% off </div>										
										<div class="dv_list_view_discount" v-else-if="getPromotionPrice(product)"> {{ getPromotionPrice(product)['discount_percentage'] }}% off </div>	
										<div class="col-md-3 col-sm-12">
											<a :href="baseUrl+'get-product-description/'+$route.params.country_leng+'/'+product.slug" :title="product.name" >
												<img v-if="getImage(product)" class="w-100" :src="baseUrlImage+'images/products/'+getImage(product)" alt="" title="">
												<img v-else :src="baseUrlImage+'images/default_web.jpg'" class="w-100" alt="" title="">
											</a>
											<!-- <router-link :to="{ name: 'getProductDescription', params: {productSlug:product.slug } }" :title="product.name" >
												<img class="w-100" :src="baseUrlImage+'images/products/'+getImage(product)" alt="" title="">
											</router-link> -->
											<!-- <div class="dv_compare_checkbox_list" data-toggle="tooltip" title="" data-placement="top" data-original-title="Add to compare">
												<div data-toggle="modal" data-target="#compareproductpopup" class="custom-control cursor-pointer custom-checkbox dv_compare_checkbox_parent">
													<input type="checkbox" class="custom-control-input" id="Compare" name="example1">
													<label class="custom-control-label" for="Compare">Compare</label>
												</div>
											</div> -->
										</div>
										<div class="col-md-9 col-sm-12">
											<div class="dv_product_name_list">
												<a :href="baseUrl+'get-product-description/'+$route.params.country_leng+'/'+product.slug" :title="product.name" >
												<!-- <router-link :to="{ name: 'getProductDescription', params: {productSlug:product.slug } }" :title="product.name" > -->
													{{ product.name }}
												</a>
											</div>
											<div class="badge badge-success" v-if="getPromotionPrice(product)['label']">{{ getPromotionPrice(product)['label'] }}</div>
											<!-- <ul class="dv_cut_with_price" v-if="product.discount > 0">
												<li >aed {{ product.sale_price }}</li>
												<li>aed {{product.discount_price  }}</li>
											</ul>
											<ul class="dv_cut_with_price" v-else>
												<li>aed {{ product.sale_price }}</li>
											</ul> -->
											<ul class="dv_cut_with_price" v-if="!getPromotionPrice(product) || !getPromotionPrice(product).hasOwnProperty('promotion_price')">
												<li>aed {{ product.sale_price }}</li>
												<li v-if="product.discount > 0">aed {{ product.discount_price  }}</li>
											</ul>
											<ul v-else class="dv_cut_with_price">
												<li>aed {{ product.sale_price  }}</li>
												<li>aed {{ getPromotionPrice(product)['promotion_price'] }}</li>
											</ul>
											<vue-star-rate
												:rateRange="product.rating"
												:maxIcon="5"
												:readOnly="true"
												:iconHeight="16"
												:iconWidth="16"
												:hasCounter="false"
												iconColor="#ebebeb"
												iconColorHover="#ff9ba1"
												iconShape="star"
										    ></vue-star-rate>
											<div v-if="product['product_quantity'] > 0">
												<button type="button" v-if="cart_items[product.id] == null" @click="addToCart(product)" class="btn btn-default dv_addtocart_list">
													Add to cart <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>
												</button>
												<div class="dv_increse_descrese_wrapper" v-else>
													<div class="input-group">
														<div class="input-group-prepend">
															<button @click="removeQty(product)" class="btn btn-outline-primary btn-number" data-type="minus" data-field="quant[1]" type="button">
																<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus"><line x1="5" y1="12" x2="19" y2="12"></line></svg>
															</button>
														</div>
														<input type="text" name="quant[1]" class="form-control input-number dv_qty_qk_pr_input" v-model="cart_items[product.id]['quantity']" min="1" readonly>
														<div class="input-group-append">
															<button @click="addQty(product)" class="btn btn-outline-primary btn-number" data-type="plus" data-field="quant[1]" type="button">
																<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
															</button>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<svg v-if="Object.keys($user).length > 0" @click="saveWishList(product.id,product.get_wish_list)" class="dv_wishlist_viewlist " :class="product.get_wish_list == null?'': 'added_to_wishlist'" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" xml:space="preserve"> <path d="M376,30c-27.783,0-53.255,8.804-75.707,26.168c-21.525,16.647-35.856,37.85-44.293,53.268 c-8.437-15.419-22.768-36.621-44.293-53.268C189.255,38.804,163.783,30,136,30C58.468,30,0,93.417,0,177.514 c0,90.854,72.943,153.015,183.369,247.118c18.752,15.981,40.007,34.095,62.099,53.414C248.38,480.596,252.12,482,256,482 s7.62-1.404,10.532-3.953c22.094-19.322,43.348-37.435,62.111-53.425C439.057,330.529,512,268.368,512,177.514 C512,93.417,453.532,30,376,30z"></path> </svg>
								</li>
							</ul>
						
							<ul class="dv_product_list_ul" v-if="getQueryParam.grid==2">
								<li v-for="(product,index) in getProductDatas.data" :key="index">
									<figure class="imghvr-slide-up dv_product_list_img_per w-100" style="height: 97%">
										<!-- <router-link :to="{ name: 'getProductDescription', params: {productSlug:product.slug } }" :title="product.name" class="dv_hover_none"></router-link> -->
										<img v-if="getImage(product)" :src="baseUrlImage+'images/products/'+getImage(product)" alt="" title="" style="height: 80% !important;">
										<img v-else :src="baseUrlImage+'images/default_web.jpg'" alt="" title="" style="height:80% !important">
										<vue-star-rate
											:rateRange="product.rating"
											:maxIcon="5"
											:readOnly="true"
											:iconHeight="16"
											:iconWidth="16"
											:hasCounter="false"
											iconColor="#ebebeb"
											iconColorHover="#ff9ba1"
											iconShape="star"
										></vue-star-rate>
										<figcaption>
											<div class="dv_view_wish_cart_list_pg">
												<svg @click="$refs.quickView.getProductDescription(product.slug)" xmlns="http://www.w3.org/2000/svg" data-toggle="modal" data-target="#quickviewproducts" title="Quick View" data-placement="top" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye dv_all_btn_hover"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
												<svg v-if="Object.keys($user).length > 0" @click="saveWishList(product.id,product.get_wish_list)" :class="product.get_wish_list == null?'': 'added_to_wishlist1'" xmlns="http://www.w3.org/2000/svg" data-toggle="tooltip" title="Add to wishlist" data-placement="top" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart dv_all_btn_hover "><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg>
												<svg @click="addToCart(product)" xmlns="http://www.w3.org/2000/svg" data-toggle="tooltip" title="Add to cart" data-placement="top" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart dv_all_btn_hover"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>
											</div>
										</figcaption>
									</figure>
								</li>								
							</ul>

							<div class="dv_pagination">
								<ul>
									<!-- <li>
										<a href="#!">
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-left"><polyline points="15 18 9 12 15 6"></polyline></svg>
										</a>
									</li> -->
									<li v-for="page in getProductDatas.last_page" :key="page">
										<a href="javascript:void(0);" @click="getProducts(page); scrollToUp()" :class="{ 'active': getProductDatas.current_page == page }">
											{{ page }}
										</a>
									</li>
									<!-- <li>
										<a href="#!" class="active">
											2
										</a>
									</li> -->
									<!-- <li>
										<a href="#!">
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
										</a>
									</li> -->
								</ul>
							</div>
							
						</div>
					</div>
				</div>
			</section>
			

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

			<!-- Quick View -->
			<QuickView ref="quickView" />
		</div>
</template>
<script type="text/javascript">
import Vue from 'vue'
import { LOAD_PRODUCTS_LIST_ACTION } from '@web/store/products/actions'
import { SAVE_CART_ACTION,LOAD_CART_LIST_ACTION, CHANGE_QTY_CART_ITEM_ACTION, REMOVE_CART_ITEM_ACTION } from '@web/store/carts/actions'
import FilterProduct from '@web/components/products/Filter';
import { LOAD_WISH_LIST_ACTION,LOAD_SAVE_WISH_LIST_ACTION  } from '@web/store/wishlists/actions'
import { SAVE_COMPARE_ACTION } from '@web/store/compares/actions'
import { GET_PROMOTIONS_ACTION } from '@web/store/promotions/actions'
import { mapState } from 'vuex'
import vueStarRate from "vue-js-star-rating";
import { uuid } from 'vue-uuid'
import QuickView from "./QuickView.vue";
export default {
	components: { FilterProduct,vueStarRate, QuickView  },
	data() {
		return {
			baseUrl:Vue.config.baseUrl,
			baseUrlImage:Vue.config.baseUrlImage,
			categoryName:'',
			gridSet:0,
			getQueryParam:{
				perPage:50,
				grid:0,
				sortBy:'',
				sortDir:''
			},
			uuid: '',  
			token: '',  
			getVatData:{},
			getBanner:{},
			rating:0,
			getSessionCompare:'',
			cart_items: {}
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
			this.getProducts();
			this.getBannerFunc();
			this.setUrlQueries();
		},
		'Vue':function() {
			console.log('sdlfasdfhddeed')
		},
		getVat:[{
			handler: 'getVatFunc'
		}]
	},
	computed:{
		...mapState({
			getProductDatas: state => state.Products.getProducts,
			getWishLists: state => state.Wishlists.getWishLists,
			getFilters: state => state.Products.getFilters,
			getPromotions: state => state.Promotion.getPromotions,
			getVats: state => state.Products.getVat,
			getCarts: state => state.Carts.getCarts,
			getCartQtyError: state => state.Carts.getError,
		}),
	},
	methods: {
		scrollToUp: function(){
			window.scrollTo(0,0);
		},
		getVatFunc:function(){
			let _this = this;
			if(Object.keys(_this.getVat).length > 0){
				_this.getVatData = _this.getVat;

			}
			
		},
		getCompare:function(product,event){
			console.log(event);
			let _this = this;
			_this.getSessionCompareFunc();
			let user_id = '';
			if(Object.keys(_this.$user).length > 0 ){
				user_id = _this.$user.id;
			}
			/*product.session_id = _this.getSessionCompare;
			product.user_id = user_id;
			_this.$store.dispatch('Compare/' + SAVE_COMPARE_ACTION,product).then(function(){})*/
		},
		addToCart:function(getProduct){
			let _this = this;
			this.getSession();
			this.getToken();
			let getProductObj = {
				id:getProduct.id,
				name:getProduct.name,
				qty:1,
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
				vat:_this.getVatData.percentage,
			};
			let promotion = this.getPromotionPrice(getProduct);
			if (promotion) {
				if (promotion.hasOwnProperty('promotion_price')) {
					getProductObj['discount_price'] = promotion['promotion_price'];
				}
				if (promotion.hasOwnProperty('discount_percentage')) {
					getProductObj['discount'] = promotion['discount_percentage'];
				}
			}
			let getUser = {};
			if(!Vue.helpers.isEmpty(_this.$user)){
				getProductObj.user_id = _this.$user.id;
			}

			_this.$store.dispatch('Carts/' + SAVE_CART_ACTION,getProductObj).then(function(){
				_this.$emit('get-change-cart');
				_this.getProducts();
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
		getSessionCompareFunc:function(){
			let _this = this;
			let getSession = localStorage.getItem('session_compare_id');
			if( getSession != undefined && getSession != null ){
					_this.getSessionCompare = getSession;
			}else{
				localStorage.setItem('session_compare_id', uuid.v1());
				let getSession = localStorage.getItem('session_compare_id');
				_this.getSessionCompare = getSession;
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
			_this.getProducts();
			_this.$emit('get-change-wishlist');
		})

		},
		getSortName:function(){
			let _this = this;
			if(_this.getQueryParam.sortBy == 'price'){
				let sortDir = 'High';
				if(_this.getQueryParam.sortDir == 'desc'){
					sortDir = 'Low';
				}
				return 'Price '+((sortDir=='Low')?'High':'Low')+' to '+sortDir
			}else if(_this.getQueryParam.sortBy == 'new_arrivals'){
				return 'New Arrivals';
			}else if(_this.getQueryParam.sortBy == 'recommended'){
				return 'Recommended';
			}else{
				return 'sort by';
			}
		},
		getPerPage:function(perPage){
			let getQuery = this.$route.query;
			getQuery.perPage = perPage;
			this.getQuery(getQuery);
		},
		getSort:function(by,dir){
			let getQuery = this.$route.query;
			getQuery.sortBy = by;
			getQuery.sortDir = dir;
			this.getQuery(getQuery);
		},
		getQuery:function(getQuery){
			this.getQueryParam = getQuery;
			this.$router.replace({name: this.$route.name, query: getQuery});
		},
		setGride:function(grid){
			let getQuery = this.$route.query;
			getQuery.grid = grid;
				this.getQuery(getQuery);
		},
		getImage:function(product){
			if(product.get_product_images.length > 0){
				let getImage = product.get_product_images.filter(function(item){
					return item.priority == 'P';
				})[0];
				return getImage.image;
			}
		},
		getBannerFunc:function(){
			let _this = this;
			let getParam = this.$route.params;
			if(this.getFilters != undefined){
			if( Object.keys(this.getFilters).length > 0){
				let getCategories = this.getFilters.getCategories;
				let getCategory = {};
				if(getCategories.length > 0){
					getCategory = getCategories.find(function(item){
						return item.slug === getParam.productSlug;
					});

					if(getCategory != undefined &&  getCategory.get_banner != null){
						_this.getBanner = getCategory.get_banner;

					}else{
						_this.getBanner = {};
					}
				}
				_this.getBannerScript();
			}
		}
			
			
		},
		getProducts:function(page=1){
			let _this = this;
			let getParam = this.$route.params;
			let getQuery = this.$route.query;
			this.getQueryParam  = getQuery;
			this.getQueryParam['page'] = page;
			var params = new URLSearchParams({});
			for(let key in getQuery)
				params.append(key, getQuery[key]);
			let user_id = '';
			if(!Vue.helpers.isEmpty(_this.$user)){
				user_id = _this.$user.id;
			}
			params.append('user_id',user_id);
			let path = getParam.country_leng;
				if(getParam.viewType != undefined){
				path +='/'+getParam.viewType;
			}
			if(getParam.viewType != undefined){
				path +='/'+getParam.productSlug;
			_this.categoryName = getParam.productSlug.replace(/\-+/g, ' ').toUpperCase();
			}
			this.$store.dispatch('Products/' + LOAD_PRODUCTS_LIST_ACTION,{
				path:path,
				queries:params.toString()
			}).then(() => {
				if (_this.getCarts && _this.getCarts.get_cart_items) {
					_this.getCarts.get_cart_items.forEach(item => {
						_this.cart_items[item.product_id] = item;
					});
				}
				_this.getBannerFunc();
				
			});
			
			/*if(_this.$user != null){
				let user_id = _this.$user.id;
				if(Vue.prototype.$getWishLists == undefined || Vue.prototype.$getWishLists.length == 0){
					_this.$store.dispatch('Wishlists/' + LOAD_WISH_LIST_ACTION,user_id).then(function(){
						console.log(_this.getWishLists)
						Vue.prototype.$getWishLists = _this.getWishLists;
					})
				}
			}*/
		},
		getBannerScript:function(){
			$(document).ready(function(){
				(function($){
					var $owl = $('.middle-offer-desktop-slider').owlCarousel({
					items: 1,
					dots:false,
					loop:true,
					nav:true,
					slideSpeed: 500,
					margin:0,
					navClass: ['owl-prev dv_home_slider_prev', 'owl-next dv_home_slider_next'],
					navText: ["<svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-chevron-left'><polyline points='15 18 9 12 15 6'></polyline></svg>","<svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-chevron-right'><polyline points='9 18 15 12 9 6'></polyline></svg>"]
				});
				var $owl = $('.middle-offer-mobile-slider').owlCarousel({
					items: 1,
					dots:false,
					loop:true,
					nav:true,
					smartSpeed: 400,
					margin:0,
					navClass: ['owl-prev dv_home_slider_prev', 'owl-next dv_home_slider_next'],
					navText: ["<svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-chevron-left'><polyline points='15 18 9 12 15 6'></polyline></svg>","<svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-chevron-right'><polyline points='9 18 15 12 9 6'></polyline></svg>"],
					responsive:{
						320:{
							items:1,
							margin:0
						},
						767:{
							items:2,
							margin:10

						}

				}
			});
		})(jQuery)
			})

		},
		setUrlQueries:function(){
			let getQuery = this.$route.query;
			if(getQuery.grid == undefined){
				getQuery.grid = 0;
			}
			this.getQueryParam = getQuery;
		},
		getPromotionData: function(){
			this.$store.dispatch('Promotion/' + GET_PROMOTIONS_ACTION);
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
		addQty: function (product) {
			let cart_item = this.cart_items[product.id];
			let quantity = cart_item.quantity + 1;
			this.getChangeQty(cart_item, quantity);
		},
		removeQty: function (product) {
			let cart_item = this.cart_items[product.id];
			if (cart_item.quantity <= 1) {
				this.deleteItem(cart_item, product.slug);
				return;
			}
			let quantity = cart_item.quantity - 1;
			this.getChangeQty(cart_item, quantity);
		},
		getChangeQty:function(item, quantity){
			let _this = this;
			_this.$store.dispatch('Carts/' + CHANGE_QTY_CART_ITEM_ACTION,{
				product_id: item.product_id,
				cart_id:item.id,
				qty:quantity,
				price:item.price,
				vat:_this.getVats.percentage
			}).then(function(){
				_this.$emit('get-change-cart');
				_this.getProducts();
				if (_this.getCartQtyError) {
					alert(_this.getCartQtyError);
					// _this.product_quantity[item.product_id] = item.quantity;
				}
			})
		},
		deleteItem:function(item ,slug){
			let _this = this;
			_this.$store.dispatch('Carts/' + REMOVE_CART_ITEM_ACTION, item.id).then(() => {
				_this.$emit('get-change-cart');
				delete _this.cart_items[item.product_id];
				_this.getProducts();
			});
		}
	},
	mounted(){
		this.getPromotionData();
		this.getProducts();
		this.getVatFunc();
		this.getBannerFunc();
		this.setUrlQueries();
	}
}
</script>
<style>
.added_to_wishlist {
	fill: #ff9aa2 !important;
}
.added_to_wishlist1{
	fill: #fff !important;
}
</style>