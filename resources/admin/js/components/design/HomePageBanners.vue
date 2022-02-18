<template>
    <div id="content" class="flex">
        <div class="page-container">
            <div class="pt-3 pr-3 pb-5 pl-3">
                <div class="mb-5">
                    <h2 class="dv_page_heading">Home page banner </h2>
                    <div class="row dv_search_delete_action_common">
                        <div class="col-md-5 col-sm-5 col-xs-5 col-5">
                            <input type="text" v-model="filters.search" @input="getHomePageBanners" class="form-control dv_common_search_for_all" name="" placeholder="Search">
                        </div>
                        <div class="col-md-7 col-sm-7 col-xs-7 col-7">
                            <router-link :to="{ name: 'addHomePageBanner' }" tag="button" class="btn btn-default dv_filter_common" data-toggle="tooltip" data-placement="top" title="Add Banner">
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
                                    <th style="width: 10%;" class="text-muted">ID </th>
                                    <th style="width: 15%;" class="text-muted">banner type </th>
                                    <th style="width: 15%;" class="text-muted">desktop </th>
                                    <th style="width: 15%;" class="text-muted">mobile </th>
                                    <th style="width: 10%;" class="text-muted">status </th>
                                    <th style="width: 3%;" class="text-muted">view </th>
                                    <th style="width: 3%;" class="text-muted">delete </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(banner,index) in getBanners.data" :key="index" class="v-middle">
                                    <td>{{ banner['id'] }}</td>
                                    <td>{{ banner['banner']['name'] }}</td>
                                    <td><img :src="baseUrlImage+banner['image']" style=" width: 100px; "></td>
                                    <td><img :src="baseUrlImage+banner['mobile_image']" style=" width: 60px; "></td>
                                    <td>
                                        <label class="ui-switch ui-switch-md info m-t-xs"><input checked="" v-model="banner['status']" @input="updateStatus($event, banner['id'])" type="checkbox"> <i></i></label>
                                    </td>
                                    <td>
                                        <router-link :to="{ name : 'viewHomePageBanner', params: { banner_image_id: banner.id } }">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="dv_sub_category_edit"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg>
                                        </router-link>
                                    </td>
                                    <td>
                                         <button @click="deleteHomePageBanner(banner['id'])" type="text" class="btn btn-default dv_selected_delete_common mr-0" data-toggle="tooltip" data-placement="top" title="Delete Selected Entries">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <pagination :data="getBanners" @pagination-change-page="getHomePageBanners"></pagination>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import Vue from 'vue'
import { mapState } from 'vuex'
import { deleteEmptyKeys } from "../../mixins";
import { GET_HOME_PAGE_BANNERS_ACTION, UPDATE_HOME_PAGE_BANNER_ACTION, DELETE_HOME_PAGE_BANNER_ACTION  } from '@admin/store/design/actions'
export default {
    components: { },
    data() {
        return {
            baseUrl:Vue.config.baseUrl,
            baseUrlImage: Vue.config.baseUrlImage,
            filters: {
                page: 1,
                search: ''
            }
        }
    },
    computed:{
        ...mapState({
            getBanners: state => state.getDesign.getHomePageBanners
        })
    },
    mounted() {
        this.getHomePageBanners();
    },
    methods: {
        getHomePageBanners: function(page=1) {
            let query = [];
            this.filters['page'] = page;
            query['params'] = deleteEmptyKeys(this.filters);
            this.$store.dispatch('getDesign/' + GET_HOME_PAGE_BANNERS_ACTION, query);
        },
        updateStatus: function(event, banner_image_id) {
            this.$store.dispatch('getDesign/' + UPDATE_HOME_PAGE_BANNER_ACTION, { banner_image_id, status: event.target.checked });
        },
        deleteHomePageBanner: function(banner_image_id) {
            if (confirm('Please confirm to delete banner.')) {
                this.$store.dispatch('getDesign/' + DELETE_HOME_PAGE_BANNER_ACTION, { banner_image_id }).then(() => {
                    this.getHomePageBanners();
                });
            }
        }
    }
}
</script>