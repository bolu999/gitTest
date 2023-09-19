import  Vue  from  'vue';
import  Vuex  from  'vuex';

Vue.use(Vuex);

export  default  new  Vuex.Store({

    state: {    
    inCart: [],
    coupons: [],
    total : 0,
    role : null,
    },
    
    getters: {
    inCart:  state  =>  state.inCart,
    total:  state  =>  state.total,
    coupons:  state  =>  state.coupons,
    role:  state  =>  state.role,
    },
    
    mutations: {
    initialiseStore(state) {
        // Check if the ID exists
        if(localStorage.getItem('store')) {
            // Replace the state object with the stored item
            this.replaceState(
                Object.assign(state, JSON.parse(localStorage.getItem('store')))
            ); 

       
            state.total = 0;
            state.inCart.forEach(function(cartItem)
            {
                cartItem.product_qty = parseFloat(cartItem.product_qty);
                cartItem.purchaseQty = parseFloat(cartItem.purchaseQty);
                if(cartItem.promotion == 0)
                {
                    state.total += cartItem.product_price * cartItem.purchaseQty;
                }
                else
                {
                    state.total += cartItem.promoPrice * cartItem.purchaseQty;
                }
            });
            
        }
    },

    CLEAR_CART(state, total) {
        state.inCart = [],
        state.coupons = [];     
        state.total = 0;     
        localStorage.setItem('store', null);
    },
    
    ADD_TO_CART(state, item) {
        // const record = state.inCart.find(p => p.id === item.product_id)
        let record = state.inCart.find(obj => {
            return obj.product_id === item.product_id
          });

            if(record == undefined)
            {
                state.inCart.push(item);
                // state.total += item.product_price;    
            }
            else
            {
                if(record.purchaseQty < item.product_stock)
                {
                    record.purchaseQty += item.purchaseQty;
                }
                // state.total += item.product_price;    
            }

            state.total = 0;
            state.inCart.forEach(function(cartItem){
                if(cartItem.promotion == 0)
                {
                    state.total += cartItem.product_price * cartItem.purchaseQty;
                }
                else
                {
                    state.total += cartItem.promoPrice * cartItem.purchaseQty;
                }            });
            localStorage.setItem('store', JSON.stringify(state));

    },
    
    REMOVE_FROM_CART(state, id) {

        state.inCart.forEach(function(item){
            if(item.product_id == id)
            {                
                const index = state.inCart.indexOf(item);  
                if (index > -1) {
                    state.inCart.splice(index, 1);
                  } 
            }
        });   
        
        state.total = 0;
        state.inCart.forEach(function(cartItem){
            if(cartItem.promotion == 0)
            {
                state.total += cartItem.product_price * cartItem.purchaseQty;
            }
            else
            {
                state.total += cartItem.promoPrice * cartItem.purchaseQty;
            }        });
        localStorage.setItem('store', JSON.stringify(state));
    },

    UPDATE_CART(state, data) {

            let record = state.inCart.find(obj => {
                return obj.product_id === data.product_id
            });

            if(record != undefined)
            {
                record.purchaseQty = parseInt(data.purchaseQty);
            }
            else
            {
                // state.inCart.push(item);
            }

            state.total = 0;
            state.inCart.forEach(function(cartItem){
                if(cartItem.promotion == 0)
                {
                    state.total += cartItem.product_price * cartItem.purchaseQty;
                }
                else
                {
                    state.total += cartItem.promoPrice * cartItem.purchaseQty;
                }            });
            localStorage.setItem('store', JSON.stringify(state));
    },

    APPLY_COUPON (state, code)
    {
        state.coupons.push(code);
        localStorage.setItem('store', JSON.stringify(state));
    },

    REMOVE_COUPON (state, code)
    {
        state.coupons = [];
        localStorage.setItem('store', JSON.stringify(state));
    },

    SET_ROLE (state, role)
    {
        state.role = role;
        localStorage.setItem('store', JSON.stringify(state));
    },
    
    },
    
    actions: {
    
        addToCart(context, id) {
            context.commit('ADD_TO_CART', id);
        },
        
        removeFromCart(context, id) {
            context.commit('REMOVE_FROM_CART', id);
        },

        updateCart(context, data) {
            context.commit('UPDATE_CART', data);
        },

        clearTheCart(context, total)
        {
            context.commit('CLEAR_CART', total);
        },

        applyCoupon(context, code)
        {
            context.commit('APPLY_COUPON', code);
        },

        removeCoupon(context, code)
        {
            context.commit('REMOVE_COUPON', code);
        },

        setRole(context, role)
        {
            context.commit('SET_ROLE', role);
        }

    },

    
    
    })
    