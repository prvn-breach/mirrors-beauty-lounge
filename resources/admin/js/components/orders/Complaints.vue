<template>
  <div id="content" class="flex">
    <div class="page-container">
      <div class="pt-3 pr-3 pb-5 pl-3">
        <div class="mb-5">
          <h2 class="dv_page_heading">Complaints</h2>
          <div class="row dv_search_delete_action_common">
            <div class="col-md-5 col-sm-5 col-xs-5 col-5">
              <input type="text" class="form-control dv_common_search_for_all" v-model="filters.search" @keyup="getOrdersList" name="" placeholder="Search" />
            </div>
            <div class="col-md-7 col-sm-7 col-xs-7 col-7">
                <!-- <router-link :to="{ name: 'addComplaint' }" tag="button" class="btn btn-default dv_filter_common" data-toggle="tooltip" data-placement="top" title="Add Complaint">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="12" y1="5" x2="12" y2="19"></line>
                        <line x1="5" y1="12" x2="19" y2="12"></line>
                    </svg>
                </router-link> -->
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
                  <th style="width: 7%" class="text-muted">order#</th>
                  <th style="width: 25%" class="text-muted">customer</th>
                  <th style="width: 12%" class="text-muted">complaint status </th>
                  <th style="width: 10%" class="text-muted">action</th>
                  <th style="width: 10%" class="text-muted">chat</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="(order, index) in getOrders.data" :key="index" class="v-middle">
                  <td>{{ order.id }}</td>
                  <td>
                    <span class="item-except text-muted text-sm h-1x">{{ order.order_user.name }} </span>
                  </td>
                  <td><span class="font-weight-bold" :class="complaint_statuses[order.order_status_shipping.complaint_status]['class']" >{{ complaint_statuses[order.order_status_shipping.complaint_status]['label'] }}</span>
                  </td>
                  <td>
                      <router-link :to="{ name : 'complaintDetail', params: { order_id: order.id } }">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="dv_row_action_drp_svg_eye">
                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                <circle cx="12" cy="12" r="3"></circle>
                            </svg>
                      </router-link>
                  </td>
				  <td>
                      <router-link :to="{ name : 'complaintConversation', params: { order_id: order.id } }">
                           <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-chat-dots dv_row_action_drp_svg_eye" viewBox="0 0 16 16" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
								<path d="M5 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
								<path d="m2.165 15.803.02-.004c1.83-.363 2.948-.842 3.468-1.105A9.06 9.06 0 0 0 8 15c4.418 0 8-3.134 8-7s-3.582-7-8-7-8 3.134-8 7c0 1.76.743 3.37 1.97 4.6a10.437 10.437 0 0 1-.524 2.318l-.003.011a10.722 10.722 0 0 1-.244.637c-.079.186.074.394.273.362a21.673 21.673 0 0 0 .693-.125zm.8-3.108a1 1 0 0 0-.287-.801C1.618 10.83 1 9.468 1 8c0-3.192 3.004-6 7-6s7 2.808 7 6c0 3.193-3.004 6-7 6a8.06 8.06 0 0 1-2.088-.272 1 1 0 0 0-.711.074c-.387.196-1.24.57-2.634.893a10.97 10.97 0 0 0 .398-2z"/>
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
import { GET_COMPLAINTS_ACTION, EXCEL_DOWNLOAD_COMPLAINTS  } from '@admin/store/orders/actions'
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
            complaint_statuses: {
                RAISED: {
                    label: 'RAISED',
                    class: 'badge badge-danger text-capitalize'
                },
                PROCESSING: {
                    label: 'PROCESSING',
                    class: 'badge badge-warning text-capitalize'
                },
                COMPLETED: {
                    label: 'COMPLETED',
                    class: 'badge badge-success text-capitalize'
                }
            },
            excel_fields: [ 'Order ID', 'Customer', 'Complaint Status' ],
            excel_db_columns: [
                { column : 'id' },
                { table : 'order_user', column : 'name' },
                { table : 'order_status_shipping', column : 'complaint_status' }
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
            this.$store.dispatch('getOrder/' + GET_COMPLAINTS_ACTION, query);
        },
        excelDownload: function() {
            let params = {
                page: this.filters['page'],
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
            this.$store.dispatch('getOrder/' + EXCEL_DOWNLOAD_COMPLAINTS, params).then(() => {
                const link = document.createElement("a");
                link.href = this.excelLink;
                link.setAttribute("download", "complaints.xlsx"); //or any other extension
                document.body.appendChild(link);
                link.click();
            });
        }
    }
}
</script>