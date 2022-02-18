<template>
	<div id="content" class="flex">
                <!-- ############ Main START-->
                <div class="page-container">
                    <div class="pt-3 pr-3 pb-5 pl-3">
                        <div class="mb-5">
                            <h2 class="dv_page_heading">Add Brand </h2>
                            <div class="row dv_search_delete_action_common">
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card mb-3">
                                        <div class="card-header"><strong>Basic Details</strong></div>
                                        
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize"  for="name">brand name</label>
                                                <input type="text" class="form-control dv_common_input_for_all" v-model="addBrand.name" placeholder="Enter" :class="status($v.addBrand.name)" @input="setBrandName($event.target.value)" @focusout="getSlug"/>
                                            </div>
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize" for="name">Slug </label>
                                                <input type="email" class="form-control dv_common_input_for_all" placeholder="Enter" v-model="addBrand.slug" :class="status($v.addBrand.slug)" @input="setBrandPermalink($event.target.value)" readonly="">
                                                <span class="d-block text-danger font-weight-bold" v-if="getError.hasOwnProperty('slug')">{{getError.slug[0]}} </span>
                                            </div>
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize"  for="name">supplier name</label>
                                                <input type="text" class="form-control dv_common_input_for_all" v-model="addBrand.supplier_name" placeholder="Enter" :class="status($v.addBrand.supplier_name)" @input="setSupplierName($event.target.value)"/>
                                            </div>
                                             <div class="form-group">
                                                <label class="text-muted text-capitalize" for="name">Select Category  </label>
                                                <select data-plugin="select2" class="form-control select2-single" v-model="addBrand.category_id" :class="status($v.addBrand.category_id)" @input="setCategoryId($event.target.value)" @change="resetSubCategories(); getSubCategories();">
                                                    <option value="">Select Category </option>
                                                    <option v-for="(category,index) in categories" :value="category.id" :key="index">{{category.name}} </option>
                                                </select>
                                            </div>
                                            <div class="form-group" v-if="addBrand.category_id">
                                                <label class="text-muted text-capitalize" for="name">Select Sub Category </label>
                                                <select data-plugin="select2" class="form-control select2-single" v-model="addBrand.sub_category_id" name="sub_category_id">
                                                    <option value="">Select Sub Category </option>
                                                    <option v-for="(sub_category,index) in subCategories" :value="sub_category.id" :key="index">{{sub_category.name}} </option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize" for="name">page title </label>
                                                <input type="email" class="form-control dv_common_input_for_all" placeholder="Enter" v-model="addBrand.pageTitle" :class="status($v.addBrand.pageTitle)" @input="setBrandPageTitle($event.target.value)">
                                            </div>
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize" for="name">Brand image </label>
                                                <input type="file" class="form-control dv_common_input_for_all" placeholder="Enter" @change="onFileChange">
                                                <div class="mt-1">
                                                    <span class="font-weight-bold mr-2 " v-if="getBrandImagePreview.size">Size : {{ getBrandImagePreview.size }}</span>
                                                    <span class="font-weight-bold mr-2" v-if="getBrandImagePreview.format">Dimensions : {{ getBrandImagePreview.dimensions }}</span>
                                                    <span class="font-weight-bold" v-if="getBrandImagePreview.format">Format : {{ getBrandImagePreview.format }}</span>
                                                </div>
                                                <img v-if="getBrandImagePreview.image" :src="getBrandImagePreview.image" id="brand_img">
                                                <span class="d-block text-danger font-weight-bold" v-if="getError" v-for="(image,index) in getError.image" :key="index">{{image}} </span>
                                            </div>
                                            <div class="form-group m-0">
                                                <label class="text-muted text-capitalize" for="name">page content </label>
                                               
                                                <vue-editor v-model="addBrand.content" class=" "></vue-editor>
                                            </div>
                                            <div class="form-group">
                                                <label class="ui-switch ui-switch-md info m-t-xs float-left mr-3"><input :checked="addBrand.status=='A'" type="checkbox"  @change="getChangeStatus"> <i></i></label>
                                                <label class="text-muted text-capitalize" for="name">status </label>
                                            </div>
                                            <div class="form-group mb-0">
                                                <label class="ui-switch ui-switch-md info m-t-xs float-left mr-3"><input :checked="addBrand.isAuth==1"  type="checkbox"  @change="getChangeAuth"> <i></i></label>
                                                <label class="text-muted text-capitalize" for="name">Is Authorised Dealer </label>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div class="card mb-3">
                                        <div class="card-header"><strong>Category mapping</strong></div>
                                        <div class="card-body">
                                            <div class="form-group mb-0">
                                                <label class="text-muted text-capitalize" for="name">category </label>
                                                <select id="select2-single" data-plugin="select2" class="form-control" multiple="">
                                                    <optgroup label="Alaskan/Hawaiian Time Zone"><option value="AK">Alaska</option><option value="HI" disabled="disabled">Hawaii</option></optgroup>
                                                    <optgroup label="Pacific Time Zone"><option value="CA">California</option><option value="NV">Nevada</option><option value="OR">Oregon</option><option value="WA">Washington</option></optgroup>
                                                    <optgroup label="Mountain Time Zone">
                                                        <option value="AZ">Arizona</option><option value="CO">Colorado</option><option value="ID">Idaho</option><option value="MT">Montana</option><option value="NE">Nebraska</option><option value="NM">New Mexico</option>
                                                        <option value="ND">North Dakota</option><option value="UT">Utah</option><option value="WY">Wyoming</option>
                                                    </optgroup>
                                                    <optgroup label="Central Time Zone">
                                                        <option value="AL">Alabama</option><option value="AR">Arkansas</option><option value="IL">Illinois</option><option value="IA">Iowa</option><option value="KS">Kansas</option><option value="KY">Kentucky</option>
                                                        <option value="LA">Louisiana</option><option value="MN">Minnesota</option><option value="MS">Mississippi</option><option value="MO">Missouri</option><option value="OK">Oklahoma</option><option value="SD">South Dakota</option>
                                                        <option value="TX">Texas</option><option value="TN">Tennessee</option><option value="WI">Wisconsin</option>
                                                    </optgroup>
                                                    <optgroup label="Eastern Time Zone">
                                                        <option value="CT">Connecticut</option><option value="DE">Delaware</option><option value="FL">Florida</option><option value="GA">Georgia</option><option value="IN">Indiana</option><option value="ME">Maine</option>
                                                        <option value="MD">Maryland</option><option value="MA">Massachusetts</option><option value="MI">Michigan</option><option value="NH">New Hampshire</option><option value="NJ">New Jersey</option><option value="NY">New York</option>
                                                        <option value="NC">North Carolina</option><option value="OH">Ohio</option><option value="PA">Pennsylvania</option><option value="RI">Rhode Island</option><option value="SC">South Carolina</option><option value="VT">Vermont</option>
                                                        <option value="VA">Virginia</option><option value="WV">West Virginia</option>
                                                    </optgroup>
                                                </select>
                                            </div>
                                        </div>
                                    </div> -->
                                    <div class="card mb-3">
                                        <div class="card-header"><strong>SEO Details</strong></div>
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize" for="name">SEO Title</label>
                                                <input type="email" class="form-control dv_common_input_for_all" placeholder="Enter" v-model="addBrand.seoTitle">
                                            </div>
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize" for="name">SEO keywords </label>
                                                <input type="email" class="form-control dv_common_input_for_all" placeholder="Enter" v-model="addBrand.seoKeywords">
                                            </div>
                                            <div class="form-group m-0">
                                                <label class="text-muted text-capitalize" for="name">Description </label>
                                                <textarea class="form-control dv_common_textarea_for_all" rows="6" style="resize: none;" placeholder="Enter" v-model="addBrand.seoDescription"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 text-center">
                                    <button type="button" class="btn btn-default text-muted dv_cancel_submit_btn" @click="$router.push({ name: 'brandList' });">cancel</button>
                                    <button type="button" class="btn btn-default dv_save_submit_btn" @click="saveBrand">save </button>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
                <!-- ############ Main END-->
            </div>
</template>

<script type="text/javascript">
import Vue from 'vue'
import { required, minLength } from 'vuelidate/lib/validators'
import { GET_CATEGORIES_ACTION } from '@admin/store/categories/actions'
import { GET_SUBCATEGORIES_ACTION } from '@admin/store/sub-categories/actions'
import { ADD_BRAND_ACTION,LOAD_GET_BRAND_ACTION } from '@admin/store/brands/actions'
import { VueEditor } from "vue2-editor";
import { mapState } from 'vuex'
export default {
    components: { VueEditor},
      data() {
        return {
            baseUrl:Vue.config.baseUrl,
            baseUrlImage:Vue.config.baseUrlImage,
            addBrand:{
                id:'',
                name:'',
                supplier_name: '',
                slug:'',
                pageTitle:'',
                category_id:'',
                sub_category_id:'',
                content:'',
                status:'A',
                isAuth:0,
                seoTitle:'',
                seoKeywords:'',
                seoDescription:'',
                image:[]
            },
            errors: '',
            getBrandImagePreview:{
                image: '',
                size: '',
                format: '',
                dimensions: ''
            },
        }
    },
    validations: {
        addBrand:{
            name: {
                required
            },
            supplier_name: {
                required
            },
            slug:{
                required
            },
            pageTitle:{
                required
            },
            category_id:{
                required
            }
        },
    },
    computed:{
        ...mapState({
            getError: state => state.getBrand.getError,
            getBrand: state => state.getBrand.getBrand,
            categories: state => state.getCategory.getCategories,
            subCategories: state => state.getSubCategory.getSubCategories
        }),
    },
    methods: {
        getSlug:function(event){
            let name = event.target.value;
            this.addBrand.slug = name.replace(/\s+/g, '-').toLowerCase();
        },
        onFileChange(event){
            const file = event.target.files[0];
            this.getBrandImagePreview.size = file.size/1000;
            this.getBrandImagePreview.format = file.type;
            this.getBrandImagePreview.image = URL.createObjectURL(file);
            var img = new Image();
            img.src = URL.createObjectURL(file);
            let _this = this;
            img.onload = function () { 
                _this.getBrandImagePreview.dimensions = this.width + 'x' +this.height; 
            };
            this.addBrand.image = event.target.files[0];
        },
        getChangeAuth:function(event){
            let _this = this;
            if(event.target.checked == true){
                _this.addBrand.isAuth = 1; 
            }else{
                _this.addBrand.isAuth = 0; 

            }
        }, 
        getChangeStatus:function(event){
            let _this = this;
            if(event.target.checked == true){
                _this.addBrand.status = 'A'; 
            }else{
                _this.addBrand.status = 'I'; 

            }
        },
        saveBrand:function(){
            let _this = this;
            this.errors = '';
            _this.$v.addBrand.$touch()
            if (!_this.$v.addBrand.$invalid) {
                this.loaderModal('show');
                let data = new FormData();
                data.append('id', _this.addBrand.id); 
                data.append('image', _this.addBrand.image); 
                data.append('isAuth', _this.addBrand.isAuth); 
                data.append('name', _this.addBrand.name); 
                data.append('supplier_name', _this.addBrand.supplier_name); 
                data.append('pageTitle', _this.addBrand.pageTitle); 
                data.append('seoDescription', _this.addBrand.seoDescription); 
                data.append('seoKeywords', _this.addBrand.seoKeywords); 
                data.append('seoTitle', _this.addBrand.seoTitle); 
                data.append('slug', _this.addBrand.slug); 
                data.append('status', _this.addBrand.status); 
                data.append('content', _this.addBrand.content); 
                data.append('category_id', _this.addBrand.category_id); 
                data.append('sub_category_id', _this.addBrand.sub_category_id); 
                data.append('created_by', this.$admin['id']); 
                _this.$store.dispatch('getBrand/' + ADD_BRAND_ACTION,data).then((e) => {
                    this.loaderModal('hide');
                    if (Object.keys(this.getError).length == 0) {
                        this.$router.push({ name: 'brandList' });
                    }
                }).catch(() => {
                    this.loaderModal('hide');
                });
            }
        },
        status(validation) {
            return {
                error: validation.$error,
                dirty: validation.$dirty
            }
        },
        setBrandName:function(value){
            this.addBrand.name = value
            this.$v.addBrand.name.$touch()
        },
        setSupplierName:function(value){
            this.addBrand.supplier_name = value
            this.$v.addBrand.supplier_name.$touch()
        },
        setCategoryId:function(value){
            this.addBrand.category_id = value
            this.$v.addBrand.category_id.$touch()
        },
        setBrandPermalink:function(value){
            this.addBrand.slug = value
            this.$v.addBrand.slug.$touch()
        },
        setBrandPageTitle:function(value){
            this.addBrand.pageTitle = value
            this.$v.addBrand.pageTitle.$touch()
        },
        getBrandFunc:function(){
            let _this = this;
            let params = this.$route.params;
            this.$store.dispatch('getCategory/' + GET_CATEGORIES_ACTION).then(function(e){});
            if (params.brand_id != undefined) {
                _this.$store.dispatch('getBrand/' + LOAD_GET_BRAND_ACTION,params.brand_id).then(function(e){
                    _this.getBrandImagePreview.image = _this.baseUrlImage+'images/brands/'+_this.getBrand.image;
                    var img = new Image();
                    img.src = _this.getBrandImagePreview.image;
                    img.onload = function() { 
                        _this.getBrandImagePreview.size = _this.getFileSize(_this.getBrandImagePreview.image)/1000;
                        _this.getBrandImagePreview.format = _this.getUrlExtension(_this.getBrandImagePreview.image);
                        _this.getBrandImagePreview.dimensions = this.width+'x'+this.height;
                    }
                    _this.addBrand={
                        id:_this.getBrand.id,
                        category_id:_this.getBrand.category_id,
                        name:_this.getBrand.name,
                        supplier_name:_this.getBrand.supplier_name,
                        slug:_this.getBrand.slug,
                        pageTitle:_this.getBrand.title,
                        content:_this.getBrand.content,
                        status:_this.getBrand.status,
                        isAuth:_this.getBrand.is_auth,
                        seoTitle:_this.getBrand.seo_title,
                        seoKeywords:_this.getBrand.seo_keywords,
                        seoDescription:_this.getBrand.seo_description,
                        image:[]
                    };

                    _this.getSubCategories();

                    _this.addBrand.sub_category_id = _this.getBrand.sub_category_id ?? "";
                });
            }
        },
        getUrlExtension: function ( url ) {
            return url.split(/[#?]/)[0].split('.').pop().trim();
        },
        getFileSize: function (url){
            var fileSize = '';
            var http = new XMLHttpRequest();
            http.open('HEAD', url, false); // false = Synchronous

            http.send(null); // it will stop here until this http request is complete

            // when we are here, we already have a response, b/c we used Synchronous XHR

            if (http.status === 200) {
                fileSize = http.getResponseHeader('content-length');
                console.log('fileSize = ' + fileSize);
            }

            return fileSize;
        },
        resetSubCategories(){
            this.addBrand.sub_category_id = "";
        },
        getSubCategories(){
            if (this.addBrand.category_id) {
                let query = [];
                query['params'] = {
                    category_id: this.addBrand.category_id
                }
                if (this.$admin['role_id'] == 2) {
                    query['params'] = { created_by:this.$admin['id']  };
                }
                this.$store.dispatch('getSubCategory/' + GET_SUBCATEGORIES_ACTION, query);
            }
        }
    },
    watch: {},
    created() {},
    mounted(){
        this.getBrandFunc();
    }
}
</script>