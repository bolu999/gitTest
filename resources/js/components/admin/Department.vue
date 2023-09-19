<template>
  <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-flex align-items-center justify-content-between">
                                    <h4 class="mb-0 font-size-18">Depertment Detail</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                            <li class="breadcrumb-item active">Depertment Detail</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row" v-if="department != null">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <div class="product-detai-imgs">
                                                    <div class="row">
                                                       <div class="col-md-2 col-sm-3 col-4">
                                                            <div class="nav flex-column nav-pills " id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                                <router-link :to="{path : '/admin-department-detail/'+department.id}">
                                                                    <div class="product-img position-relative">
                                                                        <img :src="department.image" alt="" class="img-fluid mx-auto d-block">
                                                                    </div>
                                                                </router-link>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-7 offset-md-1 col-sm-9 col-8">
                                                                <div class="tab-pane fade show active" id="product-1" role="tabpanel" aria-labelledby="product-1-tab">
                                                                    <div>
                                                                        <img :src="department.image" alt="" class="img-fluid mx-auto d-block">
                                                                    </div>
                                                                </div>
                                                            <!-- <div class="tab-content" id="v-pills-tabContent">
                                                                <div class="tab-pane fade" id="product-2" role="tabpanel" aria-labelledby="product-2-tab">
                                                                    <div>
                                                                        <img :src="product.image_link2" alt="" class="img-fluid mx-auto d-block">
                                                                    </div>
                                                                </div>
                                                           
                                                            </div> -->
                                                            <div class="text-center">
                                                                <router-link :to="{path : '/admin-edit-department/'+department.id}" type="button" class="btn btn-primary waves-effect waves-light mt-2 mr-1">
                                                                    <i class="mdi mdi-pencil mr-2"></i> Edit
                                                                </router-link>
                                                                <span v-if="loading" type="button" class="btn btn-danger waves-effect  mt-2 waves-light">
                                                                    <i class="mdi mdi-trash-can mr-2"></i>Please wait...
                                                                </span>
                                                                <span v-else @click="deleteDepartment(department.id)" type="button" class="btn btn-danger waves-effect  mt-2 waves-light">
                                                                    <i class="mdi mdi-trash-can mr-2"></i>Delete
                                                                </span>
                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
    
                                            <div class="col-xl-6">
                                                <div class="mt-4 mt-xl-3">
                                                    <h4 class="mt-1 mb-3">Department Name: {{ department.name }}</h4>
                                                    <!-- <span class="text-primary">Department: {{ category.department.name }}</span> -->
                                                    <h4  class="mt-1 mb-3">Description</h4>
                                                    <p>{{ department.description }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end row -->
    
                                       
                                        <!-- end Specifications -->
    
                                       
    
                                    </div>
                                </div>
                                <!-- end card -->
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
    name: "department",
    data(){
       return {
          department : null,
          loading : false,

       }
    },

    mounted()
    {
      this.getDepartmentData();
    },

   //  updated()
   //  {
   //    this.getProductData();
   //  },

    watch:{
      $route (to, from){
      this.getDepartmentData();    
      }
   },

   methods : {
      

     deleteDepartment(id) {
            this.$confirm("Are you sure you want to delete this item?").then(() => {
            //do something...
            Axios.get(process.env.MIX_APP_URL+'/delete/department/'+id)
            .then(response => 
            {
                this.$snotify.success('DEPARTMENT DELETED SUCCESSFULLY', {
                    timeout: 1000,
                    showProgressBar: true,
                    closeOnClick: false,
                    pauseOnHover: true,
                    position : "rightTop"
                }).on("destroyed", () => {
                    this.loading = false;
                    this.$router.push('/admin-departments');    
                });
                // this.getAllCategories();
                           
            }).catch(error => {
                    
            });
           });
        },

   

      getDepartmentData()
      {
        //  this.loading = true;
         
         
         Axios.get(process.env.MIX_APP_URL+'/admin/singledepartment/'+this.$route.params.id)
         .then(response => {
            this.department = response.data;
            // this.getRelatedProduct();
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