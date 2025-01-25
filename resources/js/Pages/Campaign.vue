<template>
    <div @click.self="open = false" id="wrapper">
        <Adminavigation />
        <div class="text-center">
            <h1 class="font-bold font-ropa pt-10 text-center text-tra text-3xl">{{campaign.name}} -
                <span v-if="campaign.status === 'archived'" class="text-red-600">Archived</span>
                <span v-else class="text-green-600">Active</span>
            </h1>
            <h1 class="mb-16 font-bold font-ropa pt-10 text-center text-tra text-3xl">{{campaign.start}} - {{campaign.end}}</h1>
            <h1 v-if="!boards.length > 0" class="mb-16 font-bold font-ropa pt-10 text-center text-tra text-xl">This campaign does not have any boards yet</h1>
                <Link
                    :href="('/campaigns/populate/' + campaign.id)"
                    class="px-3 py-2 rounded text-white mx-auto text-sm font-bold whitespace-no-wrap bg-blue-600 hover:bg-blue-800"
                    as="button"
                >Populate</Link>
            <input class="absolute -z-50 opacity-0" type="text" id="url">
                <button class="px-3 py-2 ml-12 rounded text-white mx-auto text-sm font-bold whitespace-no-wrap bg-green-600 hover:bg-green-800" @click="copy()" type="button">Get Link</button>
                <button v-if="campaign.status === 'active'" class="text-transform: uppercase ml-12">
                    <Link
                        :href="('/admin/campaigns/archive')"
                        method="post"
                        :data="{
                                                    campaign: campaign.id,
                                                    }"
                        class="px-3 py-2 mr-2 rounded text-white text-sm font-bold whitespace-no-wrap w-20 bg-red-400 hover:bg-blue-800"
                        as="button"
                    >Archive</Link>

                </button>
                <button v-if="campaign.status === 'archived'" class="text-transform: uppercase ml-12">
                    <Link
                        :href="('/admin/campaigns/activate')"
                        method="post"
                        :data="{
                                                        campaign: campaign.id,
                                                        }"
                        class="px-3 py-2 mr-2 rounded text-white text-sm font-bold whitespace-no-wrap w-20 bg-green-400 hover:bg-blue-800"
                        as="button"
                    >Activate</Link>

                </button>
<!--            <div v-if="flash === true">Link copied to clipboard!</div>-->
            <div class="mt-8" v-if="$page.props.flash.message">{{$page.props.flash.message}}</div>
        </div>
        <!--    <button @click="open = true">Open Modal</button>-->

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

<!--    <div v-if="$page.props.flash.message">Archived!</div>-->
</template>

<script setup>
import Adminavigation from "@/Pages/Adminavigation.vue";
import {Link} from "@inertiajs/inertia-vue3";
import {onMounted, ref, watch} from 'vue'
let open = ref(false)
let text = null;
// let flash = false;
let flash = ref(false)

function googleLink(board) {
    window.open(board.googlelink, '_blank');
}
function copy() {
    console.log(flash)
    flash.value = true;
    console.log(flash)
    const textToCopy = document.getElementById('url')
    textToCopy.select()
    document.execCommand('copy')
    setTimeout(() => {
        // console.log('on');

        flash.value = false;

    }, 3000)
}
// watch(
//     () => flash,
//     () => {
//         setTimeout(() => {
//             // console.log('on');
//
//             flash = false
//
//         }, 2000)
//     }
// )


// function modal() {
//     open = false
// }

let props = defineProps({
    boards: Object,
    campaign: Object,
});

onMounted(() => {
    document.getElementById('url').value = "http://screenmedia.test/campaign/" + props.campaign.id
})

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
