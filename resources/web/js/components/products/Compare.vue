<template>
	<div class="modal bottom fade" id="compareproductpopup" tabindex="-1" role="dialog" aria-labelledby="compareproductpopup">
	  <div class="modal-dialog dv_comparision_modal_dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title dv_modal_filter_sm_txt">Comparision list </h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	        	<svg style="position: absolute; top: 15px; right: 15px;" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 240 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
	        </button>
	      </div>
	      <div class="modal-body overflow-auto pt-0 pr-0 pl-0 pb-5">
	        <div class="row m-0">
	        	<div class="col-md-2">
	        		<div class="dv_card">
	        			<img src="images/products/1.jpg" alt="" title="">
	        			Natura Bissé Diamond Extreme Moisturiser 50ml Diamond Extreme Moisturiser 50ml 
	        			<svg data-toggle="tooltip" title="Remove Product" data-placement="left" class="dv_remove_from_campare_svg" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
	        		</div>
	        	</div>
	        	<div class="col-md-2">
	        		<div class="dv_card_empty">
	        			Please select 2nd product to compare
	        		</div>
	        	</div>
	        	<div class="col-md-2">
	        		<div class="dv_card_empty">
	        			Please select 3rd product to compare
	        		</div>
	        	</div>
	        	<div class="col-md-2">
	        		<div class="dv_card_empty">
	        			Please select 4th product to compare
	        		</div>
	        	</div>
	        	<div class="col-md-2">
	        		<div class="dv_card_empty">
	        			Please select 5th product to compare
	        		</div>
	        	</div>
	        	<div class="col-md-2">
	        		<div class="dv_card_empty">
	        			Please select 6th product to compare
	        		</div>
	        	</div>
	        	<!-- <div class="col-md-12">
	        		<button type="button" class="btn btn-default dv_comparision_btn">compare this items </button>
	        	</div> -->

	        </div>
	      </div>
	      <div class="modal-footer modal-footer-fixed">
	        <button type="button" class="btn btn-secondary dv_reset_filter_btn" data-dismiss="modal">Remove all </button>
	        <button type="button" class="btn btn-primary dv_apply_filter_btn">Compare </button>
	      </div>
	    </div>
	  </div>
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