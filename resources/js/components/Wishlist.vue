<template>
  <div class="main-content">
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
          <div class="row">
              <div class="col-12">
                  <div class="page-title-box d-flex align-items-center justify-content-between">
                      <h4 class="mb-0 font-size-18">Wishlist</h4>

                      <div class="page-title-right">
                          <ol class="breadcrumb m-0">
                              <li class="breadcrumb-item"><a href="javascript: void(0);">User</a></li>
                              <li class="breadcrumb-item active">Wishlist</li>
                          </ol>
                      </div>
                  </div>
              </div>
          </div>
          <!-- end page title -->
        
    

    <div class="row" v-if="wishlist != []">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Wishlist</h4>
                    <div class="table-responsive">
                        <table class="table table-centered table-nowrap mb-0">
                            <thead class="thead-light">
                                <tr>
                                    <th style="width: 20px;">
                                        #
                                    </th>
                                    <th>Product Name</th>
                                    <th>Image</th>
                                    <th>Price</th>
                                    <!-- <th>Date</th> -->
                                    <th>Category</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(wishitem, index) in wishlist" :key="index">
                                    <td>
                                  
                                        {{index + 1}}
                                    </td>
                                    <td><a href="javascript: void(0);" class="text-body font-weight-bold">{{ wishitem.product.name }}</a> </td>
                                    <td>{{ wishitem.product.price_list.quantity }}</td>
                                    <td>
                                        ₦{{ numberWithCommas(wishitem.product.price_list.normalPrice) }}
                                    </td>
                                    <td>
                                        {{ wishitem.product.category.name }}
                                    </td>
                                    <td>
                                        <span title="Remove" @click="removeWish(wishitem.wish_id)" class="btn btn-danger waves-effect waves-light" data-toggle="modal" data-target=".exampleModal">
                                            <i class="bx bxs-trash"></i>
                                        </span>
                                    </td>
                                   
                                </tr>

                            </tbody>
                        </table>
                    </div>
                    <!-- end table-responsive -->
                </div>
            </div>
        </div>
    </div>
    <!-- <nav aria-label="..."  v-if="wishlist != []" >
        <ul id="pagination">
            <li v-if="currentPage > 1" class="page-item">
                <a v-on:click="gotoPage(currentPage - 1)" class="page-link" href="#">«</a >
            </li>
            <li v-for="i in totalPage" :key="i"><a  :class="(i == currentPage) ? 'active' : ''" href="#" v-on:click="gotoPage(i)">{{ i }}</a></li>
            <li><a href="#" class="active">2</a></li>
            
            <li v-if="totalPage > currentPage" class="page-item">
                <a v-on:click="gotoPage(currentPage + 1)" class="page-link" href="#">»</a>
            </li>
        </ul> 
    </nav> -->
    <div v-else>
        <h4 class="text-center">No product in your wishlist...</h4>
    </div>
    <!-- end row -->
</div>
<!-- container-fluid -->
<!-- End Page-content -->
</div>
<vue-snotify></vue-snotify>
  </div>
</template>

<script>
import Axios from "axios";

export default {
    name:'Dashboard',
    data(){
        return{
            wishlist : [],
            totalPage      : 0,
            nextPage       : 0,
            currentPage    : 0,
            details        : 0,
        }
    },

    mounted()
    {
        this.getUserWishlist();
    },

    methods : {
       numberWithCommas(x) {
         return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
      },

        getUserWishlist()
        {
          Axios.get(process.env.MIX_APP_URL+'/get/user/Wishlist')
          .then(response => {   
            this.wishlist = response.data;            
          }).catch(error => {
              
          });
        },

        removeWish(id)
        {
            Axios.get(process.env.MIX_APP_URL+'/delete/wish/'+id)
          .then(response => {            
            if(response.data.status == true)
            {
                this.$snotify.success('PRODUCT REMOVED FROM LIST', {
                    timeout: 6000,
                    showProgressBar: true,
                    closeOnClick: false,
                    pauseOnHover: true,
                    position : "rightTop"
                });
                this.getUserWishlist();
            }
            else
            {
                this.$snotify.error(response.data.status, {
                    timeout: 6000,
                    showProgressBar: true,
                    closeOnClick: false,
                    pauseOnHover: true,
                    position : "rightTop"
                });            }
          }).catch(error => {
              
          }); 
        }
    }

}
</script>

<style>

</style>