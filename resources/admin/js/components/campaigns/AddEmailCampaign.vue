<template>
    <div id="content" class="flex">
        <div class="page-container">
            <div class="pt-3 pr-3 pb-5 pl-3">
                <div class="mb-5">
                    <h2 class="dv_page_heading">Add Email Campaign </h2>
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
                                                <input type="text" v-model="addEmailCampaign.campaign_title" :class="status($v.addEmailCampaign.campaign_title)" @input="setValue($event)" name="campaign_title" class="form-control dv_common_input_for_all" placeholder="Enter">
                                            </div>                                                
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize" for="name">Subject Line </label>
                                                <input type="text" v-model="addEmailCampaign.subject_line" :class="status($v.addEmailCampaign.subject_line)" @input="setValue($event)" name="subject_line" class="form-control dv_common_input_for_all" placeholder="Enter">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize" for="name">Sender Name </label>
                                                <input type="text" v-model="addEmailCampaign.sender_name" :class="status($v.addEmailCampaign.sender_name)" @input="setValue($event)" name="sender_name" class="form-control dv_common_input_for_all" placeholder="Enter">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize" for="name">Sender Email </label>
                                                <input type="text" v-model="addEmailCampaign.sender_email" :class="status($v.addEmailCampaign.sender_email)" @input="setValue($event)" name="sender_email" class="form-control dv_common_input_for_all" placeholder="Enter">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize" for="name">Reply-to Email </label>
                                                <input type="text" v-model="addEmailCampaign.reply_to_email" :class="status($v.addEmailCampaign.reply_to_email)" @input="setValue($event)" name="reply_to_email" class="form-control dv_common_input_for_all" placeholder="Enter">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="text-muted text-capitalize" for="name">Campaign Type </label>
                                                <select v-model="addEmailCampaign.campaign_type" :class="status($v.addEmailCampaign.campaign_type)" @input="setValue($event)" name="campaign_type" class="form-control dv_common_select_for_all">
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
                                        <label class="ui-switch ui-switch-md info m-t-xs float-left mr-3"><input checked="" v-model="addEmailCampaign.campaign_status" type="checkbox"> <i></i></label>
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
                                                <input @input="selectContentType('HTML&TEXT')" type="radio" class="custom-control-input" id="customRadio1" name="emailtype">
                                                <label class="custom-control-label cursor-pointer" for="customRadio1">HTML & Plain Text </label>
                                            </div>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <div class="custom-control custom-radio cursor-pointer">
                                                <input @input="selectContentType('HTML')"  type="radio" class="custom-control-input" id="customRadio2" name="emailtype">
                                                <label class="custom-control-label cursor-pointer" for="customRadio2">HTML Only </label>
                                            </div>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <div class="custom-control custom-radio cursor-pointer">
                                                <input @input="selectContentType('TEXT')"  type="radio" class="custom-control-input" id="customRadio3" name="emailtype">
                                                <label class="custom-control-label cursor-pointer" for="customRadio3">Text Only </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="card mb-3">
                                        <div class="card-header"><strong>Import/Upload </strong></div>
                                        <div class="card-body">
                                            <svg style="background: #ebebeb87; margin: 0 auto 30px auto; display: block; width: 100px; height: 100px; padding: 15px; border-radius: 5px; color: #a0a0a0; " xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-upload"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="17 8 12 3 7 8"></polyline><line x1="12" y1="3" x2="12" y2="15"></line></svg>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input @change="saveFileContent" accept="html" type="file" class="custom-file-input" id="inputGroupFile01">
                                                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            Import an existing HTML file and upload it
                                        </div>
                                    </div>                                            
                                </div>
                                <div class="col-md-4">
                                    <div class="card mb-3">
                                        <div class="card-header"><strong>Text Editor </strong></div>
                                        <div class="card-body">
                                            <svg style="background: #ebebeb87; margin: 0 auto 30px auto; display: block; width: 100px; height: 100px; padding: 15px; border-radius: 5px; color: #a0a0a0; " xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-code"><polyline points="16 18 22 12 16 6"></polyline><polyline points="8 6 2 12 8 18"></polyline></svg>
                                            <div class="input-group">
                                                <div class="custom-file d-flex justify-content-center">
                                                    <button class="btn btn-primary" data-toggle="modal" data-target="#textEditorModal">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square mr-2" viewBox="0 0 16 16">
                                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                                        </svg>
                                                        Open Editor
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            Write your own Text in Text Editor
                                        </div>
                                    </div>                                            
                                </div>
                                <div class="col-md-4">
                                    <div class="card mb-3">
                                        <div class="card-header"><strong>HTML Editor </strong></div>
                                        <div class="card-body">
                                            <svg style="background: #ebebeb87; margin: 0 auto 30px auto; display: block; width: 100px; height: 100px; padding: 15px; border-radius: 5px; color: #a0a0a0; " xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-code"><polyline points="16 18 22 12 16 6"></polyline><polyline points="8 6 2 12 8 18"></polyline></svg>
                                            <div class="input-group">
                                                <div class="custom-file d-flex justify-content-center">
                                                    <button class="btn btn-primary" data-toggle="modal" data-target="#HTMLEditorModal">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square mr-2" viewBox="0 0 16 16">
                                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                                        </svg>
                                                        Open Editor
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            Design HTML email using our HTML editor
                                        </div>
                                    </div>                                            
                                </div>
                            </div>

                            <div class="modal fade" id="textEditorModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-xl modal-dialog-scrollable">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Text Editor</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <vue-editor v-model="text_editor_code"></vue-editor>
                                        </div>
                                        <div class="modal-footer justify-content-center">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary" @click="saveTextEditorCode">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal fade" id="HTMLEditorModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-xl">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">HTML Editor</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <textarea v-model="html_editor_code" class="w-100" style="height: 400px;"></textarea>
                                        </div>
                                        <div class="modal-footer justify-content-center">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary" @click="saveHTMLEditorCode">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card mb-3">
                                <div class="card-header"><strong>Add Recipients </strong></div>
                            </div>

                            <div class="row dv_search_delete_action_common">
                                <div class="col-md-5 col-sm-5 col-xs-5 col-5">
                                    <input v-model="search" @input="getCustomersList" type="text" class="form-control dv_common_search_for_all" name="" placeholder="Search">
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-theme table-row v-middle">
                                    <thead>
                                        <tr>
                                            <th class="text-muted sortable">
                                                <!-- <label class="ui-check m-0 ui-check-rounded ui-check-md"><input type="checkbox"> <i></i></label> -->
                                            </th>
                                            <th class="text-muted sortable">
                                                Select All or One mailing List
                                            </th>
                                            <th class="text-muted sortable">
                                                action
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="(customer,index) in getCustomers.data" :key="index">
                                            <td>
                                                <label class="ui-check m-0 ui-check-rounded ui-check-md"><input type="checkbox" @input="selectCustomer($event, customer.email)"> <i></i></label>
                                            </td>
                                            <td>
                                                {{ customer.email }}
                                            </td>
                                            <td>
                                                <router-link :to="{ name : 'getCustomerDetail', params: { customer_id: customer.id } }">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="dv_row_action_drp_svg_eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                                </router-link>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <pagination :data="getCustomers" @pagination-change-page="getCustomersList"></pagination>
                        </div>
                        <div class="col-md-12 text-center">
                            <button type="button" class="btn btn-default text-muted dv_cancel_submit_btn" @click="$router.push({ name: 'emailCampaign' });">cancel</button>
                            <button type="button" class="btn btn-default dv_save_submit_btn" @click="createEmailCampaign">save </button>
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
import { ADD_EMAIL_CAMPAIGN_ACTION } from '@admin/store/campaigns/actions'
import { GET_CUSTOMERS_ACTION } from '@admin/store/customers/actions'
import { VueEditor } from "vue2-editor";
export default {
    components: { VueEditor },
    data() {
        return {
            baseUrl:Vue.config.baseUrl,
            baseUrlImage: Vue.config.baseUrlImage,
            addEmailCampaign: {
                campaign_title: '',
                subject_line: '',
                sender_name: '',
                sender_email: '',
                reply_to_email: '',
                campaign_type: '',
                campaign_status: 1,
                content_type: '',
                message: '',
                customer_emails: [],
            },
            search: '',
            text_editor_code: '',
            html_editor_code: ''
        }
    },
    validations: {
        addEmailCampaign: {
            campaign_title: { required },
            subject_line: { required },
            sender_name: { required },
            sender_email: { required },
            reply_to_email:{ required },
            campaign_type: { required },
            campaign_status: { required },
            content_type: { required },
            message: { required }
        }
    },
    computed:{
        ...mapState({
            getErrors: state => state.getCampaign.getErrors,
            getCustomers: state => state.getCustomer.getCustomers
        })
    },
    mounted() {
        this.getCustomersList();
    },
    methods: {
        getCustomersList: function(page=1){
            let query = [];
            query['params'] = { page, search: this.search }
            this.$store.dispatch('getCustomer/' + GET_CUSTOMERS_ACTION, query);
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
            this.addEmailCampaign[event.target.name] = event.target.value;
            this.$v.addEmailCampaign[event.target.name].$touch();
        },
        saveFileContent: function(evt) {
            var f = evt.target.files[0]; 
            if (f) {
                var r = new FileReader();
                r.onload = (e) => { 
                    var contents = e.target.result;
                    this.addEmailCampaign.message = contents;
                }
                r.readAsText(f);
            }
        },
        saveTextEditorCode: function() {
            this.addEmailCampaign.message = this.text_editor_code;
        },
        saveHTMLEditorCode: function() {
            this.addEmailCampaign.message = this.html_editor_code;
        },
        selectCustomer: function(event, email) {
            if (event.target.checked){
                this.addEmailCampaign.customer_emails.push(email);
            } else {
                this.addEmailCampaign.customer_emails = this.addEmailCampaign.customer_emails.filter(customer => customer!=email);
            }
        },
        selectContentType: function(content_type){
            this.addEmailCampaign.content_type = content_type;
        },
        createEmailCampaign: function () {
            let _this = this;
            _this.$v.addEmailCampaign.$touch();
            let params = deleteEmptyKeys(this.addEmailCampaign);
            if (!_this.$v.addEmailCampaign.$invalid) {
                this.loaderModal('show');
                this.$store.dispatch('getCampaign/' + ADD_EMAIL_CAMPAIGN_ACTION, params).then(() => {
                    this.loaderModal('hide');
                    this.$router.push({ name: 'emailCampaign' });
                });
            }
        }
    }
}
</script>