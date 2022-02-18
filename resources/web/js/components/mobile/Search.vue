
<template>
    <div>
        <div class="dv_search_header">
            <svg @click="$router.go(-1)" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>
            <input type="text" v-model="search_text" class="form-control dv_search_mobile_input" name="" placeholder="Search here">
            <svg @click="search" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
            <!-- <svg @click="$router.go(-1)" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg> -->
        </div>
        <div class="dv_mobile_search_wrapper">
            <div class="dv_trending_bullets">
                <span>Trending </span>
                <ul>
                    <li v-for="(category, index) in getCategories" :key="index"><a :href="baseUrl + 'get-product-list/'+$route.params.country_leng+'?'+'grid=0&category='+category.slug">{{ category['name'] }} </a></li>
                </ul>
            </div>
            <div class="dv_search_result_dropdown">
                <ul>
                    <li v-for="(category, index) in getCategories" :key="index"><a :href="baseUrl + 'get-product-list/'+$route.params.country_leng+'?'+'grid=0&category='+category.slug">{{ category['name'] }} </a></li>
                </ul>
            </div>
        </div>
    </div>
</template>
<script>
import Vue from 'vue'
import { LOAD_CATEGORY_LIST_ACTION } from '@web/store/navigation/categories/actions'
import { mapState } from 'vuex'
export default {
    components: {  },
    data() {
        return {
            baseUrl:Vue.config.baseUrl,
            search_text: ''
        }
    },
    computed:{
        ...mapState({
            getCategories: state => state.Categories.getCategories
        }),
    },
    mounted() {
        this.getCategoriesList();
    },
    methods: {
        getCategoriesList: function() {
            this.$store.dispatch('Categories/' + LOAD_CATEGORY_LIST_ACTION);
        },
        search: function() {
            window.location.href = this.baseUrl + 'get-product-list/'+this.$route.params.country_leng+'?'+'grid=0&q='+this.search_text;
        }
    }
}
</script>