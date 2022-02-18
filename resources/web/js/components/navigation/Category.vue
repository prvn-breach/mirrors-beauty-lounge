<template>
	<li class=" dv_mega_menu_drp" :class="getCategory.get_sub_categories.length > 0 ? 'dropdown':''">
							<a :href="baseUrl + 'get-product-list/'+$route.params.country_leng+'?grid=0&category='+getCategory.slug" @click="redirectTo(getCategory)" :title="getCategory.name" class=" disabled" :data-toggle="getCategory.get_sub_categories.length > 0 ? 'dropdown':''" :class="getCategory.get_sub_categories.length > 0 ? 'dropdown-toggle':''">
							<!-- <router-link :to="{ path: 'get-product-list/ae-en', query: { grid: 0, category: getCategory.slug } }" :title="getCategory.name" class=" disabled" :data-toggle="getCategory.get_sub_categories.length > 0 ? 'dropdown':''" :class="getCategory.get_sub_categories.length > 0 ? 'dropdown-toggle':''"> -->
								{{getCategory.name}}
								<svg v-if="getCategory.get_sub_categories.length > 0" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
							</a>

                            <div class="dropdown-menu dv_drp_menu" v-if="getCategory.get_sub_categories.length > 0">
                            	<div class="dv_dropdown_wrapper">
	                                <ul>
	                                	<li>
	                                		<p>shop by category </p>
	                                		<ul>

												<CategoryItem  v-for="getItem in getCategory.get_sub_categories" v-bind:getItem="getItem" v-bind:key="getItem.id"></CategoryItem>
												<!-- <li v-if="getCategory.get_sub_categories.length > 0"><router-link :to="{ name: 'getProductList', params: {viewType: 'category',productSlug:getCategory.slug } }" :title="getCategory.category_name">All view</router-link>
												</li> -->
												
											</ul>
	                                	</li>
	                                	<!-- <li>
	                                		<p>shop by brands </p>
	                                		<ul>
												<BrandItem v-for="getBrandItem in getCategory.get_brand_items" v-bind:getBrandItem="getBrandItem" v-bind:key="getBrandItem.item_id"></BrandItem>
												<li v-if="getCategory.get_brand_items.length > 0"><router-link :to="{ name: 'getProductList', params: {viewType: 'category',productSlug:getCategory.slug } }" :title="getCategory.category_name">All view</router-link>
												</li>
													 
											</ul>
	                                	</li> -->
	                                </ul>
	                               <!--  <div class="dv_bottom_brands">
	                                	<ul>
	                                		<BrandImage v-for="getBrandImage in getCategory.get_brand_images" v-bind:getBrandImage="getBrandImage" v-bind:key="getBrandImage.item_id"></BrandImage>
	                                	</ul>
	                                	
	                                </div> -->
	                            </div>
                            </div>
                        </li>
</template>
<script type="text/javascript">
import Vue from 'vue'
import CategoryItem from '@web/components/navigation/CategoryItem'
import BrandItem from '@web/components/navigation/BrandItem'
import BrandImage from '@web/components/navigation/BrandImage'
export default {
	components: { CategoryItem,BrandItem,BrandImage },
	props: {
		getCategory: {
			getCategory: Object,
			required: true,
		},
	},
	data() {
		return {
			baseUrl:Vue.config.baseUrl,
			baseUrlImage:Vue.config.baseUrlImage
		}
	},
	methods: {
		redirectTo: function(category) {
			window.location.href = this.baseUrl + 'get-product-list/'+this.$route.params.country_leng+'?grid=0&category='+category.slug;
		}
	},
	mounted(){
	}
}
</script>