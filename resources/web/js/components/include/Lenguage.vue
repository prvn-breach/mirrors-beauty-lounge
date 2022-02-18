<template>
	 <li><a class="dropdown-item" href="javascript:void(0)" v-if="getLenguage.active == 0" @click="getLenguageActive(getLenguage)">{{getLenguage.name}}</a></li>
</template>
<script type="text/javascript">
 import Vue from 'vue'
export default {
   components: { },
   props: {
            getLenguage: {
                getLenguage: Object,
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
         	getLenguageActive:function(lenguage){
                 let getLenguage = JSON.parse(localStorage.lenguage);
         		 getLenguage.map(function(item){
         			if(lenguage.code == item.code){
         				item.active = 1;
         			}else{
         				item.active = 0;
         			}
         			
         		});
         		 
         		lenguage.active = 1;
         		localStorage.setItem('locale',JSON.stringify(lenguage));
         		localStorage.setItem('lenguage',JSON.stringify(getLenguage));
         		
         		window.location.reload();
         	}
         },
         mounted(){
         }

 }
</script>