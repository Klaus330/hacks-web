<template>
    <div id="map-div" style="height: 100vh; "></div>
</template>

<script>
export default {
    name: "Map",
    data() {
        return {
            map: [],
            data: {}
        };
    },
    mounted() {
        this.getRoute();
        this.map = tt.map({
            key: '3rey3b2DT5N5ej6KQEKgYzaGwnlXjG2m',
            container: 'map-div',
            style: "tomtom://vector/1/basic-main",
        });
    },
    methods: {
        getRoute() {
            console.log("hit");

            var data = JSON.stringify({
                "avoidVignette": [
                    "AUS",
                    "CHE"
                ]
            });

            var config = {
                method: 'get',
                url: 'https://bureaucracyhackshostat.herokuapp.com/generateRoute',
                headers: {
                    'Content-Type': 'application/json',
                    'Access-Control-Allow-Origin': 'https://bureaucracyhackshostat.herokuapp.com/'
                },
                data : data
            };
            console.log(config);
            axios.request(config)
                .then(response => {
                    this.data = response.data;
                    console.log(data);
                })
                .catch((error) => {
                    console.log(error);
                });
        }
    }
}
</script>

<style scoped>

</style>
