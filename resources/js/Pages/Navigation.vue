<template>
    <nav class="flex justify-between font-ropa text-transform: uppercase border-2 border-black border-solid">
        <div class="w-2/12">
            <div class="h-4 mb-4">
                <!--                <a class="justify-items-center" href="/"><img src="https://bima.co.uk/wp-content/uploads/2019/11/screenmedia-logo-500x500-1.jpg" alt=""></a>-->
                <a href="/"><img src="http://screenmedia.test/storage/logo.png" alt=""></a>

                <!--                    <a href="/"><img src="storage/app/public/logo.png" alt=""></a>-->
            </div>
        </div>

        <div class="w-9/12 h-16">
            <ul class="flex py-4 ">
                <li class="ml-auto mr-3"><NavLink href="/" class="hover:underline" :class="{'font-bold underline': $page.component === 'Home'}"><span class="font-bold text-lg text-black">HOME</span></NavLink></li>
                <li class="mr-3"><NavLink href="/mediatypes" class="hover:underline" :class="{'font-bold underline': $page.component === 'MediaTypes'}"><span class="font-bold text-lg text-black">VRSTE MEDIA</span></NavLink></li>
                <li
                    @mouseover="hover=true" @mouseleave="hover = false"
                    class="mr-3 flex">
                    <div class="inline-grid">
                        <NavLink href="#" class=" hover:underline"><span class="font-bold text-lg text-black">OPSTI USLOVI POSLOVANJA</span></NavLink>
                        <div @click="download" v-if="!hover===false" class=" hover:underline z-50"><div style="cursor: pointer" class="bg-white pl-2 py-3 mt-3.5 h-12 font-bold text-md border-2 text-black">OPSTI USLOVI OGLASAVANJA</div></div>
                        <div @click="download" v-if="!hover===false" class=" hover:underline z-50"><div style="cursor: pointer" class="bg-white pl-2 py-3 h-12 font-bold text-md text-black border-l-2 border-r-2">CENOVNIK OGLASAVANJA</div></div>
                        <div @click="download" v-if="!hover===false" class=" hover:underline z-50"><div style="cursor: pointer" class="bg-white pl-2 py-3 h-12 font-bold text-md text-black border-2">OPSTI USLOVI POSLOVANJA</div></div>
<!--                        <NavLink @click="download" v-if="!hover===false" href="download" class=" hover:underline z-50" :class="{'font-bold underline': $page.component === 'Products'}"><div class="bg-white my-0 mx-0 font-bold text-lg text-black">OPSTI USLOVI POSLOVANJA</div></NavLink>-->
<!--                        <NavLink @click="download" v-if="!hover===false" href="download" class=" hover:underline z-50" :class="{'font-bold underline': $page.component === 'Products'}"><div class="bg-white my-0 mx-0 font-bold text-lg text-black">OPSTI USLOVI POSLOVANJA</div></NavLink>-->
<!--                        <NavLink @click="download" v-if="!hover===false" href="download" class=" hover:underline z-50" :class="{'font-bold underline': $page.component === 'Products'}"><div class="bg-white my-0 mx-0 font-bold text-lg text-black">OPSTI USLOVI POSLOVANJA</div></NavLink>-->
                    </div></li>
                <li class="mr-3"><NavLink href="/OOH" class=" hover:underline" :class="{'font-bold underline': $page.component === 'OOH'}"><span class="font-bold text-lg text-black">OOH</span></NavLink></li>
                <li class="mr-3"><NavLink href="/contact" class=" hover:underline" :class="{'font-bold underline': $page.component === 'Contact'}"><span class="font-bold text-lg text-black">KONTAKT</span></NavLink></li>
                <li class="mr-3"><NavLink href="/locations" class=" hover:underline" :class="{'font-bold underline': $page.component === 'Products'}"><span class="font-bold text-lg text-black">LOKACIJE</span></NavLink></li>

            </ul>
        </div>
        <div class="flex w-1/12 justify-center items-center">
            <NavLink href="/admin/cms" class="hover:underline" :class="{'font-bold underline': $page.component === 'Products'}"><span class="mb-1 font-bold text-lg text-black">ADMIN</span></NavLink>
        </div>
    </nav>
</template>

<script setup>
import {ref} from "vue";
import NavLink from "../Components/NavLink.vue";

function download() {
    window.open('/download', '_blank');

}

// export default {
//     name: "Navigation"
// }

let hover = ref(false)
</script>

<style scoped>

</style>
