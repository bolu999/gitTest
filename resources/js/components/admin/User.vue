<template>
  <div class="main-content">
                <div class="page-content">
                    <div class="container-fluid">
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-flex align-items-center justify-content-between">
                                    <h4 class="mb-0 font-size-18">User Detail</h4>
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                            <li class="breadcrumb-item active">User Detail</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row" v-if="user != null">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <div class="product-detai-imgs">
                                                    <div class="row">
                                                        <div class="col-md-7 offset-md-1 col-sm-9 col-8">
                                                            <div class="text-center">
                                                                <router-link :to="{path : '/admin-edit-user/'+user.id}" type="button" class="btn btn-primary waves-effect waves-light mt-2 mr-1">
                                                                    <i class="mdi mdi-pencil mr-2"></i> Edit
                                                                </router-link>
                                                                <span v-if="loading" type="button" class="btn btn-danger waves-effect  mt-2 waves-light">
                                                                    <i class="mdi mdi-trash-can mr-2"></i>Please wait...
                                                                </span>
                                                                <span v-else @click="deleteUser(user.id)" type="button" class="btn btn-danger waves-effect  mt-2 waves-light">
                                                                    <i class="mdi mdi-trash-can mr-2"></i>Delete
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="mt-4 mt-xl-3">
                                                    <h4 class="mt-1 mb-3">{{ user.firstName }} {{ user.lastName }}</h4>
                                                    <h5 class="mb-4">Email :  <b>{{ user.email }}</b></h5>
                                                    <h5 class="mb-4">Phone Number :  <b>{{ user.phone_number }}</b></h5>
                                                    <p class="text-muted mb-4">{{ user.address }}</p>
                                                    <form>                                                       
                                                        <div class="custom-control custom-checkbox mb-3">
                                                            <input disabled v-model="user.isAdmin" type="checkbox" class="custom-control-input" id="customCheck1">
                                                            <label class="custom-control-label"  for="customCheck1" >Admin?</label>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end row -->
                                    </div>
                                </div>
                                <!-- end card -->
                            </div>
                        </div>
                    </div> <!-- container-fluid -->
                </div>
            <vue-snotify></vue-snotify>
        </div>
</template>

<script>
import Axios from "axios";

export default {
    name: "user",
    data(){
       return {
          user : null,
          loading : false,
       }
    },

    mounted()
    {
      this.getUserData();
    },

   //  updated()
   //  {
   //    this.getProductData();
   //  },

    watch:{
     
   },

   methods : {
    //    numberWithCommas(x) {
    //      return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    //   },

     deleteUser(id) {
          this.$confirm("Are you sure you want to delete this user?").then(() => {
            //do something...
            this.loading = true;

            Axios.get(process.env.MIX_APP_URL+'/delete/user/'+id)
            .then(response => {
                if(response.data == true)
                {
                    this.$snotify.success('USER DELETED!', {
                        timeout: 1000,
                        showProgressBar: true,
                        closeOnClick: false,
                        pauseOnHover: true,
                        position : "rightTop"
                    }).on("destroyed", () => {
                        this.loading = false;
                        this.$router.push('/admin-users');    
                    });
                }
            }).catch(error => {
            
            });

           });
        },

  

      getUserData()
      {
        Axios.get(process.env.MIX_APP_URL+'/admin/user/'+this.$route.params.id)
        .then(response => {
            this.user = response.data;
            this.loading = false;
        }).catch(error => {
        
        // this.$noty.error("Error occured. Try again");
        });
      },


      
   }

}
</script>

<style>

</style>