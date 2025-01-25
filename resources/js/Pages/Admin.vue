<template>
    <div class="bg-gray-500 w-full min-h-screen flex">
        <div class="border-black bg-yellow-400 text-green-700 border-2  mx-auto my-auto mt-56 font-ropa text-xl">
            <div class="mx-auto my-auto border-b-2 border-black pb-5">
                <h1 class="flex justify-center text-black text-3xl">Create</h1>
                <div>
                    <button class="border-black border-2 h-14 w-60 my-3 mx-3">
                        <Link
                            :href="('/board/new')"
                            as="button"
                        >Board</Link>
                    </button>
                </div>
                <div>
                    <button class="border-black border-2 h-14 w-60 mx-3">
                        <Link
                            :href="('/campaigns/new')"
                            as="button"
                        >Campaign</Link>
                    </button>
                </div>
            </div>
            <div class="mx-auto my-auto">
                <h2 class="flex justify-center text-black text-3xl">Manage</h2>
                <div>
                    <button class=" border-black border-2 h-14 w-60 my-3 mx-3">
                        <Link
                            :href="('/boards')"
                            as="button"
                        >Boards</Link>
                    </button>
                </div>
                <div class="border-b-2 border-black pb-2">
                    <button class="border-black border-2 h-14 w-60 my-3 mx-3">
                        <Link
                            :href="('/campaigns')"
                            as="button"
                        >Campaigns</Link>
                    </button>
                </div>
                <div class="bg-black">
                    <button class="border-black border-2 bg-yellow-400 text-black h-14 w-60 mx-3 my-3">
                        <Link
                            :href="('/cms')"
                            as="button"
                        >View table</Link>
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { Link } from '@inertiajs/inertia-vue3';
// export default {
//     name: "Admin.vue"
// }
</script>

<style scoped>

</style>
