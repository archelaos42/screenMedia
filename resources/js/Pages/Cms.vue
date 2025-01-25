<template>
    <Adminavigation />

    <div  class="overflow-x-auto">
        <div class="flex">
            <div>
                <div class="w-8 h-8  text-center border-solid border-black border-2">Id</div>
            </div>
            <div>
                <div class="w-16 h-8 text-center border-solid border-black border-2">Code</div>
            </div>
            <div>
                <div class="w-48 h-8 text-center border-solid border-black border-2">Address</div>
            </div>
            <div v-for="timeslot in timeslots">
                <div class="w-48 h-8 text-center items-center border-solid border-black border-2">
                    Week {{ timeslot.weekNo}}
                </div>
            </div>
        </div>
        <div class="flex" v-for="board in boards">
            <div class="flex">
                <div class="w-8 h-8 text-center border-solid border-black border-2">{{ board.id }}</div>
                <div class="w-16 h-8 text-center border-solid border-black border-2">{{ board.code }}</div>
                <div class="w-48 h-8 text-center border-solid border-black border-2">{{ board.address }}</div>
                <div v-for="timeslot in timeslots" class="text-center items-center w-48 h-8 border-solid border-black border-2">
                    <div v-for="booking in bookings">
                        <div  v-if="booking.status === 'active' && board.id === booking.board_id &&
                        booking.start <= timeslot.start && booking.end >= timeslot.end">
                            {{ booking.campaign.name }}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</template>

<script setup>
import Adminavigation from "@/Pages/Adminavigation.vue";

let props = defineProps({
    boards: Object,
    bookings: Object,
    timeslots: Array,
});
</script>

<style scoped>

</style>
