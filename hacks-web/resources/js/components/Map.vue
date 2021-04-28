<template>
    <div>
        <div id="map-div" style="height: 100vh; "></div>
    </div>
</template>

<script>
export default {
    name: "Map",
    props:['generateRoute'],
    data() {
        return {
            map: [],
            data: {},
            routeOptions: {},
            markers: []
        };
    },
    watch:{
      generateRoute: function(){
          this.createRoute();
      }
    },
    mounted() {
        this.map = tt.map({
            key: '3rey3b2DT5N5ej6KQEKgYzaGwnlXjG2m',
            container: 'map-div',
            style: "tomtom://vector/1/basic-main",
            zoom: 15,
            center: [27.58207, 47.14356]
        });

        this.map.on('click', (event) => {
            console.log(event.lngLat);
            this.markers.push(new tt.Marker().setLngLat(event.lngLat).addTo(this.map));
        });
        this.getRoute();
    },
    methods: {
        getRoute() {
            axios.get('/get-route')
                .then(response => {
                    this.data = response.data.routes[0];

                    let points = this.data.legs[0].points;
                    for (let i = 0; i < points.length; i++) {
                        this.markers.push(new tt.Marker().setLngLat([points[i].latitude, points[i].longitude]).addTo(this.map));
                    }
                })
                .catch((error) => {
                    console.log(error);
                });
        },

        createRoute() {
            let routeOptions = {
                key: '3rey3b2DT5N5ej6KQEKgYzaGwnlXjG2m',
                locations: [],
                travelMode: 'car'
            }
            console.log(this.markers[0].getLngLat());
            for (let i = 0; i < this.markers.length; i++) {

                routeOptions.locations.push(this.markers[i].getLngLat());
            }

            tt.services.calculateRoute(routeOptions).go()
                .then((response) => {
                    console.log(response);
                    let geo = response.toGeoJson();
                    console.log(geo);
                    this.displayRoute(geo);
                });
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
