<template>
    <div id="content" class="flex">
        <div class="page-container">
            <div class="pt-3 pr-3 pb-5 pl-3">
                <div class="mb-5">
                    <h2 class="dv_page_heading">Locations </h2>
                    <div class="row dv_search_delete_action_common">
                        <div class="col-md-5 col-sm-5 col-xs-5 col-5">
                            <input v-model="filters.search" @input="getLocationsList" type="text" class="form-control dv_common_search_for_all" name="" placeholder="Search">
                        </div>
                        <div class="col-md-7 col-sm-7 col-xs-7 col-7">
                            <router-link :to="{ name: 'addLocation' }" tag="button" class="btn btn-default dv_filter_common" data-toggle="tooltip" data-placement="top" title="Add Location">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                            </router-link>
                            <button @click="deleteLocations" type="text" :disabled="selected_locations.length==0" class="btn btn-default dv_selected_delete_common" data-toggle="tooltip" data-placement="top" title="Delete Selected Locations">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                            </button>
                            <button @click="excelDownload" type="text" class="btn btn-default dv_export_common" data-toggle="tooltip" data-placement="top" title="Download CSV">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="7 10 12 15 17 10"></polyline><line x1="12" y1="15" x2="12" y2="3"></line></svg>
                            </button>
                        </div>
                    </div>
                    <pagination class="mt-2" :data="getLocations" @pagination-change-page="getLocationsList"></pagination>
                    <div class="table-responsive">
                        <table class="table table-theme table-row v-middle">
                            <thead>
                                <tr>
                                    <th style="width: 20px;">
                                        <label class="ui-check m-0 ui-check-rounded ui-check-md"><input type="checkbox" :checked="getLocations.data && (selected_locations.length == getLocations.data.length)" @change="allSelect"> <i></i></label>
                                    </th>
                                    <th class="text-muted">ID</th>
                                    <th class="text-muted">location type</th>
                                    <th class="text-muted">location name</th>
                                    <th class="text-muted">contact person </th>
                                    <th class="text-muted">contact#</th>
                                    <th class="text-muted">address</th>
                                    <th class="text-muted">status</th>
                                    <th class="text-muted" style="width: 50px;">actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(location,index) in getLocations.data" :key="index" class="v-middle">
                                    <td>
                                        <label class="ui-check m-0 ui-check-rounded ui-check-md"><input  type="checkbox" id="multi-check" :checked="selected_locations.includes(location.id)" @change="selectLocation($event, location.id)"> <i></i></label>
                                    </td>
                                    <td>{{ location['id'] }}</td>
                                    <td>{{ location['location_type'] }}</td>
                                    <td>{{ location['location_name'] }}</td>
                                    <td>{{ location['contact_person'] }}</td>
                                    <td>{{ location['mobile'] }}</td>
                                    <td>{{ location['address'] }}</td>
                                    <td>
                                        <label class="ui-switch ui-switch-md info m-t-xs"><input checked="" v-model="location['status']" type="checkbox" @input="updateLocationStatus($event, location.id)"> <i></i></label>
                                    </td>
                                    <td>
                                        <div class="item-action dropdown">
                                            <a href="#" data-toggle="dropdown" class="text-muted">
                                                <svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    width="16"
                                                    height="16"
                                                    viewBox="0 0 24 24"
                                                    fill="none"
                                                    stroke="currentColor"
                                                    stroke-width="2"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    class="dv_row_action_drp_svg"
                                                >
                                                    <circle cx="12" cy="12" r="1"></circle>
                                                    <circle cx="12" cy="5" r="1"></circle>
                                                    <circle cx="12" cy="19" r="1"></circle>
                                                </svg>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right p-0" role="menu">
                                                <router-link class="dropdown-item" :to="{ name : 'viewLocation', params: { location_id: location.id } }">View Detail </router-link>
                                                <span @click="deleteLocation(location.id, location.location_name)" type="text" class="cursor-pointer dropdown-item">
                                                    Delete
                                                </span>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <pagination :data="getLocations" @pagination-change-page="getLocationsList"></pagination>

                    <pagination class="mt-2" :data="getDeletedLocations" @pagination-change-page="getDeletedLocationsList"></pagination>
                    <div class="table-responsive">
                        <table class="table table-theme table-row v-middle">
                            <thead>
                                <tr>
                                    <th class="text-muted text-danger">Deleted locations </th>
                                    <th class="text-muted">contact person </th>
                                    <th class="text-muted">contact#</th>
                                    <th class="text-muted">address</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(location,index) in getDeletedLocations.data" :key="index" class="v-middle">
                                    <td>{{ location['location_name'] }}</td>
                                    <td>{{ location['contact_person'] }}</td>
                                    <td>{{ location['mobile'] }}</td>
                                    <td>{{ location['address'] }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <pagination :data="getDeletedLocations" @pagination-change-page="getDeletedLocationsList"></pagination>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import Vue from 'vue'
import { mapState } from 'vuex'
import { deleteEmptyKeys } from "../../mixins";
import { GET_LOCATIONS_ACTION, UPDATE_LOCATION_ACTION, DELETE_LOCATION_ACTION, DELETE_LOCATIONS_ACTION, EXCEL_DOWNLOAD_LOCATIONS_ACTION, GET_DELETED_LOCATIONS_ACTION } from '@admin/store/locations/actions'
export default {
    components: { },
    data() {
        return {
            baseUrl:Vue.config.baseUrl,
            baseUrlImage: Vue.config.baseUrlImage,
            filters: {
                page: 1,
                search: '',
                perPage: 50
            },
            selected_locations: []
        }
    },
    computed:{
        ...mapState({
            getLocations: state => state.getLocation.getLocations,
            getDeletedLocations: state => state.getLocation.getDeletedLocations,
            excelLink: state => state.getLocation.excelLink
        })
    },
    mounted() {
        this.getLocationsList();
        this.getDeletedLocationsList();
    },
    methods: {
        getLocationsList: function(page=1) {
            let query = [];
            this.filters['page'] = page;
            query['params'] = deleteEmptyKeys(this.filters);
            if (this.$admin['role_id'] == 2) {
                query['params']['created_by'] = this.$admin['id'];
            }
            this.$store.dispatch('getLocation/' + GET_LOCATIONS_ACTION, query);
        },
        getDeletedLocationsList: function(page = 1) {
            let query = [];
            query['params'] = {page, perPage: 50};
            if (this.$admin['role_id'] == 2) {
                query['params']['created_by'] = this.$admin['id'];
            }
            this.$store.dispatch('getLocation/' + GET_DELETED_LOCATIONS_ACTION, query);
        },
        excelDownload: function() {
            let query = [];
            let params = {
                search: this.filters['search'],
                response_type: 'xlsx'
            };
            query['params'] = deleteEmptyKeys(params);
            if (this.$admin['role_id'] == 2) {
                query['params']['created_by'] = this.$admin['id'];
            }
            this.$store.dispatch('getLocation/' + EXCEL_DOWNLOAD_LOCATIONS_ACTION, query).then(() => {
                const link = document.createElement("a");
                link.href = this.excelLink;
                link.setAttribute("download", "locations.xlsx");
                document.body.appendChild(link);
                link.click();
            });
        },
        deleteLocation: function(location_id, location_name) {
            if (confirm('Please confirm to delete '+location_name+' location')) {
                this.$store.dispatch('getLocation/' + DELETE_LOCATION_ACTION, { location_id: location_id }).then(() => {
                    this.getLocationsList();
                    this.getDeletedLocationsList();
                });
            }
        },
        updateLocationStatus: function(event, location_id){
            this.$store.dispatch('getLocation/' + UPDATE_LOCATION_ACTION, {
                location_id, status: event.target.checked
            });
        },
        selectLocation(event, location_id) {
            if (event.target.checked) {
                this.selected_locations.push(location_id);
            } else {
                this.selected_locations = this.selected_locations.filter(id => id!=location_id);
            }
        },
        allSelect(event) {
            if (event.target.checked) { 
                this.selected_locations = this.getLocations.data.map(brand => brand.id);
            } else {
                this.selected_locations = [];
            }
        },
        deleteLocations() {
            if (confirm('Please confirm to delete selected brands.')) {
                let params = {
                    location_ids : this.selected_locations
                };
                this.$store.dispatch('getLocation/' + DELETE_LOCATIONS_ACTION, params).then(() => {
                    this.getLocationsList();
                    this.getDeletedLocationsList();
                });
            }
        }
    }
}
</script>