<template>
    <div id="content" class="flex">
        <div class="page-container">
            <div class="pt-3 pr-3 pb-5 pl-3">
                <div class="mb-5">
                    <h2 class="dv_page_heading">How To Guide </h2>
                    <div class="row dv_search_delete_action_common">
                        <div class="col-md-5 col-sm-5 col-xs-5 col-5">
                            <input v-model="filters.search" @input="getPages" type="text" class="form-control dv_common_search_for_all" name="" placeholder="Search">
                        </div>
                        <div class="col-md-7 col-sm-7 col-xs-7 col-7">
                            <router-link :to="{ name: 'addGuidePage' }" tag="button" class="btn btn-default dv_filter_common" data-toggle="tooltip" data-placement="top" title="Add CMS Page">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <line x1="12" y1="5" x2="12" y2="19"></line>
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                </svg>
                            </router-link>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-theme table-row v-middle">
                            <thead>
                                <tr>
                                    <th style="width: 35%;" class="text-muted">page title </th>
                                    <th style="width: 15%;" class="text-muted">permalink </th>
                                    <th style="width: 10%;" class="text-muted">status </th>
                                    <th style="width: 2%;" class="text-muted">edit </th>
                                    <th style="width: 2%;" class="text-muted">delete </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(page,index) in getCMSPages.data" :key="index" class="v-middle">
                                    <td>
                                        {{ page['page_title'] }}
                                    </td>
                                    <td>
                                        {{ page['slug'] }}
                                    </td>
                                    <td>
                                        <label class="ui-switch ui-switch-md info m-t-xs"><input checked="" @input="updateCMSPage($event, page['id'])" v-model="page['status']" type="checkbox"> <i></i></label>
                                    </td>
                                    <td>
                                        <router-link :to="{ name: 'viewGuidePage', params: { cms_page_id: page.id } }">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="dv_sub_category_edit"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg>
                                        </router-link>
                                    </td>
                                    <td>
                                        <button @click="deleteCMSPage(page['page_title'], page['id'])" type="text" class="btn btn-default dv_selected_delete_common mr-0" data-toggle="tooltip" data-placement="top" title="Delete Selected Entries">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <pagination :data="getCMSPages" @pagination-change-page="getPages"></pagination>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import Vue from 'vue'
import { mapState } from 'vuex'
import { deleteEmptyKeys } from "../../mixins";
import { GET_CMS_PAGES_ACTION, DELETE_CMS_PAGE_ACTION, UPDATE_CMS_PAGE_ACTION } from '@admin/store/design/actions';
export default {
    components: { },
    data() {
        return {
            baseUrl:Vue.config.baseUrl,
            baseUrlImage: Vue.config.baseUrlImage,
            filters: {
                search: '',
                page: 1,
                list_type: 'guide'
            }
        }
    },
    computed:{
        ...mapState({
            getCMSPages: state => state.getDesign.getCMSPages
        })
    },
    mounted() {
        this.getPages();
    },
    methods: {
        getPages: function () {
            let query = [];
            query['params'] = deleteEmptyKeys(this.filters);
            this.$store.dispatch('getDesign/' + GET_CMS_PAGES_ACTION, query);
        },
        updateCMSPage: function(event, cms_page_id) {
            this.$store.dispatch('getDesign/' + UPDATE_CMS_PAGE_ACTION, { cms_page_id, status: event.target.checked })
        },
        deleteCMSPage: function (page_title, cms_page_id) {
            if (confirm('Please confirm to delete '+page_title+' page')) {
                this.$store.dispatch('getDesign/' + DELETE_CMS_PAGE_ACTION, { cms_page_id }).then(() => {
                    this.getPages();
                });
            }
        }
    }
}
</script>