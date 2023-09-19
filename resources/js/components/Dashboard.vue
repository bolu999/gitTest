<template>
  <div class="main-content">
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
          <div class="row">
              <div class="col-12">
                  <div class="page-title-box d-flex align-items-center justify-content-between">
                      <h4 class="mb-0 font-size-18">Dashboard</h4>

                      <div class="page-title-right">
                          <ol class="breadcrumb m-0">
                              <li class="breadcrumb-item"><a href="javascript: void(0);">User</a></li>
                              <li class="breadcrumb-item active">Dashboard</li>
                          </ol>
                      </div>
                  </div>
              </div>
          </div>
          <!-- end page title -->
            <div class="row">
                    <div class="col-xl-4">
                        <div class="card overflow-hidden">
                            <div class="bg-soft-primary">
                                <div class="row">
                                    <div class="col-7">
                                        <div class="text-primary p-3">
                                            <h5 class="text-primary">Welcome Back!</h5>
                                            <p>{{ details.userEmail }}</p>
                                        </div>
                                    </div>
                                    <div class="col-5 align-self-end">
                                        <img src="assets/images/profile-img.png" alt="" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="card-body pt-0">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="avatar-md profile-user-wid mb-4">
                                            <img src="assets/images/users/avatar-1.jpg" alt="" class="img-thumbnail rounded-circle">
                                        </div>
                                        <h5 class="font-size-15 text-truncate">Henry Price</h5>
                                        <p class="text-muted mb-0 text-truncate">UI/UX Designer</p>
                                    </div>

                                    <div class="col-sm-8">
                                        <div class="pt-4">

                                            <div class="row">
                                                <div class="col-6">
                                                    <h5 class="font-size-15">125</h5>
                                                    <p class="text-muted mb-0">Projects</p>
                                                </div>
                                                <div class="col-12">
                                                    <h5 class="font-size-15">{{ details.userEmail }}</h5>
                                                    <p class="text-muted mb-0">Email</p>
                                                </div>
                                            </div>
                                            <div class="mt-4">
                                                <a href="javascript:void(0)" class="btn btn-primary waves-effect waves-light btn-sm">Site Settings <i class="mdi mdi-arrow-right ml-1"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                        
                    </div>
                    <div class="col-xl-8">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card mini-stats-wid">
                                    <div class="card-body">
                                        <div class="media">
                                            <div class="media-body">
                                                <p class="text-muted font-weight-medium">All Orders</p>
                                                <h4 class="mb-0">{{ details.orderCount }}</h4>
                                            </div>

                                            <div class="mini-stat-icon avatar-sm rounded-circle bg-primary align-self-center">
                                                <span class="avatar-title">
                                                    <i class="bx bx-copy-alt font-size-24"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="col-md-4">
                                <div class="card mini-stats-wid">
                                    <div class="card-body">
                                        <div class="media">
                                            <div class="media-body">
                                                <p class="text-muted font-weight-medium">All Users</p>
                                                <h4 class="mb-0">{{ details.userCount }}</h4>
                                            </div>

                                            <div class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
                                                <span class="avatar-title rounded-circle bg-primary">
                                                    <i class="bx bx-archive-in font-size-24"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                            <!-- <div class="col-md-4">
                                <div class="card mini-stats-wid">
                                    <div class="card-body">
                                        <div class="media">
                                            <div class="media-body">
                                                <p class="text-muted font-weight-medium">All Products</p>
                                                <h4 class="mb-0">{{ details.productCount }}</h4>
                                            </div>

                                            <div class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
                                                <span class="avatar-title rounded-circle bg-primary">
                                                    <i class="bx bx-purchase-tag-alt font-size-24"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                        <!-- end row -->

                        
                    </div>
                </div>
    

    <div class="row" v-if="orders != []">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Recent Orders</h4>
                    <div class="table-responsive">
                        <table class="table table-centered table-nowrap mb-0">
                            <thead class="thead-light">
                                <tr>
                                    <th style="width: 20px;">
                                        #
                                    </th>
                                    <th>Product Name</th>
                                    <th>Quantity</th>
                                    <th>Total price</th>
                                    <th>Date</th>
                                    <th>Payment Reference</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(order, index) in orders" :key="index">
                                    <td>
                                  
                                        {{index + 1}}
                                    </td>
                                    <td><a href="javascript: void(0);" class="text-body font-weight-bold">{{ order.product }}</a> </td>
                                    <td>{{ order.quantity }}</td>
                                    <td>
                                        ₦{{ numberWithCommas(order.price) }}
                                    </td>
                                    <td>
                                        {{ order.created_at.slice(0, 10) }}
                                    </td>
                                    <td>
                                        {{ order.paymentReference }}
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
    
    <div v-else>
        <h4 class="text-center">You have no recent order...</h4>
    </div>
    <!-- end row -->
</div>
<!-- container-fluid -->
<!-- End Page-content -->
</div>
  </div>
</template>

<script>
import Axios from "axios";

export default {
    name:'Dashboard',
    data(){
        return{
            orders : [],
            totalPage      : 0,
            nextPage       : 0,
            currentPage    : 0,
            details        : 0,
        }
    },

    mounted()
    {
        this.getUserOrders();
        this.getDashboardDetails();
    },

    methods : {
       numberWithCommas(x) {
         return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
      },

      getDashboardDetails()
      {
         Axios.get(process.env.MIX_APP_URL+'/user/dashboard')
            .then(response => {
                this.details = response.data;
            }).catch(error => {

            });
      },

        getUserOrders()
        {
          Axios.get(process.env.MIX_APP_URL+'/getuserOrders')
          .then(response => {            
            this.orders = response.data.data;
            this.totalPage = response.data.last_page;
            this.currentPage = response.data.current_page;
            // console.log(this.orders);
            
          }).catch(error => {
              
          });
        }
    }

}
</script>

<style>

</style>