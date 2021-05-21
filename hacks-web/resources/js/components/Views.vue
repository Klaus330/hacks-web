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
                return 'Vizionările site-ului';
            }else{
                let institutionName = this.institution[0].name;

                return `${institutionName} pagini vizionate`;
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
                            labelString: 'Numărul de vizualizări'
                        }
                    }]
                }
            },

            chartData: {
                labels: Object.keys(this.data),
                datasets: [
                    {
                        label:"Vizualizări",
                        backgroundColor: '#4883ca',
                        data: Object.values(this.data)
                    }
                ]
            }
        };
    }
}
</script>

