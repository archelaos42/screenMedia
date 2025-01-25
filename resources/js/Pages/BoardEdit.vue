<template>
    <Adminavigation />
    <div class="mx-64">
        <form class="flex mt-4" @submit.prevent="submit" enctype="multipart/form-data">
            <div class="flex justify-center">
                    <input class="h-12" id="code" v-model="form.code" placeholder="Board code" />
                    <input class="h-12" id="type" v-model="form.type" placeholder="Campaign type" />
                    <input class="h-12" id="location" v-model="form.address" placeholder="Campaign location" />

                <div v-if="!img" class="flex">
                    <div class="pl-1 flex border-gray-300 border-b-2 h-12 overflow-hidden">
                        <label v-if="!url" class="text-center w-1/3 pt-1" for="image">Select image:</label>
                        <input class="w-80" type="file" id="image" name="image" ref="input" @change="preview" @input="form.image = $event.target.files[0]" accept="image/*">
                        <button type="button" @click="clear" class="flex justify-center items-center mb-2 font-ropa text-white bg-red-500">

                            <h1 class="w-16">Clear</h1>

                        </button>
                    </div>
                </div>
                <div v-if="img">
                    <img class="h-44" v-bind:src="'/storage/images/' + board.image" alt="">
                    <button @click="set" class="flex text-transform: uppercase pr-1 pt-2 mt-3 pl-2 pb-3 pr-2 flex justify-center font-ropa text-transform: uppercase text-white bg-red-500 ">
                        Remove

                    </button>
                </div>
            </div>
            <img class="h-44 ml-6" v-if="url" :src="url" />
            <div class="pl-6">
                <button type="submit" :disabled="form.processing" class=" pb-3 pr-2 flex justify-center font-ropa text-transform: uppercase text-white bg-gray-500 pr-1 pt-2 p-1">

                    <h1 class="pt-1">Update</h1>

                </button>
            </div>
        </form>
    </div>
</template>

<script setup>
import { Link } from '@inertiajs/inertia-vue3';
import {onMounted, ref, reactive} from "vue";
import {Inertia} from "@inertiajs/inertia";
import Adminavigation from "@/Pages/Adminavigation.vue";

let url = ref(null);
let img = ref(null)
let props = defineProps({
    board: Object,

});
function set() {
    img.value = null;
}

function preview(e) {
    const file = e.target.files[0];
    url.value = URL.createObjectURL(file);
    // img.value = true;
}

function clear() {
    document.getElementById('image').value = null;
    url.value = false;
}

function uploadImage(event) {
    const image = event.target.files[0]
    console.log(image)
    form.image = image
}

onMounted(() => {
    img.value = !!props.board.image;
    console.log(img);

})

// let imgname = props.board.image;
const form = reactive({
    code: props.board.code,
    type: props.board.type,
    address: props.board.address,
    id: props.board.id,
    image: props.board.image,
    google:props.board.googlelink,
})

function submit() {
    if(document.getElementById('image').value === null){
        props.board.image = null;
    }
    Inertia.post('/board/change', form, {
        preserveScroll: true
    })
    // console.log(form)
}
</script>




<style scoped>

</style>
