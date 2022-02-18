<template>
	<li><a href="#!"><img :src="getBrandImage.brand_image" :alt="getBrandImage.item_name" :title="getBrandImage.item_name"></a></li>
</template>
<script type="text/javascript">
 import Vue from 'vue'
export default {
   components: { },
   props: {
            getBrandImage: {
                getBrandImage: Object,
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