<template>
   <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-flex align-items-center justify-content-between">
                                    <h4 class="mb-0 font-size-18">New User</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                            <li class="breadcrumb-item active">New User</li>
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
                                        <h4 class="card-title">Basic Information</h4>
                                        <p class="card-title-desc">Fill all information below</p>
                                        <form>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="f_name">First Name:</label>
                                                        <input v-model="user.first_name" id="f_name" name="f_name" type="text" class="form-control">
                                                        <div v-if="$v.user.first_name.$error">
                                                            <div class="alert alert-danger" role="alert" v-if="!$v.user.first_name.required">
                                                                First Name is required.                                    
                                                            </div>
                                                            <div class="alert alert-danger" role="alert" v-if="!$v.user.first_name.minLength">
                                                                First Name must have at least 2 words.                         
                                                            </div>
                                                        </div>
                                                    </div>
                                                 
                                                    <div class="form-group">
                                                        <label for="email">Email:</label>
                                                        <input id="email" name="email" type="text" class="form-control" v-model="user.email">
                                                        <div v-if="$v.user.email.$error">
                                                            <div class="alert alert-danger" role="alert" v-if="!$v.user.email.required">
                                                                Email is required.
                                                            </div>
                                                            <div class="alert alert-danger" role="alert" v-if="!$v.user.email.email">
                                                                Enter a proper email address.
                                                            </div>
                                                        </div>
                                                    </div>

                                                     <div class="form-group">
                                                        <label for="password">Password:</label>
                                                        <input id="password" name="password" type="text" class="form-control" v-model="user.password">
                                                            <div v-if="$v.user.password.$error">
                                                                <div class="alert alert-danger" role="alert" v-if="!$v.user.password.required">
                                                                    Password is required.                                    
                                                                </div>
                                                                <div class="alert alert-danger" role="alert" v-if="!$v.user.password.minLength">
                                                                    Password must have at least {{$v.user.password.$params.minLength.min}} characters.                         
                                                                </div>
                                                            </div>
                                                    </div>

                                                     <div class="custom-control custom-checkbox mb-3">
                                                        <input v-model="user.isAdmin" type="checkbox" class="custom-control-input" id="customCheck2">
                                                        <label class="custom-control-label"  for="customCheck2">Admin?</label>
                                                    </div>
                                                </div>
        
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="l_name">Last Name:</label>
                                                        <input id="l_name" name="l_name" type="text" class="form-control" v-model="user.last_name">
                                                        <div v-if="$v.user.last_name.$error">
                                                            <div class="alert alert-danger" role="alert" v-if="!$v.user.last_name.required">
                                                                Last Name is required.                                    
                                                            </div>
                                                            <div class="alert alert-danger" role="alert" v-if="!$v.user.last_name.minLength">
                                                                Last Name must have at least 2 words.                         
                                                            </div>
                                                        </div>
                                                    </div>
                                                     <div class="form-group">
                                                        <label for="phone">Phone Number:</label>
                                                        <input id="phone" name="phone" type="text" class="form-control" v-model="user.phone_number">
                                                        <div v-if="$v.user.phone_number.$error">
                                                            <div class="alert alert-danger" role="alert" v-if="!$v.user.phone_number.required">
                                                                Phone Number is required.                                    
                                                            </div>
                                                            <div class="alert alert-danger" role="alert" v-if="!$v.user.phone_number.minLength">
                                                                Phone Number must have at least 11 numbers.                         
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="address">Address:</label>
                                                        <textarea class="form-control" id="address" rows="5" v-model="user.address"></textarea>
                                                        <div v-if="$v.user.address.$error">
                                                            <div class="alert alert-danger" role="alert" v-if="!$v.user.address.required">
                                                                Address is required
                                                            </div>
                                                        </div>
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
import { required, minLength, email} from 'vuelidate/lib/validators';


export default {
    name: "Edituser",
     components: {
        vueDropzone: vue2Dropzone
    },
    
    data()
    {
        return{
            user   : {
                first_name      : null,
                last_name       : null,
                email           : null,
                address         : null,
                phone_number    : null,
                isAdmin         : false,
                password         : null,
            },
            loading             : false,
        }
    },

    mounted()
    {
        // this.getUser();
    },

    updated(){
                
    },

      validations: {
          user : {
            first_name: {
                required,
                minLength: minLength(2)
            },
            last_name: {
                required,
                minLength: minLength(2)
            },
            email: {
                required,
                 email,
            },
            address: {
                required,
            },
            phone_number: {
                required,
            },
            isAdmin: {
                required,
            },
            password: {
                required,
                minLength: minLength(5)
            }
          }
        },
     
    methods:{
    
        saveUser()
        {
            //run validation here...
            this.$v.$touch();
         if (this.$v.$invalid) 
         {
            this.submitStatus  = 'ERROR'
         }
         else 
         {
            this.loading = true;
            // this.$refs.myVueDropzone.processQueue();            
            Axios.post(process.env.MIX_APP_URL+'/new/user', {user: this.user})
            .then(response => {
                
                if(response.data == true)
                {
                    this.$snotify.success('USER CREATED', {
                        timeout: 3000,
                        showProgressBar: false,
                        closeOnClick: true,
                        pauseOnHover: true,
                        position : "rightTop",
                    }).on("destroyed", () => {
                        this.loading = false;
                        this.$router.push('/admin-users');
                    });
                   
                }
            }).catch(error => {
                
            });
         }
        },

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