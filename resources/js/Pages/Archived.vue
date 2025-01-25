<template>
    <Adminavigation />

    <h1 class="font-bold font-ropa pt-10 text-center text-tra text-3xl">Archived Campaigns</h1>

    <div class="flex grid grid-cols-4 mt-12">
        <div class="flex flex-col items-center mb-12" v-for="campaign in campaigns">
            <Link :href="'/admin/campaign/' + campaign.id">
                <img class="h-56 px-auto" src="https://img.freepik.com/premium-photo/blank-billboard-mockup-concept-city-copy-space-announce-put-your-image-text-blank-space_146482-9635.jpg" alt="">
                <div class="mt-6">{{ campaign.name }}</div>
            </Link>
        </div>
    </div>
</template>

<script setup>
import Adminavigation from "@/Pages/Adminavigation.vue";
import { Link } from '@inertiajs/inertia-vue3';


let props = defineProps({
    campaigns: Object,
});
</script>

<style scoped>

</style>
