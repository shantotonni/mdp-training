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
                <div id="main" style="min-height:1000px"></div>
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
import {bus} from "../../app";
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
    //localStorage.setItem('data',JSON.stringify(this.$route.params));
    //JSON.parse(localStorage.getItem('data'))
    axios.post(baseurl + 'api/mdp-organized-pending-ptc-title-wise-employee/',{data: this.$route.params}).then((response)=>{
      console.log(response)
      response.data.ptc.forEach((getRecord, index) => {
        this.key.push(getRecord.EmployeeName);
        this.values.push(5);
      })
      this.loadChart()
    });
  },
  destroyed() {
    //localStorage.removeItem('data')
  },
  methods: {
    loadChart(){
      // Create the echarts instance
      let myChart = echarts.init(document.getElementById('main'));
      // Draw the chart
      myChart.setOption({
        title: {
          text: 'Organized vs Pending PTC'
        },
        tooltip: {
          trigger: 'axis',
          axisPointer: {
            type: 'shadow'
          }
        },
        grid: {
          left: 0,
          right: 40,
          top: 35,
          bottom: 0,
          containLabel: true
        },
        legend: {},
        xAxis: {
          type: 'value',
          min: 0,
          max: 5
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
      myChart.on('click', (params) =>{
        console.log(params.name)
        this.$router.push(baseurl + 'mdp-organized-pending-ptc-title-wise-employee/' + this.$route.params.Period + '/' + this.$route.params.Status + '/' + params.name)
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
