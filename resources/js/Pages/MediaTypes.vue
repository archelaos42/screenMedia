<template>
<Navigation />

    <Teleport to="body">
        <div v-if="!open===false" class="modal">
            <img class="max-h-96" v-bind:src='open' alt="">
            <p>Hello from the modal!</p>
            <button @click="open = false">Close</button>
        </div>
    </Teleport>
    <div @click.self="open = false">
        <div class="flex">
            <div class="bg-yellow-300 py-4 pl-96 w-1/2 my-6">
                <h1 class="font-bold font-ropa  text-6xl">Vrste Media</h1>
            </div>
            <div class="bg-yellow-300 w-1/2 my-6">
            </div>
        </div>

        <div @click.self="open = false" class="border-b border-black mx-96">
            <div class="flex mb-8">
                <div class="h-80 w-10/12">
                    <h1 @click.self="open = false" class="font-bold font-ropa text-yellow-300 text-2xl mb-3">BILLBOARD</h1>
                    <h1 @click.self="open = false" class="font-bold font-ropa mb-4">BILLBOARD are all you need to drive your message home... Or to your business.</h1>
                    <div>
                            <img @click="open = 'https://screenmedia.rs/images/vrste_media/1.jpg'" style="cursor: pointer" class="h-44 mr-4 float-left" src="https://screenmedia.rs/images/vrste_media/1.jpg" alt="">
                            <img @click="open = 'https://screenmedia.rs/images/vrste_media/2.jpg'" style="cursor: pointer" class="h-44 ml-4 float-right" src="https://screenmedia.rs/images/vrste_media/2.jpg" alt="">
                            <p @click.self="open = false" class="text-sm">Kompanija screen media svojim klijentima omogucava oglasavanje na razlicitim vrstama media, a nas tim strucnjaka
                            ce Vam pomoci da odaberete oglasni prostor na lokacijama koje ce najbolje predstaviti Vas I Vas proizvod. Billboard
                            je medij koji  moze da zadovolji  najveci deo potreba  za outdoor oglasavanjem.  Oglasavanje na  billboard  mediima
                            pored brojnih mogucnosti za aplikaciju reklamne poruke  pruza mogucnost da pravilnim  media planiranjem  svojom kampanjom
                            postignete maksimalnu  teritorijalnu pokrivenost. Koriscenje billboarda  u kampanjama ima  drugaciji  znacaj  na oglasavanje
                            u odnosu  na stampana izdanja I TV reklame, jer ne zahteva nikakvo dodatno angazovanje. </p>



                    </div>
                </div>
            </div>
        </div>
        <div @click.self="open = false" class="border-b border-black mx-96 mt-8">
            <div class="flex mb-8">
                <div class=" w-6/12">
                    <h1 @click.self="open = false" class="font-bold font-ropa text-yellow-300 text-2xl mb-3">MEGABOARD</h1>
                    <h1 @click.self="open = false" class="font-bold font-ropa mb-4">OOH BIGBOARDS is a great LARGE FORMAT MEDIUM that can visually express what you have to say in an instant.</h1>
                    <div  class="text-sm">
                        <img @click="open = 'https://screenmedia.rs/images/vrste_media/3.jpg'" style="cursor: pointer" class="h-44 mr-4 float-left" src="https://screenmedia.rs/images/vrste_media/3.jpg" alt="">
                        <p @click.self="open = false">Mega board je billboard velikih dimenzija i kao takav predstavlja  uglavnom usamljeni svetionik pored puta koji šalje jasnu i upečatljivu poruku.
                            Zbog svojih ogromnih dimenzija, visine je preko 15 m, povrsine preko 50m2,  Mega board se postavlja uglavnom pored frekventnih saobraćajnica, van
                            urbanih zona, najpre pored auto puta gde je linija preglednosti velika. Pošto dominira prostorom i svojom veličinom, Mega board je pogodan za
                            emitovanje snažne i efektne poruke koju  svi ucesnici u saobracaju  moraju  da primete. Zbog toga je Mega board pogodan  za razne vrste art umetnosti
                            i alternativne oblike kreativnih resenja  outdoor oglašavanja (ekstenzije, svetlosni efekti)  koji znatno doprinose  da poruka bolje komunicira sa
                            publikom u pokretu. Mega board je  preporučljiv za korporativne kampanje, za zadržavanje i podizanje postojeće svesti o brendu, daje pojačani efekat
                            i snažnu poruku drugim medijima na način da poruka živi duže vremensko razdoblje. </p>
                        <br>
                        <p>Samim tim što je pored frekventnih saobraćajnica, Mega board se često koristi i kao navigacija za razne objekte koji se nalaze pored  auto puta jer se
                            obraća dinamičnoj publici u pokretu : pumpe, hoteli, restorani, aqua parkovi, I  razni objekti za odmor i rezonodu. </p>
                        <br>
                        <p>Neprekidno i dugoročno predstavlja razglednicu za publiku u pokretu. </p>
                        <br>
                    </div>
                </div>


                <div class="ml-6 mt-8">
                    <div @click.self="open = false" class="flex mb-3">
                        <div class="flex items-center pl-4 w-60 text-xs bg-yellow-400 h-5 rounded-full z-20">
                            DIZAJN 70%
                        </div>
                        <div class="bg-gray-500 h-5 w-24 rounded-full -ml-4 z-100">

                        </div>
                    </div>
                    <div @click.self="open = false" class="flex mb-3">
                        <div class="flex items-center pl-4 w-80 text-xs bg-yellow-400 h-5 rounded-full">
                            LOKACIJA 100%
                        </div>
                    </div>
                    <div @click.self="open = false" class="flex mb-3">
                        <div class="flex items-center pl-4 customargin1 text-xs bg-yellow-400 h-5 rounded-full z-20">
                            CENA 50%
                        </div>
                        <div class="bg-gray-500 h-5 customargin2 rounded-full -ml-4 z-100">

                        </div>
                    </div>
                    <div @click.self="open = false" class="flex mb-3">
                        <div class="flex items-center pl-4 w-80 text-xs bg-yellow-400 h-5 rounded-full">
                            IDEJA 100%
                        </div>
                    </div>
                    <div @click.self="open = false" class="flex mb-3">
                        <div class="flex items-center pl-4 w-36 text-xs bg-yellow-400 h-5 rounded-full z-20">
                            USLUGA 45%
                        </div>
                        <div class="bg-gray-500 h-5 w-48 rounded-full -ml-4 z-100">

                        </div>
                    </div>
                </div>



            </div>
        </div>
    </div>
    <Footer />
</template>

<script setup>
import Navigation from "@/Pages/Navigation.vue";
import Footer from "@/Pages/Footer.vue";
import { ref } from 'vue'
let open = ref(false)
</script>

<style scoped>
.customargin1{
    width: 168px;
}
.customargin2{
    width: 170px;
}
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
