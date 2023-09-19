<template>
  <div>
       <div class="tt-breadcrumb">
         <div class="container">
            <ul>
               <li><a href="index-2.html">Home</a></li>
               <li>Login</li>
            </ul>
         </div>
      </div>
      <div id="tt-pageContent">
         <div class="container-indent">
            <div class="container">
               <h1 class="tt-title-subpages noborder">ALREADY REGISTERED?</h1>
               <div class="tt-login-form">
                   <div class="alert alert-success text-center" role="alert" v-if="showSnot">
                           Registration Successful!
                        </div>
                  <div class="row">
                     <div class="col-xs-12 col-md-6">
                        <div class="tt-item">
                           <h2 class="tt-title">LOGIN</h2>
                           If you have an account with us, please log in.
                           <div class="form-default form-top">
                              <form novalidate="novalidate">
                                 <div class="form-group">
                                    <label for="loginInputName">E-MAIL *</label>
                                    <div class="tt-required">* Required Fields</div>
                                    <input type="text" v-model="email" name="email" class="form-control" id="loginInputName" placeholder="E-mail">
                                    <div v-if="$v.email.$error">
                                      <div class="alert alert-danger" role="alert" v-if="!$v.email.required">
                                          Email is required.
                                       </div>
                                       <div class="alert alert-danger" role="alert" v-if="!$v.email.email">
                                          Enter a proper email address.
                                       </div>
                                       <!-- <div class="error" v-if="!$v.firstName.minLength">Name must have at least </div> -->
                                    </div>
                                 </div>
                                 <div class="form-group">
                                    <label for="loginInputEmail">PASSWORD *</label> 
                                    <input v-model="password" type="password" name="passowrd" class="form-control" id="password" placeholder="Enter Password">
                                    <div v-if="$v.password.$error">
                                      <div class="alert alert-danger" role="alert" v-if="!$v.password.required">
                                          Password is required.
                                       </div>
                                       <div class="alert alert-danger" role="alert" v-if="!$v.password.minLength">
                                          Password must be greater than 5 characters.
                                       </div>
                                       <!-- <div class="error" v-if="!$v.firstName.minLength">Name must have at least </div> -->
                                     </div>
                                 </div>
                                    <!-- </div> -->
                                    <div class="row">
                                    <div class="col-auto mr-auto">
                                       
                                       <div v-if="loading" class="form-group"><button disabled class="btn btn-border" >Please Wait...<div  class="loader"></div></button></div>
                                       <div v-else class="form-group"><span class="btn btn-border" @click="login()">LOGIN</span></div>
                                       <!-- <div  class="form-group"><span class="btn btn-border" @click="signup()">Create<div></div></span></div> -->
                                    </div>
                                    <div class="col-auto align-self-end">
                                       <div class="form-group">
                                          <ul class="additional-links">
                                             <!-- <li><a href="#">Lost your password?</a></li> -->
                                          </ul>
                                       </div>
                                    </div>
                                 </div>
                              </form>
                           </div>
                        </div>
                     </div>
                     <div class="col-xs-12 col-md-6">
                     <div class="tt-item">
                        <h2 class="tt-title">NEW CUSTOMER</h2>
                        <p>By creating an account with our store, you will be able to move through the checkout process faster, have a wishlist collection, view your orders in your account and more.</p>
                        <div class="form-group"><router-link to="/signup" class="btn btn-top btn-border">CREATE AN ACCOUNT</router-link></div>
                     </div>
                  </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
       <vue-snotify></vue-snotify>
  </div>
</template>

<script>
import Axios from "axios";
import { required, minLength, email, numeric} from 'vuelidate/lib/validators';

export default {
name: 'login',

    data()
    {
        return{
            email : null,
            password : null,
            loading  : false,
            showSnot : false,
        }
    },

    mounted()
    {
      if(this.$route.params.from == "1")
      {
         this.showSnot = true;
         // this.$snotify.success('Signup Successful.', {
         //    timeout: 6000,
         //    showProgressBar: false,
         //    closeOnClick: true,
         //    pauseOnHover: true,
         //    position : "rightTop"
         // });
      }
    },

    methods:{

        login()
        {
         this.$v.$touch()
         if (this.$v.$invalid) 
         {
            this.submitStatus  = 'ERROR'
         }
         else 
         {
            this.loading = true;
            Axios.post(process.env.MIX_APP_URL+'/login', {
               email: this.email,
               password: this.password          
            })
            .then(response => {
               // console.log(response.data);
               
               if(response.data.email == this.email)
               {
                   this.$snotify.success('Login Successful.', {
                     timeout: 3000,
                     showProgressBar: false,
                     closeOnClick: true,
                     pauseOnHover: true,
                     position : "rightTop"
                  });
                  if(response.data.isAdmin == 1)
                  {
                     this.$store.dispatch('setRole', 1);
                     location.href = "/user";
                  }
                  else
                  {
                     this.$store.dispatch('setRole', 0);
                     location.href = "/user#/dashboard";
                  }
               }
               else
               {
                  this.loading = false;
                  this.$snotify.error('Login attempt failed.', {
                  timeout: 6000,
                  showProgressBar: true,
                  closeOnClick: false,
                  pauseOnHover: true,
                  position : "rightTop"
                  });
               }
                  
            })
            .catch(function (error) {
               this.loading = false;

               // this.$snotify.error('Login attempt failed.', {
               // timeout: 6000,
               // showProgressBar: true,
               // closeOnClick: false,
               // pauseOnHover: true,
               // position : "rightTop"
               // });
            });            
         }
            
      }
    },

     validations: {
          email: {
            required,
            email,
         },
         password: {
            required,
            minLength: minLength(5)     
         },

         },

}
</script>

<style scoped>
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