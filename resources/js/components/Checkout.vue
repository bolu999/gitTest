<template>
  <div>
      <div class="tt-breadcrumb">
         <div class="container">
            <ul>
                  <li><a href="/">Home</a></li>
               <li>Check Out</li>
            </ul>
         </div>
      </div>
      <div id="tt-pageContent">
         <div class="container-indent">
            <div class="container">
               <h1 class="tt-title-subpages noborder">CHECKOUT</h1>
               <div class="row">
                  <div class="col-sm-12 col-xl-8">
                     <div class="tt-shopcart-table">
                        
                        <table v-if="cart.length > 0">
                           <thead>
                               <tr >
                                 <td>
                                 </td>
                                 <td>
                                    <strong><b>Image</b></strong>  
                                 </td>
                                 <td>
                                    <strong><b>Product</b></strong>  
                                 </td>
                                  <td>
                                    <strong><b>Unit price</b></strong>  
                                 </td>
                                  <td class="text-center">
                                    <strong><b>Qty</b></strong>  
                                 </td>
                                  <td>
                                    <strong><b>Price</b></strong>  
                                 </td>
                                 <!-- <td>
                                    <strong><b>Price</b></strong>  
                                 </td> -->
                              </tr>
                           </thead>
                           <tbody>

                              <tr v-for="(cartitem, index) in cart" :key="index">
                                 <td><a href="javascript:void(0);" @click="removeFromCart(cartitem.product_id)" class="tt-btn-close"></a></td>
                                 <td>
                                    <div class="tt-product-img"><img :src="cartitem.product_image" :data-src="cartitem.product_image" alt=""></div>
                                 </td>
                                 <td>
                                    <h2 class="tt-title"><a href="#">{{ cartitem.product_name }}</a></h2>
                                    <ul class="tt-list-parameters">
                                       <li>
                                          <div v-if="cartitem.promotion == 0" class="tt-price">₦ {{ numberWithCommas(cartitem.product_price) }}</div>
                                          <div v-else class="tt-price">₦ {{ numberWithCommas(cartitem.promoPrice) }}</div>
                                       </li>
                                       
                                       <li>
                                          <div class="detach-quantity-mobile">
                                             <div class="tt-input-counter style-01"><span class="minus-btn" @click="cartitem.purchaseQty > 1 ? updateItemQuantity(cartitem.product_id, cartitem.purchaseQty - 1) : cartitem.purchaseQty = 1"></span> <input type="number" :value="getPrice(cartitem.purchaseQty * cartitem.product_qty)" min="1"> <span class="plus-btn" @click="cartitem.purchaseQty < cartitem.product_stock ? updateItemQuantity(cartitem.product_id, cartitem.purchaseQty + 1) : cartitem.purchaseQty = cartitem.product_stock"></span></div>                                             <!-- {{ cartitem.product_qty }} -->
                                          </div>
                                       </li>
                                       <li>
                                          <div v-if="cartitem.promotion == 0" class="tt-price subtotal">₦ {{ numberWithCommas(cartitem.product_price * cartitem.purchaseQty) }}</div>
                                          <div v-else class="tt-price subtotal">₦ {{ numberWithCommas(cartitem.promoPrice * cartitem.purchaseQty) }}</div>
                                       </li>
                                    </ul>
                                 </td>
                                 <td>
                                    <div  v-if="cartitem.promotion == 0" class="tt-price">₦ {{ numberWithCommas(cartitem.product_price) }}</div>
                                    <div v-else class="tt-price">₦ {{ numberWithCommas(cartitem.promoPrice) }}</div>
                                 </td>
                                 <td>
                                    <div class="detach-quantity-desctope">
                                       <div class="tt-input-counter style-01"><span class="minus-btn" @click="cartitem.purchaseQty > 1 ? updateItemQuantity(cartitem.product_id, cartitem.purchaseQty - 1) : cartitem.purchaseQty = 1"></span> 
                                          <input type="text" :value="getPrice(parseFloat(cartitem.purchaseQty) * parseFloat(cartitem.product_qty))" min="1"> 
                                       <span class="plus-btn" @click="cartitem.purchaseQty < cartitem.product_stock ? updateItemQuantity(cartitem.product_id, cartitem.purchaseQty + 1) : cartitem.purchaseQty = cartitem.product_stock"></span></div>
                                    </div>
                                 </td>
                                 <td>
                                    <div v-if="cartitem.promotion == 0" class="tt-price subtotal">₦ {{ numberWithCommas(cartitem.product_price * cartitem.purchaseQty) }}</div>
                                    <div v-else class="tt-price subtotal">₦ {{ numberWithCommas(cartitem.promoPrice * cartitem.purchaseQty) }}</div>
                                 </td>
                              </tr>

                               <tr >
                                 <td>
                                 </td>
                                 <td>
                                 </td>
                                  <td>
                                 </td>
                                  <td>
                                 </td>
                                  <td class="text-center">
                                     <strong><b>TOTAL:</b></strong>  
                                 </td>
                                 <td>
                                    <div class="tt-price subtotal">₦ {{ numberWithCommas(totalPrice) }}</div>
                                 </td>
                              </tr>

                           </tbody>
                          
                        </table>
                        <table v-else>
                           <tbody >
                               <tr>
                                   <td>
                                       No Item in your cart!
                                   </td>
                               </tr>
                           </tbody>                        
                        </table>
                        <div class="alert alert-success" role="alert" v-if="couponSuccess && totalPrice > 0">
                           Your coupon discount has been applied! {{ couponOffValue }} <button @click="removeCoupon()" class="close-icon">Remove Coupon</button>
                        </div>
                        <div class="tt-shopcart-btn">
                           <div class="col-left"><router-link to="/shop-listing" class="btn-link" ><i class="icon-e-19"></i>CONTINUE SHOPPING</router-link></div>
                           <div class="col-right"  v-if="cart.length > 0">
                               <a class="btn-link" href="javascript:void(0);" @click="clearCart()"><i class="icon-h-02"></i>CLEAR SHOPPING CART</a> 
                            <!-- <a class="btn-link" href="#"><i class="icon-h-48"></i>UPDATE CART</a> -->
                            </div>
                        </div>
                         <div v-if="totalPrice > 0" class="tt-shopcart-btn">
                              <div class="col-right" style="margin-top: 20px;">
                                 <label for="address_zip">Enter Coupon Code Here!</label>
                                 <div class="col-right">
                                    <input style="width: auto !important; display: inline;" type="text" v-model="coupon" name="text" class="form-control" placeholder="Coupon Code"> 
                                    <button style="margin-left: 0px" v-if="sending" type="submit" class="btn" disabled>Please wait...</button>
                                    <button style="margin-left: 0px"  v-else @click="applyCoupon(true)" class="btn">Apply Coupon</button>
                                 </div> 
                                 <div v-if="couponError">
                                    <div class="alert alert-danger" role="alert" v-if="!$v.address.required">
                                       {{couponErrorMessage}}
                                    </div>
                                 </div>
                              </div>                        
                           </div>
                     </div>
                  </div>
                  <div v-if="totalPrice > 0" class="col-sm-12 col-xl-4">
                     <div class="tt-shopcart-wrapper">
                        <div class="tt-shopcart-box">
                           <h4 class="tt-title">PAYMENT DETAILS</h4>
                           <!-- <p>Enter your destination to get a shipping estimate.</p> -->
                           <form class="form-default">
                            <div class="form-group" >
                                  <label for="address_zip">First Name<sup>*</sup></label> 
                                  <input v-model="firstName" type="text" v-model.trim="$v.firstName.$model" name="firstname" class="form-control" :class="{ 'is-invalid': $v.firstName.$error }" id="firstname" placeholder="First Name">
                                    <div v-if="$v.firstName.$error">
                                       <div class="alert alert-danger" role="alert" v-if="!$v.firstName.required">
                                          First Name is required.                                    
                                       </div>
                                       <div class="alert alert-danger" role="alert" v-if="!$v.firstName.minLength">
                                          First Name must have at least {{$v.firstName.$params.minLength.min}} letters.                         
                                       </div>
                                    </div>
                            </div>

                            <div class="form-group">
                                  <label for="address_zip">Last Name<sup>*</sup></label> 
                                  <input v-model="lastName" type="text" name="lastname" class="form-control" id="lastname" placeholder="Last Name">
                                 <div v-if="$v.lastName.$error">
                                      <div class="alert alert-danger" role="alert" v-if="!$v.lastName.required">
                                          Last Name is required.                                    
                                       </div>
                                       <div class="alert alert-danger" role="alert" v-if="!$v.lastName.minLength">
                                          Last Name must have at least {{$v.lastName.$params.minLength.min}} characters.                         
                                       </div>
                                   </div>
                            </div>

                            <div class="form-group">
                                  <label for="address_zip">Email Address<sup>*</sup></label> 
                                  <input v-model="email" type="email" name="email" class="form-control" id="email" placeholder="Email Address">
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
                                  <label for="address_zip">Phone Number<sup>*</sup></label> 
                                  <input v-model="phoneNumber" type="text" name="phone" class="form-control" id="phone" placeholder="Phone Number">
                                 <div v-if="$v.phoneNumber.$error">
                                      <div class="alert alert-danger" role="alert" v-if="!$v.phoneNumber.required">
                                          Phone number is required.                                    
                                       </div>
                                       <!-- <div class="alert alert-danger" role="alert" v-if="!$v.phoneNumber.numeric">
                                          Must contain only numbers.                       
                                       </div> -->
                                       <div class="alert alert-danger" role="alert" v-if="!$v.phoneNumber.minLength">
                                          Phone number must have at least {{$v.phoneNumber.$params.minLength.min}} numbers.                         
                                       </div>
                                       <!-- <div class="error" v-if="!$v.firstName.minLength">Name must have at least </div> -->
                                   </div>
                            </div>
                              <!-- <a href="#" class="btn btn-border">CALCULATE SHIPPING</a> -->
                              <!-- <p>There is one shipping rate available for Alabama, Tanzania, United Republic Of.</p> -->
                              <!-- <ul class="tt-list-dot list-dot-large">
                                 <li><a href="#">International Shipping at ₦20.00</a></li>
                              </ul> -->
                           </form>
                        </div>
                        <div class="tt-shopcart-box">
                           <!-- <h4 class="tt-title">NOTE</h4> -->
                           <p>Address<sup>*</sup></p>
                           <form class="form-default">
                               <textarea v-model="address" class="form-control" name="address" placeholder="Address" rows="4"></textarea>
                               <div v-if="$v.address.$error">
                                      <div class="alert alert-danger" role="alert" v-if="!$v.address.required">
                                          Address is required
                                       </div>
                                   </div>
                            </form>
                        </div>
                        <div class="tt-shopcart-box tt-boredr-large">
                           <table class="tt-shopcart-table01">
                              <!-- <tbody>
                                 <tr>
                                    <th>SUBTOTAL</th>
                                    <td>₦324</td>
                                 </tr>
                              </tbody> -->
                              <tfoot>
                                 <tr>
                                    <th>GRAND TOTAL</th>
                                    <td>₦{{ numberWithCommas(totalPrice)}}</td>
                                 </tr>
                              </tfoot>
                           </table>
                           <a href="javascript:void(0);" @click="makePayment()" class="btn btn-lg"><span class="icon icon-check_circle"></span>MAKE PAYMENT</a>
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

class payment {

   Pay(email,  totalPrice, firstname, lastname, address, phone, data, coupon, key)
   {
      var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
      data = JSON.stringify(data);
      var handler = PaystackPop.setup({
      key: key,
      email: email,
      amount: totalPrice * 100,
      currency: "NGN",
      ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
      metadata: {
         custom_fields: [
            {
               display_name: "Mobile Number",
               variable_name: "mobile_number",
               value: "+23408152372923"
            }
         ]
      },
      callback: function(response){
		      document.getElementById("overlay").style.display = "block";

            $.ajax({
            /* the route pointing to the post function */
            url: '/verify',
            type: 'POST',
            

            data: {reference:response.reference, transId: response.transaction, firstName: firstname, lastName: lastname, email: email, address: address, amount: totalPrice, phone: phone, cart: data, _token: CSRF_TOKEN, coupon: coupon},
            dataType: 'JSON',


            success: function (data) { 
               window.location.href = "/#/receipt/"+response.reference;
            }
         })
         .done(function(data){
               window.location.href = "/#/receipt/"+response.reference;
            })
            .fail(function (errorThrown) { 
         }); 
      },
      onClose: function(){
      }
   });
   handler.openIframe();
      
   }
}

export default {
    name:'checkout',
      data ()
      {
         return {
            cart : [],
            totalPrice: 0,
            firstName : null,
            lastName : null,
            email : null,
            phoneNumber : null,
            address : null,
            payment : new payment,
            isLoggedIn : false,
            coupon : '',
            discounted : false,
            discount_value : 0,
            discount_type : '',
            couponError : false,
            couponSuccess : false,
            couponErrorMessage : '',
            sending : false,
            couponOffValue: '',
         }
      },

      computed:
      {
         updateCart () {
         return this.$store.getters.total;
         },

         couponErrorFunction()
         {
            return this.coupon;
         }
      },

      watch: {
         updateCart (newCount, oldCount) {
         this.totalPrice = this.$store.getters.total;
         this.cart = this.$store.getters.inCart;
         },

         couponErrorFunction()
         {
            if(this.couponError == true)
            {
               this.couponError = false;
            }
         }
      },

      mounted()
      {
         this.cart = this.$store.getters.inCart;
         this.totalPrice = this.$store.getters.total;
         this.checkLogin();
         this.init();
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
            phoneNumber: {
               required,
               // numeric,
               minLength: minLength(11)     
            },
            email: {
               required,
               email,
            },
            address: {
               required,
            },
         },

         // updated(){
         //    this.couponError = false;
         // },
         
    methods : {

       init()
       {
         let coupons = this.$store.getters.coupons; 
         if(coupons.length > 0)
         {
            this.coupon = coupons[0];
            this.applyCoupon(false);
         }
       },

       removeCoupon()
       {
         this.$confirm("You are about to remove this discount! Proceed?").then(() => {
            //do something...
            this.discounted = false;
            this.couponError = false;
            this.couponSuccess = false;
            this.coupon = '';
            this.discount_value = '';
            this.discount_type = 0;  
            this.cart = this.$store.getters.inCart;
            this.totalPrice = this.$store.getters.total;         
            this.$store.dispatch('removeCoupon', this.coupon);
         });
        
       },

       calculateDiscountedPrice()
       {
          this.couponSuccess = true;
          if(this.discount_type == 'percentage')
          {
            // this.cart = this.$store.getters.inCart;
             this.couponOffValue = '₦'+this.totalPrice * (this.discount_value / 100) + ' Off';
             this.totalPrice = this.totalPrice - this.totalPrice * (this.discount_value / 100);
          }
          else if(this.discount_type == 'value')
          {
             this.couponOffValue = '₦'+this.discount_value + ' Off';
             this.totalPrice = this.totalPrice - this.discount_value;
          }
       },

         applyCoupon(pass)
         {
            this.couponError = false;

            if(this.coupon != '')
            {
               let coupons = this.$store.getters.coupons;
               if(coupons.includes(this.coupon) && pass)
               {
                  this.$snotify.error('You have applied this coupon code', {
                        timeout: 5000,
                        showProgressBar: true,
                        closeOnClick: false,
                        pauseOnHover: true,
                        position : "rightTop"
                  });               
               }
               else if(coupons.length > 0 && pass)
               {
                  this.$snotify.error('You have applied a coupon code to this purchase', {
                        timeout: 5000,
                        showProgressBar: true,
                        closeOnClick: false,
                        pauseOnHover: true,
                        position : "rightTop"
                  });   
               }
               else
               {
                  this.sending = true;
                  Axios.get(process.env.MIX_APP_URL+'/apply/coupon/'+this.coupon)
                  .then(response => {
                  if(response.data.status == true)
                  {
                     this.discounted = true;
                     this.couponError = false;
                     this.discount_value = response.data.value;
                     this.discount_type = response.data.type;
                     this.sending = false;
                     this.applyCouponValue();

                     this.calculateDiscountedPrice();

                     this.$snotify.success('Coupon Applied Successful!', {
                           timeout: 5000,
                           showProgressBar: true,
                           closeOnClick: false,
                           pauseOnHover: true,
                           position : "rightTop"
                     });
                  }
                  else
                  {
                     this.$snotify.error(response.data.message, {
                           timeout: 5000,
                           showProgressBar: true,
                           closeOnClick: false,
                           pauseOnHover: true,
                           position : "rightTop"
                     });
                     this.sending = false;
                  }
               });
               }
            }
            else
            {
                this.$snotify.error('Enter a coupon', {
                           timeout: 5000,
                           showProgressBar: true,
                           closeOnClick: false,
                           pauseOnHover: true,
                           position : "rightTop"
                     });
            }
         },

         checkLogin()
         {
            Axios.get(process.env.MIX_APP_URL+'/checklogin')
            .then(response => {               
               this.isLoggedIn = response.data.isLoggedIn;
               if(this.isLoggedIn)
               {
                  this.setFields(response.data.user);
               }
            })
            .catch(error => {
            // console.error(error);
            });
         },

         setFields(user){
            if(user.first_name != '')
            {
               this.firstName = user.first_name;
            }

            if(user.last_name != '')
            {
               this.lastName = user.last_name;
            }

            if(user.address != '')
            {
               this.address = user.address;
            }

            if(user.email != '')
            {
               this.email = user.email;
            }

            if(user.phone_number != '')
            {
               this.phoneNumber = user.phone_number;
            }
         },

        getPrice(product_qty)
        {
            if(product_qty != 0)
            {
               // console.log(parseFloat(product_qty));
               this.cart = this.$store.getters.inCart;
               return parseFloat(product_qty);
            }
        },
        
        numberWithCommas(x) {
         return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        },

         removeFromCart(id) {
         this.$store.dispatch('removeFromCart', id);
        },

        updateItemQuantity(id, qty)
        {
            this.$store.dispatch('updateCart', {product_id : id,  purchaseQty: qty});
        },

        applyCouponValue()
        {
            this.$store.dispatch('applyCoupon', this.coupon);
        },

         clearCart() {
               this.$confirm("Are you sure you would like to clear your cart?").then(() => {
               //do something...
               this.$store.dispatch('clearTheCart', this.totalPrice);
               this.cart = this.$store.getters.inCart;
               this.coupon = '';
               this.couponSuccess = false;
               this.totalPrice = this.$store.getters.total; 
            });
        },

        makePayment()
        {
            this.$v.$touch()
            if (this.$v.$invalid) 
            {
               this.submitStatus  = 'ERROR'
            }
            else 
            {
               this.payment.Pay(this.email, this.totalPrice, this.firstName, this.lastName, this.address, this.phoneNumber, {...this.cart}, this.coupon, process.env.MIX_PK_KEY);
            }
        }
    }
}
</script>

<style>

/* Chrome, Safari, Edge, Opera */
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
}
</style>