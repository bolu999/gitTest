<template>
   <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-flex align-items-center justify-content-between">
                                    <h4 class="mb-0 font-size-18">Add Product</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                            <li class="breadcrumb-item active">Add Product</li>
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
                                                        <div v-if="$v.productName.$error">
                                                        <div class="alert alert-danger" role="alert" v-if="!$v.productName.required">
                                                            Product Name is required.                                    
                                                        </div>
                                                        <!-- <div class="error" v-if="!$v.firstName.minLength">Name must have at least </div> -->
                                                    </div>
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
                                                        <div v-if="$v.normalPrice.$error">
                                                            <div class="alert alert-danger" role="alert" v-if="!$v.normalPrice.required">
                                                                Normal price is required.                                    
                                                            </div>
                                                            <div class="alert alert-danger" role="alert" v-if="!$v.normalPrice.numeric">
                                                                Normal price must be a number.                                    
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="price">Price Quantity</label>
                                                        <input id="price" name="quantity" type="text" class="form-control" v-model="quantity">
                                                        <div v-if="$v.quantity.$error">
                                                            <div class="alert alert-danger" role="alert" v-if="!$v.quantity.required">
                                                                Quantity is required.                                    
                                                            </div>
                                                            <div class="alert alert-danger" role="alert" v-if="!$v.quantity.numeric">
                                                                Quantity must be a number.                                    
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- <h5 class="font-size-14 mb-4">Has Specification?</h5> -->
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
                                                            <div v-if="$v.category.$error">
                                                                <div class="alert alert-danger" role="alert" v-if="!$v.category.required">
                                                                    Category is required.                                    
                                                                </div>
                                                            </div>
                                                    </div>
                                                     <div class="form-group">
                                                        <label for="Stock">Stock Quantity</label>
                                                        <input id="Stock" name="Stock" type="text" class="form-control" v-model="stock">
                                                    </div>
                                                     <div class="form-group">
                                                        <label for="price">Discount Price (₦)</label>
                                                        <input id="price" name="price" type="text" class="form-control" v-model="discountPrice">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="productdesc">Product Description</label>
                                                        <textarea class="form-control" id="productdesc" rows="5" v-model="description"></textarea>
                                                        <div v-if="$v.description.$error">
                                                            <div class="alert alert-danger" role="alert" v-if="!$v.description.required">
                                                                Description is required.                                    
                                                            </div>
                                                        </div>
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
                                        <h4 class="card-title mb-3">Product Image</h4>

                                         <form action="#" enctype="multipart/form-data">
                                            <vue-dropzone ref="myVueDropzone" id="dropzone" :options="dropzoneOptions" :useCustomSlot="true" v-on:vdropzone-success="createdProduct"></vue-dropzone>
                                         </form>
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
import vue2Dropzone from 'vue2-dropzone';
import 'vue2-dropzone/dist/vue2Dropzone.min.css';
import { required, minLength, numeric} from 'vuelidate/lib/validators';


export default {
    name: "Newproduct",
     components: {
        vueDropzone: vue2Dropzone
    },
    
    data()
    {
        return{
            categories: [],

            productName : null,
            stock : null,
            category    : null,
            normalPrice   : null,
            discountPrice : null,
            description   : null,
            image1        : null,
            image2        : null,
            onPromotion   : null,
            product_id    : null,
            quantity      : 1,
            hasSpec       : false,
            onDiscount    : false,
            specifications: [
                {
                    title : '',
                    content : '',
                }
            ],

            loading       : false,
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
    },

    updated(){
                
    },

     validations: {
            productName: {
                required,
            },
            category: {
                required,
            },
            normalPrice: {
                required,
                numeric,
            },
            quantity: {
                required,
                numeric,
            },
            description: {
                required,
            },
 
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

        createdProduct(file, response)
        {
            this.product_id = response.id;
            Axios.post(process.env.MIX_APP_URL+'/save/product', {product_id: this.product_id, product_name: this.productName, category_id: this.category, description: this.description, normal_price: this.normalPrice, discount_price: this.discountPrice, product_quantity : this.quantity, product_spec : this.specifications, hasSpec: this.hasSpec, promotion: this.onDiscount, stock_quantity: this.stock})
            .then(response => {
                if(response.data == true)
                {
                    this.$snotify.success('PRODUCT ADDED TO SHOP', {
                        timeout: 3000,
                        showProgressBar: false,
                        closeOnClick: true,
                        pauseOnHover: true,
                        position : "rightTop"
                    }).on("destroyed", () => {
                        this.$router.push('/admin-products');
                        this.loading = false;
                    });
                    
                }
                else
                {
                    this.loading = false;
                }
            }).catch(error => {
                this.loading = false;
                
            });
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
            this.$v.$touch()
             if (this.$v.$invalid) 
            {
               this.submitStatus  = 'ERROR'
            }
            else 
            {
                this.loading = true;
                this.$refs.myVueDropzone.processQueue();            
            }
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