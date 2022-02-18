<template>
    <div id="content" class="flex">
        <div class="page-container">
            <div class="pt-3 pr-3 pb-5 pl-3">
                <div class="mb-5">
                    <h2 class="dv_page_heading">Add How To Guide </h2>
                    <div class="row dv_search_delete_action_common"></div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card mb-3">
                                <div class="card-header"><strong>Basic Details</strong></div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label class="text-muted text-capitalize" for="name">Menu Name </label>
                                        <input v-model="addCMSPage.menu_name" :class="status($v.addCMSPage.menu_name)" @input="setValue($event)" name="menu_name" type="text" class="form-control dv_common_input_for_all" placeholder="Enter">
                                    </div>
                                    <div class="form-group">
                                        <label class="text-muted text-capitalize" for="name">Slug </label>
                                        <input v-model="addCMSPage.slug" :class="status($v.addCMSPage.slug)" @input="setValue($event)" name="slug" type="text" class="form-control dv_common_input_for_all" placeholder="Enter">
                                    </div>
                                    <div class="form-group">
                                        <label class="text-muted text-capitalize" for="name">Page Title </label>
                                        <input v-model="addCMSPage.page_title" :class="status($v.addCMSPage.page_title)" @input="setValue($event)" name="page_title" type="text" class="form-control dv_common_input_for_all" placeholder="Enter">
                                    </div>
                                    <div class="form-group">
                                        <label class="text-muted text-capitalize" for="name">Page Content </label>
                                        <vue-editor v-model="addCMSPage.page_content"></vue-editor>
                                    </div>
                                    <div class="form-group mb-0">
                                        <label class="ui-switch ui-switch-md info m-t-xs float-left mr-3"><input checked="" v-model="addCMSPage.status" type="checkbox"> <i></i></label>
                                        <label class="text-muted text-capitalize" for="name">Page status </label>
                                    </div>
                                </div>
                            </div>
                            <div class="card mb-3">
                                <div class="card-header"><strong>SEO Details</strong></div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label class="text-muted text-capitalize" for="name">SEO Title</label>
                                        <input v-model="addCMSPage.seo_title" type="text" class="form-control dv_common_input_for_all" placeholder="Enter">
                                    </div>
                                    <div class="form-group">
                                        <label class="text-muted text-capitalize" for="name">SEO keywords </label>
                                        <input v-model="addCMSPage.seo_keywords" type="text" class="form-control dv_common_input_for_all" placeholder="Enter">
                                    </div>
                                    <div class="form-group m-0">
                                        <label class="text-muted text-capitalize" for="name">Page Content </label>
                                        <textarea v-model="addCMSPage.seo_page_content" class="form-control dv_common_textarea_for_all" rows="6" style="resize: none;" placeholder="Enter"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 text-center">
                            <button type="button" class="btn btn-default text-muted dv_cancel_submit_btn" @click="$router.push({ name: 'guides' });">back</button>
                            <button type="button" class="btn btn-default dv_save_submit_btn" @click="saveCMSPage">save </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import Vue from 'vue'
import { required } from 'vuelidate/lib/validators';
import { deleteEmptyKeys } from "../../mixins";
import { ADD_CMS_PAGE_ACTION } from '@admin/store/design/actions';
import { VueEditor } from "vue2-editor";
export default {
    components: { VueEditor },
    data() {
        return {
            baseUrl:Vue.config.baseUrl,
            baseUrlImage: Vue.config.baseUrlImage,
            addCMSPage: {
                list_type: 'guide',
                menu_name: '',
                slug: '',
                page_title: '',
                page_content: '',
                status: true,
                seo_title: '',
                seo_keywords: '',
                seo_page_content: ''
            }
        }
    },
    validations: {
        addCMSPage: {
            menu_name: { required },
            slug: { required },
            page_title: { required }
        }
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
            this.addCMSPage[event.target.name] = event.target.value;
            this.$v.addCMSPage[event.target.name].$touch();
        },
        saveCMSPage: function() {
            let _this = this;
            _this.$v.addCMSPage.$touch();
            if (!_this.$v.addCMSPage.$invalid) {
                let params = deleteEmptyKeys(this.addCMSPage);
                this.loaderModal('show');
                this.$store.dispatch('getDesign/' + ADD_CMS_PAGE_ACTION, params).then(() => {
                    this.loaderModal('hide');
                    this.$router.push({ name: 'guides' });
                }).catch(() => this.loaderModal('hide'));
            }
        }
    }
}
</script>