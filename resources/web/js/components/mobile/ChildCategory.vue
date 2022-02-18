<template>
	
	<li>
		<a :href="baseUrl + 'get-product-list/ae-en?'+'grid=0&sub_category='+getItem.slug" @click="$emit('redirectTo', getItem)" :title="getItem.name">
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg> {{getItem.name }} <span>{{ getItem.get_product_with_category_count}}</span>
    </a>
		<!-- <router-link :to="{ name: 'getProductList', params: {viewType: 'product',productSlug:getItem.slug } }" :title="getItem.name"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg> {{getItem.name }} <span>{{ getItem.get_product_with_category_count}}</span></router-link> -->
		
	</li>
	<!-- <child-category v-for="get_items in getItem.get_items" v-bind:getItem="get_items" v-bind:key="getItem.id"></child-category> -->
</template>
<script type="text/javascript">
 import Vue from 'vue'
  
export default {
     name: "ChildCategory",
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
         },
         mounted(){
         }

 }
</script>