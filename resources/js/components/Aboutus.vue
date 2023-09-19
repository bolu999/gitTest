<template>
  <div>
    <div class="tt-breadcrumb">
        <div class="container">
          <ul>
              <li><a href="/">Home</a></li>
              <li>About</li>
          </ul>
        </div>
      </div>
      <div id="tt-pageContent">
         <div class="nomargin container-indent">
            <div class="tt-about-box" style="background-image: url(images/custom/about-img-01.jpg);">
               <img class="img-mobile" src="images/custom/about-img-01.jpg" alt="">
               <div class="container">
                  <div class="row">
                     <div class="col-md-7">
                        <h1 class="tt-title">"2K SUPERMART"</h1>
                        <p>2k supermart is a family oriented discount store that sells everything for N2,000 and below.
                           It’s the first of its kind in Nigeria to sell Beverages, Health and Beauty Products, Cleaning Products, Toys, Stationery, Footwear and Clothing all N2,000 and below under one roof.</p>
                        <br>
                        <p>The flagship 2k plaza is located at 69 Alex Ekwueme Way, Kado Estate, Abuja. It comprises of a Phone Shop, Shawarma & Party Jollof Rice Stand, Smoothie & Sugar Cane Juice Stand, Ice Cream Shop, Farmer’s Market, Luggage Masters Shop, Pharmacy and Orange Discount Corner.</p>
                        <blockquote class="tt-blockquote-02">
                           <i class="tt-icon icon-g-56"></i>
                           <div class="tt-title"></div>
                           <div class="tt-title-description">— Manager</div>
                        </blockquote>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="container-indent">
            <div class="container">
               <div class="tt-about-col-list">
                  <div class="row">
                     <div class="col-md-6">
                        <h5 class="tt-title">DEPARTMENTS</h5>
                        <div class="width-90">
                          <ul>
                             <li><router-link to="/Supermart">Supermart</router-link></li>
                                 <li><router-link to="/Luggagemaster">Luggage Master</router-link></li>
                                 <li><router-link to="/Orangecorner">Orange Corner</router-link></li>
                                 <li><router-link to="/Water-and-drink">Water & Drinks</router-link></li>
                                 <li><router-link to="/Fruits">Fruits</router-link></li>
                                 <li><router-link to="/Icecream">Ice Cream</router-link></li>
                                 <li><router-link to="/Shawarma-and-jollof">Shawarma & Party Jollof</router-link></li>
                                 <li><router-link to="/Phones">Phones</router-link></li>
                                 <li><router-link to="/Pharmacy">Pharmacy</router-link></li>
                          </ul>
                        </div>

                     </div>
                     <div class="col-md-6">
                        <h5 class="tt-title">CONTACTS</h5>
                        <div class="tt-box-info">
                           <p><span class="tt-base-dark-color">Address:</span> 69 Alex Ekwueme Way, Kado, Abuja,<br>Nigeria</p>
                           <p><span class="tt-base-dark-color">Phone:</span> (234) 815 237 2923</p>
                           <p><span class="tt-base-dark-color">Hours:</span> 7 Days a week from 9 am to 10 pm</p>
                           <p><span class="tt-base-dark-color">E-mail:</span> <a class="link" href="mailto:info@mydomain.com">info@mydomain.com</a></p>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- <footer >

            <footer-component></footer-component>
      </footer> -->

  </div>
</template>

<script>
export default {
    name : "Aboutus"
}
</script>

<style>

</style>