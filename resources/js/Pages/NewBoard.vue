<template>
    <form class="" @submit.prevent="submit">
        <div class="flex justify-center mt-1">
            <div>
                <input id="code" v-model="form.code" placeholder="Board code" />
            </div>
            <div>
                <input id="type" v-model="form.type" placeholder="Board type" />
            </div>
            <div>
                <input id="location" v-model="form.location" placeholder="Board location" />
            </div>
            <div>
                <input id="google" v-model="form.google" placeholder="Google link" />
            </div>
            <div class=" flex border-gray-300  overflow-hidden">
                <label class="text-center px-5 pt-2" for="image">Select image:</label>
                <input class="border-2" type="file" id="image" name="image" @input="form.image = $event.target.files[0]" accept="image/*">
                <button type="button" @click="clear" class=" flex justify-center font-ropa text-white bg-red-500 pt-1.5">

                    <h1 class="w-16">Clear</h1>

                </button>
            </div>
            <div class="pl-8 ">
                <button type="submit" :disabled="form.processing" class=" pb-2 pr-2 font-ropa text-transform: uppercase text-white bg-gray-500 p-1">

                    <h1 class="pt-1">Create</h1>

                </button>
            </div>
        </div>

    </form>
</template>

<script setup>
import { useForm,} from "@inertiajs/inertia-vue3";
import {onMounted, reactive} from "vue";
import {Inertia} from "@inertiajs/inertia";


function clear() {
    document.getElementById('image').value = null;
}

const form = reactive({
    code: null,
    type: null,
    location: null,
    price: null,
    image:null,
    google:null,
})

// function uploadImage(event) {
//     const image = event.target.files[0]
//     console.log(image)
//     form.image = image
// }

function submit() {
    console.log(form)
    Inertia.post('/board/create', form, {
        preserveScroll: true,
        // image: form.image,
    })
    // console.log(form)
}
</script>




<style scoped>

</style>
