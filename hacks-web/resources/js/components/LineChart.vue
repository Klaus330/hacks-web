<template>
  <div class="row">
    <line-chart :chartdata="datacollection" class="col-12"></line-chart>
  </div>
</template>

<script>
  import LineChart from './Line.js'

  export default {
    components: {
      LineChart
    },
    data () {
      return {
        datacollection:{
            labels: [6, 60],
            datasets: [
                {
                    label: 'Marti',
                    backgroundColor: 'rgba(73,139,239,0.4)',
                    data: [20, 50]
                }, {
                    label: 'Luni',
                    backgroundColor: 'rgba(239,73,73,0.4)',
                    data: [12, 34]
                }
            ]
        }
      }
    },
    mounted () {
      this.fillData()
    },
    methods: {
      fillData () {
        this.datacollection = {
          labels: [6, 23],
          datasets: [
            {
              label: 'Data One',
              backgroundColor: '#f87979',
              data: [2, 3]
            }, {
              label: 'Data One',
              backgroundColor: '#f87979',
              data: [12, 34]
            }
          ]
        }
      }
    }
  }
</script>

<style>
  .small {
    max-width: 600px;
    margin:  150px auto;
  }
</style>
