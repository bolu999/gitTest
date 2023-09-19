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
                              <li class="breadcrumb-item"><a href="javascript: void(0);">User</a></li>
                              <li class="breadcrumb-item active">Orders</li>
                          </ol>
                      </div>
                  </div>
              </div>
          </div>
          <!-- end page title -->
        
    

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
    <nav aria-label="..."  v-if="orders != []" >
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
    },

    methods : {
       numberWithCommas(x) {
         return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
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