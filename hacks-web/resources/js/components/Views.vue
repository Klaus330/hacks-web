<template>
    <div>
        <h2>{{labelString}}</h2>
    <bar :data="chartData" :options="options"></bar>
    </div>
</template>

<script>

import Bar from "./Bar.js";


export default {
    name: 'Views',
    components: {Bar},
    props:['data', 'institution'],
    computed:{
        labelString(){
            if(this.institution.length === 0){
                return 'Website Views';
            }else{
                let institutionName = this.institution[0].name;

                return `${institutionName} page views`;
            }
        }
    },
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

