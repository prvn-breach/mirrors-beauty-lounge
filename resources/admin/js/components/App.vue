<template>
    <div >
     <template v-if="in_array(currentUrl,getArrayOfUrl)">
         <router-view></router-view>
    </template>
    <template v-else>
         <top></top>
         <div id="main" class="layout-row flex">
            <SideMenu></SideMenu>
            <MobileMenu></MobileMenu>
            <router-view></router-view>


            <!-- Loader -->
            <div class="modal fade bd-example-modal-lg" id="loaderModal" data-backdrop="static" data-keyboard="false" tabindex="-1">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content" style="width: 48px">
                        <div class="spinner-border text-white" style="width: 3rem; height: 3rem;" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </template>     
    </div>
</template>
<script>
import Vue from 'vue'
import top from './include/Header'
import SideMenu from '@admin/components/include/SideMenu'
import MobileMenu from '@admin/components/include/MobileMenu'
import $ from "jquery";
export default {
    data() {
        return {
            baseUrl:Vue.config.baseurl,
            baseUrlImage:Vue.config.baseUrlImage,
            currentUrl:'',
            getArrayOfUrl:[],
        }
    },
    components: {top,SideMenu, MobileMenu},
    methods: {
        getUrlArray:function(){
            this.getArrayOfUrl =  [
                'login', 'forgot-password', 'update-profile'
            ];
        },
        in_array:function (needle, haystack) {
            for(var i in haystack) {
                if(haystack[i] == needle) return true;
            }
            return false;
        },
        getUrlNamge:function(){
            let _this = this;
            var currentUrl = window.location.pathname;
            if(currentUrl != ''){
                currentUrl = currentUrl.split('/');
                if(currentUrl.length > 0){
                    currentUrl = currentUrl[currentUrl.length - 1];

                }
                if(currentUrl != ''){
                    _this.currentUrl = currentUrl;
                }
            }

        },
        getPermission:function(){
        /*  window.Laravel = {
            csrfToken: "{{ csrf_token() }}",
            jsPermissions: {!! auth()->check()?auth()->user()->jsPermissions():null !!}
        }*/
        },
        loadFilterScript: function() {
            $(document).ready(function(){
                $('.dv_selected_filter_common').click(function(){
                    $('.dv_filter_content_show').toggle();
                })
            });
        }
    },
    updated: function () {
		this.$nextTick( () => {
            this.loadFilterScript();
		});
	},
    mounted() {
        this.loadFilterScript();
    },
    created: function(){
        this.getUrlNamge();
        this.getUrlArray();
    },
}
</script>
<style>
#loaderModal .modal-dialog{
    display: table;
    position: relative;
    margin: 0 auto;
    top: calc(50% - 24px);
}

#loaderModal .modal-dialog .modal-content{
    background-color: transparent;
    border: none;
}
</style>