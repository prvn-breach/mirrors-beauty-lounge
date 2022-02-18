<template>
	  <div id="content" class="flex">
                <!-- ############ Main START-->
                <div class="page-container">
                    <div class="pt-3 pr-3 pb-5 pl-3">
                        <div class="mb-5">
                            <h2 class="dv_page_heading">Product Detail</h2>
                            <div class="row dv_search_delete_action_common">
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card mb-3">
                                        <div class="card-header"><strong>Basic Details</strong></div>
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize" for="name">Product name </label>
                                                <input disabled  type="text" class="form-control dv_common_input_for_all" placeholder="Enter" v-model="addProduct.name" :class="status($v.addProduct.name)" @input="setProductName($event.target.value)">
                                            </div> 
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize" for="name">Product group / Model number </label>
                                                <input disabled  type="email" class="form-control dv_common_input_for_all" placeholder="Enter"  v-model="addProduct.model_number" :class="status($v.addProduct.model_number)" @input="setProductModelNumber($event.target.value)">
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="text-muted text-capitalize" for="name">category </label>
                                                        <select disabled  class="form-control dv_common_select_for_all" @change="getChangeAttribute"  v-model="addProduct.category_id" :class="status($v.addProduct.category_id)" >
                                                            <option selected="">Select</option>
                                                            <option v-for="(category,index) in getSelectCategories" :value="category.id">{{category.name}} </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group mb-0">
                                                <label class="ui-switch ui-switch-md info m-t-xs float-left mr-3"><input disabled  @change="changeProductStatus" type="checkbox"> <i></i></label>
                                                <label class="text-muted text-capitalize" for="name">Product status </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card mb-3">
                                        <div class="card-header"><strong>Product Details</strong></div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label class="text-muted text-capitalize" for="name">Product Code</label>
                                                        <input disabled  type="text" class="form-control dv_common_input_for_all" placeholder="Enter" v-model="addProduct.product_code" :class="status($v.addProduct.product_code)" @input="setProductCode($event.target.value)">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label class="text-muted text-capitalize" for="name">Availibility </label>
                                                        <select disabled  class="form-control dv_common_select_for_all" v-model="addProduct.availibility" :class="status($v.addProduct.availibility)" @change="setProductAvailibility($event.target.value)">
                                                            <option value="">Select</option>
                                                            <option value="NA" >Not Available</option>
                                                            <option value="A" >Available</option>
                                                            <option value="DAS">Display(Available Soon)</option>
                                                            <option value="DPO" >Display(Pre-Order)</option>
                                                            <option value="U" >UpComing</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label class="text-muted text-capitalize" for="name">SKU</label>
                                                        <input disabled  type="text" class="form-control dv_common_input_for_all" placeholder="Enter" v-model="addProduct.sku" :class="status($v.addProduct.sku)" @input="setProductSku($event.target.value)">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label class="text-muted text-capitalize" for="name">UPC / Barcode</label>
                                                        <input disabled  type="text" class="form-control dv_common_input_for_all" placeholder="Enter" v-model="addProduct.barcode" :class="status($v.addProduct.barcode)" @input="setProductBarcode($event.target.value)">
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label class="text-muted text-capitalize" for="name">Brand </label>
                                                        <select disabled  class="form-control dv_common_select_for_all" v-model="addProduct.brand" :class="status($v.addProduct.brand)">
                                                            <option :value="getBrand.id" v-for="(getBrand,index) in getBrands">{{getBrand.name}} </option>
                                                            
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label class="text-muted text-capitalize" for="name">UPC</label>
                                                        <input disabled  type="text" class="form-control dv_common_input_for_all" placeholder="Enter" v-model="addProduct.upc">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label class="text-muted text-capitalize" for="name">Active </label>
                                                        <select disabled  class="form-control dv_common_select_for_all" v-model="addProduct.active">
                                                            <option value="Y">Yes </option>
                                                            <option value="N">No </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card mb-3">
                                        <div class="card-header"><strong>Product Prices</strong></div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label class="text-muted text-capitalize" for="name">Sale Price</label>
                                                        <input disabled  type="text" class="form-control dv_common_input_for_all" placeholder="Enter" v-model="addProduct.sale_price" :class="status($v.addProduct.sale_price)"  @input="setProductSalePrice($event.target.value)">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label class="text-muted text-capitalize" for="name">Discount Price </label>
                                                        <input disabled  type="text" class="form-control dv_common_input_for_all" placeholder="Enter" v-model="addProduct.discount_price" @focusout="getCulcDiscountPrice">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label class="text-muted text-capitalize" for="name">Discount % </label>
                                                        <input disabled  type="text" class="form-control dv_common_input_for_all" placeholder="Enter" v-model="addProduct.discount" @focusout="getCulcDiscount">
                                                    </div>
                                                </div>
                                               
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card mb-3">
                                        <div class="card-header"><strong>Other Details </strong></div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label class="text-muted text-capitalize w-100" for="name">Is Exclusive Deal Product </label>
                                                        <label class="ui-switch ui-switch-md info m-t-xs"><input disabled  type="checkbox" @change="changeIsExclusiveDeal"> <i></i></label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label class="text-muted text-capitalize w-100" for="name">Is Featured? </label>
                                                        <label class="ui-switch ui-switch-md info m-t-xs"><input disabled   type="checkbox"  @change="changeIsFeature"> <i></i></label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label class="text-muted text-capitalize w-100" for="name">Is New? </label>
                                                        <label class="ui-switch ui-switch-md info m-t-xs"><input disabled  type="checkbox"  @change="changeIsNew"> <i></i></label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label class="text-muted text-capitalize w-100" for="name">Is Authorised Dealer </label>
                                                        <label class="ui-switch ui-switch-md info m-t-xs"><input disabled   type="checkbox"  @change="changeIsAuthorisedDealer"> <i></i></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                   <Attribute :categoryId="categoryId" @getAttributeOption="getAttributeOption" :getProduct="getProduct"></Attribute>

                                    <div class="card mb-3">
                                        <div class="card-header"><strong>Specification </strong></div>
                                        <div class="card-body p-0">
                                            <table class="table table-theme table-row v-middle">
                                                <thead>
                                                    <tr>
                                                        <th style="width: 10%; text-align: center;">sr no</th>
                                                        <th style="width: 40%;">specification name </th>
                                                        <th style="width: 40%;">specification Value </th>
                                                        <th style="width: 10%;">action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                   
                                                    <tr v-for="(spc,index) in addProduct.specification">
                                                        <td style="text-align: center;">
                                                           {{(index+1)}}
                                                        </td>
                                                        <td><input disabled  type="text" class="form-control dv_common_input_for_all" placeholder="Enter" v-model="spc.name.data" :class="spc.name.class"></td>
                                                        <td><input disabled  type="text" class="form-control dv_common_input_for_all" placeholder="Enter" v-model="spc.value.data" :class="spc.value.class"></td>
                                                        <td  v-if="(addProduct.specification.length-1) ==  index">
                                                        	  <svg @click="addSpecification(index)" data-toggle="tooltip" data-placement="top" data-original-title="Add New" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="dv_row_action_drp_svg_eye"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                                                          
                                                        </td>
                                                        <td v-else>
                                                            <svg @click="deleteSpecification(index,spc)" data-toggle="tooltip" data-placement="top" data-original-title="Delete Specification" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-danger dv_row_action_drp_svg_eye"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <div class="card mb-3">
                                        <div class="card-header"><strong>Other Description </strong></div>
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize" for="name">Product Description  </label>
                                                <vue-editor disabled v-model="addProduct.other_description"></vue-editor>
                                               
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card mb-3">
                                        <div class="card-header"><strong>Other details </strong></div>
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize" for="name">Warranty </label>
                                                <input disabled  type="text" class="form-control dv_common_input_for_all" placeholder="Enter" v-model="addProduct.warranty">
                                            </div>
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize" for="name">Delivery </label>
                                                <input disabled  type="text" class="form-control dv_common_input_for_all" placeholder="Enter" v-model="addProduct.delivery">
                                            </div>
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize" for="name">Select tags </label>
                                                <b-form-tags disabled input-id="tags-basic"  v-model="addProduct.tags"></b-form-tags>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="card mb-3">
                                        <div class="card-header"><strong>Media </strong></div>
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize" for="name">Images </label>
                                                <input disabled  type="file" class="form-control dv_common_input_for_all" multiple="" @change="onFileChange">
                                            </div>
                                            <ul class="dv_varient_product_images_ul">
                                                <li v-for="(preview,index) in getProductImagePreview"><img :src="preview.image"  class="dv_added_img_varient"></li>
                                             
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="card mb-3">
                                        <div class="card-header"><strong>SEO Details</strong></div>
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize" for="name">SEO Title</label>
                                                <input disabled  type="text" class="form-control dv_common_input_for_all" placeholder="Enter" v-model="addProduct.seo_title">
                                            </div>
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize" for="name">SEO keywords </label>
                                                <input disabled  type="text" class="form-control dv_common_input_for_all" placeholder="Enter" v-model="addProduct.seo_keyword">
                                            </div>
                                            <div class="form-group m-0">
                                                <label class="text-muted text-capitalize" for="name">Description </label>
                                                <textarea disabled class="form-control dv_common_textarea_for_all" rows="6" style="resize: none;" placeholder="Enter" v-model="addProduct.description"></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    
                                </div>

                                <div class="col-md-12 text-center">
                                    <button type="button" class="btn btn-default text-muted dv_cancel_submit_btn" @click="$router.push({ name: 'getBestSellers' });">Back</button>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
                <!-- ############ Main END-->
            </div>
</template>
<script>
    import Vue from 'vue'
     import { required, minLength,decimal } from 'vuelidate/lib/validators'
    import Attribute from '@admin/components/products/Attribute'
    import { LOAD_SELECT_CATEGORY_LIST_ACTION,ADD_PRODUCT_ACTION,LOAD_SELECT_BRAND_LIST_ACTION,LOAD_GET_PRODUCT_ACTION,DELETE_SPECIFICATION_PRODUCT_ACTION,DELETE_PRODUCT_IMAGE_ACTION } from '@admin/store/products/actions'
    import { mapState } from 'vuex'
     import { VueEditor } from "vue2-editor";
    export default {
        data() {
            return {
              baseUrl:Vue.config.baseurl,
              baseUrlImage:Vue.config.baseUrlImage,
              categoryId:'',
              addProduct:{
              	id:'',
              	name:'',
              	sale_price:'',
              	discount_price:'',
              	discount:'',
              	tags:[],
              	model_number:'',
              	category_id:'',
              	status:'I',
              	product_code:'',
              	availibility:'',
              	sku:'',
              	barcode:'',
              	brand:'',
              	upc:'',
              	active:'Y',
              	is_exclusive_deal:0,
              	is_feature:0,
              	is_new:0,
              	is_authorised_dealer:0,
              	attributes:[],
              	specification:[{
              		id:'',
              		name:{data:'',class:''},
              		value:{data:'',class:''}
              	}],
              	warranty:'',
              	delivery:'',
              	images:[],
              	seo_title:'',
              	seo_keyword:'',
              	description:'',
              	other_description:'',

              },
              getProductImagePreview:[],
              
             
            }
        },
        computed:{
                ...mapState({
                getError: state => state.getProduct.getError,
                getSelectCategories: state => state.getProduct.getSelectCategories,
                getBrands: state => state.getProduct.getBrands,
                getProduct: state => state.getProduct.getProduct,
              
            }),
            },
        components: {Attribute,VueEditor},
        validations: {
            addProduct:{
                name: {
                    required
                },  
                model_number: {
                    required
                },
                product_code:{
                    required
                },
                sku:{
                    required
                },  
                barcode:{
                    required
                },  
                category_id:{
                    required
                }, 
                availibility:{
                    required
                }, 
                sale_price:{
                    required,
                    decimal
                }, 
                
            },
        },
         methods: {
              allowAction:function(action){
                let _this = this;
                let getObjectLength = (Object.keys(_this.addProduct).length > 0 && _this.addProduct.id > 0);
                    switch(action){
                        case 0:
                           return (!getObjectLength)?true:false;
                        break;
                        case 1:
                        return (getObjectLength)?true:false;
                        break;
                        case 2:
                            return (getObjectLength)?true:false;
                        break;
                        default:
                        return false;
                        break;
                    }
              },
         	getCulcDiscount:function(){
        		let _this = this;
        		if(_this.addProduct.discount != '' && _this.addProduct.discount > 0 && _this.addProduct.sale_price > 0){
        			_this.addProduct.discount_price = parseFloat(parseFloat(_this.addProduct.sale_price)-(parseFloat(_this.addProduct.sale_price) * (parseFloat(_this.addProduct.discount) / 100))).toFixed(2); 
        		}
	        	},
	        	getCulcDiscountPrice:function(){
	        		let _this = this;
	        		if(_this.addProduct.discount_price != '' && _this.addProduct.discount_price > 0 && _this.addProduct.sale_price > 0){
	        			_this.addProduct.discount = 100-parseFloat((((parseFloat(_this.addProduct.discount_price))*100) / parseFloat(_this.addProduct.sale_price))).toFixed(2);
	        		}
	        	},
         		status(validation) {
         		if(validation != undefined){

	                return {
	                error: validation.$error,
	                dirty: validation.$dirty
	              }
         		}
            },
            setProductTags:function(){
                let _this = this;
                let params = this.$route.params;
                if (params.product_id != undefined) {
                }else{
                	_this.addProduct.tagsArray.map(function(item){
                		_this.addProduct.tags.push({
                			'id':'',
                			'name':item,
                		})
                	})
                   
                }
                 return true;
            },
            setProductSalePrice:function(value){
                 this.addProduct.sale_price = value
                this.$v.addProduct.sale_price.$touch()
            },
            setProductName:function(value){
                 this.addProduct.name = value
                this.$v.addProduct.name.$touch()
            },
            setProductModelNumber:function(value){
                 this.addProduct.model_number = value
                this.$v.addProduct.model_number.$touch()
            },
            setProductCode:function(value){
                 this.addProduct.product_code = value
                this.$v.addProduct.product_code.$touch()
            },
            setProductSku:function(value){
                 this.addProduct.sku = value
                this.$v.addProduct.sku.$touch()
            },
            setProductBarcode:function(value){
                 this.addProduct.barcode = value
                this.$v.addProduct.barcode.$touch()
            },
          setProductAvailibility:function(value){
                 this.addProduct.availibility = value
                this.$v.addProduct.availibility.$touch()
            },

	         	submitProduct:function(action){
	         		 let _this = this;
	                _this.$v.addProduct.$touch()
                    _this.addProduct.action = action
	                if (_this.$v.addProduct.$invalid) {
	                   
	                  } else {
                        
    	                     _this.$store.dispatch('getProduct/' + ADD_PRODUCT_ACTION,_this.addProduct).then(function(e){
                                _this.$router.push({ name: 'getProducts' });
                            });
                       
	                  }
	         	},
         		deleteImage:function(preview,index){
                   let _this = this;
         			this.getProductImagePreview.splice(index, 1);
                    if(preview.id == null || preview.id == null || preview.id == ''){
         			    _this.addProduct.images.splice(index, 1)
                    }else{
                         _this.$store.dispatch('getProduct/' + DELETE_PRODUCT_IMAGE_ACTION,preview.id).then(function(e){
                            
                      });
                    }
         		},
	         	onFileChange(event){
	         		let _this = this;
	                const file = event.target.files;
	              Array.from(file).map(function(item){
	              	_this.getProductImagePreview.push({id:'',image: URL.createObjectURL(item)});
	              	_this.getConvertBase64Image(item);
	              	
	              })
	                 
	               
	            },
	            getConvertBase64Image:function(image){
	            	let _this = this;
	            	  var reader = new FileReader()
		              reader.readAsDataURL(image)
		              reader.onload = (e) => {
		                _this.addProduct.images.push({id:null,image:reader.result})
		              }
		              reader.onerror = function (error) {
		                console.log('Error: ', error)
		                }
                     console.log(_this.addProduct)
		                
	            },
         		deleteSpecification:function(index,spc){
                    let _this = this;
                    if(spc.id != null && spc.id > 0){
                          _this.$store.dispatch('getProduct/' + DELETE_SPECIFICATION_PRODUCT_ACTION,spc.id).then(function(e){});
                    }
         			this.addProduct.specification.splice(index, 1);
         		},
         		addSpecification:function(index){
                let _this = this;
               	this.addProduct.specification.map(function(item,indexD){
               		if(item.name.data == '' && indexD == index){
               			item.name.class="error";
               		}else if(item.name.data != '' && indexD == index){
               			item.name.class="";
               		}
               		if(item.value.data == '' && indexD == index){
               			item.value.class="error";
               		}else if(item.value.data != '' && indexD == index){
               			item.value.class="";
               		}
               	});
               	let getName = this.addProduct.specification.filter(function(item,indexD){
               		return item.name.data != '' &&  item.value.data != '' && indexD == index;
               	});
               	
               	if(getName.length > 0){
	                _this.addProduct.specification.push({
	                	id:'',
	              		name:{data:'',class:''},
	              		value:{data:'',class:''}
	              	})
               	}
               


                 
            },
         		changeIsAuthorisedDealer:function(event){
         			let _this = this;
	         		if(event.target.checked == true){
	         			_this.addProduct.is_authorised_dealer = 1;
	         		}else{
	         			_this.addProduct.is_authorised_dealer = 0;
	         		}
         		},
         		changeIsNew:function(event){
         			let _this = this;
	         		if(event.target.checked == true){
	         			_this.addProduct.is_new = 1;
	         		}else{
	         			_this.addProduct.is_new = 0;
	         		}
         		},
         		changeIsFeature:function(event){
         			let _this = this;
	         		if(event.target.checked == true){
	         			_this.addProduct.is_feature = 1;
	         		}else{
	         			_this.addProduct.is_feature = 0;
	         		}
         		},
         		changeIsExclusiveDeal:function(event){
         			let _this = this;
	         		if(event.target.checked == true){
	         			_this.addProduct.is_exclusive_deal = 1;
	         		}else{
	         			_this.addProduct.is_feature = 0;
	         		}
         		},
	         	changeProductStatus:function(event){
	         		let _this = this;
	         		if(event.target.checked == true){
	         			_this.addProduct.status = 'A';
	         		}else{
	         			_this.addProduct.status = 'I';
	         		}
	         	},
         		getAttributeOption:function(getAttributes){
         			
         			this.addProduct.attributes = getAttributes;
         		},
               getCategoriesFunc:function(){
                let _this = this;
                let params = this.$route.params;
                  this.$store.dispatch('getProduct/' + LOAD_SELECT_CATEGORY_LIST_ACTION).then(function(e){
                  		let getCategory = _this.getSelectCategories[0];
                  		_this.categoryId = getCategory.id;
                  });
                   if (params.product_id != undefined) {
                     _this.$store.dispatch('getProduct/' + LOAD_GET_PRODUCT_ACTION,params.product_id).then(function(e){
                        _this.addProduct = _this.getProduct;
                        _this.getProductImagePreview = _this.getProduct.imagePreview;
                        _this.categoryId = _this.getProduct.category_id;
                         _this.getBrandListByCategory();
                     });
                 }

                  
            },
            getBrandListByCategory:function(){
            	let _this = this;
                
            	if(_this.categoryId != ''){
	                  _this.$store.dispatch('getProduct/' + LOAD_SELECT_BRAND_LIST_ACTION,_this.categoryId).then(function(e){
	                  		
	                  });
            	}
            },
            getChangeAttribute:function(event){
            	let id = event.target.value;
                let _this = this;
                let params = _this.$route.params;
                if (params.product_id != undefined) {
                   let getCategoryAttribute = _this.addProduct.attributes.filter(function(item){return item.category_id == id});
                    if(getCategoryAttribute.length > 0){
                         _this.categoryId = id;
                        
                    }else{
                        if(_this.addProduct.attributes.length == 0){
                              _this.categoryId = id;
                            
                        }else{
                            _this.addProduct.category_id = _this.categoryId;
                            alert('please uncheck all attribute after you can change category');

                        }
                        
                    }
                }else{
                    _this.categoryId = id;
                   
                }
                _this.getBrandListByCategory();
                
            	
            	
            }
        },
        created: function(){
             this.getCategoriesFunc();
             //$(".dv_common_textarea_taginput").tagsinput();
      },
    }
</script>