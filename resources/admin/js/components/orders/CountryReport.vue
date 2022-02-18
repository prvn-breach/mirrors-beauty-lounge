<template>
    <div id="content" class="flex">
        <div class="page-container">
            <div class="pt-3 pr-3 pb-5 pl-3">
                <div class="mb-5">
                    <h2 class="dv_page_heading">Country Report </h2>
                    <div class="row dv_search_delete_action_common">
                        <div class="col-md-5 col-sm-5 col-xs-5 col-5">
                            <input type="text" @input="getCountryReport" v-model="filters.search" class="form-control dv_common_search_for_all" name="" placeholder="Search">
                        </div>
                        <div class="col-md-7 col-sm-7 col-xs-7 col-7">
                            <button @click="excelDownload" type="text" class="btn btn-default dv_export_common" data-toggle="tooltip" data-placement="top" title="Download all Product CSV">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="7 10 12 15 17 10"></polyline><line x1="12" y1="15" x2="12" y2="3"></line></svg>
                            </button>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-theme table-row v-middle">
                            <thead>
                                <tr>
                                    <th style="width: 8%;" class="text-muted">sr no</th>
                                    <th style="width: 60%;" class="text-muted">country</th>
                                    <th style="width: 12%;" class="text-muted">no of orders </th>
                                    <th style="width: 15%;" class="text-muted">order total </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(report,index) in getReportData.data" :key="index" class="v-middle">
                                    <td>{{ index + 1 }} </td>
                                    <td>{{ report['country'] }}</td>
                                    <td>
                                        <strong class="text-muted">{{ report['no_of_orders'] }}</strong>
                                    </td>
                                    <td>
                                        <strong>AED {{ report['total_amount'] }}</strong>
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
import { GET_COUNTRY_REPORT_ACTION, EXCEL_DOWNLOAD_COUNTRY_REPORT_ACTION } from '@admin/store/orders/actions'
export default {
    data(){
        return {
            baseUrl:Vue.config.baseUrl,
            baseUrlImage: Vue.config.baseUrlImage,
            filters: {
                search: ''
            }
        }
    },
    computed:{
        ...mapState({
            getReportData: state => state.getOrder.getCountryReport,
            excelLink: state => state.getOrder.excelLink
        })
    },
    mounted() {
        this.getCountryReport();
    },
    methods: {
        getCountryReport: function (){
            let query = [];
            query['params'] = deleteEmptyKeys(this.filters);
            this.$store.dispatch('getOrder/' + GET_COUNTRY_REPORT_ACTION, query);
        },
        excelDownload: function() {
            let query = [];
            let params = {
                page: this.filters['page'],
                response_type: 'xlsx'
            };
            query['params'] = deleteEmptyKeys(params);
            this.$store.dispatch('getOrder/' + EXCEL_DOWNLOAD_COUNTRY_REPORT_ACTION, query).then(() => {
                const link = document.createElement("a");
                link.href = this.excelLink;
                link.setAttribute("download", "CountryReport.xlsx");
                document.body.appendChild(link);
                link.click();
            });
        }
    }
}
</script>