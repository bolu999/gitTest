<template>
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0 font-size-18">Product</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                <li class="breadcrumb-item active">Products</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Filter</h4>

                            <div>
                                <h5 class="font-size-14 mb-3">Categories</h5>
                                <ul class="list-unstyled product-list">
                                    <li ><a href="#/admin-products" v-on:click="getProducts()"><i class="mdi mdi-chevron-right mr-1"></i> All</a></li>
                                    <li  v-for="(category, index) in categories" :key="index"><a href="javascript:void(0);" v-on:click="getCategoryProducts($event, category.id)"><i class="mdi mdi-chevron-right mr-1"></i> {{ category.name }}</a></li>
                                </ul>
                            </div>
                           
                        </div>
                    </div>
                    
                </div>
                <div class="col-lg-9">
                        
                    <div class="row mb-3">
                        <div class="col-xl-4 col-sm-6">
                            <div class="mt-2">
                                <h5>Products</h5>
                            </div>
                        </div>
                        <div class="col-lg-8 col-sm-6">
                            <form class="mt-4 mt-sm-0 float-sm-right form-inline">
                                <!-- <div class="search-box mr-2">
                                    <div class="position-relative">
                                        <input type="text" v-model.lazy="result" class="form-control border-0" placeholder="Search...">
                                        <i class="bx bx-search-alt search-icon"></i>
                                    </div>
                                </div> -->
                                <ul class="nav nav-pills product-view-nav">
                                    <div class="text-sm-right">
                                        <router-link to="/admin-new-product" class="btn btn-success btn-rounded waves-effect waves-light"><i class="mdi mdi-plus mr-1"></i> New Product</router-link>
                                    </div>
                                </ul>                                 
                            </form>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-xl-4 col-sm-6" v-for="(product, index) in products" :key="index">
                            <div class="card">
                                <div class="card-body">
                                     <router-link :to="{path : '/admin-product-detail/'+product.id+'/'+product.name}">
                                        <div class="product-img position-relative">
                                            <img :src="product.image_link1" alt="" class="img-fluid mx-auto d-block">
                                        </div>
                                     </router-link>
                                    <div class="mt-4 text-center">
                                        <h5 class="mb-3 text-truncate"><router-link :to="{path : '/admin-product-detail/'+product.id+'/'+product.name}" class="text-dark">{{product.name}}</router-link></h5>
                                        
                                        <!-- <p class="text-muted">
                                            <i class="bx bx-star text-warning"></i>
                                            <i class="bx bx-star text-warning"></i>
                                            <i class="bx bx-star text-warning"></i>
                                            <i class="bx bx-star text-warning"></i>
                                            <i class="bx bx-star"></i>
                                        </p> -->
                                        <h5 class="my-0"><b>₦{{ numberWithCommas(product.price_list.normalPrice) }}/{{ product.price_list.quantity }} piece(s)</b></h5>

                                    </div>
                                    <div class="text-center">
                                        <router-link :to="{path : '/admin-edit-product/'+product.id}" type="button" class="btn btn-primary waves-effect waves-light mt-2 mr-1">
                                            <i class="mdi mdi-pencil mr-2"></i> Edit
                                        </router-link>
                                        <span @click="deleteProduct(product.id)" type="button" class="btn btn-danger waves-effect  mt-2 waves-light">
                                            <i class="mdi mdi-trash-can mr-2"></i>Delete
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                       
                        
                    </div>
                    <!-- end row -->

                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="pagination pagination-rounded justify-content-center mt-4">
                                <li v-if="currentPage > 1"  class="page-item">
                                    <a v-on:click="gotoPage(currentPage - 1)" href="#/admin-products" class="page-link"><i class="mdi mdi-chevron-left"></i></a>
                                </li>
                                <li v-for="i in totalPage" :key="i" :class="(i == currentPage) ? 'active' : ''" class="page-item">
                                    <a v-if="i > (currentPage - 5) && i < (currentPage + 5)" href="#/admin-products" v-on:click="gotoPage(i)" class="page-link">{{ i }}</a>
                                </li>
                                
                                <li class="page-item"  v-if="totalPage > currentPage" >
                                    <a href="#/admin-products" v-on:click="gotoPage(currentPage + 1)" class="page-link"><i class="mdi mdi-chevron-right"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->

        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
<vue-snotify></vue-snotify>
</div>
</template>

<script>
import Axios from "axios";

export default {
name :"products",

data() {
     return{
        pageTitle      : 'products',
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
        result           : "",

      }
   },

   mounted() {

      this.getProducts();
      this.getAllCategories();
   },

   watch:{
       result(after, before)
       {
           this.search();
       },

    $route (to, from){
      this.loading = true;
      this.getProducts();
    }
   },

   methods : {
      numberWithCommas(x) {
         return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
      },

      search()
      {
          if(this.result != '')
          {
              Axios.post('/admin/search', {  keywords: this.result })
                    .then(response => this.products = response.data)
                    .catch(error => {});
          }
          else
          {
              this.getProducts();
          }
      },

      deleteProduct(id) {
          this.$confirm("Are you sure you want to delete this item?").then(() => {
            //do something...
            Axios.get(process.env.MIX_APP_URL+'/delete/product/'+id)
            .then(response => {
                if(response.data == true)
                {
                    this.$snotify.success('PRODUCT DELETED FROM SHOP', {
                        timeout: 6000,
                        showProgressBar: true,
                        closeOnClick: false,
                        pauseOnHover: true,
                        position : "rightTop"
                    });
                    this.gotoPage(this.currentPage);
                }
            }).catch(error => {
            
            });

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
               this.products = response.data.data;
               this.totalPage = response.data.last_page;
               this.currentPage = response.data.current_page;
               this.isCategorised = false;
               this.loading = false;
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
            this.loading = false;
         }).catch(error => {
            
         });
      },

   }
}
</script>

<style>

</style>