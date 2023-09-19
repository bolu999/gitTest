<template>
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
         <div class="tt-breadcrumb">
            <div class="container">
               <ul>
                  <li><a href="/">Home</a></li>
                  <li><router-link to="/shop-listing">Shop</router-link></li>
                  <li v-if="product != null">{{ product.name }}</li>
               </ul>
            </div>
         </div>
         <div class="container-indent">
            <!-- mobile product slider  -->
            <div class="tt-mobile-product-layout visible-xs">
               <!-- <div class="tt-mobile-product-slider arrow-location-center" id="zoom-mobile__slider"> -->
                  <!-- <div><img data-lazy="images/product/product-41.jpg" alt=""></div>
                  <div><img data-lazy="images/product/product-41-01.jpg" alt=""></div>
                  <div><img data-lazy="images/product/product-41-02.jpg" alt=""></div>
                  <div><img data-lazy="images/product/product-41-03.jpg" alt=""></div> -->
                  <!-- <div>
                     <div class="tt-video-block">
                        <a href="#" class="link-video"></a>
                        <video class="movie" src="video/video.mp4" poster="video/video_img.jpg"></video>
                     </div>
                  </div> -->
                  <!-- <div>
                     <div class="embed-responsive embed-responsive-16by9">
                     	<iframe class="embed-responsive-item" src="http://www.youtube.com/embed/GhyKqj_P2E4" allowfullscreen></iframe>
                     </div>
                     </div> -->
               <!-- </div> -->
               <div id="zoom-mobile__layout">
                  <a class="zoom-mobile__close btn" href="#">Back</a>
                  <div id="tt-fotorama" data-nav="thumbs" data-auto="false" data-allowfullscreen="false" dataa-fit="cover"></div>
               </div>
            </div>
            <div  v-if="product != null" class="container container-fluid-mobile">
               <div class="row">
                  <div class="col-6">
                     <div class="tt-product-single-img">
                        <div> <img class="zoom-product" :src="product.image_link1" :data-zoom-image="product.image_link1" alt=""></div>
                     </div>
                     <!-- <div class="product-images-carousel">
                        <ul id="smallGallery" class="arrow-location-02 slick-animated-show-js">
                           <li><a class="zoomGalleryActive" href="#" data-image="images/product/product-41.jpg" data-zoom-image="images/product/product-41.jpg"><img src="images/product/product-41.jpg" alt=""></a></li>
                           <li><a href="#" data-image="images/product/product-41-01.jpg" data-zoom-image="images/product/product-41-01.jpg"><img src="images/product/product-41-01.jpg" alt=""></a></li>
                           <li><a href="#" data-image="images/product/product-41-02.jpg" data-zoom-image="images/product/product-41-02.jpg"><img src="images/product/product-41-02.jpg" alt=""></a></li>
                           <li><a href="#" data-image="images/product/product-41-03.jpg" data-zoom-image="images/product/product-41-03.jpg"><img src="images/product/product-41-03.jpg" alt=""></a></li>
                           <li>
                              <div class="video-link-product" data-toggle="modal" data-type="youtube" data-target="#modalVideoProduct" data-value="http://www.youtube.com/embed/GhyKqj_P2E4">
                                 <img src="images/product/product-small-empty.png" alt="">
                                 <div><i class="icon-f-32"></i></div>
                              </div>
                           </li>
                           <li>
                              <div class="video-link-product" data-toggle="modal" data-type="video" data-target="#modalVideoProduct" data-value="video/video.mp4" data-poster="video/video_img.jpg">
                                 <img src="images/product/product-small-empty.png" alt="">
                                 <div><i class="icon-f-32"></i></div>
                              </div>
                           </li>
                        </ul>
                     </div> -->
                  </div>
                  <div class="col-6">
                     <div class="tt-product-single-info">
                        <!-- <div class="tt-add-info">
                           <ul>
                              <li><span>SKU:</span> 001</li>
                              <li><span>Availability:</span> 40 in Stock</li>
                           </ul>
                        </div> -->
                        <h1 class="tt-title">{{ product.name }}</h1>
                              <ul>
                                 <li><b>Product Category:</b> {{ product.category.name }}</li>
                                 <li><b>Stock Quantity:</b> {{ product.inventory_qty }}</li>

                                 <li v-if="product.promotion == 0">Unit Price: ₦{{ numberWithCommas(parseFloat(product.price_list.normalPrice)) }}/<sub>{{product.price_list.quantity}}</sub></li>
                                 <li style="color: green;" v-else>Unit Price:  ₦{{ numberWithCommas(parseFloat(product.price_list.discountPrice)) }}/<sub>{{product.price_list.quantity}}</sub> <strike style="opacity: 0.5; color:black"> ₦{{ numberWithCommas(parseFloat(product.price_list.normalPrice)) }}</strike></li>


                              </ul>
                        <div v-if="product.promotion == 0" class="tt-price"><span class="new-price">₦{{ numberWithCommas(product.price_list.normalPrice * purchaseQty) }}/<sub>{{ product.price_list.quantity * purchaseQty }} piece(s)</sub> </span> <span class="old-price"></span></div>
                        <div v-else class="tt-price"><span class="new-price">₦{{ numberWithCommas(product.price_list.discountPrice * purchaseQty) }}/<sub>{{ product.price_list.quantity * purchaseQty }} piece(s)</sub> </span> <sub><span class="old-price" style="opacity: 0.5;"> ₦{{ numberWithCommas(product.price_list.normalPrice * purchaseQty) }}</span></sub></div>
                        
                        <div class="tt-review">
                           <star-rating :star-size="20" :increment="0.01" :read-only="true" v-if="reviews.length > 0"  v-model="productRating"></star-rating>
                        </div>
                        <div class="tt-review">
                           <a href="javascript:void(0)">({{ reviews.length }} Customer Review)</a>
                        </div>

                        <div class="tt-wrapper">{{ product.description }}</div>
                        <!-- <div class="tt-wrapper">
                           <div class="tt-countdown_box_02">
                              <div class="tt-countdown_inner">
                                 <div class="tt-countdown" data-date="2018-11-01" data-year="Yrs" data-month="Mths" data-week="Wk" data-day="Day" data-hour="Hrs" data-minute="Min" data-second="Sec"></div>
                              </div>
                           </div>
                        </div> -->
                        
                        
                        <div class="tt-wrapper">
                           <div class="tt-row-custom-01">
                              <div class="col-item">
                                 <div class="tt-input-counter style-01"><span class="minus-btn" @click="purchaseQty > 1 ? purchaseQty-- : purchaseQty = 1"></span> <input min="1" type="number" v-model="purchaseQty" value=""> <span class="plus-btn" @click="purchaseQty <  product.inventory_qty ? purchaseQty++ : purchaseQty = product.inventory_qty"></span></div>
                              </div>
                              <div class="col-item"><a :href="'/#/single-product/'+product.id+'/'+product.name" class="btn btn-lg" @click="addToCart(product.id, product.name, product.price_list.quantity, product.price_list.normalPrice, product.image_link1, product.inventory_qty, product.promotion,  product.price_list.discountPrice)"><i class="icon-f-39"></i>ADD TO CART</a></div>
                           </div>
                        </div>
                        <div class="tt-wrapper">
                           <ul class="tt-list-btn">
                              <li  v-if="loggedIn"><a class="btn-link"  @click="addToWishList(product.id)" href="javascript:void(0);"><i class="icon-n-072"></i>ADD TO WISH LIST</a></li>
                              <li  v-else><router-link to="/login" class="btn-link"  href="javascript:void(0);"><i class="icon-n-072"></i>ADD TO WISH LIST</router-link></li>
                              <!-- <li><a class="btn-link" href="#"><i class="icon-n-08"></i>ADD TO COMPARE</a></li> -->
                           </ul>
                        </div>
                        

                        <div class="tt-wrapper" v-if="product.hasSpec">
                           <div class="tt-item">
                              <h5><b>Specifications</b></h5>
                              <div class="tt-collapse-content">
                                 <table class="tt-table-03">
                                    <tbody>
                                       <tr v-for="(spec, index) in product.specification" :key="index">
                                          <td>{{ spec.title }}:</td>
                                          <td>{{ spec.content }}</td>
                                       </tr>
                                    </tbody>
                                 </table>
                              </div>
                           </div>
                        </div>
                        
                        <div class="tt-collapse-block">
                         
                          
                           <div class="tt-item">
                              <div class="tt-collapse-title">REVIEWS</div>
                              <!-- <div class="tt-collapse-content"> -->
                                 <div class="tt-review-block">
                                    <div class="tt-row-custom-02">
                                       <div class="col-item">
                                          <!-- <h2 class="tt-title">1 REVIEW FOR VARIABLE PRODUCT</h2> -->
                                       </div>
                                       <!-- <div class="col-item"><a href="#">Write a review</a></div> -->
                                    </div>
                                    <div class="tt-review-comments">

                                       <div class="tt-item" v-for="(review, index) in reviews" :key="index">
                                          <div class="tt-avatar"><a href="#"><img data-src="images/product/single/review-comments-img-01.jpg" alt=""></a></div>
                                          <div class="tt-content">
                                             <star-rating :star-size="14" :read-only="true" v-model="review.rating"></star-rating>
                                             <!-- <div class="tt-rating"><i class="icon-star"></i> <i class="icon-star"></i> <i class="icon-star"></i> <i class="icon-star-half"></i> <i class="icon-star-empty"></i></div> -->
                                             <div class="tt-comments-info"><span class="username">by <span>{{review.name}}</span></span> <span class="time">on January 14, 2017</span></div>
                                             <div class="tt-comments-title">Review:</div>
                                             <p>{{ review.message }}</p>
                                          </div>
                                       </div>
                                      
                                    </div>
                                    <div class="tt-review-form">
                                       <div class="tt-collapse-title">Add your review</div>
                                       <!-- <p>Your email address will not be published. Required fields are marked *</p> -->
                                       <div class="tt-rating-indicator">
                                          <div class="tt-title">YOUR RATING *</div>
                                          <star-rating :star-size="20" v-model="rating"></star-rating>
                                       </div>
                                       <form class="form-default">
                                          <div class="form-group"><label for="inputName" class="control-label">YOUR NAME</label> <input v-model="rater_name" type="text" class="form-control" id="inputName" placeholder="Enter your name"></div>
                                          <!-- <div class="form-group"><label for="inputEmail" class="control-label">COUPONE E-MAIL *</label> <input type="password" class="form-control" id="inputEmail" placeholder="Enter your e-mail"></div> -->
                                          <div class="form-group"><label for="textarea" class="control-label">YOUR REVIEW</label> <textarea v-model="review" class="form-control" id="textarea" placeholder="Enter your review" rows="8"></textarea></div>
                                          <div class="form-group" v-if="isRating"><span  class="btn" disabled>Rating...</span></div>
                                          <div class="form-group" v-else><span class="btn" @click="submitReview()">SUBMIT</span></div>
                                       </form>
                                    </div>
                                 </div>
                              <!-- </div> -->
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="container-indent wrapper-social-icon">
            <div class="container">
               <ul class="tt-social-icon justify-content-center">
                  <li><a class="icon-g-64" href="http://www.facebook.com/"></a></li>
                  <li><a class="icon-h-58" href="http://www.facebook.com/"></a></li>
                  <li><a class="icon-g-66" href="http://www.twitter.com/"></a></li>
                  <li><a class="icon-g-67" href="http://www.google.com/"></a></li>
                  <li><a class="icon-g-70" href="https://instagram.com/"></a></li>
               </ul>
            </div>
         </div>
         
         <div class="container-indent" v-if="relatedProducts != []">
            <div class="container container-fluid-custom-mobile-padding">
               <div class="tt-block-title text-left">
                  <h3 class="tt-title-small">RELATED PRODUCTS</h3>
               </div>
               <!-- <div class="tt-carousel-products row arrow-location-right-top tt-alignment-img tt-layout-product-item slick-animated-show-js"> -->
               <div class="row tt-alignment-img tt-layout-product-item">

                  <div v-for="(product, index) in relatedProducts" :key="index" class="col-4 col-md-4 col-lg-3">
                     <div class="tt-product thumbprod-center">
                        <div class="tt-image-box"><span @click="addToWishList(product.id)" href="#" class="tt-btn-wishlist" data-tooltip="Add to Wishlist" data-tposition="left"></span> <router-link :to="{path : '/single-product/'+product.id+'/'+product.name}"><span class="tt-img"><img :src="product.image_link1" :data-src="product.image_link1" alt=""></span><span class="tt-img-roll-over"><img :src="product.image_link2" :data-src="product.image_link2" alt=""></span><span v-if="product.promotion" class="tt-label-location"><span class="tt-label-sale">On Discount</span></span></router-link></div>
                        <div class="tt-description">
                           <div class="tt-row">
                              <ul class="tt-add-info">
                                 <li><a href="#">{{ product.category.name }}</a></li>
                              </ul>
                           </div>
                               <h2 class="tt-title"><router-link :to="{path : '/single-product/'+product.id+'/'+product.name}">{{product.name}}</router-link></h2>
                                 <div v-if="product.promotion == 0" class="tt-price">₦{{ numberWithCommas(product.price_list.normalPrice) }}/<sub>{{ product.price_list.quantity }} piece(s)</sub></div>
                                 
                                 <div v-else class="tt-price" style="color:green;"><strike style="opacity: 0.5; color:black">₦{{ numberWithCommas(product.price_list.normalPrice) }}/<sub>{{ product.price_list.quantity }} piece(s)</sub></strike>
                                 <br>
                                    ₦{{ numberWithCommas(product.price_list.discountPrice) }}/<sub>{{ product.price_list.quantity }} piece(s)</sub>
                                 </div>
                              <div class="">
                              <div class="tt-row-btn"><a href="javascript:void(0);" class="tt-btn-addtocart thumbprod-button-bg" data-toggle="modal" data-target="#modalAddToCartProduct" @click="addToCart(product.id, product.name, product.price_list.quantity, product.price_list.normalPrice, product.image_link1, product.inventory_qty, product.promotion,  product.price_list.discountPrice)">ADD TO CART</a></div>
                              <div class="tt-row-btn"><a href="javascript:void(0);" class="tt-btn-wishlist"></a></div>
                           </div>
                        </div>
                     </div>
                  </div>
              
                  
               </div>
            </div>
         </div>
            <vue-snotify></vue-snotify>
      </div>
</template>

<script>
import Axios from "axios";

export default {
    name:'Product',
    data(){
       return {
            product : null,
            relatedProducts : [],
            reviews : [],
            totalPage      : 0,
            nextPage       : 0,
            currentPage    : 0,
            loading : false,
            purchaseQty : 1,
            rating : 0,
            rater_name : '',
            review : '',
            isRating : false,
            productRating : 0,
        loggedIn        : false,

       }
    },

    mounted()
    {
        if(this.$store.getters.role == null)
      {
         this.loggedIn = false;
      }
      else
      {
         this.loggedIn = true;
      }

      this.getProductData();
      this.loading = true;
    },

   //  updated()
   //  {
   //    this.getProductData();
   //  },

    watch:{
      $route (to, from){
      this.getProductData();    }
   },

   methods : {
       numberWithCommas(x) {
         return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
      },

      calculateRating()
      {
         this.productRating = 0;
         this.reviews.forEach(element => {
            this.productRating += element.rating;
         });

         this.productRating = this.productRating/this.reviews.length;
      },

      addToCart(id, name, qty, price, image, stock, promotion, promoPrice) {
         this.$store.dispatch('addToCart', {product_id : id, product_name : name, purchaseQty: this.purchaseQty, product_qty : qty, product_price : price, product_image : image, product_stock: stock, promotion: promotion, promoPrice : promoPrice});
         this.$snotify.success('ITEM ADDED TO CART', {
         timeout: 3000,
         showProgressBar: false,
         closeOnClick: true,
         pauseOnHover: true,
         position : "rightTop"
         });
      },

      submitReview()
      {
         this.isRating = true;
          Axios.post(process.env.MIX_APP_URL+'/save/rating', {rating : this.rating, name: this.rater_name, review: this.review, id: this.product.id})
            .then(response => {
                if(response.data.status == true)
                {
                    this.$snotify.success('RATING ADDED!', {
                        timeout: 2000,
                        showProgressBar: true,
                        closeOnClick: false,
                        pauseOnHover: true,
                        position : "rightTop"
                    }).on("destroyed", () => {
                        this.isRating = false;
                        // this.$router.push('/admin-categories');    
                    });

                    this.getProductData();
                  //   this.calculateRating();
                } 
                else
                {
                    this.$snotify.error('ERROR ADDING YOUR REVIEW!', {
                        timeout: 2000,
                        showProgressBar: true,
                        closeOnClick: false,
                        pauseOnHover: true,
                        position : "rightTop"
                    }).on("destroyed", () => {
                        this.isRating = false;
                        // this.$router.push('/admin-categories');    
                    });
                }

            }).catch(error => {
                
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


      getRelatedProduct()
      {
         Axios.get(process.env.MIX_APP_URL+'/product/related_product/'+this.product.category_id+'/'+this.product.id)
         .then(response => {
            this.relatedProducts = response.data;
            // this.loading = false;
         }).catch(error => {
            
            // this.$noty.error("Error occured. Try again");
         });
      },

      getProductData()
      {
         this.loading = true;
         
         Axios.get(process.env.MIX_APP_URL+'/shop/singleproduct/'+this.$route.params.id)
         .then(response => {
            // console.log(response.data);
            this.product = response.data.product;
            this.reviews = response.data.review.data;
            this.totalPage = response.data.review.last_page;
            this.currentPage = response.data.review.current_page;
            this.getRelatedProduct();
            this.calculateRating();
            this.loading = false;
         }).catch(error => {
            // review
            // this.$noty.error("Error occured. Try again");
         });
      }
   }
}
</script>

<style>
/*
    Image credits:
    uifaces.com (http://uifaces.com/authorized)
*/

#login { display: none; }
.login,
.logout { 
    position: absolute; 
    top: -3px;
    right: 0;
}
.page-header { position: relative; }
.reviews {
    color: #555;    
    font-weight: bold;
    margin: 10px auto 20px;
}
.notes {
    color: #999;
    font-size: 12px;
}
.media .media-object { max-width: 120px; }
.media-body { position: relative; }
.media-date { 
    position: absolute; 
    right: 25px;
    top: 25px;
}
.media-date li { padding: 0; }
.media-date li:first-child:before { content: ''; }
.media-date li:before { 
    content: '.'; 
    margin-left: -2px; 
    margin-right: 2px;
}
.media-comment { margin-bottom: 20px; }
.media-replied { margin: 0 0 20px 50px; }
.media-replied .media-heading { padding-left: 6px; }

.btn-circle {
    font-weight: bold;
    font-size: 12px;
    padding: 6px 15px;
    border-radius: 20px;
}
.btn-circle span { padding-right: 6px; }
.embed-responsive { margin-bottom: 20px; }
.tab-content {
    padding: 50px 15px;
    border: 1px solid #ddd;
    border-top: 0;
    border-bottom-right-radius: 4px;
    border-bottom-left-radius: 4px;
}
.custom-input-file {
    overflow: hidden;
    position: relative;
    width: 120px;
    height: 120px;
    background: #eee url('https://s3.amazonaws.com/uifaces/faces/twitter/walterstephanie/128.jpg');    
    background-size: 120px;
    border-radius: 120px;
}
input[type="file"]{
    z-index: 999;
    line-height: 0;
    font-size: 0;
    position: absolute;
    opacity: 0;
    filter: alpha(opacity = 0);-ms-filter: "alpha(opacity=0)";
    margin: 0;
    padding:0;
    left:0;
}
.uploadPhoto {
    position: absolute;
    top: 25%;
    left: 25%;
    display: none;
    width: 50%;
    height: 50%;
    color: #fff;    
    text-align: center;
    line-height: 60px;
    text-transform: uppercase;    
    background-color: rgba(0,0,0,.3);
    border-radius: 50px;
    cursor: pointer;
}
.custom-input-file:hover .uploadPhoto { display: block; }

/* Chrome, Safari, Edge, Opera */
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
}
</style>