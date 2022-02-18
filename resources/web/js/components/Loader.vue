<template>
	<div class="pg-loader" id="loader">
        	<img class="pg-spinner-real" :src="baseUrlImage+'images/mirrors-loader.png'" alt="" />
        </div>
</template>
	<script type="text/javascript">
 import Vue from 'vue'
 import $ from "jquery";
 import { mapState } from 'vuex'
 export default {
 	 components: {  },
 	  data() {
            return {
              baseUrl:Vue.config.baseurl,
              baseUrlImage:Vue.config.baseUrlImage,
              


            }
        },
        computed:{
	        	...mapState({
	       
	        }),
	      },
	       watch: {
		    '$route': function () {
		      	
		    },
		    
		  },
         methods: {
         	
         },
         created(){
         	

         },
         mounted(){
         	
         
         }

 }
</script>