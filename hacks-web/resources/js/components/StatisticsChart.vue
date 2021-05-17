<template>
    <bar :chart-data="chartData" :options="options"></bar>
</template>

<script>

import Bar from "./Bar.js";


export default {
    name: 'StatisticsChart',
    components: {Bar},
    props: ["data"],
    watch: {
        data: function () {
            this.parseData();
        }
    },
    computed: {
        getInfo() {
            return this.chartData;
        }
    },
    methods: {
        parseData() {
            for (let i = 0; i < this.data.statistics.length; i++) {
                let dayStatistic = this.data.statistics[i].responses["q3"];
                let maxim = 0;
                let timeMeasure = 0;
                for (let key in dayStatistic) {
                    let temp = dayStatistic[key];
                    temp = temp.split("");
                    temp.splice(temp.length - 1, 1);
                    temp = temp.join("");
                    temp = parseFloat(temp);
                    dayStatistic[key] = temp;
                    if (dayStatistic[key] > maxim) {
                        let temp2;
                        maxim = dayStatistic[key];
                        temp2 = key.split("-");
                        if (temp2[1] != undefined) {
                            timeMeasure = parseInt(temp2[1]);
                        } else {
                            timeMeasure = 90;
                        }
                    }
                }
                let currentDay = Object.keys(this.week)[i];
                this.week[currentDay] = timeMeasure;
            }
            this.chartData.datasets[0].data = [
                this.week.monday,
                this.week.tuesday,
                this.week.wednesday,
                this.week.thursday,
                this.week.friday,
                this.week.saturday,
                this.week.sunday
            ];

            this.$root.$emit("chartUpdated");
        }
    },
    data() {

        return {
            week: {
                monday: 0,
                tuesday: 0,
                wednesday: 0,
                thursday: 0,
                friday: 0,
                saturday: 0,
                sunday: 0
            },
            chartData: {
                labels: ['Luni', 'Marti', 'Miercuri', 'Joi', 'Vineri', 'Sambata', 'Duminica'],
                datasets: [
                    {
                        label: 'Interval de asteptare',
                        backgroundColor: '#8e69ec',
                        data: [30, 0, 45, 60, 30, 90, 0]
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

