<template>
    <div>
        <div id="map-div" style="height: 100vh; "></div>
    </div>
</template>

<script>
import Swal from 'sweetalert2';
export default {
    name: "Map",
    props:['generateRoute','requestData'],
    components:{Swal},
    data() {
        return {
            map: [],
            data: {},
            routeOptions: {},
            initialMarker: [],
            currentLatitude: 47.17,
            currentLongitude: 27.57,
            popupOffsets : {
                top: [0, 0],
                bottom: [0, -70],
                'bottom-right': [0, -70],
                'bottom-left': [0, -70],
                left: [25, -35],
                right: [-25, -35]
            }
        };
    },
    watch:{
      generateRoute: function(){
          this.currentLatitude = this.requestData.latitude;
          this.currentLongitude =this.requestData.longitude;
          this.map.setCenter([this.currentLongitude, this.currentLatitude]);
          this.initialMarker.remove();
          this.initialMarker  = new tt.Marker().setLngLat([this.currentLongitude,this.currentLatitude]).addTo(this.map);
          var popup = new tt.Popup({offset: this.popupOffsets}).setHTML("<b>Poziția ta actuală</b> ");
          this.initialMarker .setPopup(popup).togglePopup();
          this.getRoute();
      }
    },
    mounted() {
        this.map = tt.map({
            key: '3rey3b2DT5N5ej6KQEKgYzaGwnlXjG2m',
            container: 'map-div',
            style: "tomtom://vector/1/basic-main",
            zoom: 15,
            center: [this.currentLongitude, this.currentLatitude]
        });

        this.initialMarker = new tt.Marker().setLngLat([this.currentLongitude,this.currentLatitude]).addTo(this.map);
        var popup = new tt.Popup({offset: this.popupOffsets}).setHTML("<b>Iasi</b> ");
        this.initialMarker.setPopup(popup).togglePopup();

    },
    methods: {
        getRoute() {
            this.requestData.latitude =  this.currentLongitude;
            this.requestData.longitude = this.currentLatitude;
            axios.post('/get-route', this.requestData)
                .then(response => {
                    this.data = response.data;
                    this.displayRoute(this.data);
                })
                .catch((response) => {
                    Swal.fire({
                        title: "Oops...",
                        text: response.data.message,
                        confirmButtonText: "Ok"
                    })
                });
        },

        displayRoute(geo) {
            this.map.addLayer({
                'id': 'route',
                'type': 'line',
                'source': {
                    'type': 'geojson',
                    'data': geo
                },
                'paint': {
                    'line-color': 'blue',
                    'line-width': 5
                }
            });

        }
    }
}
</script>

<style scoped>

</style>
