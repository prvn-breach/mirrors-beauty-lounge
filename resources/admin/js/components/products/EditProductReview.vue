<template>
    <div id="content" class="flex">
        <div class="page-container">
            <div class="pt-3 pr-3 pb-5 pl-3">
                <div class="mb-5">
                    <h2 class="dv_page_heading">Edit Product Review</h2>
                    <div class="row dv_search_delete_action_common"></div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card mb-3">
                                <div class="card-header"><strong>Review Details</strong></div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label class="text-muted text-capitalize" for="name">Review Title </label>
                                        <input type="text" class="form-control dv_common_input_for_all" placeholder="Enter" v-model="saveProductReview.title" :class="status($v.saveProductReview.title)" @input="setValue($event)" name="title">
                                    </div>
                                    <div class="form-group">
                                        <label class="text-muted text-capitalize" for="name">Review Description </label>
                                        <textarea rows="4" class="form-control dv_common_input_for_all" placeholder="Enter" v-model="saveProductReview.description" :class="status($v.saveProductReview.description)" @input="setValue($event)" name="description" />
                                    </div>
                                    <div class="form-group">
                                        <label class="text-muted text-capitalize" for="name">Reply </label>
                                        <textarea rows="4" class="form-control dv_common_input_for_all" placeholder="Enter" v-model="saveProductReview.reply_message" :class="status($v.saveProductReview.reply_message)" @input="setValue($event)" name="reply_message" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 text-center">
                            <button type="button" class="btn btn-default text-muted dv_cancel_submit_btn" @click="$router.push({ name: 'getProductReviews' });">cancel</button>
                            <button type="button" class="btn btn-default dv_save_submit_btn" @click="submitReview">save </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import Vue from 'vue'
import { mapState } from 'vuex'
import { required } from 'vuelidate/lib/validators';
import { deleteEmptyKeys } from "../../mixins";
import { GET_PRODUCT_REVIEW_ACTION, UPDATE_PRODUCT_REVIEW_ACTION } from '@admin/store/products/actions'
export default {
    components: { },
    data() {
        return {
            baseUrl: Vue.config.baseUrl,
            baseUrlImage: Vue.config.baseUrlImage,
            saveProductReview: {
                title: '',
                description: '',
                reply_message: '',
            }
        }
    },
    validations: {
        saveProductReview: { 
            title: { required },
            description: { required },
            reply_message: { required }
        }
    },
    computed:{
        ...mapState({
            getReview: state => state.getProduct.getProductReview
        })
    },
    mounted() {
        this.getProductReview();
    },
    methods: {
        getProductReview() {
            this.$store.dispatch('getProduct/' + GET_PRODUCT_REVIEW_ACTION, { params: { review_id: this.$route.params.product_review_id } }).then(() => {
                this.saveProductReview.title = this.getReview.title;
                this.saveProductReview.description = this.getReview.description;
                this.saveProductReview.reply_message = this.getReview.reply_message;
            });
        },
        status: function(validation) {
            if(validation != undefined){
                return {
                    error: validation.$error,
                    dirty: validation.$dirty
                }
            }
        },
        setValue: function(event) {
            this.saveProductReview[event.target.name] = event.target.value;
        },
        submitReview() {
            this.$v.saveProductReview.$touch();
            if (!this.$v.saveProductReview.$invalid) {
                let params = deleteEmptyKeys(this.saveProductReview);
                params['review_id'] = this.$route.params.product_review_id;
                this.loaderModal('show');
                this.$store.dispatch('getProduct/' + UPDATE_PRODUCT_REVIEW_ACTION, params).then((e) => {
                    this.loaderModal('hide');
                    this.$router.push({ name: 'getProductReviews' });
                });
            }
        }
    }
}
</script>
                    