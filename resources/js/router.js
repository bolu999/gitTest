import Vue from "vue";
import Router from "vue-router";
import Home from "./components/Home";
import Supermart from "./components/Supermart";
import Aboutus from "./components/Aboutus";
import Contactus from "./components/Contactus";
import Fruits from "./components/Fruits";
import Icecream from "./components/Icecream";
import Luggagemaster from "./components/Luggagemaster";
import Orangecorner from "./components/Orangecorner";
import Pharmacy from "./components/Pharmacy";
import Phones from "./components/Phones";
import Waterdrink from "./components/Waterdrink";
import Shawarmaandjollof from "./components/Shawarmaandjollof";
import Product from "./components/Product";
import Shop from "./components/Shop";
import Checkout from "./components/Checkout";
import Receipt from "./components/Receipt";
import Login from "./components/Login";
import Signup from "./components/Signup";
import Dashboard from "./components/Dashboard";
import Settings from "./components/Settings";
import Admin from "./components/admin/Dashboard";
import Users from "./components/admin/Users";
import User from "./components/admin/User";
import Orders from "./components/admin/Orders";
import Products from "./components/admin/Products";
import ProductsDetail from "./components/admin/product";
import Newproduct from "./components/admin/Newproduct";
import Categories from "./components/admin/Categories";
import Newcategory from "./components/admin/Newcategory";
import Departments from "./components/admin/Departments";
import Editproduct from "./components/admin/Editproduct";
import Categorydetail from "./components/admin/Category";
import Editcategory from "./components/admin/Editcategory";
import Department from "./components/admin/Department";
import Editdepartment from "./components/admin/Editdepartment";
import Newdepartment from "./components/admin/Newdepartment"; 
import Edituser from "./components/admin/Edituser";
import Newuser from "./components/admin/Newuser";
import Sitesettings from "./components/admin/Sitesettings";
import Coupons from "./components/admin/Coupons";
import Newcoupon from "./components/admin/Newcoupon";
import Editcoupon from "./components/admin/Editcoupon";
import UserOrders from "./components/Userorders";
import Wishlist from "./components/Wishlist";


Vue.use(Router);

//This function authenticate every route to ensure users are logged in



const router = new Router({
  mode: "hash",
  // base: process.env.MIX_APP_URL,
  routes: [
        {
        path: "/",
        name: "Home",
        meta : {
          reload: true,
          isAdmin: false,
        },
        component: Home,
      },
      {
        path: "/Supermart",
        name: "Supermart",
        component: Supermart,
        meta : {
          reload: false,
          isAdmin: false,
        },
      },
      {
        path: "/Aboutus",
        name: "Aboutus",
        component: Aboutus,
        meta : {
          reload: false,
          isAdmin: false,
        },
      },
      {
        path: "/Contactus",
        name: "Contactus",
        component: Contactus,
        meta : {
          reload: false,
          isAdmin: false,
        },
      },
      {
        path: "/Fruits",
        name: "Fruits",
        component: Fruits,
        meta : {
          reload: false,
          isAdmin: false,
        },
      },
      {
        path: "/Icecream",
        name: "Icecream",
        component: Icecream,
        meta : {
          reload: false,
          isAdmin: false,
        },
      },
      {
        path: "/Luggagemaster",
        name: "Luggagemaster",
        component: Luggagemaster,
        meta : {
          reload: false,
          isAdmin: false,
        },
      },
      {
        path: "/Orangecorner",
        name: "Orangecorner",
        component: Orangecorner,
        meta : {
          reload: false,
          isAdmin: false,
        },
      },
      {
        path: "/Pharmacy",
        name: "Pharmacy",
        component: Pharmacy,
        meta : {
          reload: false,
          isAdmin: false,
        },
      },
      {
        path: "/Phones",
        name: "Phones",
        component: Phones,
        meta : {
          reload: false,
          isAdmin: false,
        },
      },
      {
        path: "/Water-and-drink",
        name: "Waterdrink",
        component: Waterdrink,
        meta : {
          reload: false,
          isAdmin: false,
        },
      },
      {
        path: "/Shawarma-and-jollof",
        name: "Shawarmaandjollof",
        component: Shawarmaandjollof,
        meta : {
          reload: false,
          isAdmin: false,
        },
      },
      {
        path: "/single-product/:id/:name",
        name: "Product",
        component: Product,
        meta : {
          reload: false,
          isAdmin: false,
        },
      },
      {
        path: "/shop-listing/:search?",
        name: "Shop",
        component: Shop,
        meta : {
          reload: false,
          isAdmin: false,
        },
      },
      {
        path: "/checkout",
        name: "checkout",
        component: Checkout,
        meta : {
          reload: false,
          isAdmin: false,
        },
      },
      {
        path: "/receipt/:ref",
        name: "receipt",
        component: Receipt,
        meta : {
          reload: false,
          isAdmin: false,
        },
      },
      {
        path: "/login/:from?",
        name: "login",
        component: Login,
        meta : {
          reload: false,
          isAdmin: false,
        },
      },
      {
        path: "/signup",
        name: "signup",
        component: Signup,
        meta : {
          reload: false,
          isAdmin: false,
        },
      },

      {
        path: "/dashboard",
        name: "dashboard",
        component: Dashboard,
        meta : {
          reload: false,
          isAdmin: false,
        },
      },
      {
        path: "/settings",
        name: "settings",
        component: Settings,
        meta : {
          reload: false,
          isAdmin: false,
        },
      },
      {
        path: "/admin",
        name: "admin",
        component: Admin,
        meta : {
          reload: false,
          isAdmin: true,
        },
      },
      {
        path: "/admin-users",
        name: "users",
        component: Users,
        meta : {
          reload: false,
          isAdmin: true,
        },
      },
      {
        path: "/admin-user/:id",
        name: "user",
        component: User,
        meta : {
          reload: false,
          isAdmin: true,
        },
      },
      {
        path: "/admin-edit-user/:id",
        name: "edit-user",
        component: Edituser,
        meta : {
          reload: false,
          isAdmin: true,
        },
      },
      {
        path: "/admin-new-user",
        name: "new-user",
        component: Newuser,
        meta : {
          reload: false,
          isAdmin: true,
        },
      },
      {
        path: "/admin-orders",
        name: "orders",
        component: Orders,
        meta : {
          reload: false,
          isAdmin: true,
        },
      },
      {
        path: "/admin-products",
        name: "products",
        component: Products,
        meta : {
          reload: false,
          isAdmin: true,
        },
      },
      {
        path: "/admin-product-detail/:id/:name",
        name: "admin-product-detail",
        component: ProductsDetail,
        meta : {
          reload: false,
          isAdmin: true,
        },
      },
      {
        path: "/admin-new-product",
        name: "admin-new-product",
        component: Newproduct,
        meta : {
          reload: false,
          isAdmin: true,
        },
      },
      {
        path: "/admin-categories",
        name: "admin-categories",
        component: Categories,
        meta : {
          reload: false,
          isAdmin: true,
        },
      },
      {
        path: "/admin-new-category",
        name: "admin-new-category",
        component: Newcategory,
        meta : {
          reload: false,
          isAdmin: true,
        },
      },
      {
        path: "/admin-departments",
        name: "admin-departments",
        component: Departments,
        meta : {
          reload: false,
          isAdmin: true,
        },
      },
      {
        path: "/admin-edit-product/:id",
        name: "admin-edit-product",
        component: Editproduct,
        meta : {
          reload: false,
          isAdmin: true,
        },
      },
      {
        path: "/admin-category-detail/:id",
        name: "admin-category-detail",
        component: Categorydetail,
        meta : {
          reload: false,
          isAdmin: true,
        },
      },
      {
        path: "/admin-edit-category/:id",
        name: "admin-edit-category",
        component: Editcategory,
        meta : {
          reload: false,
          isAdmin: true,
        },
      },
      {
        path: "/admin-new-department",
        name: "admin-new-department",
        component: Newdepartment,
        meta : {
          reload: false,
          isAdmin: true,
        },
      },
      {
        path: "/admin-edit-department/:id",
        name: "admin-edit-department",
        component: Editdepartment,
        meta : {
          reload: false,
          isAdmin: true,
        },
      },
      {
        path: "/admin-department-detail/:id/",
        name: "admin-department-detail",
        component: Department,
        meta : {
          reload: false,
          isAdmin: true,
        },
      },
      {
        path: "/admin-site-settings",
        name: "admin-site-settings",
        component: Sitesettings,
        meta : {
          reload: false,
          isAdmin: true,
        },
      },

      {
        path: "/coupons",
        name: "coupons",
        component: Coupons,
        meta : {
          reload: false,
          isAdmin: true,
        },
      },

      {
        path: "/newcoupon",
        name: "newcoupon",
        component: Newcoupon,
        meta : {
          reload: false,
          isAdmin: true,
        },
      },

      {
        path: "/editcoupon/:id",
        name: "editcoupon",
        component: Editcoupon,
        meta : {
          reload: false,
          isAdmin: true,
        },
      },

      {
        path: "/user-orders",
        name: "user-orders",
        component: UserOrders,
        meta : {
          reload: false,
          isAdmin: false,
        },
      },

      {
        path: "/user-wishlist",
        name: "user-wishlist",
        component: Wishlist,
        meta : {
          reload: false,
          isAdmin: false,
        },
      },
  ]
});

window.popStateDetected = false
window.addEventListener('popstate', () => {
  window.popStateDetected = true
})


router.beforeEach((to, from, next) => {
  if(window.location.href == process.env.MIX_APP_URL+'/user#/')
  {
    window.location.href = process.env.MIX_APP_URL+'/user#/dashboard';
    next('admin');

    // if(this.$store.getters.role == 1)
    // {
    //   window.location.href = process.env.MIX_APP_URL+'/user#/admin';
    //   next('admin');
    // }
    // else
    // {
    //   window.location.href = process.env.MIX_APP_URL+'/user#/dashboard';
    //   next('admin');
    // }
  }
  else
  {
    next();
  }
  const IsItABackButton = window.popStateDetected
  window.popStateDetected = false
  if (IsItABackButton && to.meta.reload) {
    window.location.reload();
  }
  next();
  window.scrollTo(0, 0);
})

export default router;