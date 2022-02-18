<template>
    <li><router-link :to="{ name: 'getProductList', params: {viewType: 'brand',productSlug:getBrandItem.slug } }" :title="getBrandItem.item_name">{{getBrandItem.item_name }}</router-link></li>
	
</template>
<script type="text/javascript">
 import Vue from 'vue'
export default {
 	 components: { },
 	 props: {
            getBrandItem: {
                getBrandItem: Object,
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