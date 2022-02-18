<template>
	<div class="dv_mobile_category">
		<h4> Category </h4>
		<div class="dv_mobile_category_inner">
			<div class="dv_per_category_wrap_per pb-0" v-for="(getCategory, index) in getCategories" v-bind:key="getCategory.id">
				<a href="javascript:void(0);" :class="'border-bottom-0 dv_per_category_toggle_a category_toggle_'+index"><div class="d-inline m-0 p-0" @click="redirectTo(getCategory);">{{getCategory.name}}</div> <span>{{ getCategory.get_product_with_parent_category_count }}</span> <svg @click="categoryToggle(index);" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg> </a>
				<div class="dv_sm_category_dropdwn">
					<div class="dv_category_head_link_wrap">
						<h4>shop by category </h4>
						<ul>
							
							<child-category v-for="getItem in getCategory.get_sub_categories" v-bind:getItem="getItem" v-bind:key="getItem.id" @redirectTo="redirectTo"></child-category>
							
						</ul>
					</div>
					
				</div>
			</div>
			
		</div>
	</div>
</template>
<script type="text/javascript">
 import Vue from 'vue'
 import { mapState } from 'vuex'
 import ChildCategory from '@web/components/mobile/ChildCategory.vue'
 import $ from "jquery";
 export default {
 	 components: { ChildCategory },
 	  data() {
            return {
              baseUrl:Vue.config.baseUrl,
              baseUrlImage:Vue.config.baseUrlImage
            }
        },
        watch: {
            '$route': function(to, from) {
            let _this = this;
            
              this.getStript();
            }
          },
        computed:{
	        	...mapState({
	            getCategories: state => state.Categories.getCategories,
	            getBrands:state => state.Brand.getBrands,
	        }),
	        },
         methods: {
			 redirectTo: function(category) {
				window.location.href = this.baseUrl + 'get-product-list/ae-en?'+'grid=0&category='+category.slug;
			},

			categoryToggle: function(index) {
				$('a.category_toggle_'+index).next().toggle();
				$('a.category_toggle_'+index).find('svg').toggleClass('dv_per_filter_toggle_svg_90');
			},
         
         	getStript:function(){
        //  		$(document).ready(function() {
        //  		(function ($) {
        //  		$('a.dv_per_category_toggle_a').click( function () {
		// 		    $(this).next().toggle();
		// 		    $(this).find('svg').toggleClass('dv_per_filter_toggle_svg_90');
		// 		});
        //  	})(jQuery);
        //  });
         	},
         },
         created(){
         	this.getStript();
         },
         mounted(){
         	
         }

 }
</script>