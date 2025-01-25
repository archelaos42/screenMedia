<template>
    <div @click.self="open = false" id="wrapper">
        <Adminavigation />
        <NewBoard />


    <!--    <button @click="open = true">Open Modal</button>-->

        <Teleport to="body">
            <div v-if="!open===false" class="modal">
                <img class="max-h-96" v-bind:src="'/storage/images/' + open" alt="">
                <button @click="open = false">Close</button>
            </div>
        </Teleport>

        <Teleport to="body">
            <div v-if="!confirm===false" class="modal">
                <p class="text-xl">Are you sure you want to delete this board?</p>
                <div class="flex justify-center items-center h-10 mb-4">
                    <button class="flex pr-1 pt-2  mt-3 pl-2">
                        <Link
                            :href="('/board/destroy/' + confirm)"
                            method="post"
                            :data="{
                                                board: confirm,
                                                }"
                            class=" py-1 rounded text-white font-bold whitespace-no-wrap w-20 bg-green-400 hover:bg-blue-800"
                            as="button"
                        >Yes</Link>
                    </button>
                    <div class="flex pr-1 pt-2  mt-3 pl-2 mr-3">
                        <button @click="confirm = false" class=" py-1 rounded w-20 text-white font-bold whitespace-no-wrap bg-red-600 hover:bg-blue-800">
                            No

                        </button>
                    </div>
                </div>
            </div>
        </Teleport>


        <div @click.self="open = false" class="flex grid grid-cols-4 mt-12">
            <div @click.self="open = false" class="flex flex-col items-center mb-12" v-for="board in boards">
                <img @click="open = board.image" style="cursor: pointer" class="h-56 px-auto" v-bind:src="'/storage/images/' + board.image"
                     alt="https://img.freepik.com/premium-photo/blank-billboard-mockup-concept-city-copy-space-announce-put-your-image-text-blank-space_146482-9635.jpg">
                <div class="mt-6">{{ board.code }}</div>
                <a v-bind:href=" board.googlelink " class="mt-6">See on Google Earth</a>
                <div class="flex">
                    <button class="flex pr-1 pt-2  mt-3 pl-2 mr-3">
                        <Link
                            :href="('/admin/board/edit/' + board.id )"
                            class="px-3 py-2 mr-2 rounded text-white text-sm font-bold whitespace-no-wrap bg-blue-600 hover:bg-blue-800"
                            as="button"
                        >Edit</Link>

                    </button>
                    <div class="flex pr-1 pt-2  mt-3 pl-2 mr-3">
                        <button  @click="confirm = board.id" class="px-3 py-2 mr-2 rounded text-white text-sm font-bold whitespace-no-wrap bg-red-600 hover:bg-blue-800">
                            Delete

                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import Adminavigation from "@/Pages/Adminavigation.vue";
import NewBoard from "@/Pages/NewBoard.vue";
import {Link} from "@inertiajs/inertia-vue3";
import { ref } from 'vue'
let open = ref(false)
let confirm = ref(false)

// function modal() {
//     open = true
// }


let props = defineProps({
    boards: Object,
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
