<template>
    <div id="content" class="flex">
        <div class="page-container">
            <div class="pt-3 pr-3 pb-5 pl-3">
                <div class="mb-5">
                    <h2 class="dv_page_heading">View Email Campaign </h2>
                    <div class="row dv_search_delete_action_common">
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card mb-3">
                                <div class="card-header"><strong>Basic Details</strong></div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize" for="name">Campaign Title</label>
                                                <input type="text" readonly v-model="getCampaign.campaign_title" name="campaign_title" class="form-control dv_common_input_for_all" placeholder="Enter">
                                            </div>                                                
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize" for="name">Subject Line </label>
                                                <input type="text" readonly v-model="getCampaign.subject_line" name="subject_line" class="form-control dv_common_input_for_all" placeholder="Enter">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize" for="name">Sender Name </label>
                                                <input type="text" readonly v-model="getCampaign.sender_name" name="sender_name" class="form-control dv_common_input_for_all" placeholder="Enter">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize" for="name">Sender Email </label>
                                                <input type="text" readonly v-model="getCampaign.sender_email" name="sender_email" class="form-control dv_common_input_for_all" placeholder="Enter">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize" for="name">Reply-to Email </label>
                                                <input type="text" readonly v-model="getCampaign.reply_to_email" name="reply_to_email" class="form-control dv_common_input_for_all" placeholder="Enter">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize" for="name">Campaign Type </label>
                                                <select disabled v-model="getCampaign.campaign_type" name="campaign_type" class="form-control dv_common_select_for_all">
                                                    <option value="">Select</option>
                                                    <option value="Announcement">Announcement</option>
                                                    <option value="DealsOffers">Deals &amp; Offers</option>
                                                    <option value="Newsletter">Newsletter</option>
                                                    <option value="Feedback">Feedback</option>
                                                    <option value="Events">Events</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mb-0">
                                        <label class="ui-switch ui-switch-md info m-t-xs float-left mr-3"><input disabled checked="" v-model="getCampaign.campaign_status" type="checkbox"> <i></i></label>
                                        <label class="text-muted text-capitalize" for="name">Campaign status </label>
                                    </div>
                                </div>
                            </div>

                            <div class="card mb-3">
                                <div class="card-header"><strong>Content Type </strong></div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-3 mb-3">
                                            <div class="custom-control custom-radio cursor-pointer">
                                                <input disabled :checked="getCampaign.content_type=='HTML&TEXT'" type="radio" class="custom-control-input" id="customRadio1" name="emailtype">
                                                <label class="custom-control-label cursor-pointer" for="customRadio1">HTML & Plain Text </label>
                                            </div>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <div class="custom-control custom-radio cursor-pointer">
                                                <input disabled :checked="getCampaign.content_type=='HTML'" type="radio" class="custom-control-input" id="customRadio2" name="emailtype">
                                                <label class="custom-control-label cursor-pointer" for="customRadio2">HTML Only </label>
                                            </div>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <div class="custom-control custom-radio cursor-pointer">
                                                <input disabled :checked="getCampaign.content_type=='TEXT'" type="radio" class="custom-control-input" id="customRadio3" name="emailtype">
                                                <label class="custom-control-label cursor-pointer" for="customRadio3">Text Only </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card mb-3">
                                <div class="card-header"><strong>Email Body </strong></div>
                                <div class="card-body" v-html="getCampaign.message">
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-theme table-row v-middle">
                                    <thead>
                                        <tr>
                                            <th class="text-muted sortable">
                                                Selected Customer Emails
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="(email,index) in getCampaign.customer_emails" :key="index">
                                            <td>
                                                {{ email }}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-12 text-center">
                            <button type="button" class="btn btn-default dv_save_submit_btn" @click="$router.push({ name: 'emailCampaign' });">back </button>
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
import { GET_EMAIL_CAMPAIGN_ACTION } from '@admin/store/campaigns/actions';
export default {
    components: { },
    data() {
        return {
            baseUrl:Vue.config.baseUrl,
            baseUrlImage: Vue.config.baseUrlImage
        }
    },
    computed:{
        ...mapState({
            getCampaign: state => state.getCampaign.getEmailCampaign,
        })
    },
    mounted() {
        this.getEmailCampaign();
    },
    methods: {
        getEmailCampaign: function() {
            this.$store.dispatch('getCampaign/' + GET_EMAIL_CAMPAIGN_ACTION, this.$route.params.email_campaign_id);
        }
    }
}
</script>