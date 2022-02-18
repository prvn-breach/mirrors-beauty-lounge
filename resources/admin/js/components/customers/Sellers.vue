<template>
    <div id="content" class="flex">
        <div class="page-container">
            <div class="pt-3 pr-3 pb-5 pl-3">
                <div class="mb-5">
                    <h2 class="dv_page_heading">Seller Management </h2>
                    <div class="row dv_search_delete_action_common">
                        <div class="col-md-5 col-sm-5 col-xs-5 col-5">
                            <input v-model="filters.search" @input="getSellersList" type="text" class="form-control dv_common_search_for_all" name="" placeholder="Search">
                        </div>
                        <div class="col-md-7 col-sm-7 col-xs-7 col-7">
                            <button @click="excelDownload" type="text" class="btn btn-default dv_export_common" data-toggle="tooltip" data-placement="top" title="Download all Sellers CSV">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="7 10 12 15 17 10"></polyline><line x1="12" y1="15" x2="12" y2="3"></line></svg>
                            </button>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-theme table-row v-middle">
                            <thead>
                                <tr>
                                    <th style="width: 18%;" class="text-muted">Name </th>
                                    <th style="width: 20;" class="text-muted">email </th>
                                    <th style="width: 20;" class="text-muted">gender </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(seller,index) in getSellers.data" :key="index" class="v-middle">
                                    <td>
                                        <span class="item-except text-muted text-sm h-1x">
                                            {{ seller.name }}
                                        </span>
                                    </td>
                                    <td>
                                        <span class="item-except text-muted text-sm h-1x">
                                            {{ seller.email }}
                                        </span>
                                    </td>
                                    <td>
                                        <span class="item-except text-muted text-sm h-1x">
                                            {{ seller.gender }}
                                        </span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import Vue from 'vue'
import { mapState } from 'vuex'
import { deleteEmptyKeys } from "../../mixins";
import { GET_SELLERS_ACTION, EXCEL_DOWNLOAD_SELLERS_ACTION  } from '@admin/store/customers/actions'
export default {
    components: { },
    data() {
        return {
            baseUrl:Vue.config.baseUrl,
            baseUrlImage: Vue.config.baseUrlImage,
            filters: {
                page: 1,
                search: '',
            }
        }
    },
    computed:{
        ...mapState({
            getSellers: state => state.getCustomer.getSellers,
            excelLink: state => state.getCustomer.excelLink
        })
    },
    mounted() {
        this.getSellersList();
    },
    methods: {
        getSellersList: function(page=1) {
            let query = [];
            this.filters['page'] = page;
            query['params'] = deleteEmptyKeys(this.filters);
            this.$store.dispatch('getCustomer/' + GET_SELLERS_ACTION, query);
        },
        excelDownload: function() {
            let query = [];
            let params = {
                search: this.filters['search'],
                response_type: 'xlsx'
            };
            query['params'] = deleteEmptyKeys(params);
            this.$store.dispatch('getCustomer/' + EXCEL_DOWNLOAD_SELLERS_ACTION, query).then(() => {
                const link = document.createElement("a");
                link.href = this.excelLink;
                link.setAttribute("download", "sellers.xlsx");
                document.body.appendChild(link);
                link.click();
            });
        }
    }
}
</script>