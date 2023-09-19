<template>

<div class="main-content">
        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <h4 class="mb-0 font-size-18">Profile Settings</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">User</a></li>
                                    <li class="breadcrumb-item active">Profile Settings</li>
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
                                <p class="card-title-desc">Fill all site information below</p>

                                <form>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                    <label for="loginInputName">FIRST NAME *</label>
                                                    <input type="text" name="name" v-model="firstName"  class="form-control" id="loginInputName" placeholder="Enter First Name">
                                                    <div v-if="$v.firstName.$error">
                                                        <div class="alert alert-danger" role="alert" v-if="!$v.firstName.required">
                                                            First Name is required.                                    
                                                        </div>
                                                        <div class="alert alert-danger" role="alert" v-if="!$v.firstName.minLength">
                                                            First Name must have at least 2 words.                         
                                                        </div>
                                                    </div>
                                            </div>
                                        
                                            <div class="form-group">
                                                <label for="loginInputEmail">PHONE NUMBER *</label> 
                                                    <input type="text" v-model="phone" name="phone" class="form-control" id="loginInputEmail" placeholder="Enter Phone Number">
                                                    <div v-if="$v.phone.$error">
                                                        <div class="alert alert-danger" role="alert" v-if="!$v.phone.required">
                                                            Phone Number is required.                                    
                                                        </div>
                                                        <div class="alert alert-danger" role="alert" v-if="!$v.phone.minLength">
                                                            Phone Number must have at least {{$v.phone.$params.minLength.min}} characters.                         
                                                        </div>
                                                    </div>
                                            </div>
                
                                        </div>

                                        <div class="col-sm-6">
                                        
                                                <div class="form-group">
                                                    <label for="loginInputName">LAST NAME *</label>
                                                    <input type="text" name="name" v-model="lastName"  class="form-control" id="loginInputName" placeholder="Enter Last Name">
                                                    <div v-if="$v.lastName.$error">
                                                        <div class="alert alert-danger" role="alert" v-if="!$v.lastName.required">
                                                            Last Name is required.                                    
                                                        </div>
                                                        <div class="alert alert-danger" role="alert" v-if="!$v.lastName.minLength">
                                                            Last Name must have at least 2 words.                         
                                                        </div>
                                                    </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="loginInputPassword">E-MAIL *</label> 
                                                <input type="email" name="text" v-model="email" class="form-control" id="password" placeholder="Enter email" disabled>
                                                <div v-if="$v.email.$error">
                                                    <div class="alert alert-danger" role="alert" v-if="!$v.email.required">
                                                        Email is required.
                                                    </div>
                                                    <div class="alert alert-danger" role="alert" v-if="!$v.email.email">
                                                        Enter a proper email address.
                                                    </div>
                                                </div>
                                            </div>

                                                <div class="form-group">
                                                <label for="confirmInputPassword">ADDRESS *</label> 
                                                <input  type="text" name="text" v-model="address" class="form-control" id="confirmPassword" placeholder="Enter Address">
                                                <div v-if="$v.address.$error">
                                                    <div class="alert alert-danger" role="alert" v-if="!$v.address.required">
                                                        Address is required.                                    
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
                                    <span v-else @click="save()" type="submit" class="btn btn-primary mr-1 waves-effect waves-light">Save Settings</span>        
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
import { required, minLength, email, numeric} from 'vuelidate/lib/validators';

export default {
    name: "Settings",

     data()
    {
        return{
            firstName : "",
            lastName : "",
            email : "",
            phone : "",
            address : "",
            loading : false,
        }
    },

    mounted()
    {
        this.getUserDetails();
    },

    methods:{
        save()
        {
            this.$v.$touch();
            if (this.$v.$invalid) 
            {
                this.submitStatus  = 'ERROR'
            }
            else 
            {
                this.loading = true;

                Axios.post(process.env.MIX_APP_URL+'/updateprofile', { first_name: this.firstName, last_name: this.lastName, email: this.email, phone: this.phone, address : this.address,})
                .then(response => {
                    this.loading = false;
                    this.$snotify.success('Profile updated Successfully.', {
                        timeout: 3000,
                        showProgressBar: false,
                        closeOnClick: true,
                        pauseOnHover: true,
                        position : "rightTop"
                    });

                    this.firstName = response.data.first_name;  
                    this.lastName = response.data.last_name;  
                    this.email = response.data.email;  
                    this.phone = response.data.phone_number;  
                    this.address = response.data.address;  
                })
                .catch(error => {
                // console.error(error);
                });
            }
            
        },

        getUserDetails()
        {
            console.log('fetching');
            //  Axios.get(process.env.MIX_APP_URL+'/getprofiledetails')
            // .then(response => {
            //      this.firstName = response.data.first_name;
            //     this.lastName = response.data.last_name;
            //     this.email = response.data.email;
            //     this.phone = response.data.phone_number;
            //     this.address = response.data.address;
            // }).catch(error => {

            // });


            Axios.get('/get/profile/details').then(response => {
                // console.log(response.data);
                this.firstName = response.data.first_name;
                this.lastName = response.data.last_name;
                this.email = response.data.email;
                this.phone = response.data.phone_number;
                this.address = response.data.address;
            })
            .catch(error => {
            // console.error(error);
            });
        }
    },

     validations: {
        firstName: {
            required,
            minLength: minLength(2)
        },
          
          lastName: {
            required,
            minLength: minLength(2)
        },

        email: {
            required,
            email,
        },

          phone: {
            required,
            // numeric,
            minLength: minLength(11)     
         },

         address: {
            required,
        },
       
    },
}
</script>

<style>
</style>