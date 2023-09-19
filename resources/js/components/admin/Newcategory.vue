<template>
   <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-flex align-items-center justify-content-between">
                                    <h4 class="mb-0 font-size-18">Add Category</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                            <li class="breadcrumb-item active">Add Category</li>
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
                                                        <label for="Categoryname">Category Name</label>
                                                        <input v-model="categoryName" id="Categoryname" name="Categoryname" type="text" class="form-control">
                                                        <div v-if="$v.categoryName.$error">
                                                            <div class="alert alert-danger" role="alert" v-if="!$v.categoryName.required">
                                                                Category name is required.                                    
                                                            </div>
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
                                                    <!-- <div class="form-group">
                                                        <label for="price">Normal Price (₦)</label>
                                                        <input id="price" name="price" type="text" class="form-control" v-model="normalPrice">
                                                    </div> -->
                                                </div>
        
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Departments</label>
                                                        <select class="form-control select2" v-model="department">
                                                            <option disabled selected value="null">Select</option>
                                                            <option v-for="(department, index) in departments" :key="index" :value="department.id">{{ department.name }}</option>
                                                        </select>
                                                         <div v-if="$v.department.$error">
                                                            <div class="alert alert-danger" role="alert" v-if="!$v.department.required">
                                                                Department is required.                                    
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="productdesc">Category Description</label>
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

                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-3">Category Image</h4>                                        
                                            <vue-dropzone ref="myVueDropzone" id="dropzone" :options="dropzoneOptions" :useCustomSlot="true" v-on:vdropzone-success="createdCategory"></vue-dropzone>
                                    </div>

                                </div> <!-- end card-->
        
                                <div class="card">
                                    <div class="card-body">
                                        <form>        
                                            <span @click="saveCategory()" type="submit" class="btn btn-primary mr-1 waves-effect waves-light">Save Category</span>        
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
    name: "Newcategory",
     components: {
        vueDropzone: vue2Dropzone
    },
    
    data()
    {
        return{
            departments: [],

            categoryName : null,
            department    : null,
            image1       : null,
            description   :   null,

            dropzoneOptions: {
                url: '/category/image',
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
        this.getAllDepartments();
    },

    validations: {
        categoryName: {
            required,
        },
        department: {
            required,
        },
        description: {
            required,
        },
    },
     
    methods:{
         getAllDepartments()
        {
           Axios.get(process.env.MIX_APP_URL+'/admin/alldepartments')
            .then(response => {
                this.departments = response.data;      
            }).catch(error => {
                
            });
        },

       

        saveCategory()
        {
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

           
        },

        createdCategory(file, response)
        {
            this.category_id = response.id;
            
             Axios.post(process.env.MIX_APP_URL+'/save/category', {category_id: this.category_id, name: this.categoryName, department: this.department, description: this.description})
            .then(response => {
                if(response.data == true)
                {
                    this.$snotify.success('CATEGORY SAVED!', {
                        timeout: 2000,
                        showProgressBar: true,
                        closeOnClick: false,
                        pauseOnHover: true,
                        position : "rightTop"
                    }).on("destroyed", () => {
                        this.loading = false;
                        this.$router.push('/admin-categories');    
                    });

                    // this.getAllDepartments();
                } 

            }).catch(error => {
                
            });
        }
    },
     

    
}
</script>

<style>

</style>