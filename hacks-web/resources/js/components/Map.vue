<template>
    <div>
        <div id="map-div" style="height: 100vh; "></div>
    </div>
</template>

<script>
export default {
    name: "Map",
    props:['generateRoute','requestData'],
    data() {
        return {
            map: [],
            data: {},
            routeOptions: {},
            markers: [],
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
          this.createRoute();
          this.getRoute();
          this.currentLatitude = this.requestData.currentLatitude;
          this.currentLongitude = this.requestData.currentLongitude;
          this.map.setCenter([this.currentLongitude, this.currentLatitude]);
          var marker = new tt.Marker().setLngLat([this.currentLongitude,this.currentLatitude]).addTo(this.map);
          var popup = new tt.Popup({offset: this.popupOffsets}).setHTML("<b>Pozitia ta actuala</b> ");
          marker.setPopup(popup).togglePopup();
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

        var marker = new tt.Marker().setLngLat([this.currentLongitude,this.currentLatitude]).addTo(this.map);
        var popup = new tt.Popup({offset: this.popupOffsets}).setHTML("<b>Iasi</b> ");
        marker.setPopup(popup).togglePopup();

    },
    methods: {
        getRoute() {
            axios.post('/get-route', this.requestData)
                .then(response => {
                    console.log(response.data);
                    this.data = response.data.routes[0];
                    console.log("DATA",this.data);
                    // this.displayRoute(this.data);
                    //
                    // let points = this.data.legs[0].points;
                    // for (let i = 0; i < points.length; i++) {
                    //     this.markers.push(new tt.Marker().setLngLat([points[i].latitude, points[i].longitude]));
                    // }w
                    // this.createRoute();

                })
                .catch((error) => {
                    console.log(error);
                });
        },

        createRoute() {
            let routeOptions = {
                key: '3rey3b2DT5N5ej6KQEKgYzaGwnlXjG2m',
                locations: '4.8786,52.3679:4.8798,52.3679',
                travelMode: 'car'
            }


            // tt.services.calculateRoute(routeOptions).go()
            //     .then((response) => {
            //         console.log(response);
            //         let geo = response.toGeoJson();
            //         console.log(geo);
            //         this.displayRoute(geo);
            //     });
        },
        displayRoute(geo) {
            this.routeOptions = {
                'id': 'route',
                'type': 'line',
                'source': {
                    'type': 'geojson',
                    'data': geo
                },
                'paint': {
                    'line-color': 'red',
                    'line-width': 10
                }
            };
            let routeLayer = this.map.addLayer({
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
