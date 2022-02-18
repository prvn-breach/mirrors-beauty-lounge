<template>
  <div id="content" class="flex">
    <div class="page-container">
      <div class="pt-3 pr-3 pb-5 pl-3">
        <div class="mb-5">
          <h2 class="dv_page_heading">Return Request List</h2>
          <div class="row dv_search_delete_action_common">
            <div class="col-md-5 col-sm-5 col-xs-5 col-5">
              <input type="text" class="form-control dv_common_search_for_all" v-model="filters.search" @keyup="getOrdersList" name="" placeholder="Search" />
            </div>
            <div class="col-md-7 col-sm-7 col-xs-7 col-7">
                <button type="text" class="btn btn-default dv_export_common" data-toggle="tooltip" data-placement="top" title="Download CSV" @click="excelDownload">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                        <polyline points="7 10 12 15 17 10"></polyline>
                        <line x1="12" y1="15" x2="12" y2="3"></line>
                    </svg>
                </button>
            </div>
          </div>
          <pagination class="mt-2" :data="getOrders" @pagination-change-page="getOrdersList"></pagination>
          <div class="table-responsive">
            <table class="table table-theme table-row v-middle">
              <thead>
                <tr>
                  <th style="width: 10%" class="text-muted">Return ID</th>
                  <th style="width: 7%" class="text-muted">Order#</th>
                  <th style="width: 25%" class="text-muted">Customer</th>
                  <th style="width: 12%" class="text-muted">Status</th>
                  <th style="width: 12%" class="text-muted">Added Date</th>
                  <th style="width: 10%" class="text-muted">Action</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="(order, index) in getOrders.data" :key="index" class="v-middle">
                  <td>{{ order.order_status_shipping.return_id }}</td>
                  <td>{{ order.id }}</td>
                  <td>
                    <span class="item-except text-muted text-sm h-1x">{{ order.order_user.name }} </span>
                  </td>
                  <td><span :class="return_statuses[order.order_status_shipping.return_status]['class']">{{ return_statuses[order.order_status_shipping.return_status]['label'] }}</span>
                  </td>
                  <td>{{ order.created_at }}</td>
                  <td>
                      <router-link :to="{ name : 'returnRequestDetail', params: { order_id: order.id } }">
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
            filters: {
                search: '',
                page: 1,
                per_page: 50,
                payment_mode: "",
                payment_status: "",
                shipping_status: "R"
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
            excel_fields: [ 'Return ID', 'Order ID', 'Customer Email', 'Shipping Status', 'Products', 'Added Date', 'Modify Date' ],
            excel_db_columns: [
                { table : 'order_status_shipping', column : 'return_id' },
                { column : 'id' },
                { table : 'order_user', column : 'email' },
                { table : 'order_status_shipping', column : 'status' },
                { table: 'order_item', column: 'product_name', multiple: true },
                { table : 'order_status_shipping', column : 'created_at' },
                { table : 'order_status_shipping', column : 'updated_at' }
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
                link.setAttribute("download", "ReturnedOrders.xlsx"); //or any other extension
                document.body.appendChild(link);
                link.click();
            });
        }
    }
}
</script>