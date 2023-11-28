<template>
  <div class="content">
    <div class="container-fluid">
      <br>
      <br>
      <div class="row">
        <div class="col-xl-6">
          <div class="card">
            <div class="datatable" v-if="!isLoading">
              <div class="card-body">
                <div id="main" style="height:500px;"></div>
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
import {baseurl} from '../../base_url'
import {Common} from "../../mixins/common";
import Multiselect from 'vue-multiselect'
import * as echarts from 'echarts';
export default {
  name: "List",
  components: { Multiselect },
  mixins: [Common],
  data() {
    return {
      isLoading: false,
    }
  },
  mounted() {
    document.title = 'MDP Chart | MDP';
    this.loadChart();
  },
  methods: {
    loadChart(){
      // Create the echarts instance
      let myChartOne = echarts.init(document.getElementById('main'));
      // Draw the chart
      myChartOne.setOption({
        title: {
          text: 'Organized vs Pending PTC'
        },
        tooltip: {},
        xAxis: {
          data: ['2021-2022', '2022-2023','2023-2024']
        },
        yAxis: {
          type: 'value',
          min: 0,
          max: 100
        },
        series: [
          {
            name: 'sales',
            type: 'bar',
            data: [100, 100,100]
          }
        ]
      });
      myChartOne.on('click', (params) =>{
        this.$router.push(baseurl + 'mdp-organized-pending-ptc/' + params.name)
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
