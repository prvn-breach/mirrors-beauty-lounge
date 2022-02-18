<template>
    <div id="content" class="flex">
        <div class="page-container">
            <div class="pt-3 pr-3 pb-5 pl-3">
                <div class="mb-5">
                    <h2 class="dv_page_heading">Sub Categories </h2>
                    <div class="row dv_search_delete_action_common">
                        <div class="col-md-5 col-sm-5 col-xs-5 col-5">
                            <!-- <input type="text" class="form-control dv_common_search_for_all" name="" placeholder="Search"> -->
                        </div>
                        <div class="col-md-7 col-sm-7 col-xs-7 col-7">
                            <router-link :to="{ name : 'addSubCategory'}" tag ="button" class="btn btn-default dv_filter_common">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                            </router-link>
                            <button type="button" @click="excelDownload" class="btn btn-default dv_export_common" data-toggle="tooltip" data-placement="top" title="Download CSV">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="7 10 12 15 17 10"></polyline><line x1="12" y1="15" x2="12" y2="3"></line></svg>
                            </button>
                        </div>
                    </div>
                    <pagination v-if="Object.keys(subCategories).length > 0" class="mt-2" :data="subCategories" @pagination-change-page="getSubCategories"></pagination>
                    <div class="table-responsive">
                        <table class="table table-theme table-row v-middle">
                            <thead>
                                <tr>
                                    <th class="text-muted sortable" @click="sorting(order('parent_id'), 'parent_id')">Category</th>
                                    <th class="text-muted sortable"  @click="sorting(order('name'), 'name')">Sub Category</th>
                                    <th class="text-muted">Image</th>
                                    <th class="text-muted" style="width: 5%;">Status</th>
                                    <th class="text-muted" style="width: 5%;">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="v-middle" v-for="(sub_category,index) in subCategories.data" :key="index">
                                    <td>
                                        <strong>{{sub_category.category.name}} </strong>
                                    </td>
                                    <td>
                                        <strong>{{sub_category.name}} </strong>
                                    </td>
                                    <td>
                                        <img v-if="sub_category.icon" :src="baseUrlImage+sub_category.icon" alt="">
                                        <img v-else :src="baseUrlImage+'images/default_admin.jpg'" alt="" width="50" height="50">
                                    </td>
                                    <td>
                                        <div class="dv_active_inactive_sub_cate_list">
                                            <label class="ui-switch ui-switch-md info m-t-xs"><input :checked="sub_category.status=='A'" @change="updateStatus($event, sub_category)" type="checkbox"> <i></i></label>
                                        </div>  
                                    </td>
                                    <td>
                                        <router-link :to="{ name : 'editSubCategory', params : { sub_category_id: sub_category.id }}" >
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="dv_sub_category_edit"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg>
                                        </router-link>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <pagination v-if="Object.keys(subCategories).length > 0" :data="subCategories" @pagination-change-page="getSubCategories"></pagination>
                </div>
            </div>
        </div>
    </div>
</template>
<script type="text/javascript">
import Vue from 'vue'
import { mapState } from 'vuex'
import { GET_SUBCATEGORIES_ACTION, EXCEL_DOWNLOAD_SUBCATEGORIES_ACTION, UPDATE_SUBCATEGORY_ACTION } from '@admin/store/sub-categories/actions'
export default {
    components: { },
    data() {
        return {
            baseUrl: Vue.config.baseUrl,
            baseUrlImage: Vue.config.baseUrlImage,
            filters: {
                orderBy: 'asc',
                sortBy: 'id'
            }
        }
    },
    computed:{
        ...mapState({
            getError: state => state.getSubCategory.getError,
            subCategories: state => state.getSubCategory.getSubCategories,
            excelLink: state => state.getSubCategory.excelLink
        }),
    },
    methods: {
        updateStatus:function(event, sub_category){
            let _this = this;
            let params = {
                id: sub_category.id,
            };
            if(event.target.checked == true){
                params.status = 'A'; 
            } else {
                params.status = 'I'; 
            }
            _this.$store.dispatch('getSubCategory/' + UPDATE_SUBCATEGORY_ACTION, params);
        },
        getSubCategories:function(page=1){
            let query = [];
            query['params'] = {
                sortBy: this.filters.sortBy,
                orderBy: this.filters.orderBy,
                page: page,
                per_page: 50
            }
            if (this.$admin['role_id'] == 2) {
                query['params'] = { created_by:this.$admin['id']  };
            }
            this.$store.dispatch('getSubCategory/' + GET_SUBCATEGORIES_ACTION, query);
        },
        excelDownload: function() {
            let query = [];
            let params = {
                response_type: 'xlsx'
            };
            query['params'] = this.deleteEmptyKeys(params);
            if (this.$admin['role_id'] == 2) {
                query['params']['created_by'] = this.$admin['id'];
            }
            this.$store.dispatch('getSubCategory/' + EXCEL_DOWNLOAD_SUBCATEGORIES_ACTION, query).then(() => {
                const link = document.createElement("a");
                link.href = this.excelLink;
                link.setAttribute("download", "SubCategories.xlsx");
                document.body.appendChild(link);
                link.click();
            });
        },
        sorting(orderBy, sortBy) {
            this.filters.orderBy = orderBy;
            this.filters.sortBy = sortBy;
            this.getSubCategories();
        },
        order(sortBy) {
            if ((this.filters.sortBy == sortBy) && (this.filters.orderBy == 'desc')) {
                return 'asc';
            } else if ((this.filters.sortBy == sortBy) && (this.filters.orderBy == 'asc')) {
                return 'desc'
            } else {
                return 'desc';
            }
        }
    },
    mounted(){
        this.getSubCategories();
    }
}
</script>