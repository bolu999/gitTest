<template>
  <div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0 font-size-18">Orders</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                <li class="breadcrumb-item active">Orders</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <!-- <div class="row">
                <div class="col-xl-4">
                    <div class="card overflow-hidden">
                        <div class="bg-soft-primary">
                            <div class="row">
                                <div class="col-7">
                                    <div class="text-primary p-3">
                                        <h5 class="text-primary">Welcome Back !</h5>
                                        <p>Skote Dashboard</p>
                                    </div>
                                </div>
                                <div class="col-5 align-self-end">
                                    <img src="cms/assets/images/profile-img.png" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="avatar-md profile-user-wid mb-4">
                                        <img src="cms/assets/images/users/avatar-1.jpg" alt="" class="img-thumbnail rounded-circle">
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
                                            <div class="col-6">
                                                <h5 class="font-size-15">$1245</h5>
                                                <p class="text-muted mb-0">Revenue</p>
                                            </div>
                                        </div>
                                        <div class="mt-4">
                                            <a href="#" class="btn btn-primary waves-effect waves-light btn-sm">View Profile <i class="mdi mdi-arrow-right ml-1"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Monthly Earning</h4>
                            <div class="row">
                                <div class="col-sm-6">
                                    <p class="text-muted">This month</p>
                                    <h3>$34,252</h3>
                                    <p class="text-muted"><span class="text-success mr-2"> 12% <i class="mdi mdi-arrow-up"></i> </span> From previous period</p>

                                    <div class="mt-4">
                                        <a href="#" class="btn btn-primary waves-effect waves-light btn-sm">View More <i class="mdi mdi-arrow-right ml-1"></i></a>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="mt-4 mt-sm-0">
                                        <div id="radialBar-chart" class="apex-charts"></div>
                                    </div>
                                </div>
                            </div>
                            <p class="text-muted mb-0">We craft digital, graphic and dimensional thinking.</p>
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
                                            <p class="text-muted font-weight-medium">Orders</p>
                                            <h4 class="mb-0">1,235</h4>
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
                                            <p class="text-muted font-weight-medium">Revenue</p>
                                            <h4 class="mb-0">$35, 723</h4>
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
                                            <p class="text-muted font-weight-medium">Average Price</p>
                                            <h4 class="mb-0">$16.2</h4>
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

                    <div class="card">
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
                    </div>
                </div>
            </div> -->
            <!-- end row -->

            <!-- <div class="row">
                <div class="col-xl-4">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Social Source</h4>
                            <div class="text-center">
                                <div class="avatar-sm mx-auto mb-4">
                                    <span class="avatar-title rounded-circle bg-soft-primary font-size-24">
                                            <i class="mdi mdi-facebook text-primary"></i>
                                        </span>
                                </div>
                                <p class="font-16 text-muted mb-2"></p>
                                <h5><a href="#" class="text-dark">Facebook - <span class="text-muted font-16">125 sales</span> </a></h5>
                                <p class="text-muted">Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus tincidunt.</p>
                                <a href="#" class="text-primary font-16">Learn more <i class="mdi mdi-chevron-right"></i></a>
                            </div>
                            <div class="row mt-4">
                                <div class="col-4">
                                    <div class="social-source text-center mt-3">
                                        <div class="avatar-xs mx-auto mb-3">
                                            <span class="avatar-title rounded-circle bg-primary font-size-16">
                                                    <i class="mdi mdi-facebook text-white"></i>
                                                </span>
                                        </div>
                                        <h5 class="font-size-15">Facebook</h5>
                                        <p class="text-muted mb-0">125 sales</p>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="social-source text-center mt-3">
                                        <div class="avatar-xs mx-auto mb-3">
                                            <span class="avatar-title rounded-circle bg-info font-size-16">
                                                    <i class="mdi mdi-twitter text-white"></i>
                                                </span>
                                        </div>
                                        <h5 class="font-size-15">Twitter</h5>
                                        <p class="text-muted mb-0">112 sales</p>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="social-source text-center mt-3">
                                        <div class="avatar-xs mx-auto mb-3">
                                            <span class="avatar-title rounded-circle bg-pink font-size-16">
                                                    <i class="mdi mdi-instagram text-white"></i>
                                                </span>
                                        </div>
                                        <h5 class="font-size-15">Instagram</h5>
                                        <p class="text-muted mb-0">104 sales</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-5">Activity</h4>
                            <ul class="verti-timeline list-unstyled">
                                <li class="event-list">
                                    <div class="event-timeline-dot">
                                        <i class="bx bx-right-arrow-circle font-size-18"></i>
                                    </div>
                                    <div class="media">
                                        <div class="mr-3">
                                            <h5 class="font-size-14">22 Nov <i class="bx bx-right-arrow-alt font-size-16 text-primary align-middle ml-2"></i></h5>
                                        </div>
                                        <div class="media-body">
                                            <div>
                                                Responded to need “Volunteer Activities
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="event-list">
                                    <div class="event-timeline-dot">
                                        <i class="bx bx-right-arrow-circle font-size-18"></i>
                                    </div>
                                    <div class="media">
                                        <div class="mr-3">
                                            <h5 class="font-size-14">17 Nov <i class="bx bx-right-arrow-alt font-size-16 text-primary align-middle ml-2"></i></h5>
                                        </div>
                                        <div class="media-body">
                                            <div>
                                                Everyone realizes why a new common language would be desirable... <a href="#">Read more</a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="event-list active">
                                    <div class="event-timeline-dot">
                                        <i class="bx bxs-right-arrow-circle font-size-18 bx-fade-right"></i>
                                    </div>
                                    <div class="media">
                                        <div class="mr-3">
                                            <h5 class="font-size-14">15 Nov <i class="bx bx-right-arrow-alt font-size-16 text-primary align-middle ml-2"></i></h5>
                                        </div>
                                        <div class="media-body">
                                            <div>
                                                Joined the group “Boardsmanship Forum”
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="event-list">
                                    <div class="event-timeline-dot">
                                        <i class="bx bx-right-arrow-circle font-size-18"></i>
                                    </div>
                                    <div class="media">
                                        <div class="mr-3">
                                            <h5 class="font-size-14">12 Nov <i class="bx bx-right-arrow-alt font-size-16 text-primary align-middle ml-2"></i></h5>
                                        </div>
                                        <div class="media-body">
                                            <div>
                                                Responded to need “In-Kind Opportunity”
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <div class="text-center mt-4"><a href="#" class="btn btn-primary waves-effect waves-light btn-sm">View More <i class="mdi mdi-arrow-right ml-1"></i></a></div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Top Cities Selling Product</h4>

                            <div class="text-center">
                                <div class="mb-4">
                                    <i class="bx bx-map-pin text-primary display-4"></i>
                                </div>
                                <h3>1,456</h3>
                                <p>San Francisco</p>
                            </div>

                            <div class="table-responsive mt-4">
                                <table class="table table-centered table-nowrap">
                                    <tbody>
                                        <tr>
                                            <td style="width: 30%">
                                                <p class="mb-0">San Francisco</p>
                                            </td>
                                            <td style="width: 25%">
                                                <h5 class="mb-0">1,456</h5></td>
                                            <td>
                                                <div class="progress bg-transparent progress-sm">
                                                    <div class="progress-bar bg-primary rounded" role="progressbar" style="width: 94%" aria-valuenow="94" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p class="mb-0">Los Angeles</p>
                                            </td>
                                            <td>
                                                <h5 class="mb-0">1,123</h5>
                                            </td>
                                            <td>
                                                <div class="progress bg-transparent progress-sm">
                                                    <div class="progress-bar bg-success rounded" role="progressbar" style="width: 82%" aria-valuenow="82" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p class="mb-0">San Diego</p>
                                            </td>
                                            <td>
                                                <h5 class="mb-0">1,026</h5>
                                            </td>
                                            <td>
                                                <div class="progress bg-transparent progress-sm">
                                                    <div class="progress-bar bg-warning rounded" role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
            <!-- end row -->

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">All Orders</h4>
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
            <li v-for="i in totalPage" :key="i"><a v-if="i > (currentPage - 5) && i < (currentPage + 5)" :class="(i == currentPage) ? 'active' : ''" href="#" v-on:click="gotoPage(i)">{{ i }}</a></li>
            <!-- <li><a href="#" class="active">2</a></li> -->
            
            <li v-if="totalPage > currentPage" class="page-item">
                <a v-on:click="gotoPage(currentPage + 1)" class="page-link" href="#">»</a>
            </li>
        </ul> 
    </nav>
    <div v-else>
        <h4 class="text-center">No order has been placed...</h4>
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
        <vue-snotify></vue-snotify>
  </div>
</template>

<script>
import Axios from "axios";

export default {
    name: "orders",
    data()
    {
        return{
            orders : [],
            viewedOrder : null,
            totalPage      : 0,
            nextPage       : 0,
            currentPage    : 0,
            loading : false,
            total   : '',
        }
    },

    methods:{
               numberWithCommas(x) {
                 return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
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

        calculateTotal()
        {
            
            let total = 0;
            this.viewedOrder.orders.forEach(order => {
                total += parseInt(order.price);
            });
            this.total = this.numberWithCommas(total);
        },

        updateOrderStatus(){
            this.loading = true;
            Axios.post(process.env.MIX_APP_URL+'/update/orderstatus', {status: this.viewedOrder.orderStatus, id: this.viewedOrder.id})
            .then(response => {
               if(response.data == true)
               {
                   //show success alert
                    this.loading = false;
                    this.$snotify.success('Order Status Updated Successfully', {
                        timeout: 3000,
                        showProgressBar: false,
                        closeOnClick: true,
                        pauseOnHover: true,
                        position : "rightTop",
                    });
               }
               else
               {
                   //show error alert
                    this.loading = false;
                     this.$snotify.errer('Failed to update order status', {
                        timeout: 3000,
                        showProgressBar: false,
                        closeOnClick: true,
                        pauseOnHover: true,
                        position : "rightTop",
                    });

               }
            }).catch(error => {
                this.loading = false;
            });
        },

        viewOrder(id){
            var result = this.orders.filter(obj => {
                return obj.id === id
            })
            this.viewedOrder = result[0];
            this.calculateTotal()
            // this.order = null
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