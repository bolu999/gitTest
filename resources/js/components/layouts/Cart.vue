<template>
  <div class="tt-desctop-parent-cart tt-parent-box">
            <div class="tt-cart tt-dropdown-obj" id="ttcart" data-tooltip="Cart" data-tposition="bottom">
                <button class="tt-dropdown-toggle"><i class="icon-f-39"></i> <span class="tt-badge-cart">{{ cart.length }}</span></button>
                <div class="tt-dropdown-menu" id="carttoggle">
                    <div class="tt-mobile-add">
                        <h6 class="tt-title">SHOPPING CART</h6>
                        <button class="tt-close">Close</button>
                    </div>
                    <div class="tt-dropdown-inner">
                        <div class="tt-cart-layout">
                        <!-- layout emty cart --><!-- <a href="empty-cart.html" class="tt-cart-empty">
                            <i class="icon-f-39"></i>
                            <p>No Products in the Cart</p>
                            </a> -->
                        <div class="tt-cart-content">
                            <div class="tt-cart-list">

                              <div class="tt-item" v-if="cart.length < 1">
                                  <p>Your Cart is Empty...</p>
                                </div>
                                <div v-for="(cart_item, index) in cart" :key="index" class="tt-item">
                                    <a :href="'/#/single-product/'+cart_item.product_id+'/'+cart_item.product_name">
                                    <div class="tt-item-img"><img :src="cart_item.product_image" :data-src="cart_item.product_image" alt="" class="error" data-was-processed="true"></div>
                                    <div class="tt-item-descriptions">
                                        <h2 class="tt-title">{{ cart_item.product_name }}</h2>
                                      
                                        <div class="tt-quantity">x{{ cart_item.product_qty * cart_item.purchaseQty }} →  </div>

                                        <div v-if="cart_item.promotion == 0" class="tt-price">₦{{ numberWithCommas(cart_item.product_price * cart_item.purchaseQty ) }}</div>
                                        <div v-else class="tt-price">₦{{ numberWithCommas(cart_item.promoPrice * cart_item.purchaseQty ) }}</div>
                                    
                                    </div>
                                    </a>
                                    <div class="tt-item-close"><a href="javascript:void(0);" @click="removeFromCart(cart_item.product_id)" class="tt-btn-close"></a></div>
                                </div> 
                            </div>
                            <div class="tt-cart-total-row">
                                <div class="tt-cart-total-title">TOTAL:</div>
                                <div class="tt-cart-total-price">₦{{ numberWithCommas(totalPrice) }}</div>
                            </div>
                            <div class="tt-cart-btn">
                                <div v-if="cart.length > 0" @click="closeCart()" class="tt-item"><router-link to="/checkout"  @click="closeCartDropDown()" class="btn closeCart tt-close" id="closeCartId">PROCEED TO CHECKOUT</router-link></div>
                                <div v-if="cart.length > 0" class="tt-item"><a href="javascript:void(0);" class="btn-link-02 tt-hidden-mobile" @click="clearCart()">Clear Cart</a> <a href="javascript:void(0);" @click="clearCart()" class="btn btn-border tt-hidden-desctope">Clear Cart</a></div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</template>

<script>
export default {
    name: 'Cart',
    data ()
    {
        return {
            cart : [],
            totalPrice: 0,
            isActive : false,
        }
    },
    
    mounted ()
    {
        this.cart = this.$store.getters.inCart;
        this.totalPrice = this.$store.getters.total;
    },

    computed:
    {
        updateCart () {
        return this.$store.getters.total;
        }
    },

    watch: {
        updateCart (newCount, oldCount) {
        this.totalPrice = this.$store.getters.total;
        this.cart = this.$store.getters.inCart;
        }
    },

    methods:{
        numberWithCommas(x) {
         return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        },

        closeCart()
        {
            document.body.classList.toggle("tt-popup-dropdown");
            document.getElementById("ttcart").classList.toggle("active");
            document.getElementById("carttoggle").style.display = "none";

        },

         removeFromCart(id) {
         this.$store.dispatch('removeFromCart', id);
        },

      
         clearCart() {
             //do something...
               this.$confirm("Are you sure you would like to clear your cart?").then(() => {
               this.$store.dispatch('clearTheCart', this.totalPrice);
               this.cart = this.$store.getters.inCart;
               this.totalPrice = this.$store.getters.total; 
            });
        },


        // computeTotal()
        // {
        //     this.totalPrice = 0;
        //     this.cart.forEach(function(cartItem)
        //     {
        //        this.totalPrice += cartItem.product_price;
        //     });
        // }
    }
}
</script>

<style>

</style>