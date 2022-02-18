<template>				
	<div class="dv_account_pages_links_card">
		
		<ul>
			<li :class="getRoute == 'getProfile'?'active':''">
				<router-link :to="{ name: 'getProfile'}">
					<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>profile
				</router-link>
			</li>
			<li :class="getRoute == 'getOrders'?'active':''">
				<router-link :to="{ name: 'getOrders'}">
					<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg> orders
				</router-link>
			</li>
			<!-- <li>
					<a href="membership.html">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-check"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><polyline points="17 11 19 13 23 9"></polyline></svg> membership
					</a>
				</li> -->
			<li :class="getRoute == 'getAddress'?'active':''">
				<router-link :to="{ name: 'getAddress'}">
					<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-map-pin"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg> address
				</router-link>
			</li>
			<!-- <li :class="getRoute == 'getPayments'?'active':''">
				<router-link :to="{ name: 'getPayments'}">
					<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect><line x1="1" y1="10" x2="23" y2="10"></line></svg> payments
				</router-link>
			</li> -->
			<li :class="getRoute == 'getReturns'?'active':''">
				<router-link :to="{ name: 'getReturns'}">
					<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-repeat"><polyline points="17 1 21 5 17 9"></polyline><path d="M3 11V9a4 4 0 0 1 4-4h14"></path><polyline points="7 23 3 19 7 15"></polyline><path d="M21 13v2a4 4 0 0 1-4 4H3"></path></svg> returns
				</router-link>
			</li>
			<li :class="getRoute == 'getComplaints'?'active':''">
				<router-link :to="{ name: 'getComplaints'}">
					<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
						<path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
					</svg>
					complaints
				</router-link>
			</li>
			<li :class="getRoute == 'getAccountPassword'?'active':''">
				<router-link :to="{ name: 'getAccountPassword'}">
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg> password
				</router-link>
			</li>
		</ul>
	
	</div>
</template>
<script type="text/javascript">
 import Vue from 'vue'
  import $ from "jquery";
 export default {
 	 components: {  },
 	  data() {
            return {
              baseUrl:Vue.config.baseurl,
              baseUrlImage:Vue.config.baseUrlImage,
              getRoute:'',
               getUser:{
              	token:'',
              	status:0,
              	user:{}
              },
              getGreets:'',
              getProfile:{
              	first_name:'',
              	last_name:'',
              	name:'',
              	email:'',
              	dob:'',
              	mobile:'',
              	gender:'',
              	language:''
              },
            }
        },
         methods: {
         	currentRouteName() {
		        this.getRoute =  this.$route.name;
		    },
			faqAccordion: function() {
				$(document).ready(function() {
					$(".dv_question_txt_help" ).click(function() {
						$(this).find("svg").toggleClass('dv_rotate_question_svg_down');
						$(this).next(".dv_answer_txt_help").toggleClass('display-block');
					});
				});
			}
         },
         mounted(){
			this.faqAccordion();
         	this.currentRouteName();
         }

 }
</script>