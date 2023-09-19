<template>
   <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-flex align-items-center justify-content-between">
                                    <h4 class="mb-0 font-size-18">Edit User</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                            <li class="breadcrumb-item active">Edit User</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row" v-if="user != null">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
        
                                        <h4 class="card-title">Basic Information</h4>
                                        <p class="card-title-desc">Fill all information below</p>
        
                                        <form>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="f_name">First Name:</label>
                                                        <input v-model="user.first_name" id="f_name" name="f_name" type="text" class="form-control">
                                                    </div>
                                                    <!-- <div class="form-group">
                                                        <label for="manufacturername">Description</label>
                                                        <input id="manufacturername" name="manufacturername" type="text" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="manufacturerbrand">Manufacturer Brand</label>
                                                        <input id="manufacturerbrand" name="manufacturerbrand" type="text" class="form-control">
                                                    </div> -->
                                                    <div class="form-group">
                                                        <label for="email">Email:</label>
                                                        <input disabled id="email" name="email" type="text" class="form-control" v-model="user.email">
                                                    </div>

                                                    <!-- <div class="form-group">
                                                        <label for="price">Price Quantity</label>
                                                        <input id="price" name="quantity" type="text" class="form-control" v-model="quantity">
                                                    </div> -->

                                                     <div class="custom-control custom-checkbox mb-3">
                                                        <input v-model="user.isAdmin" type="checkbox" class="custom-control-input" id="customCheck2">
                                                        <label class="custom-control-label"  for="customCheck2">Admin?</label>
                                                    </div>
                                                </div>
        
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="l_name">Last Name:</label>
                                                        <input id="l_name" name="l_name" type="text" class="form-control" v-model="user.last_name">
                                                    </div>
                                                     <div class="form-group">
                                                        <label for="phone">Phone Number:</label>
                                                        <input id="phone" name="phone" type="text" class="form-control" v-model="user.phone_number">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="address">Address:</label>
                                                        <textarea class="form-control" id="address" rows="5" v-model="user.address"></textarea>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </form>        
                                    </div>
                                </div>
        
                                <div class="card">
                                    <div class="card-body">
                                        <form>        
                                            <button v-if="loading"  disabled class="btn btn-primary mr-1 waves-effect waves-light">Please Wait... <div  class="loader"></div></button>        
                                            <span v-else @click="saveUser()" type="submit" class="btn btn-primary mr-1 waves-effect waves-light">Save User</span>        
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->
            <vue-snotify></vue-snotify>
    </div>
</template>

<script>
import Axios from "axios";
import vue2Dropzone from 'vue2-dropzone'
import 'vue2-dropzone/dist/vue2Dropzone.min.css'

export default {
    name: "Edituser",
     components: {
        vueDropzone: vue2Dropzone
    },
    
    data()
    {
        return{
            user   : null,
            loading       : false,
        }
    },

    mounted()
    {
        this.getUser();
    },

    updated(){
                
    },
     
    methods:{
    
        saveUser()
        {
            //run validation here...
            this.loading = true;
            // this.$refs.myVueDropzone.processQueue();            
            Axios.post(process.env.MIX_APP_URL+'/edit/user', {user: this.user})
            .then(response => {
                
                if(response.data == true)
                {
                    this.$snotify.success('USER INFORMATION MODIFIED', {
                        timeout: 3000,
                        showProgressBar: false,
                        closeOnClick: true,
                        pauseOnHover: true,
                        position : "rightTop",
                    });
                    this.loading = false;
                }
            }).catch(error => {
                
            });
            
        },

        getUser()
        {
            // id = this.$router.params.id;
            Axios.get(process.env.MIX_APP_URL+'/admin/user/'+this.$route.params.id)
            .then(response => {                
                this.user = response.data;
            }).catch(error => {
                
                // this.$noty.error("Error occured. Try again");
            });

        }
    },
     

    
}
</script>

<style>
.loader {
 border: 5px solid #f3f3f3;
    -webkit-animation: spin 1s linear infinite;
    animation: spin 1s linear infinite;
    border-top: 5px solid #9a1522;
    border-radius: 50%;
    width: 20px;
    height: 20px;
}

/* Safari */
@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
</style>