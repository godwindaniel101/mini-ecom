<template>
    <div class="container-fluid __zeroAll">
        <div class="preloader_wrap" v-if="preloader">
            <div class="preloader_image">
                <img src="/image/loader.gif" />
            </div>
        </div>
        <div class="create_product_form">
            <section class="_bdy">
                <h2>Create Product</h2>
                <form action="">
                    <div class="form">
                        <div class="_groups">
                            <ImageUpload />
                            <div
                                class="invalid"
                                v-if="$v.image.$error"
                                style="color:red;font-size:12px"
                            >
                                Please select an Image
                            </div>
                        </div>
                        <div class="fields">
                            <div class="_groups">
                                <label for="name" class="_label">Name</label>
                                <input
                                    type="text"
                                    name="email"
                                    v-model="name"
                                    @input="$v.name.$touch()"
                                    class="_input"
                                    :class="{
                                        'is-invalid': $v.name.$error
                                    }"
                                />
                                <div class="invalid" v-if="$v.image.$error">
                                    Please Enter a Product name
                                </div>
                            </div>

                            <div class="_row">
                                <div class="_groups">
                                    <label for="price" class="_label"
                                        >Cost</label
                                    >
                                    <input
                                        type="text"
                                        name="email"
                                        v-model="cost"
                                        @input="$v.cost.$touch()"
                                        class="_input"
                                        :class="{
                                            'is-invalid': $v.cost.$error
                                        }"
                                    />
                                    <div class="invalid" v-if="$v.image.$error">
                                        Please Enter Cost
                                    </div>
                                </div>
                            </div>

                            <div class="_groups">
                                <label for="desc" class="_label"
                                    >Description</label
                                >
                                <textarea
                                    v-model="description"
                                    @input="$v.description.$touch()"
                                    name="desc"
                                    id=""
                                    class="desc"
                                    :class="{
                                        'is-invalid': $v.cost.$description
                                    }"
                                ></textarea>
                                <div
                                    class="invalid"
                                    v-if="$v.description.$error"
                                >
                                    Please Enter Description
                                </div>
                            </div>
                            <div class="_btns">
                                <button
                                    v-if="!editMode"
                                    class="_btn _primary"
                                    @click.prevent="createProduct()"
                                >
                                    Create
                                </button>
                                <button
                                    v-if="editMode"
                                    class="_btn _primary"
                                    @click.prevent="updateProduct()"
                                >
                                    Update
                                </button>
                                <button
                                    v-if="!editMode"
                                    class="_btn _secondary"
                                    @click.prevent="resetProduct()"
                                >
                                    Reset
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </section>
        </div>
    </div>
</template>
<script>
import ImageUpload from "./ImageUploadComponent";
import { required } from "vuelidate/lib/validators";
import { dataTransfer } from "../../app";
export default {
    props: {
        editMode: {
            type: Boolean
        },
        editId: {
            type: String
        }
    },
    components: {
        ImageUpload
    },
    data() {
        return {
            preloader: false,
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
        updateProduct() {
            var id = this.editId;
            this.$Progress.start();
            axios
                .put("/api/product/" + id, {
                    name: this.name,
                    cost: this.cost,
                    image: this.image,
                    description: this.description
                })
                .then(({ data }) => {
                    this.$Progress.finish();
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
                            this.$router.push({
                                path: "/product/preview/" + data.product_id,
                                params: {
                                    adminMode: true
                                }
                            });
                        } else {
                            this.$router.push({ path: "/product/view" });
                        }
                        this.resetProduct();
                    });
                })
                .catch(e => {
                    this.$Progress.fail();
                    console.log(e);
                });
        },
        createProduct() {
            this.$v.$touch();
            if (this.$v.$invalid) {
                // alert("All fields are not valid");
            } else {
                this.$Progress.start();
                axios
                    .post("/api/product", {
                        name: this.name,
                        cost: this.cost,
                        image: this.image,
                        description: this.description
                    })
                    .then(({ data }) => {
                        this.$Progress.finish();
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
                                this.$router.push({
                                    path: "/product/preview/" + data.product_id,
                                    params: {
                                        adminMode: true
                                    }
                                });
                            }
                            this.resetProduct();
                        });
                    })
                    .catch(e => {
                        this.$Progress.fail();
                        Swal.fire({
                            icon: "error",
                            title: "Oops...",
                            text: e.message
                        });
                    });
                //creates the product itself
            }
        },
        setPhotoData(data) {
            this.image = data;
            //set form field to 64base of the selected image
        },
        checkMode() {
            if (this.editMode) {
                this.preloader = true;
                axios
                    .get("api/product/" + this.editId + "/edit")
                    .then(({ data }) => {
                        this.name = data.name;
                        this.cost = data.cost;
                        this.description = data.description;
                        this.image = data.image;
                        dataTransfer.$emit("photoEditMode", data.image);
                        this.preloader = false;
                    })
                    .catch(e => {
                        console.log(e);
                    });
            } else {
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
    mounted() {
        this.checkMode();
        //check for state
    }
};
</script>
