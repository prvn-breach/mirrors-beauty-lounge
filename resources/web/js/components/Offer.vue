<template>
<div class="dv_content">
			<div class="dv_account_pages_wrapper">
				<div class="dv_account_bredcum_wrapper">
					<div class="container-fluid">
						<ul class="dv_ac_bredcum_wrapper_ul">
							<li>
								<a href="#!">
									Home
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg>
								</a>
							</li>
							<li>
								<a href="#!">
									offers
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg>
								</a>
							</li>
						</ul>
					</div>
				</div>
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-4 mb-5">
							<a href="#!">
								<img :src="baseUrlImage+'images/offers-banners/5.png'" alt="" title="" class="w-100">
							</a>
						</div>
						<div class="col-md-4 mb-5">
							<a href="#!">
								<img :src="baseUrlImage+'images/offers-banners/6.png'" alt="" title="" class="w-100">
							</a>
						</div>
						<div class="col-md-4 mb-5">
							<a href="#!">
								<img :src="baseUrlImage+'images/offers-banners/7.png'" alt="" title="" class="w-100">
							</a>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 mb-5">
							<a href="#!">
								<img :src="baseUrlImage+'images/offers-banners/13.png'" alt="" title="" class="w-100">
							</a>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4 col-sm-6 col-xs-6 col-6 mb-5">
							<a href="#!">
								<img :src="baseUrlImage+'images/offers-banners/14.png'" alt="" title="" class="w-100">
							</a>
						</div>
						<div class="col-md-4 col-sm-6 col-xs-6 col-6 mb-5">
							<a href="#!">
								<img :src="baseUrlImage+'images/offers-banners/15.png'" alt="" title="" class="w-100">
							</a>
						</div>
						<div class="col-md-4 col-sm-6 col-xs-6 col-6 mb-5">
							<a href="#!">
								<img :src="baseUrlImage+'images/offers-banners/16.png'" alt="" title="" class="w-100">
							</a>
						</div>
						<div class="col-md-4 col-sm-6 col-xs-6 col-6 mb-5">
							<a href="#!">
								<img :src="baseUrlImage+'images/offers-banners/17.png'" alt="" title="" class="w-100">
							</a>
						</div>
						<div class="col-md-4 col-sm-6 col-xs-6 col-6 mb-5">
							<a href="#!">
								<img :src="baseUrlImage+'images/offers-banners/18.png'" alt="" title="" class="w-100">
							</a>
						</div>
						<div class="col-md-4 col-sm-6 col-xs-6 col-6 mb-5">
							<a href="#!">
								<img :src="baseUrlImage+'images/offers-banners/19.png'" alt="" title="" class="w-100">
							</a>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 mb-5">
							<a href="#!">
								<img :src="baseUrlImage+'images/offers-banners/22.png'" alt="" title="" class="w-100">
							</a>
						</div>
					</div>
				</div>
			</div>

		</div>
</template>
<script type="text/javascript">
 import Vue from 'vue'
 export default {
 	 components: {  },
 	  data() {
            return {
              baseUrl:Vue.config.baseurl,
              baseUrlImage:Vue.config.baseUrlImage
            }
        },
         methods: {

         },
         mounted(){

         }

 }
</script>