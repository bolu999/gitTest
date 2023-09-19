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
                  <li>Shop</li>
               </ul>
            </div>
         </div>
         <div class="container-indent">
            <div class="container">
               <div class="row">
                  <div class="col-md-4 col-lg-3 col-xl-3 leftColumn aside" id="js-leftColumn-aside">
                     <div class="tt-btn-col-close"><a href="#">Close</a></div>
                     <div class="tt-collapse open tt-filter-detach-option">
                        <div class="tt-collapse-content">
                           <div class="filters-mobile">
                              <div class="filters-row-select"></div>
                           </div>
                        </div>
                     </div>
                    
                     <div class="tt-collapse open">
                        <h3 class="tt-collapse-title">PRODUCT CATEGORIES</h3>
                        <div class="tt-collapse-content">
                           <ul class="tt-list-row">
                              <li style="padding-top: 5px; padding-bottom: 5px; border-bottom: 1px solid #ddd;"><a class="closeFilter" href="/#/shop-listing" v-on:click="getProducts()">All</a></li>
                              <li style="padding-top: 5px; padding-bottom: 5px; border-bottom: 1px solid #ddd;" v-for="(category, index) in categories" :key="index"><a class="closeFilter" href="javascript:void(0)" v-on:click="getCategoryProducts($event, category.id)">{{ category.name }}</a></li>
                           </ul>
                        </div>
                     </div>
                  
                  </div>
                  <div class="col-md-12 col-lg-9 col-xl-9">
                     <div class="content-indent container-fluid-custom-mobile-padding-02">
                        <div class="tt-filters-options" id="js-tt-filters-options">
                           <h1 class="tt-title">{{ pageTitle }}</h1>
                           <!-- <div class="tt-btn-toggle"><a id="openFilter" href="javascript:void(0)">FILTER</a></div> -->
                           <div class="tt-sort">
                              <select id="sort" name="sort" v-model="sort" v-on:change="sortProducts()">
                                 <option disabled selected value="">Sort</option>
                                 <option value="price">Price</option>
                                 <option value="created_at">Latest</option>
                                 <option value="name">Name</option>
                              </select>

                              <select id="sortoption" name="sortoption" v-model="order" v-on:change="sortProducts()">
                                 <option selected value="ASC">Ascending</option>
                                 <option value="DESC">Descending</option>
                              </select>
                           </div>
                           <div class="tt-quantity"><a href="#" class="tt-col-one" data-value="tt-col-one"></a> <a href="#" class="tt-col-two" data-value="tt-col-two"></a> <a href="#" class="tt-col-three" data-value="tt-col-three"></a> <a href="#" class="tt-col-four" data-value="tt-col-four"></a> <a href="#" class="tt-col-six" data-value="tt-col-six"></a></div>
                        </div>
                        <div v-if="products.length > 0" class="tt-product-listing row">

                           <div v-for="(product, index) in products" :key="index" class="col-6 col-md-4 tt-col-item">
                              <div class="tt-product thumbprod-center">
                                 <div v-if="loggedIn" class="tt-image-box"><span href="#" @click="addToWishList(product.id)" class="tt-btn-wishlist" data-tooltip="Add to Wishlist" data-tposition="left"></span> <router-link :to="{path : '/single-product/'+product.id+'/'+product.name}"><span class="tt-img"><img :src="product.image_link1" :data-src="product.image_link1" alt=""></span><span class="tt-img-roll-over"><img :src="product.image_link2" :data-src="product.image_link2" alt=""></span><span v-if="product.promotion" class="tt-label-location"><span class="tt-label-sale">On Discount</span></span></router-link></div>
                                 <div v-else class="tt-image-box"><router-link to="/login"  class="tt-btn-wishlist" data-tooltip="Add to Wishlist" data-tposition="left"></router-link> <router-link :to="{path : '/single-product/'+product.id+'/'+product.name}"><span class="tt-img"><img :src="product.image_link1" :data-src="product.image_link1" alt=""></span><span class="tt-img-roll-over"><img :src="product.image_link2" :data-src="product.image_link2" alt=""></span><span v-if="product.promotion" class="tt-label-location"><span class="tt-label-sale">On Discount</span></span></router-link></div>
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
                                    
                                    <div class="">
                                       <div class="tt-row-btn"><a href="javascript:void(0);" class="tt-btn-addtocart thumbprod-button-bg" data-toggle="modal" data-target="#modalAddToCartProduct" @click="addToCart(product.id, product.name, product.price_list.quantity, product.price_list.normalPrice, product.image_link1, product.inventory_qty, product.promotion,  product.price_list.discountPrice)">ADD TO CART</a></div>
                                       <div  v-if="loggedIn" class="tt-row-btn"><span @click="addToWishList(product.id)" class="tt-btn-wishlist"></span></div>
                                       <div v-else class="tt-row-btn"><router-link to="/login" class="tt-btn-wishlist"></router-link></div>                                    </div>
                                 </div>
                              </div>
                           </div>

                        </div>
                        <div v-else class="tt-product-listing row">
                           <h4>This category has no products at this moment...</h4>
                        </div>
                        <div v-if="products.length > 0" class="text-center tt_product_showmore">
                           <!-- pagination here -->
                           <nav aria-label="...">
                              <ul id="pagination">
                                 <li v-if="currentPage > 1" class="page-item">
                                    <a v-on:click="gotoPage(currentPage - 1)" class="page-link" href="/#/shop-listing">«</a >
                                 </li>
                                 <li v-for="i in totalPage" :key="i"><a v-if="i > (currentPage - 5) && i < (currentPage + 5)" :class="(i == currentPage) ? 'active' : ''" href="/#/shop-listing" v-on:click="gotoPage(i)">{{ i }}</a></li>
                                 <!-- <li><a href="#" class="active">2</a></li> -->
                                 
                                 <li v-if="totalPage > currentPage" class="page-item">
                                    <a v-on:click="gotoPage(currentPage + 1)" class="page-link" href="/#/shop-listing">»</a>
                                 </li>
                              </ul> 
                           </nav>
                           <!-- <a href="#" class="btn btn-border">LOAD MORE</a>
                           <div class="tt_item_all_js"><a href="#" class="btn btn-border01">NO MORE ITEM TO SHOW</a></div> -->
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
    name: 'Shop',
    
    data() {
     return{
        pageTitle      : 'Shop',
        products       : [],
        loading        : false,
        categories     : [],
        totalPage      : 0,
        nextPage       : 0,
        currentPage    : 0,
        isCategorised  : false,
        categoryId     : 0,
        sort           : "created_at",
        order          : "DESC",
        loggedIn        : false,
      }
   },

   mounted() {
       if(this.$store.getters.role == null)
      {
         this.loggedIn = false;
      }
      else
      {
         this.loggedIn = true;
      }
      this.getProducts();
      this.getAllCategories();
   },

   watch:{
    $route (to, from){
      this.loading = true;
      this.getProducts();
    }
   },

   methods : {
      numberWithCommas(x) {
         return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
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

      sortProducts()
      {
         if(!this.isCategorised)
         {
            this.getProducts();
         }
         else
         {
            this.getCategoryProducts("event", this.categoryId);
         }
      },

      getProducts()
      {
         this.loading = true;
         if(this.$route.params.search == undefined)
         {
            this.pageTitle = 'Shop';
            Axios.get(process.env.MIX_APP_URL+'/shop/allproducts/'+this.sort+'/'+this.order)
            .then(response => {
               this.loading = false;
               this.products = response.data.data;
               this.totalPage = response.data.last_page;
               this.currentPage = response.data.current_page;
               this.isCategorised = false;
            }).catch(error => {
               
            });
         }
         else
         {
            this.pageTitle = 'Search result(s) for: '+this.$route.params.search;
            
             Axios.get(process.env.MIX_APP_URL+'/fullsearch/'+this.sort+'/'+this.order+'/'+this.$route.params.search)
            .then(response => {
               this.products = response.data.data;
               this.totalPage = response.data.last_page;
               this.currentPage = response.data.current_page;
               this.isCategorised = false;
               this.loading = false;
            }).catch(error => {
               
            });
         }
      },

      getAllCategories()
      {
         Axios.get(process.env.MIX_APP_URL+'/shop/allcategories')
         .then(response => {
            this.categories = response.data;            
         }).catch(error => {
            
         });
      },

      getCategoryProducts(event, id)
      {
         this.loading = true;
         this.categoryId = id;
         this.pageTitle = 'Shop';
         
          Axios.get(process.env.MIX_APP_URL+'/shop/categoryproducts/'+id+'/'+this.sort+'/'+this.order)
         .then(response => {            
            this.products = response.data.data;    
            this.totalPage = response.data.last_page;
            this.currentPage = response.data.current_page;
            this.isCategorised = true;
            this.loading = false;
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
      gotoPage(number)
      {
         this.loading = true;
         let url = ''
         if(!this.isCategorised)
         {
            url = '/shop/allproducts?page=';
         }
         else
         {
            url = '/shop/categoryproducts/'+this.categoryId+'/?page='
         }
          Axios.get(process.env.MIX_APP_URL+url+number)
         .then(response => {
            this.products = response.data.data;
            this.totalPage = response.data.last_page;
            this.currentPage = response.data.current_page;
            window.scrollTo(0, 0);
            this.loading = false;
         }).catch(error => {
            
         });
      },

   }
}
</script>

<style>
.tt-list-row tr:hover {
   background-color: #410c0c !important;
   color: white !important;
   }

#pagination {
  margin: 0;
  padding: 0;
  text-align: center
}
#pagination li {
  display: inline
}
#pagination li a {
  display: inline-block;
  text-decoration: none;
  padding: 5px 10px;
  color: #000
}

/* Active and Hoverable Pagination */
#pagination li a {
  border-radius: 5px;
  -webkit-transition: background-color 0.3s;
  transition: background-color 0.3s
    
}
#pagination li a.active {
  background-color: #9a1522;
  color: #fff
}
#pagination li a:hover:not(.active) {
  background-color: #ddd;
} 

/* border-pagination */
.b-pagination-outer {
  width: 100%;
  margin: 0 auto;
  text-align: center;
  overflow: hidden;
  display: flex
}
#border-pagination {
  margin: 0 auto;
  padding: 0;
  text-align: center
}
#border-pagination li {
  display: inline;

}
#border-pagination li a {
  display: block;
  text-decoration: none;
  color: #000;
  padding: 5px 10px;
  border: 1px solid #ddd;
  float: left;

}
#border-pagination li a {
  -webkit-transition: background-color 0.4s;
  transition: background-color 0.4s
}
#border-pagination li a.active {
  background-color: #9a1522;
  color: #fff;
}
#border-pagination li a:hover:not(.active) {
  background: #ddd;
}
</style>