import { Bar, mixins } from 'vue-chartjs'
const {reactiveProp} = mixins;
export default {
    extends: Bar,
    props: ['chartData', 'options'],
    mixins:[reactiveProp],
    mounted () {
        this.renderChart(this.chartData, this.options);
        this.$root.$on("chartUpdated", this.updateChart);
    },
    methods:{
        updateChart()
        {
            this.$data._chart.update();
        }
    }
}
