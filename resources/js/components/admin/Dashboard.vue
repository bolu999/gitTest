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
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
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
                                                    <p>Administrator</p>
                                                </div>
                                            </div>
                                            <div class="col-5 align-self-end">
                                                <img src="assets/images/profile-img.png" alt="" class="img-fluid">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body pt-0">
                                        <div class="row">
                                            <!-- <div class="col-sm-4">
                                                <div class="avatar-md profile-user-wid mb-4">
                                                    <img src="assets/images/users/avatar-1.jpg" alt="" class="img-thumbnail rounded-circle">
                                                </div>
                                                <h5 class="font-size-15 text-truncate">Henry Price</h5>
                                                <p class="text-muted mb-0 text-truncate">UI/UX Designer</p>
                                            </div> -->

                                            <div class="col-sm-8">
                                                <div class="pt-4">

                                                    <div class="row">
                                                        <!-- <div class="col-6">
                                                            <h5 class="font-size-15">125</h5>
                                                            <p class="text-muted mb-0">Projects</p>
                                                        </div> -->
                                                        <div class="col-12">
                                                            <h5 class="font-size-15">{{ details.adminEmail }}</h5>
                                                            <p class="text-muted mb-0">Email</p>
                                                        </div>
                                                    </div>
                                                    <div class="mt-4">
                                                        <a href="javascript:void(0)" class="btn btn-primary waves-effect waves-light btn-sm">Site Settings <i class="mdi mdi-arrow-right ml-1"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
                                    <div class="col-md-4">
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
                                    </div>
                                    <div class="col-md-4">
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
                                    </div>
                                </div>
                                <!-- end row -->

                                <!-- <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-4 float-sm-left">Email Sent</h4>
                                        <div class="float-sm-right">
                                            <ul class="nav nav-pills">
                                                <li class="nav-item">
                                                    <a class="nav-link" href="#">Week</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="#">Month</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link active" href="#">Year</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div id="stacked-column-chart" class="apex-charts" dir="ltr"></div>
                                    </div>
                                </div> -->
                            </div>
                        </div>
           

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Recent Orders</h4>
                            <div class="table-responsive">
                                <table class="table table-centered table-nowrap mb-0">
                                    <thead class="thead-light">
                                    <tr>
                                        <th style="width: 20px;">
                                            <!-- <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck1">
                                                <label class="custom-control-label" for="customCheck1">&nbsp;</label>
                                            </div> -->
                                            #
                                        </th>
                                        <th>Order ID</th>
                                        <th>Billing Name</th>
                                        <th>Date</th>
                                        <th>Payment Status</th>
                                        <th>Delivery Status</th>
                                        <th>Payment Method</th>
                                        <th>View Details</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(order, index) in orders" :key="index" >
                                        <td>
                                            <!-- <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck2">
                                                <label class="custom-control-label" for="customCheck2">&nbsp;</label>
                                            </div> -->
                                            {{index + 1}}
                                        </td>
                                        <td><a href="javascript: void(0);" class="text-body font-weight-bold">{{ order.paymentReference }}</a> </td>
                                        <td>{{ order.firstName }} {{ order.lastName }}</td>
                                        <td>
                                            {{ order.created_at.slice(0, 10) }}
                                        </td>
                                        <td>
                                            <span class="badge badge-pill badge-soft-default font-size-12">{{ order.paymentStatus }}</span>
                                        </td>
                                        <td>
                                            <span class="badge badge-pill badge-soft-success font-size-12">{{ order.orderStatus }}</span>
                                        </td>
                                        <td>
                                            <i class="fab fa-cc-mastercard mr-1"></i> Card
                                        </td>
                                        <td>
                                            <!-- Button trigger modal -->
                                            <button type="button" @click="viewOrder(order.id)" class="btn btn-primary btn-sm btn-rounded waves-effect waves-light" data-toggle="modal" data-target=".exampleModal">
                                                View Details
                                            </button>
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
            <nav aria-label="..."  v-if="orders.length > 0" >
                <ul id="pagination">
                    <li v-if="currentPage > 1" class="page-item">
                        <a v-on:click="gotoPage(currentPage - 1)" class="page-link" href="#">«</a >
                    </li>
                    <li v-for="i in totalPage" :key="i"><a  :class="(i == currentPage) ? 'active' : ''" href="#" v-on:click="gotoPage(i)">{{ i }}</a></li>
                    <!-- <li><a href="#" class="active">2</a></li> -->
                    
                    <li v-if="totalPage > currentPage" class="page-item">
                        <a v-on:click="gotoPage(currentPage + 1)" class="page-link" href="#">»</a>
                    </li>
                </ul> 
            </nav>
            <div v-else>
                <h4 class="text-center">You have no recent order...</h4>
            </div>
            <!-- end row -->
        </div>
        <!-- container-fluid -->
        <!-- End Page-content -->
    </div>
        <div class="modal fade exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div  v-if="viewedOrder!=null" class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Order Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="mb-2">Order id: <span class="text-primary">{{ viewedOrder.paymentReference }}</span></p>
                    <p class="mb-2">Billing Name: <span class="text-primary">{{ viewedOrder.firstName }} {{ viewedOrder.lastName }}</span></p>
                    <p class="mb-2">Email: <span class="">{{ viewedOrder.email }}</span></p>
                    <p class="mb-2">Phone Number: <span class="">{{ viewedOrder.phoneNumber }}</span></p>
                    <p class="mb-4">Address: <span class="">{{ viewedOrder.address }}</span></p>
                    <div class="form-group">
                        <label class="control-label">Order Status</label>
                        <select class="form-control select2" v-model="viewedOrder.orderStatus">
                            <option value="pending">Pending</option>
                            <option value="in_transit">In transit</option>
                            <option value="delivered">Delivered</option>
                        </select>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-centered table-nowrap">
                            <thead>
                                <tr>
                                    <th scope="col">Image</th>
                                    <th scope="col">Product Name</th>
                                    <th scope="col">Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="order in viewedOrder.orders" :key="order.id">
                                    <th scope="row">
                                        <div>
                                            <img :src="order.image" alt="" class="avatar-sm">
                                        </div>
                                    </th>
                                    <td>
                                        <div>
                                            <h5 class="text-truncate font-size-14">{{ order.product }}</h5>
                                            <p class="text-muted mb-0">₦ {{ numberWithCommas(order.price) }} x {{ order.quantity }}</p>
                                        </div>
                                    </td>
                                    <td>₦ {{ numberWithCommas(order.price * order.quantity) }}</td>
                                </tr>
                                
                                <tr>
                                    <td colspan="2">
                                        <h6 class="m-0 text-right">Total:</h6>
                                    </td>
                                    <td>
                                        ₦ {{ total }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button v-if="!loading" type="button" class="btn btn-success" @click="updateOrderStatus">Update</button>
                    <button v-else type="button" class="btn btn-default" disabled>Please Wait...</button>
                </div>
            </div>
        </div>
    </div>
  </div>

</template>

<script>
import Axios from "axios";

export default {
    name: "dashboard",
    data()
    {
        return{
            orders : [],
            details : [],
            viewedOrder : null,
            totalPage      : 0,
            nextPage       : 0,
            currentPage    : 0,
        }
    },

    methods:{
        getDashboardDetails()
        {
            Axios.get(process.env.MIX_APP_URL+'/admin/dashboard')
            .then(response => {
                this.details = response.data;
            }).catch(error => {

            });
        },

        getAllOrders()
        {
            Axios.get(process.env.MIX_APP_URL+'/admin/allorder')
            .then(response => {
                this.orders = response.data.data;
                this.totalPage = response.data.last_page;
                this.currentPage = response.data.current_page;
            }).catch(error => {

            });
        },
           numberWithCommas(x) {
                return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            },
        calculateTotal()
        {
            
            let total = 0;
            this.viewedOrder.orders.forEach(order => {
                total += parseInt(order.price);
            });
            this.total = this.numberWithCommas(total);
        },

        viewOrder(id){
               var result = this.orders.filter(obj => {
                return obj.id === id
            })
            this.viewedOrder = result[0];
            this.calculateTotal()

            // this.order = null;
            //  Axios.get(process.env.MIX_APP_URL+'/orderdetail/'+id)
            // .then(response => {
            //     console.log(response.data);
                
            //     this.viewedOrder = response.data;
            // }).catch(error => {

            // });
        },


    },

    mounted(){
        this.getAllOrders();
        this.getDashboardDetails();
    }
}
</script>

<style >
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
  background-color: #2a3042;
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
  background-color: #2a3042;
  color: #fff;
}
#border-pagination li a:hover:not(.active) {
  background: #ddd;
}
</style>