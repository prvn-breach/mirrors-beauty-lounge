<template>
    <div id="content" class="flex">
        <div class="page-container">
            <div class="pt-3 pr-3 pb-5 pl-3">
                <div class="mb-5">
                    <h2 class="dv_page_heading">Export / Import Data </h2>
                    <div class="row dv_search_delete_action_common">
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card mb-3">
                                <div class="card-header"><strong>Download sample</strong></div>
                                <ul class="dv_download_excel_ul">
                                    <li @click="download('brands')" >
                                        <a href="#!">
                                            brands
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right">
                                                <polyline points="9 18 15 12 9 6"></polyline>
                                            </svg>
                                        </a>
                                    </li>
                                    <li @click="download('categories')">
                                        <a href="#!">
                                            categories
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right">
                                                <polyline points="9 18 15 12 9 6"></polyline>
                                            </svg>
                                        </a>
                                    </li>
                                    <!-- <li @click="filtersExcelDownload">
                                        <a href="#!">
                                            filters
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right">
                                                <polyline points="9 18 15 12 9 6"></polyline>
                                            </svg>
                                        </a>
                                    </li> -->
                                    <li @click="download('products')">
                                        <a href="#!">
                                            products
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right">
                                                <polyline points="9 18 15 12 9 6"></polyline>
                                            </svg>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="card mb-3">
                                <div class="card-header"><strong>Import excel</strong></div>
                                <div class="alert alert-success" role="alert" v-if="success" >
                                    File Uploaded.
                                </div>
                                <div class="alert alert-danger" role="alert" v-if="Object.keys(importResponse).length > 0">
                                    {{ importResponse[Object.keys(importResponse)[0]][0] }}
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label class="text-muted text-capitalize" for="name">Select Types </label>
                                        <select v-model="importData.type" :class="status($v.importData.type)" @input="setValue($event)" name="type" class="form-control">
                                            <option value="brands">Brands </option>
                                            <option value="categories">Category </option>
                                            <option value="products">Product </option>
                                        </select>
                                    </div>

                                    <label class="text-muted text-capitalize" for="name">Choose file to upload </label>
                                    <div class="custom-file" style="height: 40px;">
                                        <input type="file" name="csv_file" @change="onFileChange" class="custom-file-input" id="customFile">
                                        <label class="custom-file-label" for="customFile">{{ importData.csv_file ? importData.csv_file.name : 'Choose File'  }}</label>
                                    </div>
                                    <!-- <span class="text-danger" v-if="importResponse.hasOwnProperty('csv_file')">{{ importResponse.csv_file[0] }}</span> -->
                                    <div class="text-center mt-5">
                                        <button :disabled="loader" type="button" class="btn btn-default dv_save_submit_btn" @click="uploadData">
                                            Upload 
                                            <div v-if="loader" class="ml-3 spinner-border text-light" role="status">
                                                <span class="sr-only">Loading...</span>
                                            </div>
                                        </button>
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
<script>
import Vue from 'vue'
import { mapState } from 'vuex'
import { required } from 'vuelidate/lib/validators';
import { IMPORT_ACTION } from '@admin/store/imports/actions';
import { EXPORT_ACTION } from '@admin/store/exports/actions';
export default {
    components: { },
    data() {
        return {
            baseUrl:Vue.config.baseUrl,
            baseUrlImage: Vue.config.baseUrlImage,
            importData: {
                type: 'brands',
                csv_file: ''
            },
            loader: false,
            success: false
        }
    },
    validations: {
        importData: {
            type: { required }
        }
    },
    computed:{
        ...mapState({
            importResponse: state => state.getImport.response,
            downloadLink: state => state.getExport.excelLink
        })
    },
    methods: {
        status: function(validation) {
            if(validation != undefined){
                return {
                    error: validation.$error,
                    dirty: validation.$dirty
                }
            }
        },
        setValue: function(event) {
            this.importData[event.target.name] = event.target.value;
            this.$v.importData[event.target.name].$touch();
        },
        onFileChange: function(event) {
            this.importData.csv_file = event.target.files[0];
        },
        download: function(type) {
            let query = [];
            query['params'] = {type};
            window.location.href = this.baseUrl+'api/admin/export?type='+type;
            // this.$store.dispatch('getExport/' + EXPORT_ACTION, query).then(() => {
                // const link = document.createElement("a");
                // link.href = this.downloadLink;
                // link.setAttribute("download", 'brands.xlsx');
                // document.body.appendChild(link);
                // link.click();
                // window.location.href = this.downloadLink;
            // });
        },
        filtersExcelDownload: function() {
            let params = {
                response_type: 'xlsx',
                perPage: 'all',
                excel_fields: [ 'ID', 'Attribute ID', 'Option Name', 'Slug', 'Product ID', 'Status' ],
                excel_db_columns: [
                    { column1: 'getProductOptions', column2: 'id' },
                    { column1: 'getProductOptions', column2: 'attribute_id' }, 
                    { column1: 'getProductOptions', column2: 'name' }, 
                    { column1: 'getProductOptions', column2: 'slug' }, 
                    { column1: 'getProductOptions', column2: 'product_id' }, 
                    { column1: 'getProductOptions', column2: 'status' }
                ]
            }
            this.$store.dispatch('getProduct/' + EXCEL_DOWNLOAD_PRODUCTS_ACTION, params).then(() => {
                const link = document.createElement("a");
                link.href = this.productExcelLink;
                link.setAttribute("download", "Products.xlsx");
                document.body.appendChild(link);
                link.click();
            });
        },
        uploadData: function() {
            this.success = false;
            let _this = this;
            _this.$v.importData.$touch();
            if (!_this.$v.importData.$invalid) {
                this.loader = true;
                let formData = new FormData();
                formData.append('type', this.importData.type);
                formData.append('csv_file', this.importData.csv_file);
                this.$store.dispatch('getImport/' + IMPORT_ACTION, formData).then(() => {
                    if (Object.keys(this.importResponse).length == 0) {
                        this.importData.csv_file = '';
                        this.success = true;
                        setTimeout(() => {
                            this.success = false;
                        }, 2000);
                    }
                    this.loader = false;
                });
            }
        }
    }
}
</script>