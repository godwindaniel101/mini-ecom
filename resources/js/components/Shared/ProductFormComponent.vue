<template>
    <div class="container-fluid">
        <div class="create_product_form">
            <form action="" class="">
                <div class="form_wrap">
                    <div class="form_left">
                        <ImageUpload />
                        <div class="image_error">
                            <span class="error_span" v-if="$v.image.$error"
                                >*require</span
                            >
                        </div>
                    </div>
                    <div class="form_right">
                        <div class="form-group">
                            <label>Product Name</label>
                            <input
                                type="text"
                                name="email"
                                v-model="name"
                                @input="$v.name.$touch()"
                                class="form-control"
                                :class="{
                                    'is-invalid': $v.name.$error
                                }"
                            />
                            <span class="error_span" v-if="$v.name.$error"
                                >*require</span
                            >
                        </div>
                        <div class="form-group">
                            <label>Product Cost</label>
                            <input
                                type="text"
                                name="cost"
                                v-model="cost"
                                @input="$v.cost.$touch()"
                                class="form-control"
                                :class="{
                                    'is-invalid': $v.cost.$error
                                }"
                            />
                            <span class="error_span" v-if="$v.cost.$error"
                                >*require</span
                            >
                        </div>
                        <div class="form-group">
                            <label>Product Description</label>
                            <textarea
                                v-model="description"
                                @input="$v.description.$touch()"
                                class="form-control"
                                :class="{
                                    'is-invalid': $v.description.$error
                                }"
                            >
                            <span class="error_span" v-if="$v.description.$error">*require</span>
                            
                            </textarea>
                        </div>
                        <div class="form-group">
                            <button v-if="!editMode"
                                class="btn btn-success"
                                @click.prevent="createProduct()"
                            >
                                Create
                            </button>
                            <button v-if="editMode"
                                class="btn btn-primary"
                                @click.prevent="updateProduct()"
                            >
                                Update
                            </button>
                            <button v-if="!editMode"
                                class="btn btn-danger"
                                @click.prevent="resetProduct()"
                            >
                                Reset
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>
<script>
import ImageUpload from "./ImageUploadComponent";
import { required } from "vuelidate/lib/validators";
import { dataTransfer } from "../../app";
export default {
    props:{
        editMode:{
            type:Boolean
        },
        editId:{
            type:String
        },
    },
    components: {
        ImageUpload
    },
    data() {
        return {
            name: "",
            cost: "",
            image: "",
            description: ""
        };
    },
    validations: {
        cost: {
            required
        },
        name: {
            required
        },
        image: {
            required
        },
        description: {
            required
        }
    },
    methods: {
        resetProduct() {
            this.name = "";
            this.cost = "";
            this.image = "";
            this.description = "";
            dataTransfer.$emit("resetProduct");
        },
        updateProduct(){
           var id = this.editId
           axios.put('/api/product/'+id , {
                'name': this.name,
                'cost': this.cost,
                'image': this.image,
                'description': this.description,
           }).then(({data})=>{
                  Swal.fire({
                            title: data.message,
                            text: "Would you like to preview ?",
                            icon: "success",
                            showCancelButton: true,
                            confirmButtonColor: "#38c172",
                            cancelButtonColor: "blue",
                            confirmButtonText: "Yes, i will",
                            cancelButtonText: "No,Thanks !"
                        }).then(result => {
                            if (result.value) {
                                this.$router.push({path: "/product/preview/" + data.product_id, params:{
                                    adminMode:true,
                                } });
                               
                            }else{
                                 this.$router.push({path: "/product/view" ,});
                            }
                            this.resetProduct() ;
                        });
           }).catch((e)=>{
               console.log(e)
           })
        },
        createProduct() {
            this.$v.$touch();
            if (this.$v.$invalid) {
                // alert("All fields are not valid");
            } else {
                axios
                    .post("/api/product", {
                        name: this.name,
                        cost: this.cost,
                        image: this.image,
                        description: this.description
                    })
                    .then(({ data }) => {
                        Swal.fire({
                            title: data.message,
                            text: "Would you like to preview ?",
                            icon: "success",
                            showCancelButton: true,
                            confirmButtonColor: "#38c172",
                            cancelButtonColor: "blue",
                            confirmButtonText: "Yes, i will",
                            cancelButtonText: "No,Thanks !"
                        }).then(result => {
                            if (result.value) {
                                this.$router.push({path: "/product/preview/" + data.product_id, params:{
                                    adminMode:true,
                                } });
                               
                            }
                            this.resetProduct() ;
                        });
                    })
                    .catch((e) => {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: e.message,
                            })
                    });
                //creates the product itself
            }
        },
        setPhotoData(data) {
            this.image = data;
            //set form field to 64base of the selected image
        },
        checkMode(){
            if(this.editMode){
               axios.get('api/product/'+this.editId+'/edit').then(({data})=>{
                   this.name = data.name
                   this.cost = data.cost
                   this.description = data.description
                   this.image = data.image
                   dataTransfer.$emit('photoEditMode' , data.image);
               }).catch((e)=>{
                   console.log(e)
               });
            }else{
                // alert(this.editMode);
            }
        }
    },
    created() {
        dataTransfer.$on("photoUpdated", data => {
            this.setPhotoData(data);
        });
        //listen for emitted changes on the image component
    },
    mounted(){
        this.checkMode()
        //check for state
    }
};
</script>
