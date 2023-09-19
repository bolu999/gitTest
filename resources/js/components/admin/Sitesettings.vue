<template>
   <div class="main-content">
                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-flex align-items-center justify-content-between">
                                    <h4 class="mb-0 font-size-18">Site Settings</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                            <li class="breadcrumb-item active">Site Settings</li>
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
                                        <p class="card-title-desc">Fill all site information below</p>
        
                                        <form>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="productname">Site Title</label>
                                                        <input v-model="siteTitle" id="siteTitle" name="siteTitle" type="text" class="form-control">
                                                        <!-- <div v-if="$v.siteTitle.$error">
                                                            <div class="alert alert-danger" role="alert" v-if="!$v.siteTitle.required">
                                                                Site title is required.                                    
                                                            </div>
                                                        </div> -->
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
                                                        <label for="email">Email</label>
                                                        <input id="email" name="email" type="text" class="form-control" v-model="email">
                                                        <!-- <div v-if="$v.quantity.$error">
                                                            <div class="alert alert-danger" role="alert" v-if="!$v.quantity.required">
                                                                Quantity is required.                                    
                                                            </div>
                                                            <div class="alert alert-danger" role="alert" v-if="!$v.quantity.numeric">
                                                                Quantity must be a number.                                    
                                                            </div>
                                                        </div> -->
                                                    </div>


                                                    <div class="form-group">
                                                        <label for="about">About 2k</label>
                                                        <textarea class="form-control" id="about" rows="5" v-model="about" placeholder="About"></textarea>
                                                        <!-- <div v-if="$v.about.$error">
                                                            <div class="alert alert-danger" role="alert" v-if="!$v.about.required">
                                                                About 2k is required.                                    
                                                            </div>
                                                        </div> -->
                                                    </div>

                                                     <div class="form-group">
                                                        <label for="footerabout">Footer About</label>
                                                        <textarea class="form-control" id="footerabout" rows="5" v-model="footer_about" placeholder="About for footer"></textarea>
                                                        <!-- <div v-if="$v.about.$error">
                                                            <div class="alert alert-danger" role="alert" v-if="!$v.about.required">
                                                                About 2k is required.                                    
                                                            </div>
                                                        </div> -->
                                                    </div>   
                                                </div>
        
                                                <div class="col-sm-6">
                                                    <!-- <div class="form-group">
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
                                                    </div> -->
                                                     <div class="form-group">
                                                        <label for="phone">Phone Number</label>
                                                        <input id="phone" name="phone" type="text" class="form-control" v-model="phoneNumber">
                                                        <!-- <div v-if="$v.phoneNumber.$error">
                                                            <div class="alert alert-danger" role="alert" v-if="!$v.phoneNumber.required">
                                                                Phone Number is required.                                    
                                                            </div>
                                                        </div> -->
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="productdesc">Address</label>
                                                        <textarea class="form-control" id="productdesc" rows="3" v-model="address"></textarea>
                                                        <!-- <div v-if="$v.address.$error">
                                                            <div class="alert alert-danger" role="alert" v-if="!$v.address.required">
                                                                Address is required.                                    
                                                            </div>
                                                        </div> -->
                                                    </div>

                                                     <div class="form-group">
                                                        <label for="newslettertitle">Newsletter Head</label>
                                                        <input id="newslettertitle" name="newslettertitle" type="text" class="form-control" v-model="news_letter_title">
                                                        <!-- <div v-if="$v.phoneNumber.$error">
                                                            <div class="alert alert-danger" role="alert" v-if="!$v.phoneNumber.required">
                                                                Phone Number is required.                                    
                                                            </div>
                                                        </div> -->
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="newslettermsg">Newsletter Message</label>
                                                        <input id="newslettermsg" name="newslettermsg" type="text" class="form-control" v-model="news_letter_msg">
                                                        <!-- <div v-if="$v.phoneNumber.$error">
                                                            <div class="alert alert-danger" role="alert" v-if="!$v.phoneNumber.required">
                                                                Phone Number is required.                                    
                                                            </div>
                                                        </div> -->
                                                    </div>

                                                    
                                                    <div class="form-group">
                                                        <label for="facebook">Facebook</label>
                                                        <input id="facebook" name="facebook" type="text" class="form-control" v-model="facebook">
                                                        <!-- <div v-if="$v.phoneNumber.$error">
                                                            <div class="alert alert-danger" role="alert" v-if="!$v.phoneNumber.required">
                                                                Phone Number is required.                                    
                                                            </div>
                                                        </div> -->
                                                    </div>

                                                     <div class="form-group">
                                                        <label for="twitter">Twitter</label>
                                                        <input id="twitter" name="twitter" type="text" class="form-control" v-model="twitter">
                                                        <!-- <div v-if="$v.phoneNumber.$error">
                                                            <div class="alert alert-danger" role="alert" v-if="!$v.phoneNumber.required">
                                                                Phone Number is required.                                    
                                                            </div>
                                                        </div> -->
                                                    </div>

                                                     <div class="form-group">
                                                        <label for="instagram">Instagram</label>
                                                        <input id="instagram" name="instagram" type="text" class="form-control" v-model="instagram">
                                                        <!-- <div v-if="$v.phoneNumber.$error">
                                                            <div class="alert alert-danger" role="alert" v-if="!$v.phoneNumber.required">
                                                                Phone Number is required.                                    
                                                            </div>
                                                        </div> -->
                                                    </div>

                                                    
                                                </div>
                                            </div>
                                        </form>        
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Banners</h4>
                                        <!-- <p class="card-title-desc">Fill all information below</p> -->
                                        <div v-for="(bannerDetail, index) in bannerDetails" :key="index" style="margin-top: 40px">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                       <img :src="bannerDetail.image" alt="" style="width: 300px">
                                                        <!-- <input :value="bannerDetail.image" name="bannerDetail" type="file" class="form-control"> -->
                                                    </div>
                                                     <div class="form-group">
                                                        <label for="productname">Banner Title</label>
                                                        <input v-model="bannerDetail.title" name="spectitle" type="text" class="form-control">
                                                    </div>
                                                </div>
        
                                                <div class="col-sm-6">
                                                   
                                                    <div class="form-group">
                                                        <label for="productdesc">Banner Content 1</label>
                                                        <input v-model="bannerDetail.content_1" name="speccontent" type="text" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="productdesc">Banner Content 2</label>
                                                        <input v-model="bannerDetail.content_2" name="speccontent" type="text" class="form-control">
                                                    </div>
                                                    <!-- <span v-if="bannerDetails.length > 1" @click="removeBanner(index)" type="submit" class="btn btn-warning mr-1 waves-effect waves-light">Remove Banner</span>  -->
                                                </div>
                                            </div>
                                            <hr>
                                        </div>  

                                    </div>
                                    <!-- <span @click="addBanner()" type="submit" class="btn btn-primary mr-1 waves-effect waves-light">Add Banner</span>  -->
                                </div>


                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Quotes</h4>
                                        <div v-for="(quote, index) in quotes" :key="index">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="name">Person Name</label>
                                                        <input v-model="quote.name" name="name" type="text" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="content">Quote Content</label>
                                                        <input v-model="quote.content" name="content" type="text" class="form-control">
                                                    </div>
                                                </div>
                                                 <div class="col-sm-6">
                                                   <div class="form-group">
                                                        <label for="designation">Person Designation</label>
                                                        <input v-model="quote.designation" name="designation" type="text" class="form-control">
                                                    </div>
                                                     <!-- <span v-if="quotes.length > 1" @click="removeQuote(index)" type="submit" class="btn btn-warning mr-1 waves-effect waves-light">Remove Banner</span>  -->
                                                </div>
                                            </div>
                                            <hr>
                                        </div>  

                                    </div>
                                    <!-- <span @click="addQuote()" type="submit" class="btn btn-primary mr-1 waves-effect waves-light">Add Quote</span>  -->
                                </div>

                               
                                <div class="card">
                                    <div class="card-body">
                                        <form>        
                                            <button v-if="loading"  disabled class="btn btn-primary mr-1 waves-effect waves-light">Please Wait... <div  class="loader"></div></button>        
                                            <span v-else @click="saveSettings()" type="submit" class="btn btn-primary mr-1 waves-effect waves-light">Save Settings</span>        
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
import { required, minLength, numeric, email} from 'vuelidate/lib/validators';


export default {
    name: "Sitesetting",
     components: {
        vueDropzone: vue2Dropzone
    },
    
    data()
    {
        return{
            bannerDetails: [{
                image : "null",
                title   : "null",
                content_1 : "null",
                content_2 : "null",
            }],
            quotes: [{
                name : null,
                designation: null,
                content: null,
            }],
            siteTitle : null,
            about    : null,
            footer_about    : null,
            phoneNumber   : null,
            address : null,
            email   : null,
            logo        : null,
            work_hour        : null,
            news_letter_title : null,
            news_letter_msg : null,
            facebook : null,
            twitter : null,
            instagram : null,
            loading       : false,
        }
    },

    mounted()
    {
        this.getSiteDetail();
    },

    validations: {
            title: {
                required,
            },
            about: {
                required,
            },
            phoneNumber: {
                required,
            },
            address: {
                required,
            },
            email: {
                required,
                email,
            },
            Logo: {
                required,
            },

             bannerDetails: {
                image : {
                    required,
                },
                title   : {
                    required
                },
                content : {
                    required
                },
            },

            Quotes: {
                name : {
                    required,
                },
                designation: {
                    required,
                },
                content: {
                    required,
                },
            },
 
         },
     
    methods:{
        addBanner()
        {
             this.bannerDetails.push({
                image : null,
                title   : null,
                content : null,
            });
        },

        removeBanner(index)
        {
            this.bannerDetails.splice(index, 1);
        },


        addQuote()
        {
             this.quotes.push({
                name : null,
                designation: null,
                content: null,
            });
        },

        removeQuote(index)
        {
            this.quotes.splice(index, 1);
        },


        getSiteDetail()
        {
            Axios.get(process.env.MIX_APP_URL+'/get/sitedetails')
            .then(response => {
                this.bannerDetails = response.data.banner;
                this.quotes = response.data.quotes;
                this.siteTitle = response.data.sitesetting.title;
                this.about = response.data.sitesetting.about;
                this.footer_about = response.data.sitesetting.footer_about;
                this.phoneNumber = response.data.sitesetting.phone_number;
                this.address = response.data.sitesetting.address;
                this.email = response.data.sitesetting.email;
                this.logo = response.data.sitesetting.logo;
                this.facebook = response.data.sitesetting.facebook;
                this.instagram = response.data.sitesetting.instagram;
                this.twitter = response.data.sitesetting.twitter;
                this.news_letter_title = response.data.sitesetting.news_letter_title;
                this.news_letter_msg = response.data.sitesetting.news_letter_msg;
                this.work_hour = response.data.sitesetting.work_hour;
            }).catch(error => {
                
            });
        },
        
        saveSettings()
        {
            // this.$v.$touch()
            //  if (this.$v.$invalid) 
            // {
            //    this.submitStatus  = 'ERROR'
            // }
            // else
            // {
                this.$confirm("Are you sure you want to save this settings?").then(() => {
                    this.loading = true;
                    Axios.post(process.env.MIX_APP_URL+'/save/sitedetails', {
                        bannerDetails : this.bannerDetails,
                        quotes   : this.quotes,                      
                        siteTitle : this.siteTitle,
                        about    : this.about,
                        footer_about    : this.footer_about,
                        phoneNumber   : this.phoneNumber,
                        address : this.address,
                        email   : this.email,
                        logo        : this.logo,
                        news_letter_title : this.news_letter_title,
                        news_letter_msg : this.news_letter_msg,
                        facebook : this.facebook,
                        twitter : this.twitter,
                        instagram : this.instagram,
                        work_hour : this.work_hour,
                    })
                    .then(response => {
                        this.loading = false; 
                        this.$snotify.success('SETTINGS SAVED SUCCESSFULLY', {
                            timeout: 4000,
                            showProgressBar: true,
                            closeOnClick: true,
                            pauseOnHover: true,
                            position : "rightTop"
                        });
                    }).catch(error => {
                        
                    });
                });
            // }
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