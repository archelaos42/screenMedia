<template>
    <GoogleMap
        api-key="AIzaSyA24VvyXwK-U3cESepOTZaytSkrDXLPgYU"
        style="width: 100%; height: 100vh;"
        :center="center"
        :zoom="15"
    >
        <Marker :options="{ position: { lat: 40.689247, lng: -74.044502 }, title: '65443',}"
                 @click="rel('https://www.google.com/maps')"/>

        <Marker :options="{ position: { lat: 44.799206733600236, lng: 20.521320375272634 }, title: '65441',}"
                @click="rel('https://www.google.com/maps/@44.7952983,20.4998304,3a,75y,113.53h,86.45t/data=!3m7!1e1!3m5!1sJLJR0nu0BQkjSr0cQwNMpQ!2e0!6shttps:%2F%2Fstreetviewpixels-pa.googleapis.com%2Fv1%2Fthumbnail%3Fpanoid%3DJLJR0nu0BQkjSr0cQwNMpQ%26cb_client%3Dmaps_sv.share%26w%3D900%26h%3D600%26yaw%3D113.53318658891945%26pitch%3D3.5459616376533774%26thumbfov%3D90!7i13312!8i6656?coh=205410&entry=ttu')"/>



    </GoogleMap>
</template>

<script setup>
import { GoogleMap, Marker } from 'vue3-google-map'
const center = { lat: 44.799206733600236, lng: 20.521320375272634 }
function rel(url) {
    window.open(url, '_blank');

}
</script>



<style scoped>

</style>
