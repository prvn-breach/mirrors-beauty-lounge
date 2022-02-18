<template>
	<div id="content" class="flex">
        <div class="page-container">
            <div class="pt-3 pr-3 pb-5 pl-3">
                <div class="mb-5">
                    <h2 class="dv_page_heading">Add Category </h2>
                    <div class="row dv_search_delete_action_common">
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card mb-3">
                                <div class="b-b">
                                    <div class="nav-active-border b-primary bottom">
                                        <ul class="nav" id="myTab" role="tablist">
                                            <li class="nav-item"><a class="nav-link dv_tabs_a_tag" :class="((Object.keys(this.$route.query).length == 0) || ($route.query.tab == 'basic_info')) ? 'active' : ''" id="home-tab" data-toggle="tab" href="#Info" role="tab" aria-controls="home" aria-selected="true"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>Basic Info</a></li>
                                            <li class="nav-item"><a class="nav-link dv_tabs_a_tag" :class="$route.query.tab == 'attributes' ? 'active' : ''" id="contact-tab" data-toggle="tab" href="#attributes" role="tab" aria-controls="contact" aria-selected="false"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="1" y="3" width="15" height="13"></rect><polygon points="16 8 20 8 23 11 23 16 16 16 16 8"></polygon><circle cx="5.5" cy="18.5" r="2.5"></circle><circle cx="18.5" cy="18.5" r="2.5"></circle></svg>Attributes</a></li>
                                            <li class="nav-item"><a class="nav-link dv_tabs_a_tag" :class="$route.query.tab == 'seo' ? 'active' : ''" id="contact-tab" data-toggle="tab" href="#seo" role="tab" aria-controls="contact" aria-selected="false"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>SEO</a></li>
                                            <!-- <li class="nav-item"><a class="nav-link dv_tabs_a_tag" id="contact-tab" data-toggle="tab" href="#Media" role="tab" aria-controls="contact" aria-selected="false"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-image"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><circle cx="8.5" cy="8.5" r="1.5"></circle><polyline points="21 15 16 10 5 21"></polyline></svg>Media</a></li> -->
                                        </ul>
                                    </div>
                                </div>         
                                <div class="tab-content">
                                    <div class="tab-pane fade" :class="((Object.keys(this.$route.query).length == 0) || ($route.query.tab == 'basic_info')) ? 'active show' : ''" id="Info" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="card mb-0">
                                            <div class="card-body">
                                                <div class="form-group">
                                                <label class="text-muted text-capitalize" for="name">Category name</label>
                                                    <input type="text" class="form-control dv_common_input_for_all" v-model="addCategory.name" placeholder="Enter" :class="status($v.addCategory.name)" @input="setCategoryName($event.target.value)" @focusout="getSlug">
                                                </div>
                                                <div class="form-group">
                                                    <label class="text-muted text-capitalize" for="name">slug </label>
                                                    <input type="text" class="form-control dv_common_input_for_all" placeholder="Enter" v-model="addCategory.slug" :class="status($v.addCategory.slug)" @input="setCategoryPermalink($event.target.value)" readonly="">
                                                </div>
                                                <div class="form-group">
                                                    <label class="text-muted text-capitalize" for="name">Category image </label>
                                                    <input type="file" class="form-control dv_common_input_for_all" placeholder="Enter" @change="onFileChange">
                                                    <img  v-if="getBrandImagePreview" :src="getBrandImagePreview">
                                                    <span class="d-block text-danger font-weight-bold" v-if="getError" v-for="(image,index) in getError.image" :key="index">{{image}} </span>
                                                </div>
                                                <div class="form-group">
                                                    <label class="text-muted text-capitalize" for="name">page title </label>
                                                    <input type="text" class="form-control dv_common_input_for_all" placeholder="Enter"  v-model="addCategory.pageTitle" :class="status($v.addCategory.pageTitle)" @input="setCategoryPageTitle($event.target.value)">
                                                </div>
                                                <div class="form-group">
                                                    <label class="text-muted text-capitalize" for="name">page content </label>
                                                    <vue-editor v-model="addCategory.content"></vue-editor>
                                                </div>
                                                <div class="form-group mb-0">
                                                    <label class="ui-switch ui-switch-md info m-t-xs float-left mr-3"><input :checked="addCategory.status=='A'" type="checkbox"  @change="getChangeStatus"> <i></i></label>
                                                    <label class="text-muted text-capitalize" for="name">status </label>
                                                </div>                                                        
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" :class="$route.query.tab == 'attributes' ? 'active show' : ''" id="attributes" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="accordion" id="attributes">
                                            <div class="card mb-0" v-for="(attribute,indexP) in addCategory.attributes" :key="indexP">
                                                <div class="d-flex align-items-center px-4 py-3 b-t pointer collapsed" data-toggle="collapse" :data-target="'#collapseOne'+indexP" aria-expanded="true" :aria-controls="'collapseOne'+indexP">
                                                    <strong class="text-capitalize">{{attribute.name.data}}</strong>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="dv_edit_attribute_in_category"><polyline points="6 9 12 15 18 9"></polyline></svg>
                                                </div>
                                                <svg @click="deleteAttribute(attribute.id)" data-toggle="tooltip" data-placement="top" data-original-title="Delete Option" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="dv_delete_attribute_in_category"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                                <div :id="'collapseOne'+indexP" class="card-body p-0 collapse" :aria-labelledby="'headingOne'+indexP" data-parent="#attributes">
                                                    <div class="row b-t m-0 pt-3">
                                                        <div class="col-md-5">
                                                            <div class="input-group mb-3">
                                                                <input type="text" class="form-control dv_common_input_for_all" placeholder="Enter" :value="attribute.name.data" @input="setAttributeValue($event.target.value,indexP)">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="table-responsive b-t">
                                                        <table class="table table-theme table-row v-middle">
                                                            <thead>
                                                                <tr>
                                                                    <th style="width: 10%; text-align: center;">sr no</th>
                                                                    <th style="width: 40%;">option name</th>
                                                                    <th style="width: 30%;">image </th>
                                                                    <th style="width: 10%;">status</th>
                                                                    <th style="width: 20%;">action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                
                                                                
                                                                <tr  v-for="(option,index) in attribute.options">
                                                                    <td class="text-center">{{(index+1)}}</td>
                                                                    <td><input type="text" class="form-control dv_common_input_for_all" placeholder="Enter" :value="option.name.data" @input="(option.name.data = $event.target.value)" :class="option.name.class"></td>
                                                                    <td><input type="file" class="form-control dv_common_input_for_all" placeholder="Enter"  @change="addedImage(option.image ,$event.target.files[0])" ></td>
                                                                    <td><label class="ui-switch ui-switch-md info m-t-xs d-block mr-3"><input :checked="option.status=='A'" type="checkbox" @change="getChangeStatus(indexP,index,$event)"> <i></i></label></td>
                                                                    <td v-if="(attribute.options.length-1) ==  index">
                                                                        <svg @click="addOptions(indexP,index)" data-toggle="tooltip" data-placement="top" data-original-title="Add New" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="dv_row_action_drp_svg_eye"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                                                                    </td>
                                                                        <td v-else>
                                                                        <svg @click="deleteOptions(indexP,index,option)" data-toggle="tooltip" data-placement="top" data-original-title="Delete Option" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-danger dv_row_action_drp_svg_eye"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card mb-0">
                                                <div class="d-flex align-items-center px-4 py-3 b-t pointer">
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control dv_common_input_for_all" placeholder="Enter" v-model="attributeInput">
                                                        <div class="input-group-append" >
                                                            <button @click="addAttribute" class="btn btn-outline-secondary dv_add_new_attribute_btn" type="button">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="dv_add_new_attribute_svg"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" :class="$route.query.tab == 'seo' ? 'active show' : ''" id="seo" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="card mb-3">
                                            <div class="card-header"><strong>SEO Details</strong></div>
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label class="text-muted text-capitalize" for="name">SEO Title</label>
                                                    <input type="text" class="form-control dv_common_input_for_all" placeholder="Enter" v-model="addCategory.seoTitle">
                                                </div>
                                                <div class="form-group">
                                                    <label class="text-muted text-capitalize" for="name">SEO keywords </label>
                                                    <input type="text" class="form-control dv_common_input_for_all" placeholder="Enter" v-model="addCategory.seoKeywords">
                                                </div>
                                                <div class="form-group m-0">
                                                    <label class="text-muted text-capitalize" for="name">Description </label>
                                                    <textarea class="form-control dv_common_textarea_for_all" rows="6" style="resize: none;" placeholder="Enter" v-model="addCategory.seoDescription"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 text-center">
                            <button type="button" class="btn btn-default text-muted dv_cancel_submit_btn" @click="$router.push({ name: 'categoryList' });" >cancel</button>
                            <button type="button" class="btn btn-default dv_save_submit_btn" @click="saveCategory">save </button>
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
import { ADD_CATEGORY_LIST_ACTION, LOAD_EDIT_CATEGORY_LIST_ACTION, DELETE_ATTRIBUTE_OPTION } from '@admin/store/categories/actions'
export default {
    components: { VueEditor },
    data() {
        return {
            baseUrl: Vue.config.baseUrl,
            baseUrlImage: Vue.config.baseUrlImage,
            attributeInput:'',
            addCategory:{
                id:'',
                name:'',
                slug:'',
                pageTitle:'',
                content:'',
                status:'A',
                seoTitle:'',
                seoKeywords:'',
                seoDescription:'',
                attributes:[],
                icon: []
            },
            getBrandImagePreview:'',
        }
    },
    validations: {
        addCategory:{
            name: { required },
            slug:{ required },
            pageTitle:{ required }
        },
    },
    computed:{
        ...mapState({
            getError: state => state.getCategory.getError,
            category: state => state.getCategory.getCategory
        }),
    },
    methods: {
        onFileChange(event){
            const file = event.target.files[0];
            this.getBrandImagePreview = URL.createObjectURL(file);
            this.addCategory.icon = event.target.files[0];
        },
        addedImage:function(option,image){
            var reader = new FileReader()
            reader.readAsDataURL(image)
            reader.onload = (e) => {
                console.log('file to base64 result:' + reader.result)
                option.image = e.target.result
            }
            reader.onerror = function (error) {
                console.log('Error: ', error)
            }                 
        },
        saveCategory:function(){
            let _this = this;
            _this.$v.addCategory.$touch();
            if (!_this.$v.addCategory.$invalid) {
                this.loaderModal('show');
                let data = new FormData();
                data.append('id', _this.addCategory.id);
                data.append('name', _this.addCategory.name);
                data.append('slug', _this.addCategory.slug);
                data.append('pageTitle', _this.addCategory.pageTitle);
                data.append('content', _this.addCategory.content);
                data.append('status', _this.addCategory.status);
                data.append('seoTitle', _this.addCategory.seoTitle);
                data.append('seoKeywords', _this.addCategory.seoKeywords);
                data.append('seoDescription', _this.addCategory.seoDescription);
                data.append('attributes', JSON.stringify(_this.addCategory.attributes));
                data.append('icon', _this.addCategory.icon);
                data.append('created_by', this.$admin.id);
                _this.$store.dispatch('getCategory/' + ADD_CATEGORY_LIST_ACTION,data).then(function(e){
                    _this.loaderModal('hide');
                    if (Object.keys(_this.getError).length == 0) {
                        _this.$router.push({ name: 'categoryList' });
                    }
                });
            }
        },
        deleteOptions:function(indexP,index,option){
            let _this = this;
            _this.addCategory.attributes.map(function(item,indexT){
                if(indexP == indexT){
                        item.options.splice(index,1);
                }
            });
            if(option.id != null && option.id > 0){
                _this.$store.dispatch('getCategory/' + DELETE_ATTRIBUTE_OPTION,option.id).then(function(e){});
            }
        },
        addOptions:function(indexP,index){
            let _this = this;
            _this.addCategory.attributes.map(function(item,indexT){
                if(indexP == indexT){
                    let getCount  = item.options.filter(function(item){
                        return item.name.data =='';
                    }).length;
                    if(getCount > 0){
                        item.options.map(function(itemchild,indexchild){
                            if(indexchild == index){
                                itemchild.name.class = 'error';
                            }
                        })
                    } else {
                        item.options.map(function(itemchild,indexchild){
                            if(indexchild == index){
                                itemchild.name.class = '';
                            }
                        })
                        item.options.push({
                            id:'',
                            name:{data:'',class:''},
                            image:{},
                            preview:'',
                            status:'A',
                        });
                    }
                }
            })
        },
        setAttributeValue:function(value,indexp){
            let _this = this;
            _this.addCategory.attributes.map(function(item,index){
                if(indexp == index){
                    item.id = '';
                    item.name = {data:value,class:''};
                }
            })
            
        },
        addAttribute:function(){
            let _this = this;
            _this.addCategory.attributes.push({
                id:'',
                name:{data:_this.attributeInput,class:''},
                options:[
                    {
                        id:'',
                        name:{data:'',class:''},
                        image:{},
                        preview:'',
                        status:'A',
                    }],
            });
            _this.attributeInput = '';
        },
        deleteAttribute: function(attr_id) {
            this.addCategory.attributes = this.addCategory.attributes.filter(attr => attr.id!=attr_id);
        },
        getChangeStatus:function(indexP,index,event){
            let _this = this;
                _this.addCategory.attributes.map(function(item,indexT){
                if(indexP == indexT){
                    item.options.map(function(itemchild,indexchild){
                        if(index==indexchild){
                            if(event.target.checked == true){
                                itemchild.status = 'A'; 
                            }else{
                                itemchild.status = 'I'; 
                            }
                        }
                    })
                }
            })
        },
        setCategoryName:function(value){
            this.addCategory.name = value
            this.$v.addCategory.name.$touch()
        },
        setCategoryId:function(value){
            this.addCategory.category_id = value
            this.$v.addCategory.category_id.$touch()
        },
        setCategoryPermalink:function(value){
            this.addCategory.slug = value
            this.$v.addCategory.slug.$touch()
        },
        setCategoryPageTitle:function(value){
            this.addCategory.pageTitle = value
            this.$v.addCategory.pageTitle.$touch()
        },
        status(validation) {
            return {
                error: validation.$error,
                dirty: validation.$dirty
            }
        },
        getSlug:function(event){
            let name = event.target.value;
            this.addCategory.slug = name.replace(/\s+/g, '-').toLowerCase();
        },
        getCategory:function(){
            let _this = this;
            let params = this.$route.params;
            if (params.category_id != undefined) {
                this.$store.dispatch('getCategory/' + LOAD_EDIT_CATEGORY_LIST_ACTION,params.category_id ).then(function(e){
                    _this.getBrandImagePreview = _this.baseUrlImage+_this.category.icon;
                    _this.addCategory = _this.category
                    _this.addCategory.icon = [];
                });
            }
        }
    },
    mounted(){
        this.getCategory();
    }
}
</script>