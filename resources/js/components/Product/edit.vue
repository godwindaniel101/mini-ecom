<template>
    <ProductForm :editMode="editMode" :editId="editId" />
</template>
<script>
import ProductForm from "../Shared/ProductFormComponent";
export default {
    data() {
        return {
            editMode: true,
            editId: this.$route.params.id
        };
    },
    components: {
        ProductForm
    },
    mounted() {}
};
</script>
