<template>
    <Adminavigation />
    <NewCampaign />

    <Teleport to="body">
        <div v-if="!confirm===false" class="modal">
            <p class="text-xl">Are you sure you want to delete this campaign?</p>
            <div class="flex justify-center items-center h-10 mb-4">
                <button class="flex pr-1 pt-2  mt-3 pl-2">
                    <Link
                        :href="('/campaign/destroy/' + confirm)"
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

    <h1 class="font-bold font-ropa pt-10 text-center text-tra text-3xl">Active Campaigns</h1>
    <div class="flex grid grid-cols-4 mt-12">
        <div class="flex flex-col items-center mb-12" v-for="campaign in campaigns">
            <Link :href="'/admin/campaign/' + campaign.id">
                <div class="relative text-center">
                    <img class="h-56 px-auto" src="https://img.freepik.com/premium-photo/blank-billboard-mockup-concept-city-copy-space-announce-put-your-image-text-blank-space_146482-9635.jpg" alt="">
                    <div class="absolute w-40 customargin flex justify-center items-center text-3xl">{{ campaign.name }}</div>
<!--                    <img class="absolute w-40 top-20 left-32" src="https://www.anovo.si/img/logo.jpg" alt="">-->
                    <span>{{ campaign.start }} - {{campaign.end}}</span>
                </div>
            </Link>
            <div class="flex">
                <button class="flex pr-1 pt-2  mt-3 pl-2 mr-3">
                    <Link
                        :href="('/admin/campaign/edit/' + campaign.id )"
                        class="px-3 py-2 mr-2 rounded text-white text-sm font-bold whitespace-no-wrap bg-blue-600 hover:bg-blue-800"
                        as="button"
                    >Edit</Link>

                </button>
                <div class="flex pr-1 pt-2 mt-3 pl-2 mr-3">
                    <button @click="confirm = campaign.id" class="px-3 py-2 mr-2 rounded text-white text-sm font-bold whitespace-no-wrap bg-red-600 hover:bg-blue-800">
                        Delete

                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import Adminavigation from "@/Pages/Adminavigation.vue";
import NewCampaign from "@/Pages/NewCampaign.vue";
import { Link } from '@inertiajs/inertia-vue3';
import {ref} from "vue";
let confirm = ref(false)

let props = defineProps({
    campaigns: Object,
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
.customargin {
    top: 60px;
    left: 130px;
    height: 76px;
}
</style>
