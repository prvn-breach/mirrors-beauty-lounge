<template>
    <div id="content" class="flex">
        <div class="page-container">
            <div class="pt-3 pr-3 pb-5 pl-3">
                <div class="mb-5">
                    <h2 class="dv_page_heading">Newletters </h2>
                    <div class="row dv_search_delete_action_common">
                        <div class="col-md-5 col-sm-5 col-xs-5 col-5">
                            <input v-model="filters.search" @input="getNewsLettersList" type="text" class="form-control dv_common_search_for_all" name="" placeholder="Search">
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-theme table-row v-middle">
                            <thead>
                                <tr>
                                    <th style="width: 10%;" class="text-muted sortable">id</th>
                                    <th style="width: 45%;" class="text-muted sortable">email address </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(subscriber,index) in getNewsLetters.data" :key="index" class="v-middle">
                                    <td>
                                        {{ subscriber.id }}
                                    </td>
                                    <td>
                                        {{ subscriber.email }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import Vue from 'vue'
import { mapState } from 'vuex'
import { deleteEmptyKeys } from "../../mixins";
import { GET_NEWSLETTERS_ACTION } from '@admin/store/newsletters/actions'
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
            getNewsLetters: state => state.getNewsLetter.getNewsLetters,
            excelLink: state => state.getNewsLetter.excelLink
        })
    },
    mounted() {
        this.getNewsLettersList();
    },
    methods: {
        getNewsLettersList: function(page=1){
            let query = [];
            this.filters['page'] = page;
            query['params'] = deleteEmptyKeys(this.filters);
            this.$store.dispatch('getNewsLetter/' + GET_NEWSLETTERS_ACTION, query);
        }
    }
}
</script>