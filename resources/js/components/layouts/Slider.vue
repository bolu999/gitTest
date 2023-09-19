<template>
        <div class="container-indent nomargin" v-if="!loading">
            <div class="container-fluid">
               <div class="row">
                  <div class="slider-revolution revolution-default">
                     <div class="tp-banner-container dd" style="max-height: unset; overflow: visible;"> <!-- put height in mediaquery for only widescreen -->
                        <div class="tp-banner revolution">
                           <ul>
                              <li data-thumb="images/slides/08/slide-01.jpg" data-transition="fade" data-slotamount="1" data-masterspeed="1000" data-saveperformance="off" data-title="Slide">
                                 <img src="images/slides/08/slide-0.jpg" alt="slide1" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat">
                                 <div class="tp-caption tp-caption1 lft stb"  data-x="900" data-y="center" data-hoffset="0" data-voffset="0" data-speed="600" data-start="900" data-easing="Power4.easeOut" data-endeasing="Power4.easeIn" style="left: 900px; !important">
                                    <div class="tp-caption1-wd-2 tt-white-color text-right" style="font-weight: 800">{{ banner1.title }}</div>
                                    <div class="tp-caption1-wd-1 tt-white-color text-right" >{{ banner1.content_1 }}<br>{{ banner1.content_2 }}</div>
                                    <!-- <div class="tp-caption1-wd-3 tt-red-color">and below</div> -->
                                    <div class="tp-caption1-wd-4"><router-link to="/shop-listing" style="float: right;" class="btn btn-xl" data-text="SHOP NOW!">SHOP NOW!</router-link></div>
                                 </div>
                              </li>
                               <li data-thumb="images/slides/08/slide-01.jpg" data-transition="fade" data-slotamount="1" data-masterspeed="1000" data-saveperformance="off" data-title="Slide">
                                 <img src="images/slides/08/slide-02.jpg" alt="slide1" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat">
                                 <div class="tp-caption tp-caption1 lft stb"  data-x="200" data-y="center" data-hoffset="0" data-voffset="0" data-speed="600" data-start="900" data-easing="Power4.easeOut" data-endeasing="Power4.easeIn" style="left: 900px; !important">
                                    <div class="tp-caption1-wd-2 tt-white-color text-left" style="font-weight: 800">{{ banner2.title }}</div>
                                    <div class="tp-caption1-wd-1 tt-white-color text-left" >{{ banner2.content_1 }}<br>{{ banner2.content_2 }}</div>
                                    <!-- <div class="tp-caption1-wd-3 tt-red-color">and below</div> -->
                                    <div class="tp-caption1-wd-4"><router-link to="/shop-listing" style="float: left;" class="btn btn-xl" data-text="SHOP NOW!">SHOP NOW!</router-link></div>
                                 </div>
                              </li>
                              <!-- <li data-thumb="images/slides/08/slide-02.jpg" data-transition="fade" data-slotamount="1" data-masterspeed="1000" data-saveperformance="off" data-title="Slide">
                                 <img src="images/slides/08/slide-02.jpg" alt="slide1" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat">
                                 <div class="tp-caption tp-caption1 lft stb" data-x="center" data-y="center" data-hoffset="0" data-voffset="0" data-speed="600" data-start="900" data-easing="Power4.easeOut" data-endeasing="Power4.easeIn">
                                    <div class="tp-caption1-wd-1 tt-white-color">Your</div>
                                    <div class="tp-caption1-wd-2 tt-white-color">Number 1<br></div>
                                    <div class="tp-caption1-wd-1 tt-white-color">Online Shopping Platform</div>

                                    <div class="tp-caption1-wd-4"><a href="#" class="btn btn-xl" data-text="SHOP NOW!">SHOP NOW!</a></div>
                                 </div>
                              </li>
                              <li data-thumb="images/slides/08/slide-03.jpg" data-transition="fade" data-slotamount="1" data-masterspeed="1000" data-saveperformance="off" data-title="Slide">
                                 <img src="images/slides/08/slide-01.jpg" alt="slide1" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat">
                                 <div class="tp-caption tp-caption1 lft stb" data-x="center" data-y="center" data-hoffset="0" data-voffset="0" data-speed="600" data-start="900" data-easing="Power4.easeOut" data-endeasing="Power4.easeIn">
                                    <div class="tp-caption1-wd-1 tt-base-color">Multipurpose</div>
                                    <div class="tp-caption1-wd-2" style="color: #ff9c03">Premium<br>Html Template</div>
                                    <div class="tp-caption1-wd-3 tt-white-color">30 skins, powerful features, great support, exclusive offer</div>
                                    <div class="tp-caption1-wd-4"><a href="#" class="btn btn-xl" data-text="SHOP NOW!">SHOP NOW!</a></div>
                                 </div>
                              </li> -->
                           </ul>
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
name:"Slider",


data(){
       return {
          banner1 : {

          },
         banner2 : {

          },
          loading : false,
       }
    },

    mounted()
    {
      this.getSliderData();
      this.loading = false;

    },

   methods : {
   
      getSliderData()
      {
         Axios.get(process.env.MIX_APP_URL+'/get/banner')
         .then(response => {            
            this.banner1 = response.data['0'];
            this.banner2 = response.data['1'];
            this.loading = false;
         }).catch(error => {
            
         });
      }
   }

}
</script>

<style>

</style>