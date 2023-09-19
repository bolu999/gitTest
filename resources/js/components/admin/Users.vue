<template>
   <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <h4 class="mb-0 font-size-18">Users</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                    <li class="breadcrumb-item active">Users</li>
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
                                                <input v-model.lazy="result" type="text" class="form-control" placeholder="Search...">
                                                <i class="bx bx-search-alt search-icon"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="text-sm-right">
                                            <router-link to="/admin-new-user" class="btn btn-success btn-rounded waves-effect waves-light mb-2 mr-2"><i class="mdi mdi-plus mr-1"></i> New User</router-link>
                                        </div>
                                    </div><!-- end col-->
                                </div>

                                <div class="table-responsive">
                                    <table class="table table-centered table-nowrap">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Username</th>
                                                <th>Phone / Email</th>
                                                <th>Address</th>
                                                <th>Role</th>
                                                <!-- <th>Wallet Balance</th> -->
                                                <th>Joining Date</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="(user, index) in users" :key="index">
                                                <td>
                                                   {{ index + 1 }}
                                                </td>
                                                <td>{{ user.first_name }} {{ user.last_name }}</td>
                                                <td>
                                                    <p class="mb-1">{{ user.phone_number }}</p>
                                                    <p class="mb-0">{{ user.email }}</p>
                                                </td>
                                                
                                                <td> {{ user.address }}</td>
                                                <td>
                                                    <span v-if="user.isAdmin" class="badge badge-success font-size-12"><i class="mdi mdi-star mr-1"></i> Admin</span>
                                                    <span v-else class="badge badge-info font-size-12"><i class="mdi mdi-star mr-1"></i> User</span>
                                                </td>
                                                <!-- <td>$5,412</td> -->
                                                <td>{{ user.created_at.slice(0, 10) }}</td>
                                                <td class="text-center">
                                                    <router-link title="view" :to="{path : '/admin-user/'+user.id}" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target=".exampleModal">
                                                        <i class="far fa-eye"></i>
                                                    </router-link>
                                                     <router-link title="edit" :to="{path : '/admin-edit-user/'+user.id}" class="btn btn-warning waves-effect waves-light" data-toggle="modal" data-target=".exampleModal">
                                                        <i class="bx bxs-edit-alt"></i>
                                                    </router-link>
                                                    <span title="delete" @click="deleteUser(user.id)" class="btn btn-danger waves-effect waves-light" data-toggle="modal" data-target=".exampleModal">
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
                                        <a v-if="i > (currentPage - 5) && i < (currentPage + 5)" href="#" v-on:click="gotoPage(i)" class="page-link">{{ i }}</a>
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
    name: "Users",

data() {
     return{
        pageTitle       : 'users',
        users           : [],
        loading         : false,
        role            : [],
        totalPage      : 0,
        nextPage       : 0,
        currentPage    : 0,
        isCategorised  : false,
        categoryId     : 0,
        sort           : "created_at",
        order          : "ASC",
        result    : '',

      }
   },

   mounted() {
      this.getAllUsers();
    //   this.getAllCategories();
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

        search()
        {
            if(this.result != '')
            {
                Axios.post('/admin/search/user', {  keywords: this.result })
                .then(response => this.users = response.data)
                .catch(error => {});
            }
            else
            {
                this.getAllUsers();
            }
        },
     
      getAllUsers()
      {
         Axios.get(process.env.MIX_APP_URL+'/admin/allusers')
         .then(response => {
            this.users = response.data.data;    
            this.totalPage = response.data.last_page;
            this.currentPage = response.data.current_page;        
         }).catch(error => {
            
         });
      },

       deleteUser(id)
      {
          this.$confirm("Are you sure you want to delete this user?").then(() => {
            //do something...
            Axios.get(process.env.MIX_APP_URL+'/delete/user/'+id)
            .then(response => {
                if(response.data == true)
                {
                    this.$snotify.success('USER DELETED', {
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