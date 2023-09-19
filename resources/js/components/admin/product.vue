<template>
  <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-flex align-items-center justify-content-between">
                                    <h4 class="mb-0 font-size-18">Product Detail</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                            <li class="breadcrumb-item active">Product Detail</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row" v-if="product != null">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <div class="product-detai-imgs">
                                                    <div class="row">
                                                       <div class="col-md-2 col-sm-3 col-4">
                                                            <div class="nav flex-column nav-pills " id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                                <a class="nav-link active" id="product-1-tab" data-toggle="pill" href="#product-1" role="tab" aria-controls="product-1" aria-selected="true">
                                                                    <img :src="product.image_link1" alt="" class="img-fluid mx-auto d-block rounded">
                                                                </a>
                                                                <a class="nav-link" id="product-2-tab" data-toggle="pill" href="#product-2" role="tab" aria-controls="product-2" aria-selected="false">
                                                                    <img :src="product.image_link2" alt="" class="img-fluid mx-auto d-block rounded">
                                                                </a>
                                                                <!--  <a class="nav-link" id="product-3-tab" data-toggle="pill" href="#product-3" role="tab" aria-controls="product-3" aria-selected="false">
                                                                    <img src="assets/images/product/img-7.png" alt="" class="img-fluid mx-auto d-block rounded">
                                                                </a>
                                                                <a class="nav-link" id="product-4-tab" data-toggle="pill" href="#product-4" role="tab" aria-controls="product-4" aria-selected="false">
                                                                    <img src="assets/images/product/img-8.png" alt="" class="img-fluid mx-auto d-block rounded">
                                                                </a> -->
                                                            </div>
                                                        </div>
                                                        <div class="col-md-7 offset-md-1 col-sm-9 col-8">
                                                            <div class="tab-content" id="v-pills-tabContent">
                                                                <div class="tab-pane fade show active" id="product-1" role="tabpanel" aria-labelledby="product-1-tab">
                                                                    <div>
                                                                        <img :src="product.image_link1" alt="" class="img-fluid mx-auto d-block">
                                                                    </div>
                                                                </div>
                                                                <div class="tab-pane fade" id="product-2" role="tabpanel" aria-labelledby="product-2-tab">
                                                                    <div>
                                                                        <img :src="product.image_link2" alt="" class="img-fluid mx-auto d-block">
                                                                    </div>
                                                                </div>
                                                               <!--  <div class="tab-pane fade" id="product-3" role="tabpanel" aria-labelledby="product-3-tab">
                                                                    <div>
                                                                        <img src="assets/images/product/img-7.png" alt="" class="img-fluid mx-auto d-block">
                                                                    </div>
                                                                </div>
                                                                <div class="tab-pane fade" id="product-4" role="tabpanel" aria-labelledby="product-4-tab">
                                                                    <div>
                                                                        <img src="assets/images/product/img-8.png" alt="" class="img-fluid mx-auto d-block">
                                                                    </div>
                                                                </div> -->
                                                            </div>
                                                            <div class="text-center">
                                                                <router-link :to="{path : '/admin-edit-product/'+product.id}" type="button" class="btn btn-primary waves-effect waves-light mt-2 mr-1">
                                                                    <i class="mdi mdi-pencil mr-2"></i> Edit
                                                                </router-link>
                                                                <span v-if="loading" type="button" class="btn btn-danger waves-effect  mt-2 waves-light">
                                                                    <i class="mdi mdi-trash-can mr-2"></i>Please wait...
                                                                </span>
                                                                <span v-else @click="deleteProduct(product.id)" type="button" class="btn btn-danger waves-effect  mt-2 waves-light">
                                                                    <i class="mdi mdi-trash-can mr-2"></i>Delete
                                                                </span>
                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
    
                                            <div class="col-xl-6">
                                                <div class="mt-4 mt-xl-3">
                                                    <a href="javascript:void(0);" class="text-primary">{{ product.category.name }}</a>
                                                    <h4 class="mt-1 mb-3">{{ product.name }}</h4>
    
                                                    <!-- <p class="text-muted float-left mr-3">
                                                        <span class="bx bx-star text-warning"></span>
                                                        <span class="bx bx-star text-warning"></span>
                                                        <span class="bx bx-star text-warning"></span>
                                                        <span class="bx bx-star text-warning"></span>
                                                        <span class="bx bx-star"></span>
                                                    </p> -->
                                                    <!-- <p class="text-muted mb-4">( 152 Customers Review )</p> -->
    
                                                    <!-- <h6 class="text-success text-uppercase">20 % Off</h6> -->
                                                    <h5 class="mb-4">Reguler Price :  <b>₦{{ numberWithCommas(product.price_list.normalPrice) }}</b></h5>
                                                    <h5 class="mb-4">Discount Price :  <b>₦{{ numberWithCommas(product.price_list.discountPrice) }}</b></h5>
                                                    <h5 class="mb-4">Stock Quantity :  <b>{{ product.inventory_qty }}</b></h5>
                                                    <p class="text-muted mb-4">{{ product.description }}</p>
                                                    <form>
                                                        <div class="custom-control custom-checkbox mb-3">
                                                            <input disabled v-model="product.promotion" type="checkbox" class="custom-control-input" id="customCheck1">
                                                            <label class="custom-control-label"  for="customCheck1" >On Discount?</label>
                                                        </div>

                                                        <div class="custom-control custom-checkbox mb-3">
                                                            <input disabled v-model="product.hasSpec" type="checkbox" class="custom-control-input" id="customCheck1">
                                                            <label class="custom-control-label"  for="customCheck1" >Has Specification?</label>
                                                        </div>
                                                    </form>
                                                    
                                                    <!-- <div class="row mb-3">
                                                        <div class="col-md-6">
                                                            <div>
                                                                <p class="text-muted"><i class="bx bx-unlink font-size-16 align-middle text-primary mr-1"></i> Wireless</p>
                                                                <p class="text-muted"><i class="bx bx-shape-triangle font-size-16 align-middle text-primary mr-1"></i> Wireless Range : 10m</p>
                                                                <p class="text-muted"><i class="bx bx-battery font-size-16 align-middle text-primary mr-1"></i> Battery life : 6hrs</p>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div>
                                                                <p class="text-muted"><i class="bx bx-user-voice font-size-16 align-middle text-primary mr-1"></i> Bass</p>
                                                                <p class="text-muted"><i class="bx bx-cog font-size-16 align-middle text-primary mr-1"></i> Warranty : 1 Year</p>
                                                            </div>
                                                        </div>
                                                    </div> -->
    
                                                    <!-- <div class="product-color">
                                                        <h5 class="font-size-15">Color :</h5>
                                                        <a href="#" class="active">
                                                            <div class="product-color-item border rounded">
                                                                <img src="assets/images/product/img-7.png" alt="" class="avatar-md">
                                                            </div>
                                                            <p>Black</p>
                                                        </a>
                                                        <a href="#">
                                                            <div class="product-color-item border rounded">
                                                                <img src="assets/images/product/img-7.png" alt="" class="avatar-md">
                                                            </div>
                                                            <p>Blue</p>
                                                        </a>
                                                        <a href="#">
                                                            <div class="product-color-item border rounded">
                                                                <img src="assets/images/product/img-7.png" alt="" class="avatar-md">
                                                            </div>
                                                            <p>Gray</p>
                                                        </a>
                                                    </div> -->
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end row -->
    
                                        <div class="mt-5" v-if="product.hasSpec">
                                            <h5 class="mb-3">Specifications :</h5>
    
                                            <div class="table-responsive">
                                                <table class="table mb-0 table-bordered">
                                                    <tbody>
                                                        <tr v-for="(spec, index) in product.specification" :key="index"> 
                                                            <th scope="row" style="width: 400px;">{{ spec.title }}</th>
                                                            <td>{{ spec.content }}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <!-- end Specifications -->
    
                                        <!-- <div class="mt-5">
                                            <h5>Reviews :</h5>
    
                                            <div class="media py-3 border-bottom">
                                                <img src="assets/images/users/avatar-2.jpg" class="avatar-xs mr-3 rounded-circle" alt="img" />
                                                <div class="media-body">
                                                    <h5 class="mt-0 mb-1 font-size-15">Brian</h5>
                                                    <p class="text-muted">If several languages coalesce, the grammar of the resulting language.</p>
                                                    <ul class="list-inline float-sm-right mb-sm-0">
                                                        <li class="list-inline-item">
                                                            <a href="#"><i class="far fa-thumbs-up mr-1"></i> Like</a>
                                                        </li>
                                                        <li class="list-inline-item">
                                                            <a href="#"><i class="far fa-comment-dots mr-1"></i> Comment</a>
                                                        </li>
                                                    </ul>
                                                    <div class="text-muted font-size-12"><i class="far fa-calendar-alt text-primary mr-1"></i> 5 hrs ago</div>
                                                </div>
                                            </div>
                                            <div class="media py-3 border-bottom">
                                                <img src="assets/images/users/avatar-4.jpg" class="avatar-xs mr-3 rounded-circle" alt="img" />
                                                <div class="media-body">
                                                    <h5 class="mt-0 font-size-15 mb-1">Denver</h5>
                                                    <p class="text-muted">To an English person, it will seem like simplified English, as a skeptical Cambridge</p>
                                                    <ul class="list-inline float-sm-right mb-sm-0">
                                                        <li class="list-inline-item">
                                                            <a href="#"><i class="far fa-thumbs-up mr-1"></i> Like</a>
                                                        </li>
                                                        <li class="list-inline-item">
                                                            <a href="#"><i class="far fa-comment-dots mr-1"></i> Comment</a>
                                                        </li>
                                                    </ul>
                                                    <div class="text-muted font-size-12"><i class="far fa-calendar-alt text-primary mr-1"></i> 07 Oct, 2019</div>
                                                    <div class="media mt-4">
                                                        <img src="assets/images/users/avatar-5.jpg" class="avatar-xs mr-3 rounded-circle" alt="img" />
                                                        <div class="media-body">
                                                            <h5 class="mt-0 mb-1 font-size-15">Henry</h5>
                                                            <p class="text-muted">Their separate existence is a myth. For science, music, sport, etc.</p>
                                                            <ul class="list-inline float-sm-right mb-sm-0">
                                                                <li class="list-inline-item">
                                                                    <a href="#"><i class="far fa-thumbs-up mr-1"></i> Like</a>
                                                                </li>
                                                                <li class="list-inline-item">
                                                                    <a href="#"><i class="far fa-comment-dots mr-1"></i> Comment</a>
                                                                </li>
                                                            </ul>
                                                            <div class="text-muted font-size-12"><i class="far fa-calendar-alt text-primary mr-1"></i> 08 Oct, 2019</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
    
                                            <div class="media py-3 border-bottom">
                                                <div class="avatar-xs mr-3">
                                                    <span class="avatar-title bg-soft-primary text-primary rounded-circle font-size-16">
                                                        N
                                                    </span>
                                                </div>
                                                <div class="media-body">
                                                    <h5 class="mt-0 mb-1 font-size-15">Neal</h5>
                                                    <p class="text-muted">Everyone realizes why a new common language would be desirable.</p>
                                                    <ul class="list-inline float-sm-right mb-sm-0">
                                                        <li class="list-inline-item">
                                                            <a href="#"><i class="far fa-thumbs-up mr-1"></i> Like</a>
                                                        </li>
                                                        <li class="list-inline-item">
                                                            <a href="#"><i class="far fa-comment-dots mr-1"></i> Comment</a>
                                                        </li>
                                                    </ul>
                                                    <div class="text-muted font-size-12"><i class="far fa-calendar-alt text-primary mr-1"></i> 05 Oct, 2019</div>
                                                </div>
                                            </div>
                                        </div> -->
    
                                    </div>
                                </div>
                                <!-- end card -->
                            </div>
                        </div>
                        <!-- end row -->

                        <!-- <div class="row mt-3">
                            <div class="col-lg-12">
                                <div>
                                    <h5 class="mb-3">Recent product :</h5>

                                    <div class="row">
                                        <div class="col-xl-4 col-sm-6">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="row align-items-center">
                                                        <div class="col-md-4">
                                                            <img src="assets/images/product/img-7.png" alt="" class="img-fluid mx-auto d-block">
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="text-center text-md-left pt-3 pt-md-0">
                                                                <h5 class="mb-3 text-truncate"><a href="#" class="text-dark">Wirless Headphone</a></h5>
                                                                <p class="text-muted">
                                                                    <i class="bx bx-star text-warning"></i>
                                                                    <i class="bx bx-star text-warning"></i>
                                                                    <i class="bx bx-star text-warning"></i>
                                                                    <i class="bx bx-star text-warning"></i>
                                                                    <i class="bx bx-star"></i>
                                                                </p>
                                                                <h5 class="my-0"><span class="text-muted mr-2"><del>$240</del></span> <b>$225</b></h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-sm-6">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="row align-items-center">
                                                        <div class="col-md-4">
                                                            <img src="assets/images/product/img-4.png" alt="" class="img-fluid mx-auto d-block">
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="text-center text-md-left pt-3 pt-md-0">
                                                                <h5 class="mb-3 text-truncate"><a href="#" class="text-dark">Phone patterned cases</a></h5>
                                                                <p class="text-muted">
                                                                    <i class="bx bx-star text-warning"></i>
                                                                    <i class="bx bx-star text-warning"></i>
                                                                    <i class="bx bx-star text-warning"></i>
                                                                    <i class="bx bx-star text-warning"></i>
                                                                    <i class="bx bx-star"></i>
                                                                </p>
                                                                <h5 class="my-0"><span class="text-muted mr-2"><del>$150</del></span> <b>$145</b></h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-sm-6">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="row align-items-center">
                                                        <div class="col-md-4">
                                                            <img src="assets/images/product/img-6.png" alt="" class="img-fluid mx-auto d-block">
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="text-center text-md-left pt-3 pt-md-0">
                                                                
                                                                <h5 class="mb-3 text-truncate"><a href="#" class="text-dark">Phone Dark Patterned cases</a></h5>
                                                                <p class="text-muted">
                                                                    <i class="bx bx-star text-warning"></i>
                                                                    <i class="bx bx-star text-warning"></i>
                                                                    <i class="bx bx-star text-warning"></i>
                                                                    <i class="bx bx-star text-warning"></i>
                                                                    <i class="bx bx-star"></i>
                                                                </p>
                                                                <h5 class="my-0"><span class="text-muted mr-2"><del>$138</del></span> <b>$135</b></h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <!-- end row -->

                    </div> <!-- container-fluid -->
                </div>
            <vue-snotify></vue-snotify>
            
            </div>
</template>

<script>
import Axios from "axios";

export default {
    name: "product_detail",
    data(){
       return {
          product : null,
          relatedProducts : [],
          loading : false,
          purchaseQty : 1,
       }
    },

    mounted()
    {
      this.getProductData();
    },

   //  updated()
   //  {
   //    this.getProductData();
   //  },

    watch:{
      $route (to, from){
      this.getProductData();    
      }
   },

   methods : {
       numberWithCommas(x) {
         return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
      },

     deleteProduct(id) {
          this.$confirm("Are you sure you want to delete this item?").then(() => {
            //do something...
            this.loading = true;

            Axios.get(process.env.MIX_APP_URL+'/delete/product/'+id)
            .then(response => {
                if(response.data == true)
                {
                    this.$snotify.success('PRODUCT DELETED FROM SHOP', {
                        timeout: 1000,
                        showProgressBar: true,
                        closeOnClick: false,
                        pauseOnHover: true,
                        position : "rightTop"
                    }).on("destroyed", () => {
                        this.loading = false;
                        this.$router.push('/admin-products');    
                    });
                }
            }).catch(error => {
            
            });

           });
        },

    //   getRelatedProduct()
    //   {
    //      Axios.get(process.env.MIX_APP_URL+'/product/related_product/'+this.product.category_id+'/'+this.product.id)
    //      .then(response => {
    //         this.relatedProducts = response.data;
    //         // this.loading = false;
    //      }).catch(error => {
            
    //         // this.$noty.error("Error occured. Try again");
    //      });
    //   },

      getProductData()
      {
        //  this.loading = true;
         
         
         Axios.get(process.env.MIX_APP_URL+'/shop/singleproduct/'+this.$route.params.id)
         .then(response => {
            this.product = response.data.product;
            this.getRelatedProduct();
            this.loading = false;
         }).catch(error => {
            
            // this.$noty.error("Error occured. Try again");
         });
      }
   }

}
</script>

<style>

</style>