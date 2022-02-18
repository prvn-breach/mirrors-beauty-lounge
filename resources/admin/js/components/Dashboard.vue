<template>
    <div id="content" class="flex">
        <div class="page-container">
            <div class="pt-3 pr-3 pb-5 pl-3">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="dv_page_heading">dashboard </h2>
                        <div class="row">
                            <p class="text-muted d-block w-100 ml-3 mr-3"><strong>Orders </strong></p>
                            <div class="col-md-3">
                                <router-link :to="{ name: 'getOrders' }" class="count">
                                    <div class="card bg-default">
                                        <div class="card-header no-border">Total orders </div>
                                        <div class="card-body">
                                            <div class="d-flex align-items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="dv_dahboard_all_icons dv_dahboard_default_icons"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                                                <span
                                                    class="text-md mx-2"
                                                    data-plugin="countTo"
                                                    data-option="{
                                    from: 0,
                                    to: 785,
                                    refreshInterval: 15,
                                    speed: 1000,
                                    formatter: function (value, options) {
                                        return value.toFixed(options.decimals).replace(/\B(?=(?:\d{3})+(?!\d))/g, ',');
                                    }
                                    }"
                                                >{{ getOrdersCount.total_orders }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </router-link>
                            </div>
                            <div class="col-md-3">
                                <router-link :to="{ name: 'getShippingOrders' }" class="count">
                                    <div class="card bg-default">
                                        <div class="card-header no-border">Delivered orders </div>
                                        <div class="card-body">
                                            <div class="d-flex align-items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="dv_dahboard_all_icons dv_dahboard_succesful_icons"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                                                <span
                                                    class="text-md mx-2"
                                                    data-plugin="countTo"
                                                    data-option="{
                                    from: 0,
                                    to: 785,
                                    refreshInterval: 15,
                                    speed: 1000,
                                    formatter: function (value, options) {
                                        return value.toFixed(options.decimals).replace(/\B(?=(?:\d{3})+(?!\d))/g, ',');
                                    }
                                    }"
                                                >{{ getOrdersCount.delivered_orders }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </router-link>
                            </div>
                            <div class="col-md-3">
                                <router-link :to="{ name: 'getCancelledOrders' }" class="count">
                                    <div class="card bg-default">
                                        <div class="card-header no-border">Cancelled orders </div>
                                        <div class="card-body">
                                            <div class="d-flex align-items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="dv_dahboard_all_icons dv_dahboard_cancelled_icons"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                                                <span
                                                    class="text-md mx-2"
                                                    data-plugin="countTo"
                                                    data-option="{
                                    from: 0,
                                    to: 123,
                                    refreshInterval: 15,
                                    speed: 1000,
                                    formatter: function (value, options) {
                                        return value.toFixed(options.decimals).replace(/\B(?=(?:\d{3})+(?!\d))/g, ',');
                                    }
                                    }"
                                                >{{ getOrdersCount.cancelled_orders }}</span>
                                            </div> 
                                        </div>
                                    </div>
                                </router-link>
                            </div>
                            <div class="col-md-3">
                                <router-link :to="{ name: 'getInCompleteOrders' }" class="count">
                                    <div class="card bg-default">
                                        <div class="card-header no-border">Pending orders </div>
                                        <div class="card-body">
                                            <div class="d-flex align-items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="dv_dahboard_all_icons dv_dahboard_pending_icons"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                                                <span
                                                    class="text-md mx-2"
                                                    data-plugin="countTo"
                                                    data-option="{
                                    from: 0,
                                    to: 89,
                                    refreshInterval: 15,
                                    speed: 1000,
                                    formatter: function (value, options) {
                                        return value.toFixed(options.decimals).replace(/\B(?=(?:\d{3})+(?!\d))/g, ',');
                                    }
                                    }"
                                                >{{ getOrdersCount.pending_orders }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </router-link>
                            </div>

                            <p class="text-muted d-block w-100 ml-3 mr-3"><strong>Sales </strong></p>
                            <div class="col-md-3">
                                <router-link :to="{ name: 'getOrders' }" class="count">
                                    <div class="card bg-default">
                                        <div class="card-header no-border">Total sale </div>
                                        <div class="card-body">
                                            <div class="d-flex align-items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="dv_dahboard_all_icons dv_dahboard_default_icons"><line x1="18" y1="20" x2="18" y2="10"></line><line x1="12" y1="20" x2="12" y2="4"></line><line x1="6" y1="20" x2="6" y2="14"></line></svg>
                                                <span
                                                    class="text-md mx-2"
                                                    data-plugin="countTo"
                                                    data-option="{
                                    from: 0,
                                    to: 785,
                                    refreshInterval: 15,
                                    speed: 1000,
                                    formatter: function (value, options) {
                                        return value.toFixed(options.decimals).replace(/\B(?=(?:\d{3})+(?!\d))/g, ',');
                                    }
                                    }"
                                                >{{ parseInt(getOrdersCount.total_sales) }} AED</span>
                                            </div>
                                        </div>
                                    </div>
                                </router-link>
                            </div>
                            <div class="col-md-3">
                                <router-link :to="{ name: 'getShippingOrders' }" class="count">
                                    <div class="card bg-default">
                                        <div class="card-header no-border">Delivered sales </div>
                                        <div class="card-body">
                                            <div class="d-flex align-items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="dv_dahboard_all_icons dv_dahboard_succesful_icons"><line x1="18" y1="20" x2="18" y2="10"></line><line x1="12" y1="20" x2="12" y2="4"></line><line x1="6" y1="20" x2="6" y2="14"></line></svg>
                                                <span
                                                    class="text-md mx-2"
                                                    data-plugin="countTo"
                                                    data-option="{
                                    from: 0,
                                    to: 785,
                                    refreshInterval: 15,
                                    speed: 1000,
                                    formatter: function (value, options) {
                                        return value.toFixed(options.decimals).replace(/\B(?=(?:\d{3})+(?!\d))/g, ',');
                                    }
                                    }"
                                                >{{ parseInt(getOrdersCount.delivered_sales) }} AED</span>
                                            </div>
                                        </div>
                                    </div>
                                </router-link>
                            </div>
                            <div class="col-md-3">
                                <router-link :to="{ name: 'getCancelledOrders' }" class="count">
                                    <div class="card bg-default">
                                        <div class="card-header no-border">Cancelled sales </div>
                                        <div class="card-body">
                                            <div class="d-flex align-items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="dv_dahboard_all_icons dv_dahboard_cancelled_icons"><line x1="18" y1="20" x2="18" y2="10"></line><line x1="12" y1="20" x2="12" y2="4"></line><line x1="6" y1="20" x2="6" y2="14"></line></svg>
                                                <span
                                                    class="text-md mx-2"
                                                    data-plugin="countTo"
                                                    data-option="{
                                    from: 0,
                                    to: 123,
                                    refreshInterval: 15,
                                    speed: 1000,
                                    formatter: function (value, options) {
                                        return value.toFixed(options.decimals).replace(/\B(?=(?:\d{3})+(?!\d))/g, ',');
                                    }
                                    }"
                                                >{{ parseInt(getOrdersCount.cancelled_sales) }} AED</span>
                                            </div> 
                                        </div>
                                    </div>
                                </router-link>
                            </div>
                            <div class="col-md-3">
                                <router-link :to="{ name: 'getInCompleteOrders' }" class="count">
                                    <div class="card bg-default">
                                        <div class="card-header no-border">Pending sales </div>
                                        <div class="card-body">
                                            <div class="d-flex align-items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="dv_dahboard_all_icons dv_dahboard_pending_icons"><line x1="18" y1="20" x2="18" y2="10"></line><line x1="12" y1="20" x2="12" y2="4"></line><line x1="6" y1="20" x2="6" y2="14"></line></svg>
                                                <span
                                                    class="text-md mx-2"
                                                    data-plugin="countTo"
                                                    data-option="{
                                    from: 0,
                                    to: 89,
                                    refreshInterval: 15,
                                    speed: 1000,
                                    formatter: function (value, options) {
                                        return value.toFixed(options.decimals).replace(/\B(?=(?:\d{3})+(?!\d))/g, ',');
                                    }
                                    }"
                                                >{{ parseInt(getOrdersCount.pending_sales) }} AED</span>
                                            </div>
                                        </div>
                                    </div>
                                </router-link>
                            </div>

                            <p class="text-muted d-block w-100 ml-3 mr-3"><strong>Products </strong></p>

                            <div class="col-md-3">
                                <router-link :to="{ name: 'getProducts' }" class="count">
                                    <div class="card bg-default">
                                        <div class="card-header no-border">Total products </div>
                                        <div class="card-body">
                                            <div class="d-flex align-items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="dv_dahboard_all_icons dv_dahboard_default_icons"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg>
                                                <span
                                                    class="text-md mx-2"
                                                    data-plugin="countTo"
                                                    data-option="{
                                    from: 0,
                                    to: 785,
                                    refreshInterval: 15,
                                    speed: 1000,
                                    formatter: function (value, options) {
                                        return value.toFixed(options.decimals).replace(/\B(?=(?:\d{3})+(?!\d))/g, ',');
                                    }
                                    }"
                                                >{{ getOrdersCount.total_products }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </router-link>
                            </div>
                            <div class="col-md-3">
                                <router-link :to="{ name: 'getProducts' }" class="count">
                                    <div class="card bg-default">
                                        <div class="card-header no-border">Active products </div>
                                        <div class="card-body">
                                            <div class="d-flex align-items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="dv_dahboard_all_icons dv_dahboard_succesful_icons"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg>
                                                <span
                                                    class="text-md mx-2"
                                                    data-plugin="countTo"
                                                    data-option="{
                                    from: 0,
                                    to: 785,
                                    refreshInterval: 15,
                                    speed: 1000,
                                    formatter: function (value, options) {
                                        return value.toFixed(options.decimals).replace(/\B(?=(?:\d{3})+(?!\d))/g, ',');
                                    }
                                    }"
                                                >{{ getOrdersCount.active_products }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </router-link>
                            </div>
                            <div class="col-md-3">
                                <router-link :to="{ name: 'getProducts' }" class="count">
                                    <div class="card bg-default">
                                        <div class="card-header no-border">Inactive products </div>
                                        <div class="card-body">
                                            <div class="d-flex align-items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="dv_dahboard_all_icons dv_dahboard_cancelled_icons"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg>
                                                <span
                                                    class="text-md mx-2"
                                                    data-plugin="countTo"
                                                    data-option="{
                                    from: 0,
                                    to: 123,
                                    refreshInterval: 15,
                                    speed: 1000,
                                    formatter: function (value, options) {
                                        return value.toFixed(options.decimals).replace(/\B(?=(?:\d{3})+(?!\d))/g, ',');
                                    }
                                    }"
                                                >{{ getOrdersCount.inactive_products }}</span>
                                            </div> 
                                        </div>
                                    </div>
                                </router-link>
                            </div>
                            <div class="col-md-3">
                                <router-link :to="{ name: 'getProducts' }" class="count">
                                    <div class="card bg-default">
                                        <div class="card-header no-border">Out of stock </div>
                                        <div class="card-body">
                                            <div class="d-flex align-items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="dv_dahboard_all_icons dv_dahboard_pending_icons"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg>
                                                <span
                                                    class="text-md mx-2"
                                                    data-plugin="countTo"
                                                    data-option="{
                                    from: 0,
                                    to: 89,
                                    refreshInterval: 15,
                                    speed: 1000,
                                    formatter: function (value, options) {
                                        return value.toFixed(options.decimals).replace(/\B(?=(?:\d{3})+(?!\d))/g, ',');
                                    }
                                    }"
                                                >{{ getOrdersCount.out_of_stock_products }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </router-link>
                            </div>
                            <div class="col-12">
                                <div class="d-flex mb-3">
                                <p class="text-muted d-block w-100 mr-3"><strong>Sale Chart </strong></p>
                                    <span class="flex"></span>
                                    <div>
                                        <div class="btn-group btn-group-toggle" id="btn_l_4" data-toggle="buttons"><label class="btn active" @click="chartConfig('month')"><input type="radio" name="options"> Month</label><label class="btn" @click="chartConfig('year')"><input type="radio" name="options"> Year</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="card pl-2 pb-2 pr-2 pt-4" style="height: 430px;">
                                    <canvas id="myChart" style="height: 100%;"></canvas>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <p class="text-muted d-block w-100 mr-3"><strong>Latest Orders </strong></p>
                                <div class="table-responsive">
                                    <table class="table table-theme table-row v-middle">
                                        <thead>
                                            <tr>
                                                <th class="text-muted">date </th>
                                                <th class="text-muted">order# </th>
                                                <th class="text-muted">customer </th>
                                                <th class="text-muted">amount </th>
                                                <th class="text-muted">status </th>
                                                <th class="text-muted">action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="(order,index) in getOrders.data" :key="index" class="v-middle">
                                                <td>
                                                    <a href="#!">
                                                        <strong>{{ order['created_at'].split('T')[0] }}</strong>
                                                    </a>
                                                </td>
                                                <td>
                                                    <div class="text-muted text-sm">
                                                        {{ order['id'] }}
                                                    </div> 
                                                </td>
                                                <td>
                                                    <div class="text-muted text-sm">
                                                        {{ order['order_user'] ? order['order_user']['name'] : '' }}
                                                    </div> 
                                                </td>
                                                <td><span class="font-bold">AED {{ order['order_payment']['total'] }}</span> </td>
                                                <td>
                                                    <span :class="order_shipping_statuses[order.order_status_shipping.status]['class']">{{ order_shipping_statuses[order.order_status_shipping.status]['label'] }}</span>
                                                </td>
                                                <td>
                                                    <router-link :to="{ name : 'orderDetail', params: { order_id: order.id } }">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="dv_row_action_drp_svg_eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                                    </router-link>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <pagination :data="getOrders" @pagination-change-page="getOrdersList"></pagination>
                            </div>

                            <div class="col-md-12">
                                <p class="text-muted d-block w-100 mr-3"><strong>Top Category </strong></p>
                                <div class="table-responsive">
                                    <table class="table table-theme table-row v-middle">
                                        <thead>
                                            <tr>
                                                <th class="text-muted">category name </th>
                                                <th class="text-muted">sales </th>
                                                <th class="text-muted">action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="(category,index) in getCategorySales.data" :key="index" class="v-middle">
                                                <td>
                                                    <div class="text-muted text-sm">
                                                        {{ category['category'] ? category['category']['name']: '' }}
                                                    </div> 
                                                </td>
                                                <td><span class="font-bold">AED {{ category['total_price'] }}</span></td>
                                                <td>
                                                    <router-link :to="{ name : 'addCategory', params : { category_id: category['category_id'] }}" >
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="dv_row_action_drp_svg_eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                                    </router-link>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <pagination :data="getCategorySales" @pagination-change-page="getCategorySalesReport"></pagination>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import { Chart } from 'chart.js';
import { mapState } from 'vuex'
import { GET_TOP_CATEGORY_SALES_REPORT_ACTION } from '@admin/store/reports/actions';
import { LOAD_ORDER_LIST_ACTION, GET_ORDERS_COUNT_ACTION  } from '@admin/store/orders/actions'
export default {
    components: { },
    data() {
        return {
            order_shipping_statuses: {
				N: {
                    label: 'NEW',
                    class: 'badge badge-info'
                },
                V: {
                    label: 'CONFIRMED',
                    class: 'badge badge-primary'
                },
				S: {
                    label: 'SHIPPED',
                    class: 'badge badge-warning'
                },
				D: {
                    label: 'DELIVERED',
                    class: 'badge badge-success'
                },
				R: {
                    label: 'RETURNED',
                    class: 'badge badge-dark'
                },
				C: {
                    label: 'CANCELLED',
                    class: 'badge badge-danger'
                }
            },
            myChart: null
        }
    },
    computed:{
        ...mapState({
            getOrders: state => state.getOrder.getOrders,
            getOrdersCount: state => state.getOrder.getOrdersCount,
            getCategorySales: state => state.getReport.getTopCategorySalesReport
        })
    },
    mounted() {
        this.getCategorySalesReport();
        this.getOrdersList();
        this.getOrdersCountData();
    },
    methods: {
        getCategorySalesReport: function(page = 1) {
            let query = [];
            query['params'] = { page, sort_by: 'total_price', order: 'desc' };
            if (this.$admin['role_id'] == 2) {
                query['params']['created_by'] = this.$admin['id'];
            }
            this.$store.dispatch('getReport/' + GET_TOP_CATEGORY_SALES_REPORT_ACTION, query);
        },
        getOrdersList: function(page = 1) {
            let query = {};
            query['params'] = { page: page };
            if (this.$admin['role_id'] == 2) {
                query['params']['created_by'] = this.$admin['id'];
            }
            this.$store.dispatch('getOrder/' + LOAD_ORDER_LIST_ACTION, query);
        },
        getOrdersCountData: function() {
            let query = {};
            query['params'] = {};

            if (this.$admin['role_id'] == 2) {
                query['params']['created_by'] = this.$admin['id'];
            }
            this.$store.dispatch('getOrder/' + GET_ORDERS_COUNT_ACTION, query).then(() => {
                this.chartConfig('month');
            });
        },
        chartConfig: function(type='month') {
            if (this.myChart!=null) {
                this.myChart.destroy();
            }
            const labels = [];
            const datapoints = [];
            if (type == 'month') {
                this.getOrdersCount.monthly_data.forEach(month => {
                    labels.push(month.month);
                    datapoints.push(month.count);
                });
            }

            if (type == 'year') { 
                this.getOrdersCount.yearly_data.forEach(year => {
                    labels.push(year.year);
                    datapoints.push(year.count);
                });
            }
            var ctx = document.getElementById('myChart').getContext('2d');
            // document.getElementById('myChart').height('200');
            this.myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: labels,
                    datasets: [
                        {
                            label: 'Sales',
                            data: datapoints,
                            pointRadius: 5,
                            pointBorderWidth: 0,
                            pointBackgroundColor: 'rgba(0,0,0,0)',
                            pointBorderColor: 'rgba(0,0,0,0)',
                            tension: 0.35,
                            fill: false,
                            borderColor: '#34aeeb',
                            pointHoverRadius: 5,
                            pointHoverBorderColor: '#34aeeb',
                            // pointHoverBackgroundColor: theme.color.primary,
                            pointHoverBorderWidth: 5,
                            borderWidth: 3
                        }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    gradient: true,
                    legend: {
                        display: false
                    },
                    scales: {
                        yAxes:[
                            {
                                ticks: {
                                    min: 0,
                                    max: 120,
                                    stepSize: 20
                                }
                            }
                        ]
                    }
                }
            });

            this.myChart.update();
        }
    }
}
</script>
<style>
.count, .count:hover {
    color: #5e676f;
}
</style>
