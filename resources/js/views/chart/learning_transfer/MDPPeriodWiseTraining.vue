<template>
  <div class="content">
    <div class="container-fluid">
      <br>
      <br>
      <div class="row">
        <div class="col-xl-12">
          <div class="card">
            <div class="datatable" v-if="!isLoading">
              <div class="card-body">
                <div id="main" style="height:400px;"></div>
              </div>
            </div>
            <div v-else>
              <skeleton-loader :row="14"/>
            </div>
            <data-export/>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import {baseurl} from '../../../base_url'
import {Common} from "../../../mixins/common";
import Multiselect from 'vue-multiselect'
import * as echarts from 'echarts';
export default {
  name: "List",
  components: { Multiselect },
  mixins: [Common],
  data() {
    return {
      isLoading: false,
      key:[],
      values:[],
      total: 0,
    }
  },
  mounted() {
    document.title = 'MDP Chart | MDP'
  },
  created() {
    axios.get(baseurl + `api/mdp-period-wise-training/${this.$route.params.Period}`).then((response)=>{
      console.log(response)
      //this.key = Object.keys(response.data.ptc[0])
      //this.values = Object.values(response.data.ptc[0])
      //this.total = response.data.total[0].Total
      //this.loadChart()
    });
  },
  methods: {
    loadChart(){
      // Create the echarts instance
      let myChart = echarts.init(document.getElementById('main'));
      // Draw the chart
      myChart.setOption({
        title: {
          text: 'Learning Transfer Report'
        },
        tooltip: {
          trigger: 'axis',
          axisPointer: {
            type: 'shadow'
          }
        },
        legend: {},
        xAxis: {
          type: 'value',
          min: 0,
          max: this.total
        },
        yAxis: {
          type: 'category',
          data: this.key
        },
        series: [
          {
            type: 'bar',
            data: this.values
          },
        ]
      });
    },
  },
}
</script>

<style lang="scss" scoped>
.document-upload-modal {
  .delete {
    color: red;
    position: absolute;
    right: 25px;
    display: none;
    top: 10px;
  }

  .title:hover .delete {
    display: block
  }
}
</style>
