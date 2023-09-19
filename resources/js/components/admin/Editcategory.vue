<template>
   <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-flex align-items-center justify-content-between">
                                    <h4 class="mb-0 font-size-18">Edit Category</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                            <li class="breadcrumb-item active">Edit Category</li>
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
                                                        <label for="productname">Category Name</label>
                                                        <input v-model="categoryName" id="productname" name="categoryname" type="text" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="productdesc">Category Description</label>
                                                        <textarea class="form-control" id="productdesc" rows="5" v-model="description"></textarea>
                                                        <!-- <div v-if="$v.description.$error">
                                                            <div class="alert alert-danger" role="alert" v-if="!$v.description.required">
                                                                Description is required.                                    
                                                            </div>
                                                        </div> -->
                                                    </div>
                                                </div>
        
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Departments</label>
                                                        <select class="form-control select2" v-model="department">
                                                            <option disabled selected value="null">Select</option>
                                                            <option v-for="(department, index) in departments" :key="index" :value="department.id">{{ department.name }}</option>
                                                        </select>
                                                    </div>
                                                    
                                                    
                                                </div>
                                            </div>
                                        </form>        
                                    </div>
                                </div>

                                <!-- <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-3">Category Images</h4>
                                        <img style="height: 250px; width: auto;" :src="imagePath" alt="Category image">
                                    </div>
                                </div>  -->
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-3">Category Images</h4>
                                        <img style="height: 250px; width: auto;" :src="imagePath" alt="Category image">
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

                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <form>        
                                            <button v-if="loading"  disabled class="btn btn-primary mr-1 waves-effect waves-light">Please Wait... <div  class="loader"></div></button>        
                                            <span v-else @click="saveCategory()" type="submit" class="btn btn-primary mr-1 waves-effect waves-light">Save Cateegory</span>        
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
    name: "Editcategory",
     components: {
        vueDropzone: vue2Dropzone
    },
    
    data()
    {
        return{
            departments: [],
            categoryName      : null,
            categorydepartment      : null,
            department   :   null,
            description   :   null,
            imagePath       : null,
            loading         : false,
            category_id : null,

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
        this.getAllDepartments();
        this.getCategory();
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
            //run validation here...
            this.loading = true;
            // this.$refs.myVueDropzone.processQueue();            
            Axios.post(process.env.MIX_APP_URL+'/edit/category', {category_id: this.category_id, category_name: this.categoryName, department_id: this.department, description: this.description})
            .then(response => {
                
                if(response.data == true)
                {
                    this.$snotify.success('CATEGORY INFORMATION CHANGED', {
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

        getCategory()
        {
            // id = this.$router.params.id;
            Axios.get(process.env.MIX_APP_URL+'/shop/singlecategory/'+this.$route.params.id)
            .then(response => {                
                this.categoryName = response.data.name;
                this.categorydepartment = response.data.department_id;
                this.department = response.data.department_id;               
                this.description = response.data.description;               
                this.imagePath = response.data.image_path;               
                this.category_id = response.data.id;               
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