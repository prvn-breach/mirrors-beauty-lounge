require('./bootstrap')
import router from './router'
import store from './store'
import app from './components/App'
import Vue from 'vue'
import methods from "./mixins";
import { sync } from 'vuex-router-sync'
import axios from 'axios'
import Vuelidate from 'vuelidate'
import LaravelPermissionToVueJS from 'laravel-permission-to-vuejs';
import VoerroTagsInput from '@voerro/vue-tagsinput';
Vue.component('tags-input', VoerroTagsInput);
import { BootstrapVue } from 'bootstrap-vue'
Vue.use(BootstrapVue)
Vue.use(LaravelPermissionToVueJS);
Vue.component('pagination', require('laravel-vue-pagination'));

Vue.use(Vuelidate)
sync(store, router)
Vue.config.baseUrl = process.env.MIX_BASE_URL;
Vue.config.baseUrlImage = process.env.MIX_BASE_URL+'public/'


let adminLogin = localStorage.getItem('getAdminLogin');
if(adminLogin != null){
    adminLogin = JSON.parse(adminLogin);
	Vue.prototype.$admin = adminLogin.admin;
}else{
	Vue.prototype.$admin =  {};
}

import {
    Chart,
    ArcElement,
    LineElement,
    BarElement,
    PointElement,
    BarController,
    BubbleController,
    DoughnutController,
    LineController,
    PieController,
    PolarAreaController,
    RadarController,
    ScatterController,
    CategoryScale,
    LinearScale,
    LogarithmicScale,
    RadialLinearScale,
    TimeScale,
    TimeSeriesScale,
    Decimation,
    Filler,
    Legend,
    Title,
    Tooltip,
    SubTitle
} from 'chart.js';
  
Chart.register(
    ArcElement,
    LineElement,
    BarElement,
    PointElement,
    BarController,
    BubbleController,
    DoughnutController,
    LineController,
    PieController,
    PolarAreaController,
    RadarController,
    ScatterController,
    CategoryScale,
    LinearScale,
    LogarithmicScale,
    RadialLinearScale,
    TimeScale,
    TimeSeriesScale,
    Decimation,
    Filler,
    Legend,
    Title,
    Tooltip,
    SubTitle
);

Vue.mixin({ methods });
Vue.mixin({ 
    methods: {
        loaderModal: function(action) {
            if (action == 'show') {
                if (document.querySelector('.modal-backdrop')) {
                    document.getElementById("loaderModal").classList.remove('hide');
                    document.getElementById("loaderModal").classList.add('show');
                    document.querySelector("body").classList.add('modal-open');
                    document.querySelector('.modal-backdrop').classList.remove('hide');
                    document.querySelector('.modal-backdrop').classList.add('show');
                    return;
                }
                $('#loaderModal').modal('show');
            }
    
            if (action == 'hide') {
                document.getElementById("loaderModal").classList.remove('show');
                document.getElementById("loaderModal").classList.add('hide');
                document.querySelector("body").classList.remove('modal-open');
                document.querySelector('.modal-backdrop').classList.remove('show');
                document.querySelector('.modal-backdrop').classList.add('hide');
            }
        }
    }
});

new Vue({
    el: '#app',
    router,
    store,
    render: h => h(app),
    created: function() {
    	this.getCompletedColor = "This won't change it";
    }
})
