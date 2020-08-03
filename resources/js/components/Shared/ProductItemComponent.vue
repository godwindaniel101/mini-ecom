<template>
    <div class="list_wrapper">
          <div class="list_image">
                        <img :src="item.image" />
                    </div>
                    <div class="text_wrap">
                        <div class="list_id">
                            <span class="">
                                {{ item.id }}
                            </span>
                        </div>
                        <div class="list_name">
                            <span class="">
                                {{ item.name }}
                            </span>
                        </div>
                        <div class="list_cost">
                            <span class="list_naira"
                                >₦<span> {{ item.cost }}</span></span
                            >
                        </div>
                        <div class="list_more">
                            <button class="_bcm">
                                More
                            </button>
                        </div>
                    </div>
    </div>
</template>
<script>
export default {
    props:{
        item:{
            type:Object
        }
    }
}
</script>