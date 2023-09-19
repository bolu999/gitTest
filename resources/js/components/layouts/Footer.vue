<template>
  <div>
      
                       <div class="tt-footer-col tt-color-scheme-04">
               <div class="container">
                  <div class="row">
                     <!-- <div class="col-md-6 col-lg-2 col-xl-3">
                        <div class="tt-mobile-collapse">
                           <h4 class="tt-collapse-title" :class="categoryOpen ? 'tt-open' : ''" @click="categoryOpen = !categoryOpen">CATEGORIES</h4>
                           <div class="tt-collapse-content">
                              <ul class="tt-list">
                                 <li><a href="#">Women</a></li>
                                 <li><a href="#">Men</a></li>
                                 <li><a href="#">Accessories</a></li>
                                 <li><a href="#">Shoes</a></li>
                                 <li><a href="#">New Arrivals</a></li>
                                 <li><a href="#">Clearence</a></li>
                              </ul>
                           </div>
                        </div>
                     </div> -->
                     <div class="col-md-6 col-lg-2 col-xl-3">
                        <div class="tt-mobile-collapse">
                           <h4 class="tt-collapse-title" :class="departmentOpen ? 'tt-open' : ''" @click="departmentOpen = !departmentOpen">DEPARTMENTS</h4>
                           <div class="tt-collapse-content">
                              <ul class="tt-list">
                                 <li><router-link to="/Supermart">Supermart</router-link></li>
                                 <li><router-link to="/Luggagemaster">Luggage Master</router-link></li>
                                 <li><router-link to="/Orangecorner">Orange Corner</router-link></li>
                                 <!-- <li><router-link to="/Water-and-drink">Water & Drinks</router-link></li> -->
                                 <!-- <li><router-link to="/Fruits">Fruits</router-link></li> -->
                                 <li><router-link to="/Icecream">Ice Cream</router-link></li>
                                 <li><router-link to="/Shawarma-and-jollof">Shawarma & Party Jollof</router-link></li>
                                 <!-- <li><router-link to="/Phones">Phones</router-link></li> -->
                                 <li><router-link to="/Pharmacy">Pharmacy</router-link></li>
                              </ul>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-6 col-lg-4 col-xl-3">
                        <div class="tt-mobile-collapse">
                           <h4 class="tt-collapse-title" :class="aboutOpen ? 'tt-open' : ''" @click="aboutOpen = !aboutOpen">ABOUT</h4>
                           <div class="tt-collapse-content">
                              <p>{{ about }}</p>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-6 col-lg-4 col-xl-3">
                        <div class="tt-newsletter">
                           <div class="tt-mobile-collapse">
                              <h4 class="tt-collapse-title" :class="contactOpen ? 'tt-open' : ''" @click="contactOpen = !contactOpen">CONTACTS</h4>
                              <div class="tt-collapse-content">
                                 <address>
                                    <p><span>Phone:</span> {{ phoneNumber }}</p>
                                    <p><span>E-mail:</span> <a :href="email">{{ address }}</a></p>
                                 </address>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-6 col-lg-4 col-xl-3">
                        <div class="tt-newsletter">
                           <div class="tt-mobile-collapse">
                              <h4 class="tt-collapse-title" :class="contactOpen ? 'tt-open' : ''" @click="contactOpen = !contactOpen">ADDRESS</h4>
                              <div class="tt-collapse-content">
                                 <address>
                                    <p><span>Address:</span> {{ address }}</p>
                                    <p><span>Hours:</span> {{ work_hour }}</p>
                                 </address>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="tt-footer-custom tt-color-scheme-04">
               <div class="container">
                  <div class="tt-row">
                     <div class="tt-col-left">
                        <div class="tt-col-item tt-logo-col">
                           <!-- logo --> <a class="tt-logo tt-logo-alignment" href="/"><img data-src="images/custom/logo.png" alt=""> </a><!-- /logo -->
                        </div>
                        <div class="tt-col-item">
                           <!-- copyright -->
                           <div class="tt-box-copyright">&copy; 2K Supermart 2020. All Rights Reserved</div>
                           <!-- /copyright -->
                        </div>
                     </div>
                     <div class="tt-col-right">
                        <div class="tt-col-item">
                           <!-- payment-list -->
                           <ul class="tt-payment-list">
                              <li><a href="#"><span class="icon-Stripe"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span><span class="path7"></span><span class="path8"></span><span class="path9"></span><span class="path10"></span><span class="path11"></span><span class="path12"></span></span></a></li>
                              <li><a href="#"><span class="icon-paypal-2"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span></span></a></li>
                              <li><a href="#"><span class="icon-visa"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span></span></a></li>
                              <li><a href="#"><span class="icon-mastercard"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span><span class="path7"></span><span class="path8"></span><span class="path9"></span><span class="path10"></span><span class="path11"></span><span class="path12"></span><span class="path13"></span></span></a></li>
                              <li><a href="#"><span class="icon-discover"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span><span class="path7"></span><span class="path8"></span><span class="path9"></span><span class="path10"></span><span class="path11"></span><span class="path12"></span><span class="path13"></span><span class="path14"></span><span class="path15"></span><span class="path16"></span></span></a></li>
                              <li><a href="#"><span class="icon-american-express"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span><span class="path7"></span><span class="path8"></span><span class="path9"></span><span class="path10"></span><span class="path11"></span></span></a></li>
                           </ul>
                           <!-- /payment-list -->
                        </div>
                     </div>
                  </div>
               </div>
            </div>
  </div>
</template>

<script>
import Axios from "axios";
export default {
name:"Footer",
data(){
       return {         
         loading : false,
         address: null,
         phoneNumber: null,
         email : null,
         about : null,
         work_hour: null,
         categoryOpen : false,
         departmentOpen : false,
         aboutOpen : false,
         contactOpen : false,
       }
    },

    mounted()
    {
      this.getFooterData();
      this.loading = false;

    },

   methods : {
   
      getFooterData()
      {
         Axios.get(process.env.MIX_APP_URL+'/get/footer')
         .then(response => {
            this.address = response.data.address;
            this.phoneNumber = response.data.phone_number;
            this.email = response.data.email;
            this.about = response.data.about;
            this.about = response.data.footer_about;
            this.work_hour = response.data.work_hour;
         }).catch(error => {
            
         });
      }
   }

}
</script>

<style>

</style>