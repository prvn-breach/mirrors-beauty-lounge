<template>
<div class="modal bottom fade" id="viewmobilefilter" tabindex="-1" role="dialog" aria-labelledby="viewmobilefilter"  style="z-index: 99999;">
      <div class="modal-dialog" role="document">
        <div class="modal-content dv_viewmobile_filter_content">
          <div class="modal-header dv_modal_filter_sm_txt_header">
            <h5 class="modal-title dv_modal_filter_sm_txt">Filter</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <svg style="position: absolute; top: 15px; right: 15px;" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
            </button>
          </div>
         <div class="modal-body overflow-auto" style="padding: 0 0 80px 0 !important;">
<div class="dv_accordion">

	<div class="dv_per_filter_wrapper pb-0">
		<a href="javascript:void(0);" class="border-bottom-0 dv_per_filter_toggle_a">Category <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg> </a>
		<div class="dv_per_filter_body height-auto dv_sm_filter_heading_body" style="display:none;">
			<div class="dv_filter_search_body">
				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
			</div>
			<div class="custom-control cursor-pointer custom-checkbox dv_filter_checkbox_per" v-for="(category,index) in getFilterCategories" :key="index">
				<input type="checkbox" class="custom-control-input" @click="changeFilterCategory(category,$event)" :id="'category'+index" :checked="getFilterCategoryChecked(category)">
				<label class="custom-control-label" :for="'category'+index">{{ category.name }}
					<img class="dv_filter_category_img" :src="baseUrlImage+category.icon" :alt="category.name" :title="category.name">
				</label>
			</div>
		</div>
	</div>
	
	<div class="dv_per_filter_wrapper pb-0">
		<a href="javascript:void(0);" class="border-bottom-0 dv_per_filter_toggle_a">Brands <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg> </a>
		<div class="dv_per_filter_body height-auto dv_sm_filter_heading_body" style="display:none;">
			<div class="dv_filter_search_body">
				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
			</div>
			<div class="custom-control cursor-pointer custom-checkbox dv_filter_checkbox_per" v-for="(brand,index) in getFilterBrands" :key="index">
				<input type="checkbox" class="custom-control-input" @click="changeFilterBrand(brand,$event)" :id="'brand'+index" :checked="getFilterBrandChecked(brand)">
				<label class="custom-control-label" :for="'brand'+index">{{ brand.name }}
					<img class="dv_filter_brand_img" :src="baseUrlImage+'images/brands/'+brand.image" :alt="brand.name" :title="brand.name">
				</label>
			</div>
		</div>
	</div>
    
    <div class="dv_per_filter_wrapper pb-0" v-for="(filter,index) in getFilterList" :key="index">
        <a href="javascript:void(0);" class="border-bottom-0 " :class="'dv_per_filter_toggle_a'+getStript(index)">{{ filter.name }} <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg> </a>
        <div class="dv_per_filter_body height-auto dv_sm_filter_heading_body" >
            <div class="dv_filter_search_body">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
            </div>
            <div class="custom-control cursor-pointer custom-checkbox dv_filter_checkbox_per" v-for="(option,indexD) in filter.get_options" :key="indexD">
                <input @click="changeFilterCommon(filter.slug,option,$event)" type="checkbox" class="custom-control-input" :id="'filter'+index+indexD" :checked="getFilterChecked(filter.name,option)">
                <label class="custom-control-label" :for="'filter'+index+indexD">{{ option.name }}</label>
            </div>
            
        </div>
    </div>
	
	
</div>
</div>
          <div class="modal-footer modal-footer-fixed">
            <button type="button" class="btn btn-secondary dv_reset_filter_btn" data-dismiss="modal" @click="resetAllFilters">Reset </button>
            <button type="button" class="btn btn-primary dv_apply_filter_btn" @click="getQuery">Apply </button>
          </div>
        </div>
      </div>
    </div>

					       
</template>
<script type="text/javascript">
 import Vue from 'vue'
 import { LOAD_PRODUCT_FILTER_ACTION } from '@web/store/products/actions'
 import { mapState } from 'vuex'
 export default {
 	 components: { 
 	 
    },
 	 props: {
            getProductDatas: {
                getProductDatas: Object,
                required: true,
            },
        },
 	  data() {
            return {
              baseUrl:Vue.config.baseUrl,
              baseUrlImage:Vue.config.baseUrlImage,
              getStoreFilters:{},
              getFilterList:[],
              getFilterCategories:[],
              getFilterBrands:[],
              getFilterQuery:{},
              getQueryFilter:{},
              
             
            }
        },
        
		  computed:{
	        	...mapState({
	        		getFilters: state => state.Products.getFilters
	        	}),
	      },
	     filters:{
	     	
	     },
         methods: {
         	resetAllFilters:function(){
         		let query = Object.assign({}, this.$route.query);
         		Object.keys(this.$route.query).forEach(function(key) {
         			if(key != 'perPage' && key != 'sortBy' && key != 'sortDir'){
         				delete query[key];
         			}
         		});
				this.$router.replace({ query });
				this.getProductFilter();
         	},
			resetFilter:function(name){
         		let query = Object.assign({}, this.$route.query);
         		Object.keys(this.$route.query).forEach(function(key) {
         			if(key == name){
         				delete query[key];
         			}
         		});
				this.$router.replace({ query });
				this.getProductFilter();
         	},
         	getFilterBrandChecked:function(brandObj){
         		let _this = this;
         		let getQuery = this.$route.query;
         		if(getQuery.brand != undefined && getQuery.brand != ''){
         			let brand = getQuery.brand.split(',');
         			let getBrand = brand.find(function(item){
         				return item == brandObj.slug;
         			});
         			if(getBrand != undefined ){
         				return true;
         			}else{
         				return false;
         			}
         		}
         		return false;
         	},
			getFilterCategoryChecked:function(categoryObj){
         		let _this = this;
         		let getQuery = this.$route.query;
         		if(getQuery.category != undefined && getQuery.category != ''){
         			let category = getQuery.category.split(',');
         			let getCategory = category.find(function(item){
         				return item == categoryObj.slug;
         			});
         			if(getCategory != undefined ){
         				return true;
         			}else{
         				return false;
         			}
         		}
         		return false;
         	},
         	getFilterChecked:function(filterName,option){
         		let _this = this;
         		filterName = filterName.toLowerCase(); 
         		let getQuery = this.$route.query;
         		let getCommonFilter = Object.keys(getQuery).find(function(filter){
         			return filter == filterName;
         		})
         		if(getCommonFilter != undefined){
         			let common = getQuery[filterName].split(',');
         			let getCommon = common.find(function(item){
         				return item == option.slug;
         			});
         			if(getCommon != undefined){
         				return true;
         			}else{
         				return false;
         			}
         		}
         		return false;
         	},
         	changeFilterCommon:function(filterName,option,event){
         		let _this = this;
         		filterName = filterName.toLowerCase(); 
         		let getQuery = this.$route.query;
         		let getCommonFilter = Object.keys(getQuery).find(function(filter){
         			return filter == filterName;
         		})
         		if(getCommonFilter != undefined){
         			let common = getQuery[filterName].split(',');
         			let getCommon = common.find(function(item){
         				return item == option.slug;
         			});
         			if(getCommon == undefined && event.target.checked == true){
         				common.push(option.slug);
         				getQuery[filterName] = common.join(',')
         			}else{
         				common = common.filter(function(item){
         					return item != option.slug;
         				});
         				getQuery[filterName] = common.join(',');
         			}
         		}else{
         			getQuery[filterName] = option.slug;

         		}
         		this.getQueryFilter = getQuery;
         	},
         	changeFilterBrand:function(brandObj,event){
         		let _this = this;
         		let getQuery = this.$route.query;
         		if(getQuery.brand != undefined && getQuery.brand != ''){
         			let brand = getQuery.brand.split(',');
         			let getBrand = brand.find(function(item){
         				return item == brandObj.slug;
         			});
         			if(getBrand == undefined && event.target.checked == true){
         				brand.push(brandObj.slug);
         				getQuery.brand = brand.join(',')
         			}else{
         				brand = brand.filter(function(item){
         					return item != brandObj.slug;
         				});
         				getQuery.brand = brand.join(',');
         			}
         		}else{
         			getQuery.brand = brandObj.slug;
         		}
         		this.getQueryFilter = getQuery;
         	},
			changeFilterCategory:function(categoryObj,event){
         		let _this = this;
         		let getQuery = this.$route.query;
         		if(getQuery.category != undefined && getQuery.category != ''){
         			let category = getQuery.category.split(',');
         			let getCategory = category.find(function(item){
         				return item == categoryObj.slug;
         			});
         			if(getCategory == undefined && event.target.checked == true){
         				category.push(categoryObj.slug);
         				getQuery.category = category.join(',')
         			}else{
         				category = category.filter(function(item){
         					return item != categoryObj.slug;
         				});
         				getQuery.category = category.join(',');
         			}
         		}else{
         			getQuery.category = categoryObj.slug;
         		}
         		this.getQueryFilter = getQuery;
         	},
         	getQuery:function(){
         		this.$router.replace({name: this.$route.name, query: this.getQueryFilter});
                this.getCloseFilter();
				this.getProductFilter();
         	},
         	getProductFilter:function(){
         		let _this = this;
         	// 	let getParam = this.$route.params;
         	// 	let path = getParam.country_leng;
            //    if(getParam.viewType != undefined){
            //       path +='/'+getParam.viewType;
            //    }
            //     if(getParam.viewType != undefined){
            //       path +='/'+getParam.productSlug;
            //     }
         		this.$store.dispatch('Products/' + LOAD_PRODUCT_FILTER_ACTION,{ params: this.$route.query }).then(function(){
         			_this.getStoreFilters = _this.getFilters;
                    if(_this.getFilters != null){
             			_this.getFilterList= _this.getFilters.getAttributes;
             			_this.getFilterCategories= _this.getFilters.getCategories;
             			_this.getFilterBrands= _this.getFilters.getBrands;
                    }
         		});
         	},
            getStript:function(index){
                $(document).ready(function() {
                (function ($) {
                $('a.dv_per_filter_toggle_a'+index).click( function () {
                    $(this).next().toggle('10');
                    $(this).find('svg').toggleClass('dv_per_filter_toggle_svg_90'+index);
                });
            })(jQuery);
         });
                return index;
            },
        getCloseFilter:function(){
             $(document).ready(function() {
            (function ($) {
                 $('#viewmobilefilter').modal('hide');
             })(jQuery);
         });
        }
         },
         created(){
         	this.getProductFilter();
         },
         mounted(){
         	
         }

 }
</script>