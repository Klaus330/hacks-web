<template>
    <bar :data="chartData" :options="options"></bar>
</template>

<script>

import Bar from "./Bar.js";


export default {
    name: 'StatisticsChart',
    components: {Bar},
    data() {
        return {
            chartData: {
                labels: ['Luni', 'Marti', 'Miercuri', 'Joi', 'Vineri', 'Sambata', 'Duminica'],
                datasets: [
                    {
                        label: "08:00-11:30",
                        backgroundColor: '#8e69ec',
                        data: [3, 7, 4, 5, 6, 1, 0]
                    },
                    {
                        label: "13:00-16:00",
                        backgroundColor: "#e5d675",
                        data: [4, 3, 5, 7, 2, 2, 0]
                    },
                    {
                        label: "16:00-20:00",
                        backgroundColor: "#81c66c",
                        data: [7, 2, 6, 8, 1, 1, 0]
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    yAxes: [{
                        scaleLabel: {
                            display: true,
                            labelString: 'Nivel de aglomerare'
                        }
                    }]
                }

            }
        };
    }
}
</script>

