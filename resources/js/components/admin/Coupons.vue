<template>
   <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <h4 class="mb-0 font-size-18">Coupons</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                    <li class="breadcrumb-item active">Coupons</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row mb-2">
                                    <div class="col-sm-4">
                                        <div class="search-box mr-2 mb-2 d-inline-block">
                                            <div class="position-relative">
                                                <input type="text" class="form-control" placeholder="Search...">
                                                <i class="bx bx-search-alt search-icon"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="text-sm-right">
                                            <router-link to="/newcoupon" class="btn btn-success btn-rounded waves-effect waves-light mb-2 mr-2"><i class="mdi mdi-plus mr-1"></i> New Coupon</router-link>
                                        </div>
                                    </div><!-- end col-->
                                </div>

                                <div class="table-responsive">
                                    <table class="table table-centered table-nowrap">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Code</th>
                                                <th>Type</th>
                                                <th>Value</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="(coupon, index) in coupons" :key="index">
                                                <td>
                                                   {{ index + 1 }}
                                                </td>
                                                <td>{{ coupon.code }}</td>
                                                <td>
                                                    {{ coupon.type }}
                                                </td>
                                                <td>
                                                    {{ coupon.value }} 
                                                </td>
                                                <td> 
                                                    {{ coupon.status }}
                                                </td>
                                                <td>
                                                  <router-link title="edit" :to="{path : '/editcoupon/'+coupon.id}" class="btn btn-warning waves-effect waves-light" data-toggle="modal" data-target=".exampleModal">
                                                        <i class="bx bxs-edit-alt"></i>
                                                    </router-link>
                                                    <span title="delete" @click="deleteCoupon(coupon.id)" class="btn btn-danger waves-effect waves-light" data-toggle="modal" data-target=".exampleModal">
                                                       <i class="bx bxs-trash"></i>
                                                    </span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <ul class="pagination pagination-rounded justify-content-center mt-4">
                                    <li v-if="currentPage > 1"  class="page-item">
                                        <a v-on:click="gotoPage(currentPage - 1)" href="#" class="page-link"><i class="mdi mdi-chevron-left"></i></a>
                                    </li>
                                    <li v-for="i in totalPage" :key="i" :class="(i == currentPage) ? 'active' : ''" class="page-item">
                                        <a href="#" v-on:click="gotoPage(i)" class="page-link">{{ i }}</a>
                                    </li>
                                    
                                    <li class="page-item"  v-if="totalPage > currentPage" >
                                        <a href="#" v-on:click="gotoPage(currentPage + 1)" class="page-link"><i class="mdi mdi-chevron-right"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->

            </div> <!-- container-fluid -->
        </div>
    <vue-snotify></vue-snotify>
    </div>
</template>

<script>
import Axios from "axios";

export default {
    name: "coupons",

data() {
     return{
        coupons        : [],
        loading        : false,
        totalPage      : 0,
        nextPage       : 0,
        currentPage    : 0,
        isCategorised  : false,
        categoryId     : 0,

      }
   },

   mounted() {
      this.getAllCoupons();
   },

   watch:{
  
   },

   methods : {
    getAllCoupons()
    {
        Axios.get(process.env.MIX_APP_URL+'/all/coupons')
        .then(response => {
            this.coupons = response.data.data;
            this.totalPage = response.data.last_page;
            this.currentPage = response.data.current_page;
        }).catch(error => {
        
        });
    },

    deleteCoupon(id)
    {
    this.$confirm("Are you sure you want to delete this coupon?").then(() => {
        //do something...
        Axios.get(process.env.MIX_APP_URL+'/delete/coupon/'+id)
        .then(response => {
            if(response.data == true)
            {
                this.getAllCoupons();
                this.$snotify.success('COUPON DELETED', {
                    timeout: 6000,
                    showProgressBar: true,
                    closeOnClick: false,
                    pauseOnHover: true,
                    position : "rightTop"
                });
                this.getAllUsers(this.currentPage);
            }
            else
            {
                 this.$snotify.error('FAILED TO DELETED COUPON', {
                    timeout: 6000,
                    showProgressBar: true,
                    closeOnClick: false,
                    pauseOnHover: true,
                    position : "rightTop"
                });
                this.getAllUsers(this.currentPage);
            }
        }).catch(error => 
        {
            
        });

        });
      },

      

      gotoPage(number)
      {
         this.loading = true;
         url = '/all/coupons/?page=';
         
          Axios.get(process.env.MIX_APP_URL+url+number)
         .then(response => {
            this.coupons = response.data.data;
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