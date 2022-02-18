<template>
<div>
	<!-- <div v-if="getIsMobile()"> -->
		
		
	<!-- </div> -->
<footer>
			<div class="dv_semi_footer">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-3" v-for="(category,index) in getCategories" v-if="category.get_sub_categories.length > 0" :key="index"> 
							<div class="dv_all_links">
								<h4>{{ category.name }} </h4>
								<ul>
									<li v-for="(item,index) in category.get_sub_categories.slice(0,4)" :key="index">
										<a :href="baseUrl + 'get-product-list/ae-en?'+'grid=0&sub_category='+item.slug" @click="redirectTo(item, 'category')">
										<!-- <router-link :to="{ path: 'get-product-list/ae-en', query: { grid: 0, category: item.slug } }" :title="item.name" target="_blank"> -->
											{{  item.name }}
										<!-- </router-link> -->
										</a>
									</li>
									<li><router-link :to="{ name: 'getAllProducts' }" class="text-dark">View All</router-link></li>
								</ul>
							</div>
						</div>
						<div class="col-md-3"  v-if="getBrands">
							<div class="dv_all_links">
								<h4>Brands </h4>
								<ul>
									<li v-for="(brand,index) in getBrands.slice(0,4)" :key="index">
										<a :href="baseUrl + 'get-product-list/ae-en?'+'grid=0&brand='+brand.slug" @click="redirectTo(brand, 'brand')">
										<!-- <router-link :to="{ path: 'get-product-list/ae-en', query: { grid: 0, brand: brand.slug } }" target="_blank"> -->
											{{ brand.name }}
										<!-- </router-link> -->
										</a>
									</li>
									<li>
										<router-link :to="{ name: 'getAllProducts' }" class="text-dark">
											View All
										</router-link>
									</li>
								</ul>
							</div>
						</div>
						
						<div class="col-md-3" v-if="usefull_links.length > 0">
							<div class="dv_all_links">
								<h4>Useful links </h4>
								<ul>
									<li v-for="(page,index) in usefull_links" :key="index" >
										<router-link :to="{ name: 'getCmsPage', params:  { slug: page['slug'] }}" target="_blank">
											{{ page['menu_name'] }}
										</router-link>
									</li>
								</ul>
							</div>
						</div>

						<div class="col-md-3" v-if="guide_links.length > 0">
							<div class="dv_all_links">
								<h4>How to Guide </h4>
								<ul>
									<li v-for="(page,index) in guide_links" :key="index" >
										<router-link :to="{ name: 'getCmsPage', params:  { slug: page['slug'] }}" target="_blank">
											{{ page['menu_name'] }}
										</router-link>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<section class="home-newsletter">
								<div class="container">
									<div class="row">
										<div class="col-sm-12">
											<div class="single">
												<h2>Subscribe to our Newsletter</h2>
												<div class="input-group">
													<input type="email" v-model="subscribe_email" class="form-control" placeholder="Enter your email">
													<span class="input-group-btn">
														<button class="btn btn-theme" type="button" @click="subscribeEmail">Subscribe</button>
													</span>
												</div>
												<ul v-if="getSubscribeError" class="list-unstyled text-sm mt-1 text-muted filled" id="parsley-id-5"><li class="parsley-required text-white">{{ getSubscribeError }}</li></ul>
												<ul v-if="Object.keys(getSubscriberEmail).length > 0" class="list-unstyled text-sm mt-1 text-muted filled" id="parsley-id-5"><li class="parsley-required text-white">Your email has been subcribed.</li></ul>
											</div>
										</div>
									</div>
								</div>
							</section>
						</div>
					</div>
				</div>
			</div>
			<div class="dv_semi_second_footer">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-6"><div class="dv_copyright_txt"><span>&copy;</span> 2019-2020 Mirrors All rights reserved. </div></div>
						<div class="col-md-5">
							<ul class="dv_social_links">
								<li><a href="#!"><img src="images/social-icons/facebook.png" alt="" title=""></a></li>
								<li><a href="#!"><img src="images/social-icons/instagram.png" alt="" title=""></a></li>
								<li><a href="#!"><img :src="baseUrlImage+'/images/social-icons/linkdin.png'" alt="" title=""></a></li>
								<li><a href="#!"><img :src="baseUrlImage+'/images/social-icons/twitter.png'" alt="" title=""></a></li>
								<li><a href="#!"><img :src="baseUrlImage+'/images/social-icons/youtube.png'" alt="" title=""></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</footer>
</div>
		</template>
<script type="text/javascript">
 import Vue from 'vue'
  import { mapState } from 'vuex'
   import $ from "jquery";

  import { GET_BRAND_LIST } from '@web/store/brands/actions'
  import { GET_CMS_PAGES_ACTION } from '@web/store/cms/actions'
  import { SUBSCRIBE_EMAIL } from '@web/store/users/actions'
 export default {
 	 components: {  },
 	  data() {
            return {
              baseUrl:Vue.config.baseUrl,
              baseUrlImage:Vue.config.baseUrlImage,
			  usefull_links: [],
			  guide_links: [],
			  subscribe_email: ''
            }
        },
        computed:{
	        	...mapState({
	            getCategories: state => state.Categories.getCategories,
	            getBrands:state => state.Brand.getBrands,
				getCmsPages: state => state.Cms.getCMSPages,
				getSubscriberEmail: state => state.Users.getSubscriberEmail,
				getSubscribeError: state => state.Users.getSubscribeError
	        }),
	        },
	    
         methods: {
         	getIsMobile(){
         		return Vue.helpers.isMobile();
         	},
         	getBrand:function(){
         		let _this = this;
				_this.$store.dispatch('Brand/' + GET_BRAND_LIST).then(function(e){
					_this.getStriptBrand();
				})
         	},
         	getStriptBrand:function(){
				$(document).ready(function() {
					(function ($) {
						var $owl = $('.dv_browse_by_brands_slider').owlCarousel({
							items: 5,
							slideBy: 2,
							smartSpeed: 400,
							dots:false,
							loop:false,
							nav:true,
							margin:20,
							navClass: ['owl-prev dv_brands_slider_prev', 'owl-next dv_brands_slider_next'],
							navText: ["<svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-chevron-left'><polyline points='15 18 9 12 15 6'></polyline></svg>","<svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-chevron-right'><polyline points='9 18 15 12 9 6'></polyline></svg>"],
							responsive:{
								320:{
									items:1
								},
								480:{
									items:2
								},
								575:{
									items:3
								},
								1080:{
									items:5
								}
							}
						});
					})(jQuery);
				});
         	},
			getCmsPagesList: function() {
				this.$store.dispatch('Cms/' + GET_CMS_PAGES_ACTION, { }).then(() => {
					this.getCmsPages.forEach(page => {
						if (page.list_type == 'usefull_links') {
							this.usefull_links.push(page);
						}
						if (page.list_type == 'guide') {
							this.guide_links.push(page);
						}
					});
				});
			},
			subscribeEmail: function() {
				this.$store.dispatch('Users/' + SUBSCRIBE_EMAIL, { email: this.subscribe_email }).then(() => {
					this.subscribe_email = '';
				});
			},
			redirectTo: function(data, type) {
				window.scrollTo(0,0);
				window.location.href = this.baseUrl + 'get-product-list/ae-en?'+'grid=0&'+type+'='+data.slug;
			}
         },
         created(){
         	this.getBrand();
         },
         mounted(){
         	this.getCmsPagesList();
         }

 }
</script>
<style>
.home-newsletter {
	padding: 40px 0;
	background: #ff9aa2;
}

.home-newsletter .single {
	max-width: 650px;
	margin: 0 auto;
	text-align: center;
	position: relative;
	z-index: 2; 
}

.home-newsletter .single h2 {
	font-size: 22px;
	color: white;
	text-transform: uppercase;
	margin-bottom: 40px; 
}

.home-newsletter .single .form-control {
	height: 50px;
	background: rgba(255, 255, 255, 0.6);
	border-color: transparent;
	border-radius: 20px 0 0 20px; 
}

.home-newsletter .single .form-control:focus {
	box-shadow: none;
	border-color: #243c4f; 
}

.home-newsletter .single .btn {
	min-height: 50px; 
	border-radius: 0 20px 20px 0;
	background: #243c4f;
	color: #fff;
}
</style>