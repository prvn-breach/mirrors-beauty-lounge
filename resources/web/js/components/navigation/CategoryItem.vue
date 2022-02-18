<template>
	<li>
        <a :href="baseUrl + 'get-product-list/'+$route.params.country_leng+'?grid=0&sub_category='+getItem.slug" @click="redirectTo(getItem)" :title="getItem.name">{{getItem.name }}</a>
        <CategoryItem  v-for="get_items in getItem.get_items" v-bind:getItem="get_items" v-bind:key="getItem.id"></CategoryItem>
    </li>
</template>
<script type="text/javascript">
 import Vue from 'vue'
  
export default {
    name: "CategoryItem",
    components: { },
    props: {
        getItem: {
            getItem: Object,
            required: true,
        },
    },
    data() {
        return {
            baseUrl:Vue.config.baseUrl,
            baseUrlImage:Vue.config.baseUrlImage
        }
    },
    methods: {
        redirectTo: function(category) {
			window.location.href = this.baseUrl + 'get-product-list/'+this.$route.params.country_leng+'?grid=0&category='+category.slug;
		}
    },

 }
</script>