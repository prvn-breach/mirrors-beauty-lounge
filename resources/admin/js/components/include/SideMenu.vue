<template>
            <div id="asides" class="page-sidenav no-shrink bg-white nav-dropdown fade sticky" aria-hidden="true">
                <div class="sidenav h-100 modal-dialog bg-white">
                    <!-- sidenav top --><!-- Flex nav content -->
                    <div class="flex scrollable hover">
                        <div class="nav-active-text-primary" data-nav>
                            <ul class="nav">
                                <li>
                                    <router-link :to="{ name : 'dashboard'}" >
                                        <span class="nav-icon"><i data-feather="home"></i></span> <span class="nav-text">Dashboard</span>
                                    </router-link>
                                </li>
                                <li>
                                    <a href="javascript:void(0);">
                                        <span class="nav-icon"><i data-feather="grid"></i></span> <span class="nav-text">catalog</span> <span class="nav-caret"></span>
                                    </a>
                                    <ul class="nav-sub nav-mega">
                                        <li><router-link :to="{ name : 'brandList'}" ><span class="nav-text">brands</span></router-link></li>
                                        <li><router-link :to="{ name : 'categoryList'}" ><span class="nav-text">category</span></router-link></li>
                                        <li><router-link :to="{ name : 'subCategories'}" ><span class="nav-text">sub category</span></router-link></li>
                                        <!-- <li><a href="filter-management.html"><span class="nav-text">filter management</span></a></li> -->
                                        <li><router-link :to="{ name : 'getProducts'}" ><span class="nav-text">product management</span></router-link></li>
                                        <li><router-link :to="{ name : 'getProductReviews'}" ><span class="nav-text">product review</span></router-link></li>
                                        <li><router-link :to="{ name : 'getLocations'}"><span class="nav-text">location</span></router-link></li>
                                        <li><router-link :to="{ name : 'getStockTransfer'}"><span class="nav-text">stock transfer</span></router-link></li>
                                        <li><router-link :to="{ name : 'uploadDownload'}"><span class="nav-text">upload / download </span></router-link></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="javascript:void(0);">
                                        <span class="nav-icon"><i data-feather="grid"></i></span> <span class="nav-text">sales</span> <span class="nav-caret"></span>
                                    </a>
                                    <ul class="nav-sub nav-mega">
                                        <li><router-link :to="{ name : 'getOrders'}"><span class="nav-text">order management</span></router-link></li>
                                        <li><router-link :to="{ name : 'getInCompleteOrders'}"><span class="nav-text">incomplete orders</span></router-link></li>
                                        <li><router-link :to="{ name : 'getShippingOrders'}"><span class="nav-text">shipment</span></router-link></li>
                                        <li><router-link :to="{ name : 'getReturnedOrders'}"><span class="nav-text">return request</span></router-link></li>
                                        <li><router-link :to="{ name : 'getCancelledOrders'}"><span class="nav-text">cancelled products</span></router-link></li>
                                        <li><router-link :to="{ name : 'getComplaints'}"><span class="nav-text">complaint</span></router-link></li>
                                        <li><router-link :to="{ name : 'getCurrentWishlists'}"><span class="nav-text">current wishlist</span></router-link></li>
                                        <li><router-link :to="{ name : 'getCurrentCart'}"><span class="nav-text">current cart</span></router-link></li>
                                        <li><router-link :to="{ name : 'getCoupons'}"><span class="nav-text">coupons</span></router-link></li>
                                    </ul>
                                </li>
                                <li v-if="$admin['role_id'] == 1">
                                    <a href="javascript:void(0);">
                                        <span class="nav-icon"><i data-feather="grid"></i></span> <span class="nav-text">customers</span> <span class="nav-caret"></span>
                                    </a>
                                    <ul class="nav-sub nav-mega">
                                        <li><router-link :to="{ name : 'getCustomers'}"><span class="nav-text">customer management</span></router-link></li>
                                        <li><router-link :to="{ name : 'getCustomerReports'}"><span class="nav-text">customer reports</span></router-link></li>
                                        <!-- <li><a href="#!"><span class="nav-text">online customer</span></a></li> -->
                                        <!-- <li><router-link :to="{ name : 'getVendors'}"><span class="nav-text">vendor management</span></router-link></li> -->
                                        <!-- <li><a href="#!"><span class="nav-text">user reports</span></a></li> -->
                                        <!-- <li><router-link :to="{ name : 'getSellers'}"><span class="nav-text">seller management</span></router-link></li> -->
                                    </ul>
                                </li>
                                <li v-if="$admin['role_id'] == 1">
                                    <a href="javascript:void(0);">
                                        <span class="nav-icon"><i data-feather="grid"></i></span> <span class="nav-text">campaign</span> <span class="nav-caret"></span>
                                    </a>
                                    <ul class="nav-sub nav-mega">
                                        <li><router-link :to="{ name : 'emailCampaign'}"><span class="nav-text">email campaign</span></router-link></li>
                                        <!-- <li><a href="#!"><span class="nav-text">social media campaign</span></a></li>
                                        <li><a href="#!"><span class="nav-text">mobile campaign</span></a></li> -->
                                    </ul>
                                </li>
                                <li v-if="$admin['role_id'] == 1">
                                    <router-link :to="{ name : 'promotions'}">
                                        <span class="nav-icon"><i data-feather="grid"></i></span> <span class="nav-text">promotions </span>
                                    </router-link>
                                </li>
                                <li v-if="$admin['role_id'] == 1">
                                    <a href="javascript:void(0);">
                                        <span class="nav-icon"><i data-feather="grid"></i></span> <span class="nav-text">extension </span> <span class="nav-caret"></span>
                                    </a>
                                    <ul class="nav-sub nav-mega">
                                        <li><router-link :to="{ name : 'newsletters'}"><span class="nav-text">newsletter </span></router-link></li>
                                        <!-- <li><a href="#!"><span class="nav-text">quotation </span></a></li> -->
                                        <li><router-link :to="{ name : 'giftCertificates'}"><span class="nav-text">gift certificates </span></router-link></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="javascript:void(0);">
                                        <span class="nav-icon"><i data-feather="grid"></i></span> <span class="nav-text">reports </span> <span class="nav-caret"></span>
                                    </a>
                                    <ul class="nav-sub nav-mega">
                                        <li><router-link :to="{ name : 'getBestSellers'}"><span class="nav-text">best seller</span></router-link></li>
                                        <li><router-link :to="{ name : 'getProductsNeverPurchase'}"><span class="nav-text">product never purchased.</span></router-link></li>
                                        <li><router-link :to="{ name : 'getCountryReport'}"><span class="nav-text">country report</span></router-link></li>
                                        <li><router-link :to="{ name : 'getInventory'}"><span class="nav-text">inventory </span></router-link></li>
                                        <li><router-link :to="{ name : 'productSaleCostReport'}"><span class="nav-text">Product Sales Cost </span></router-link></li>
                                        <li><router-link :to="{ name : 'productInsertReport'}"><span class="nav-text">Product Insert Report </span></router-link></li>
                                        <li><router-link :to="{ name : 'semExpensesReport'}"><span class="nav-text">SEM Expenses Report  </span></router-link></li>
                                        <li><router-link :to="{ name : 'semSaleReport'}"><span class="nav-text">SEM Sales Report </span></router-link></li>
                                        <li><router-link :to="{ name : 'productVisitsReport'}"><span class="nav-text">Product Visits </span></router-link></li>
                                        <li><router-link :to="{ name : 'categorySaleCostReport'}"><span class="nav-text">Category Sales Cost </span></router-link></li>
                                        <li><router-link :to="{ name : 'activeCustomerLocationsReport'}"><span class="nav-text">Active Customer Locations </span></router-link></li>
                                        <li><router-link :to="{ name : 'shippingCostReport'}"><span class="nav-text">Shipping Cost Per Order </span></router-link></li>
                                        <li><router-link :to="{ name : 'orderStatusReport'}"><span class="nav-text">Order Status </span></router-link></li>
                                        <li><router-link :to="{ name : 'topCustomersByCost'}"><span class="nav-text">Top 10 Customers(Cost) </span></router-link></li>
                                        <li><router-link :to="{ name : 'topCustomersByItem'}"><span class="nav-text">Top 10 Customers(Item) </span></router-link></li>
                                        <li><router-link :to="{ name : 'topCategoriesByCost'}"><span class="nav-text">Top 10 Categories(Cost) </span></router-link></li>
                                        <li><router-link :to="{ name : 'topCategoriesByItem'}"><span class="nav-text">Top 10 Categories(Item) </span></router-link></li>
                                        <li><router-link :to="{ name : 'topProductsByCost'}"><span class="nav-text">Top 10 Products(Cost) </span></router-link></li>
                                        <li><router-link :to="{ name : 'topProductsByItem'}"><span class="nav-text">Top 10 Products(Item) </span></router-link></li>
                                        <li><a href="#!"><span class="nav-text">Payment Method(orders) </span></a></li>
                                        <li><a href="#!"><span class="nav-text">Payment Method(Cost) </span></a></li>
                                    </ul>
                                </li>
                                <li v-if="$admin['role_id'] == 1">
                                    <a href="javascript:void(0);">
                                        <span class="nav-icon"><i data-feather="grid"></i></span> <span class="nav-text">design </span> <span class="nav-caret"></span>
                                    </a>
                                    <ul class="nav-sub nav-mega">
                                        <li><router-link :to="{ name : 'cms'}"><span class="nav-text">CMS </span></router-link></li>
                                        <li><router-link :to="{ name : 'homePageBanners'}"><span class="nav-text">home page banners </span></router-link></li>
                                        <!-- <li><a href="#!"><span class="nav-text">home category </span></a></li> -->
                                        <li><router-link :to="{ name : 'guides'}"><span class="nav-text">how to guide </span></router-link></li>
                                    </ul>
                                </li>
                                <li v-if="$admin['role_id'] == 1">
                                    <a href="javascript:void(0);">
                                        <span class="nav-icon"><i data-feather="grid"></i></span> <span class="nav-text">setting </span> <span class="nav-caret"></span>
                                    </a>
                                    <ul class="nav-sub nav-mega">
                                        <li><router-link :to="{ name : 'addStoreDetail'}"><span class="nav-text">store detail </span></router-link></li>
                                        <li><router-link :to="{ name : 'warehouseDetail'}"><span class="nav-text">warehouse detail </span></router-link></li>
                                        <!-- <li><a href="#!"><span class="nav-text">roles </span></a></li>
                                        <li><a href="#!"><span class="nav-text">currency </span></a></li>
                                        <li><a href="#!"><span class="nav-text">blogs </span></a></li> -->
                                    </ul>
                                </li>
                                <!-- <li>
                                    <a href="javascript:void(0);">
                                        <span class="nav-icon"><i data-feather="grid"></i></span> <span class="nav-text">shipping option </span>
                                    </a>
                                </li> -->
                                <li v-if="$admin['role_id'] == 1">
                                    <router-link :to="{ name : 'getPaymentOptionsByCountry' }">
                                        <span class="nav-icon"><i data-feather="grid"></i></span> <span class="nav-text">payment options </span>
                                    </router-link>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- sidenav bottom -->
                </div>
            </div>
</template>
<script type="text/javascript">
 import Vue from 'vue'
 export default {
     components: { },
      data() {
            return {
              
            }
        },
        computed:{
                
            },
         methods: {
            
            
         },
          watch: {
            
          },
         created() {
          
        },
         mounted(){
            
           
            
         }

 }
</script>