<template>
	<div class="dv_filter_wrapper">
		<h4>
			filter
			<span class="dv_clear_all_filter_based" @click="resetAllFilters">
				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
				Reset all
			</span>
		</h4>
		<div class="dv_accordion">
			<div class="dv_per_filter_wrapper">
				<a href="javascript:void(0);">Category <span class="dv_viewall_filter_based"  @click="resetFilter('category')">Reset </span> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg> </a>
				<div class="dv_per_filter_body">
					<div class="dv_filter_search_body">
						<input type="text" name="" class="form-control dv_search_filter_type" placeholder="search">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
					</div>
					<div class="custom-control cursor-pointer custom-checkbox dv_filter_checkbox_per" v-for="(category,index) in getFilterCategories" :key="index">
						<input type="checkbox" class="custom-control-input w-100" :id="'category'+index" @click="changeFilterCategory(category,$event)" :checked="getFilterCategoryChecked(category)">
						<label class="custom-control-label" :for="'category'+index">{{ category.name }} </label>
					</div>
					<!-- <div class="custom-control cursor-pointer custom-checkbox dv_filter_checkbox_per" v-for="(sub_category,index) in getFilterSubCategories" :key="getFilterCategories.length + index">
						<input type="checkbox" class="custom-control-input w-100" :id="'category'+index" @click="changeFilterCategory(sub_category,$event)" :checked="getFilterCategoryChecked(category)">
						<label class="custom-control-label" :for="'category'+index">{{ category.name }} </label>
					</div> -->
				</div>
			</div>
			<div class="dv_per_filter_wrapper">
				<a href="javascript:void(0);">Sub Category <span class="dv_viewall_filter_based"  @click="resetFilter('sub_category')">Reset </span> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg> </a>
				<div class="dv_per_filter_body">
					<div class="dv_filter_search_body">
						<input type="text" name="" class="form-control dv_search_filter_type" placeholder="search">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
					</div>
					<div class="custom-control cursor-pointer custom-checkbox dv_filter_checkbox_per" v-for="(sub_category,index) in getFilterSubCategories" :key="index">
						<input type="checkbox" class="custom-control-input w-100" :id="'category'+index" @click="changeFilterSubCategory(sub_category,$event)" :checked="getFilterSubCategoryChecked(sub_category)">
						<label class="custom-control-label" :for="'category'+index">{{ sub_category.name }} </label>
					</div>
				</div>
			</div>
			<div class="dv_per_filter_wrapper">
				<a href="javascript:void(0);">Brands <span class="dv_viewall_filter_based"  @click="resetFilter('brand')">Reset </span> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg> </a>
				<div class="dv_per_filter_body">
					<div class="dv_filter_search_body">
						<input type="text" name="" class="form-control dv_search_filter_type" placeholder="search">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
					</div>
					<div class="custom-control cursor-pointer custom-checkbox dv_filter_checkbox_per" v-for="(brand,index) in getFilterBrands" :key="index">
						<input type="checkbox" class="custom-control-input w-100" @click="changeFilterBrand(brand,$event)" :id="'brand'+index" :checked="getFilterBrandChecked(brand)">
						<label class="custom-control-label" :for="'brand'+index">{{ brand.name }}
							<img class="dv_filter_brand_img" :src="baseUrlImage+'images/brands/'+brand.image" :alt="brand.name" :title="brand.name">
						</label>
					</div>
					
				</div>
			</div>
			
			<div class="dv_per_filter_wrapper" v-for="(filter,index) in getFilterList" :key="index">
				<a href="javascript:void(0);">{{ filter.name }} <span class="dv_viewall_filter_based"  @click="resetFilter(filter.slug)">Reset </span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg> </a>
				<div class="dv_per_filter_body" >
					<div class="custom-control cursor-pointer custom-checkbox dv_filter_checkbox_per" v-for="(option,indexD) in filter.get_options" :key="indexD">
						<input @click="changeFilterCommon(filter.slug,option,$event)" type="checkbox" class="custom-control-input w-100" :id="'filter'+index+indexD" :checked="getFilterChecked(filter.name,option)">
						<label class="custom-control-label" :for="'filter'+index+indexD">{{ option.name }}</label>
					</div>
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
              getFilterSubCategories:[],
              getFilterBrands:[],
              getFilterQuery:{}
              
             
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
			getFilterSubCategoryChecked:function(subCategoryObj){
         		let _this = this;
         		let getQuery = this.$route.query;
         		if(getQuery.sub_category != undefined && getQuery.sub_category != ''){
         			let sub_category = getQuery.sub_category.split(',');
         			let getSubCategory = sub_category.find(function(item){
         				return item == subCategoryObj.slug;
         			});
         			if(getSubCategory != undefined ){
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
         		this.getQuery(getQuery);
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
         		this.getQuery(getQuery);
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
         		this.getQuery(getQuery);
         	},
			changeFilterSubCategory:function(subCategoryObj,event){
         		let _this = this;
         		let getQuery = this.$route.query;
         		if(getQuery.sub_category != undefined && getQuery.sub_category != ''){
         			let sub_category = getQuery.sub_category.split(',');
         			let getSubCategory = sub_category.find(function(item){
         				return item == subCategoryObj.slug;
         			});
         			if(getSubCategory == undefined && event.target.checked == true){
         				sub_category.push(subCategoryObj.slug);
         				getQuery.sub_category = sub_category.join(',')
         			}else{
         				sub_category = sub_category.filter(function(item){
         					return item != subCategoryObj.slug;
         				});
         				getQuery.sub_category = sub_category.join(',');
         			}
         		}else{
         			getQuery.sub_category = subCategoryObj.slug;
         		}
         		this.getQuery(getQuery);
         	},
         	getQuery:function(getQuery){
         		this.$router.replace({name: this.$route.name, query: getQuery});
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
         		this.$store.dispatch('Products/' + LOAD_PRODUCT_FILTER_ACTION, { params: this.$route.query }).then(function(){
         			_this.getStoreFilters = _this.getFilters;
         			_this.getFilterList= _this.getFilters.getAttributes;
         			_this.getFilterCategories= _this.getFilters.getCategories;
         			_this.getFilterSubCategories= _this.getFilters.getSubCategories;
         			_this.getFilterBrands= _this.getFilters.getBrands;
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
<style>
.custom-control-input {
	z-index: 1 !important;
}
</style>