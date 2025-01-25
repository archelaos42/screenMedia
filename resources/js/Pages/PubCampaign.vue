<template>
    <div @click.self="open = false" id="wrapper">
        <Navigation />
        <div class="text-center">
            <h1 class="mb-16 font-bold font-ropa pt-10 text-center text-tra text-3xl">{{campaign.name}}</h1>
        </div>


        <Teleport to="body">
            <div v-if="!open===false" class="modal">
                <img class="max-h-96" v-bind:src="'/storage/images/' + open" alt="">
                <p>Hello from the modal!</p>
                <button @click="open = false">Close</button>
            </div>
        </Teleport>


        <div @click.self="open = false" class="flex grid grid-cols-4 mt-12">
            <div @click.self="open = false" class="flex flex-col items-center mb-12" v-for="board in boards">
                <img @click="open = board.image" style="cursor: pointer" class="h-56 px-auto" v-bind:src="'/storage/images/' + board.image" alt="">
                <div class="mt-6">{{ board.code }}</div>
                <a style="cursor: pointer" @click="googleLink(board)" class="mt-6">See on Google Earth</a>

            </div>
        </div>
    </div>
</template>

<script setup>
import Navigation from "@/Pages/Adminavigation.vue";
import {Link} from "@inertiajs/inertia-vue3";
import { ref } from 'vue'
let open = ref(false)

function googleLink(board) {
    window.open(board.googlelink, '_blank');
}

function modal() {
    open = true
}

let props = defineProps({
    boards: Object,
    campaign: Object,
});
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
