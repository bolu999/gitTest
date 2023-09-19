<template>
   <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-flex align-items-center justify-content-between">
                                    <h4 class="mb-0 font-size-18">Edit Product</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                            <li class="breadcrumb-item active">Edit Product</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
        
                                        <h4 class="card-title">Basic Information</h4>
                                        <p class="card-title-desc">Fill all information below</p>
        
                                        <form>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="productname">Product Name</label>
                                                        <input v-model="productName" id="productname" name="productname" type="text" class="form-control">
                                                    </div>
                                                    <!-- <div class="form-group">
                                                        <label for="manufacturername">Description</label>
                                                        <input id="manufacturername" name="manufacturername" type="text" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="manufacturerbrand">Manufacturer Brand</label>
                                                        <input id="manufacturerbrand" name="manufacturerbrand" type="text" class="form-control">
                                                    </div> -->
                                                    <div class="form-group">
                                                        <label for="price">Normal Price (₦)</label>
                                                        <input id="price" name="price" type="text" class="form-control" v-model="normalPrice">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="price">Price Quantity</label>
                                                        <input id="price" name="quantity" type="text" class="form-control" v-model="quantity">
                                                    </div>

                                                      <div class="custom-control custom-checkbox mb-3">
                                                        <input v-model="hasSpec" type="checkbox" class="custom-control-input" id="customCheck1">
                                                        <label class="custom-control-label"  for="customCheck1">Has Specification</label>
                                                    </div>

                                                     <div class="custom-control custom-checkbox mb-3">
                                                        <input v-model="onDiscount" type="checkbox" class="custom-control-input" id="customCheck2">
                                                        <label class="custom-control-label"  for="customCheck2">On Discount</label>
                                                    </div>
                                                </div>
        
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Category</label>
                                                        <select class="form-control select2" v-model="category">
                                                            <option disabled selected value="null">Select</option>
                                                            <option v-for="(category, index) in categories" :key="index" :value="category.id">{{ category.name }}</option>
                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="price">Stock Quantity</label>
                                                        <input id="price" name="Stock Quantity" type="text" class="form-control" v-model="stock">
                                                    </div>

                                                     <div class="form-group">
                                                        <label for="price">Discount Price (₦)</label>
                                                        <input id="price" name="price" type="text" class="form-control" v-model="discountPrice">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="productdesc">Product Description</label>
                                                        <textarea class="form-control" id="productdesc" rows="5" v-model="description"></textarea>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </form>        
                                    </div>
                                </div>

                                <div class="card" v-if="hasSpec">
                                    <div class="card-body">
                                        <h4 class="card-title">Add Specification</h4>
                                        <!-- <p class="card-title-desc">Fill all information below</p> -->
                                        <div v-for="(specification, index) in specifications" :key="index">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="productname">Specification Title</label>
                                                        <input v-model="specification.title" name="spectitle" type="text" class="form-control">
                                                    </div>
                                                </div>
        
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="productdesc">Specification Content</label>
                                                        <input v-model="specification.content" name="speccontent" type="text" class="form-control">
                                                    </div>
                                                    <span v-if="specifications.length > 1" @click="removeSpec(index)" type="submit" class="btn btn-warning mr-1 waves-effect waves-light">Remove Spec</span> 
                                                </div>
                                            </div>
                                        </div>  

                                    </div>
                                    <span @click="addSpec()" type="submit" class="btn btn-primary mr-1 waves-effect waves-light">Add Spec</span> 
                                </div>

                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-3">Product Images</h4>
                                        <img style="height: 250px; width: auto;" :src="imagePath" alt="product image">
                                        <!-- <form action="https://themesbrand.com/" method="post" class="dropzone">
                                            <div class="fallback">
                                                <input name="file" type="file" multiple />
                                            </div>
            
                                            <div class="dz-message needsclick">
                                                <div class="mb-3">
                                                    <i class="display-4 text-muted bx bxs-cloud-upload"></i>
                                                </div>
                                                
                                                <h4>Drop files here or click to upload.</h4>
                                            </div>
                                        </form> -->
                                         <!-- <form action="#" enctype="multipart/form-data">
                                            <vue-dropzone ref="myVueDropzone" id="dropzone" :options="dropzoneOptions" :useCustomSlot="true" v-on:vdropzone-success="createdProduct"></vue-dropzone>
                                         </form> -->
                                    </div>

                                </div> <!-- end card-->
        
                                <div class="card">
                                    <div class="card-body">
                                        <form>        
                                            <button v-if="loading"  disabled class="btn btn-primary mr-1 waves-effect waves-light">Please Wait... <div  class="loader"></div></button>        
                                            <span v-else @click="saveProduct()" type="submit" class="btn btn-primary mr-1 waves-effect waves-light">Save Product</span>        
                                        </form>
        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->
            <vue-snotify></vue-snotify>

            </div>
</template>

<script>
import Axios from "axios";
import vue2Dropzone from 'vue2-dropzone'
import 'vue2-dropzone/dist/vue2Dropzone.min.css'

export default {
    name: "Editproduct",
     components: {
        vueDropzone: vue2Dropzone
    },
    
    data()
    {
        return{
            categories: [],

            productName   : null,
            stock         : null,
            category      : null,
            normalPrice   : null,
            discountPrice : null,
            description   : null,
            image1        : null,
            image2        : null,
            onPromotion   : null,
            product_id    : null,
            quantity      : null,
            imagePath     : null,
            hasSpec       : false,
            onDiscount    : false,
            loading       : false,
            specifications: [
                {
                    title   : '',
                    content : '',
                }
            ],

            dropzoneOptions: {
                url: '/product/image',
                thumbnailWidth: 150,
                autoProcessQueue: false,
                maxFilesize: 2,
                maxFiles: 2,
                acceptedFiles: ".jpeg,.jpg,.png,.gif",
                autoDiscover : true,
                clickable : true,
                // uploadMultiple :true,
                addRemoveLinks:true,
                headers: {
                    "X-CSRF-TOKEN": document.head.querySelector("[name=csrf-token]").content
                },

            },
            
        }
    },

    mounted()
    {
        this.getAllCategories();
        this.getProduct();
    },

    updated(){
                
    },
     
    methods:{
        addSpec()
        {
             this.specifications.push({
                title : '',
                content : '',
            });
        },

        removeSpec(index)
        {
            this.specifications.splice(index, 1);
        },

        getAllCategories()
        {
            Axios.get(process.env.MIX_APP_URL+'/shop/allcategories')
            .then(response => {
                this.categories = response.data;       
            }).catch(error => {
                
            });
        },

        saveProduct()
        {
            //run validation here...
            this.loading = true;
            // this.$refs.myVueDropzone.processQueue();            
            Axios.post(process.env.MIX_APP_URL+'/edit/product', {product_id: this.product_id, product_name: this.productName, category_id: this.category, description: this.description, normal_price: this.normalPrice, discount_price: this.discountPrice, product_quantity : this.quantity, hasSpec: this.hasSpec, promotion: this.onDiscount, product_spec: this.specifications, stock_quantity : this.stock})
            .then(response => {
                
                if(response.data == true)
                {
                    this.$snotify.success('PRODUCT INFORMATION CHANGED', {
                        timeout: 3000,
                        showProgressBar: false,
                        closeOnClick: true,
                        pauseOnHover: true,
                        position : "rightTop",
                    });
                    this.loading = false;
                    this. getProduct();
                }
            }).catch(error => {
                
            });
            
        },

        getProduct()
        {
            // id = this.$router.params.id;
            Axios.get(process.env.MIX_APP_URL+'/shop/singleproduct/'+this.$route.params.id)
            .then(response => {                
                this.productName = response.data.product.name;
                this.category = response.data.product.category_id;
                this.description = response.data.product.description;
                this.normalPrice = response.data.product.price_list.normalPrice;
                this.discountPrice = response.data.product.price_list.discountPrice;
                this.quantity = response.data.product.price_list.quantity;
                this.product_id = response.data.product.id;
                this.imagePath = response.data.product.image_link1;
                this.hasSpec   = response.data.product.hasSpec;
                this.onDiscount   = response.data.product.promotion;
                this.stock   = response.data.product.inventory_qty;
                if(this.hasSpec)
                {
                    let spec = new Array();
                    response.data.product.specification.forEach(element => {
                        spec.push({
                                title : element.title,
                                content : element.content,
                            });
                        this.specifications = spec;
                    });
                }
               
            }).catch(error => {
                
                // this.$noty.error("Error occured. Try again");
            });

        }
    },
     

    
}
</script>

<style>
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