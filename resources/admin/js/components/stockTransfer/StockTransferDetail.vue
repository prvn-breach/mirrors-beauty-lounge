<template>
    <div id="content" class="flex">
        <div class="page-container">
            <div class="pt-3 pr-3 pb-5 pl-3">
                <div class="mb-5">
                    <h2 class="dv_page_heading">Stock Transfer Detail</h2>
                    <div class="row dv_search_delete_action_common">
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card mb-3">
                                <div class="card-header"><strong>Basic Details</strong></div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize" for="name">From Location </label>
                                                <input type="text" v-model="shipping_details.from_location" class="form-control dv_common_input_for_all" disabled>
                                            </div>                                                    
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize" for="name">To Location </label>
                                                <input type="text" v-model="shipping_details.to_location" class="form-control dv_common_input_for_all" disabled>
                                            </div>                                                    
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize" for="name">Date </label>
                                                <input type="date" v-model="shipping_details.date" class="form-control dv_common_input_for_all dvdatepicker" disabled>
                                            </div>                                                    
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize" for="name">Contact Person</label>
                                                <input type="text" v-model="shipping_details.contact_person" class="form-control dv_common_input_for_all" disabled>
                                            </div>                                                    
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize d-block" for="name">Transfer Stock Immediately? </label>
                                                <label class="ui-switch ui-switch-md info m-t-xs mt-2"><input checked="" v-model="shipping_details.transfer_stock_immediately" type="checkbox" disabled> <i></i></label>
                                            </div>                                                    
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header"><strong>Products Details</strong></div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-theme table-row v-middle">
                                    <thead>
                                        <tr>
                                            <th style="width: 15%;" class="text-muted">brand</th>
                                            <th style="width: 15%;" class="text-muted">category</th>
                                            <th style="width: 10%;" class="text-muted">image</th>
                                            <th style="width: 50%;" class="text-muted">product </th>
                                            <th style="width: 10%;" class="text-muted">transfer qty</th>
                                            <th style="width: 10%;" class="text-muted">price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="(data,index) in stockTransferData.products" :key="index" class="v-middle">
                                            <td>
                                                {{ data.brand_name }}
                                            </td>
                                            <td>
                                                {{ data.category_name }}
                                            </td>
                                            <td>
                                                <div v-for="(image,index) in data.product.get_product_images" v-if="image.priority=='P'" :key="index">
                                                    <img :src="baseUrlImage+'images/products/'+image.image" :alt="image.atr" title="" class="dv_product_list_img">
                                                </div>
                                            </td>
                                            <td>
                                                {{ data.product.name }}
                                            </td>
                                            <td>
                                                {{ data.quantity }}
                                            </td>
                                            <td class="text-center">
                                                <strong> {{ data.price * data.quantity}} </strong>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="card mb-3">
                                <div class="card-header"><strong>Shipping Status</strong></div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4 mb-3">
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize" for="name">Status </label>
                                                <select v-model="status" class="form-control">
                                                    <option value="">Select</option>
                                                    <option value="SHIPPED">SHIPPED </option>
                                                    <option value="RECEIVED">RECEIVED </option>
                                                    <option value="CANCELLED">CANCELLED</option>
                                                </select>
                                            </div>                                                    
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 text-center">
                            <button type="button" class="btn btn-default text-muted dv_cancel_submit_btn" @click="$router.push({ name: 'getStockTransfer' });">cancel</button>
                            <button type="button" class="btn btn-default dv_save_submit_btn" @click="updateStockTransfer">save </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import Vue from 'vue'
import { mapState } from 'vuex';
import { UPDATE_STOCK_TRANSFER_ACTION, GET_STOCK_TRANSFER_RECORD_ACTION } from '@admin/store/products/actions';
export default {
    components: { },
    data() {
        return {
            baseUrl:Vue.config.baseUrl,
            baseUrlImage: Vue.config.baseUrlImage,
            shipping_details: {
                from_location: '',
                to_location: '',
                date: '',
                contact_person: '',
                transfer_stock_immediately: false
            },
            status: ''
        }
    },
    computed:{
        ...mapState({
            stockTransferData: state => state.getProduct.getStockTransferRecord,
        })
    },
    mounted() {
        this.getStockTransferRecord();
    },
    methods: {
        getStockTransferRecord: function(){
            this.$store.dispatch('getProduct/' + GET_STOCK_TRANSFER_RECORD_ACTION, this.$route.params.stock_transfer_id).then(() => {
                this.shipping_details.from_location = this.stockTransferData.from_location;
                this.shipping_details.to_location = this.stockTransferData.to.location_name;
                this.shipping_details.contact_person = this.stockTransferData.contact_person;
                this.shipping_details.date = this.stockTransferData.date;
                this.shipping_details.transfer_stock_immediately = this.stockTransferData.transfer_stock_immediately;
                this.status = this.stockTransferData.status;
            });
        },
        updateStockTransfer: function () {
            let params = {
                stock_transfer_id: this.$route.params.stock_transfer_id,
                status: this.status
            }
            this.loaderModal('show');
            this.$store.dispatch('getProduct/' + UPDATE_STOCK_TRANSFER_ACTION, params).then(() => {
                this.loaderModal('hide');
                this.$router.push({ name: 'getStockTransfer' });
            });
        }
    }
}
</script>