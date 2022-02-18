<template>
    <div id="content" class="flex">
        <div class="page-container">
            <div class="pt-3 pr-3 pb-5 pl-3">
                <div class="mb-5">
                    <h2 class="dv_page_heading">Email Campaign </h2>
                    <div class="row dv_search_delete_action_common">
                        <div class="col-md-5 col-sm-5 col-xs-5 col-5">
                            <input v-model="filters.search" @input="getEmailCampaigns" type="text" class="form-control dv_common_search_for_all" name="" placeholder="Search">
                        </div>
                        <div class="col-md-7 col-sm-7 col-xs-7 col-7">
                            <router-link :to="{ name: 'addEmailCampaign' }" tag="button" class="btn btn-default dv_filter_common" data-toggle="tooltip" data-placement="top" title="Add Campaign">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <line x1="12" y1="5" x2="12" y2="19"></line>
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                </svg>
                            </router-link>
                            <button @click="excelDownload" type="text" class="btn btn-default dv_export_common" data-toggle="tooltip" data-placement="top" title="Download all Product CSV">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="7 10 12 15 17 10"></polyline><line x1="12" y1="15" x2="12" y2="3"></line></svg>
                            </button>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-theme table-row v-middle">
                            <thead>
                                <tr>
                                    <th style="width: 20%;" class="text-muted">name</th>
                                    <th style="width: 15%;" class="text-muted">type </th>
                                    <th style="width: 15%;" class="text-muted">sender </th>
                                    <th style="width: 15%;" class="text-muted">reply </th>
                                    <th style="width: 10%;" class="text-muted">status </th>
                                    <th style="width: 10%;" class="text-muted">view </th>
                                    <th style="width: 10%;" class="text-muted">delete </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(campaign, index) in getCampaigns.data" :key="index" class="v-middle">
                                    <td>
                                        {{ campaign['campaign_title'] }}
                                    </td>
                                    <td>
                                        <span class="item-except text-muted text-sm h-1x">
                                            {{ campaign['campaign_type'] }} 
                                        </span>
                                    </td>
                                    <td> {{ campaign['sender_name'] }} </td>
                                    <td>
                                        <span class="item-except text-muted text-sm h-1x">
                                            {{ campaign['reply_to_email'] }}
                                        </span>
                                    </td>
                                    <td>
                                        <label class="ui-switch ui-switch-md info m-t-xs"><input checked="" v-model="campaign.campaign_status" @input="updateStatus($event, campaign.id)" type="checkbox" > <i></i></label>
                                    </td>
                                    <td>
                                        <router-link :to="{ name: 'viewEmailCampaign', params: { email_campaign_id: campaign.id } }">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="dv_row_action_drp_svg_eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                        </router-link>
                                    </td>
                                    <td>
                                        <button @click="deleteCampaign(campaign.id, campaign.campaign_title)" type="text" class="btn btn-default dv_selected_delete_common" data-toggle="tooltip" data-placement="top" title="Delete Selected Entries">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <pagination :data="getCampaigns" @pagination-change-page="getEmailCampaigns"></pagination>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import Vue from 'vue'
import { mapState } from 'vuex'
import { deleteEmptyKeys } from "../../mixins";
import { GET_EMAIL_CAMPAIGNS_ACTION, UPDATE_EMAIL_CAMPAIGN_ACTION, DELETE_EMAIL_CAMPAIGN_ACTION, EXCEL_DOWNLOAD_EMAIL_CAMPAIGN_ACTION } from '@admin/store/campaigns/actions'
export default {
    components: { },
    data() {
        return {
            baseUrl:Vue.config.baseUrl,
            baseUrlImage: Vue.config.baseUrlImage,
            filters: {
                page: 1,
                search: ''
            }
        }
    },
    computed:{
        ...mapState({
            getCampaigns: state => state.getCampaign.getEmailCampaigns,
            excelLink: state => state.getCampaign.excelLink
        })
    },
    mounted() {
        this.getEmailCampaigns();
    },
    methods: {
        getEmailCampaigns: function(page=1){
            let query = [];
            this.filters['page'] = page;
            query['params'] = deleteEmptyKeys(this.filters);
            this.$store.dispatch('getCampaign/' + GET_EMAIL_CAMPAIGNS_ACTION, query);
        },
        updateStatus: function(event, email_campaign_id) {
            this.$store.dispatch('getCampaign/' + UPDATE_EMAIL_CAMPAIGN_ACTION, { 
                email_campaign_id, campaign_status: event.target.checked
            });
        },
        deleteCampaign: function(email_campaign_id, campaign_title) {
            if (confirm('Please confirm to delete this '+campaign_title+' campaign ?')) {
                this.$store.dispatch('getCampaign/' + DELETE_EMAIL_CAMPAIGN_ACTION, { email_campaign_id }).then(() => {
                    this.getEmailCampaigns();
                });
            }
        },
        excelDownload: function() {
            let query = [];
            let params = {
                search: this.filters['search'],
                response_type: 'xlsx'
            };
            query['params'] = deleteEmptyKeys(params);
            this.$store.dispatch('getCampaign/' + EXCEL_DOWNLOAD_EMAIL_CAMPAIGN_ACTION, query).then(() => {
                const link = document.createElement("a");
                link.href = this.excelLink;
                link.setAttribute("download", "EmailCampaigns.xlsx");
                document.body.appendChild(link);
                link.click();
            });
        }
    }
}
</script>