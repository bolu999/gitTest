/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
import Vue from 'vue';
import router from "./router";
import store from "./store";
import Snotify from 'vue-snotify';
import 'vue-snotify/styles/simple.css';
import Vuelidate from 'vuelidate';
import VueSimpleAlert from "vue-simple-alert";
import StarRating from 'vue-star-rating'
// import { Plugin } from 'vue-submit'

// import VueSubmit from './vue-submit.min.js'

// Vue.component('vue-submit', VueSubmit)
// import Axios from "axios";
// import vueResource from 'vue-resource';
// import VueAxios from "vue-axios";
// 2. Use Snotify
// You can pass {config, options} as second argument. See the next example or setConfig in [API] section 

window.Vue = require('vue');

Vue.use(Snotify)
Vue.use(VueSimpleAlert);
Vue.use(Vuelidate)
// Vue.use(Plugin)

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Vue.use(Axios);
// Vue.use(vueResource);

Vue.component('footer-component', require('./components/layouts/Footer.vue').default);
Vue.component('slider-component', require('./components/layouts/Slider.vue').default);
Vue.component('cart-component', require('./components/layouts/Cart.vue').default);
Vue.component('star-rating', StarRating);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */



const app = new Vue({
    el: '#app',
    router,
    store,
    watch:{
        '$route' (to) {            
            if(to.meta !== undefined)
            {
                if(to.meta.reload==true)
                {window.location.reload()}
            }
        
            if(to.meta.isAdmin == true)
            {
                if(this.$store.getters.role == 1)
                {
                //   window.location.href = process.env.MIX_APP_URL+'/user#/admin';
                //   next('admin');
                }
                else
                {
                  window.location.href = process.env.MIX_APP_URL+'/user#/dashboard';
                //   next('admin');
                }
            }
       }
    },
    beforeCreate() {
		this.$store.commit('initialiseStore');
	}
});
$("#myBtn").on("click", function(){
    $("body").toggleClass("sidebar-enable");
});

$(".closemenu").on("click", function(){
    $("body").toggleClass("sidebar-enable");
});

$("#openFilter").on("click", function(){    
    $("#js-leftColumn-aside").toggleClass("column-open ps-container ps-theme-default ps-active-y");
});

$(".tt-btn-col-close").on("click", function(){    
    $("#js-leftColumn-aside").toggleClass("column-open ps-container ps-theme-default ps-active-y");
});

$(".closeFilter").on("click", function(){    
    $("#js-leftColumn-aside").toggleClass("column-open ps-container ps-theme-default ps-active-y");
});

$(".closeAuthMenu").on("click", function(){   
    $("body").toggleClass("tt-popup-dropdown");
    $(".tt-account").toggleClass("active");
});

$(".closeWishMenu").on("click", function(){   
    $("body").toggleClass("tt-popup-dropdown");
    $(".tt-account").toggleClass("active");
});

$(".s-item").on("click", function(){   
    document.getElementsByClassName("signup-dd")[0].style.display = "none";
});
