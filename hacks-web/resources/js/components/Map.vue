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
          var popup = new tt.Popup({offset: this.popupOffsets}).setHTML("<b>Pozitia ta actuala</b> ");
          this.initialMarker .setPopup(popup).togglePopup();
          this.getRoute();
      }
    },
    mounted() {
        this.map = tt.map({
            key: '3rey3b2DT5N5ej6KQEKgYzaGwnlXjG2m',
            container: 'map-div',
            style: "tomtom://vector/1/basic-main",
            zoom: 10,
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
            console.log(this.requestData);
            axios.post('/get-route', this.requestData)
                .then(response => {
                    this.data = response.data;
                    var coords = this.data.features[this.data.features.length-3].geometry.coordinates;


                    this.initialMarker = new tt.Marker().setLngLat([coords[0],coords[1]]).addTo(this.map);
                    var popup = new tt.Popup({offset: this.popupOffsets}).setHTML(`<b>Destinatie</b> `);
                    this.initialMarker.setPopup(popup).togglePopup();

                    for(let i=1; i<this.data.features.length-3; i++){
                        var coords2 = this.data.features[i].geometry.coordinates;
                        let marker = new tt.Marker().setLngLat([coords2[0],coords2[1]]).addTo(this.map);
                        var popup = new tt.Popup({offset: this.popupOffsets}).setHTML(`<b>Oprire</b> `);
                        marker.setPopup(popup).togglePopup();
                    }

                    this.displayRoute(this.data);

                })
                .catch((response) => {
                    Swal.fire({
                        title: "Oops...",
                        text: "A aparut o eroare",
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
