<template>
    <form class="" @submit.prevent="submit">
        <div class="flex">
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
                <input id="price" v-model="form.price" placeholder="Board price" />
            </div>
            <div>
                <label for="image">Select image:</label>
                <input type="file" id="image" name="image" @input="uploadImage" accept="image/*">
            </div>
            <div class="w-3/12 pl-6">
                <button type="submit" :disabled="form.processing" class=" pb-3 pr-2 flex justify-center font-ropa text-transform: uppercase text-white bg-gray-500 pr-1 pt-2 p-1">

                    <h1 class="pt-1">Create</h1>

                </button>
            </div>
        </div>

    </form>
</template>

<script setup>
import { useForm,} from "@inertiajs/inertia-vue3";
import {reactive} from "vue";
import {Inertia} from "@inertiajs/inertia";


const form = reactive({
    code: null,
    type: null,
    location: null,
    price: null,
    image:null,
})

function uploadImage(event) {
    const image = event.target.files[0]
    console.log(image)
    form.image = image
}

function submit() {
    console.log(form)
    Inertia.post('/board/create', form, {
        preserveScroll: true,

    })
    // console.log(form)
}
</script>




<style scoped>

</style>
