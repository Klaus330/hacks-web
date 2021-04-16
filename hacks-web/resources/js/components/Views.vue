<template>
    <bar :data="chartData" :options="options"></bar>
</template>

<script>

import Bar from "./Bar.js";


export default {
    name: 'Views',
    components: {Bar},
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
                labels: ['Luni', 'Marti', 'Miercuri', 'Joi', 'Vineri', 'Sambata', 'Duminica'],
                datasets: [
                    {
                        label:"views",
                        backgroundColor: '#4883ca',
                        data: [3, 7, 4, 5, 6, 2, 1,0]
                    }
                ]
            }
        };
    }
}
</script>

