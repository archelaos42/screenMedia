<template>
    <Adminavigation />

    <h1 class="font-bold font-ropa pt-10 text-center text-tra text-3xl">{{campaign.name}}</h1>
    <h1 class="mb-12 font-bold font-ropa pt-10 text-center text-tra text-xl">{{campaign.start}} - {{campaign.end}}</h1>

    <Teleport to="body">
        <div v-if="!open===false" class="modal">
            <img class="max-h-96" v-bind:src="'/storage/images/' + open" alt="">
            <p>Hello from the modal!</p>
            <button @click="open = false">Close</button>
        </div>
    </Teleport>

    <div @click.self="open = false">
        <div @click.self="open = false" class="mt-12 text-center mx-auto w-7/12 border-b-2">
            <div @click.self="open = false" class="flex items-center justify-center pb-4  border-t-2 border-x-2" v-for="board in orderedBoards">
                <div class="mt-6 mr-4 w-12">{{ board.id }}</div>
                <div class="mt-6 mx-8 w-24">{{ board.address }}</div>
    <!--            <div class="mt-6 mx-12">{{ board.campaignId }}</div>-->
                <div @click.self="open = false" class="flex" v-if="(board.campaignId === campaign.id)">
                    <div class="mt-6 mx-10 w-44 border-red-400 border-2 px-9 py-2">{{ board.start }}</div>
                    <span class="pt-8">-</span>
                    <div class="mt-6 mx-10 w-44 border-red-400 border-2 px-9 py-2">{{ board.end }}</div>
                </div>
                <div @click.self="open = false" class="flex" v-else>
                    <div class="mt-6 mx-10"><input class="w-44 border-green-400 border-2" id="start" :min="campaign.start" :max=campaign.end v-model="board.start" type="date" placeholder="Start date" /></div>
                    <span class="pt-8">-</span>
                    <div class="mt-6 mx-10"><input class="w-44 border-green-400 border-2" id="end" :min="campaign.start" :max=campaign.end v-model="board.end" type="date" placeholder="End date" /></div>
                </div>


                <button v-if="(board.campaignId === campaign.id)" class="flex text-transform: uppercase pr-1 pt-2 mt-3 pl-2">
                    <Link
                        :href="('/campaigns/remove')"
                        method="post"
                        :data="{
                                                booking: board.bookingId,
                                                }"
                        preserve-scroll
                        class="px-3 py-2 mr-2 rounded text-white text-sm font-bold whitespace-no-wrap w-20 bg-red-400 hover:bg-blue-800"
                        as="button"
                    >Remove</Link>

                </button>

                <button v-else class="flex text-transform: uppercase pr-1 pt-2  mt-3 pl-2">
                    <Link
                        :href="('/campaigns/add')"
                        method="post"
                        :data="{
                                                board: board.id,
                                                campaign: campaign.id,
                                                start: board.start,
                                                end: board.end,
                                                }"
                        preserve-scroll
                        class="px-3 py-2 mr-2 rounded text-white text-sm font-bold whitespace-no-wrap w-20 bg-green-400 hover:bg-blue-800"
                        as="button"
                    >Add</Link>

                </button>
                <div @click.self="open = false" class="w-24 ml-14 mt-4" style="cursor: pointer">
                    <img @click="open = board.image" class="h-20" v-bind:src="'/storage/images/' + board.image" alt="">
                </div>
            </div>
        </div>
    </div>

</template>

<script setup>
import { Link } from '@inertiajs/inertia-vue3';
import _ from 'lodash'
import {computed, ref} from "vue";
import Adminavigation from "@/Pages/Adminavigation.vue";
// import {computed} from "vue";
// export default {
//     name: "Populate"
// }

const orderedBoards = computed(() => {
    return _.orderBy(props.boards, 'id')
})
let props = defineProps({
    boards: Object,
    campaign: Object,
    bookings: Object,
});

let open = ref(false)
// function modal() {
//     open = true
// }
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
