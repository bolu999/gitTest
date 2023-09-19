<template>
   
   <!-- shop beggins here-->
    <div id="tt-pageContent">
        <div v-if="loading" id="loader-wrapper">
            <div id="loader">
               <div class="dot"></div>
               <div class="dot"></div>
               <div class="dot"></div>
               <div class="dot"></div>
               <div class="dot"></div>
               <div class="dot"></div>
               <div class="dot"></div>
            </div>
         </div>
         <slider-component></slider-component>
         <div class="container-indent">
            <div class="container">
               <div class="tt-block-title">
                  <h1 class="tt-title">WELCOME!</h1>
                  <div class="tt-description">ABOUT OUR STORE</div>
               </div>
               <div class="tt-text-box01">{{ about }}</div>
            </div>
         </div>
         <div class="container-indent">
            <div class="container container-fluid-custom-mobile-padding">
               <ul class="nav nav-tabs tt-tabs-default" role="tablist">
                  <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#tt-tab01-01">NEW ARRIVALS</a></li>
                  <!-- <li class="nav-item"><a class="nav-link" data-ajax-include="ajax-content/index08_tabs_specials.html" data-toggle="tab" href="#tt-tab01-02">SPECIALS</a></li>
                  <li class="nav-item"><a class="nav-link" data-ajax-include="ajax-content/index08_tabs_bestsellers.html" data-toggle="tab" href="#tt-tab01-03">BESTSELLERS</a></li>
                  <li class="nav-item"><a class="nav-link" data-ajax-include="ajax-content/index08_tabs_mostviewed.html" data-toggle="tab" href="#tt-tab01-04">MOST VIEWED</a></li>
                  <li class="nav-item"><a class="nav-link" data-ajax-include="ajax-content/index08_tabs_featured products.html" data-toggle="tab" href="#tt-tab01-05">FEATURED PRODUCTS</a></li> -->
               </ul>
               <div class="">
                  <div class="tab-pane active" id="tt-tab01-01">
                     <div class="row tt-layout-product-item">

                        
                        <div v-for="(product, index) in products" :key="index" class="col-6 col-md-4 col-lg-3">
                           <div class="tt-product thumbprod-center">
                              <div class="tt-image-box">
                                 <span v-if="loggedIn" @click="addToWishList(product.id)" class="tt-btn-wishlist" data-tooltip="Add to Wishlist" data-tposition="left"></span> 
                                 <router-link v-else to="/login" class="tt-btn-wishlist" data-tooltip="Add to Wishlist" data-tposition="left"></router-link> 
                                 <router-link :to="{path : '/single-product/'+product.id+'/'+product.name}">
                                    <span class="tt-img">
                                       <img :src="product.image_link1" :data-src="product.image_link1" alt="">
                                    </span>
                                    <span class="tt-img-roll-over">
                                       <img :src="product.image_link2" :data-src="product.image_link2" alt="">
                                    </span>
                                    <span v-if="product.promotion" class="tt-label-location"><span class="tt-label-sale">On Discount</span></span>
                                 </router-link>
                              </div>
                              <div class="tt-description">
                                 <div class="tt-row">
                                    <ul class="tt-add-info">
                                          <li><a href="#">{{ product.category.name }}</a></li>
                                    </ul>
                                       <star-rating style="margin-left: auto; margin-right:auto;" :show-rating="false" :star-size="20" :increment="0.01" v-if="product.rate != null" v-model="product.rate" :read-only="true"></star-rating>
                                    <!-- <div class="tt-rating"><i class="icon-star"></i> <i class="icon-star"></i> <i class="icon-star"></i> <i class="icon-star"></i> <i class="icon-star"></i></div> -->
                                 </div>
                                    <h2 class="tt-title"><router-link :to="{path : '/single-product/'+product.id+'/'+product.name}">{{product.name}}</router-link></h2>

                                    <div v-if="product.promotion == 0" class="tt-price">₦{{ numberWithCommas(product.price_list.normalPrice) }}/<sub>{{ product.price_list.quantity }} piece(s)</sub></div>
                                    
                                    <div v-else class="tt-price" style="color:green;"><strike style="opacity: 0.5; color:black">₦{{ numberWithCommas(product.price_list.normalPrice) }}/<sub>{{ product.price_list.quantity }} piece(s)</sub></strike>
                                    <br>
                                     ₦{{ numberWithCommas(product.price_list.discountPrice) }}/<sub>{{ product.price_list.quantity }} piece(s)</sub>
                                    </div>

                                 <div class="tt-product-inside-hover">
                                    <div class="tt-row-btn"><a href="javascript:void(0);" class="tt-btn-addtocart thumbprod-button-bg" data-toggle="modal" data-target="#modalAddToCartProduct" @click="addToCart(product.id, product.name, product.price_list.quantity, product.price_list.normalPrice, product.image_link1, product.inventory_qty, product.promotion,  product.price_list.discountPrice)">ADD TO CART</a></div>
                                    <div  v-if="loggedIn" class="tt-row-btn"><span @click="addToWishList(product.id)" class="tt-btn-wishlist"></span></div>
                                    <div v-else class="tt-row-btn"><router-link to="/login" class="tt-btn-wishlist"></router-link></div>
                                 </div>
                              </div>
                           </div>
                        </div>

                       
                        <div class="col-6 col-md-4 col-lg-3">
                           <div class="tt-product thumbprod-center">
                              <div class="tt-image-box">
                                 <!-- <a href="#" class="tt-btn-wishlist" data-tooltip="Add to Wishlist" data-tposition="left"></a>  -->
                                 <a href="#">
                                    <!-- <span class="tt-img"><img src="images/loader.svg" data-src="images/product/product-45.jpg" alt=""></span> -->
                                    <!-- <span class="tt-img-roll-over"><img src="images/loader.svg" data-src="images/product/product-45-01.jpg" alt=""></span> -->
                                 </a>
                              </div>
                           </div>
                        </div>
                        
                     </div>
                     <div class="text-center tt_product_showmore"><router-link class="btn btn-border" to="/shop-listing">Visit Shop</router-link></div>
                  </div>
                  <div class="tab-pane" id="tt-tab01-02"></div>
                  <div class="tab-pane" id="tt-tab01-03"></div>
                  <div class="tab-pane" id="tt-tab01-04"></div>
                  <div class="tab-pane" id="tt-tab01-05"></div>
               </div>
            </div>
         </div>
         <div class="container-indent container-inner container-bg container-bg-01" style="background: unset !important; background-color: #3c3c3c !important;">
            <div class="container">
               <div class="tt-slider-fullwidth arrow-location-center-02 slick-animated-show-js" data-slick='{
                  "dots": false,
                  "arrows": true,
                  "infinite": true,
                  "speed": 300,
                  "slidesToShow": 1,
                  "adaptiveHeight": false
                  }'>
                  <div class="item">
                     <a href="javascript:void(0);" class="tt-content-info">
                        <h2 class="tt-title">WHAT THEY’RE SAYING</h2>
                        <p>{{ quote1.content }}</p>
                        <div class="tt-subscription">
                           <div class="tt-text-large">{{ quote1.name }}</div>
                           <div class="tt-text-small">{{ quote1.designation }}</div>
                        </div>
                     </a>
                  </div>
                  <div class="item">
                     <a href="javascript:void(0);" class="tt-content-info">
                        <h2 class="tt-title">WHAT THEY’RE SAYING</h2>
                        <p>{{ quote2.content }}</p>
                        <div class="tt-subscription">
                           <div class="tt-text-large">{{ quote2.name }}</div>
                           <div class="tt-text-small">{{ quote2.designation }}</div>
                        </div>
                     </a>
                  </div>
               </div>
            </div>
         </div>

      <footer class="nomargin" id="tt-footer">
         <div class="tt-footer-center tt-color-scheme-01">
               <div class="container">
                  <div class="tt-row">
                     <div class="tt-newsletter">
                        <div class="tt-mobile-collapse">
                           <h4 class="tt-collapse-title">{{ newsletter_header }}</h4>
                           <div class="tt-collapse-content">
                              <p>{{ newsletter_message }}</p>
                              <form id="newsletterform" class="form-inline form-default" method="post" novalidate="novalidate" action="#">
                                 <div class="form-group">
                                    <input type="text" v-model="newsletter_email" name="email" class="form-control" placeholder="Enter your e-mail"> 
                                   
                                    <button v-if="sending" type="submit" class="btn" disabled>Please wait...</button>
                                    <button v-else @click="submitEmail()" class="btn">JOIN US</button>
                                 </div>
                              </form>
                           </div>
                        </div>
                     </div>
                     <ul class="tt-social-icon">
                        <li><a class="icon-g-64" target="_blank" :href="'http://'+facebook"></a></li>
                        <li><a class="icon-h-58" target="_blank" :href="'http://'+twitter"></a></li>
                        <li><a class="icon-g-67" target="_blank" :href="'http://'+instagram"></a></li>
                     </ul>
                  </div>
               </div>
            </div>
            <vue-snotify></vue-snotify>
            <!-- <footer-component></footer-component> -->
         </footer>
         <vue-snotify></vue-snotify>
      </div>
</template>

<script>
import Axios from "axios";
import { required, email } from 'vuelidate/lib/validators';

export default {
   name: 'Home',

   mounted() {
      if(this.$store.getters.role == null)
      {
         this.loggedIn = false;
      }
      else
      {
         this.loggedIn = true
      }
      this.getProducts();
      this.getDetails();
   },

   data () {
      return {
         products       : [],
         about : null,
         success : false,
         quote1 : {},
         quote2 : {},
         newsletter_header: null,
         newsletter_message: null,
         newsletter_email: null,
         facebook: null,
         instagram: null,
         twitter: null,
         loading        : false,
         sending        : false,
         loggedIn       : false,
      };
   },

   validations: {
   
      newsletter_email: {
         required,
         email
      },
      
   },

   methods : {
       numberWithCommas(x) {
         return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
      },

      submitEmail()
      {
         
         this.$v.$touch()
         if (this.$v.$invalid) 
         {
            this.submitStatus  = 'ERROR'
         }
         else 
         {
            this.sending = true;
            Axios.get(process.env.MIX_APP_URL+'/submit/email/'+this.newsletter_email)
            .then(response => {            
            
               if(response.data == true)
               {
                  this.success = true;
                  this.sending = false;
                  this.$snotify.success('Subscription Successful!', {
                           timeout: 3000,
                           showProgressBar: true,
                           closeOnClick: false,
                           pauseOnHover: true,
                           position : "rightTop"
                     });
               }
               else if(response.data == 'present')
               {
                  this.sending = false;
                  this.$snotify.info('Already subscribed!', {
                     timeout: 6000,
                     showProgressBar: true,
                     closeOnClick: true,
                     pauseOnHover: true,
                     position : "rightTop"
                  });
               }
               else
               {
                  this.sending = false;
                  this.$snotify.error('Failed!', {
                     timeout: 3000,
                     showProgressBar: true,
                     closeOnClick: false,
                     pauseOnHover: true,
                     position : "rightTop"
                  });
               }
            }).catch(error => {
               
            });
         }
      },

      addToCart(id, name, qty, price, image, stock, promotion, promoPrice) {
         this.$store.dispatch('addToCart', {product_id : id, product_name : name, purchaseQty: 1, product_qty : qty, product_price : price, product_image : image, product_stock: stock, promotion: promotion, promoPrice : promoPrice});
        this.$snotify.success('ITEM ADDED TO CART', {
         timeout: 3000,
         showProgressBar: false,
         closeOnClick: true,
         pauseOnHover: true,
         position : "rightTop"
         });
      },

      addToWishList(id)
      {
          this.loading = true;
         Axios.get(process.env.MIX_APP_URL+'/add/wishlist/'+id)
         .then(response => {
            if(response.data.status == true)
            {
             this.loading = false;

                this.$snotify.success('ITEM ADDED TO WISHLIST', {
                  timeout: 3000,
                  showProgressBar: false,
                  closeOnClick: true,
                  pauseOnHover: true,
                  position : "rightTop"
               });
            }
            else
            {
                  this.loading = false;
                 this.$snotify.error(response.data.message, {
                  timeout: 3000,
                  showProgressBar: false,
                  closeOnClick: true,
                  pauseOnHover: true,
                  position : "rightTop"
               });
            }  
           
         }).catch(error => {
            
         });
      },

      getProducts()
      {
         this.loading = true;
         Axios.get(process.env.MIX_APP_URL+'/home/products')
         .then(response => { 
            console.log(response.data.status);
                 
            if(response.data.status == true)
            {
               this.products = response.data.products;
               this.loading = false;     
            }
            else
            {
               // this.products = response.data.products;
               this.loading = false;     
            }
         }).catch(error => {
            
         });
      },

       getDetails()
      {
         Axios.get(process.env.MIX_APP_URL+'/home/details')
         .then(response => {                       
            this.about = response.data['0'].about;
            this.quote1 = response.data['1']['0'];
            this.quote2 = response.data['1']['1'];
            this.newsletter_header = response.data['0'].news_letter_title;
            this.newsletter_message = response.data['0'].news_letter_msg;
            this.facebook = response.data['0'].facebook;
            this.twitter = response.data['0'].twitter;
            this.instagram = response.data['0'].instagram;
            this.loading = false;
         }).catch(error => {
            
         });
      }
   }
}
</script>

<style>
    @media screen and (max-width: 870px) {
   
      .nav-item{
         margin-left: auto !important;
         margin-right: auto !important;
      }

      }
</style>