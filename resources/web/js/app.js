require('./bootstrap')
import Vue from 'vue'
import JQuery from 'jquery'
window.$ = JQuery
Vue.component('pagination', require('laravel-vue-pagination'));
import router from './router'
import store from './store'
import methods from "./mixins";
import app from './components/App'
import { sync } from 'vuex-router-sync'
require('lang.js');
import VueLang from '@eli5/vue-lang-js'
import translations from './vue-translations.js';
import Vuelidate from 'vuelidate'
import IdleVue from "idle-vue";
import UUID from 'vue-uuid'  
import helpers from './helpers/global';
import EventBus from '@web/event/bus'

Vue.use({
    install() {
        Vue.helpers = helpers;
        Vue.prototype.$helpers = helpers;
        Vue.prototype.$gridView = 0;
        Vue.gridView=0;
       
    }
});
EventBus.getLoaderStatus=false;
Vue.use(UUID);
const eventsHub = new Vue();
Vue.use(IdleVue, {
  eventEmitter: eventsHub,
  store,
  idleTime: 30000, // 3 seconds
  startAtIdle: false
});
Vue.use(Vuelidate)

Vue.config.productionTip = false
Vue.use(VueLang, {
  messages: translations,
  locale: 'en', // Set locale
  fallback: 'en'
});

Vue.config.baseUrl = process.env.MIX_BASE_URL;
Vue.config.baseUrlImage = process.env.MIX_BASE_URL+'public/'
let getUser = localStorage.getItem('getLogin');
if(getUser != null){
    getUser = JSON.parse(getUser);
    Vue.prototype.$token = getUser.token;
	Vue.prototype.$user =  getUser.user;
}else{
	Vue.prototype.$token = null;
	Vue.prototype.$user =  {};
}
if(Vue.prototype.$getWishLists == undefined)
Vue.prototype.$getWishLists = [];

sync(store, router)


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
})




