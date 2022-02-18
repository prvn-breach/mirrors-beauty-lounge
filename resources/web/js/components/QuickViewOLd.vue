<template>
    <div class="modal bottom fade" id="quickviewproducts" tabindex="-1" role="dialog" aria-labelledby="quickviewproducts">
	  <div class="modal-dialog" role="document" style="height: 80%;">
	    <div class="modal-content dv_viewmobile_filter_content overflow-hidden" style="background: #fdfcfc;">
	      <div class="modal-header dv_modal_filter_sm_txt_header">
	        <h5 class="modal-title dv_modal_filter_sm_txt text-center">Quick view of product </h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	        	<svg data-toggle="tooltip" title="Close Quick View" data-placement="Left" style="position: absolute; top: 15px; right: 15px;" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
	        </button>
	      </div>
	      <div class="modal-body overflow-auto">
	      	<div class="dv_quick_view_container">
		      	<div class="row">
		      		<div class="col-md-6 col-sm-6 col-xs-12 col-12">
		      			<div class="dv_quick_view_pr_6">
		      				<div class="owl-carousel owl-theme dv_quick_view_slider">
							    <div class="item" v-for="(image,index) in product.get_product_images" :key="index">
							    	<div class="dv_quick_view_slider_img_overlay"></div>
							    	<img :src="baseUrlImage+'images/products/'+image.image" alt="" title="" class="dv_quick_view_slider_img">
							    </div>
							</div>
							<div class="dv_deal_discount" style="z-index: 1;" v-if="product.discount > 0">{{ product.discount }}% Off</div>
		      			</div>
		      		</div>
		      		<div class="col-md-6 col-sm-6 col-xs-12 col-12">
		      			<div class="dv_quick_view_pr_txt_6">
		      				<div class="dv_quk_product_name">
		      					{{ product.name }}
		      				</div>
		      				<div class="dv_quk_product_sku">
		      					{{ product.sku }}
		      				</div>
		      				<div class="dv_quk_product_stock_instock" v-if="product['product_quantity'] > 0">
								currently in <span class="dv_quk_product_stock_status">stock </span>
							</div>
							<div class="dv_quk_product_stock_instock" v-else>
								currently <span class="dv_quk_product_outstock_status">out of stock </span>
							</div>
		      				<ul class="dv_product_rating p-0">
								<li>
									<!-- Rating start -->
									<span class="fa" :class="{ 'fa-star': product.avg_rating >=1, 'fa-star-o': product.avg_rating < 1 }" style="color: #ff9ba1;"></span>
									<span class="fa" :class="{ 'fa-star': product.avg_rating >=2, 'fa-star-o': product.avg_rating < 2 }" style="color: #ff9ba1;"></span>
									<span class="fa" :class="{ 'fa-star': product.avg_rating >=3, 'fa-star-o': product.avg_rating < 3 }" style="color: #ff9ba1;"></span>
									<span class="fa" :class="{ 'fa-star': product.avg_rating >=4, 'fa-star-o': product.avg_rating < 4 }" style="color: #ff9ba1;"></span>
									<span class="fa" :class="{ 'fa-star': product.avg_rating >=5, 'fa-star-o': product.avg_rating < 5 }" style="color: #ff9ba1;"></span>
									<!-- Rating end -->
								</li>
							</ul>
		      				<div class="dv_quk_product_cut_sale_price">
								<ul>
									<li v-if="product.discount == 0"></li>
									<li>aed {{ product.sale_price }}</li>
									<li v-if="product.discount > 0">aed {{ product.discount_price  }}</li>
								</ul>
		      				</div>
		      				<div class="dv_quk_product_color_size">
								<ul v-if="product.color">
									<li class="active">
										<div class="color-box" :style="'background-color: '+product.color"></div>
									</li>
								</ul>
								<ul v-if="product.size && product.size_measurment">
									<li class="active">{{ product.size+' '+product.size_measurment }} </li>
								</ul>
							</div>
							<div v-if="product['product_quantity'] > 0">
								<button type="button" class="btn btn-default dv_buy_now_btn_detail m-0" @click="addToCartBuy(product)" data-dismiss="modal">
									Buy now <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path><line x1="3" y1="6" x2="21" y2="6"></line><path d="M16 10a4 4 0 0 1-8 0"></path></svg>
								</button>
								
								<button type="button" class="btn btn-default dv_cart_button_qk m-0" v-if="cart_item==null" @click="addToCart(product)">
									Add to cart <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>
								</button>

								<div class="dv_increse_descrese_wrapper d-inline-block" v-else>
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
								<router-link :to="{ name: 'getProductDescription', params: {productSlug:product.slug } }" :title="product.name"  class="dv_view_more_detail_a" target="_blank">view more details</router-link>
							</div>
		      			</div>
		      		</div>
		      	</div>	      		
	      	</div>
	      </div>
	    </div>
	  </div>
	</div>
</template>
<script type="text/javascript">
import Vue from 'vue';
import $ from "jquery";
import { mapState } from 'vuex'
import { LOAD_PRODUCTS_DESCRIPTION_ACTION  } from '@web/store/products/actions'
import { SAVE_CART_ACTION, CHANGE_QTY_CART_ITEM_ACTION, REMOVE_CART_ITEM_ACTION } from '@web/store/carts/actions'
import { uuid } from 'vue-uuid'
export default {
	components: {  },
	data() {
		return {
			baseUrl:Vue.config.baseUrl,
			baseUrlImage:Vue.config.baseUrlImage,
			add_to_cart_qty: 1,
			cartStatus:0,
			token: '',
			uuid: '',
			cart_item: null
		}
	},
	created() {
		this.loadImageSliderScript();
	},
	computed:{
		...mapState({
			product: state => state.Products.getProduct,
			getCartQtyError: state => state.Carts.getError,
			getVats: state => state.Products.getVat,
			getCarts: state => state.Carts.getCarts,
		}),
	},
	methods: {
		loadImageSliderScript: function() {
			$(window).on('load', function(){ 
				$(document).ready(function() {
					(function ($) {
						$('.dv_quick_view_slider').owlCarousel({
							loop:true,
							margin:10,
							nav:true,
							dots:true,
							items:1,
							navClass: ['owl-prev dv_home_slider_prev', 'owl-next dv_home_slider_next'],
							navText: ["<svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-chevron-left'><polyline points='15 18 9 12 15 6'></polyline></svg>","<svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-chevron-right'><polyline points='9 18 15 12 9 6'></polyline></svg>"]
						})
					})(jQuery);
				})
			});
		},
		getProductDescription:function(product_slug){
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
			let path = getParam.country_leng+'/'+product_slug;
			this.$store.dispatch('Products/' + LOAD_PRODUCTS_DESCRIPTION_ACTION,{
				path:path,
				queries:params.toString()
			}).then(() => {
				if (_this.getCarts) {
					_this.cart_item = _this.getCarts.get_cart_items.find(item => item.product_id == _this.product.id);
				}
				_this.loadImageSliderScript();
				if (_this.cart_item) {
					_this.add_to_cart_qty = _this.cart_item.quantity;
				}
			});
		},
		addToCartBuy:function(getProduct){
			let _this = this;
			this.addInToCart(getProduct);
			this.cartStatus = 1;
		},
		addToCart:function(getProduct){
			let _this = this;
			_this.cartStatus = 0;
			_this.addInToCart(getProduct);
		},
		getImage:function(product){
			if(product.get_product_images.length > 0){
				let getImage = product.get_product_images.filter(function(item){
					return item.priority == 'P';
				})[0];
				return getImage.image;
			}
		},
		addInToCart:function(getProduct){
			let _this = this;
			this.getSession();
			this.getToken();
			let getProductObj = {
				id:getProduct.id,
				name:getProduct.name,
				qty:_this.add_to_cart_qty,
				image:_this.baseUrlImage+'images/products/'+_this.getImage(getProduct),
				session_id:_this.uuid,
				token:_this.token,
				price:getProduct.sale_price,
				discount_price:getProduct.discount_price,
				discount:getProduct.discount,
				sku:getProduct.sku,
				barcode:getProduct.barcode,
				brand_id:getProduct.brand_id,
				category_id:getProduct.category_id,
				warranty:getProduct.warranty,
				delivery:getProduct.delivery,
				user_id:null,
				vat:_this.getVats.percentage,
			};
			let getUser = {};
			if(!Vue.helpers.isEmpty(_this.$user)){
				getProductObj.user_id = _this.$user.id;
			}

			_this.$store.dispatch('Carts/' + SAVE_CART_ACTION,getProductObj).then(function(){
				_this.$parent.$emit('get-change-cart');
				if(_this.cartStatus == 1){
					_this.$router.push({name:'getCart'}); 
				}
				_this.getProductDescription(getProduct.slug);
			})
		},
		addQty: function () {
			this.add_to_cart_qty++;
			this.getChangeQty(this.cart_item);
		},
		removeQty: function () {
			if (this.add_to_cart_qty <= 1) {
				this.deleteItem(this.cart_item, this.product.slug);
				return;
			}
			this.add_to_cart_qty--;
			this.getChangeQty(this.cart_item);
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
		},
		deleteItem:function(item ,slug){
			let _this = this;
			_this.$store.dispatch('Carts/' + REMOVE_CART_ITEM_ACTION, item.id).then(() => {
				_this.$parent.$emit('get-change-cart');
				_this.getProductDescription(slug);
			});
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
	}
}
</script>