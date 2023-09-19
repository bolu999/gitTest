<template>
   <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-flex align-items-center justify-content-between">
                                    <h4 class="mb-0 font-size-18">Edit Coupon</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                            <li class="breadcrumb-item active">Edit Coupon</li>
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
                                                        <label for="Couponname">Coupon Code</label>
                                                        <input v-model="code" id="Couponname" name="Couponname" type="text" class="form-control">
                                                        <div v-if="$v.code.$error">
                                                            <div class="alert alert-danger" role="alert" v-if="!$v.code.required">
                                                                Coupon code is required.                                    
                                                            </div>
                                                        </div>
                                                    </div>
                                                   
                                                </div>
        
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Type</label>
                                                        <select class="form-control select2" v-model="type">
                                                            <option disabled selected value="null">Select Type</option>
                                                            <option value="Percentage">Percentage</option>
                                                            <option value="Naira">Naira</option>
                                                        </select>
                                                         <div v-if="$v.type.$error">
                                                            <div class="alert alert-danger" role="alert" v-if="!$v.type.required">
                                                                Type is required.                                    
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="productdesc">Coupon Value</label>
                                                        <textarea class="form-control" id="productdesc" rows="5" v-model="value"></textarea>
                                                        <div v-if="$v.value.$error">
                                                            <div class="alert alert-danger" role="alert" v-if="!$v.value.required">
                                                                Coupon Value is required.                                    
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </form>        
                                    </div>
                                </div>

        
                                <div class="card">
                                    <div class="card-body">
                                        <form>        
                                            <span v-if="loading" disabled type="submit" class="btn btn-primary mr-1 waves-effect waves-light">Please wait...</span>        
                                            <span v-else @click="saveCoupon()" type="submit" class="btn btn-primary mr-1 waves-effect waves-light">Save Coupon</span>        
                                        </form>
        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                    </div> <!-- container-fluid -->
                </div>
            <vue-snotify></vue-snotify>

                <!-- End Page-content -->
            </div>
</template>

<script>
import Axios from "axios";
import vue2Dropzone from 'vue2-dropzone'
import 'vue2-dropzone/dist/vue2Dropzone.min.css'
import { required } from 'vuelidate/lib/validators';


export default {
    name: "Editcoupon",
     components: {
        // vueDropzone: vue2Dropzone
    },
    
    data()
    {
        return{
            code : null,
            id : null,
            type : null,
            value : null,
            status       : null,
            loading   :   false,            
        }
    },
    validations: {
        code: {
            required,
        },
        type: {
            required,
        },
        value: {
            required,
        },
    },
     
     mounted()
     {
         this.getCoupon();
     },
    methods:{
        getCoupon()
        {
            this.loading = true;
            
            Axios.get(process.env.MIX_APP_URL+'/get/coupon/'+this.$route.params.id)
            .then(response => {
                this.code = response.data.code;
                this.value = response.data.value;
                this.type = response.data.type;
                this.id = response.data.id;
                this.loading = false;
            }).catch(error => {
                
                // this.$noty.error("Error occured. Try again");
            });
        },

        saveCoupon()
        {
            this.$v.$touch()
            if (this.$v.$invalid) 
            {
               this.submitStatus  = 'ERROR'
            }
            else
            {
                this.loading = true;
                Axios.post(process.env.MIX_APP_URL+'/edit/coupon', {id: this.id, code: this.code, type: this.type, value: this.value})
                .then(response => {
                    this.loading = false;
                    if(response.data == true)
                    {
                        this.$snotify.success('COUPON SAVED!', {
                            timeout: 2000,
                            showProgressBar: true,
                            closeOnClick: false,
                            pauseOnHover: true,
                            position : "rightTop",
                        }).on("destroyed", () => {
                            // this.$router.push('/coupons');
                        });
                    } 
                    else
                    {
                        this.loading = false;
                        this.$snotify.error('FAILED TO SAVE COUPON!', {
                            timeout: 2000,
                            showProgressBar: true,
                            closeOnClick: false,
                            pauseOnHover: true,
                            position : "rightTop",
                        }).on("destroyed", () => {
                            // this.$router.push('/coupons');
                        });
                    }
                })
            }
        },

    },
     

    
}
</script>

<style>

</style>