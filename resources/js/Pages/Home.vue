<template>
    <div class="wrapper">
        <Navigation />
        <div class="relative">
            <img src="/storage/images/s.jpg" alt="">
            <img v-if="slide === 1" class="board" src="/storage/images/1.jpg" alt="">
            <img v-if="slide === 2" class="board" src="/storage/images/2.jpg" alt="">
            <img v-if="slide === 3" class="board" src="/storage/images/3.jpg" alt="">
<!--            <img v-if="slide === 1" class="absolute w-2/6 left-14 h-2/6 top-16 -rotate-6 -skew-x-6 skew-y-12" src="/storage/images/1.jpg" alt="">-->
<!--            <img v-if="slide === 2" class="absolute w-2/6 left-14 h-2/6 top-16 -rotate-6 -skew-x-6 skew-y-12" src="/storage/images/2.jpg" alt="">-->
<!--            <img v-if="slide === 3" class="absolute w-2/6 left-14 h-2/6 top-16 -rotate-6 -skew-x-6 skew-y-12" src="/storage/images/3.jpg" alt="">-->

            <div v-if="animation===false" class="bg-orange-400 opacity-70 banner flex justify-center items-center">
                <div class="
                font-semibold bg-gradient-to-r bg-clip-text text-transparent from-blue-600 via-green-600 to-red-600 absolute animate-text opacity-100 text-3xl label">
                    WATCH THIS
                </div>
            </div>
<!--            <div v-if="animation===true" class="absolute bg-green-400 w-2/6 left-14 h-72 opacity-70 top-16 text-center py-3 -rotate-6 -skew-x-6 skew-y-12">-->
                <div v-if="animation===true" class="bg-green-400 opacity-70 text-center py-3 board flex justify-center items-center">
                <div class="font-semibold animate-bounce text-3xl label">A BILLBOARD CANNOT BE TURNED OFF!</div>
            </div>
            <button @click="animation = true" class="button text-red-600">
                <img class="h-6 -rotate-6 -skew-x-6 skew-y-12" src="/storage/images/pop_close.png" alt="">
            </button>

        </div>
        <div class="flex mx-24 mt-12">
            <div class="w-3/4">
                <h1 class="mb-12 font-bold font-ropa pt-6 text-center text-3xl">Iskoristite bilbord za</h1>
                <div class="grid grid-cols-2">
                    <div class="">
                        <h2 class="ml-32 w-96 text-center">Kampanje</h2>
                        <img class="h-56 w-96 ml-32" src="https://www.bluelinemedia.com/images/bulletin-1-500x375.jpg" alt="">
                    </div>
                    <div class="">
                        <h2 class="w-96 text-center">Korporativne Promocije</h2>
                        <img class="h-56 w-96 mr-32" src="https://midwestbillboards.com/wp-content/uploads/2021/09/29045-Town-East-Beauty-1500.jpg" alt="">
                    </div>
                    <div class="">
                        <h2 class="ml-32 w-96 mt-12 text-center">Inovacije</h2>
                        <img class="h-56 w-96 ml-32" src="https://trueimpactmedia.com/wp-content/uploads/2022/02/10-Advantages-of-Using-Billboards.jpg" alt="">
                    </div>
                    <div class="">
                        <h2 class="w-96 mt-12 text-center">Navigaciju</h2>
                        <img class="h-56 w-96 mr-32" src="https://www.sbsprint.com/wp-content/uploads/2022/08/billboard-advertising-1024x493.webp" alt="">
                    </div>
                </div>
            </div>
            <div class="w-1/3 border-l-2 border-black border-dashed px-32">
                <h1 class="font-bold font-ropa pt-10 text-center text-tra text-3xl">O nama</h1>
                <p class="pt-10">Screen media je kompanija koja svoje poslovanje orjentise prema klijentima i  njihovim  potrebama.<br />
                    <br />
                    Imajuci u vidu ovakvu orjentaciju, kompanija screen media nastoji de se  u svom poslovanju  rukovodi  principima  kvaliteta I efikasnosti u isporuci usluga  prilikom realizacije  svake outdoor kampanje.<br />
                    <br />
                    Dugogodisnje medjunarodno iskustvo menadzmenta  u outdoor poslovanju  pruza oglasivacima dodatnu sigurnost da ce priprema I realizacija svih kampanja na  mrezi screen media  biti realizovana profesionalno efikasno I uspesno. </p>
            </div>
        </div>
    </div>


    <Footer />
</template>

<script setup>
import { Link, useForm } from '@inertiajs/inertia-vue3';
import NavLink from "../Components/NavLink.vue";
import {onMounted, ref, watch} from "vue";
import Navigation from "@/Pages/Navigation.vue";
import Footer from "@/Pages/Footer.vue";

// function animate() {
//     animation = true
//     // setTimeout(() => {
//     //     animation = false
//     //
//     // }, 5000)
//     // console.log(animation)
// }
let slide = ref(0)
let animation = ref(false)

onMounted(() => {
        slide.value = 1

})

watch(
    () => animation.value,
    () => {
        if(animation.value === true){
            setTimeout(() => {
                // console.log('on');

                animation.value = false

            }, 3000)
        }
    }
)

watch(
    () => slide.value,
    () => {
        setTimeout(() => {
            if (slide.value < 3) {
                slide.value++;
            } else {
                slide.value = 1
            }

        }, 10000)
    }
)


</script>

<style scoped>
.board {
    position: absolute;
    width: 34.91%;
    left: 2.65%;
    height: 43.5%;
    top: 4.4%;
    transform: rotate(-6deg) skewX(-6deg) skewY(12deg);
}
.banner {
    position: absolute;
    width: 34.91%;
    left: 2.65%;
    height: 7%;
    top: 23%;
    transform: rotate(-6deg) skewX(-6deg) skewY(12deg);
}
.button {
    position: absolute;
    height: 1%;
    width: 3%;
    left: 34%;
    top: 12%;
}
.label {
    position: absolute;
    @media (min-width: 640px) { font-size: 0.75rem; }
    @media (min-width: 768px) { font-size: 1rem; }
    @media (min-width: 1024px) { font-size: 1.25rem; }
    @media (min-width: 1280px) { font-size: 1.5rem; }
    @media (min-width: 1536px) { font-size: 1.875rem; }




}
</style>
