<template>
	<div id="content" class="flex">

                <!-- ############ Main START-->
                <div class="page-container">
                    <div class="pt-3 pr-3 pb-5 pl-3">
                        <div class="mb-5">
                            <h2 class="dv_page_heading">Brands </h2>
                            <div class="row dv_search_delete_action_common">
                                <div class="col-md-5 col-sm-5 col-xs-5 col-5">
                                    <input type="text" class="form-control dv_common_search_for_all" name="" placeholder="Search" @keyup="searchBrand">
                                </div>
                                <div class="col-md-7 col-sm-7 col-xs-7 col-7">
                                    <router-link :to="{name:'addBrand'}" class="btn btn-default dv_filter_common"  tag="button">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                                   <!--  </button> -->
                                    </router-link>
                                    <button @click="deleteBrand" type="text" :disabled="selected_brands.length==0" class="btn btn-default dv_selected_delete_common" data-toggle="tooltip" data-placement="top" title="Delete Selected Brands">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                    </button>
                                    <button type="button" @click="excelDownload" class="btn btn-default dv_export_common" data-toggle="tooltip" data-placement="top" title="Download CSV">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="7 10 12 15 17 10"></polyline><line x1="12" y1="15" x2="12" y2="3"></line></svg>
                                    </button>
                                </div>
                            </div>
                            <div class="row mt-4 dv_filter_content_show" style="display: none;">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <strong>Filter </strong>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="text-muted text-capitalize d-block w-100" for="name">Filter 1</label>
                                                        <select class="form-control dv_common_select_for_all  w-100" id="select2-single" data-plugin="select2" multiple="">
                                                            <option>option 1</option> 
                                                            <option>option 2</option> 
                                                            <option>option 3</option> 
                                                            <option>option 4</option> 
                                                            <option>option 5</option> 
                                                            <option>option 1</option> 
                                                            <option>option 2</option> 
                                                            <option>option 3</option> 
                                                            <option>option 4</option> 
                                                            <option>option 5</option> 
                                                            <option>option 1</option> 
                                                            <option>option 2</option> 
                                                            <option>option 3</option> 
                                                            <option>option 4</option> 
                                                            <option>option 5</option> 
                                                            <option>option 1</option> 
                                                            <option>option 2</option> 
                                                            <option>option 3</option> 
                                                            <option>option 4</option> 
                                                            <option>option 5</option> 
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="text-muted text-capitalize" for="name">Filter 1</label>
                                                        <select class="form-control dv_common_select_for_all">
                                                            <option>option 1</option> 
                                                            <option>option 2</option> 
                                                            <option>option 3</option> 
                                                            <option>option 4</option> 
                                                            <option>option 5</option> 
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="text-muted text-capitalize" for="name">Filter 1</label>
                                                        <select class="form-control dv_common_select_for_all">
                                                            <option>option 1</option> 
                                                            <option>option 2</option> 
                                                            <option>option 3</option> 
                                                            <option>option 4</option> 
                                                            <option>option 5</option> 
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>                                    
                                </div>
                            </div>
                            <pagination class="mt-2" :data="getBrands" @pagination-change-page="getBrandFunc"></pagination>
                            <div class="table-responsive">
                                <table class="table table-theme table-row v-middle">
                                    <thead>
                                        <tr>
                                            <th style="width: 20px;">
                                                <label class="ui-check m-0 ui-check-rounded ui-check-md"><input type="checkbox" :checked="getBrands.data && (selected_brands.length == getBrands.data.length)" @change="allSelect"> <i></i></label>
                                            </th>
                                            <th class="text-muted sortable" @click="sorting(order('id'), 'id')">ID</th>
                                            <th class="text-muted sortable" @click="sorting(order('name'), 'name')">brand name </th>
                                            <th class="text-muted sortable" @click="sorting(order('supplier_name'), 'supplier_name')">supplier </th>
                                           <!--  <th class="text-muted">supplier</th> -->
                                            <th class="text-muted">slider</th>
                                           <!--  <th class="text-muted">thumbnail</th> -->
                                            <th class="text-muted">status</th>
                                            <th class="text-muted" style="width: 50px;">action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <template v-if="getBrands.data && getBrands.data.length > 0">
                                            
                                        <tr v-for="(brand,index) in getBrands.data" class="v-middle" :key="index">
                                            <td>
                                                <label class="ui-check m-0 ui-check-rounded ui-check-md"><input  type="checkbox" id="multi-check" :checked="selected_brands.includes(brand.id)" @change="selectBrand($event, brand.id)"> <i></i></label>
                                            </td>
                                            <td>{{brand.id}}</td>
                                            <td>{{brand.name}}</td>
                                            <td>{{brand.supplier_name}}</td>
                                            <td>
                                                <img :src="baseUrlImage+'images/brands/'+brand.image" class="dv_brand_slider_img">
                                            </td>
                                            <td>
                                                <label class="ui-switch ui-switch-md info m-t-xs"><input :checked="brand.status == 'A'" type="checkbox" @change="getChangeStatus($event,brand)"> <i></i></label>
                                            </td>
                                            <td>
                                                <router-link :to="{ name : 'addBrand', params : { brand_id:brand.id}}" >
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg>
                                                </router-link>
                                            </td>
                                        </tr>
                                        </template>
                                        <template v-else>
                                            <tr>
                                                <td colspan="4">
                                                    data not found
                                                </td>
                                            </tr>
                                        </template>
                                        
                                    </tbody>
                                </table>
                            </div>
                            <pagination :data="getBrands" @pagination-change-page="getBrandFunc"></pagination>
                           
                        </div>

                    </div>
                </div>
                <!-- ############ Main END-->
            </div>
</template>
<script type="text/javascript">
import Vue from 'vue'
import { LOAD_BRAND_LIST_ACTION,UPDATE_CHANGE_STATUS_BRAND_ACTION, EXCEL_DOWNLOAD_BRANDS_ACTION, DELETE_BRANDS_ACTION } from '@admin/store/brands/actions'
import { mapState } from 'vuex'
export default {
    components: { },
    data() {
        return {
            baseUrl:Vue.config.baseUrl,
            baseUrlImage:Vue.config.baseUrlImage,
            addBrand:{
                id:'',
                name:'',
                slug:'',
                pageTitle:'',
                content:'',
                status:0,
                isAuth:0,
                seoTitle:'',
                seoKeywords:'',
                seoDescription:'',
                image:{}
            },
            filters: {
                orderBy: 'asc',
                sortBy: 'id'
            },
            selected_brands: [],
            getBrandImagePreview:'',
        }
    },
    computed:{
        ...mapState({
            getBrands: state => state.getBrand.getBrands,
            excelLink: state => state.getBrand.excelLink
        }),
    },
    methods: {
        searchBrand:function(event){
            let search = event.target.value;
            this.getBrandFunc(1,search);  
        },
        onFileChange(event){
            const file = event.target.files[0];
            this.getBrandImagePreview = URL.createObjectURL(file);
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
        getChangeStatus:function(event,brand){
            let _this = this;
            let data = {
                id:brand.id,
            };
            if(event.target.checked == true){
                data.status = 'A'; 
            }else{
                data.status = 'I'; 

            }
                    _this.$store.dispatch('getBrand/' + UPDATE_CHANGE_STATUS_BRAND_ACTION,data).then(function(e){
            
                    });
        },
        getBrandFunc:function(page = 1,search=''){
            let _this = this;
            let query = [];
            query['params'] = {
                page, search, orderBy: this.filters.orderBy, sortBy: this.filters.sortBy
            }
            query['params'] = this.deleteEmptyKeys(query['params']);
            if (this.$admin['role_id'] == 2) {
                query['params']['created_by'] = this.$admin['id'];
            }
            _this.$store.dispatch('getBrand/' + LOAD_BRAND_LIST_ACTION,query);
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
        setBrandPermalink:function(value){
                this.addBrand.slug = value
            this.$v.addBrand.slug.$touch()
        },
        setBrandPageTitle:function(value){
                this.addBrand.pageTitle = value
            this.$v.addBrand.pageTitle.$touch()
        },
        excelDownload: function() {
            let query = [];
            let params = {
                perPage: 'all',
                response_type: 'xlsx',
                orderBy: this.filters.orderBy,
                sortBy: this.filters.sortBy
            };
            query['params'] = this.deleteEmptyKeys(params);
            if (this.$admin['role_id'] == 2) {
                query['params']['created_by'] = this.$admin['id'];
            }
            this.$store.dispatch('getBrand/' + EXCEL_DOWNLOAD_BRANDS_ACTION, query).then(() => {
                const link = document.createElement("a");
                link.href = this.excelLink;
                link.setAttribute("download", "brands.xlsx");
                document.body.appendChild(link);
                link.click();
            });
        },
        sorting(orderBy, sortBy) {
            this.filters.orderBy = orderBy;
            this.filters.sortBy = sortBy;
            this.getBrandFunc();
        },
        order(sortBy) {
            if ((this.filters.sortBy == sortBy) && (this.filters.orderBy == 'desc')) {
                return 'asc';
            } else if ((this.filters.sortBy == sortBy) && (this.filters.orderBy == 'asc')) {
                return 'desc'
            } else {
                return 'desc';
            }
        },
        selectBrand(event, brand_id) {
            if (event.target.checked) {
                this.selected_brands.push(brand_id);
            } else {
                this.selected_brands = this.selected_brands.filter(id => id!=brand_id);
            }
        },
        allSelect(event) {
            if (event.target.checked) { 
                this.selected_brands = this.getBrands.data.map(brand => brand.id);
            } else {
                this.selected_brands = [];
            }
        },
        deleteBrand() {
            if (confirm('Please confirm to delete selected brands.')) {
                let params = {
                    brand_ids : this.selected_brands
                };
                this.$store.dispatch('getBrand/' + DELETE_BRANDS_ACTION, params).then(() => {
                    this.getBrandFunc();
                });
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