<template>
<Navigation />

    <div class="flex">
        <div class="bg-yellow-300 py-4 pl-96 w-1/2 my-6">
            <h1 class="font-bold font-ropa  text-6xl">Kontaktirajte nas</h1>
            <h1 class="font-bold font-ropa  pt-3 text-2xl">I mi cemo odgovoriti na sva Vasa pitanja</h1>
        </div>
        <div class="bg-yellow-300 w-1/2 my-6">
        </div>
    </div>

    <GoogleMap
        api-key="AIzaSyA24VvyXwK-U3cESepOTZaytSkrDXLPgYU"
        style="width: 78%; height: 30vh;"
        :center="center"
        :zoom="15"
    >
        <Marker :options="{ position: center, title: '65443',}"
                @click="rel('https://www.google.com/maps')"/>



    </GoogleMap>
    <div class="flex mt-12 customargin2">
        <div class="w-1/2">
        </div>
        <div class="w-1/2 pl-12">
            <h1 class="font-bold font-ropa  pt-3 text-2xl">Info</h1>
            <p>
                Aleksandra Samboliskog<br>
                11000 Beograd, Srbija<br>
                Telefon: <span class="ml-12">+381113679 099</span><br>
                GSM: <span class="ml-16">+38163 8215 420</span><br>
                GSM: <span class="ml-16">+38165 6699 936</span><br>
                FAX: <span class="customargin1">+381 11 3679 099</span><br>
                E-mail: <span class="text-yellow-600 ml-3">office@screenmedia.rs</span>

            </p>
        </div>
    </div>

    <Footer />
</template>

<script setup>
import { GoogleMap, Marker } from 'vue3-google-map'
import Navigation from "@/Pages/Navigation.vue";
import Footer from "@/Pages/Footer.vue";
const center = { lat: 44.78155055958942, lng: 20.462177668991927 }

</script>

<style scoped>
.customargin1 {
    margin-left: 70px;
}
.customargin2 {
    margin-bottom: 93px;
}
</style>
