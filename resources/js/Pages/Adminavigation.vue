<template>
    <nav class="flex justify-between font-ropa text-transform: uppercase border-2 border-black border-solid">
        <div class="w-2/12">
            <div class="h-4 mb-4">
                <!--                <a class="justify-items-center" href="/"><img src="https://bima.co.uk/wp-content/uploads/2019/11/screenmedia-logo-500x500-1.jpg" alt=""></a>-->
                <a href="/"><img src="http://screenmedia.test/storage/logo.png" alt=""></a>

                <!--                    <a href="/"><img src="storage/app/public/logo.png" alt=""></a>-->
            </div>
        </div>

        <div class="w-9/12 h-4">
            <ul class="flex py-4 ">
                <li class="ml-auto mr-3"><NavLink href="/admin/cms" class="hover:underline" :class="{'font-bold underline': $page.component === 'Cms'}"><span class="font-bold text-lg text-black">CMS</span></NavLink></li>
                <li class="mr-3"><NavLink href="/admin/campaigns" class="hover:underline" :class="{'font-bold underline': $page.component === 'Campaigns'}"><span class="font-bold text-lg text-black">CAMPAIGNS</span></NavLink></li>
                <li class="mr-3"><NavLink href="/admin/boards" class="hover:underline" :class="{'font-bold underline': $page.component === 'Boards'}"><span class="font-bold text-lg text-black">BOARDS</span></NavLink></li>
                <li class="mr-3"><NavLink href="/admin/archived" class="hover:underline" :class="{'font-bold underline': $page.component === 'Archived'}"><span class="font-bold text-lg text-black">ARCHIVED</span></NavLink></li>
            </ul>
        </div>
        <div class="flex w-1/12 max-h-10 py-8 justify-center">

        </div>
    </nav>
</template>

<script setup>
import NavLink from "../Components/NavLink.vue";
</script>

<style scoped>

</style>
