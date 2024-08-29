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

        <div class="col-xl-6">
          <div class="card">
            <div class="datatable" v-if="!isLoading">
              <div class="card-body">
                <div id="Two" style="height:500px;"></div>
              </div>
            </div>
            <div v-else>
              <skeleton-loader :row="14"/>
            </div>
            <data-export/>
          </div>
        </div>
        <div class="col-xl-6">
          <div class="card">
            <div class="datatable" v-if="!isLoading">
              <div class="card-body">
                <div id="Three" style="height:500px;"></div>
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
      label: [],
      value: [],
      isLoading: false,
    }
  },
  created() {
    this.getAllChartReport()
  },
  mounted() {
    document.title = 'MDP Chart | MDP';
  },
  methods: {
    getAllChartReport(){
      axios.get(baseurl + `api/get-all-chart-report`).then((response)=>{
        let chart_one_labels = [];
        let chart_one_values = [];
        let recordOne = response.data.training_count
        recordOne.forEach((getRecord, index) => {
          this.label.push(getRecord.AppraisalPeriod);
          this.value.push(getRecord.Total);
        })
        console.log(this.value)
        this.loadChart();
      });
    },
    loadChart(){
      // Create the echarts instance
      let myChartOne = echarts.init(document.getElementById('main'));
      let myChartTwo = echarts.init(document.getElementById('Two'));
      let myChartThree = echarts.init(document.getElementById('Three'));
      // Draw the chart
      myChartOne.setOption({
        title: {
          text: 'Organized vs Pending PTC'
        },
        tooltip: {},
        xAxis: {
          data: this.label
        },
        yAxis: {
          type: 'value',
          min: 0,
          max: 15000
        },
        series: [
          {
            name: 'sales',
            type: 'bar',
            data: this.value
          }
        ]
      });
      myChartOne.on('click', (params) =>{
        this.$router.push(baseurl + 'mdp-organized-pending-ptc/' + params.name)
      });

      myChartTwo.setOption({
        title: {
          text: 'Learning Transfer Report'
        },
        tooltip: {},
        xAxis: {
          data: ['2023-2024']
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
            data: [100]
          }
        ]
      });
      myChartTwo.on('click', (params) =>{
        // console.log(params)
        this.$router.push(baseurl + 'mdp-period-wise-training/' + params.name)
      });

      myChartThree.setOption({
        title: {
          text: 'Training Feedback'
        },
        tooltip: {},
        xAxis: {
          data: ['2023-2024']
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
            data: [100]
          }
        ]
      });
      myChartThree.on('click', (params) =>{
        // console.log(params)
        this.$router.push(baseurl + 'mdp-period-wise-feedback/' + params.name)
      });


    },
  },
}
</script>

