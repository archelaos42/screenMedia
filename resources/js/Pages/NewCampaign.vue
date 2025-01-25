<template>
    <form class="" @submit.prevent="submit">
        <div class="flex justify-center mt-1">
            <div class="">
                <input id="name" v-model="form.name" placeholder="Campaign name" />
            </div>
            <div class="">
                <input id="totalprice" v-model="form.totalprice" placeholder="Total price" />
            </div>
            <div class="">
                <input id="start" type="date" :min="props.start" v-model="form.start" placeholder="Start date" />
            </div>
            <div class="">
                <input id="end" type="date" :min="props.end" v-model="form.end" placeholder="End date" />
            </div>
            <div class="flex pl-6">
                <button type="submit" :disabled="form.processing" class="pr-2 flex font-ropa text-transform: uppercase text-white bg-gray-500 p-1">

                    <h1 class="pt-1">Create</h1>

                </button>
            </div>
        </div>

    </form>
</template>

<script setup>
import {Link, useForm,} from "@inertiajs/inertia-vue3";
import {reactive} from "vue";
import {Inertia} from "@inertiajs/inertia";

let props = defineProps({
    start: Date,
    end: Date,
});

const form = reactive({
    name: null,
    totalprice: null,
    image: null,
})

function clear() {
    document.getElementById('image').value = null;
}

function submit() {
    console.log(form)
    Inertia.post('/campaign/create', form, {
        preserveScroll: true
    })
    // console.log(form)
}
</script>




<style scoped>

</style>
