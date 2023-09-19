<template>
  <div>
      <div class="tt-breadcrumb">
         <div class="container">
            <ul>
               <li><a href="/">Home</a></li>
               <li>Contact</li>
            </ul>
         </div>
      </div>
      <div id="tt-pageContent">
         <div class="container-indent">
            <div class="container">
               <div class="contact-map">
                  <!-- <div id="map"></div> -->
                    <iframe width="100%" height="500" frameborder="0" src="https://maps.google.com/maps?q=69%20Alex%20Ekwueme%20Way%2C%20Kado%2C%20Abuja&t=&z=13&ie=UTF8&iwloc=&output=embed" marginwidth="0" marginheight="0" scrolling="no"></iframe>
               </div>
            </div>
         </div>
         <div class="container-indent">
            <div class="container container-fluid-custom-mobile-padding">
               <div class="tt-contact02-col-list">
                  <div class="row">
                     <div class="col-sm-12 col-md-4 ml-sm-auto mr-sm-auto">
                        <div class="tt-contact-info">
                           <i class="tt-icon icon-f-93"></i>
                           <h6 class="tt-title">GIVE US A CALL!</h6>
                           <address>(234) 815 237 2923</address>
                        </div>
                     </div>
                     <div class="col-sm-6 col-md-4">
                        <div class="tt-contact-info">
                           <i class="tt-icon icon-f-24"></i>
                           <h6 class="tt-title">VISIT OUR LOCATION</h6>
                           <address> 69 Alex Ekwueme Way, Kado, Abuja,<br>Nigeria.</address>
                        </div>
                     </div>
                     <div class="col-sm-6 col-md-4">
                        <div class="tt-contact-info">
                           <i class="tt-icon icon-f-92"></i>
                           <h6 class="tt-title">WORK TIME</h6>
                           <address>7 Days a week<br>9 AM to 10 PM</address>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="container-indent">
            <div class="container container-fluid-custom-mobile-padding">
            <div v-if="success" class="alert alert-success text-center" role="alert">
                  Message delivered successfully!                              
            </div>
               <form id="contactform" class="contact-form form-default" novalidate="novalidate">
                  <div class="row">
                     <div class="col-md-6">
                        <div class="form-group"><input type="text" v-model="name" name="name" class="form-control" id="inputName" placeholder="Your Full Name (required)"></div>
                         <div v-if="$v.name.$error">
                           <div class="alert alert-danger" role="alert" v-if="!$v.name.required">
                                 Full Name is required.                                    
                           </div>
                        </div>
                        <div class="form-group"><input type="text" v-model="email" name="email" class="form-control" id="inputEmail" placeholder="Your Email (required)"></div>
                        <div v-if="$v.email.$error">
                           <div class="alert alert-danger" role="alert" v-if="!$v.email.required">
                                 Email is required.                                    
                           </div>
                           <div class="alert alert-danger" role="alert" v-if="!$v.email.email">
                                 Enter a proper email.                                    
                           </div>
                        </div>
                        <div class="form-group"><input type="text" v-model="title" name="subject" class="form-control" id="inputSubject" placeholder="Subject (required)"></div>
                        <div v-if="$v.title.$error">
                           <div class="alert alert-danger" role="alert" v-if="!$v.title.required">
                                 Subject is required.                                    
                           </div>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <textarea name="message" v-model="message" class="form-control" rows="7" placeholder="Your Message (required)" id="textareaMessage"></textarea>
                           <div v-if="$v.message.$error">
                              <div class="alert alert-danger" role="alert" v-if="!$v.message.required">
                                    Message is required.                                    
                              </div>
                           </div>   
                        </div>
                     </div>
                  </div>
                  <div v-if="loading"  class="text-center"><button class="btn" disabled>SENDING...</button></div>
                  <div v-else class="text-center"><button class="btn" @click="sendMail">SEND MESSAGE</button></div>
               </form>
            </div>
         </div>
      </div>
   <vue-snotify></vue-snotify>
  </div>
</template>

<script>
import Axios from "axios";
import { required, email } from 'vuelidate/lib/validators';

export default {
   name : "Contactus",

   data(){
      return {
            name: '',
            title: '',
            email: '',
            message: '',
            loading: false,
            success: false,
      }
   },

   validations: {
      name: {
         required,
      },
      title: {
         required,
      },
      email: {
         required,
         email
      },
       message: {
         required,
      },
   },

   methods:{


      sendMail()
        {
            this.$v.$touch()
            if (this.$v.$invalid) 
            {
               this.submitStatus  = 'ERROR'
            }
            else 
            {
               this.loading = true;
               Axios.post(process.env.MIX_APP_URL+'/send/mail', {name : this.name, title : this.title, email: this.email, message : this.message})
               .then(response => {
                  if(response.data == true)
                  {
                     this.loading = false; 
                     this.success = true; 
                     this.message = '';
                     this.title = '';
                     this.email = '';
                     this.name = '';
                     this.$v.$reset()

                     this.$snotify.success('Message Sent!', {
                        timeout: 3000,
                        showProgressBar: true,
                        closeOnClick: false,
                        pauseOnHover: true,
                        position : "rightTop"
                    });
                    //clear form data....

                  }
               }).catch(error => {
                  
               });
            }

           
        },


   }

}
</script>

<style>

</style>