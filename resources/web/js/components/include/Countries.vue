<template>
    <li v-if="getCountry.active == 0"><a class="dropdown-item" href="javascript:void(0)" @click="getCountrySave(getCountry)">{{getCountry.name}}</a></li>
</template>
<script type="text/javascript">
 import Vue from 'vue'
export default {
   components: { },
   props: {
            getCountry: {
                getCountry: Object,
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
          getCountrySave:function(country){
            let getCountries = JSON.parse(localStorage.countries);
            getCountries.get_countries.map(function(item){
              if(country.code == item.code){
                item.active = 1;
              }else{
                item.active = 0;
              }
              return item;
            });
           
            localStorage.setItem('countries',JSON.stringify(getCountries));
            console.log(localStorage)
            window.location.reload();
          }
         },
         mounted(){
         }

 }
</script>