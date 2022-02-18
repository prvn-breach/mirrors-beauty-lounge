<template>
	 <div>
      <div class="dv_content">
      		<section class="dv_desktop_slider" v-if="Object.keys(getBanner).length > 0">
				<div class="container-fluid">
					<div class="home-slider owl-carousel owl-theme">
						<div class="item" v-for="(getImage,index) in getBanner.get_images" :key="index"><a :href="getImage.link">
								<img class="dv_home_desktop_banner" :src="baseUrlImage+getImage.image" :alt="getImage.image" title="">								
								<!-- home-mobile-slider -->
							</a>
						</div>
					</div>
				</div>
			</section>
			<section class="dv_mobile_slider" v-if="Object.keys(getBanner).length > 0">
				<div class="container-fluid">
					<div class="home-slider owl-carousel owl-theme">
						<div class="item" v-for="(getImage,index) in getBanner.get_images" :key="index">
							<a :href="getImage.link">
								<img class="dv_home_desktop_banner" :src="baseUrlImage+getImage.mobile_image" :alt="getImage.image" title="">
							</a>
						</div>
					</div>
				</div>
			</section>

			<section class="dv_browse_by_brands" v-if="getBrands.length > 0">
				<div class="container-fluid">
					<div class="dv_browse_by_brands_bg">
						<div class="dv_section_heading_view_all">
							<span>Browse by brands</span>
							<a :href="baseUrl+'get-product-list/'+$route.params.country_leng">view all</a>
						</div>
						<ul class="dv_browse_by_brands_slider owl-carousel owl-theme">
							<li class="item" v-for="(brand,index) in getBrands" :key="index">
								<a :href="baseUrl + 'get-product-list/'+$route.params.country_leng+'?'+'grid=0&brand='+brand.slug" class="dv_browse_brands_card_a">
									<img :src="baseUrlImage+'images/brands/'+brand.image">
								</a>
							</li>
						</ul>						
					</div>
				</div>
			</section>

			<section class="dv_best_mirror_deal" v-if="$attrs.getWishlistData.length > 0">
				<div class="container-fluid">
					<div class="dv_best_mirror_deal_wrapper">
						<div class="dv_section_heading_view_all">
							<span>Shop by favourite </span>
							<a :href="baseUrl+'get-product-list/'+$route.params.country_leng">view all</a>
						</div>
						
						<!-- <router-link :to="{ name: 'getAllProducts' }">view all</router-link> -->
						<ul class="dv_best_mirror_deal_slider owl-carousel owl-theme">
							<li class="item dv_best_mr_deal_item" v-for="(wishlist,index) in $attrs.getWishlistData" :key="index">
								<!-- <div class="stage"><div class="heart"></div></div> -->
								<div class="dv_hover_none">
									<figure class="imghvr-slide-up dv_deal_product_wrapper">
										<a :href="baseUrl+'get-product-description/'+$route.params.country_leng+'/'+wishlist.get_product.slug" :title="wishlist.get_product.name" class="dv_product_redirect_inside"></a>
										<img v-if="getImage(wishlist.get_product)" :src="baseUrlImage+'images/products/'+getImage(wishlist.get_product)" alt="" title="" style="height: 248px !important;">
										<img v-else :src="baseUrlImage+'images/default_web.jpg'" alt="" title="" style="height: 248px !important;">
										<div class="dv_deal_discount_list" v-if="wishlist.get_product.discount > 0"> {{ wishlist.get_product.discount }}% off </div>										
										<span>{{ wishlist.get_product.name }}</span>
										<ul class="dv_cut_with_price" v-if="wishlist.get_product.discount > 0">
											<li >aed {{ wishlist.get_product.sale_price }}</li>
											<li>aed {{wishlist.get_product.discount_price  }}</li>
										</ul>
										<ul class="dv_cut_with_price" v-else>
											<li></li>
											<li>aed {{ wishlist.get_product.sale_price }}</li>
										</ul>
										<vue-star-rate
											:rateRange="wishlist.get_product.avg_rating"
											:maxIcon="5"
											:iconHeight="16"
											:iconWidth="16"
											:hasCounter="false"
											iconColor="#ebebeb"
											iconColorHover="#ff9ba1"
											iconShape="star"
										></vue-star-rate>
										
										<!-- <div class="dv_compare_checkbox" data-toggle="tooltip" title="" data-placement="top" data-original-title="Add to compare">
											<div data-toggle="modal" data-target="#compareproductpopup" class="custom-control cursor-pointer custom-checkbox dv_compare_checkbox_parent">
												<input type="checkbox" class="custom-control-input" id="Compare" name="example1">
												<label class="custom-control-label" for="Compare"></label>
											</div>
										</div> -->
										<figcaption>
											<div class="dv_view_wish_cart_list_pg">
												<svg @click="$refs.quickView.getProductDescription(wishlist.get_product.slug)" xmlns="http://www.w3.org/2000/svg" data-toggle="modal" data-target="#quickviewproducts" title="" data-placement="top" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye dv_all_btn_hover" data-original-title="Quick View"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>

												<svg v-if="Object.keys($user).length > 0" @click="saveWishList(wishlist.get_product.id,wishlist)" :class="wishlist == null?'': 'added_to_wishlist1'" xmlns="http://www.w3.org/2000/svg" data-toggle="tooltip" title="" data-placement="top" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart dv_all_btn_hover" data-original-title="Add to wishlist"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg>
												<svg v-if="wishlist.get_product['product_quantity'] > 0" @click="addToCart(wishlist.get_product)" xmlns="http://www.w3.org/2000/svg" data-toggle="tooltip" title="" data-placement="top" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart dv_all_btn_hover" data-original-title="Add to cart"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>
											</div>
										</figcaption>
									</figure>
								</div>
							</li>
						</ul>
					</div>
				</div>
			</section>

		
			<section class="dv_best_mirror_deal" v-if="getProductDeals.length > 0">
				<div class="container-fluid">
					<div class="dv_best_mirror_deal_wrapper">
						<div class="dv_section_heading_view_all">
							<span>Best Mirrors Deal </span>
							<a :href="baseUrl+'get-product-list/'+$route.params.country_leng">view all</a>
						</div>
						
						<ul class="dv_best_mirror_deal_slider owl-carousel owl-theme">
							<li class="item dv_best_mr_deal_item" v-for="(product,index) in getProductDeals" :key="index">
								<!-- <div class="stage"><div class="heart"></div></div> -->
								<div class="dv_hover_none">
									<figure class="imghvr-slide-up dv_deal_product_wrapper">
										<a :href="baseUrl+'get-product-description/'+$route.params.country_leng+'/'+product.slug" :title="product.name" class="dv_product_redirect_inside"></a>
										<img v-if="getImage(product)" :src="baseUrlImage+'images/products/'+getImage(product)" alt="" title="" style="height: 248px !important;">
										<img v-else :src="baseUrlImage+'images/default_web.jpg'" alt="" title="" style="height: 248px !important;">
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
										<vue-star-rate
											:rateRange="product.avg_rating"
											:maxIcon="5"
											:iconHeight="16"
											:iconWidth="16"
											:hasCounter="false"
											iconColor="#ebebeb"
											iconColorHover="#ff9ba1"
											iconShape="star"
										></vue-star-rate>
										
										<!-- <div class="dv_compare_checkbox" data-toggle="tooltip" title="" data-placement="top" data-original-title="Add to compare">
											<div data-toggle="modal" data-target="#compareproductpopup" class="custom-control cursor-pointer custom-checkbox dv_compare_checkbox_parent">
												<input type="checkbox" class="custom-control-input" id="Compare" name="example1">
												<label class="custom-control-label" for="Compare"></label>
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
					</div>
				</div>
			</section>
			
			<section class="dv_middle_offer_slider hide-mobile-1080" v-if="Object.keys(getDealBanner).length > 0">
				<div class="container-fluid">
					<div class="middle-offer-desktop-slider owl-carousel owl-theme">
						<div class="item" v-for="(getImage,index) in getDealBanner.get_images" :key="index">
							<a :href="getImage.link">
								<img class="dv_home_desktop_banner" :src="baseUrlImage+getImage.image" :alt="getImage.image" title="">
							</a>
						</div>
					</div>
				</div>
			</section>

			<section class="dv_middle_offer_slider show-mobile-1080">
				<div class="container-fluid">
					<div class="middle-offer-mobile-slider owl-carousel owl-theme">
						<div class="item" v-for="(getImage,index) in getDealBanner.get_images" :key="index">
							<a :href="getImage.link">
								<img class="dv_home_desktop_banner" :src="baseUrlImage+getImage.mobile_image" :alt="getImage.image" title="">
							</a>
						</div>
					</div>
				</div>
			</section>

			<section class="dv_browse_by_category" v-if="getCategories">
				<div class="container-fluid">
					<div class="dv_browse_by_category_wrapper">
						<div class="dv_browse_by_category_heading">
							<h4>Browse by category </h4>
							<a :href="baseUrl+'get-product-list/'+$route.params.country_leng">view all</a>
						</div>
						<ul class="dv_browse_by_category_slider owl-carousel owl-theme" >
							<!-- Categories -->
							<li class="item dv_per_category_item" v-for="(category,indexC) in getCategories" :key="indexC"> 
								<a :href="baseUrl + 'get-product-list/'+$route.params.country_leng+'?'+'grid=0&category='+category.slug" class="dv_per_category_wrapper">
									<img :src="baseUrlImage+category.icon">
									<span>{{ category.name }}</span>
								</a>
							</li>
							<!-- SubCategories -->
							<!-- <li class="item dv_per_category_item" v-for="(sub_category,sub_category_index) in getSubCategories" :key="getCategories.length+sub_category_index"> 
								<a :href="baseUrl + 'get-product-list/'+$route.params.country_leng+'?'+'grid=0&sub_category='+sub_category.slug" class="dv_per_category_wrapper">
									<img :src="baseUrlImage+sub_category.icon">
									<span>{{ sub_category.name }}</span>
								</a>
							</li> -->
						</ul>
					</div>
				</div>
			</section>


			<section class="dv_category_slider_for_all p-0" v-for="(category,indexC) in getCategoryByProducts" :key="indexC">
				<div class="container-fluid">
					<div class="dv_category_slider_for_all_wrapper">
						<div class="dv_category_slider_for_all_heading">
							<h4>{{ category.name }} </h4>
							<a :href="baseUrl+'get-product-list/'+$route.params.country_leng+'?'+'grid=0&category='+category.slug">view all</a>
						</div>
						<ul class=" owl-carousel owl-theme" :class="'dv_category_slider_for_all_slider'+getCategoryModel(category)">
							<li class="item" v-for="(product,index) in category.get_products" :key="index">
								<div class="dv_hover_none">
									<figure class="imghvr-slide-up dv_deal_product_wrapper">
										<a :href="baseUrl+'get-product-description/'+$route.params.country_leng+'/'+product.slug" :title="product.name" class="dv_product_redirect_inside"></a>
											<img v-if="getImage(product)" :src="baseUrlImage+'images/products/'+getImage(product)" alt="" title="" style="height: 248px !important;">
											<img v-else :src="baseUrlImage+'images/default_web.jpg'" alt="" title="" style="height: 248px !important;">
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
											 <vue-star-rate
										      :rateRange="product.rating"
										      :maxIcon="5"
										      :iconHeight="16"
										      :iconWidth="16"
										      :hasCounter="false"
										      iconColor="#ebebeb"
										      iconColorHover="#ff9ba1"
										      iconShape="star"
										    ></vue-star-rate>
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
					</div>
				</div>
			</section>

			<section class="dv_category_slider_for_all p-0" v-if="sub_category.products.length>0" v-for="(sub_category,sub_category_index) in getSubCategories" :key="getCategoryByProducts.length + sub_category_index">
				<div class="container-fluid">
					<div class="dv_category_slider_for_all_wrapper">
						<div class="dv_category_slider_for_all_heading">
							<h4>{{ sub_category.name }} </h4>
							<a :href="baseUrl+'get-product-list/'+$route.params.country_leng+'?'+'grid=0&sub_category='+sub_category.slug">view all</a>
						</div>
						<ul class=" owl-carousel owl-theme" :class="'dv_category_slider_for_all_slider'+getSubCategoryModel(getCategoryByProducts.length + sub_category.id)">
							<li class="item" v-for="(product,index) in sub_category.products" :key="index">
								<div class="dv_hover_none">
									<figure class="imghvr-slide-up dv_deal_product_wrapper">
										<a :href="baseUrl+'get-product-description/'+$route.params.country_leng+'/'+product.slug" :title="product.name" class="dv_product_redirect_inside"></a>
											<img v-if="getImage(product)" :src="baseUrlImage+'images/products/'+getImage(product)" alt="" title="" style="height: 248px !important;">
											<img v-else :src="baseUrlImage+'images/default_web.jpg'" alt="" title="" style="height: 248px !important;">
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
											 <vue-star-rate
										      :rateRange="product.rating"
										      :maxIcon="5"
										      :iconHeight="16"
										      :iconWidth="16"
										      :hasCounter="false"
										      iconColor="#ebebeb"
										      iconColorHover="#ff9ba1"
										      iconShape="star"
										    ></vue-star-rate>
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
					</div>
				</div>
			</section>
		</div>
		
		<!-- Quick View -->
		<QuickView ref="quickView" />
     </div>
</template>

<script type="text/javascript">
import Vue from 'vue'
import $ from "jquery";
import { mapState } from 'vuex'
import { GET_BANNER_BY_TYPE } from '@web/store/banners/actions'
import { SAVE_CART_ACTION } from '@web/store/carts/actions'
import { LOAD_PRODUCT_DEAL_LIST_ACTION,LOAD_PRODUCT_CATEGORY_LIST_ACTION, LOAD_PRODUCTS_DESCRIPTION_ACTION  } from '@web/store/products/actions'
import { LOAD_SAVE_WISH_LIST_ACTION  } from '@web/store/wishlists/actions'
import { GET_PROMOTIONS_ACTION } from '@web/store/promotions/actions'
import { GET_SUBCATEGORIES_ACTION } from '@web/store/navigation/sub-categories/actions'
import vueStarRate from "vue-js-star-rating";
import { uuid } from 'vue-uuid'
import QuickView from "./QuickView.vue";
export default {
	components: { vueStarRate, QuickView },
	data() {
		return {
			baseUrl:Vue.config.baseUrl,
			baseUrlImage:Vue.config.baseUrlImage,
			getBannerImages:[],
			getVatData:{},
			uuid:'',
		}
	},
	computed:{
		...mapState({
			getBanner:state => state.Banner.getBanner,
			getDealBanner:state => state.Banner.getDealBanner,
			getBrands:state => state.Brand.getBrands,
			getProductDeals: state => state.Products.getProductDeals,
			getCategories: state => state.Categories.getCategories,
			getSubCategories: state => state.SubCategories.getSubCategories,
			getCategoryByProducts: state => state.Products.getCategoryByProducts,
			getWishlists: state => state.Wishlists.getWishLists,
			getPromotions: state => state.Promotion.getPromotions,
		}),
	},
	props: {
		getVat: {
			getVat: Object,
			required: true,
		}
	},
	watch: {
		'$route': function () { },
		getVat:[{
			handler: 'getVatFunc'
		}]
	},
	methods: {
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
			_this.$store.dispatch('Banner/' + GET_BANNER_BY_TYPE,'home').then(function(e){
				_this.owlSlider();
			})
			_this.$store.dispatch('Banner/' + GET_BANNER_BY_TYPE,'home_deal').then(function(e){
				_this.getStriptDeal();
			})
			_this.$store.dispatch('Products/' + LOAD_PRODUCT_DEAL_LIST_ACTION).then(function(e){
				_this.getStriptProductDeal();
			}) 
			_this.$store.dispatch('Products/' + LOAD_PRODUCT_CATEGORY_LIST_ACTION).then(function(e){
				_this.getCategorySlider();
			})
		},
		getSubCategoriesList: function() {
			this.$store.dispatch('SubCategories/' + GET_SUBCATEGORIES_ACTION);
		},
		getProductDealsList: function() {
			this.$store.dispatch('Products/' + LOAD_PRODUCT_DEAL_LIST_ACTION);
		},
		owlSlider:function(){
			let _this = this;
			$(document).ready(function() {
				(function ($) {
					var $owl = $('.home-slider').owlCarousel({
						items: 1,
						dots:false,
						loop:false,
						nav:true,
						slideSpeed: 500,
						margin:0,
						navClass: ['owl-prev dv_home_slider_prev', 'owl-next dv_home_slider_next'],
						navText: ["<svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-chevron-left'><polyline points='15 18 9 12 15 6'></polyline></svg>","<svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-chevron-right'><polyline points='9 18 15 12 9 6'></polyline></svg>"]
					});
					$('.dv_quick_view_slider').owlCarousel({
						loop:false,
						margin:10,
						nav:true,
						dots:true,
						items:1,
						navClass: ['owl-prev dv_home_slider_prev', 'owl-next dv_home_slider_next'],
						navText: ["<svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-chevron-left'><polyline points='15 18 9 12 15 6'></polyline></svg>","<svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-chevron-right'><polyline points='9 18 15 12 9 6'></polyline></svg>"]
					})					
					var $owl = $('.middle-offer-mobile-slider').owlCarousel({
						items: 1,
						dots:false,
						loop:false,
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

					// $owl.trigger('refresh.owl.carousel');
					
				
					// $owl.trigger('refresh.owl.carousel');
					
					
					// $owl.trigger('refresh.owl.carousel');

				
					// $owl.trigger('refresh.owl.carousel');

					var $owl = $('.dv_favourite_slider').owlCarousel({
					smartSpeed: 500,
					dots:false,
					loop:false,
					nav:true,
					margin:20,
					responsive:{
						300:{
							items:1
						},
						480:{
							items:2
						},
						1080:{
							items:3
						}
					},
					navClass: ['owl-prev dv_favourite_slider_prev', 'owl-next dv_favourite_slider_next'],
					navText: ["<svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-chevron-left'><polyline points='15 18 9 12 15 6'></polyline></svg>","<svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-chevron-right'><polyline points='9 18 15 12 9 6'></polyline></svg>"]
				});
				})(jQuery);
			});
		},
		getStriptDeal:function(){
			$(document).ready(function() {
				(function ($) {
					var $owl = $('.middle-offer-desktop-slider').owlCarousel({
						items: 1,
						dots:false,
						loop:false,
						nav:true,
						slideSpeed: 500,
						margin:0,
						navClass: ['owl-prev dv_home_slider_prev', 'owl-next dv_home_slider_next'],
						navText: ["<svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-chevron-left'><polyline points='15 18 9 12 15 6'></polyline></svg>","<svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-chevron-right'><polyline points='9 18 15 12 9 6'></polyline></svg>"]
					});
				})(jQuery);
			});
		},
		getStriptProductDeal:function(){
			$(document).ready(function() {
			(function ($) {
				var $owl = $('.dv_best_mirror_deal_slider').owlCarousel({
					items: 5,
					slideBy: 5,
					smartSpeed: 400,
					dots:false,
					loop:false,
					nav:true,
					margin:20,
					navClass: ['owl-prev dv_home_slider_prev', 'owl-next dv_home_slider_next'],
					navText: ["<svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-chevron-left'><polyline points='15 18 9 12 15 6'></polyline></svg>","<svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-chevron-right'><polyline points='9 18 15 12 9 6'></polyline></svg>"],
					responsive:{
				320:{
					items:2,
					margin:10,
					slideBy: 1
				},
				575:{
					items:3,
					margin:10,
					slideBy: 2

				},
				1080:{
					items:5
				}
				}

			});
			$('.dv_best_mirror_deal_slider').children('.owl-nav').removeClass('disabled');
		})(jQuery);
				});
		},
		getCategoryModel:function(category){
			$(document).ready(function() {
				(function ($) {
					var $owl = $('.dv_category_slider_for_all_slider'+category.id).owlCarousel({
						items: 5,
						slideBy: 5,
						smartSpeed: 500,
						dots:false,
						loop:false,
						nav:true,
						margin:20,
						navClass: ['owl-prev dv_home_slider_prev', 'owl-next dv_home_slider_next'],
						navText: ["<svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-chevron-left'><polyline points='15 18 9 12 15 6'></polyline></svg>","<svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-chevron-right'><polyline points='9 18 15 12 9 6'></polyline></svg>"],
						responsive:{
							320:{
								items:2,
								margin:10,
								slideBy: 1
							},
							480:{
								items:2
							},
							767:{
								items:3
							},
							1080:{
								items:5
							}
						}
					});
				})(jQuery);
			});
			return category.id;
		},
		getSubCategoryModel:function(id){
			$(document).ready(function() {
				(function ($) {
					var $owl = $('.dv_category_slider_for_all_slider'+id).owlCarousel({
						items: 5,
						slideBy: 5,
						smartSpeed: 500,
						dots:false,
						loop:false,
						nav:true,
						margin:20,
						navClass: ['owl-prev dv_home_slider_prev', 'owl-next dv_home_slider_next'],
						navText: ["<svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-chevron-left'><polyline points='15 18 9 12 15 6'></polyline></svg>","<svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-chevron-right'><polyline points='9 18 15 12 9 6'></polyline></svg>"],
						responsive:{
							320:{
								items:2,
								margin:10,
								slideBy: 1
							},
							480:{
								items:2
							},
							767:{
								items:3
							},
							1080:{
								items:5
							}
						}
					});
				})(jQuery);
			});
			return id;
		},
		getCategorySlider:function(){
			$(document).ready(function() {
				(function ($) {
					var $owl = $('.dv_browse_by_category_slider').owlCarousel({
						nav:true,
						items: 5,
						slideBy: 2,
						smartSpeed: 400,
						dots:false,
						loop:false,
						margin:20,
						navClass: ['owl-prev dv_cate_slider_prev', 'owl-next dv_cate_slider_next'],
						navText: ["<svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-chevron-left'><polyline points='15 18 9 12 15 6'></polyline></svg>","<svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-chevron-right'><polyline points='9 18 15 12 9 6'></polyline></svg>"],
						responsive:{
							320:{
								items:1,
								margin:0
							},
							380:{
								items:2,
								margin:10
							},
							575:{
								items:3,
								margin:10

							},
							1080:{
								items:5
							}
						}
					});
				})(jQuery);
			});	
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
		getVatFunc:function(){
			let _this = this;
			if(Object.keys(_this.getVat).length > 0){
				_this.getVatData = _this.getVat;
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
			}).then(() => {
				_this.getProductDealsList();
				_this.$emit('get-change-wishlist');
			})
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
		}
	},
	created(){
		this.getPromotionData();
		this.getBannerFunc();
		this.getVatFunc();
		this.getSubCategoriesList();
	}
}
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/615be433d326717cb684c335/1fh7f6qnm';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<style>
.added_to_wishlist1{
	fill: #fff !important;
}
</style>
