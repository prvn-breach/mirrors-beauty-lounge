<template>
	<div id="content" class="flex">
        <div class="page-container">
            <div class="pt-3 pr-3 pb-5 pl-3">
                <div class="mb-5">
                    <h2 class="dv_page_heading">Edit Sub Category </h2>
                    <div class="row dv_search_delete_action_common"></div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card mb-3">
                                <div class="card-header"><strong>Basic Details</strong></div>
                                <div class="card-body">
                                    <div class="form-group">
                                    <label class="text-muted text-capitalize" for="name">Category name</label>
                                        <input type="text" class="form-control dv_common_input_for_all" v-model="saveSubCategory.name" placeholder="Enter" :class="status($v.saveSubCategory.name)" @input="setValue" name="name" @focusout="getSlug">
                                    </div>
                                    <div class="form-group">
                                        <label class="text-muted text-capitalize" for="name">Slug </label>
                                        <input type="text" class="form-control dv_common_input_for_all" placeholder="Enter" v-model="saveSubCategory.slug" :class="status($v.saveSubCategory.slug)" @input="setValue" name="slug" readonly="">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label class="text-muted text-capitalize" for="name"> Category </label>
                                        <select data-plugin="select2" class="form-control select2-single" v-model="saveSubCategory.category_id" :class="status($v.saveSubCategory.category_id)" @input="setValue" @change="resetSubCategories(); getSubCategories();" name="category_id">
                                            <option value="">Select Category </option>
                                            <option v-for="(category,index) in categories" :value="category.id" :key="index">{{category.name}} </option>
                                        </select>
                                    </div>
                                    <div class="form-group mb-3" v-if="saveSubCategory.category_id">
                                        <label class="text-muted text-capitalize" for="name"> Sub Category </label>
                                        <select data-plugin="select2" class="form-control select2-single" v-model="saveSubCategory.sub_category_id" name="sub_category_id">
                                            <option value="">Select Sub Category </option>
                                            <option v-for="(sub_category,index) in subCategories" :value="sub_category.id" :key="index">{{sub_category.name}} </option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="text-muted text-capitalize" for="name">Category image </label>
                                        <input type="file" class="form-control dv_common_input_for_all" placeholder="Enter" @change="onFileChange">
                                        <img  v-if="getCategoryImagePreview" :src="getCategoryImagePreview">
                                        <span class="d-block text-danger font-weight-bold" v-if="getError" v-for="(icon,index) in getError.icon" :key="index">{{icon}} </span>
                                    </div>
                                    <div class="form-group">
                                        <label class="text-muted text-capitalize" for="name">page title </label>
                                        <input type="text" class="form-control dv_common_input_for_all" placeholder="Enter"  v-model="saveSubCategory.title" :class="status($v.saveSubCategory.title)" @input="setValue" name="title">
                                    </div>
                                    <div class="form-group">
                                        <label class="text-muted text-capitalize" for="name">page content </label>
                                        <vue-editor v-model="saveSubCategory.content"></vue-editor>
                                    </div>
                                    <div class="form-group mb-0">
                                        <label class="ui-switch ui-switch-md info m-t-xs float-left mr-3"><input :checked="saveSubCategory.status=='A'" type="checkbox"  @change="updateStatus"> <i></i></label>
                                        <label class="text-muted text-capitalize" for="name">status </label>
                                    </div>                                                        
                                </div>
                            </div>
                            <div class="card mb-3">
                                <div class="card-header"><strong>SEO Details</strong></div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label class="text-muted text-capitalize" for="name">SEO Title</label>
                                        <input type="text" v-model="saveSubCategory.seo_title" class="form-control dv_common_input_for_all" placeholder="Enter">
                                    </div>
                                    <div class="form-group">
                                        <label class="text-muted text-capitalize" for="name">SEO keywords </label>
                                        <input type="text" v-model="saveSubCategory.seo_keywords" class="form-control dv_common_input_for_all" placeholder="Enter">
                                    </div>
                                    <div class="form-group m-0">
                                        <label class="text-muted text-capitalize" for="name">Description </label>
                                        <textarea v-model="saveSubCategory.seo_description" class="form-control dv_common_textarea_for_all" rows="6" style="resize: none;" placeholder="Enter"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 text-center">
                            <button type="button" class="btn btn-default text-muted dv_cancel_submit_btn" @click="$router.push({ name: 'subCategories' });" >cancel</button>
                            <button type="button" class="btn btn-default dv_save_submit_btn" @click="updateSubCategory">update </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script type="text/javascript">
import Vue from 'vue'
import { mapState } from 'vuex'
import { required } from 'vuelidate/lib/validators'
import { VueEditor } from "vue2-editor";
import { GET_CATEGORIES_ACTION } from '@admin/store/categories/actions'
import { GET_SUBCATEGORIES_ACTION, GET_SUBCATEGORY_ACTION, UPDATE_SUBCATEGORY_ACTION } from '@admin/store/sub-categories/actions'
export default {
    components: { VueEditor },
    data() {
        return {
            baseUrl: Vue.config.baseUrl,
            baseUrlImage: Vue.config.baseUrlImage,
            saveSubCategory: {
                id: '',
                name:'',
                slug:'',
                category_id:'',
                sub_category_id:'',
                title:'',
                content:'',
                status:'A',
                seo_title:'',
                seo_keywords:'',
                seo_description:'',
                icon: []
            },
            getCategoryImagePreview:'',
        }
    },
    validations: {
        saveSubCategory: {
            name: { required },  
            category_id: { required },
            slug: { required },
            title: { required }
        },
    },
    computed:{
        ...mapState({
            getError: state => state.getSubCategory.getError,
            categories: state => state.getCategory.getCategories,
            subCategory: state => state.getSubCategory.getSubCategory,
            subCategories: state => state.getSubCategory.getSubCategories
        })
    },
    mounted(){
        this.getParentCategories();
        this.getSubCategory();
    },
    methods: {
        onFileChange(event){
            const file = event.target.files[0];
            this.getCategoryImagePreview = URL.createObjectURL(file);
            this.saveSubCategory.icon = event.target.files[0];
        },
        addedImage(option,image){
            var reader = new FileReader()
            reader.readAsDataURL(image)
            reader.onload = (e) => {
                console.log('file to base64 result:' + reader.result)
                option.image = e.target.result
            }
            reader.onerror = function (error) {
                console.log('Error: ', error)
            }
            console.log(option)
                
        },
        setValue(event) {
            this.saveSubCategory[event.target.name] = event.target.value;
            this.$v.saveSubCategory[event.target.name].$touch();
        },
        status(validation) {
            return {
                error: validation.$error,
                dirty: validation.$dirty
            }
        },
        getSlug(event){
            let name = event.target.value;
            this.saveSubCategory.slug = name.replace(/\s+/g, '-').toLowerCase();
        },
        updateStatus(event){
            if(event.target.checked == true){
                this.saveSubCategory.status = 'A'; 
            } else {
                this.saveSubCategory.status = 'I'; 
            }
        },
        getParentCategories() {
            let query = [];
            query['params'] = { }
            if (this.$admin['role_id'] == 2) {
                query['params'] = { created_by:this.$admin['id']  };
            }
            this.$store.dispatch('getCategory/' + GET_CATEGORIES_ACTION, query);
        },
        updateSubCategory() {
            this.$v.saveSubCategory.$touch();
            if (!this.$v.saveSubCategory.$invalid) {
                let params = this.saveSubCategory;
                params['updated_by'] = this.$admin['id'];
                const formData = new FormData();
                Object.entries(params).forEach(([key, value]) => {
                    formData.append(key, value);
                });
                this.loaderModal('show');
                this.$store.dispatch('getSubCategory/' + UPDATE_SUBCATEGORY_ACTION, formData).then(() => {
                    this.loaderModal('hide');
                    if (Object.keys(this.getError).length == 0) { 
                        this.$router.push({ name: 'subCategories' });
                    }
                });
            }
        },
        getSubCategory() {
            let query = {};
            query['params'] = {
                sub_category_id: this.$route.params.sub_category_id
            }
            this.$store.dispatch('getSubCategory/' + GET_SUBCATEGORY_ACTION, query).then(() => {
                this.getCategoryImagePreview = this.baseUrlImage+this.subCategory.icon;
                this.saveSubCategory.id = this.subCategory.id;
                this.saveSubCategory.name = this.subCategory.name;
                this.saveSubCategory.slug = this.subCategory.slug;
                this.saveSubCategory.category_id = this.subCategory.category_id;
                this.saveSubCategory.content = this.subCategory.content;
                this.saveSubCategory.title = this.subCategory.title;
                this.saveSubCategory.status = this.subCategory.status;
                this.saveSubCategory.seo_title = this.subCategory.seo_title;
                this.saveSubCategory.seo_keywords = this.subCategory.seo_keywords;
                this.saveSubCategory.seo_description = this.subCategory.seo_description;

                this.getSubCategories();

                this.saveSubCategory.sub_category_id = this.subCategory.sub_category_id ?? "";
            });
        },
        resetSubCategories(){
            this.saveSubCategory.sub_category_id = "";
        },
        getSubCategories(){
            if (this.saveSubCategory.category_id) {
                let query = [];
                query['params'] = {
                    category_id: this.saveSubCategory.category_id
                }
                if (this.$admin['role_id'] == 2) {
                    query['params'] = { created_by:this.$admin['id']  };
                }
                this.$store.dispatch('getSubCategory/' + GET_SUBCATEGORIES_ACTION, query);
            }
        }
    }
}
</script>