<template>
  <div>
      <div class="tt-breadcrumb">
         <div class="container">
            <ul>
               <li><a href="index-2.html">Home</a></li>
               <li>Create An Account</li>
            </ul>
         </div>
      </div>
      <div id="tt-pageContent">
         <div class="container-indent">
            <div class="container">
               <h1 class="tt-title-subpages noborder">CREATE AN ACCOUNT</h1>
               <div class="tt-login-form">
                  <div class="row justify-content-center">
                     <div class="col-md-8 col-lg-6">
                        <div class="tt-item">
                           <h2 class="tt-title">PERSONAL INFORMATION</h2>
                           <div class="form-default">
                              <form novalidate="novalidate">
                                 <div class="form-group">
                                    <label for="loginName">FIRST NAME *</label>
                                    <div class="tt-required">* Required Fields</div>
                                    <input type="text" name="name" v-model="firstName" class="form-control" id="loginInputName" placeholder="Enter First Name">
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
                                    <label for="loginInput">LAST NAME *</label>
                                    <div class="tt-required">* Required Fields</div>
                                    <input type="text" name="name" v-model="lastName" class="form-control" id="InputName" placeholder="Enter Last Name">
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
                                    <label for="loginInputEmail">E-MAIL *</label> 
                                    <input type="text" v-model="email" name="email" class="form-control" id="loginInputEmail" placeholder="Enter E-mail">
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
                                    <label for="loginInputPassword">PASSWORD *</label> 
                                    <input type="password" name="passowrd" v-model="password" class="form-control" id="password" placeholder="Enter Password">
                                    <div v-if="$v.password.$error">
                                      <div class="alert alert-danger" role="alert" v-if="!$v.password.required">
                                          Password is required.                                    
                                       </div>
                                       <div class="alert alert-danger" role="alert" v-if="!$v.password.minLength">
                                          Password must have at least {{$v.password.$params.minLength.min}} characters.                         
                                       </div>
                                   </div>
                                 </div>
                                 
                                 <div class="form-group">
                                    <label for="confirmInputPassword">CONFIRM PASSWORD *</label> 
                                    <input  type="password" name="passowrd" v-model="password_confirmation" class="form-control" id="confirmPassword" placeholder="Confirm Password">
                                    <div v-if="$v.password_confirmation.$error">
                                      <div class="alert alert-danger" role="alert" v-if="!$v.password_confirmation.required">
                                          Password confirmation is required.                                    
                                       </div>
                                       <div class="alert alert-danger" role="alert" v-if="!$v.password_confirmation.minLength">
                                          Password confirmation must have at least {{$v.password_confirmation.$params.minLength.min}} characters.                         
                                       </div>
                                   </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-auto">
                                       <div v-if="loading" class="form-group"><button disabled class="btn btn-border" >Please Wait...<div  class="loader"></div></button></div>
                                       <div v-else class="form-group"><span class="btn btn-border" @click="signup()">Create<div></div></span></div>
                                    </div>
                                    <div class="col-auto align-self-center">
                                       <div class="form-group">
                                          <ul class="additional-links">
                                             <li>or <router-link to="/shop-listing">Return to Store</router-link></li>
                                          </ul>
                                       </div>
                                    </div>
                                 </div>
                              </form>
                           </div>
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
name: "signup",

   data()
    {
        return{
            firstName : "",
            lastName : "",
            email : "",
            password : "",
            password_confirmation : "",
            loading  : false,
        }
    },

    methods:{
        signup()
        {
         this.$v.$touch();
         if (this.$v.$invalid) 
         {
            this.submitStatus  = 'ERROR'
         }
         else 
         {
            if(this.password == this.password_confirmation)
            {
               // e.preventDefault()
               // document.getElementById("overlay").style.display = "block";
               this.loading = true;
   
               Axios.post(process.env.MIX_APP_URL+'/register', 
               {
               first_name: this.firstName,
               last_name: this.lastName,
               email: this.email,
               password: this.password,
               c_password : this.password_confirmation
               }) .then(response => {
                  if(response.data.status == true)
                  {
                     this.$snotify.success('Signup Successful.', {
                        timeout: 3000,
                        showProgressBar: false,
                        closeOnClick: true,
                        pauseOnHover: true,
                        position : "rightTop"
                     });
                     this.loading = false;
                     document.getElementById("overlay").style.display = "none";
                     this.$router.push('/login/1'); 
                  }
                  else
                  {
                     document.getElementById("overlay").style.display = "none";
                     this.loading = false;
                     this.$snotify.error('Signup Un-successful.', {
                        timeout: 6000,
                        showProgressBar: true,
                        closeOnClick: false,
                        pauseOnHover: true,
                        position : "rightTop"
                     });
                  }
               })
               .catch(error => {
                     document.getElementById("overlay").style.display = "none";
                     this.loading = false;
                     this.$snotify.error('Signup Un-successful.', {
                     timeout: 6000,
                     showProgressBar: true,
                     closeOnClick: false,
                     pauseOnHover: true,
                     position : "rightTop"
                  });
               });
            }
         }
            
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

         password: {
            required,
            minLength: minLength(5)
        },

         password_confirmation: {
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