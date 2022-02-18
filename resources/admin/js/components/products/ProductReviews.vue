<template>
    <div id="content" class="flex">
        <div class="page-container">
            <div class="pt-3 pr-3 pb-5 pl-3">
                <div class="mb-5">
                    <h2 class="dv_page_heading">Product Review </h2>
                    <div class="row dv_search_delete_action_common">
                        <div class="col-md-5 col-sm-5 col-xs-5 col-5">
                            <input v-model="filters.search" @input="getProductReviews" type="text" class="form-control dv_common_search_for_all" name="" placeholder="Search">
                        </div>
                        <div class="col-md-7 col-sm-7 col-xs-7 col-7">
                            <button @click="deleteReviews" type="text" :disabled="selected_reviews.length==0" class="btn btn-default dv_selected_delete_common" data-toggle="tooltip" data-placement="top" title="Delete Selected Reviews">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                            </button>
                            <button @click="excelDownload" type="text" class="btn btn-default dv_export_common" data-toggle="tooltip" data-placement="top" title="Download CSV">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="7 10 12 15 17 10"></polyline><line x1="12" y1="15" x2="12" y2="3"></line></svg>
                            </button>
                        </div>
                    </div>
                    <pagination class="mt-2" :data="getReviews" @pagination-change-page="getProductReviews"></pagination>
                    <div class="table-responsive">
                        <table class="table table-theme table-row v-middle">
                            <thead>
                                <tr>
                                    <th style="width: 20px;">
                                        <label class="ui-check m-0 ui-check-rounded ui-check-md"><input type="checkbox" :checked="getReviews.data && (selected_reviews.length == getReviews.data.length)" @change="allSelect"> <i></i></label>
                                    </th>
                                    <th class="text-muted">Produt code </th>
                                    <th class="text-muted">Product name</th>
                                    <th class="text-muted">Customer</th>
                                    <th class="text-muted">Review Title</th>
                                    <th class="text-muted">Review Description  </th>
                                    <th class="text-muted">Rating </th>
                                    <th class="text-muted">Approved </th>
                                    <th class="text-muted">View </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(review,index) in getReviews.data" :key="index" class="v-middle">
                                    <td>
                                        <label class="ui-check m-0 ui-check-rounded ui-check-md"><input  type="checkbox" id="multi-check" :checked="selected_reviews.includes(review.id)" @change="selectProductReview($event, review.id)"> <i></i></label>
                                    </td>
                                    <td>{{ review['product']['product_code'] }}</td>
                                    <td class="flex">
                                        <div class="item-except text-muted text-sm h-1x">
                                            {{ review['product']['name'] }}
                                        </div>
                                    </td>
                                    <td class="flex">
                                        <div class="item-except text-muted text-sm h-1x">
                                            {{ review['user']['email'] }}
                                        </div>
                                    </td>
                                    <td class="flex">
                                        <div class="item-except text-muted text-sm h-1x">
                                            {{ review['title'] }}
                                        </div>
                                    </td>
                                    <td>
                                        <div class="item-except text-muted text-sm h-1x">
                                            {{ review['description'] }}
                                        </div>
                                    </td>
                                    <td>
                                        {{ review['star'] }}
                                    </td>
                                    <td>
                                        <label class="ui-switch ui-switch-md info m-t-xs"><input checked="" v-model="review['approved']" @input="updateStatus($event, review['id'])" type="checkbox"> <i></i></label>
                                    </td>
                                    <td>
                                        <router-link :to="{ name : 'editProductReview', params : { product_review_id: review.id}}" >
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="dv_sub_category_edit"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg>
                                        </router-link>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <pagination :data="getReviews" @pagination-change-page="getProductReviews"></pagination>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import Vue from 'vue'
import { mapState } from 'vuex'
import { deleteEmptyKeys } from "../../mixins";
import { GET_PRODUCT_REVIEWS_ACTION, UPDATE_PRODUCT_REVIEW_ACTION, DELETE_PRODUCT_REVIEW_ACTION, DELETE_PRODUCT_REVIEWS_ACTION, EXCEL_DOWNLOAD_GET_PRODUCT_REVIEWS_ACTION } from '@admin/store/products/actions'
export default {
    components: { },
    data() {
        return {
            baseUrl:Vue.config.baseUrl,
            baseUrlImage: Vue.config.baseUrlImage,
            filters: {
                search: '',
                page: 1,
                perPage: 50
            },
            selected_reviews: []
        }
    },
    computed:{
        ...mapState({
            getReviews: state => state.getProduct.getProductReviews,
            excelLink: state => state.getProduct.excelLink
        })
    },
    mounted() {
        this.getProductReviews();
    },
    methods: {
        getProductReviews: function(page=1) {
            let query = [];
            this.filters['page'] = page;
            query['params'] = deleteEmptyKeys(this.filters);
            if (this.$admin['role_id'] == 2) {
                query['params']['created_by'] = this.$admin['id'];
            }
            this.$store.dispatch('getProduct/' + GET_PRODUCT_REVIEWS_ACTION, query);
        },
        updateStatus: function(event, review_id) {
            this.$store.dispatch('getProduct/' + UPDATE_PRODUCT_REVIEW_ACTION, { 
                review_id, approved: event.target.checked
            });
        },
        excelDownload: function() {
            let query = [];
            let params = {
                search: this.filters['search'],
                response_type: 'xlsx'
            };
            query['params'] = deleteEmptyKeys(params);
            if (this.$admin['role_id'] == 2) {
                query['params']['created_by'] = this.$admin['id'];
            }
            this.$store.dispatch('getProduct/' + EXCEL_DOWNLOAD_GET_PRODUCT_REVIEWS_ACTION, query).then(() => {
                const link = document.createElement("a");
                link.href = this.excelLink;
                link.setAttribute("download", "ProductReviews.xlsx");
                document.body.appendChild(link);
                link.click();
            });
        },
        selectProductReview(event, product_review_id) {
            if (event.target.checked) {
                this.selected_reviews.push(product_review_id);
            } else {
                this.selected_reviews = this.selected_reviews.filter(id => id!=product_review_id);
            }
        },
        allSelect(event) {
            if (event.target.checked) { 
                this.selected_reviews = this.getReviews.data.map(review => review.id);
            } else {
                this.selected_reviews = [];
            }
        },
        deleteReviews() {
            if (confirm('Please confirm to delete selected reviews.')) {
                let params = {
                    product_review_ids : this.selected_reviews
                };
                this.$store.dispatch('getProduct/' + DELETE_PRODUCT_REVIEWS_ACTION, params).then(() => {
                    this.getProductReviews();
                });
            }
        }
    }
}
</script>