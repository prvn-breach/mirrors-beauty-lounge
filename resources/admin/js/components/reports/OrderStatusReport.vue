<template>
    <div id="content" class="flex">
        <div class="page-container">
            <div class="pt-3 pr-3 pb-5 pl-3">
                <div class="mb-5">
                    <h2 class="dv_page_heading mb-0">Order Status Report</h2>
                    <div class="row dv_search_delete_action_common">
                        <div class="col-md-5 col-sm-5 col-xs-5 col-5"></div>
                        <div class="col-md-7 col-sm-7 col-xs-7 col-7">
                            <button @click="excelDownload" type="text" class="btn btn-default dv_export_common" data-toggle="tooltip" data-placement="top" title="Download CSV">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="7 10 12 15 17 10"></polyline><line x1="12" y1="15" x2="12" y2="3"></line></svg>
                            </button>
                            <button type="text" class="btn btn-default dv_selected_filter_common" data-toggle="tooltip" data-placement="top" title="Filter">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"></polygon></svg>
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
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize d-block w-100" for="name">period</label>
                                                <select v-model="filters.period" class="form-control dv_common_select_for_all">
                                                    <option value="">Select </option>
                                                    <option value="current_year">This year </option>
                                                    <option value="current_month">This month </option>
                                                    <option value="current_week">This week</option>
                                                    <option value="current_day">This day</option>
                                                    <option value="0">Custom</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3" v-if="filters.period == '0'">
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize" for="name">From to - to Date</label>
                                                <input v-model="filters.date" type="text" class="form-control dv_common_input_for_all" name="" placeholder="Select">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <button type="button" class="btn btn-default dv_save_submit_btn" style="margin-top: 26px;" @click="getOrderStatusReportData">Filter</button>
                                        </div>
                                    </div>
                                </div>
                            </div>                                    
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="graph-tab" data-toggle="tab" href="#graph" role="tab" aria-controls="graph" aria-selected="true">Graph</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="table-tab" data-toggle="tab" href="#table" role="tab" aria-controls="table" aria-selected="false">Table</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="graph" role="tabpanel" aria-labelledby="graph-tab">
                                    <div class="card mb-3">
                                        <div class="card-header"><strong>Order Graph </strong></div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div style="width: 500px; margin: 2% auto 0 auto;">
                                                        <canvas id="myChart" style="width: 400px; height: 400px;"></canvas>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="table" role="tabpanel" aria-labelledby="table-tab">
                                    <div class="table-responsive">
                                        <table class="table table-theme table-row v-middle">
                                            <thead>
                                                <tr>
                                                    <th style="width: 50%;" class="text-muted">status</th>
                                                    <th style="width: 50%;" class="text-muted">total price</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr v-for="(data,index) in getOrderStatusReport" :key="index" class="v-middle">
                                                    <td>{{ data['status'] }}</td>
                                                    <td>{{ data['total_price'] }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
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
import { Chart } from "chart.js";
import { mapState } from 'vuex'
import { deleteEmptyKeys } from "../../mixins";
import { GET_ORDER_STATUS_REPORT_ACTION, EXCEL_DOWNLOAD_ORDER_STATUS_REPORT_ACTION } from '@admin/store/reports/actions'
export default {
    components: { },
    data() {
        return {
            baseUrl:Vue.config.baseUrl,
            baseUrlImage: Vue.config.baseUrlImage,
            filters: {
                page: 1,
                period: '',
                date: ''
            },
            myChart: null
        }
    },
    computed:{
        ...mapState({
            getOrderStatusReport: state => state.getReport.getOrderStatusReport,
            excelLink: state => state.getReport.excelLink
        })
    },
    mounted() {
        this.getOrderStatusReportData();
    },
    methods: {
        getOrderStatusReportData: function(page = 1) {
            let query = [];
            this.filters['page'] = page;
            query['params'] = deleteEmptyKeys(this.filters);
            if (this.$admin['role_id'] == 2) {
                query['params']['created_by'] = this.$admin['id'];
            }
            this.$store.dispatch('getReport/' + GET_ORDER_STATUS_REPORT_ACTION, query).then(() => {
                this.chartConfig();
            });
        },
        excelDownload: function() {
            let query = [];
            let params = {
                response_type: 'xlsx',
                period: this.filters['period'],
                date: this.filters['date']
            };
            query['params'] = deleteEmptyKeys(params);
            if (this.$admin['role_id'] == 2) {
                query['params']['created_by'] = this.$admin['id'];
            }
            this.$store.dispatch('getReport/' + EXCEL_DOWNLOAD_ORDER_STATUS_REPORT_ACTION, query).then(() => {
                const link = document.createElement("a");
                link.href = this.excelLink;
                link.setAttribute("download", "OrderStatusReport.xlsx"); //or any other extension
                document.body.appendChild(link);
                link.click();
            });
        },
        chartConfig: function() {
            if (this.myChart!=null) {
                this.myChart.destroy();
            }
            var ctx = document.getElementById('myChart').getContext('2d');
            let data = [];
            let labels = Object.keys(this.getOrderStatusReport);
            labels.forEach(label => {
                if (this.getOrderStatusReport[label]) {
                    data.push(this.getOrderStatusReport[label]['total_price']);
                }
            });
            this.myChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: labels,
                    datasets: [
                        {
                            data: data,
                            backgroundColor: ['#fc033d', '#1c32ad', '#1cba2e', '#708008', '#8c2f07', '#11cad4'],
                        }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                        title: {
                            display: false,
                            text: 'Chart.js Pie Chart'
                        }
                    }
                }
            });

            this.myChart.update();
        }
    }
}
</script>