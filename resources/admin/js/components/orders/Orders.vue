<template>
  <div id="content" class="flex">
    <div class="page-container">
      <div class="pt-3 pr-3 pb-5 pl-3">
        <div class="mb-5">
          <h2 class="dv_page_heading">Order List</h2>
          <div class="row dv_search_delete_action_common">
            <div class="col-md-5 col-sm-5 col-xs-5 col-5">
              <input type="text" class="form-control dv_common_search_for_all" v-model="filters.search" @keyup="getOrdersList" name="" placeholder="Search" />
            </div>
            <div class="col-md-7 col-sm-7 col-xs-7 col-7">
                <router-link :to="{ name: 'addOrder' }" tag="button" class="btn btn-default dv_filter_common" data-toggle="tooltip" data-placement="top" title="Add Order">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="12" y1="5" x2="12" y2="19"></line>
                        <line x1="5" y1="12" x2="19" y2="12"></line>
                    </svg>
                </router-link>
                <button type="text" class="btn btn-default dv_export_common" data-toggle="tooltip" data-placement="top" title="Download CSV" @click="excelDownload">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                        <polyline points="7 10 12 15 17 10"></polyline>
                        <line x1="12" y1="15" x2="12" y2="3"></line>
                    </svg>
                </button>
                <button type="text" class="btn btn-default dv_selected_filter_common" data-toggle="tooltip" data-placement="top" title="Filter">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3" ></polygon>
                    </svg>
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
                    <div class="col-md-3" style="overflow: hidden">
                      <div class="form-group">
                        <label class="text-muted text-capitalize d-block w-100" for="name">Shipping Status</label>
                        <select class="form-control dv_common_select_for_all" v-model="filters.shipping_status">
                            <option value="">Selected</option>
                            <option :value="index" v-for="(status, index) in order_shipping_statuses" :key="index">{{ status['label'] }}</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label class="text-muted text-capitalize" for="name">Payment Status</label>
                        <select class="form-control dv_common_select_for_all" v-model="filters.payment_status">
                          <option value="">Selected</option>
                          <option :value="index" v-for="(status, index) in payment_statuses" :key="index">{{ status['label'] }}</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label class="text-muted text-capitalize" for="name">Payment Method</label>
                        <select class="form-control dv_common_select_for_all" v-model="filters.payment_mode">
                            <option value="">Selected</option>
                            <option :value="index" v-for="(method, index) in payment_methods" :key="index">{{ method['label'] }}</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label class="text-muted text-capitalize" for="name">Date</label>
                        <input type="date" class="form-control dv_common_select_for_all" v-model="filters.date" />
                      </div>
                    </div>
                    <div class="col-md-3">
                        <button type="button" class="btn btn-default dv_save_submit_btn" style="margin-top: 26px;" @click="getOrdersList">Filter</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <pagination class="mt-2" :data="getOrders" @pagination-change-page="getOrdersList"></pagination>
          <div class="table-responsive">
            <table class="table table-theme table-row v-middle">
              <thead>
                <tr>
                  <th style="width: 15%" class="text-muted">date</th>
                  <th style="width: 7%" class="text-muted">order#</th>
                  <th style="width: 25%" class="text-muted">customer name</th>
                  <th style="width: 25%" class="text-muted">customer email</th>
                  <th style="width: 12%" class="text-muted">pay. mode</th>
                  <th style="width: 12%" class="text-muted">pay. status</th>
                  <th style="width: 12%" class="text-muted">shipping</th>
                  <th style="width: 12%" class="text-muted">amount</th>
                  <th style="width: 10%" class="text-muted">action</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="(order, index) in getOrders.data" :key="index" class="v-middle">
                  <td>{{ order.created_at }}</td>
                  <td>{{ order.id }}</td>
				  <td>
					  <router-link :to="{ name : 'getCustomerDetail', params: { customer_id: order.user_id } }">
                    		<span class="item-except text-muted text-sm h-1x">{{ order.order_user.name }} </span>
					  </router-link>
                  </td>
                  <td>
					  <router-link :to="{ name : 'getCustomerDetail', params: { customer_id: order.user_id } }">
						<span class="item-except text-muted text-sm h-1x">{{ order.order_user.email }} </span>
					  </router-link>
                  </td>
                  <td>
                    <img :src="payment_methods[order.order_payment.payment_mode]['image']" />
                  </td>
                  <td>
                    <span :class="payment_statuses[order.order_payment.payment_status]['class']"
                      >{{ payment_statuses[order.order_payment.payment_status]['label'] }}
                    </span>
                  </td>
                  <td>
                        <span v-if="order.order_status_shipping.status!='R'" :class="order_shipping_statuses[order.order_status_shipping.status]['class']">{{ order_shipping_statuses[order.order_status_shipping.status]['label'] }}</span>
                        <span v-else :class="return_statuses[order.order_status_shipping.return_status]['class']">{{ return_statuses[order.order_status_shipping.return_status]['label'] }}</span>
                  </td>
                  <td>
                    <strong>AED {{ order.order_payment.total }} </strong>
                  </td>
                  <td>
                      <router-link :to="{ name : 'orderDetail', params: { order_id: order.id } }">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="dv_row_action_drp_svg_eye">
                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                <circle cx="12" cy="12" r="3"></circle>
                            </svg>
                      </router-link>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        <pagination :data="getOrders" @pagination-change-page="getOrdersList"></pagination>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import Vue from 'vue'
import { mapState } from 'vuex'
import { deleteEmptyKeys } from "../../mixins";
import { LOAD_ORDER_LIST_ACTION, EXCEL_DOWNLOAD_ORDERS_ACTION  } from '@admin/store/orders/actions'
export default {
    components: { },
    data() {
        return {
            baseUrl:Vue.config.baseUrl,
            baseUrlImage: Vue.config.baseUrlImage,
            enable_filter: false,
            filters: {
                date: '',
                search: '',
                page: 1,
                per_page: 50,
                payment_mode: "",
                payment_status: "",
                shipping_status: ""
            },
            payment_methods: {
                cash: {
                    label: 'CASH',
                    image: Vue.config.baseUrlImage+'images/payments/cash.png'
                }
            },
            payment_statuses: {
                NOT_PAID: {
                    label: 'NOT PAID',
                    class: 'badge badge-danger text-capitalize'
                },
                PAID: {
                    label: 'PAID',
                    class: 'badge badge-success text-capitalize'
                },
            },
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
            return_statuses: {
                PENDING: {
                    label: 'RETURN PENDING',
                    class: 'badge badge-danger font-weight-bold'
                },
                COMPLETED: {
                    label: 'RETURN COMPLETED',
                    class: 'badge badge-success font-weight-bold'
                }
            },
            excel_fields: [ 'Order Date', 'Order ID', 'Customer Name', 'Customer Email', 'Contact No.', 'Payment Mode', 'Payment Status', 'Shipping', 'Products', 'Amount' ],
            excel_db_columns: [
                { column : 'created_at' },
                { column : 'id' },
                { table : 'order_user', column : 'name' },
                { table : 'order_user', column : 'email' },
                { table : 'order_user', column : 'mobile' },
                { table : 'order_payment', column : 'payment_mode' },
                { table : 'order_payment', column : 'payment_status' },
                { table : 'order_status_shipping', column : 'status' },
                { table: 'order_item', column: 'product_name', multiple: true },
                { table : 'order_payment', column : 'total' },
            ]
        }
    },
    computed:{
        ...mapState({
            getOrders: state => state.getOrder.getOrders,
            excelLink: state => state.getOrder.excelLink
        })
    },
    mounted() {
        this.getOrdersList();
    },
    methods: {
        getOrdersList: function(page = 1) {
            let query = [];
            this.filters['page'] = page;
            query['params'] = deleteEmptyKeys(this.filters);
            if (this.$admin['role_id'] == 2) {
                query['params']['created_by'] = this.$admin['id'];
            }
            this.$store.dispatch('getOrder/' + LOAD_ORDER_LIST_ACTION, query);
        },
        excelDownload: function() {
            let params = {
                search: this.filters['search'],
                payment_mode: this.filters['payment_mode'],
                payment_status: this.filters['payment_status'],
                shipping_status: this.filters['shipping_status'],
                response_type: 'xlsx',
                excel_fields: this.excel_fields,
                excel_db_columns: this.excel_db_columns
            };
            params = deleteEmptyKeys(params);
            if (this.$admin['role_id'] == 2) {
                params['created_by'] = this.$admin['id'];
            }
            this.$store.dispatch('getOrder/' + EXCEL_DOWNLOAD_ORDERS_ACTION, params).then(() => {
                const link = document.createElement("a");
                link.href = this.excelLink;
                link.setAttribute("download", "orders.xlsx"); //or any other extension
                document.body.appendChild(link);
                link.click();
            });
        }
    }
}
</script>