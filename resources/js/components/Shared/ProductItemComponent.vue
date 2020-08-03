<template>
    <div class="item">
        <div class="img">
            <img :src="item.image" />
        </div>
        <div class="_dtl">
            <button class="">
                More
            </button>
            <div class="_nme">
                {{ item.name }}
            </div>
            <div class="_prc">₦ {{ item.cost }}</div>
        </div>
    </div>
</template>
<script>
export default {
    props: {
        item: {
            type: Object
        }
    }
};
</script>
