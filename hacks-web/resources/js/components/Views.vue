<template>
    <bar :data="chartData" :options="options"></bar>
</template>

<script>

import Bar from "./Bar.js";


export default {
    name: 'Views',
    components: {Bar},
    props:['data'],
    data() {
        return {
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    yAxes: [{
                        scaleLabel: {
                            display: true,
                            labelString: 'Nr of views'
                        }
                    }]
                }
            },

            chartData: {
                labels: Object.keys(this.data),
                datasets: [
                    {
                        label:"views",
                        backgroundColor: '#4883ca',
                        data: Object.values(this.data)
                    }
                ]
            }
        };
    }
}
</script>

