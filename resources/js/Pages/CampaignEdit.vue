<template>
    <Adminavigation />
    <div class="mx-96">
        <form class="" @submit.prevent="submit">
            <div class="flex my-4">
                <input id="name" v-model="form.name" placeholder="Campaign name" />
                <input class="w-44" id="start" :min="start" v-model="form.start" type="date" placeholder="Start date" />
                <input class="w-44" id="end" :min="end" v-model="form.end" type="date" placeholder="End date" />
                <div class="w-3/12 pl-6 flex">
                    <button type="submit" class="flex justify-center items-center font-ropa text-transform: uppercase text-white bg-gray-500 pb-1">

                        <h1 class="pt-1">Change</h1>

                    </button>
<!--                    <button type="submit" class=" pb-3 pr-2 flex justify-center font-ropa text-transform: uppercase text-white bg-gray-500 pr-1 pt-2 p-1">-->

<!--                        <h1 class="pt-1">Change</h1>-->

<!--                    </button>-->
                </div>
            </div>
        </form>
    </div>
    <div v-if="!(form.start === ogStart && form.end === ogEnd)" class="flex justify-center font-ropa text-transform: uppercase text-white bg-red-500 ">

        *Changing the start or end dates will delete all of the bookings within a campaign

    </div>
</template>

<script setup>
import {Link, useForm,} from "@inertiajs/inertia-vue3";
import Adminavigation from "@/Pages/Adminavigation.vue";
import {onMounted, reactive, ref} from "vue";
import {Inertia} from "@inertiajs/inertia";

let props = defineProps({
    campaign: Object,
    start: String,
    end: String,
    ogStart: String,
    ogEnd: String,
});

const form = reactive({
    name: props.campaign.name,
    id: props.campaign.id,
    start: props.campaign.start,
    end: props.campaign.end,
})

function submit() {
    console.log(form)
    Inertia.post('/campaign/change', form, {
        preserveScroll: true
    })
    // console.log(form)
}
</script>




<style scoped>
.modal {
    background-color: #1a202c;
    color: #d1d5db;
    position: fixed;
    z-index: 999;
    top: 20%;
    left: 50%;
    /*width: 800px;*/
    /*height: 500px;*/
    margin-left: -150px;
}
</style>
